<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends Admin_Controller {

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
		$this->data['page_title'] = 'register';
		$this->render_primary('template/register_template', $this->data);$
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */