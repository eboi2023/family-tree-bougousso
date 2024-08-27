<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Admin_Controller {

public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->data['page_title'] = 'home';
		$this->render_primary('template/landingPage_template', $this->data);
		 
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */