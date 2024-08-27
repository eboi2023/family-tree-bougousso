<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_auth');
		$this->load->model('model_users');
	}
	public function index(){
		redirect('dashboard', 'refresh');
	}
	/* 
		Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	public function login()
	{

		$this->logged_kl_in();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
           // true case
           	$email_exists = $this->model_auth->check_email($this->input->post('email'));

           	if($email_exists == TRUE) {
           		$login = $this->model_auth->login($this->input->post('email'), $this->input->post('password'));

           		if($login) {

           			$logged_kl_in_sess = array(
           				'id' => $login['id'],
				        'username'  => $login['username'],
				        'email'     => $login['email'],
				        'prenom'     => $login['firstname'],
				        'nom'     => $login['lastname'],
				        'phone'     => $login['phone'],
				        'photo'     => $login['photo'],
				        'sexe'     => $login['gender'],
				        'logged_kl_in' => TRUE
					);

					$this->session->set_userdata($logged_kl_in_sess);
					if ($this->session->userdata('url')) {
						redirect($this->session->userdata('url'), 'refresh');
					} else {
						redirect('dashboard', 'refresh');
					}
					
           			
           		}
           		else {
           			$this->data['errors'] = get_phrase('Incorrect username/password combination',4);
           			$this->load->view('login', $this->data);
           		}
           	}
           	else {
           		$this->data['errors'] = get_phrase('Email does not exists',4);

           		$this->load->view('login', $this->data);
           	}	
        }
        else {
            // false case
           redirect('home', 'refresh');
        }	
	}

	/*
		clears the session and redirects to login page
	*/
	public function logout()
	{
		/*$logged_kl_in_sess = array('id','username','email','prenom','nom','phone','sexe','logged_kl_in');
		$this->session->unset_userdata($logged_kl_in_sess);*/
		$this->session->sess_destroy();
		redirect('auth/login', 'refresh');
	}

}
