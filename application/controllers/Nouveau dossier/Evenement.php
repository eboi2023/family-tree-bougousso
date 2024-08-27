<?php 

class Evenement extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();
    $this->load->model('rapport_model');
    $this->load->model('Personne_model');
    $this->load->model('contact_model');

		$this->data['page_title'] = 'Evenement';
		
		$this->load->library('form_validation');
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		if(!in_array('viewEvenement', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$this->data['titre'] = 'Calendrier';
	    $this->data['lien'] = 'evenement';
	    $this->data['icon'] = '<i class="fa fa-calendar"> </i>';
	    $this->load->helper('form');
	    if (!$this->input->post()){
        $valeur_tran=$this->rapport_model->recep_calender();
        $test='';
        foreach ($valeur_tran as $key => $value) {
          if ($value['type_date']==0) {
            $compartedate=mktime(23,59,59,date('m',$value['date_debut']),date('d',$value['date_debut']),date('Y',$value['date_debut']));
            if ($compartedate>=mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))) {
              $test.='{';
              $test.="title          : '".$value['titre']."',";//le titre
              $test.="start          : '".date('Y-m-d H:i',$value['date_debut'])."',";//la date de debut
              $test.="end            : '".date('Y-m-d 23:59',$value['date_debut'])."',";//la date de fin 
              $test.="backgroundColor: '".$value['couleur']."',";//la couleur de fond
              $test.="borderColor    : '".$value['couleur']."'";//la couleur des bordure
              $test.='},';
            }else{
              $test.='{';
              $test.="title          : '".$value['titre']."',";//le titre
              $test.="start          : '".date('Y-m-d H:i',$value['date_debut'])."',";//la date de debut
              $test.="end            : '".date('Y-m-d 23:59',$value['date_debut'])."',";//la date de fin 
              $test.="backgroundColor: '#000000',";//la couleur de fond
              $test.="textColor: '#000000',";//la couleur de fond
              $test.="borderColor    : '#000000'";//la couleur des bordure
              $test.='},';
            }
          }
          if ($value['type_date']==1) {
            $compartedate=mktime(23,59,59,date('m',$value['date_debut']),date('d',$value['date_debut']),date('Y',$value['date_debut']));
            if ($compartedate>=mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))) {
              $test.='{';
              $test.="title          : '".$value['titre']."',";//le titre
              $test.="start          : '".date('Y-m-d H:i',$value['date_debut'])."',";//la date de debut
              $test.="backgroundColor: '".$value['couleur']."',";//la couleur de fond
              $test.="borderColor    : '".$value['couleur']."'";//la couleur des bordure
              $test.='},';
            }else{
              $test.='{';
              $test.="title          : '".$value['titre']."',";//le titre
              $test.="start          : '".date('Y-m-d H:i',$value['date_debut'])."',";//la date de debut 
              $test.="backgroundColor: '#000000',";//la couleur de fond
              $test.="textColor: '#000000',";//la couleur de fond
              $test.="borderColor    : '#000000'";//la couleur des bordure
              $test.='},';
            }
          }
          if ($value['type_date']==2) {
            $compartedate=mktime(date('H',$value['date_fin']),date('i',$value['date_fin']),date('s',$value['date_fin']),date('m',$value['date_fin']),date('d',$value['date_fin']),date('Y',$value['date_fin']));
            if ($compartedate>=mktime(date('H'),date('i'),date('s'),date('m'),date('d'),date('Y'))) {
              $test.='{';
              $test.="title          : '".$value['titre']."',";//le titre
              $test.="start          : '".date('Y-m-d H:i',$value['date_debut'])."',";//la date de debut
              $test.="end            : '".date('Y-m-d H:i',$value['date_fin'])."',";//la date de fin 
              $test.="backgroundColor: '".$value['couleur']."',";//la couleur de fond
              $test.="borderColor    : '".$value['couleur']."'";//la couleur des bordure
              $test.='},';
            }else{
              $test.='{';
              $test.="title          : '".$value['titre']."',";//le titre
              $test.="start          : '".date('Y-m-d H:i',$value['date_debut'])."',";//la date de debut
              $test.="end            : '".date('Y-m-d H:i',$value['date_fin'])."',";//la date de fin 
              $test.="backgroundColor: '#000000',";//la couleur de fond
              $test.="textColor: '#000000',";//la couleur de fond
              $test.="borderColor    : '#000000'";//la couleur des bordure
              $test.='},';
            }
          }
          
        }
        
	    	$test.="{}";
		$this->data['vue_evenement'] = $test;
		$this->render_template('Calendier/index', $this->data);
	    }else{
        if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
            $this->session->set_flashdata('basicErreur', get_phrase('Error Password'));
            redirect('Evenement/', 'refresh');
            /*echo var_dump($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'));*/
        }
        if ($this->input->post('envoi')==get_phrase('enregistrer')) {
          $arrayName = array();
          if ($this->input->post('color')) {
           $arrayName+= array('couleur'=>$this->input->post('color'));
          }
          if ($this->input->post('title')) {
           $arrayName+= array('titre'=>$this->input->post('title'));
          }
          
          if ($this->input->post('lien')) {
           $arrayName+= array('url_info'=>$this->input->post('lien'));
          }
          
          if ($this->input->post('typedate')==0) {
            $e = $this->input->post('d_act');
            $a_date1 = explode("-", $e);
            $e = $this->input->post('h_act');
            $a_date2 = explode(":", $e);
            $date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
            $arrayName+= array('type_date'=>$this->input->post('typedate'));
            $arrayName+= array('date_debut'=>$date_realisation);

          }
          if ($this->input->post('typedate')==1) {
            $e = $this->input->post('d_act');
            $a_date1 = explode("-", $e);
            $e = $this->input->post('h_act');
            $a_date2 = explode(":", $e);
            $date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
            $arrayName+= array('type_date'=>$this->input->post('typedate'));
            $arrayName+= array('date_debut'=>$date_realisation);
          }
          
          if ($this->input->post('typedate')==2) {

            $e = $this->input->post('d_act1');
            $a_date1 = explode("-", $e);
            $e = $this->input->post('h_act1');
            $a_date2 = explode(":", $e);
            $date_realisation1 = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);   
            $e = $this->input->post('d_act2');
            $a_date1 = explode("-", $e);
            $e = $this->input->post('h_act2');
            $a_date2 = explode(":", $e);
            $date_realisation2 = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
            if ($date_realisation1>=$date_realisation2) {
              $this->session->set_flashdata('basicErreur', get_phrase('Error in  controle the date!!'));
              redirect('Evenement/', 'refresh');
            } else {
              $arrayName+= array('date_debut'=>$date_realisation1);
              $arrayName+= array('type_date'=>$this->input->post('typedate'));
              $arrayName+= array('date_fin'=>$date_realisation2);
            }
          }

          if ($this->input->post('typeevenement')==3) {
            /*$mobileNumer = implode(',', $this->input->post('num_personne'));
            $verif= str_repeat($mobileNumer, "1");
            */          
            $arrayName+= array('select_eve'=>json_encode($this->input->post('num_personne')));
          }

          $arrayName+= array('type_evenement'=>$this->input->post('typeevenement'));
          $arrayName+= array('id_user'=>$this->session->userdata('id'));
          /*echo var_dump($arrayName);*/
            $this->rapport_model->Insert31($arrayName);
            $this->session->set_flashdata('basicWarning', get_phrase('Successfully created'));
            redirect('Evenement/', 'refresh');
        }
        if ($this->input->post('envoi')==get_phrase('updated')) {
          $arrayName = array();
          if ($this->input->post('color')) {
           $arrayName+= array('couleur'=>$this->input->post('color'));
          }
          if ($this->input->post('title')) {
           $arrayName+= array('titre'=>$this->input->post('title'));
          }
          
          if ($this->input->post('lien')) {
           $arrayName+= array('url_info'=>$this->input->post('lien'));
          }
          
          if ($this->input->post('typedate')==0) {
            $e = $this->input->post('d_act');
            $a_date1 = explode("-", $e);
            $e = $this->input->post('h_act');
            $a_date2 = explode(":", $e);
            $date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
            $arrayName+= array('type_date'=>$this->input->post('typedate'));
            $arrayName+= array('date_debut'=>$date_realisation);

          }
          if ($this->input->post('typedate')==1) {
            $e = $this->input->post('d_act');
            $a_date1 = explode("-", $e);
            $e = $this->input->post('h_act');
            $a_date2 = explode(":", $e);
            $date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
            $arrayName+= array('type_date'=>$this->input->post('typedate'));
            $arrayName+= array('date_debut'=>$date_realisation);
          }
          
          if ($this->input->post('typedate')==2) {

            $e = $this->input->post('d_act1');
            $a_date1 = explode("-", $e);
            $e = $this->input->post('h_act1');
            $a_date2 = explode(":", $e);
            $date_realisation1 = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);   
            $e = $this->input->post('d_act2');
            $a_date1 = explode("-", $e);
            $e = $this->input->post('h_act2');
            $a_date2 = explode(":", $e);
            $date_realisation2 = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
            if ($date_realisation1>=$date_realisation2) {
              $this->session->set_flashdata('basicErreur', get_phrase('Error in  controle the date!!'));
              redirect('Evenement/', 'refresh');
            } else {
              $arrayName+= array('date_debut'=>$date_realisation1);
              $arrayName+= array('type_date'=>$this->input->post('typedate'));
              $arrayName+= array('date_fin'=>$date_realisation2);
            }
            
            
          }

          if ($this->input->post('typeevenement')==3) {
            /*$mobileNumer = implode(',', $this->input->post('num_personne'));
            $verif= str_repeat($mobileNumer, "1");
            */          
            $arrayName+= array('select_eve'=>json_encode($this->input->post('num_personne')));
          }

          $arrayName+= array('type_evenement'=>$this->input->post('typeevenement'));
          $arrayName+= array('id_user'=>$this->session->userdata('id'));
          /*echo var_dump($arrayName);*/

          $this->rapport_model->mise_a_jourcalederByID($this->input->post('verifcode'),$arrayName);
          $this->session->set_flashdata('basicWarning', get_phrase('Successfully updated'));
          redirect('Evenement/', 'refresh');
        }
        if ($this->input->post('envoi')==get_phrase('Supprimer')) {
          $insert_data = array( 
            'id' => $this->input->post('verifcode')
          );
          if ($this->rapport_model->delete_evenement($insert_data)==true) {
            $this->session->set_flashdata('basicWarning', get_phrase('Successfully deleted'));
            redirect('Evenement/', 'refresh');
          }

        }
        if ($this->input->post('envoi')==get_phrase('envoie donnees')) {
          $aff_service = $this->Personne_model->Affpersonnereel2();
          foreach ($aff_service as $key => $value) {
            $pure = array('id' => $value['id_contact'] );
            $aff_contact = $this->contact_model->recep_contact($pure);
            
            $tel[$key]=$aff_contact['cel'];
          }
          $mobile=$tel;
          $message=$this->input->post('editesms');  

          $data=$this->input->post();
          /*print_r($data);
          exit();*/
          $authkey = '';
          unset($data['submit']);

          $mobileNumer = implode(',', $mobile);
          $verif= str_repeat($mobileNumer, "1");
          

print_r($verif);
          exit();
          $senderId = '';

          $route=4;

          $postData = array(
            'authkey' => $authkey, 
            'mobiles' => $mobile, 
            'message' => $message, 
            'sender'  => $senderId, 
            'route'   => $route
          );
          $url = "http://api.";
          $ch = curl_init();
          curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData 
          ));

          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          $output = curl_exec($ch);
          if (curl_errno($ch)) {
            echo 'error' . curl_errno($ch);
          }
          curl_close($ch);
          echo"<p>Reponse ID: ".$output."Message succ </p>";

          echo var_dump($this->input->post('verifcode'));
        }

	    }
		
	}
  public function fetchcalendrierData(){
    $num=0;
    $valeur_tran=$this->rapport_model->recep_calender();
    $result = array('data' => array());   
    foreach ($valeur_tran as $key => $value) {
      if ($value['type_date']==0) {
        $dates1=date('Y-m-d H:i',$value['date_debut']);//la date de debut
        $dates2=date('Y-m-d 23:59',$value['date_debut']);//la date de fin
      }
      if ($value['type_date']==1) {
        $dates1=date('Y-m-d H:i',$value['date_debut']);//la date de debut
        $dates2="";
      }
      if ($value['type_date']==2) {
        $dates1=date('Y-m-d H:i',$value['date_debut']);//la date de debut
        $dates2=date('Y-m-d H:i',$value['date_fin']);//la date de fin
      }
      $titre=$value['titre'];
      $buttons='';
      $buttons='<center>';
      if(in_array('validateEvenement', $this->permission)) {
        $buttons .= '<button type="button" class="btn bg-green-active color-palette" data-toggle="modal" data-target="#modal-sms" title="suppresion"  onclick="envoie(\''.$value['id'].'\')" ><i class="fa fa-commenting-o"></i></button>&nbsp;';
      }

      if(in_array('updateEvenement', $this->permission) ) {
        $buttons .= '<button type="button" class="btn bg-teal color-palette" data-toggle="modal" data-target="#modal-modif" title="modification" onclick="modif_mouv(\''.$value['id'].'\')" ><i class="fa fa-pencil-square-o"></i></button>&nbsp;';
      }
      
      if(in_array('deleteEvenement', $this->permission)) {
        $buttons .= '<button type="button" class="btn bg-red-active color-palette" data-toggle="modal" data-target="#modal-supp" title="suppresion"  onclick="modif_supp(\''.$value['id'].'\')" ><i class="fa fa-trash-o"></i></button>';
      }
      $buttons.='</center>';

      $num++;
      $result['data'][$key] = array(
        $num,
        $dates1,
        $dates2,
        $titre,
        $buttons
      );  
    }
    echo json_encode($result);
  }
  

  public function updateEvementById2($id){
    $recup=$this->rapport_model->SelectcalederByID($id);
    echo json_encode($recup);
  }
  public function convertdate($date){
    echo json_encode(date('Y-m-d',$date));
  }

   public function convertheure($date){
    if(date('G',$date)>=10){
      $result=date('G:i',$date);
    }else{
      $result='0'.date('G:i',$date);
    }
    echo json_encode($result);
  }
  public function listPersMember($pate=null){
    if ($pate) {
      $bouton = $this->rapport_model->SelectcalederByID($pate);
      foreach ($bouton as $key => $dde) {
        $g = json_decode($dde['select_eve']);
      }
      $compte = count($g);

      $reponse='<select class="form-control select2" multiple="multiple" name="num_personne[]" disabled >';
      $aff_service = $this->Personne_model->Affpersonnereel2();
      foreach ($aff_service as $key => $value) {
        $pageselect = '';
        for ($i=0; $i <$compte ; $i++) { 
          if ($g[$i] == $value['num_membre']) {
            $pageselect ='selected';
          }
        }
        if (strlen($value['code_m'])==1) {
         $code='M000'.$value['code_m'].'B' ;
        }
        if (strlen($value['code_m'])==2) {
         $code='M00'.$value['code_m'].'B' ;
        }
        if (strlen($value['code_m'])==3) {
          $code='M0'.$value['code_m'].'B';
        }
        if (strlen($value['code_m'])==4) {
          $code='M'.$value['code_m'].'B';
        }
        $reponse.='<option value="'.$value['num_membre'].'" '.$pageselect.'>'.$code.'</option>';
      }
      $reponse.='</select>';
      echo json_encode($reponse);
    }else{
      $reponse='<select class="form-control select2" multiple="multiple" name="num_personne[]" >';
      $aff_service = $this->Personne_model->Affpersonnereel2();
      foreach ($aff_service as $key => $value) {
        if (strlen($value['code_m'])==1) {
         $code='M000'.$value['code_m'].'B' ;
        }
        if (strlen($value['code_m'])==2) {
         $code='M00'.$value['code_m'].'B' ;
        }
        if (strlen($value['code_m'])==3) {
          $code='M0'.$value['code_m'].'B';
        }
        if (strlen($value['code_m'])==4) {
          $code='M'.$value['code_m'].'B';
        }
        $reponse.='<option value="'.$value['num_membre'].'">'.$code.'</option>';
      }
      $reponse.='</select>';
      echo json_encode($reponse);
    }
    
  }

  public function UpdateListPersMember($pate=null){
    if ($pate) {
      $bouton = $this->rapport_model->SelectcalederByID($pate);
      foreach ($bouton as $key => $dde) {
        $g = json_decode($dde['select_eve']);
      }
      $compte = count($g);

      $reponse='<select class="form-control select2" multiple="multiple" name="num_personne[]">';
      $aff_service = $this->Personne_model->Affpersonnereel2();
      foreach ($aff_service as $key => $value) {
        $pageselect = '';
        for ($i=0; $i <$compte ; $i++) { 
          if ($g[$i] == $value['num_membre']) {
            $pageselect ='selected';
          }
        }
        if (strlen($value['code_m'])==1) {
         $code='M000'.$value['code_m'].'B' ;
        }
        if (strlen($value['code_m'])==2) {
         $code='M00'.$value['code_m'].'B' ;
        }
        if (strlen($value['code_m'])==3) {
          $code='M0'.$value['code_m'].'B';
        }
        if (strlen($value['code_m'])==4) {
          $code='M'.$value['code_m'].'B';
        }
        $reponse.='<option value="'.$value['num_membre'].'" '.$pageselect.'>'.$code.'</option>';
      }
      $reponse.='</select>';
      echo json_encode($reponse);
    }
    
  }
}