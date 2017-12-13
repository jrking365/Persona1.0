<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrateurs extends CI_Controller {

    private $_utilisateur;
    private $_internaute;
    private $_offreEmploi;
    private $_poste;

    public function MenuOffre() {

        //verification de la connexion de l'utilisateur
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->_poste = Poste::find($this->_utilisateur->Pos_id);
        $data['posteOffre'] = PosteOffre::all();
        $data['utilisateur'] = $this->_utilisateur;
        $data['poste'] = $this->_poste;
        $this->load->view('admin_header', $data);
        $this->load->view('administrateur/menuOffre');
        $this->load->view('admin_footer');
        $this->load->view('administrateur/jsMenuOffre');
    }

    public function entretiens() {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->_poste = Poste::find($this->_utilisateur->Pos_id);
        $data['utilisateur'] = $this->_utilisateur;
        $data['poste'] = $this->_poste;
        
        //mettre le code ici
        
        $this->load->view('admin_header', $data);
        $this->load->view('administrateur/entretiens');
        $this->load->view('admin_footer');
    }

}
