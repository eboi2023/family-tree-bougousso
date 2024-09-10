<?php 

class Users extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();
		
		$this->data['page_title'] = 'Users';
		

		$this->load->model('Model_users');
		$this->load->model('Model_groups');
		$this->load->model('Model_localization');
		
		$this->load->model('Diplome_model');
	    $this->load->model('Nationalite_model');
	    $this->load->model('Pays_model');
	    $this->load->model('Ville_model');
	    $this->load->model('Commune_model');
	    $this->load->model('Contact_model');
	    $this->load->model('Niveau_etude_model');
	    $this->load->model('Fonction_fonctionnaire_model');
	    $this->load->model('Personne_model');
		$this->load->library('form_validation');
	}

	
	public function index()
	{
		if(!in_array('viewUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->data['lien'] = 'personal';
	    $this->data['icon'] = '<i class="fa fa-apple"> </i>';

		$user_data = $this->Model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;
			/*echo var_dump($v);*/
		}

		$this->data['user_data'] = $result;
		$this->data['group_poste'] = $this->Model_users->listes_groups();
		$this->render_template('users/index', $this->data);
	}

	public function create()
	{
		if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$this->form_validation->set_rules('groups', 'Group', 'required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
		$this->form_validation->set_rules('fname', 'First name', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
        	$email_exists = $this->model_auth->check_email($this->input->post('email'));
        	if ($email_exists == true) {
        		$this->session->set_flashdata('success', get_phrase('ce mail existe deja'));
        		redirect('Users/', 'refresh');
        	}
        	$data = array(
        		'username' => $this->input->post('username'),
        		'password' => "$2y$10$56d1yFnG7UC7wJx9u9JmVe30p8t.nTY0DBEFnhdBD4r6LNdZZZlcq",
        		'email' => $this->input->post('email'),
        		'firstname' => $this->input->post('fname'),
        		'lastname' => $this->input->post('lname'),
        		'phone' => $this->input->post('phone'),
        		'gender' => $this->input->post('gender'),
        		'id_localization' => $this->input->post('localization')
        	);

        	$create = $this->Model_users->create($data, $this->input->post('edit_active'));
        	if($create == true) {
        		$this->session->set_flashdata('success', get_phrase('Successfully created'));
        		redirect('Users/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', get_phrase('Error occurred!!'));
        		redirect('Users', 'refresh');
        	}
        }
        else {
            // false case
        	$group_data = $this->Model_groups->getGroupData();
        	$countrygroup = $this->Model_localization->getListCountryData();
        	$citygroup = $this->Model_localization->getListCityData();
        	$street_or_neighborhoodgroup = $this->Model_localization->getListStreetOrNeighborhoodgroupData();
        	$this->data['group_data'] = $group_data;
        	$this->data['list_country'] = $countrygroup;
        	$this->data['list_city'] = $citygroup;
        	$this->data['list_street_or_neighborhood'] = $street_or_neighborhoodgroup;


            $this->render_template('users/index', $this->data);
        }	

		
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}

	public function edit($id = null)
	{
		if(!in_array('updateUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			$this->data['id'] = $id;
			$this->form_validation->set_rules('groups', 'Group', 'required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('apassword')) && empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	if ($this->input->post('localization'=='')) {
		        		$vloca=1;
		        	}else{
		        		$trucposition=$this->input->post('localization');
			        	$cpt = explode(",", $trucposition);
			        	if($this->Model_localization->SelectCountryData($cpt[0]) == false){
			        		$this->session->set_flashdata('error', get_phrase('Error country no existe!!'));
		        			redirect('Users/setting/', 'refresh');
			        	}
			        	$valueixist1=$this->Model_localization->SelectCountryData($cpt[0]);
			        	$port1=$valueixist1['id'];
			        	if($this->Model_localization->SelectCityData($port1,trim($cpt[1])) == false){
			        		/*create city*/
			        		$datacity = array(
			        		'id_pays' => $port1,
			        		'nom_fr' => trim($cpt[1])
			        		);
			        		$this->Model_localization->CreateCityData($datacity);
				        }
				        /*select city*/

				        $valueixiste2=$this->Model_localization->SelectCityData($port1,trim($cpt[1]));
				        $port2=$valueixiste2['id'];
				        
				        if (count($cpt)>2) {
				        	$der=count($cpt)-1;
				        	$recuperation='';
				        	for ($t=2; $t < $der; $t++) { 
				        		$recuperation.=$cpt[$t].',';
				        	}
				        	$recuperation.=$cpt[$der];
				        }else{
				        	$recuperation=$cpt[2];
				        }
				        
				        if($this->Model_localization->SelectZoneData($port2,trim($recuperation)) == false){
				        	
					        $datazone = array(
			        		'id_ville' => $port2,
			        		'nom_fr' => trim($recuperation)
			        		);
				        	$this->Model_localization->CreateZoneData($datazone);
					    }
					    /*select zone*/
					    $valueixiste3=$this->Model_localization->SelectZoneData($port2,trim($recuperation));
					    $port3=$valueixiste3['id'];
					    /*verif on localization*/
					    if ($this->Model_localization->SelectLocalizationData($port1,$port2,$port3)==false) {
					    	# create in localization
					    	$datalocalisation = array(
			        		'id_pays' => $port1,
			        		'id_ville' => $port2,
			        		'id_zone' => $port3
			        		);
				        	$this->Model_localization->CreateLocalizationData($datalocalisation);
					    }
					    $valuelocalisation=$this->Model_localization->SelectLocalizationData($port1,$port2,$port3);
					   	$vloca=$valuelocalisation['id'];
		        	}
		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
		        		'firstname' => $this->input->post('fname'),
		        		'lastname' => $this->input->post('lname'),
		        		'phone' => $this->input->post('phone'),
		        		'gender' => $this->input->post('gender'),
		        		'id_localization' => $vloca
		        	);

		        	$update = $this->Model_users->edit($data, $id, $this->input->post('groups'));
		        	if($update == true) {
		        		$this->session->set_flashdata('success', get_phrase('Successfully Updated'));
		        		redirect('Users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', get_phrase('Error occurred!!'));
		        		redirect('Users/edit/'.$id, 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('apassword', 'Password', 'trim|required|min_length[8]');
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {
						$veirfication=$this->Model_users->verific($id, $this->password_hash($this->input->post('apassword')));
						if ($veirfication==true && $this->password_hash($this->input->post('password')) == $this->password_hash($this->input->post('cpassword'))) {
							$password = $this->password_hash($this->input->post('password'));
						}else{
							$this->session->set_flashdata('errors', get_phrase('Error occurred!!'));
			        		redirect('Users/edit/'.$id, 'refresh');
						}
						

						if ($this->input->post('localization'=='')) {
			        		$vloca=1;
			        	}else{
			        		$trucposition=$this->input->post('localization');
				        	$cpt = explode(",", $trucposition);
				        	if($this->Model_localization->SelectCountryData($cpt[0]) == false){
				        		$this->session->set_flashdata('error', get_phrase('Error country no existe!!'));
			        			redirect('Users/setting/', 'refresh');
				        	}
				        	$valueixist1=$this->Model_localization->SelectCountryData($cpt[0]);
				        	$port1=$valueixist1['id'];
				        	if($this->Model_localization->SelectCityData($port1,trim($cpt[1])) == false){
				        		/*create city*/
				        		$datacity = array(
				        		'id_pays' => $port1,
				        		'nom_fr' => trim($cpt[1])
				        		);
				        		$this->Model_localization->CreateCityData($datacity);
					        }
					        /*select city*/

					        $valueixiste2=$this->Model_localization->SelectCityData($port1,trim($cpt[1]));
					        $port2=$valueixiste2['id'];
					        
					        if (count($cpt)>2) {
					        	$der=count($cpt)-1;
					        	$recuperation='';
					        	for ($t=2; $t < $der; $t++) { 
					        		$recuperation.=$cpt[$t].',';
					        	}
					        	$recuperation.=$cpt[$der];
					        }else{
					        	$recuperation=$cpt[2];
					        }
					        
					        if($this->Model_localization->SelectZoneData($port2,trim($recuperation)) == false){
					        	
						        $datazone = array(
				        		'id_ville' => $port2,
				        		'nom_fr' => trim($recuperation)
				        		);
					        	$this->Model_localization->CreateZoneData($datazone);
						    }
						    /*select zone*/
						    $valueixiste3=$this->Model_localization->SelectZoneData($port2,trim($recuperation));
						    $port3=$valueixiste3['id'];
						    /*verif on localization*/
						    if ($this->Model_localization->SelectLocalizationData($port1,$port2,$port3)==false) {
						    	# create in localization
						    	$datalocalisation = array(
				        		'id_pays' => $port1,
				        		'id_ville' => $port2,
				        		'id_zone' => $port3
				        		);
					        	$this->Model_localization->CreateLocalizationData($datalocalisation);
						    }
						    $valuelocalisation=$this->Model_localization->SelectLocalizationData($port1,$port2,$port3);
						   	$vloca=$valuelocalisation['id'];
			        	}
		        	
						$data = array(
			        		'username' => $this->input->post('username'),
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
			        		'firstname' => $this->input->post('fname'),
			        		'lastname' => $this->input->post('lname'),
			        		'phone' => $this->input->post('phone'),
			        		'gender' => $this->input->post('gender'),
			        		'id_localization' => $vloca
			        	);

			        	$update = $this->Model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', get_phrase('Successfully updated'));
			        		redirect('Users/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', get_phrase('Error occurred!!'));
			        		redirect('Users/edit/'.$id, 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->Model_users->getUserData($id);
			        	$groups = $this->Model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->Model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->render_template('users/edit', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->Model_users->getUserData($id);
	        	$groups = $this->Model_users->getUserGroup($id);
	        	$countrygroup = $this->Model_localization->getListCountryData();
	        	$citygroup = $this->Model_localization->getListCityData();
	        	$street_or_neighborhoodgroup = $this->Model_localization->getListStreetOrNeighborhoodgroupData();

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;
	        	$this->data['list_country'] = $countrygroup;
	        	$this->data['list_city'] = $citygroup;
	        	$this->data['list_street_or_neighborhood'] = $street_or_neighborhoodgroup;

	            $group_data = $this->Model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->render_template('users/edit', $this->data);	
	        }	
		}	
	}

	public function delete($id)
	{
		if(!in_array('deleteUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {
					$delete = $this->Model_users->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('succes', get_phrase('Successfully removed'));
		        		redirect('Users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', get_phrase('Error occurred!!'));
		        		redirect('Users/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('users/delete', $this->data);
			}	
		}
	}

	public function profile()
	{
		if(!in_array('viewProfile', $this->permission) || !in_array('updateProfile', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$this->data['page_title'] = 'Mon profil';
		$this->data['titre'] = 'profil';
    	$this->data['lien'] = 'Profil';
		$this->data['icon'] = '<i class="fa fa-user-o"></i>';
		$user_id = $this->session->userdata('id');

		$user_data = $this->Model_users->getUserData($user_id);
		$this->data['info_user'] = $user_data;

		$user_group = $this->Model_users->getUserGroup($user_id);
		$this->data['user_group'] = $user_group;

		$info_personel = $this->Personne_model->RecuperationDonnepersonnel($user_data['id_info']);
		$this->data['info_personel'] = $info_personel;
		$this->data['info_parentp'] = $this->Personne_model->listes_parents(1,$info_personel['id']);
		$this->data['info_parentm'] = $this->Personne_model->listes_parents(2,$info_personel['id']);
		$info_nationalite = $this->Nationalite_model->RecuperationDonnenationalite($info_personel['id_nationalite']);
		$this->data['info_nationalite'] = $info_nationalite;
		$info_contact = $this->Contact_model->RecuperationDonnecontact($info_personel['id_contact']);
		$this->data['info_contact'] = $info_contact;
		$adresse_pers = array('id_personne' => $info_personel['id'] );
		$info_adresse = $this->Commune_model->recep_adresse($adresse_pers);
		$this->data['info_adresse'] = $info_adresse;
		$info_pays = $this->Pays_model->RecuperationDonnepays($info_adresse['id_pays']);
		$this->data['info_pays'] = $info_pays;
		$info_ville = $this->Ville_model->RecuperationDonneville($info_adresse['id_ville']);
		$this->data['info_ville'] = $info_ville;
		$info_commune = $this->Commune_model->RecuperationDonnecommue($info_adresse['id_commune']);
		$this->data['info_commune'] = $info_commune;
		$info_rq = $this->Commune_model->RecuperationDonnerq($info_adresse['id_localisation']);
		$this->data['info_qr'] = $info_rq;
		$this->render_template('users/profile', $this->data);
	}

	public function setting()
	{	
		if(!in_array('updateSetting', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$id = $this->session->userdata('id');

		if($id) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	if ($this->input->post('localization'=='')) {
		        		$vloca=1;
		        	}else{
		        		$trucposition=$this->input->post('localization');
			        	$cpt = explode(",", $trucposition);
			        	if($this->Model_localization->SelectCountryData($cpt[0]) == false){
			        		$this->session->set_flashdata('error', get_phrase('Error country no existe!!'));
		        			redirect('Users/setting/', 'refresh');
			        	}
			        	$valueixist1=$this->Model_localization->SelectCountryData($cpt[0]);
			        	$port1=$valueixist1['id'];
			        	if($this->Model_localization->SelectCityData($port1,trim($cpt[1])) == false){
			        		/*create city*/
			        		$datacity = array(
			        		'id_pays' => $port1,
			        		'nom_fr' => trim($cpt[1])
			        		);
			        		$this->Model_localization->CreateCityData($datacity);
				        }
				        /*select city*/

				        $valueixiste2=$this->Model_localization->SelectCityData($port1,trim($cpt[1]));
				        $port2=$valueixiste2['id'];
				        
				        if (count($cpt)>2) {
				        	$der=count($cpt)-1;
				        	$recuperation='';
				        	for ($t=2; $t < $der; $t++) { 
				        		$recuperation.=$cpt[$t].',';
				        	}
				        	$recuperation.=$cpt[$der];
				        }else{
				        	$recuperation=$cpt[2];
				        }
				        
				        if($this->Model_localization->SelectZoneData($port2,trim($recuperation)) == false){
				        	
					        $datazone = array(
			        		'id_ville' => $port2,
			        		'nom_fr' => trim($recuperation)
			        		);
				        	$this->Model_localization->CreateZoneData($datazone);
					    }
					    /*select zone*/
					    $valueixiste3=$this->Model_localization->SelectZoneData($port2,trim($recuperation));
					    $port3=$valueixiste3['id'];
					    /*verif on localization*/
					    if ($this->Model_localization->SelectLocalizationData($port1,$port2,$port3)==false) {
					    	# create in localization
					    	$datalocalisation = array(
			        		'id_pays' => $port1,
			        		'id_ville' => $port2,
			        		'id_zone' => $port3
			        		);
				        	$this->Model_localization->CreateLocalizationData($datalocalisation);
					    }
					    $valuelocalisation=$this->Model_localization->SelectLocalizationData($port1,$port2,$port3);
					   	$vloca=$valuelocalisation['id'];
		        	}
		        	

		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
		        		'firstname' => $this->input->post('fname'),
		        		'lastname' => $this->input->post('lname'),
		        		'phone' => $this->input->post('phone'),
		        		'gender' => $this->input->post('gender'),
		        		'id_localization' => $vloca
		        	);

		        	$update = $this->Model_users->edit($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', get_phrase('Successfully updated'));
		        		redirect('Users/setting/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', get_phrase('Error occurred!!'));
		        		redirect('Users/setting/', 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						if ($this->input->post('localization'=='')) {
			        		$vloca=1;
			        	}else{
			        		$trucposition=$this->input->post('localization');
				        	$cpt = explode(",", $trucposition);
				        	if($this->Model_localization->SelectCountryData($cpt[0]) == false){
				        		$this->session->set_flashdata('error', get_phrase('Error country no existe!!'));
			        			redirect('Users/setting/', 'refresh');
				        	}
				        	$valueixist1=$this->Model_localization->SelectCountryData($cpt[0]);
				        	$port1=$valueixist1['id'];
				        	if($this->Model_localization->SelectCityData($port1,trim($cpt[1])) == false){
				        		/*create city*/
				        		$datacity = array(
				        		'id_pays' => $port1,
				        		'nom_fr' => trim($cpt[1])
				        		);
				        		$this->Model_localization->CreateCityData($datacity);
					        }
					        /*select city*/

					        $valueixiste2=$this->Model_localization->SelectCityData($port1,trim($cpt[1]));
					        $port2=$valueixiste2['id'];
					        
					        if (count($cpt)>2) {
					        	$der=count($cpt)-1;
					        	$recuperation='';
					        	for ($t=2; $t < $der; $t++) { 
					        		$recuperation.=$cpt[$t].',';
					        	}
					        	$recuperation.=$cpt[$der];
					        }else{
					        	$recuperation=$cpt[2];
					        }
					        
					        if($this->Model_localization->SelectZoneData($port2,trim($recuperation)) == false){
					        	
						        $datazone = array(
				        		'id_ville' => $port2,
				        		'nom_fr' => trim($recuperation)
				        		);
					        	$this->Model_localization->CreateZoneData($datazone);
						    }
						    /*select zone*/
						    $valueixiste3=$this->Model_localization->SelectZoneData($port2,trim($recuperation));
						    $port3=$valueixiste3['id'];
						    /*verif on localization*/
						    if ($this->Model_localization->SelectLocalizationData($port1,$port2,$port3)==false) {
						    	# create in localization
						    	$datalocalisation = array(
				        		'id_pays' => $port1,
				        		'id_ville' => $port2,
				        		'id_zone' => $port3
				        		);
					        	$this->Model_localization->CreateLocalizationData($datalocalisation);
						    }
						    $valuelocalisation=$this->Model_localization->SelectLocalizationData($port1,$port2,$port3);
						   	$vloca=$valuelocalisation['id'];
			        	}

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
			        		'firstname' => $this->input->post('fname'),
			        		'lastname' => $this->input->post('lname'),
			        		'phone' => $this->input->post('phone'),
			        		'gender' => $this->input->post('gender'),
			        		'id_localization' => $vloca
			        	);

			        	$update = $this->Model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', get_phrase('Successfully updated'));
			        		redirect('Users/setting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', get_phrase('Error occurred!!'));
			        		redirect('Users/setting/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->Model_users->getUserData($id);
			        	$groups = $this->Model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->Model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->render_template('users/setting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->Model_users->getUserData($id);
	        	$groups = $this->Model_users->getUserGroup($id);
	        	$countrygroup = $this->Model_localization->getListCountryData();
	        	$citygroup = $this->Model_localization->getListCityData();
	        	$street_or_neighborhoodgroup = $this->Model_localization->getListStreetOrNeighborhoodgroupData();

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;
	        	$this->data['list_country'] = $countrygroup;
	        	$this->data['list_city'] = $citygroup;
	        	$this->data['list_street_or_neighborhood'] = $street_or_neighborhoodgroup;

	            $group_data = $this->Model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->render_template('users/setting', $this->data);	
	        }	
		}
	}

	//modification du password employee
  	public function modifier_mdp()
  	{
	    if(!in_array('updateProfile', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
	    $this->data['page_title'] = 'Modifier Mdp | Administration';
	    $this->data['lien'] = 'modifier mdp';
	    $this->data['titre'] = 'modifier mdp';
	    $this->data['icon'] = '<i class="fa fa-wrench"> </i>';
	    $this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required');

		if($this->form_validation->run() == TRUE) {
			if ($this->input->post('password') == $this->input->post('cpassword')) {
				if ($this->Model_users->veux($this->session->userdata('id'),$this->input->post('apassword'))==true) {
					$data = array(
		        		'password' => $this->password_hash($this->input->post('password'))
		        	);
		        	$update = $this->Model_users->edit($data, $this->session->userdata('id'));
		        	if($update == true) {
		        		$this->session->set_flashdata('success_code', get_phrase('Successfully updated'));
		        		redirect('Users/modifier_mdp/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('erreur_code', get_phrase('Error occurred!!'));
		        		redirect('Users/modifier_mdp/', 'refresh');
		        	}
				} else {
					$this->session->set_flashdata('erreur_code', get_phrase('acien mot de passe incorrect'));
				redirect('Users/modifier_mdp/', 'refresh');
				}
			}else{
				$this->session->set_flashdata('erreur_code', get_phrase('les deux mot de passe sont different'));
				redirect('Users/modifier_mdp/', 'refresh');
			}
		
		}else{
			$this->render_template('users/MDP', $this->data);
		}
    } 

    //Tout le fonction contenu de la page de modifier d'information sur l'utilisateur
	public function modifier_profil($a)
	{
	    if(!in_array('updateProfile', $this->permission)) {
			redirect('dashboard', 'refresh');
		}elseif(empty($this->session->userdata('logged_kl_in')))
	    {
	      redirect('admin');

	    }elseif($this->input->post('modifier-profil') !== null) 
	    {
	    	if ($a==4) {
	    		//gestion d'image
        		if ($_FILES['getimage']['name']=='') {
        			$this->session->set_flashdata('message', get_phrase('Mise a jour avec succes'));
          			redirect('users/profile/','refresh');
        		}else{
        			$r=$this->file_upload->do_image_upload('getimage','membres/','test');
		            if ( $r['file_name']==false){
		            	$this->session->set_flashdata('message', get_phrase('Mise a jour avec succes'));
          				redirect('users/profile/','refresh');
		            }else{
		            	$this->file_upload->create_other_size($r['full_path']);
              			$lien_img = $r['file_name'];
		            }
		            $mise_en_form = array(
		              'lien_photo' => $lien_img
		            );
		            $id_p= array(
		              'id' => $this->input->post('id_personne')
		            );
		            if ($this->Personne_model->mise_a_jour_info_personne($id_p,'personne',$mise_en_form)==true) {
		            	$mise_en_form2 = array(
							'photo' => $lien_img
						);
						$id_p= array(
			              'id_info' => $this->input->post('id_personne')
			            );
			            if ($this->Personne_model->mise_a_jour_info_personne($id_p,'users',$mise_en_form2)) {
			            	unlink (FCPATH. './uploads/membres/'.$this->input->post('userfile'));
			                $this->session->set_flashdata('message', get_phrase('Profil mis a jour'));
			                redirect('users/profile/','refresh');
			            } else {
			            	$this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
		            		redirect('users/profile/','refresh');
			            }
		            } else {
		            	$this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
		            	redirect('users/profile/','refresh');
		            }
		            
        		}
	    	}

	    	if ($a==3) {
	    		$new_contact = array();
	    		if ($this->input->post('pays')) {
	    			$new_contact+= array(
			          'id_pays' => $this->input->post('pays')
			        );
			    }
	    		if ($this->input->post('ville')) {
	    			if ($this->input->post('ville')==0) {
	    				$data_id_ville = array('id_pays' => $this->input->post('pays'),'nom_fr' => $this->input->post('valeur_autre_ville') );
				        if ($this->Ville_model->verif_ville($data_id_ville)==true) {}
				        else {
				          $this->Ville_model->create_ville($data_id_ville);
				        }
				        $aff=$this->Ville_model->recep_ville($data_id_ville);
	    				$id_ville=$aff['id'];
	    			}else{
	    				$id_ville=$this->input->post('ville');
	    			}
	    			
	    			$new_contact+= array(
			          'id_ville' => $id_ville
			        );
			    }
			    if ($this->input->post('commune')) {
	    			if ($this->input->post('commune')==0) {
	    				$data_id_commune = array('id_ville' => $id_ville,'nom_fr' => $this->input->post('valeur_autre_commune') );
				        if ($this->Commune_model->verif_commune($data_id_commune)==true) {}
				        else {
				          $this->Commune_model->create_commune($data_id_commune);
				        }
				        $aff=$this->Commune_model->recep_commune($data_id_commune);
	    				$id_commune=$aff['id'];
	    			}else{
	    				$id_commune=$this->input->post('commune');
	    			}
	    			
	    			$new_contact+= array(
			          'id_commune' => $id_commune
			        );
			    }

			    $nom_rue=$this->input->post('rue');
		        $nom_quartier=$this->input->post('quartier');
		        $nom_residence=$this->input->post('residence');
		        $niveau=$this->input->post('position');

		        $additional_localisation = array(
		          'nom_quartier' => $nom_quartier,
		          'nom_rue' => $nom_rue,
		          'type_residence' =>  $nom_residence,
		          'niveau_residence' => $niveau,
		          'id_commune' => $id_commune
		        );
		        if ($this->Commune_model->verif_localisation($additional_localisation)==true) {}
		        else {
		          $this->Commune_model->create_localisation($additional_localisation);
		        }
		        $aff=$this->Commune_model->recep_localisation($additional_localisation);
	    		$id_localisation=$aff['id'];
		        $new_contact+= array(
		          'id_localisation' => $id_localisation
		        );
		        $verif_contact= array(
		          'id_localisation' => $id_localisation,
		          'id_personne' => $this->input->post('id_personne')
		        );
		        
		        if ($this->Commune_model->verif_adresse($verif_contact)==true) {
		        	$this->session->set_flashdata('message', get_phrase('Profil mis a jour'));
		    		redirect('users/profile/','refresh');
		        }
		        else {
		        	$this->Commune_model->delete_adresse($this->input->post('id_personne'));
		        	$new_contact+= array(
			          'id_personne' => $this->input->post('id_personne')
			        );
		          $this->Commune_model->create_adresse($new_contact);
		          $this->session->set_flashdata('message', get_phrase('Profil mis a jour'));
		    			redirect('users/profile/','refresh');
		        }
		        
	    	}

	    	if ($a==2) {
	    		$new_contact = array();
	    		if ($this->input->post('numtel')!='') {
	    			$new_contact+= array(
			          'tel' => $this->input->post('numtel')
			        );
	    		}
	    		if ($this->input->post('numcel')!='') {
	    			$new_contact+= array(
			          'cel' => $this->input->post('numcel')
			        );
	    		}
	    		if ($this->input->post('email')!='') {
	    			$new_contact+= array(
			          'email' => $this->input->post('email')
			        );
	    		}
	    		if ($this->input->post('adressepost')!='') {
	    			$new_contact+= array(
			          'adresse_postal' => $this->input->post('adressepost')
			        );
	    		}
	    		if ($this->input->post('faxe')!='') {
	    			$new_contact+= array(
			          'faxe' => $this->input->post('faxe')
			        );
	    		}
	    		if ($this->input->post('lien_fb')!='') {
	    			$new_contact+= array(
			          'lien_facebook' => $this->input->post('lien_fb')
			        );
	    		}
	    		if ($this->input->post('numero_whatsapp')!='') {
	    			$new_contact+=array(
			          'numero_whatsapp' => $this->input->post('numero_whatsapp')
			        );
	    		}
	    		if ($this->Contact_model->Majcontct($new_contact,$this->input->post('id_contact'))==true) {
	    			$additional_data1 = array(
				      'phone' => $this->input->post('id_contact')
				    );
				    if ($this->input->post('email')!='') {
		    			$additional_data1+= array(
				          'email' => $this->input->post('email')
				        );
				    }
					if ($this->Model_users->MajProfil($additional_data1,$this->session->userdata('id'))==true) {
						$this->session->set_flashdata('message', get_phrase('Profil mis a jour'));
		    			redirect('users/profile/','refresh');
					}else{
						$this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
			            redirect('users/modifier_profil/2','refresh');
					}
	    		} else {
	    			$this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
		            redirect('users/modifier_profil/2','refresh');
	    		}
	    	}

	    	if ($a==1) {
	    		$info_person = array();
	    		$info_second = array();
	    		if ($this->input->post('civilite')!='') {
	    			$info_person+= array(
			          'civilite' => $this->input->post('civilite')
			        );
			        
					$info_second+= array(
			          'gender' => $this->input->post('civilite')
			        );
	    		}

	    		if ($this->input->post('surnom')!='') {
	    			$info_person+= array(
			          'pseudo' => $this->input->post('surnom')
			        );
			        $info_second+= array(
			          'username' => $this->input->post('surnom')
			        );
	    		}

	    		if ($this->input->post('nom')!='') {
	    			$info_person+= array(
			          'nom' => $this->input->post('nom')
			        );
			        $info_second+= array(
			          'firstname' => $this->input->post('nom')
			        );
	    		}

	    		if ($this->input->post('prenom')!='') {
	    			$info_person+= array(
			          'prenom' => $this->input->post('prenom')
			        );
			        $info_second+= array(
			          'lastname' => $this->input->post('prenom')
			        );
	    		}

	    		if ($this->input->post('date_naiss')!='') {
	    			$info_person+= array(
			          'date_naiss' => $this->input->post('date_naiss')
			        );
	    		}

	    		if ($this->input->post('lieu_naiss')!='') {
	    			$info_person+= array(
			          'lieu_naiss' => $this->input->post('lieu_naiss')
			        );
	    		}

	    		if ($this->input->post('national')!='') {
	    			//récuperation des données de la table nationalité
			        $additional_data2 = array(
			          'type_nationalite' => $this->input->post('national')
			        );
			        //verification de existance de cette adresse
			        if ($this->Nationalite_model->verif_nationalite($additional_data2)==true) {}
			        else {
			          $this->Nationalite_model->create_nationalite($additional_data2);
			        }
			        $aff=$this->Nationalite_model->recep_nationalite($additional_data2);
			        $id_nation=$aff['id'];
	    			$info_person+= array(
			          'id_nationalite' => $id_nation
			        );
	    		}

	    		if ($this->input->post('apropos')!='') {
	    			$info_person+= array(
			          'description' => $this->input->post('apropos')
			        );
	    		}
	    		$personneid= array(
					'id' => $this->input->post('id_personne')
			    );
	    		if($this->Personne_model->mise_a_jour_info_personne($personneid,'personne',$info_person)==true){
	    			
					if($this->Model_users->MajProfil( $info_second, intval($this->session->userdata('id')))==true){
						echo  var_dump($this->Model_users->MajProfil($info_second, intval($this->session->userdata('id'))));
						$textr=0;
						if ($this->input->post('numbrep')!='' || $this->input->post('numbrep')!='inconnu') {
							$idenyifi = intval(substr($this->input->post('numbrep'), 1, 4));
							$verif_parent = array(
								'code_m' => $idenyifi
							);
							if ($this->Personne_model->verif_personne($verif_parent)==true) {
								$idpersonneprise=$this->Personne_model->recep_personne($verif_parent);
                				$info_nee_de   = array(
				                  	'id_personne' => $idpersonneprise['id']
				                );
				                $info_rech   = array(
									'id_enfant' =>$this->input->post('id_personne'),
									'type_parent' => 1
				                );
				                if ($this->Personne_model->mise_a_jour_info_personne($info_rech,'nee_de',$info_nee_de)) {
				                  $textr++;
				                }
				                
							}else{
								if ($this->input->post('nomp')!='' && $this->input->post('prenomp')!=='') {
									$parent_data = array(
										'id' => intval($this->input->post('id_p')),
										'nom' => $this->input->post('nomp'),
										'prenom' => $this->input->post('prenomp')
									);
									if ($this->Personne_model->verif_personne($verif_parent)==true){}
									else{
										$created_on=time();
										$nummmbre='sans'.substr(md5(uniqid(rand(), true)), 0, 10);
										$parent_data= array(
											'nom' => $this->input->post('nomp'),
											'prenom' => $this->input->post('prenomp'),
											'num_membre' => $nummmbre,
											'civilite' => 1,
											'created_on' => $created_on
										);
										$this->Personne_model->create_personne($parent_data);
									}
									$aff=$this->Personne_model->recep_personne($parent_data);
	                				$id_parent1=$aff['id'];
	                				$info_nee_de   = array(
					                  	'id_personne' =>intval($id_parent1)
					                );
					                $info_rech   = array(
										'id_enfant' =>intval($this->input->post('id_personne')),
										'type_parent' => 1
					                );
					                if ($this->Personne_model->mise_a_jour_info_personne($info_rech,'nee_de',$info_nee_de)) {
					                  $textr++;
					                }
					            }else{
									$textr++;
								}
							}
						}

						if ($this->input->post('numbrem')!='' || $this->input->post('numbrem')!='inconnu') {
							$idenyifi = intval(substr($this->input->post('numbrem'), 1, 4));
							$verif_parent = array(
								'code_m' => $idenyifi
							);
							if ($this->Personne_model->verif_personne($verif_parent)==true) {
								$idpersonneprise=$this->Personne_model->recep_personne($verif_parent);
                				$info_nee_de   = array(
				                  	'id_personne' => $idpersonneprise['id']
				                );
				                $info_rech   = array(
									'id_enfant' =>$this->input->post('id_personne'),
									'type_parent' => 2
				                );
				                if ($this->Personne_model->mise_a_jour_info_personne($info_rech,'nee_de',$info_nee_de)) {
				                  $textr++;
				                }
				                
							}else{
								if ($this->input->post('nomm')!='' && $this->input->post('prenomm')!=='') {
									$parent_data = array(
										'id' => intval($this->input->post('id_m')),
										'nom' => $this->input->post('nomm'),
										'prenom' => $this->input->post('prenomm')
									);
									if ($this->Personne_model->verif_personne($verif_parent)==true){}
									else{
										$created_on=time();
										$nummmbre='sans'.substr(md5(uniqid(rand(), true)), 0, 10);
										$parent_data= array(
											'nom' => $this->input->post('nomm'),
											'prenom' => $this->input->post('prenomm'),
											'num_membre' => $nummmbre,
											'civilite' => 1,
											'created_on' => $created_on
										);
										$this->Personne_model->create_personne($parent_data);
									}
									$aff=$this->Personne_model->recep_personne($parent_data);
	                				$id_parent1=$aff['id'];
	                				$info_nee_de   = array(
					                  	'id_personne' =>intval($id_parent1)
					                );
					                $info_rech   = array(
										'id_enfant' =>intval($this->input->post('id_personne')),
										'type_parent' => 2
					                );
					                if ($this->Personne_model->mise_a_jour_info_personne($info_rech,'nee_de',$info_nee_de)) {
					                  $textr++;
					                }
					            }else{
									$textr++;
								}
							}
						}

						$this->session->set_flashdata('message', get_phrase('Profil mis a jour'));
		    			redirect('users/profile/','refresh');
		    			echo var_dump($this->input->post('id_personne'));
						
					}else{
						$this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
		            	redirect('users/modifier_profil/1','refresh');
					}
	    		}else{
	    			$this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
		            redirect('users/modifier_profil/1','refresh');
	    		}
	    	}
	    	
	    }
	    else{
	      if ($a==1) {
	        $this->data['actions2'] = 'Modification de votre Profile';
	      }
	      if ($a==2) {
	        $this->data['actions2'] = 'Modification de vos Contacts';
	      }
	      if ($a==3) {
	        $this->data['actions2'] = 'Modification de vos Adresse';
	      }
	      $this->data['page_title'] = 'Modifier mon profil';
	      $this->data['titre'] = 'Profil';
	      $this->data['lien'] = 'Modifier mon profil';
	      $this->data['icon'] = '<i class="fa fa-user-o"></i>';
	      $this->data['modification_donnees'] = $a;
	      $user_id = $this->session->userdata('id');

			$user_data = $this->Model_users->getUserData($user_id);
			$this->data['info_user'] = $user_data;

			$user_group = $this->Model_users->getUserGroup($user_id);
			$this->data['user_group'] = $user_group;

			$info_personel = $this->Personne_model->RecuperationDonnepersonnel($user_data['id_info']);
			$this->data['info_personel'] = $info_personel;
			$this->data['info_parentp'] = $this->Personne_model->listes_parents(1,$info_personel['id']);
			$this->data['info_parentm'] = $this->Personne_model->listes_parents(2,$info_personel['id']);
			$info_nationalite = $this->Nationalite_model->RecuperationDonnenationalite($info_personel['id_nationalite']);
			$this->data['info_nationalite'] = $info_nationalite;
			$this->data['aff_nationalite'] = $this->Nationalite_model->listes_nationalite();
			$info_contact = $this->Contact_model->RecuperationDonnecontact($info_personel['id_contact']);
			$this->data['info_contact'] = $info_contact;
			$adresse_pers = array('id_personne' => $info_personel['id'] );
			$info_adresse = $this->Commune_model->recep_adresse($adresse_pers);
			$this->data['info_adresse'] = $info_adresse;
			$this->data['aff_p'] = $this->Pays_model->listes_pays();
			$info_pays = $this->Pays_model->RecuperationDonnepays($info_adresse['id_pays']);
			$this->data['info_pays'] = $info_pays;
			$this->data['aff_v'] = $this->Ville_model->listes_ville($info_adresse['id_pays']);
			$info_ville = $this->Ville_model->RecuperationDonneville($info_adresse['id_ville']);
			$this->data['info_ville'] = $info_ville;
			$info_commune = $this->Commune_model->RecuperationDonnecommue($info_adresse['id_commune']);
			$this->data['info_commune'] = $info_commune;
			$this->data['aff_c'] = $this->Commune_model->listes_commune($info_adresse['id_ville']);
			$this->data['info_localisation'] = $this->Commune_model->RecuperationDonnerq($info_adresse['id_localisation']);
	      $this->load->helper('form');
	      $this->render_template('users/edit', $this->data);
	    }
    
  	}

  	public function controle_pass(){
	    if ($this->input->post('nouvcode')==$this->input->post('confirnouvcode')) {
	      	$codemodif=md5($this->input->post('anciencode'));
	      	$rapdif = array(
		        'type_code' => $this->input->post('namecode'),
		        'code' => $codemodif
	      	);
	      	if ($this->Model_users->ContrlardEsCode($rapdif)==true) {
	       		$codemodif=md5($this->input->post('nouvcode'));
	        	$temps=time();
	        	$modif = array(
		          'code' => $codemodif,
		          'date_modif' => $temps,
		          'id_user' => $this->input->post('demendeur')
	           	);
	        	if ($this->Model_users->updateEsCode($this->input->post('namecode'),$modif)==true) {
	          		$this->session->set_flashdata('basicInfo', get_phrase('le code a ete modifie avec succes'));
	        	} else {
	         		$this->session->set_flashdata('basicWarning', get_phrase('Nom ou Mot de pass inconnu'));
	        	}
	        
	      	} else {
	        	$this->session->set_flashdata('basicErreur', get_phrase('Mot de pass inconnu'));
	      	}
	    } else {
	      $this->session->set_flashdata('basicWarning', get_phrase('les deux pass sont pas les meme'));
	      
	    }
	    redirect($this->input->post('urlcode'));
    
  	}
	
  	public function fetchlistAdheNotPoste(){
  		$result="";
  		$aff_profA = $this->Personne_model->Affpersonnereel(); 
  		if($aff_profA){
	        foreach($aff_profA as $selectvalue){
	         	$test = array('id_info' => $selectvalue->id );
	          	if ($this->Personne_model->verif_adherent_not_poste($test)==false ) {}
	          	else {
	        		if (strlen($selectvalue->code_m)==1) {
	             		$code='M000'.$selectvalue->code_m.'B' ;
	            	}
	            	if (strlen($selectvalue->code_m)==2) {
	             		$code='M00'.$selectvalue->code_m.'B' ;
	            	}
	            	if (strlen($selectvalue->code_m)==3) {
	              		$code='M0'.$selectvalue->code_m.'B';
	            	}
	            	if (strlen($selectvalue->code_m)==4) {
	              		$code='M'.$selectvalue->code_m.'B';
	            	}
	            	$result.="<option value='".$code."'>".$selectvalue->nom." ".$selectvalue->prenom."</option>";
	          	}
	        }
      	}
  		echo json_encode($result);
  	}

    public function update(){	
    	if(!in_array('updateCode_Modification_poste', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		if ($this->input->post('code_user')) {
			if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
				$this->session->set_flashdata('basicWarning', get_phrase('Error Password'));
				redirect('users', 'refresh');
			}

			if ($this->input->post('verifcode')==1) {
				$idenyifi = intval(substr($this->input->post('code_user'), 1, 4));
		        $recupper = array(
		          'code_m' => $idenyifi
		        );
		        $aff_personne=$this->Personne_model->recep_personne($recupper);
		        $recupper = array(
		          'id_info' => $aff_personne['id']
		        );
		        $aff_admin=$this->Model_users->recep_users($recupper);
		        $recupper = array(
		          'group_id' => $this->input->post('edit_active')
		        );
		        if ($this->Model_users->getcontrole($aff_admin['id']) == false) {
		        	$this->session->set_flashdata('basicWarning', get_phrase('deja un post'));
					redirect('users', 'refresh');
		        }
		        if ($this->Model_users->update_group_users($aff_admin['id'], $recupper)==true) {
		        	$this->session->set_flashdata('basicWarning', get_phrase('Successfully updated'));
		        	redirect('users','refresh');
		        } else {
		        	$this->session->set_flashdata('basicErreur', get_phrase('personne inconnu'));
					redirect('users','refresh');
		        }
			}
			if ($this->input->post('verifcode')==2) {
		        $recupper = array(
		          'group_id' => $this->input->post('code_group')
		        );
		        if ($this->Model_users->getcontrole($this->input->post('code_user')) == true) {
		        	$this->session->set_flashdata('basicWarning', get_phrase('deja supprimer'));
					redirect('users', 'refresh');
		        }
		        if ($this->Model_users->update_group_users($this->input->post('code_user'), $recupper)==true) {
		        	$this->session->set_flashdata('basicWarning', get_phrase('Successfully updated'));
		        	redirect('users','refresh');
		        } else {
		        	$this->session->set_flashdata('basicErreur', get_phrase('personne inconnu'));
					redirect('users','refresh');
		        }
			}
			if ($this->input->post('verifcode')==3) {
		        $recupper = array(
		          'group_id' => 20
		        );
		        if ($this->Model_users->getcontrole($this->input->post('code_user')) == true) {
		        	$this->session->set_flashdata('basicWarning', get_phrase('deja supprimer'));
					redirect('users', 'refresh');
		        }
		        if ($this->Model_users->update_group_users($this->input->post('code_user'), $recupper)==true) {
		        	$this->session->set_flashdata('basicWarning', get_phrase('Successfully updated'));
		        	redirect('users','refresh');
		        } else {
		        	$this->session->set_flashdata('basicErreur', get_phrase('personne inconnu'));
					redirect('users','refresh');
		        }
			}
		} else {
			$this->session->set_flashdata('basicErreur', get_phrase('personne inconnu'));
			redirect('users','refresh');
		}
		

	}

	public function fetchlistposte($d){
		$group_poste = $this->Model_users->listes_groups();
		$result='';
		$result.='<option value="">fait le choix</option>';
        if($group_poste){
            foreach($group_poste as $selectvalue){
                $result.='<option value="'.$selectvalue->id.'"';
                if ($d==$selectvalue->id) {$result.='selected';}
                $result.=' >'.$selectvalue->group_name.'</option>';
            }
        }
        echo json_encode($result);
	}

}