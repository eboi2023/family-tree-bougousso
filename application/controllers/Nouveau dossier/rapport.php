<?php 

class rapport extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();

		$this->data['page_title'] = 'rapport';
		
		$this->load->model('model_users');
		$this->load->model('model_groups');
		$this->load->model('model_localization');
		
		$this->load->model('Diplome_model');
	    $this->load->model('Nationalite_model');
	    $this->load->model('Pays_model');
	    $this->load->model('Ville_model');
	    $this->load->model('Commune_model');
	    $this->load->model('Contact_model');
	    $this->load->model('Niveau_etude_model');
	    $this->load->model('Fonction_fonctionnaire_model');
	    $this->load->model('Personne_model');
	    $this->load->model('rapport_model');
		$this->load->library('form_validation');
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index($updateid=null)
	{
		if(!in_array('viewRepport', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
    $this->data['titre'] = 'Rapport de jour';
		$this->data['icon'] = '<i class="fa fa-magic"> </i>';
		$this->data['lien'] = 'Rapport de jour';
		
		$t=time();
		$id_p = $this->session->userdata('id');
		if (!$this->input->post()){
      if ($updateid) {
        $select_data = array('id' => $updateid );
        $this->data['aff_recup'] =$this->rapport_model->RecupRapport($select_data);
      }
			$this->data['aff_rapport'] = $this->rapport_model->AffListerapport();
			$this->render_template('rapport/index', $this->data);
		}else{
			if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
        $this->session->set_flashdata('basicWarning', get_phrase('Mot de passe incorrecte'));
        redirect('rapport/', 'refresh');
    	}
      
      if ($this->input->post('envoi')==get_phrase('Enregistrer')) {
        
        $e = $this->input->post('date_titre');
        $a_date1 = explode("-", $e);
        
        $date_realisation = mktime(0,0,0,$a_date1[1],$a_date1[2],$a_date1[0]);


				$insert_data = array( 
					'titre' => $this->input->post('titre'),
					'contenu' => htmlentities($this->input->post('editor1')),
					'date_rapport' => $date_realisation,
          'id_acteur'=>$this->session->userdata('id'),
          'type_action'=>1
				);
				if ($this->rapport_model->VerificationRapport($insert_data)==false) {
					$this->rapport_model->InsertionRapport($insert_data);
			    $aff2=$this->rapport_model->RecupRapport($insert_data);
			    $id_doc=$aff2['id'];
          $date_action=time();
          $insert_data = array( 
            'id_doc'=>$id_doc,
            'date_emison'=>$date_realisation,
            'date_action'=>$date_action,
            'type_action'=>1,
            'id_acteur'=>$this->session->userdata('id'),
            'id_user'=>$this->session->userdata('id')
          );
          $this->rapport_model->Insert32($insert_data);
          /*$uploaded_files = $_FILES;
          
          $_FILES = array();
          
          foreach ($uploaded_files as $x => $file){
            if ($x=='fileToUpload') {
              foreach ($file['name'] as $y => $value){
                  $_FILES['file'.$y]['name'] = $file['name'][$y];
              }
              foreach ($file['type'] as $z => $value){
                  $_FILES['file'.$z]['type'] = $file['type'][$z];
              }
              foreach ($file['tmp_name'] as $t => $value){
                  $_FILES['file'.$t]['tmp_name'] = $file['tmp_name'][$t];
              }
              foreach ($file['error'] as $e => $value){
                  $_FILES['file'.$e]['error'] = $file['error'][$e];
              }
              foreach ($file['size'] as $f => $value){
                  $_FILES['file'.$f]['size'] = $file['size'][$f];
                  //echo var_dump($_FILES['file'.$f]['size']);
              }
              $count = count($file['name']);

            }
            
          }*/

          /*// now we can loop and upload files
          for ($i=0; $i <$count ; $i++) { 
            $r=$this->file_upload->do_image_upload('file'.$i,'fichier_annexe/','fiche_pdf');
           $r=$this->file_upload->do_image_upload('file'.$i,'fichier_annexe/','fiche_pdf');
            
            if ( $r['file_name']==false){}
            else{
              $this->rapport_model->insertFicheAnnexe($id_doc,$r['file_name']);

            }
          }*/
          $this->session->set_flashdata('basicWarning', get_phrase('Successfully created'));
          
				}else{
					$this->session->set_flashdata('basicErreur', get_phrase('rapprt existe deja!!'));
				}
				redirect('rapport/', 'refresh');
      }
      if ($this->input->post('envoi')==get_phrase('updated')) {
        $insert_data = array();
        if (!$this->input->post('titre')=='') {
          $insert_data+= array( 
            'titre' => $this->input->post('titre')
          );
        }
        if (!$this->input->post('editor1')=='') {
          $insert_data+= array( 
            'contenu' => $this->input->post('editor1')
          );
        }
        if (!$this->input->post('date_titre')=='') {
          $e = $this->input->post('date_titre');
          $a_date1 = explode("-", $e);
          
          $date_realisation = mktime(0,0,0,$a_date1[1],$a_date1[2],$a_date1[0]);
          $insert_data+= array( 
            'date_rapport' => $date_realisation
          );
        }
        if (!$this->rapport_model->VerificationRapport($insert_data)==true) {
          $ids= array( 
            'id' => $this->input->post('verifcode')
          );
          $insert_data+= array( 
            'type_action'=>2
          );
          
          $this->rapport_model->UpdateRapport($ids,$insert_data);
          $aff2=$this->rapport_model->RecupRapport($insert_data);
          $id_doc=$aff2['id'];
          $id_tile=$aff2['id_acteur'];
          $date_action=time();
          $insert_data = array( 
            'id_doc'=>$id_doc,
            'date_emison'=>$this->input->post('date_titre'),
            'date_action'=>$date_action,
            'type_action'=>2,
            'id_acteur'=>$id_tile,
            'id_user'=>$this->session->userdata('id')
          );
          $this->rapport_model->Insert32($insert_data);
          
          $this->session->set_flashdata('basicWarning', get_phrase('Successfully updated'));
          
        }else{
          $this->session->set_flashdata('basicErreur', get_phrase('aucune modification effectue!!'));
        
        }
        redirect('rapport/', 'refresh');
      }
      if ($this->input->post('envoi')==get_phrase('valider')) {
        $insert_data = array();
        $ids= array( 
          'id' => $this->input->post('verifcode')
        );
        $insert_data+= array( 
          'type_action'=>4
        );
          
        $this->rapport_model->UpdateRapport($ids,$insert_data);

        $aff2=$this->rapport_model->RecupRapport($ids);
        $id_doc=$aff2['id'];
        $id_tile=$aff2['id_acteur'];
        $date_titre=$aff2['date_rapport'];
        $date_action=time();
        $insert_data = array( 
          'id_doc'=>$id_doc,
          'date_emison'=>$date_titre,
          'date_action'=>$date_action,
          'type_action'=>4,
          'id_acteur'=>$id_tile,
          'id_user'=>$this->session->userdata('id')
        );
        $this->rapport_model->Insert32($insert_data);
          
        $this->session->set_flashdata('basicWarning', get_phrase('Successfully valided'));
          
        
        redirect('rapport/', 'refresh');
      }
      if ($this->input->post('envoi')==get_phrase('Supprimer')) {
        $insert_data = array( 
          'id' => $this->input->post('verifcode')
        );
        $f=$this->rapport_model->RecupRapport($insert_data);
        if ($this->rapport_model->delete_rapport($insert_data)==true) {
          $date_action=time();
          $insert_data = array( 
            'id_doc'=>$this->input->post('verifcode'),
            'date_emison'=>$f['date_rapport'],
            'date_action'=>$date_action,
            'type_action'=>3,
            'id_acteur'=>$f['id_acteur'],
            'id_user'=>$this->session->userdata('id')
          );
          $this->rapport_model->Insert32($insert_data);
            /*$aff_service = $this->rapport_model->affFichierAnnexe($this->input->post('verifcode'));
            foreach ($aff_service as $key => $value) {
              $delect_data = array( 
                'id_doc'=>$this->input->post('verifcode'),
                'lienfiche'=>$value['lienfiche']
              );
              unlink (FCPATH. './uploads/fichier_annexe/'.$value['lienfiche']);
              $this->rapport_model->deleteFichierAnnexe($delect_data);
            }*/
          $this->session->set_flashdata('basicWarning', get_phrase('Successfully deleted'));


        }else{

          $this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));

        }
        redirect('rapport/', 'refresh');
      }
		}

	}
	public function fetchRapportData()
  {
    if(!in_array('viewRepport', $this->permission)) {
      redirect('dashboard', 'refresh');
    }
    $result = array('data' => array());

    $aff_service = $this->rapport_model->aff_rapport_complet();

    $n=0;
    foreach ($aff_service as $key => $value) {
      $n++;
      $d = date("d/m/Y", $value['date_rapport']);

      $dat1 = array( 
        'id_doc' => $value['id']
      );
      $verif='';
      
      if ($this->rapport_model->aff_action_rapport($dat1,1)==true) {
        $verif.=get_phrase('Enregistrer');
      }
      if ($this->rapport_model->aff_action_rapport($dat1,2)==true) {
        $verif.=',&nbsp;'.get_phrase('modifier');
      }
      if ($this->rapport_model->aff_action_rapport($dat1,4)==true) {
        $verif.='&nbsp;'.get_phrase('end').' '.get_phrase('valider');
      }else{
        $verif.='&nbsp;'.get_phrase('end').' '.get_phrase('attend validation');
        $verif.='&nbsp;<button type="button" class=" bg-olive btn-flat margin" data-toggle="modal" data-target="#modal-valider" title="'.get_phrase('valided in repport').'" onclick="valider_rapport(\''.$value['id'].'\')" ><i class="fa fa-check"></i></button>';
      }

      //le button pour valider
      //le button pour modifier à la demande
      //le button pour voir
      $buttons = '';
      if ($this->rapport_model->aff_action_rapport($dat1,4)==false) { 
        if(in_array('updateRepport', $this->permission)) {
          $buttons .= '<a href="'.base_url('rapport/index/'.$value['id']).'" class="btn bg-teal color-palette" title="'.get_phrase('updated').'"><i class="fa fa-pencil-square-o"></i></a>&nbsp;';
        }
      }
      if(in_array('viewRepport', $this->permission)) {
        $buttons .= '<a target="__blank" href="'.base_url('rapport/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>&nbsp;';
      }
      if(in_array('deleteRepport', $this->permission)) {
        $buttons .= '<button type="button" class="btn bg-red color-palette" data-toggle="modal" data-target="#modal-supp" title="'.get_phrase('deleted').'" onclick="modif_supp(\''.$value['id'].'\')" ><i class="fa fa-trash-o"></i></button>';
      }
      $result['data'][$key] = array(
        $n,
        $d,
        $value['titre'],
        $verif,
        $buttons
      );

    } // /foreach

    echo json_encode($result);
  }
  
  
  public function printDiv($id)
  {
    if(!in_array('viewRepport', $this->permission)) {
      redirect('dashboard', 'refresh');
    }

    $this->load->library('Pdf');
    if($id) {
      $aff_service = $this->rapport_model->aff_rapport_complet($id);
      $date_mode1 = date("d/m/Y", $aff_service['date_rapport']);
      $date_mode2 = date("d_m_Y", $aff_service['date_rapport']);
      $html =$aff_service['contenu'];
            
      
      $this->data['valeur_titre'] = $aff_service['titre'];
      $this->data['date_titre'] = 'Rapport du '.$date_mode1;
      $this->data['pages_titre'] = 'Rapport du '.$date_mode2.'.pdf';
      $this->data['sssss'] = html_entity_decode($html);
    }
    $this->render_printer('printe/index', $this->data);
  }
  public function fechinsertreport($id){
    $result='';
    $select_data = array( 
      'id' => $id,
    );
    $aff2=$this->rapport_model->RecupRapport($select_data);
    $result.='<div class="box box-info">
      <div class="box-header">
        '.anchor('administrator~gie2018/dashboard/rapport',  get_phrase('updated'), array('class' => 'btn btn-success')).'
        <h3 class="box-title">
          <small></small>
        </h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i>
          </button>
        </div>
        <!-- /. tools -->
      </div>
      <div id="refrech">
                      
      </div>
      <!-- /.box-header -->
      <div class="box-body pad">
        <div class="form-group col-xs-9">
          <label for="">'.get_phrase('titre').'</label>
          <input type="text" class="form-control" name="titre" id="titre_transmiserapport" placeholder="'.get_phrase('Le titre du rapport').'" value="'.$aff2['titre'].'" required>
        </div>
        <div class="form-group col-xs-3">
          <label for="">'.get_phrase('Date du rapport').'</label>
          <input type="date" class="form-control" name="date_titre" value="'.$aff2['date_rapport'].'" id="date_transmiserapport" placeholder="'.get_phrase('Le titre du rapport').'" max="'.date('Y').'-'.date('m').'-'.date('d').'" required>
        </div>
        <div class="form-group col-xs-12">
          <textarea id="editor1" class="form-control summernote" name="editor1" rows="10" cols="80" >'.$aff2['contenu'].'</textarea>
        </div>
        <div class="form-group col-xs-12 text-center">
          <label for="" class="">'.get_phrase('all tihe files in PDF').'</label>
        </div>
        <div class="form-group col-xs-12">
          <div id="form" class="formpos" for="fileToUpload">
            <div class="btn btn-default btn-file">
              <i class="fa fa-paperclip"></i>'.get_phrase('Attachment').'
              <!--    Select the pdf to upload:-->
              <input type="file" name="fileToUpload[]" id="fileToUpload" accept="application/pdf" multiple>
            </div>
            <div>
              <p for="fileToUpload" id="drag">'.get_phrase('Drop your files here or click to select them').'</p>
            </div>
            <input type="hidden" id="fecha" name="copy_id" value="'.$id.'" />
          </div>
          <h1 style="width: 500px!important;margin:20px auto 0px!important;font-size:24px!important;">'.get_phrase('File list').':</h1>
          <div id="filelist" style="width: 500px!important;margin:10px auto 0px!important;">'.get_phrase('Nothing selected yet').'</div>
            <div class="form-group">
              <label for="code_confirm">'.get_phrase('Code saved').'</label>
              <div class="form-group col-md-12">
                <input type="password" class="form-control" name="verifcationcode" title="pour la verification de votre identité" placeholder="'.get_phrase('Entrer le code de validation').'" required >
              </div>
              <input type="hidden" name="codeverifinconf" value="Rapport">
            </div>
            <input type="submit" id="valider" value="'.get_phrase('Enregistrer').'" class="btn btn-success" name="envoi" onclick="recharge()" />
          </div>
        </div>
        <!-- /.box -->
      </div><link rel="stylesheet" href="'.site_url('assets/').'css/summernote/summernote.css">
      <!-- summernote JS
============================================ -->
<script src="'.site_url('assets/').'js/summernote/summernote.min.js"></script>
<script src="'.site_url('assets/').'js/summernote/summernote-active.js"></script>';
                      
                      
                        
      
                            
                        
                                         
                        
                        
    echo json_encode($result);
  }
  public function update($id_edite){
    
    if(!in_array('viewRepport', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        $this->data['titre'] = 'Rapport de jour';
    $this->data['icon'] = '<i class="fa fa-magic"> </i>';
    $this->data['lien'] = 'Rapport de jour';
    
    $t=time();
    $id_p = $this->session->userdata('id');
    if (!$this->input->post()){
      $this->data['aff_rapport'] = $this->rapport_model->AffListerapport();
      $this->render_template('rapport/view', $this->data);
    }else{
      if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
        $this->session->set_flashdata('basicWarning', get_phrase('Mot de passe incorrecte'));
        redirect('rapport/', 'refresh');
      }
      
      if ($this->input->post('envoi')==get_phrase('Enregistrer')) {
              
        $insert_data = array( 
          'titre' => $this->input->post('titre'),
          'contenu' => $this->input->post('editor1'),
          'date_rapport' => $this->input->post('date_titre'),
        );
        if ($this->rapport_model->VerificationRapport($insert_data)==false) {
          $this->rapport_model->InsertionRapport($insert_data);
          $aff2=$this->rapport_model->RecupRapport($insert_data);
          $id_doc=$aff2['id'];
          $id_tile=$aff2['id_auteur'];
          $date_action=time();
          $insert_data = array( 
            'id_doc'=>$id_doc,
            'date_emison'=>$this->input->post('date_titre'),
            'date_action'=>$date_action,
            'type_action'=>1,
            'id_acteur'=>$id_tile,
            'id_user'=>$this->session->userdata('id')
          );
          $this->rapport_model->Insert32($insert_data);
          $uploaded_files = $_FILES;
          
          $_FILES = array();
          
          foreach ($uploaded_files as $x => $file){
            if ($x=='fileToUpload') {
              foreach ($file['name'] as $y => $value){
                  $_FILES['file'.$y]['name'] = $file['name'][$y];
              }
              foreach ($file['type'] as $z => $value){
                  $_FILES['file'.$z]['type'] = $file['type'][$z];
              }
              foreach ($file['tmp_name'] as $t => $value){
                  $_FILES['file'.$t]['tmp_name'] = $file['tmp_name'][$t];
              }
              foreach ($file['error'] as $e => $value){
                  $_FILES['file'.$e]['error'] = $file['error'][$e];
              }
              foreach ($file['size'] as $f => $value){
                  $_FILES['file'.$f]['size'] = $file['size'][$f];
                  /*echo var_dump($_FILES['file'.$f]['size']);*/
              }
              $count = count($file['name']);

            }
            
          }

          // now we can loop and upload files
          for ($i=0; $i <$count ; $i++) { 
            $r=$this->file_upload->do_image_upload('file'.$i,'fichier_annexe/','fiche_pdf');
          /* $r=$this->file_upload->do_image_upload('file'.$i,'fichier_annexe/','fiche_pdf');*/
            
            if ( $r['file_name']==false){}
            else{
              $this->rapport_model->insertFicheAnnexe($id_doc,$r['file_name']);

            }
          }
          $this->session->set_flashdata('basicWarning', get_phrase('Successfully created'));
          
        }else{
          $this->session->set_flashdata('basicErreur', get_phrase('rapprt existe deja!!'));
        }
        redirect('rapport/', 'refresh');
      }
      if ($this->input->post('envoi')==get_phrase('Supprimer')) {
        $insert_data = array( 
          'id' => $this->input->post('verifcode')
        );
        $f=$this->rapport_model->RecupRapport($insert_data);
        if ($this->rapport_model->delete_rapport($insert_data)==true) {
          $date_action=time();
          $insert_data = array( 
            'id_doc'=>$this->input->post('verifcode'),
            'date_emison'=>$f['date_rapport'],
            'date_action'=>$date_action,
            'type_action'=>3,
            'id_acteur'=>$f['id_auteur'],
            'id_user'=>$this->session->userdata('id')
          );
          $this->rapport_model->Insert32($insert_data);
            $aff_service = $this->rapport_model->affFichierAnnexe($this->input->post('verifcode'));
            foreach ($aff_service as $key => $value) {
              $delect_data = array( 
                'id_doc'=>$this->input->post('verifcode'),
                'lienfiche'=>$value['lienfiche']
              );
              unlink (FCPATH. './uploads/fichier_annexe/'.$value['lienfiche']);
              $this->rapport_model->deleteFichierAnnexe($delect_data);
            }
          $this->session->set_flashdata('basicWarning', get_phrase('Successfully deleted'));


        }else{

          $this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));

        }
        redirect('rapport/', 'refresh');
      }
    }
  }
  public function updateRapportById($select_data){
    $recup=$this->rapport_model->RecupRapport2($select_data);
    echo json_encode($recup);
  }
}