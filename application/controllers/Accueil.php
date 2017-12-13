<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    private $_internaute;

    /* Dans ce controleur on gère plusieurs choses:
     * l'enregistrement
     * l'envoi par mail
     * la connexion
     * la modification du mot de passe (mot de passe oublié
     * la vérification du code
     */

    public function index() {

        $this->load->view('accueil/first');
    }

    public function login() {
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('email', 'adresse email', 'required', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('password', 'le mot de passe', 'required|min_length[6]|max_length[25]', array(
            'required' => 'le %s est obligatoire .'
        ));
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('accueil/login');
        }
        else{
           $res = $this->existe_connexion($this->chargerObjet());
           if($res){
                echo ' Réussite !!! ';
                $this->session->set_userdata('internaute', serialize($this->_internaute));
                header('Location:' .  base_url(). 'Internautes/index');
            }else{
                $data = array('error' => 'Erreur de login ou de mot de passe ou votre compte est pas activé');
                $this->load->view('accueil/login', $data);
            }
        }

        
    }

    /* public function email(){
      $data['code']='1ABCydb';
      $this->load->view('accueil/mailregistration',$data);
      } */

    public function registration_success() {
        $this->load->view('accueil/registration_success');
    }

    public function forgetPassword() {
        //mettre la fonction qui vérifie que l'email existe pour un utilisateur et envoi le mail

        $this->load->view('accueil/forgetPassword');
    }

    public function entercode($id) {
        try {
            $internaute = Internaute::where('id', '=', $id)->get();
            $this->_internaute = $internaute[0];
            if ($this->_internaute->codeverification == $this->input->post('code')) {
                $val = array(
                    'codeverification' => NULL,
                    'etat' => 1,
                );
                $this->_internaute->update($val);
                //$intM = Internaute::where('id','=',$id)->update($val);
                //$this->load->view('accueil/registration_success');
                header("location:" . base_url() . "accueil/registration_success");
            }
        } catch (Illuminate\Database\QueryException $exc) {
            $msg = array('error' => 1, 'erreur' => 'Erreur de données' . $exc->errorInfo[2]);
            $this->load->view('accueil/entercode/' . $id, $msg);
        }
        $this->load->view('accueil/entercode');
    }

    public function register() {


        $this->verifiechampRegister();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('accueil/register');
        } else {
            $val = $this->valeurformulaire();
            try {
                $to = $val['mail'];
                $subject = 'enregistrement sur Persona- Plateforme de recrutement de ART';
                $data['code'] = $val['codeverification'];
                $inte = Internaute::create($val);
                $intc = Internaute::where('codeverification', '=', $val['codeverification'])->get();
                $intc = $intc[0];
                $data['id'] = $intc->id;
                $this->sendEmail($subject, $to, $data);
                $this->session->set_userdata('success', 1);
                $this->session->set_userdata('msg', 'inscription réussi, entrez le code que vous avez recu par mail');
                echo $this->email->print_debugger();
            } catch (Illuminate\Database\QueryException $exc) {
                $msg = array('error' => 1, 'erreur' => 'Erreur de données' . $exc->errorInfo[2]);
                $this->load->view('accueil/register', $msg);
            }
        }
    }

    private function verifiechampRegister() {
        /* set_error_delimiters permet d'encadrer l'erreur */
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('firstname', 'le Prénom', 'required|min_length[3]|max_length[25]', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('lastname', 'le Nom', 'required|min_length[3]|max_length[25]', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('email', 'adresse email', 'required', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('password', 'le mot de passe', 'required|min_length[6]|max_length[25]', array(
            'required' => 'le %s est obligatoire .'
        ));
        $this->form_validation->set_rules('passwordconf', 'la confirmation du mot de passe', 'required|matches[password]', array(
            'required' => 'le %s est obligatoire.',
            'matches' => 'le mot de passe ne correspond pas au mot de passe confirmé'
        ));
    }

    private function valeurformulaire() {
        $valeurs = array(
            'nom' => $this->input->post('lastname'),
            'prenom' => $this->input->post('firstname'),
            'mail' => $this->input->post('email'),
            'motDePasse' => $this->input->post('password'),
            'codeverification' => $this->random_str(8),
            'etat' => 0,
        );
        return $valeurs;
    }

    public function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

    public function sendEmail($subject, $to, $code) {
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
        $this->email->message($this->load->view('accueil/mailregistration', $code, TRUE));
        $this->email->set_newline("\r\n");
        $this->email->send();
    }
    
    
    private function chargerObjet(){
        $obj = new Internaute(array(
            'mail' =>  $this->input->post('email'),
            'motDePasse' =>  $this->input->post('password')
        ));
        
        return $obj;
    }
    
    private function existe_connexion($obj){
        $resultat = Internaute::where('mail', '=', $obj->mail)->where('motDePasse', '=', $obj->motDePasse)->where('etat','!=',0)->get();
        
        if( sizeof($resultat) == 1){
            $this->_internaute = $resultat[0];
            return TRUE;
        }else{
            $this->_internaute=NULL;
            return FALSE;
        }
      
    }

}
