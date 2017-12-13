<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OffreEmplois extends CI_Controller {

    private $_offre;
    private $_internaute;
    private $_utilisateur;
    private $_posteOffre;
    private $_poste;
    private $_postulation;
    private $_piecejointe;
    private $_fichier = array();

    public function listegenerale_internaute() {
        if ($this->session->userdata('internaute') == NULL) {
            header('location:' . base_url() . 'accueil/login');
        }
        $this->_internaute = unserialize($this->session->userdata('internaute'));
        $data = array('liste' => OffreEmploi::where('etat', '=', 1)->get()); // etat 1 veut dire offre pas désactivé
        //charger les vues ici
        $this->load->view('offreEmploi/listegenerale_internaute', $data);
    }
    
    public function listegenerale_admin(){
         //verification de la connexion de l'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $offres = OffreEmploi::join('Utilisateur','OffreEmploi.Uti_id','=','Utilisateur.id')
                             ->join('posteOffre','OffreEmploi.posteOffreid','=','posteOffre.id')
                             ->where('OffreEmploi.etat','=',1) // etat 1 veut dire offre pas désactivé
                             ->select('OffreEmploi.id as off_id', 'OffreEmploi.libelle as libelle', 'Utilisateur.nom', 'Utilisateur.prenom', 'posteOffre.libelle_posteOffre')
                             ->getQuery()
                             ->get();
        //$data = array('liste' => OffreEmploi::where('etat', '=', 1)->get()); 
        $data['listes'] = $offres;
         //charger les vues ici
        
         
        $this->load->view('offreEmploi/listegenerale_admin', $data);
    }

    public function listeByPosition_internaute($id) {
        if ($this->session->userdata('internaute') == NULL) {
            header('location:' . base_url() . 'accueil/login');
        }
        $this->_internaute = unserialize($this->session->userdata('internaute'));
        $data = array('liste' => OffreEmplois::where('etat', '=', 1)->where('posteOffreid', '=', $id)->get());

        //charger les vues
    }

    

    public function detail_offre($id) {
        //verification de la connexion de l'utilisateur
        if ($this->session->userdata('internaute') == NULL) {
            header('location:' . base_url() . 'accueil/login');
        }

        $this->_internaute = unserialize($this->session->userdata('internaute'));
        $data['internaute'] = $this->_internaute;
        $this->_offre = OffreEmploi::find($id);
        $data['offre'] = $this->_offre;
        $this->_posteOffre = PosteOffre::find($this->_offre->posteOffreid);
        $data['poste'] = $this->_posteOffre;

        $this->load->view('internaute/internaute_header');
         $this->load->view('offreEmploi/detail', $data);
          $this->load->view('offreEmploi/postuler');
          //$this->load->view('internaute/internaute_footer');
    }

    public function Postuler() {
        if ($this->session->userdata('internaute') == NULL) {
            header('location:' . base_url() . 'accueil/login');
        }
        $this->_internaute = unserialize($this->session->userdata('internaute'));
        
        $this->verifiechampPostuler();
        if($this->form_validation->run()== FALSE){
            //$this->load->view('offreEmploi/postuler');
            echo 'erreur';
        }else{
            $val = $this->valeurPostulation();
            
            
            //file upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] =5000;
            
           // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
           
           
            try {
                $this->_postulation = Postulation::create($val);
                //var_dump($this->_postulation);
                $CV= 'cv';
                $Dip = 'diplomes';
                $MOT = 'motivation';
                $valeursP = array(
                'cv' =>$this->upload_cv($CV),
                'scanDiplome'=>$this->upload_diplome($Dip),
                'lettreDeMotivation'=>$this->upload_motivation($MOT ),
                    'Pos_id'=>$this->_postulation->id
            );
                $this->_piecejointe = PieceJointe::create($valeursP);
                $this->session->set_userdata('msg', 'Postulation à offre effectué avec  succès');
                header('location:' . base_url() . 'Internautes/index');
            } catch (Illuminate\Database\QueryException $exc) {
                $data1['error'] = 1;
                $data1['erreur'] = 'Erreur de données' . $exc->errorInfo[2];
                header('location:' . base_url() . 'OffreEmplois/detail_offre/2');
                
            }
            
            
        }
        
       
    }

    public function create() {
        //verification de la connexion de l'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }

        $p = PosteOffre::all();
        $data1['posteOffre'] = $p;
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->_poste = Poste::find($this->_utilisateur->Pos_id);
        $data['utilisateur'] = $this->_utilisateur;
        $data['poste'] = $this->_poste;

        $this->verifiechampCreate();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin_header', $data);
            $this->load->view('offreEmploi/create', $data1);
            $this->load->view('admin_footer');
            $this->load->view('offreEmploi/js_create');
        } else {
            $val = $this->valeurFormulaire();
            try {
                $this->_offre = OffreEmploi::create($val);
                $this->session->set_userdata('msg', 'Publication offre effectué avec  succès');
                header('location:' . base_url() . '/utilisateurs/index');
            } catch (Illuminate\Database\QueryException $exc) {
                $data1['error'] = 1;
                $data1['erreur'] = 'Erreur de données' . $exc->errorInfo[2];
                //$msg = array('error' => 1, 'erreur' => 'Erreur de données' . $exc->errorInfo[2]);
                $this->load->view('admin_header', $data);
                $this->load->view('offreEmploi/create', $data1);
                $this->load->view('admin_footer');
                $this->load->view('offreEmploi/js_create');
            }
        }
    }

    private function verifiechampCreate() {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('libelle', 'le titre ', 'required|min_length[3]|max_length[100]', array(
            'required' => 'le %s est obligatoire',
            'min_length' => ' le %s doit au moins avoir trois caractères',
            'max_length' => 'le %s doit contenir au maximum 100 caractères'
        ));
        $this->form_validation->set_rules('descriptionss', 'la description ', 'required|min_length[25]', array(
            'required' => 'le %s est obligatoire',
            'min_length' => ' le %s doit au moins avoir vingt cinq caractères',
        ));
    }

    private function valeurFormulaire() {
        $this->_posteOffre = PosteOffre::where('libelle', '=', $this->input->post('posteOffre'))->get()[0];
        $valeurs = array(
            'Uti_id' => $this->_utilisateur->id,
            'libelle' => $this->input->post('libelle'),
            'description' => htmlspecialchars($this->input->post('descriptionss')),
            'posteOffreid' => $this->_posteOffre->id,
            'etat' => 1, //1 siginifie que l'etat est actif, 0 qu'il est désactivé
        );
        return $valeurs;
    }
    
    
    private function verifiechampPostuler(){
          $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
          $this->form_validation->set_rules('idoffre','probleme interne','required', array(
              'required' =>'detection de %s '
          ));
         /* $this->form_validation->set_rules('cv','curriculum vitae','required', array(
              'required' =>'le %s est obligatoire'
          ));
           $this->form_validation->set_rules('motivation','lettre de motivation','required', array(
              'required' =>'la %s est obligatoire'
          ));
            $this->form_validation->set_rules('diplomes','scan des diplome','required', array(
              'required' =>'le %s est obligatoire'
          ));*/
        
    }
    
    private function valeurPostulation(){
        $this->_offre = OffreEmploi::find($this->input->post('idoffre'));
        //var_dump($this->_offre);
        $idt = 2;
        $valeurs = array(
            'Int_id'=>  $this->_internaute->id,
            'Off_id'=> $this->_offre->id,
            'datePostulation'=>  date('Y-m-d'),
            'Typ_id'=> $idt, //activé
        );
        
        return $valeurs;
       
    }
    
    private function upload_cv($nom){
        if(! $this->upload->do_upload($nom)){
                $error = array('error'=>  $this->upload->display_errors());
                //on load la vue
                header('location:' . base_url() . '/internautes/index');
            }else{
                /* le fichier a  ete uploadé, maintenant on le 
                 * recupére et on insere son lien en BD
                 */
                //on recupere les données du fichier
                $upload_data = $this->upload->data();
                //on recupere le nom du fichier
                $val = $upload_data['file_name'];
                
                //on enregistre le tout         
            }
            
            return $val;
    }
    
     private function upload_motivation($nom){
        if(! $this->upload->do_upload($nom)){
                $error = array('error'=>  $this->upload->display_errors());
                //on load la vue
                header('location:' . base_url() . '/internautes/index');
            }else{
                /* le fichier a  ete uploadé, maintenant on le 
                 * recupére et on insere son lien en BD
                 */
                //on recupere les données du fichier
                $upload_data = $this->upload->data();
                //on recupere le nom du fichier
                $val = $upload_data['file_name'];
                
                //on enregistre le tout         
            }
            
            return $val;
    }
    
     private function upload_diplome($nom){
        if(! $this->upload->do_upload($nom)){
                $error = array('error'=>  $this->upload->display_errors());
                //on load la vue
                header('location:' . base_url() . '/internautes/index');
            }else{
                /* le fichier a  ete uploadé, maintenant on le 
                 * recupére et on insere son lien en BD
                 */
                //on recupere les données du fichier
                $upload_data = $this->upload->data();
                //on recupere le nom du fichier
                $val = $upload_data['file_name'];
                
                //on enregistre le tout         
            }
            
            return $val;
    }

}
