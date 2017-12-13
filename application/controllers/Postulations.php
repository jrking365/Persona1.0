<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Postulations extends CI_Controller {

    private $_offreemploi;
    private $_postulation;
    private $_piecejointe;
    private $_utilisateur;
    private $_internaute;

    public function listePersonne($job) {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));

        $personnes = Internaute::join('Postulation', 'Internaute_EmployePotentiel_.id', '=', 'Postulation.Int_id')
                ->where('postulation.off_id', '=', $job)
                ->select('*')
                ->getQuery()
                ->get();
        $data = array(
            'internautes' => $personnes,
            'offre' => OffreEmploi::find($job)
        );

        //on load la vue
    }

    public function postulants($off) {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->_poste = Poste::find($this->_utilisateur->Pos_id);
        $data['posteOffre'] = PosteOffre::all();
        $data['utilisateur'] = $this->_utilisateur;
        $data['poste'] = $this->_poste;
        $data1['offre'] = OffreEmploi::find($off);
        $data1['poste'] = PosteOffre::find($data1['offre']->posteOffreid);

        $postulation = Postulation::join('Internaute_EmployePotentiel_', 'Postulation.Int_id', '=', 'Internaute_EmployePotentiel_.id')
                ->join('OffreEmploi', 'Postulation.Off_id', '=', 'OffreEmploi.id')
                ->join('posteOffre', 'OffreEmploi.posteOffreid', '=', 'posteOffre.id')
                ->join('PieceJointe', 'PieceJointe.Pos_id', '=', 'Postulation.id')
                ->where('OffreEmploi.id', '=', $off)
                ->select('Internaute_EmployePotentiel_.nom', 'Internaute_EmployePotentiel_.prenom', 'Internaute_EmployePotentiel_.sexe'
                        , 'Internaute_EmployePotentiel_.mail', 'Internaute_EmployePotentiel_.telephone'
                        , 'Postulation.datePostulation', 'Postulation.id', 'PieceJointe.cv', 'PieceJointe.lettreDeMotivation'
                        , 'PieceJointe.scanDiplome')
                ->getQuery()
                ->get();

        $data1['postulations'] = $postulation;

        //on load les vues
        $this->load->view('admin_header', $data);
        $this->load->view('postulation/postulants', $data1);
        $this->load->view("admin_footer_problem");
    }

    public function inviterEntretien($idpostulation) {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $postulation = Postulation::find($idpostulation);
        $internaute = Internaute::find($postulation->Int_id);
        $offre = OffreEmploi::find($postulation->Off_id);
        //pour le mail
        try {
            $to = $internaute->mail;
            $subject = "Invitation à un entretien d'embauche";
            $data['internaute'] = $internaute;
            $data['offre'] = $offre;
            $this->sendEmail($subject, $to, $data);
            $val = array('Typ_id' => 6);
            $postulation->update($val);
        } catch (Illuminate\Database\QueryException $exc) {
            $this->load->view('Administrateurs/MenuOffre', $exc);
            
        }
        header('Location:'.base_url().'Administrateurs/entretiens');
        
    }

    /**
     * 
     * @param type $internaute
     * @param type $job
     */
    public function Loadpiecejointe($internaute, $job) {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));

        //on fait d'abord une requete pour obtenir la postulation

        $postulation = Postulation::join('Internaute_EmployePotentiel_', 'Postulation.Int_id', '=', 'Internaute_EmployePotentiel_.id')
                ->join('OffreEmploi', 'Postulation.Off_id', '=', 'OffreEmploi.id')
                ->where('Internaute_EmployePotentiel_.id', '=', $internaute)
                ->where('OffreEmploi.id', '=', $job)
                ->select('*')
                ->getQuery()
                ->get();
        $this->_postulation = $postulation[0];
        // maintenant on select les pieces jointe
        $this->_piecejointe = PieceJointe::where('Pos_id', '=', $this->_postulation->id)->get()[0];

        $data['piecejointe'] = $this->_piecejointe;

        //on load la vue ici    
    }

    public function suivreDossier() {
        if ($this->session->userdata('internaute') == NULL) {
            header('location:' . base_url() . 'accueil/login');
        }
        $this->_internaute = unserialize($this->session->userdata('internaute'));

        //on affiche la liste des jobs auquel il a postulé
        //$postulations = Postulations::where('Int_id','=', $this->_internaute->id)->get();
        $postulations = Postulation::join('Internaute_EmployePotentiel_', 'Postulation.Int_id', '=', 'Internaute_EmployePotentiel_.id')
                ->join('OffreEmploi', 'Postulation.Off_id', '=', 'OffreEmploi.id')
                ->join('posteOffre', 'OffreEmploi.posteOffreid', '=', 'posteOffre.id')
                ->join('TypeEtatPostulation', 'Postulation.Typ_id', '=', 'TypeEtatPostulation.id')
                ->where('Internaute_EmployePotentiel_.id', '=', $this->_internaute->id)
                ->select('*')
                ->getQuery()
                ->get();
        $data['dossiers'] = $postulations;

        $this->load->view('internaute/internaute_header');
        $this->load->view('postulation/suivreDossier', $data);
        $this->load->view('internaute/internaute_footer');
        //var_dump($postulations);
        $this->load->view('postulation/js_suivre');
    }

    /**
     * Fonction pour envoyer un email
     * @param type $subject
     * @param type $to
     * @param type $code
     */
    public function sendEmail($subject, $to, $data) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'nigoumiguialajeanroger@gmail.com',
            'smtp_pass' => 'teletoon',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->email->initialize($config);
        $this->email->from('nigoumiguialajeanroger@gmail.com', 'Persona1.0');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($this->load->view('postulation/mail_invitation', $data, TRUE));
        $this->email->set_newline("\r\n");
        $this->email->send();
    }

}
