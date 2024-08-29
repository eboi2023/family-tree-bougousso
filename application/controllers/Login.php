<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Admin_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('model_auth');
		$this->load->model('model_company');
		$this->load->model('model_users');
		$this->load->model('model_groups');
		$this->load->model('model_localization');
		

	}
	
	public function index()
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
           			$this->data['errors'] = get_phrase('Incorrect username/password combination',3);
           			// false case
		            $this->data['page_title'] = 'login';
					$this->render_primary('template/login_template.php', $this->data);
           		}
           	}
           	else {
           		$this->data['errors'] = get_phrase('Email does not exists',3);

           		// false case
	            $this->data['page_title'] = 'login';
				$this->render_primary('template/login_template.php', $this->data);
           	}	
        }
        else {
        	$this->data['errors'] = '';
            // false case
            $this->data['page_title'] = 'login';
			$this->render_primary('template/login_template.php', $this->data);
        }
		 
	}

	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */