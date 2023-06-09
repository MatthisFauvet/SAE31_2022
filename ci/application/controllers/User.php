<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function create()
	{
		$this->load->model('model_user');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom', 'required');
		$this->form_validation->set_rules('prenom', 'Prénom', 'required');
		$this->form_validation->set_rules('email', 'Adresse mail', 'valid_email|required');
		$this->form_validation->set_rules('password', 'current password', 'min_length[5]|required');
		$this->form_validation->set_rules('cpassword', 'confirm password', 'required|matches[password]');
		$this->form_validation->set_rules('login', 'Login', 'min_length[3]|required');


		if ($this->form_validation->run() === FALSE){
			$this->load->view('layout/header');
			$this->load->view('create_user_form');
			$this->load->view('layout/footer');
		}else{
			$name=$this->input->post('nom');
			$prenom=$this->input->post('prenom');
			$email=$this->input->post('email');
			$passhash = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			$login=$this->input->post('login');
			$this->model_user->creerCompte($name,$prenom,$email,$passhash,$login);
			redirect('/user/login');
		}
	}

	public function login()
	{
		$this->load->model('model_user');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('login','current login','min_length[3]|required');
		$this->form_validation->set_rules('password', 'current password', 'min_length[5]|required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('layout/header');
			$this->load->view('login');
			$this->load->view('layout/footer');
		} else {
			$login=$this->input->post('login');
			$password=$this->input->post('password');
			$hash = $this->model_user->authentification($login);
			if($hash){
				if(password_verify($password,$hash)){
					$this->load->library('session');
					$this->session->set_userdata('logged',$this->model_user->info($login));
					redirect('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
				} else {
					echo 'T\'ES NUL!';
				}
			}
		}
	}
}
