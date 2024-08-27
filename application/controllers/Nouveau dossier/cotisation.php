<?php 

class cotisation extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();

		$this->data['page_title'] = 'Cotisation';
		
		$this->load->model('Caisse_model');
	    $this->load->model('Personne_model');
		$this->load->model('model_users');
		$this->load->library('form_validation');
		
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index()
	{
		if(!in_array('viewCaisse', $this->permission) || !in_array('deleteCaisse', $this->permission) || !in_array('updateCaisse', $this->permission) ) {
			redirect('dashboard', 'refresh');
		}
	     
	    $this->data['titre'] = 'Cotisation';
	    $this->data['lien'] = 'Cotisation';
	    $this->data['icon'] = '<i class="fa fa-university"> </i>';
	    $this->load->helper('form');
	    if (!$this->input->post()){
			$this->data['aff_service'] = $this->Caisse_model->Aff_caisse();
			$this->data['aff_type1'] = $this->Caisse_model->Aff_type_caisse(1);
			$this->data['aff_type2'] = $this->Caisse_model->Aff_type_caisse(2);
			$somm=$this->Caisse_model->aff_somme_entrer();
			$v = $somm['total'];
			$somm=$this->Caisse_model->aff_somme_adhe();
			$v =  $v+$somm['total'];
			$somm=$this->Caisse_model->aff_somme_cot();
			$v =  $v+$somm['total'];
			$this->data['e_caisse'] = $this->sete($v);
			$somm=$this->Caisse_model->aff_somme_sortie();
			$this->data['company_currency'] =  $this->company_currency();
			$this->data['s_caisse'] =  $this->sete($somm['total']);
			$this->data['total_caisse'] =  $this->sete($v-$somm['total']);
			$this->data['total_caisse2'] =  $v-$somm['total'];
			

			$this->render_template('cotisation/index', $this->data);
	    }else{
	    	if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
				$this->session->set_flashdata('basicWarning', get_phrase('Error Password'));
				redirect('cotisation/', 'refresh');
			}
			//recuperation de id de la personne
	        $idenyifi = intval(substr($this->input->post('nom_indivi'), 1, 4));
	        $recupper = array(
	          'code_m' => $idenyifi
	        );
	        if ($this->Personne_model->verif_personne($recupper)==false) {
	        	$this->session->set_flashdata('basicWarning', get_phrase('personne inconnu'));
				redirect('cotisation/', 'refresh');
	        }
	        $aff=$this->Personne_model->recep_personne($recupper);
	        $id_mmbr = $aff['id'];

	        $e = $this->input->post('d_act');
			$a_date1 = explode("-", $e);
			$e = $this->input->post('h_act');
			$a_date2 = explode(":", $e);
			$date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
			$date_action=time();
			if ($date_realisation>$date_action) {
				$this->session->set_flashdata('basicErreur', get_phrase('review the date issued'));
				redirect('cotisation/', 'refresh');
			}
			$recupadh = array(
            	'num_adhe' => $id_mmbr	
          	);
			//recupationde l'id de son adhesion
			$aff=$this->Personne_model->recep_adherent($recupadh);
			$id_adh = $aff['id'];
			//enregistrement l'argent de la cotisation dans la caisse
	        $dat = array( 
	          'type' => 4,
	          'nom' => 'Cotisation'
	        );
	        if ($this->Caisse_model->verif_typactcaisse($dat)==true) {}
	        else {
	          $this->Caisse_model->create_typactcaisse($dat);
	        }
	        $aff=$this->Caisse_model->recep_typactcaisse($dat);
	        $id_tac=$aff['id'];

        	$id_p = $this->session->userdata('id');
        	$code_cotrole = md5(uniqid(rand(), true));
	        $data = array( 
	          'vide' => $code_cotrole,
	          'raison' => '',
	          'date_enreg' => $date_realisation,
	          'montant' => $this->input->post('montant'),
	          'id_type' => $id_tac,
	          'id_individu' => $id_adh
	        );
	        $this->Caisse_model->Insert13($data);
          	$cop=$this->Caisse_model->recep_Id_caisse($data);

          	$data = array( 
            'model_base' => 1,
            'id_caisse' => $cop['id'],
            'id_user' => $id_p,
            'montant' => $this->input->post('montant'),
            'date_action' => $date_action,
            'date_enreg' => $date_realisation,
          );
          $this->Caisse_model->Insert31($data);
          $this->session->set_flashdata('basicWarning', get_phrase('Successfully created'));
          redirect('cotisation/', 'refresh');
	    }
	}
	public function fetchlistadhet(){

      $reponse='';
      $aff_profA = $this->Personne_model->Affpersonnereel(); 
      if($aff_profA){
        foreach($aff_profA as $selectvalue){
          $test = array('id_info' => $selectvalue->id );
          if ($this->Personne_model->verif_adherent($test)==true) {
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
            
            $reponse.="<option value='".$code."'>".$selectvalue->nom." ".$selectvalue->prenom."</option>";
          }
          }
      }
      echo json_encode($reponse);
	}
	public function fetchCotisationdata(){
		$result = array('data' => array());
		$aff_profA = $this->model_users->ListeUserslast(); 
     		foreach ($aff_profA as $key => $selectvalue) {
	          		if (strlen($selectvalue['code_m'])==1) {
		             $code='M000'.$selectvalue['code_m'].'B' ;
		            }
		            if (strlen($selectvalue['code_m'])==2) {
		             $code='M00'.$selectvalue['code_m'].'B' ;
		            }
		            if (strlen($selectvalue['code_m'])==3) {
		              $code='M0'.$selectvalue['code_m'].'B';
		            }
		            if (strlen($selectvalue['code_m'])==4) {
		              $code='M'.$selectvalue['code_m'].'B';
		            }
		            $trimestre=0;
		            if (date('Y')-date('Y',$selectvalue['date_adh'])<0) {
		            	$mdu='probleme';
		            } else {
		            	if (date('Y')-date('Y',$selectvalue['date_adh'])<1) {
		            		$trimestre=(date('m')-date('m',$selectvalue['date_adh'])) % 3;
		            	} else {
		            		if (date('Y')-date('Y',$selectvalue['date_adh'])==1) {
		            			$trimestre=12-date('m',$selectvalue['date_adh']);
		            			$trimestre=$trimestre+date('m');
		            			$trimestre=$trimestre / 3;
		            		} else {
		            			$trimestre=12-date('m',$selectvalue['date_adh']);
		            			$trimestre=$trimestre+12;
		            			$trimestre=$trimestre+date('m');
		            			$trimestre=$trimestre / 3;
		            		}
		            		
		            	}
		            	$a_date = explode(".", $trimestre);
		            	$mdu=$a_date[0]*10000;
		            }
		            
		            $valuecompte = $this->Caisse_model->Montantvers($selectvalue['num_membre']);
		            if ($valuecompte['total']==Null) {
		            	$mvers=0;
		            } else {
		            	$mvers = $valuecompte['total'];
		            }
		            $mreste=$mdu-$mvers;
		            
		            $buttons='';
		            if(in_array('updateCaisse', $this->permission) || in_array('viewCaisse', $this->permission)) {
              			$buttons .= '<center><a href="'.base_url('cotisation/view/'.$selectvalue['num_membre']).'" class="btn bg-teal color-palette"  title="voir les transactions"  ><i class="fa fa-eye"></i></a></center>';
              		}
          			$result['data'][$key] = array(
						$code,
						$selectvalue['nom'].' '.$selectvalue['prenom'],
						$this->sete($mdu),
						$this->sete($mvers),
						$this->sete($mreste),
						$buttons
					);
			}
		echo json_encode($result);
	}
	public function view($code=null){
		if(!in_array('viewCaisse', $this->permission) || !in_array('deleteCaisse', $this->permission) || !in_array('updateCaisse', $this->permission) ) {
			redirect('dashboard', 'refresh');
		}
	     
	    $this->data['titre'] = 'Cotisation';
	    $this->data['lien'] = 'Cotisation';
	    $this->data['icon1'] = '<i class="fa fa-university"> </i>';
	    $this->data['icon2'] = '<i class="fa fa-plug"> </i>';
	    if (!$this->input->post()) {
	    	$arrayName = array('num_membre' => $code );
			$selectvalue = $this->Personne_model->recep_personne($arrayName);
			$this->data['personne_data'] = $selectvalue;
			if (strlen($selectvalue['code_m'])==1) {
	         $valeur='M000'.$selectvalue['code_m'].'B' ;
	        }
	        if (strlen($selectvalue['code_m'])==2) {
	         $valeur='M00'.$selectvalue['code_m'].'B' ;
	        }
	        if (strlen($selectvalue['code_m'])==3) {
	          $valeur='M0'.$selectvalue['code_m'].'B';
	        }
	        if (strlen($selectvalue['code_m'])==4) {
	          $valeur='M'.$selectvalue['code_m'].'B';
	        }
			$this->data['code_membre'] = $valeur;

			$this->render_template('cotisation/view', $this->data);	
	    } else {
	    	if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
				$this->session->set_flashdata('basicWarning', get_phrase('Error Password'));
				redirect('cotisation/view/'.$code, 'refresh');
			}
	    	if ($this->input->post('envoi')==get_phrase('Supprimer')){
				$dat = array( 
					'id' => $this->input->post('verifcode')
				);
				if ($this->Caisse_model->verif_actioncaisse($dat) == false) {
		          	$this->session->set_flashdata('basicErreur', get_phrase('not existe in the data base'));
					redirect('cotisation/view/'.$code, 'refresh');	
		        }

		        $aff2=$this->Caisse_model->recep_Id_caisse($dat);
				$code_cais = $aff2['vide'];
				$date_action= time();
				$data = array( 
					'date_action' => $date_action,
					'model_base' => 3,
					'id_caisse' => $this->input->post('verifcode'),
					'id_user' => $this->session->userdata('id') 	
				);
          		$this->Caisse_model->Insert31($data);
		        if ($this->Caisse_model->delete_ActionCaisse($dat)==true) {

		        	$this->session->set_flashdata('basicWarning', get_phrase('successfully removed'));
					redirect('cotisation/view/'.$code, 'refresh');	
		        }
				

	    	}
	    	if ($this->input->post('envoi')==get_phrase('Modifier')){
	    		$dat = array( 
		          	'id' => intval($this->input->post('verifcode'))
		        );
		        if ($this->Caisse_model->verif_actioncaisse($dat) == false) {
		            $this->session->set_flashdata('basicErreur', get_phrase('not existe in the data base'));
		          	redirect('cotisation/view/'.$code, 'refresh');  
		        }
		        $aff2=$this->Caisse_model->recep_Id_caisse($dat);

		        $dat2 = array('vide' => $aff2['vide'] );
		       	$e = $this->input->post('d_act');
				$a_date1 = explode("-", $e);
				$e = $this->input->post('h_act');
				$a_date2 = explode(":", $e);
	          	$date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
	          	$date_action=time();
				if ($date_realisation>$date_action) {
					$this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
					redirect('cotisation/view/'.$code, 'refresh');
				}
				//enregistrement l'argent de la cotisation dans la caisse
				$dat = array( 
					'type' => 4,
					'nom' => 'Cotisation'
				);
				if ($this->Caisse_model->verif_typactcaisse($dat)==true) {}
				else {
					$this->Caisse_model->create_typactcaisse($dat);
				}
		        $aff=$this->Caisse_model->recep_typactcaisse($dat);
		        $id_tac=$aff['id'];
				$dataaccai = array( 
					'date_enreg' => $date_realisation,
					'montant' => $this->input->post('montant'),
					'id_type' => $id_tac
				);
				if($this->Caisse_model->MajActionCaisse($dataaccai,$aff2['vide'])==true) {
					$data = array( 
						'model_base' => 2,
						'id_caisse' => $aff2['id'],
						'id_user' => $this->session->userdata('id'),
						'montant' => $this->input->post('montant'),
						'date_action' => $date_action,
						'date_enreg' => $date_realisation,
					);
					$this->Caisse_model->Insert31($data);
					$this->session->set_flashdata('basicWarning', get_phrase('successfully updated'));
	          		redirect('cotisation/view/'.$code, 'refresh');
				}
				echo var_dump($this->Caisse_model->MajActionCaisse($dataaccai,$dat2));
	    	}
	    }
	    
	    
	}

	public function fetchCotisationValeur($id_personne){
		$result = array('data' => array());
		$aff_profA = $this->Caisse_model->Aff_caisse3($id_personne); 
     		foreach ($aff_profA as $key => $selectvalue2) {
	          		$date_enreg=$selectvalue2['date_enreg'];
	          		$montant=$this->sete($selectvalue2['montant']);
		            $buttons='<center>';
		            if(in_array('viewCaisse', $this->permission) || in_array('deleteCaisse', $this->permission) || in_array('updateCaisse', $this->permission) ) {
		            	if(in_array('updateCaisse', $this->permission) ) {
              				$buttons .= '<button type="button" class="btn bg-teal color-palette" data-toggle="modal" data-target="#modal-modif" title="modification" onclick="modif_mouv(\''.$selectvalue2['idaction'].'\')" ><i class="fa fa-pencil-square-o"></i></button>&nbsp;';
              			}
              			if(in_array('deleteCaisse', $this->permission)) {
              				$buttons .= '<button type="button" class="btn bg-red-active color-palette" data-toggle="modal" data-target="#modal-supp" title="suppresion"  onclick="modif_supp(\''.$selectvalue2['idaction'].'\')" ><i class="fa fa-trash-o"></i></button>';
              			}

              		}
              		$buttons.='</center>';
          			$result['data'][$key] = array(
						date('d m Y à H:i',$date_enreg),
						$montant,
						$buttons
					);
			}
		echo json_encode($result);
	}

	public function fetchCotisationValueById($id_code){
		$resultat='';
		$dat0 = array( 
			'id' => $id_code
		);
		$aff0=$this->Caisse_model->recep_Id_caisse($dat0);
		$dat1 = array( 
			'id' => $aff0['id_individu']
		);
		$aff1=$this->Personne_model->recep_adherent($dat1);
		$dat2 = array( 
			'id' => $aff1['num_adhe']
		);
		$selectvalue=$this->Personne_model->recep_personne($dat2);
		if (strlen($selectvalue['code_m'])==1) {
         $code='M000'.$selectvalue['code_m'].'B' ;
        }
        if (strlen($selectvalue['code_m'])==2) {
         $code='M00'.$selectvalue['code_m'].'B' ;
        }
        if (strlen($selectvalue['code_m'])==3) {
          $code='M0'.$selectvalue['code_m'].'B';
        }
        if (strlen($selectvalue['code_m'])==4) {
          $code='M'.$selectvalue['code_m'].'B';
        }
		$resultat.="<label for='nom_indivi' class='col-sm-2 control-label'>".get_phrase('membership')."</label>
            <div class='col-md-12'>
                <input type='text' class='form-control' name='nom_indivi' id='nom_indivi' placeholder='le numero membre' value='".$code."'disabled>
            </div>
            <div class='form-group col-md-12'>
              <label for=''><?php echo get_phrase('Montant'); ?></label>
              <div class='input-group' id='verifmontant'>
                <input type='number' min='0' class='form-control' name='montant' id='montant' value=".$aff0['montant']." required>
                <span class='input-group-addon'>".$this->company_currency()."</span>
              </div> 
            </div>";
            $dates1=date('Y-m-d',$aff0['date_enreg']);
            $resultat.='<div class="form-group col-md-12">
          		<div class="form-group col-md-6">
					<input type="date" class="form-control" name="d_act" id="d_act" required value="'.$dates1.'" max="'.date('Y').'-'.date('m').'-'.date('d').'">
				</div>
                        
				<div class="form-group col-md-6 pull-right">
				 	<input type="time" class="form-control pull-left" name="h_act" id="h_act"  required value="';if(date('G',$aff0['date_enreg'])>=10){$resultat.= date('G',$aff0['date_enreg']).':'.date('i',$aff0['date_enreg']);}else{$resultat.= '0'.date('G',$aff0['date_enreg']).':'.date('i',$aff0['date_enreg']);} $resultat.='">
				</div>
            </div>';
            $resultat.='<div class="form-group col-md-12">
                 <input type="password" class="form-control" name="verifcationcode" title="<'.get_phrase('pour la verification de votre identite').'" placeholder="'.get_phrase('Entrer le code de validation').'" required >
            </div>
            <input type="hidden" name="codeverifinconf" value="Caisse">
            <input type="text" name="verifcode" id="verifcode" value="'.$id_code.'">
        </div>';

		echo json_encode($resultat);
	}
	
}