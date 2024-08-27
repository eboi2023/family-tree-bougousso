<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();

		$this->data['page_title'] = 'Company';

    $this->load->model('Langue_model');
		$this->load->model('model_company');
    $this->load->library('form_validation');
	}

    /* 
    * It redirects to the company page and displays all the company information
    * It also updates the company information into the database if the 
    * validation for each input field is successfully valid
    */
	public function index()
	{  
        if(!in_array('updateCompany', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		$this->form_validation->set_rules('company_name', 'Company name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
	
	
        if ($this->form_validation->run() == TRUE) {
            // true case
            //gestion d'image logo left
              if ($_FILES['getlogo']['name']=='') {
               $lien_img1 =$this->input->post('img1');
              } else {
                $r=$this->file_upload->do_image_upload('getlogo','','logo_white.png');
                if ( $r['file_name']==false)
                {
                  $error = array('error' => $this->upload->display_errors());
                  $lien_img1 ='';
                }
                else
                {
                   $lien_img1 = $r['file_name'];
                }
              }

            //gestion d'image logo1
              if ($_FILES['getimage1']['name']=='') {
               $lien_img2 =$this->input->post('ico');
              } else {
                $r=$this->file_upload->do_image_upload('getimage1','','favicon.ico');
                if ( $r['file_name']==false)
                {
                  $error = array('error' => $this->upload->display_errors());
                  $lien_img2 ='';
                }
                else
                {
                   $this->file_upload->create_other_size($r['full_path']);
                   $lien_img2 = $r['file_name'];
                }
              }

            //gestion d'image logo2
              if ($_FILES['getimage2']['name']=='') {
               $lien_img3 =$this->input->post('logo_ico');
              } else {
                $r=$this->file_upload->do_image_upload('getimage2','','logo.png');
                if ( $r['file_name']==false)
                {
                  $error = array('error' => $this->upload->display_errors());
                  $lien_img3 =$this->input->post('logo_ico');
                }
                else
                {
                   $this->file_upload->create_other_size($r['full_path']);
                   $lien_img3 = $r['file_name'];
                }
              }

        	$data = array(

                'company_name' => $this->input->post('company_name'),
                'action_logo' => $this->input->post('symbole'),
                'pseudo' => $this->input->post('company_pseudo'),
                'company_poste' => $this->input->post('address_poste'),
                'company_mail' => $this->input->post('mail'),
                'phone' => $this->input->post('phone'),
                'country' => $this->input->post('country'),
                'address' => $this->input->post('address'),
                'currency' => $this->input->post('currency'),
                'writen' => $this->input->post('writen'),
                'template' => $this->input->post('template'),
        		'model_template' => $this->input->post('model'),
        		'description_company' => $this->input->post('description')
        	);
            
            if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
                $this->session->set_flashdata('erreur_code', 'Mot de passe incorrecte');
                redirect('company/', 'refresh');
            }


        	$update = $this->model_company->update($data, 1);
        	if($update == true) {
        		$this->session->set_flashdata('basicInfo', 'Successfully created');
                redirect('company/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('basicErreur','Error occurred!!');
        		redirect('company/index', 'refresh');
        	}
        }
        else {

            // false case
            
          $this->data['titre'] = 'Company';
          $this->data['lien'] = 'Company';
          $this->data['icon'] = '<i class="fa fa-files-o"></i>';
          $this->data['type_langue'] = $this->Langue_model->fechTypeLangueList();
          $this->data['currency_symbols'] = $this->currency();
        	$this->data['company_data'] = $this->model_company->getCompanyData(1);
          $this->render_template('company/index', $this->data);			
        }	

		
	}

}