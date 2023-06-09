<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class reponses extends CI_Controller{

    public function __construct()
    {
        $cle=$this->input->get('cle');
    }

    public function rep($cle){
        $this->load->model('model_reponses');
        
        if($this->model_reponses->isOpen())
        {
            //On va sur la page pour voter
            $this->load->view('reponse');
        }   
        else
        {
            //SInon on indique a l'utilisateur que la vue n'est pas possible
            $this->load->view('sondageFerme');    
        }
    }

    public function answer()
    {
        $this->load->model('modelAddAnswer');
        $this->load->view('sendCheck');
    }
}
?>