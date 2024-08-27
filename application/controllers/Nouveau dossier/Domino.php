<?php 

class Domino extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();
		$this->load->model('Reuion_model');
		$this->data['page_title'] = 'Listes presence';
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
		$this->data['titre'] = 'La Liste de compteur';
		$this->data['lien'] = 'La Liste de compteur';
		$this->data['icon'] = '<i class="fa fa-list-alt"></i>';
		if (!$this->input->post()){
			$this->data['numreuion'] = md5(time());
			$this->render_template('listespresence/index', $this->data);
		} else {
			if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
				$this->session->set_flashdata('basicWarning', get_phrase('Error Password'));
				redirect('domino/', 'refresh');
			}

			if ($this->input->post('envoi')==get_phrase('Enregistrer')){
				
				$date_action=time();
				$lien=md5(uniqid(rand(), true));
				$verifaction = array(
					'lien' => $lien
				);
				while ($this->Reuion_model->verif_liste_Reuion($verifaction)==true) {
					$lien=md5(uniqid(rand(), true));
					$verifaction = array(
						'lien' => $lien
					);
				}
				$verifaction = array(
					'num' => $this->input->post('code_presence'), 
					'type_de_compteur' => $this->input->post('lieu_reuion')
				);
				$id_p = $this->session->userdata('id');
				$enreg = array(
					'num' => $this->input->post('code_presence'), 
					'type_recharge' => $this->input->post('point'),
					'type_de_compteur' => $this->input->post('lieu_reuion'),
					'date_enreg' => $date_action,
					'lien' => $lien,
					'id_user' => $id_p
				);
				if ($this->input->post('point') == 0) {
					$enreg+= array('initial' => $this->input->post('intialnum') );
				}
				if ($this->input->post('point') == 1) {
					$enreg+= array('initial' => $this->input->post('intialnum1'),'vigule_initial' =>  $this->input->post('intialnum2'));
				}
				
				if ($this->Reuion_model->verif_liste_Reuion($verifaction)==true) {
					$this->session->set_flashdata('basicErreur', get_phrase('le compteur existe deja dans la liste'));
      				redirect('domino/', 'refresh');
				}
		        else {
		          	$this->Reuion_model->create_liste_reuion($enreg);
		          	$this->session->set_flashdata('basicWarning', get_phrase('Successfully created'));
          			redirect('domino/', 'refresh');
		        }
			}
			
			if ($this->input->post('envoi')==get_phrase('updated')){
				$id_p = $this->session->userdata('id');
				
				$update_data = array();
				$verif_data = array();
				
				$update_data+= array(
					'date_modif' => time(),
					'id_user' => $id_p,
					'type_recharge' => $this->input->post('point')
				);

				if (!$this->input->post('code_presence') == '') {
					$update_data+= array(
						'num' => $this->input->post('code_presence')
					);
					$verif_data+= array(
						'num' => $this->input->post('code_presence')
					);
				}

				if (!$this->input->post('lieu_reuion') == '') {
					$update_data+= array(
						'type_de_compteur' => $this->input->post('lieu_reuion')
					);
					$verif_data+= array(
						'type_de_compteur' => $this->input->post('lieu_reuion')
					);
				}
				if ($this->input->post('point') == 0) {
					$update_data+= array('initial' => $this->input->post('intialnum') );
					$verif_data+= array('initial' => $this->input->post('intialnum') );
				}
				if ($this->input->post('point') == 1) {
					$update_data+= array('initial' => $this->input->post('intialnum1'),'vigule_initial' =>  $this->input->post('intialnum2'));
					$verif_data+= array('initial' => $this->input->post('intialnum1'),'vigule_initial' =>  $this->input->post('intialnum2'));
				}
				if ($this->Reuion_model->verif_liste_Reuion($verif_data)==true) {
					$this->session->set_flashdata('basicErreur', get_phrase('Pas de modification effectuer'));
      				redirect('domino/', 'refresh');
				}
		        else {
		        	if ($this->Reuion_model->update_liste_reuion($update_data,$this->input->post('verifcode')) == true) {
		        		$this->session->set_flashdata('basicWarning', get_phrase('Successfully updated'));
          				redirect('domino/', 'refresh');
		        	} else {
		        		$this->session->set_flashdata('basicErreur', get_phrase('error'));
      					redirect('domino/', 'refresh');
		        	}
		        	
		          	
		        }
			}

			if ($this->input->post('envoi')==get_phrase('Supprimer')){
				if ($this->Reuion_model->delete_liste_reuion($this->input->post('verifcode'))==false) {
					$this->session->set_flashdata('basicErreur', get_phrase('refresh your page'));
      				redirect('domino/', 'refresh');
				}
		        else {
		        	if ($this->Reuion_model->delete_liste_presence2($this->input->post('verifcode'))==false) {
	      				$this->session->set_flashdata('basicWarning', get_phrase('Successfully deleted'));
          				redirect('domino/', 'refresh');
					}
					else{
						$this->session->set_flashdata('basicWarning', get_phrase('Successfully deleted'));
          				redirect('domino/', 'refresh');
					}
		        }	
			}

			if ($this->input->post('envoi')==get_phrase('view')){
      				redirect('domino/listepage/'.$this->input->post('verifcode'), 'refresh');
				
				
			}
		}
		
		
	}
	
	public function fetchpointlisteData(){
		$result = array('data' => array());
	    $types = '';
	    $note=0;
	    $aff_service = $this->Reuion_model->lire_listes_Reuion();
	    foreach ($aff_service as $key => $value) {
	      	$note++;
	      	if ($value['type_recharge'] == 0) {
	      		$pain =get_phrase('not recharge');
	      		$conso = $value['initial'];
	      	} else {
	      		$pain =get_phrase('recharge');
	      		$conso = $value['initial'].','.$value['vigule_initial'];
	      	}
	      	
      		$buttons='<center>';
	        	$buttons .= '<button type="button" class="btn color-palette btn-default " data-toggle="modal" data-target="#modal-view" title="'.get_phrase('Voire et et modifier la liste de presence').'" onclick="action_view(\''.$value['lien'].'\')" ><i class="fa fa-eye"></i></button>';
	      	
        		$buttons .= '&nbsp;<button type="button" class="btn bg-teal color-palette" data-toggle="modal" data-target="#modal-modifs" title="'.get_phrase('modification').'" onclick="action_modif(\''.$value['id'].'\')" ><i class="fa fa-pencil-square-o"></i></button>&nbsp;';
	      	
	  			$buttons .= '<button type="button" class="btn bg-red-active color-palette" data-toggle="modal" data-target="#modal-supp" title="'.get_phrase('suppresion').'"  onclick="action_supp(\''.$value['id'].'\')" ><i class="fa fa-trash-o"></i></button>';
	  		
	      $buttons.='<center>';
	      $result['data'][$key] = array(
	        $note,
	        $pain,
	        $value['num'],
	        $value['type_de_compteur'],
	        $conso,
	        $buttons
	      );
	    } // /foreach
	    
	      echo json_encode($result);
	}
	public function fechrecepreuion($t){
		$verifaction = array('id' => $t );
		$result = $this->Reuion_model->recep_liste_reuion($verifaction);
		echo json_encode($result);
	}

	public function listepage($page=null){
		if(!in_array('viewCaisse', $this->permission) || !in_array('deleteCaisse', $this->permission) || !in_array('updateCaisse', $this->permission) || !$page) {
			redirect('dashboard', 'refresh');
		}
		$this->data['titre'] = 'La Liste de consomation';
		$this->data['lien'] = 'La Liste de consomation';
		$this->data['icon'] = '<i class="fa fa-list-alt"></i>';
		$verifaction = array('lien' => $page );
		$info = $this->Reuion_model->recep_liste_reuion2($verifaction);
		$this->data['idreunion'] = $info['id'];
		$this->data['name_page'] = $info['type_de_compteur'];
		$this->data['type_page'] = $info['type_recharge'];
		if ($info['type_recharge'] == 0) {
			$max_values = array('id_compteur' => $this->data['idreunion'] );
			/*echo var_dump($this->Reuion_model->recep_liste_presence2($max_values));
			exit();*/
			if ($this->Reuion_model->recep_liste_presence2($max_values) == false) {
				$this->data['maxvalcompt'] = $info['initial'];

			} else {
				$poert = $this->Reuion_model->recep_liste_presence2($max_values);
				$this->data['maxvalcompt'] = $poert['munero_du_jour'];
			}
			
		}
		if ($info['type_recharge'] == 1) {
			$max_values = array('id_compteur' => $this->data['idreunion'] );
			/*echo var_dump($this->Reuion_model->recep_liste_presence2($max_values));
			exit();*/
			if ($this->Reuion_model->recep_liste_presence2($max_values) == false) {
				$this->data['maxvalcompt'] = $info['initial'].'.'.$info['vigule_initial'];

			} else {
				$poert = $this->Reuion_model->recep_liste_presence2($max_values);
				$this->data['maxvalcompt'] = $poert['munero_du_jour'].'.'.$poert['vigule_munero_du_jour'];
			}
		}
		
		if (!$this->input->post()){
			$this->data['numreuion'] = $page;
			$this->render_template('listespresence/liste', $this->data);
		} else {
			if ($this->input->post('envoi')==get_phrase('Enregistrer')){
				$enreg = array();
				$verifaction = array();
				$id_compteur = $this->input->post('id_type_compteur');
				if ($this->input->post('forme_compteur') ==0) {
					$consomation = $this->input->post('consomation');
					$verifaction += array(
						'munero_du_jour' => $consomation
					);
					
					$enreg += array(
						'munero_du_jour' => $consomation
					);
				}
				if ($this->input->post('forme_compteur') ==1) {
					
					if ($this->input->post('typepagerecharge')==0) {
						if ($this->input->post('consomation1').'.'.$this->input->post('consomation2') > $this->input->post('maxmod')) {
							$this->session->set_flashdata('basicErreur', get_phrase('notation du compteur trop elevee'));
	      					redirect('domino/listepage/'.$page, 'refresh');
						}
					}

					if ($this->input->post('typepagerecharge')==1) {
						if ($this->input->post('consomation1').'.'.$this->input->post('consomation2') < $this->input->post('maxmod')) {
							$this->session->set_flashdata('basicErreur', get_phrase('notation du compteur trop elevee'));
	      					redirect('domino/listepage/'.$page, 'refresh');
						}
					}
					$consomation0 = $this->input->post('consomation1');
					$consomation1 = $this->input->post('consomation2');
					$verifaction += array(
						'munero_du_jour' => $consomation0,
						'vigule_munero_du_jour' => $consomation1
					);
					
					$enreg += array(
						'munero_du_jour' => $consomation0,
						'vigule_munero_du_jour' => $consomation1,
						'recharge' => $this->input->post('typepagerecharge')
					);
				}
				

				$e = $this->input->post('d_act');
				$a_date1 = explode("-", $e);
				$e = $this->input->post('h_act');
				$a_date2 = explode(":", $e);
				$date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);

				$date_action=time();

				$id_p = $this->session->userdata('id');
				
				$verifaction += array(
					'id_compteur' => $id_compteur, 
					'date_prise' => $date_realisation
				);
				
				$enreg += array(
					'id_compteur' => $id_compteur, 
					'date_prise' => $date_realisation, 
					'date_enreg' => $date_action, 
					'id_user' =>  $id_p
				);
				
				$op = array('id' => $id_compteur );
				$info = $this->Reuion_model->recep_liste_reuion2($op);
				
				if ($this->Reuion_model->verif_liste_presence($verifaction)==true) {
					$this->session->set_flashdata('basicErreur', get_phrase('enregistrement deja effectuer'));
      				redirect('domino/listepage/'.$info['lien'], 'refresh');
				}
		        else {
		          	$this->Reuion_model->create_liste_presence($enreg);
		          	$this->session->set_flashdata('basicWarning', get_phrase('Successfully created'));
          			redirect('domino/listepage/'.$info['lien'], 'refresh');
		        }
			}
			if ($this->input->post('envoi') == get_phrase('updated')) {
				if ($this->input->post('id_info')==0) {
					$verif_personcontact = array(
						'nom' => $this->input->post('nom'),
						'prenom' => $this->input->post('prenom'),
						'cel' => $this->input->post('num_phone'),
					);
					if ($this->Personne_model->verif_personne_contact($verif_personcontact) == true) {
						$this->session->set_flashdata('basicErreur', get_phrase('deja enregistrer en temps que membre reprendre action svp'));
          				redirect('listepresence/listepage/'.$this->input->post('id_liste'), 'refresh'); 

					} else {
						$verif_person_liste = array(
							'nom' => $this->input->post('nom'),
							'prenom' => $this->input->post('prenom'),
							'numero_phone' => $this->input->post('num_phone'),
						);
						if ($this->Reuion_model->verif_liste_presence($verif_person_liste) == true) {
							$this->session->set_flashdata('basicErreur', get_phrase('deja ajouter a la liste reprener svp selectionner'));
          					redirect('listepresence/listepage/'.$this->input->post('id_liste'), 'refresh');
						} else {
							$voir = array('id' => $this->input->post('id_liste') );
							$t1 = $this->Reuion_model->recep_liste_reuion2($voir);

							$verif_person_liste+= array(
		                      'mem' => 0,
		                      'date_enregistre'=> $t1['date_reuion']
		                    );
		                    $this->Reuion_model->create_liste_presence2($verif_person_liste);
							$this->session->set_flashdata('basicWarning', get_phrase('ajouter avec succes'));
          					redirect('listepresence/listepage/'.$this->input->post('id_liste'), 'refresh');
		                    
		                    
						}
						
					}
					
				}
				else{
					$verif_perso = array(
						'id_reunion' => $this->input->post('id_liste'),
						'id_personne' => $this->input->post('id_info')
					);
					if ($this->Reuion_model->verif_acte_presence($verif_perso) == true) {
						$modif_perso= array(
							'type_acte' => $this->input->post('acte')
						);
						$this->Reuion_model->update_acte_presence($modif_perso, $verif_perso);
						$this->session->set_flashdata('basicWarning', get_phrase('modifier avec succes'));
          				redirect('listepresence/listepage/'.$this->input->post('id_liste'), 'refresh');
					} else {
						$verif_perso+= array(
							'type_acte' => $this->input->post('acte')
						);
						$this->Reuion_model->inser_acte_presence($verif_perso);
						$this->session->set_flashdata('basicWarning', get_phrase('ajouter avec succes'));
          				redirect('listepresence/listepage/'.$this->input->post('id_liste'), 'refresh');
					}
					
				}
			}
			if ($this->input->post('envoi')==get_phrase('Supprimer')){
				if ($this->Reuion_model->delete_liste_presence($this->input->post('verifcode'))==false) {
					$this->session->set_flashdata('basicErreur', get_phrase('refresh your page'));
      				redirect('domino/listepage/'.$page, 'refresh');
				}
		        else {
		        	
					$this->session->set_flashdata('basicWarning', get_phrase('Successfully deleted'));
	  				redirect('domino/listepage/'.$page, 'refresh');
					
		        }	
			}
		}

	}

	public function fetchlistecompteur($idpage=null){
		$result = array('data' => array());
	    $types = '';
	    $note=0;
	    $verifaction = array('id' => $idpage );
		$info = $this->Reuion_model->recep_liste_reuion2($verifaction);
		$type_recharge = $info['type_recharge'];
		$vue1=$info['initial'];
		$vue2=$info['vigule_initial'];
		/*echo var_dump($verifaction);
		exit();*/
	    $listeprise = array('id_compteur' => $idpage );
	    $numreuion = $this->Reuion_model->lire_listes_presence2($listeprise);
	    $o=0;
	    if ($type_recharge == 0) {
	    	$conso=$vue1;//la valeur innitial du compteur
	    	$somme=0;//pour fait la somme global des consomation effectuer pendant ces journée
	    	$nbrepoint=0;//^pour compter le nombre de fois le compteur est enregistré
	    	foreach ($numreuion as $kei => $value) {
	    		$nbrepoint++;
	    		$somme+=$value['munero_du_jour']-$conso;
			    $conso=$value['munero_du_jour'];
	    	}
	    	/*echo var_dump($numreuion);
	    	exit();*/
	    	if ($numreuion==false || $nbrepoint == 0 || $somme == 0) {
	    		$valeurmoyen = 1;
	    	}else{
	    		$valeurmoyen = $somme/$nbrepoint;
	    		
	    	}
	    	
	    	/*echo var_dump($numreuion);
	        exit();*/
	    	$conso=$vue1;
	    	$consop = 0;
	    	$o=0;
	        foreach ($numreuion as $key => $value) {
	        	
	        	$datesd=date("d/m/Y à H:i ", $value['date_prise']);

	       		$notation=$value['munero_du_jour'];


		        $priseconso=$value['munero_du_jour']-$conso;

		        $consomation=$value['munero_du_jour']-$conso;
				


				$priseconsomation ='<div class="col-xs-6 col-md-6 text-center">';
		        if ($consop == $consomation) {
		        	$priseconsomation .='<button type="button" class="btn bg-aqua-active color-palette"  title="'.get_phrase('aucune perte d energi').'"  ><i class="fa fa-dot-circle-o"> 0 KWh </i></button>';
		        } else {
		        	
		        	if ($consomation > $consop) {
		        		$f = $consomation-$consop;
		        		$priseconsomation .='<button type="button" class="btn bg-red-active color-palette"  title="'.get_phrase('orgmentation du perte d energie').'"  ><i class="glyphicon glyphicon-arrow-up"> '.$f.' KWh </i></button>';
		        	}
		        	if ($consomation-$consop < 0) {
		        		$f = $consop - $consomation;
		        		$priseconsomation .='<button type="button" class="btn bg-blue-active color-palette"  title="'.get_phrase('diminusion du perte d energie').'"  ><i class="glyphicon glyphicon-arrow-down"> '.$f.' KWh</i></button>';
		        	}
		        }
		        $priseconsomation .='</div>';

		        $evaluation=$priseconsomation;
			    $boite=round(($consomation*50)/$valeurmoyen);
		        $evaluation .='<div class="col-xs-6 col-md-6 text-center">';
		        	if ($boite<50) {
		        		$evaluation .='<b><button type="button" title="dans la norme de depense d energie par rapport a la moyene" class="btn bg-gray active color-palette">'.$boite.' %</button></b>';
		        	} else {
		        		if ($boite <=100) {
		        			$evaluation .='<b><button title="depasser la norme de depense d energie par rapport a la moyene" type="button" class="btn bg-blue active color-palette">'.$boite.' %</button></b>';
		        		}
		        		if ($boite> 100) {
		        			$evaluation .='<b><button title="trop elever par rapport a la moyene" type="button" class="btn bg-red active color-palette">'.$boite.' %</button></b>';
		        		}
		        		
		        	}
		        	
		        	
			    $evaluation .='</div>';
		    	$conso = $value['munero_du_jour'];
		    	$buttons='<center>';
		        	$buttons .= '&nbsp;<button type="button" class="btn bg-teal color-palette" data-toggle="modal" data-target="#modal-modifs" title="'.get_phrase('modification').'" onclick="action_modif(\''.$value['id'].'\')" ><i class="fa fa-pencil-square-o"></i></button>&nbsp;';
		      	
		  			$buttons .= '<button type="button" class="btn bg-red-active color-palette" data-toggle="modal" data-target="#modal-supp" title="'.get_phrase('suppresion').'"  onclick="action_supp(\''.$value['id'].'\')" ><i class="fa fa-trash-o"></i></button>';
		  		
	      		$buttons.='<center>';	
			    $note++;

	        	$result['data'][$o] = array(
				       	$datesd,
			       		$this->modulenumber($notation).' KWh',
				        $this->modulenumber($priseconso).' KWh',
				        $evaluation,
				    	$buttons
				);
				$o++;
				$consop = $consomation;
	        }//foreach
	    }
	    if ($type_recharge == 1) {
	        $conso=$vue1.'.'.$vue2;//la valeur innitial du compteur
	    	$somme=0;//pour fait la somme global des consomation effectuer pendant ces journée
	    	$nbrepoint=0;//^pour compter le nombre de fois le compteur est enregistré
	    	$listeprise1 = array(
	    		'id_compteur' => $idpage,
	    		'recharge' => 0 );
	    	$numreuion1 = $this->Reuion_model->lire_listes_presence2($listeprise1);
	    	foreach ($numreuion1 as $kei => $value) {
	    		$nbrepoint++;
	    		$somme+=$value['munero_du_jour'].'.'.$value['vigule_munero_du_jour']-$conso;
			    $conso=$value['munero_du_jour'].'.'.$value['vigule_munero_du_jour'];
	    	}
	    	if ($numreuion==false || $nbrepoint == 0 || $somme == 0) {
	    		$valeurmoyen = 1;
	    	}else{
	    		$valeurmoyen = $somme/$nbrepoint;
	    		
	    	}
	    	/*echo var_dump($numreuion);
	        exit();*/
	    	$conso=$vue1.'.'.$vue2;
	    	$consop = 0;
	    	$o=0;
	        foreach ($numreuion as $key => $value) {
	        	
	        	$datesd=date("d/m/Y à H:i ", $value['date_prise']);

	        	$vcontrole=$value['munero_du_jour'].'.'.$value['vigule_munero_du_jour'];
	       		$notation=$vcontrole;
	       		if ($value['recharge'] == 1) {
	       			$rech=$vcontrole-$conso;
	       			$reste=$conso;
	       			$priseconso=get_phrase('Recharge').': '.number_format($rech, 2, ',', ' ').' KWh'.'<br/>'.get_phrase('Reste').': '.number_format($reste, 2, ',', ' ').' KWh';
	       			
	       		} else {
	       			$priseconso=get_phrase('Consomer').': '.number_format($conso-$vcontrole, 2, ',', ' ').' KWh';
		       			
	       		}
	       		
	       		
	       		
		        

		        
				$f=0;
		        if ($value['recharge'] == 1) {
		        	$evaluation='';
		        }else{
		        	$consomation=$conso-$vcontrole;
		        	$priseconsomation ='<div class="col-xs-6 col-md-6 text-center">';
		        	if ($consop == $consomation) {
		        		$priseconsomation .='<button type="button" class="btn bg-aqua-active color-palette"  title="'.get_phrase('aucune perte d energi').'"  ><i class="fa fa-dot-circle-o"> '.$f.' KWh </i></button>';
			        } else {
			        	
			        	if ($consomation > $consop) {
			        		$f = $consomation-$consop;
			        		$priseconsomation .='<button type="button" class="btn bg-red-active color-palette"  title="'.get_phrase('orgmentation du perte d energie').'"  ><i class="glyphicon glyphicon-arrow-up"> '.$f.' KWh </i></button>';
			        	}
			        	if ($consomation-$consop < 0) {
			        		$f = $consop - $consomation;
			        		$priseconsomation .='<button type="button" class="btn bg-blue-active color-palette"  title="'.get_phrase('diminusion du perte d energie').'"  ><i class="glyphicon glyphicon-arrow-down"> '.$f.' KWh</i></button>';
			        	}
			        }
			        $priseconsomation .='</div>';
			        $evaluation=$priseconsomation;
				    $boite=round(($f*50)/$valeurmoyen);
			        $evaluation .='<div class="col-xs-6 col-md-6 text-center">';
			        	if ($boite<50) {
			        		$evaluation .='<b><button type="button" title="dans la norme de depense d energie par rapport a la moyene" class="btn bg-gray active color-palette">'.$boite.' %</button></b>';
			        	} else {
			        		if ($boite <=100) {
			        			$evaluation .='<b><button title="depasser la norme de depense d energie par rapport a la moyene" type="button" class="btn bg-blue active color-palette">'.$boite.' %</button></b>';
			        		}
			        		if ($boite> 100) {
			        			$evaluation .='<b><button title="trop elever par rapport a la moyene" type="button" class="btn bg-red active color-palette">'.$boite.' %</button></b>';
			        		}
			        		
			        	}
			        	
			        	
				    $evaluation .='</div>';
		        }

				

		        
		    	
					$conso = $vcontrole;
					
				
		    	$buttons='<center>';
		        	$buttons .= '&nbsp;<button type="button" class="btn bg-teal color-palette" data-toggle="modal" data-target="#modal-modifs" title="'.get_phrase('modification').'" onclick="action_modif(\''.$value['id'].'\')" ><i class="fa fa-pencil-square-o"></i></button>&nbsp;';
		      	
		  			$buttons .= '<button type="button" class="btn bg-red-active color-palette" data-toggle="modal" data-target="#modal-supp" title="'.get_phrase('suppresion').'"  onclick="action_supp(\''.$value['id'].'\')" ><i class="fa fa-trash-o"></i></button>';
		  		
	      		$buttons.='<center>';	
			    $note++;

	        	$result['data'][$o] = array(
				       	$datesd,
			       		number_format($notation, 2, ',', ' ').' KWh',
				        $priseconso,
				        $evaluation,
				    	$buttons
				);
				$o++;
				if($value['recharge'] == 0){
					$consop = $consomation;
				}
				
	        }//foreach
	    }
	      echo json_encode($result);
	}

	function fetchlistepresence($idpage){
    	$reponse='';
    	$reponse.="<option value=''>".get_phrase('selected your number')."</option>";
    	$reponse.="<option value='0'>".get_phrase('autre')."</option>";
     	$numreuion = $this->Reuion_model->lire_listes_presence();
	    $listeprise = array('id' => $idpage );
        foreach ($numreuion as $key => $value) {
        	$datecontrole = $this->Reuion_model->recep_liste_reuion2($listeprise);
			if ($datecontrole['date_reuion'] >= $value['date_enregistre'] ) {
				$reponse.="<option value='".$value['id']."'>".$value['numero_phone']." [".$value['nom']." ".$value['prenom']."]</option>";
			}
        }   
            
          
      	echo json_encode($reponse);
    }
    function verifliste($idpage){
    	$f = array('id' => $idpage );
     	$numreuion = $this->Reuion_model->recep_liste_presence2($f);
	    
      	echo json_encode($numreuion);
    }

    function verifidateIntervalconsomValue(){
    	$reponse="voire";
    	echo json_encode($reponse);
    }
    
	
}
