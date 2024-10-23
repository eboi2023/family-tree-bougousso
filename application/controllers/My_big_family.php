<?php 

class My_big_family extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();
		$this->load->model('Langue_model');
		$this->load->model('Personne_model');
		$this->data['company_info'] = $this->model_company->getCompanyData(1);
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		redirect('dashboard', 'refresh');
	}
	public function tree()
	{
	  	$session_data = $this->session->userdata();
		if(!in_array('updateCompany', $this->permission) || $session_data['logged_kl_in'] != TRUE) {
            redirect('dashboard', 'refresh');
        }
        $this->data['page_title'] = 'tree big family';
        $this->data['titre'] = 'tree big family';
		$this->data['lien'] = 'tree big family';
		$this->data['icon'] = '<i class="fa fa-sitemap"></i>';
		$this->data['type_langue'] = $this->Langue_model->fechTypeLangueList();
		$this->data['aff_langue'] = $this->Langue_model->aff_laguage_complet();
		$this->render_template('my_big_family/tree.php', $this->data);
        
	  	
	}
	public function list()
	{
	  	$session_data = $this->session->userdata();
		if(!in_array('updateCompany', $this->permission) || $session_data['logged_kl_in'] != TRUE) {
            redirect('dashboard', 'refresh');
        }
        $this->data['page_title'] = 'list big family';
        $this->data['titre'] = 'list big family';
		$this->data['lien'] = 'list big family';
		$this->data['icon'] = '<i class="fa fa-sitemap"></i>';
		$this->data['type_langue'] = $this->Langue_model->fechTypeLangueList();
		$this->data['aff_langue'] = $this->Langue_model->aff_laguage_complet();
		$this->render_template('my_big_family/list.php', $this->data);
        
	  	
	}

	
}