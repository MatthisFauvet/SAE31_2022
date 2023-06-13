<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class reponses extends CI_Controller{

    public function __construct()
    {
        $cle=$this->input->get('cle');
    }

    public function rep($cle)
    {
        $this->load->model('Model_reponses');
        $sondage = $this->Model_reponses->getInfos($cle);
        $dateprop = $this->Model_reponses->getDate($cle);
        $status = $this->Model_reponses->isOpen($cle);
        
        if($status==1)
        {
            //On va sur la page pour voter
            $this->answer();
        }   
        else
        {
            //SInon on indique a l'utilisateur que la vue n'est pas possible
            $this->load->view('sondageFerme');
        }
    }

    public function answer()
    {
        $this->load->model('model_reponses');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','min_length[3]|required');
        $this->form_validation->set_rules('prenom', 'Prenom', 'min_length[3]|required');
    
        if($this->form_validation->run() === FALSE){
            $this->load->view('layout/header');
            $this->load->view('View_Reponses',['sondage'=>$sondage, 'date'=>$dateprop]);
			$this->load->view('layout/footer');
		} else {
			$login=$this->input->post('login');
			$password=$this->input->post('password');
			$hash = $this->model_user->authentification($login);
			if($hash){
				if(password_verify($password,$hash)){
					$this->load->library('session');
					$this->session->set_userdata('logged',$this->model_user->info($login));
					redirect('/consulter/profil');
				} else {
					$erreur="Login credentials invalid";
					$this->load->view('layout/header');
					$this->load->view('login',['erreur'=>$erreur]);
					$this->load->view('layout/footer');
				}
			} else {
				$erreur="Login credentials invalid";
				$this->load->view('layout/header');
				$this->load->view('login',['erreur'=>$erreur]);
				$this->load->view('layout/footer');
			}
		}
    }  
}
?>