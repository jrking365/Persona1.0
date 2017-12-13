<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateurs extends CI_Controller {

    private $_utilisateur;
    private $_internaute;
    private $_groupe;
    private $_poste;

    public function index() {
        //verification de la connexion de l'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->_poste = Poste::find($this->_utilisateur->Pos_id);
        $data['utilisateur'] = $this->_utilisateur;
        $data['poste'] = $this->_poste;
        if($this->_utilisateur->Gro_id == 1){
            //on affiche l'accueil de l'admin
            
            $this->load->view('admin_header',$data);
            $this->load->view('page');
            $this->load->view('admin_footer');
        }
        else{
            //on affiche l'accueil du user normal
            $this->load->view('user_header', $data);
            $this->load->view('page_user');
            $this->load->view('admin_footer');
            
        }
    }
    
     public function deconnexion(){
        $this->session->unset_userdata('utilisateur');
         header('Location: ' . base_url());
    }
    
    public function createEmployee($id){
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        
        $this->_internaute = Internaute::where('id','=',$id)->get()[0];
        $val = array(
            'nom' =>  $this->_internaute->nom,
            'prenom'=> $this->_internaute->prenom,
            'sexe' =>  $this->_internaute->sexe,
            'telephone'=>  $this->_internaute->telephone,
            'motDePasse' =>  $this->_internaute->motDePasse,
            'login'=>  $this->_internaute->login,
            'mail'=>  $this->_internaute->mail,
        );
        
        $this->verifiechamp();
        if($this->form_validation->run() == FALSE){
            //load la vue ici
        }else{
            $this->_groupe = Groupe::where('libelle','=',  $this->input->post('groupe'))->get()[0];
            $this->_poste  =  Poste::where('nom','=',  $this->input->post('poste'))->get()[0];
            $val['Gro_id'] = $this->_groupe->id;
            $val['Pos_id'] = $this->_poste->id;
            $val['matricule'] = $this->createMatricule($this->input->post('poste'), $this->input->post('groupe'));
            
            //mettre le truc pour le mail ici
            try {
                $this->_utilisateur = Utilisateur::create($val);
                
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('error' => 1, 'erreur' => 'Erreur de données' . $exc->errorInfo[2]);
                //load la vue avec l'erreur
                
            }
            
        }
        
    }
    
    public function listegenerale(){
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        
        $data['liste'] = Utilisateur::all();
        
        //mettre la vue ici en envoyant la liste en parametre
    }

    



    private function verifiechamp(){
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('Poste', 'le Poste', 'required', array(
            'required' => 'le %s est obligatoire.'
        ));
         $this->form_validation->set_rules('Groupe', 'le groupe', 'required', array(
            'required' => 'le %s est obligatoire.'
        ));  
    }
    
    public function createMatricule($poste,$groupe){
        $p = substr($poste,0,2);
        $g = substr($groupe,0,2);
        $d = date("y");
        $mat = "$p $g $d"; //retrourne le matricule chaine de 6 caracteres;
        return $mat;
        
    }

}
