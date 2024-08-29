<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();

		$this->data['page_title'] = 'Dashboard';
		$this->data['lien'] = 'Dashboard';
	    $this->data['icon'] = '<i class="fa fa-home"> </i>';

		$this->load->model('model_users');
		$this->load->model('model_company');

		$this->load->library('form_validation');

		$this->data['company_info'] = $this->model_company->getCompanyData(1);
		$this->data['company_currency'] = $this->company_currency();
		$this->data['position'] = $this->company_currency_position();
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		
			$this->render_template('template/adminPage_template.php', $this->data);
	}
	
		

}