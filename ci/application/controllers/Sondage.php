<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sondage extends CI_Controller{

    public function creation(){
        $this->load->model('model_sondage');
        
        $this->form_validation->set_rules('titre','Titre','required');
        $this->form_validation->set_rules('lieu','Lieu','required');
        $this->form_validation->set_rules('descriptif','Descriptif','required');
        $this->form_validation->set_rules('dates','Dates','required');
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('layout/header');
            $this->load->view('create_sondage');
            $this->load->view('layout/footer');
        } else{
            $titre=$this->input->post('titre');
            $lieu=$this->input->post('lieu');
            $descriptif=$this->input->post('descriptif');
            // Faire un tableau pour les dates
            //$dates=$this->input->;
            $cle=$this->model_sondage->random_kiki();
            $this->model_sondage->creation($titre,$lieu,$descriptif,$dates,$cle);
        }


        public function fermeture($cle){

        }

    }

}
?>