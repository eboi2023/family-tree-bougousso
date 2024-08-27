<?php 

class Langue extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();
		$this->load->model('Langue_model');
		$this->data['page_title'] = 'Listes languague';
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
		$this->data['titre'] = get_phrase('La liste des Langue');
		$this->data['lien'] = get_phrase('La liste des langue');
		$this->data['icon'] = '<i class="fa fa-bomb"></i>';
		$this->data['type_langue'] = $this->Langue_model->fechTypeLangueList();
		$this->data['aff_langue'] = $this->Langue_model->aff_laguage_complet();
		/*$this->data['info_tranlect'] = $this->translect();*/
		$this->render_template('langue/index', $this->data);
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