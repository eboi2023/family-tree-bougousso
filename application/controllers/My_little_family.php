<?php 

class My_little_family extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();
		$this->load->model('Langue_model');
		$this->data['page_title'] = 'list little family';
		$this->data['company_info'] = $this->model_company->getCompanyData(1);
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		if(!in_array('updateCompany', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		$this->data['titre'] = 'list little family';
		$this->data['lien'] = 'list little family';
		$this->data['icon'] = '<i class="fa fa-sitemap"></i>';
		$this->data['type_langue'] = $this->Langue_model->fechTypeLangueList();
		$this->data['aff_langue'] = $this->Langue_model->aff_laguage_complet();
		$this->render_template('my_little_family/index.php', $this->data);
	}
	public function update_langue()
	{
	  	if(!in_array('updateCompany', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        if ($this->Langue_model->insertLangueList()==true) {
	  		$this->session->set_flashdata('basicInfo', get_phrase('Successfully Updated'));
		    redirect('Langue/', 'refresh');
	  	} else {
	  		$this->session->set_flashdata('basicErreur', get_phrase('revoie'));
		    redirect('langue/', 'refresh');
	  	}
	  	
	}
	public function option(){
		if(!in_array('updateCompany', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        if ($this->Langue_model->Option_Langue()==true) {
	  		$this->session->set_flashdata('basicInfo', get_phrase('Successfully created'));
		    redirect('Langue/', 'refresh');
	  	} else {
	  		$this->session->set_flashdata('basicErreur', get_phrase('revoie'));
		    redirect('langue/', 'refresh');
	  	}
		
	}

	
}