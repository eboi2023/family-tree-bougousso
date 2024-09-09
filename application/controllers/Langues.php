<?php 

class Langues extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();
		$this->load->model('Langue_model');
		$this->data['page_title'] = 'Listes languague';

		$this->data['company_info'] = $this->model_company->getCompanyData(1);
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		$session_data = $this->session->userdata();
		if(!in_array('updateCompany', $this->permission) || $session_data['logged_kl_in'] != TRUE) {
            redirect('dashboard', 'refresh');
        }
		$this->data['titre'] = 'La liste des Langue';
		$this->data['lien'] = 'La liste des langue';
		$this->data['icon'] = '<i class="fa fa-bomb"></i>';
		$this->data['type_langue'] = $this->Langue_model->fechTypeLangueList();
		$this->data['aff_langue'] = $this->Langue_model->aff_laguage_complet();
		/*$this->data['info_tranlect'] = $this->translect();*/
		$this->render_template('langue/index.php', $this->data);
	}
	public function update_langue()
	{
	  	
		$session_data = $this->session->userdata();
		if(!in_array('updateCompany', $this->permission) || $session_data['logged_kl_in'] != TRUE) {
            redirect('dashboard', 'refresh');
        }
        if ($this->Langue_model->insertLangueList()==true) {
	  		$this->session->set_flashdata('basicInfo', get_phrase('Successfully_Updated',3));
		    redirect('langues', 'refresh');
	  	} else {
	  		$this->session->set_flashdata('basicErreur', get_phrase('revoie',3));
		    redirect('langues', 'refresh');
	  	}
	  	
	}
	public function option(){
		$session_data = $this->session->userdata();
		if(!in_array('updateCompany', $this->permission) || $session_data['logged_kl_in'] != TRUE) {
            redirect('dashboard', 'refresh');
        }
        $tab=$this->Langue_model->Option_Langue();

        if ($tab['optact'] == 1) {
	  		if ($tab['verifval'] == 0) {
	  			if ($tab['verifvaltab'] == 0) {
	  				if ($tab['verifvaltab'] == true) {
	  					$this->session->set_flashdata('basicInfo', get_phrase('Successfully_created',3));
	  					redirect('langues', 'refresh');
	  				}else{
	  					if ($tab['verifvaltab'] == false) {
	  						$this->session->set_flashdata('basicErreur', get_phrase('transmision_error',3));
			    			redirect('langues', 'refresh');
	  					}else{
	  						$this->session->set_flashdata('basicWarning', get_phrase('check_the_database',3));
				    		redirect('langues', 'refresh');
	  					}
	  				}
	  			}else{contract
	  				if ($tab['verifvaltab'] ==1) {
	  					$this->session->set_flashdata('basicWarning', get_phrase('check_the_database',3));
				    	redirect('langues', 'refresh');
	  				}else{
	  					$this->session->set_flashdata('basicErreur', get_phrase('transmision_error',3));
			    		redirect('langues', 'refresh');
	  				}
	  			}
	  		}else{
	  			if ($tab['verifval'] == 1) {
		  			$this->session->set_flashdata('basicWarning', get_phrase('the_language_already_exists',3));
		    		redirect('langues', 'refresh');
		  		}else{
		  			$this->session->set_flashdata('basicErreur', get_phrase('transmision_error',3));
			    	redirect('langues', 'refresh');
		  		}
	  		}
	  	} else {
	  		if ($tab['optact'] == 2) {
		  		
	  		if ($tab['verifval'] == 0) {
	  			if ($tab['verifvaltab'] == 0) {
	  				if ($tab['verifvaltab'] == true) {
	  					$this->session->set_flashdata('basicInfo', get_phrase('Successfully_deleted',3));
	  					redirect('langues', 'refresh');
	  				}else{
	  					if ($tab['verifvaltab'] == false) {
	  						$this->session->set_flashdata('basicErreur', get_phrase('transmision_error',3));
			    			redirect('langues', 'refresh');
	  					}else{
	  						$this->session->set_flashdata('basicWarning', get_phrase('check_the_database',3));
				    		redirect('langues', 'refresh');
	  					}
	  				}
	  			}else{contract
	  				if ($tab['verifvaltab'] ==1) {
	  					$this->session->set_flashdata('basicWarning', get_phrase('check_the_database',3));
				    	redirect('langues', 'refresh');
	  				}else{
	  					$this->session->set_flashdata('basicErreur', get_phrase('transmision_error',3));
			    		redirect('langues', 'refresh');
	  				}
	  			}
	  		}else{
	  			if ($tab['verifval'] == 1) {
		  			$this->session->set_flashdata('basicWarning', get_phrase('the_language_already_exists',3));
		    		redirect('langues', 'refresh');
		  		}else{
		  			$this->session->set_flashdata('basicErreur', get_phrase('transmision_error',3));
			    	redirect('langues', 'refresh');
		  		}
	  		}
		  	} else {
		  		$this->session->set_flashdata('basicErreur', get_phrase('transmision_error',3));
			    redirect('langues', 'refresh');
		  	}
	  	}
	}

	
}