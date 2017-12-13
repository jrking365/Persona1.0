<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employes extends CI_Controller {

    private $_utilisateur;
    private $_poste;

    public function index() {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->_poste = Poste::find($this->_utilisateur->Pos_id);
        $data['utilisateur'] = $this->_utilisateur;
        $data['poste'] = $this->_poste;
        //$data['departement'] = 
        //mettre le code ici

        $this->load->view('admin_header', $data);
        $this->load->view('employes/menuPersonnel');
        $this->load->view('admin_footer');
        $this->load->view('employes/jsmenuPersonnel');
        $this->load->view('employes/jsDatatable');
    }
    
    public function testsplit(){
        var_dump($this->createMatricule("Bonjour", "Bonsoir"));
    }

    public function add() {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));
        $this->_poste = Poste::find($this->_utilisateur->Pos_id);
        $data['utilisateur'] = $this->_utilisateur;
        $data['poste'] = $this->_poste;
        $data1['postes'] = Poste::all();
        $data1['groupes'] = Groupe::all();

        //mettre le code ici
        $this->verifiechamp();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin_header', $data);
            $this->load->view('employes/ajouter', $data1);
            $this->load->view('admin_footer');
        } else {
            $val = $this->valeurformulaire();
            try {
                $to = $val['mail'];
                $subject = 'enregistrement sur Persona- Plateforme de ressource Humaine de ART';
                $data2['mail'] = $to;
                $data2['password'] = $val['motDePasse'];
                $uti = Utilisateur::create($val);
                $this->sendEmail($subject, $to, $data2);
                $this->session->set_userdata('success', 1);
                $this->session->set_userdata('msg', 'enregistrement réussi');
                echo $this->email->print_debugger();
                 header('Location:'.base_url().'Employes/index');
            } catch (Illuminate\Database\QueryException $exc) {
               
                $data1['error'] =1;
                $data1['erreur'] ='Erreur de données' . $exc->errorInfo[2]; 
                $this->load->view('admin_header', $data);
                $this->load->view('employes/ajouter', $data1);
                $this->load->view('admin_footer');
            }
        }
       
    }

    public function listegenerale() {
        if ($this->session->userdata('utilisateur') == NULL) {
            header('location:' . base_url() . 'controle47/index');
        }
        $this->_utilisateur = unserialize($this->session->userdata('utilisateur'));

        $employes = Utilisateur::all();
        $data['employes'] = $employes;

        $this->load->view('employes/listegenerale', $data);
    }

    private function verifiechamp() {
        /* set_error_delimiters permet d'encadrer l'erreur */
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('firstname', 'Prénom', 'required|min_length[3]|max_length[25]', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('lastname', 'Nom', 'required|min_length[3]|max_length[25]', array(
            'required' => 'le %s est obligatoire.'
        ));

        $this->form_validation->set_rules('email', 'adresse email', 'required|min_length[8]', array(
            'required' => '%s est obligatoire.'
        ));


        $this->form_validation->set_rules('sexe', 'le sexe', 'required', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('telephone', 'le numero de télephone', 'required', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('groupe', 'groupe', 'required', array(
            'required' => 'le %s est obligatoire.'
        ));
        $this->form_validation->set_rules('poste', 'poste  ', 'required', array(
            'required' => 'le %s est obligatoire.'
        ));
    }

    private function valeurformulaire() {
        $groupe = Groupe::where('libelle', '=', $this->input->post('groupe'))->get()[0];
        $poste = Poste::where('nom', '=', $this->input->post('poste'))->get()[0];
        $valeurs = array(
            'nom' => $this->input->post('lastname'),
            'prenom' => $this->input->post('firstname'),
            'sexe' => $this->input->post('sexe'),
            'telephone' => $this->input->post('telephone'),
            'matricule' => $this->createMatricule($poste->nom, $groupe->libelle),
            'Pos_id' => $poste->id,
            'Gro_id' => $groupe->id,
            'mail' => $this->input->post('email'),
            'login' => $this->input->post('email'),
            'motDePasse' => $this->generate_password(8),
        );
        return $valeurs;
    }

    /**
     * génerer un matricule a partir du poste et du groupe
     * @param type $poste
     * @param type $groupe
     * @return type
     */
    public function createMatricule($poste, $groupe) {
        $p = substr($poste, 0, 2);
        $g = substr($groupe, 0, 2);
        $d = date("y");
        $mat = "$p$g$d"; //retrourne le matricule chaine de 6 caracteres;
        return $mat;
    }

    /**
     * génerer un mot de passe de huit caractère
     * @param type $length
     * @param type $keyspace
     * @return type
     */
    public function generate_password($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

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
        $this->email->message($this->load->view('employes/mail_creation', $data, TRUE));
        $this->email->set_newline("\r\n");
        $this->email->send();
    }

}
