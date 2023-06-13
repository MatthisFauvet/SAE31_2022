<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulter extends CI_Controller {

    public function profil()
    {
        $this->load->library('session');
        $this->load->model('Model_consulter');
        $login=$this->session->logged['login'];
        $infos=$this->Model_consulter->aff_profil($login);

        $this->load->view('layout/header');
        $this->load->view('View_profil',['infos'=>$infos]);
        $this->load->view('layout/footer');
    }


    public function regarder()
    {
        $this->load->library('session');
        $this->load->model('Model_consulter');
        $sondage=$this->Model_consulter->recup_sond($this->input->get('cle'));
        $propositions=$this->Model_consulter->recup_prop($this->input->get('cle'));
        $participants=$this->Model_consulter->recup_par($this->input->get('cle'));
    
        $this->load->view('layout/header');
        $array[0]=$sondage;
        $array[1]=$propositions;
        $array[2]=$participants;
        $this->load->view('View_consulter',['array'=>$array]);
        $this->load->view('layout/footer');
    }
}