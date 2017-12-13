<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controle47 extends CI_Controller {
    private $_utilisateur;

    public function index() {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('email', 'adresse email', 'required', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('password', 'le mot de passe', 'required|min_length[6]|max_length[25]', array(
            'required' => 'le %s est obligatoire .'
        ));

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('controle47/login');
        } else {
            $res = $this->existe_connexion($this->chargerObjet());
            if ($res) {
                echo ' Réussite !!! ';
                $this->session->set_userdata('utilisateur', serialize($this->_utilisateur));
                header('Location:'.  base_url().'utilisateurs/index');
            } else {
                $data = array('error' => 'Erreur de login ou de mot de passe ou votre compte est pas activé');
                $this->load->view('controle47/login', $data);
            }
        }



        
    }
    
    
    private function existe_connexion($obj){
        $resultat = Utilisateur::where('mail', '=', $obj->mail)->where('motDePasse', '=', $obj->motDePasse)->get();
        
        if( sizeof($resultat) == 1){
            $this->_utilisateur = $resultat[0];
            return TRUE;
        }else{
            $this->_utilisateur=NULL;
            return FALSE;
        }
      
    }
    private function chargerObjet(){
        $obj = new Utilisateur(array(
            'mail' =>  $this->input->post('email'),
            'motDePasse' =>  $this->input->post('password')
        ));
        
        return $obj;
    }

}
