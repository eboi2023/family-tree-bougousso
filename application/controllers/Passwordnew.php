<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Passwordnew extends Admin_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->model('model_auth');
		
		

	}
	
	public function index()
	{
		$this->data['page_title'] = 'passwordnew';
		$this->render_primary('template/password_new_template', $this->data);
		 
	}

	public function envoie()
	{		
		
		$email_exists = $this->model_auth->check_email($this->input->post('email'));
		if($email_exists == TRUE) {
			$data = $this->input->post('email');
			$encrypted =$this->encrpte_vamail($data);
			
			$this->data['page_title'] = 'Error';
			$this->render_printer('template/pageconfirme_template1', $this->data);
		}else{
			$this->data['page_title'] = 'Error';
			$this->render_printer('template/pageconfirme_template2', $this->data);
		}
		
	}/*echo base_url('/passwordnew/restor/?vue='.$encrypted);*/

	public function restor()
	{
		if ($this->input->get('vue')) {
			$data = $this->input->get('vue');
			$decrypted = $this->decrpte_vamail($data);
			if ($decrypted['action'] ==true) {
				$this->data['mail'] = $decrypted['mail'];
				$this->data['page_title'] = 'passwordnew';
				$this->render_primary('template/restorpassword_template', $this->data);
			}else{
				$this->data['page_title'] = 'Error';
				$this->render_printer('template/ErrorPage_template', $this->data);
			}
			
		}
	}
	
	
	
}

/*  
		
		End of file welcome.php $this->data['page_title'] = 'passwordnew';

		$this->render_primary('template/password_reste_template.php', $this->data);*/
/* Location: ./application/controllers/welcome.php redirect('envoie.php', 'refresh');*/