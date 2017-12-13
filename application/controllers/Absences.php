<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absences extends CI_Controller {
    
    private $_utilisateur;
    private $_poste;


    public function askAbsence(){
        //verification de la connexion de l'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->_poste = Poste::find($this->_utilisateur->Pos_id);
        $data['utilisateur'] = $this->_utilisateur;
        $data['poste'] = $this->_poste;
        
        //les vues
        $this->load->view('user_header',$data);
        $this->load->view('Absence/askAbsence');
        $this->load->view('admin_footer');
         $this->load->view('Absence/js_create');
        
    }
    
}
