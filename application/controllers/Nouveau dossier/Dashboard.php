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
		
		//$this->load->model('model_products');
		//$this->load->model('model_orders');
		//$this->load->model('model_caisses');
		$this->load->model('model_users');
		$this->load->model('Personne_model');
		//$this->load->model('model_stores');
		//$this->load->model('model_reservation');
		$this->load->model('rapport_model');
		$this->load->model('Caisse_model');
		$this->load->library('form_validation');
		$this->load->model('model_company');
		$this->load->model('Reuion_model');
		
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
		
		if (isset($_SESSION['date_interval0001'])==true || isset($_SESSION['date_interval0002'])==true) {

			$somm=$this->Caisse_model->aff_somme_entrer(3,null,null,$_SESSION['date_interval0001'],$_SESSION['date_interval0002']);
			$this->data['e_caissekiosque']=$this->sete($somm['total']);

			$somm=$this->Caisse_model->aff_somme_sortie(4,null,$_SESSION['date_interval0001'],$_SESSION['date_interval0002']);
			$this->data['s_caissekiosque'] = $this->sete($somm['total']);

			$somm=$this->Caisse_model->aff_somme_entrer(1,null,null,$_SESSION['date_interval0001'],$_SESSION['date_interval0002']);
			$this->data['e_caisselavage']=$this->sete($somm['total']);

			$somm=$this->Caisse_model->aff_somme_sortie(2,null,$_SESSION['date_interval0001'],$_SESSION['date_interval0002']);
			$this->data['s_caisselavage'] = $this->sete($somm['total']);

			$somm=$this->Caisse_model->aff_somme_entrer(5,null,null,$_SESSION['date_interval0001'],$_SESSION['date_interval0002']);
			$this->data['e_caisseexterne']=$this->sete($somm['total']);

			$somm=$this->Caisse_model->aff_somme_sortie(6,null,$_SESSION['date_interval0001'],$_SESSION['date_interval0002']);
			$this->data['s_caisseexterne'] = $this->sete($somm['total']);
			$this->data['years'] = $_SESSION['dateannee'];
			
			
			$actionlavage=$this->nbrewiter(2,$_SESSION['dateannee']);
			$actionkiosque=$this->nbrewiter(5,$_SESSION['dateannee']);
			$this->data['dateactionreport'] = get_phrase('to').' '.date('d M Y',$_SESSION['date_interval0001']).' '.get_phrase('a').' '.date('d M Y',$_SESSION['date_interval0002']);
		}else{

			$somm=$this->Caisse_model->aff_somme_entrer(3,Null,Null,Null,Null);
			$this->data['e_caissekiosque']=$this->sete($somm['total']);

			$somm=$this->Caisse_model->aff_somme_sortie(4,null,Null,Null);
			$this->data['s_caissekiosque']=$this->sete($somm['total']);

			$somm=$this->Caisse_model->aff_somme_entrer(1,null,null,Null,Null);
			$this->data['e_caisselavage']=$this->sete($somm['total']);

			$somm=$this->Caisse_model->aff_somme_sortie(2,null,Null,Null);
			$this->data['s_caisselavage'] = $this->sete($somm['total']);

			$somm=$this->Caisse_model->aff_somme_entrer(5,null,null,Null,Null);
			$this->data['e_caisseexterne']=$this->sete($somm['total']);

			$somm=$this->Caisse_model->aff_somme_sortie(6,null,Null,Null);
			$this->data['s_caisseexterne'] = $this->sete($somm['total']);
			
			$actionlavage=$this->nbrewiter(2,date('Y'));
			$actionkiosque=$this->nbrewiter(5,date('Y'));

			$this->data['dateactionreport'] = '';
			$this->data['years'] = date('Y');
			
		}
		$mois="'".get_phrase('January')."', '".get_phrase('February')."', '".get_phrase('March')."', '". get_phrase('April')."', '".get_phrase('May')."', '". get_phrase('June')."', '".get_phrase('July')."', '".get_phrase('Aout')."', '".get_phrase('September')."', '".get_phrase('October')."', '".get_phrase('November')."', '".get_phrase('December')."'";
		$this->data['moiss'] = $mois;

		
		$this->data['actionkiosque'] = $actionkiosque;
		$this->data['actionlavage'] = $actionlavage;
		$somm=$this->Caisse_model->aff_somme_entrer(1);
		$v = $somm['total'];
		$somm=$this->Caisse_model->aff_somme_sortie(2);
		$entcaissel=$v-$somm['total'];
		$this->data['caissel'] = $this->sete($entcaissel);
		$somm=$this->Caisse_model->aff_somme_entrer(3);
		$v = $somm['total'];
		$somm=$this->Caisse_model->aff_somme_sortie(4);
		$entcaissek=$v-$somm['total'];
		$this->data['caissek'] = $this->sete($entcaissek);
		$somm=$this->Caisse_model->aff_somme_entrer(5);
		$v = $somm['total'];
		$somm=$this->Caisse_model->aff_somme_sortie(6);
		$entcaisseg=$v-$somm['total'];
		$this->data['momey'] = $this->sete($entcaisseg);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['liste_rapport'] = $this->rapport_model->aff_rapport_complet2();
		$valeur_tran=$this->rapport_model->recep_calender();
        $this->data['aff_service'] = $this->Reuion_model->lire_listes_Reuion();
        if (!$this->input->post()){
			$this->render_template('dashboard', $this->data);
		}else{
			if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
				$this->session->set_flashdata('basicWarning', get_phrase('Error Password'));
				redirect('dashboard', 'refresh');
			}
			if ($this->input->post('envoi')==get_phrase('view')){
      				redirect('domino/listepage/'.$this->input->post('verifcode'), 'refresh');
				
				
			}
		}

		
	}
	public function refresh(){
		$recupet = array('date_interval0001','date_interval0002', 'dateannee');
        $this->session->unset_userdata($recupet);
		$this->session->set_flashdata('basicWarning', get_phrase('page refeesh'));
		redirect('dashboard', 'refresh');
	}
	public function repportintervaldate(){
		
		$ce=$this->input->post('depart');
		$e = $ce.'-01-01';
		$a_date1 = explode("-", $e);
		$date_realisation1 = mktime(0,0,0,$a_date1[1],$a_date1[2],$a_date1[0]);
        $e = $ce.'-12-31';
        $a_date1 = explode("-", $e);
        $date_realisation2 = mktime(23,59,59,$a_date1[1],$a_date1[2],$a_date1[0]);
    	$da = array( 
          'date_interval0001' => $date_realisation1,
          'date_interval0002' => $date_realisation2,
          'dateannee' => $this->input->post('depart')
        );
        $this->session->set_userdata($da);
  		redirect('dashboard', 'refresh');
	}

	public function nbrewiter($porte,$datebd){
		$ta="";
		for ($t=1; $t <=12 ; $t++) { 
			$e = $datebd.'-'.$t.'-01';
			
			$a_date1 = explode("-", $e);
			
			$date_realisation1 = mktime(0,0,0,(int)$a_date1[1],(int)$a_date1[2],(int)$a_date1[0]);
			if ($t == 12) {
				$dateb=$datebd+1;
				$e = $dateb.'-01-01';
		        $a_date1 = explode("-", $e);
		        $date_realisation2 = mktime(0,0,0,(int)$a_date1[1],(int)$a_date1[2],(int)$a_date1[0]);
			} else {
				$f=$t+1;
				if ($t<10) {
					$e = $datebd.'-0'.$f.'-01';
				} else {
					$e = $datebd.'-'.$f.'-01';
				}
		        $a_date1 = explode("-", $e);
		        $date_realisation2 = mktime(0,0,0,(int)$a_date1[1],(int)$a_date1[2],(int)$a_date1[0]);
			}
			/*echo var_dump($date_realisation1);
			echo var_dump($date_realisation2);*/
			
			$voi=$this->Caisse_model->AffFourni($porte,$date_realisation1,$date_realisation2);
	        $ta.=$voi['cptes'].',';
	        
		}
			/*echo var_dump($ta);
		        exit();*/

		$pass=substr($ta,0,-1)/*'65, 59, 80, 81, 56, 55, 40, 129'*/;
		return $pass;
	}
	
		

}