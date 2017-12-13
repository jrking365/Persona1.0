<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Internautes extends CI_Controller {
    private $_internaute;
    
    public function index(){
        //verification de la connexion de l'utilisateur
        if($this->session->userdata('internaute') == NULL){
            header('location:'.base_url().'accueil/login');
        }
        $this->_internaute = unserialize($this->session->userdata('internaute'));
        $data['internaute'] = $this->_internaute;
        //charger les vues ici en bas
        $this->load->view('internaute/internaute_header');
         $this->load->view('internaute/page', $data);
        $this->load->view('internaute/internaute_footer');
    }
    public function consulterOffre(){
         //verification de la connexion de l'utilisateur
        if($this->session->userdata('internaute') == NULL){
            header('location:'.base_url().'accueil/login');
        }
        $this->_internaute = unserialize($this->session->userdata('internaute'));
        $data['internaute'] = $this->_internaute;
        
        $data['posteOffre'] = PosteOffre::all();
        //charger les vues ici en bas
        $this->load->view('internaute/internaute_header');
         $this->load->view('internaute/consulteroffreMenu', $data);
        $this->load->view('internaute/internaute_footer');
        $this->load->view('internaute/js_offre');
        
    }

        public function deconnexion(){
        $this->session->unset_userdata('internaute');
         header('Location: ' . base_url());
    }
    /**
     * 
     * @param type $id on envoit en parametre l'id de l'utilisateur à modifier
     */
    public function completerinfos(){
         if($this->session->userdata('internaute') == NULL){
            header('location:'.base_url().'accueil/login');
        }
        $this->_internaute = unserialize($this->session->userdata('internaute'));
       
      
         $data['internaute'] = $this->_internaute;
        $this->verifiechamp();
        if($this->form_validation->run() == FALSE){
             $this->load->view('internaute/internaute_header');
           
            $this->load->view('internaute/completerInfos',$data); 
             $this->load->view('internaute/internaute_footer');
        }else{
            $val = $this->valeurformulaire();
            try{
                $this->_internaute = Internaute::where('id','=',  $this->_internaute->id)->update($val);
                $this->session->unset_userdata('internaute');
                $this->session->set_userdata('internaute', serialize($this->_internaute));
                $this->session->set_userdata('msg', 'Completion des informations éffectué avec succes !');
                header('location:'.base_url().'internautes/index');
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('error' => 1, 'erreur' => ' Erreur de données !' . $exc->errorInfo[2], 'semestre' => $s);
                $this->load->view('internaute/completerInfos',$msg);

            }
             //load le header et le footer
            $this->load->view('internaute/internaute_header');
            $this->load->view('internaute/internaute_footer');
           
        }
        
        
    }
    
    
    
     private function verifiechamp() {
        /* set_error_delimiters permet d'encadrer l'erreur */
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('firstname', 'le Prénom', 'required|min_length[3]|max_length[25]', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('lastname', 'le Nom', 'required|min_length[3]|max_length[25]', array(
            'required' => 'le %s est obligatoire.'
        ));
        
       
        $this->form_validation->set_rules('sexe','le sexe','required',array(
            'required'=>'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('telephone','le numero de télephone','required',array(
            'required'=>'le %s est obligatoire.'
        ));
    }
    
    private function valeurformulaire() {
        $valeurs = array(
            'nom' => $this->input->post('lastname'),
            'prenom' => $this->input->post('firstname'),
            'sexe'=>  $this->input->post('sexe'),
            'telephone'=>  $this->input->post('telephone'),
            'etat' => 2,  //2 pour informations complétés
        );
        return $valeurs;
    }
}