<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Caisses extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_kl_in();

		$this->data['page_title'] = 'caisse';

		$this->load->model('Caisse_model');
	    $this->load->model('Personne_model');

		$this->load->library('form_validation');
	}

	/* 
	* It only redirects to the manage product page and
	*/
	public function index()
	{

      
	    if(!in_array('viewCaisse', $this->permission) || !in_array('deleteCaisse', $this->permission) || !in_array('updateCaisse', $this->permission) ) {
			redirect('dashboard', 'refresh');
		}
	     
	    $this->data['titre'] = 'Caisse';
	    $this->data['lien'] = 'Caisse';
	    $this->data['icon'] = '<i class="fa fa-dollar"> </i>';
	    $this->load->helper('form');
	    if (!$this->input->post()){
			$this->data['aff_service'] = $this->Caisse_model->Aff_caisse();
			$this->data['aff_type1'] = $this->Caisse_model->Aff_type_caisse(1);
			$this->data['aff_type2'] = $this->Caisse_model->Aff_type_caisse(2);
			$this->render_template('caisse/index', $this->data);
	    }else{
			if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
				$this->session->set_flashdata('basicWarning', get_phrase('Error Password'));
				redirect('caisses/', 'refresh');
			}
	        
	        if ($this->input->post('envoi')==get_phrase('begin')){
	      		$e = $this->input->post('d_act1');
    			$a_date1 = explode("-", $e);
        		$date_realisation1 = mktime(0,0,0,$a_date1[1],$a_date1[2],$a_date1[0]);
		        $e = $this->input->post('d_act2');
		        $a_date1 = explode("-", $e);
		        $date_realisation2 = mktime(23,59,59,$a_date1[1],$a_date1[2],$a_date1[0]);
	        	$da = array( 
	              'date_interval7' => $date_realisation1,
	              'date_interval8' => $date_realisation2
	            );
	            $this->session->set_userdata($da);
          		redirect('caisses/', 'refresh');
	            
	        }
	      

	    }
	}

	public function refresh(){
		$recupet = array('date_interval7','date_interval8');
        $this->session->unset_userdata($recupet);
		redirect('caisses/', 'refresh');
	}
	public function gexterne($es=Null)
	{
		if ($es) {

			$recupet = array('date_interval5','date_interval6');
            $this->session->unset_userdata($recupet);
			redirect('caisses/gexterne', 'refresh');
		} else {
      
		    if(!in_array('viewCaisse', $this->permission) || !in_array('deleteCaisse', $this->permission) || !in_array('updateCaisse', $this->permission) ) {
				redirect('dashboard', 'refresh');
			}
		     
		    $this->data['titre'] = 'Caisse';
		    $this->data['lien'] = 'Caisse';
		    $this->data['icon'] = '<i class="fa fa-dollar"> </i>';
		    $this->load->helper('form');
		    if (!$this->input->post()){
				$this->data['aff_service'] = $this->Caisse_model->Aff_caisse();
				$this->data['aff_type1'] = $this->Caisse_model->Aff_type_caisse(5);
				$this->data['aff_type2'] = $this->Caisse_model->Aff_type_caisse(6);

				if (isset($_SESSION['date_interval5'])==true || isset($_SESSION['date_interval6'])==true) {
					$somm=$this->Caisse_model->aff_somme_entrer(5,null,1,$_SESSION['date_interval5'],$_SESSION['date_interval6']);
					$this->data['e_caisse1']=$this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_entrer(5,null,2,$_SESSION['date_interval5'],$_SESSION['date_interval6']);
					$this->data['e_caisse2']=$this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_entrer(5,3,null,$_SESSION['date_interval5'],$_SESSION['date_interval6']);
					$this->data['e_caisse3']=$this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_entrer(5,null,null,$_SESSION['date_interval5'],$_SESSION['date_interval6']);
					$this->data['e_caisse']=$somm['total'];

					$somm=$this->Caisse_model->aff_somme_sortie(6,1,$_SESSION['date_interval5'],$_SESSION['date_interval6']);
					$this->data['s_caisse1'] = $this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_sortie(6,2,$_SESSION['date_interval5'],$_SESSION['date_interval6']);
					$this->data['s_caisse2'] = $this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_sortie(6,3,$_SESSION['date_interval5'],$_SESSION['date_interval6']);
					$this->data['s_caisse3'] = $this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_sortie(6,null,$_SESSION['date_interval5'],$_SESSION['date_interval6']);
					$this->data['s_caisse'] = $somm['total'];

					$tto =$this->data['e_caisse'] - $this->data['s_caisse'];
					
					$this->data['e_caisse'] = $this->sete($this->data['e_caisse']);


					$this->data['s_caisse'] =  $this->sete($this->data['s_caisse']);
					
					$this->data['total_caisse'] =  $this->sete($tto);
					$this->data['total_caisse2'] =  $tto;
					

					

					
				}else{
					$somm=$this->Caisse_model->aff_somme_entrer(5,null,1);
					$this->data['e_caisse1']=$this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_entrer(5,null,2);
					$this->data['e_caisse2']=$this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_entrer(5,3);
					$this->data['e_caisse3']=$this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_entrer(5);
					$this->data['e_caisse']=$somm['total'];

					$somm=$this->Caisse_model->aff_somme_sortie(6,1);
					$this->data['s_caisse1'] = $this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_sortie(6,2);
					$this->data['s_caisse2'] = $this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_sortie(6,3);
					$this->data['s_caisse3'] = $this->sete($somm['total']);

					$somm=$this->Caisse_model->aff_somme_sortie(6);
					$this->data['s_caisse'] = $somm['total'];

					$tto =$this->data['e_caisse'] - $this->data['s_caisse'];
					
					$this->data['e_caisse'] = $this->sete($this->data['e_caisse']);


					$this->data['s_caisse'] =  $this->sete($this->data['s_caisse']);
					
					$this->data['total_caisse'] =  $this->sete($tto);
					$this->data['total_caisse2'] =  $tto;
					

					

					$this->render_template('caisse/cexterne', $this->data);
				}


				
		    }else{
				if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
					$this->session->set_flashdata('basicWarning', get_phrase('Error Password'));
					redirect('caisses/gexterne', 'refresh');
				}
		        
		        if ($this->input->post('envoi')==get_phrase('enregistrer')){
					$this->form_validation->set_rules('types','types','trim|required');
					$this->form_validation->set_rules('nom_type','nom_type','trim|required');
					$this->form_validation->set_rules('montant','montant','trim|required');
					$this->form_validation->set_rules('d_act','d_act','trim|required');
					$this->form_validation->set_rules('h_act','h_act','trim|required');
					$this->form_validation->set_rules('nom_indivi','nom_indivi','trim|required');
					if($this->form_validation->run()===TRUE)
		          	{
			          	//information sur l'individu porteur ou reseveur d'argent
				          	$dat = array( 
				              'nom_individu' => $this->input->post('nom_indivi'),
				              'contact' => $this->input->post('tel_indivi')
				            );
				            if ($this->Personne_model->verif_indiv($dat)==true) {}
				            else {
				              $this->Personne_model->create_indiv($dat);
				            }

				            $aff=$this->Personne_model->recep_indiv($dat);
				            $id_idu=$aff['id'];

		            	//controle sur la tranformation de type soit entrer ou sortie de caisse
		          			//choix du nom du type
		            			if ($this->input->post('nom_type')==0) {
		            				if ($this->input->post('types') ==1) {
				            			$pate=5;
				            			$dat = array( 
											'type' => $pate,
											'liaison' => 3,
											'nom' => $this->input->post('autre_nom_type')
										);
		            				}

		            				if ($this->input->post('types') ==2) {
		            					$pate=6;
				            			if ($this->input->post('lier') ==1) {
											$liaison = 1;
										}
										if ($this->input->post('lier') ==2) {
											$liaison = 2;
										}
										if ($this->input->post('lier') ==3) {
											$liaison = 3;
										}
										$dat = array( 
											'type' => $pate,
											'liaison' => $liaison,
											'nom' => $this->input->post('autre_nom_type')
										);
				            		}

				            		if ($this->Caisse_model->verif_typactcaisse($dat)==true) {}
									else {
										$this->Caisse_model->create_typactcaisse($dat);
									}

									$aff=$this->Caisse_model->recep_typactcaisse($dat);
									$id_tac=$aff['id'];

		            			}
				            	else{
				            		$id_tac=$this->input->post('nom_type');
				            	}

		           		//recuperatin des dates
			            	$e = $this->input->post('d_act');
				            $a_date1 = explode("-", $e);
				            $e = $this->input->post('h_act');
				            $a_date2 = explode(":", $e);
				            $date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
				            $date_action=time();
				            if ($date_realisation>$date_action) {
				              $this->session->set_flashdata('basicErreur', get_phrase('Error in controle the date!!'));
				              redirect('caisses/gexterne', 'refresh');
				            }

			            $id_p = $this->session->userdata('id');
			            $data = array( 
			              'vide' => md5(uniqid(rand(), true)),
			              'raison' => $this->input->post('propos'),
			              'porte' => 3,
			              'date_enreg' => $date_realisation,
			              'montant' => $this->input->post('montant'),
			              'id_type' => $id_tac,
			              'id_individu' => $id_idu
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
			            redirect('caisses/gexterne', 'refresh');
		            	
		            
					}else{
						$this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
						redirect('caisses/gexterne', 'refresh');
		          	} 
		        }
		        if ($this->input->post('envoi')==get_phrase('Modifier')){
		          $dat = array( 
		            'nom_individu' => $this->input->post('nom_indivi'),
		            'type_indifidu' => $this->input->post('type_indivi'),
		            'contact' => $this->input->post('tel_indivi')
		          );
		          if ($this->Personne_model->verif_indiv($dat)==true) {}
		          else {
		            $this->Personne_model->create_indiv($dat);
		          }
		          $aff=$this->Personne_model->recep_indiv($dat);
		          $id_idu=$aff['id'];
		          if ($this->input->post('nom_type')==0) {
		            $dat = array( 
		              'type' => $this->input->post('types'),
		              'nom' => $this->input->post('autre_nom_type')
		            );
		            if ($this->Caisse_model->verif_typactcaisse($dat)==true) {}
		            else {
		              $this->Caisse_model->create_typactcaisse($dat);
		            }
		            $aff=$this->Caisse_model->recep_typactcaisse($dat);
		            $id_tac=$aff['id'];
		          } else {
		            $id_tac=$this->input->post('nom_type');
		          }
		          $e = $this->input->post('d_act');
		          $a_date1 = explode("-", $e);
		          $e = $this->input->post('h_act');
		          $a_date2 = explode(":", $e);
		          $date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
		          $date_action=time();
		          if ($date_realisation>$date_action) {
		            $this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
		            redirect('caisses/gexterne', 'refresh');
		          }
		          $id_p = $this->session->userdata('id');
		          $mtoto= $this->input->post('montantancien')-$this->input->post('montant');
		          $data = array( 
		            'raison' => $this->input->post('propos'),
		            'date_enreg' => $date_realisation,
		            'montant' => $this->input->post('montant'),
		            'id_type' => $id_tac,
		            'id_individu' => $id_idu
		          );
		          if ($this->Caisse_model->MajActionCaisse($data,$this->input->post('verifcode'))==true) {
		            $cop=$this->Caisse_model->recep_Id_caisse($data);
		            $data = array( 
		              'model_base' => 2,
		              'id_caisse' => $cop['id'],
		              'id_user' => $id_p,
		              'montant' => $mtoto,
		              'date_action' => $date_action,
		              'date_enreg' => $date_realisation,
		            );
		            $this->Caisse_model->Insert31($data);
		            $this->session->set_flashdata('basicWarning', get_phrase('Successfully update'));
		            redirect('caisses/gexterne', 'refresh');
		          }
		        }
		        if ($this->input->post('envoi')==get_phrase('Supprimer')){
		        	$id_p = $this->session->userdata('id');
		          	$date_action=time();
		          	
		            $data = array( 
		              'date_enreg' => $date_action,
		              'supprimer' => 1
		            );
		            
		            if ($this->Caisse_model->MajActionCaisse2($data,$this->input->post('controle_adh'))==true){
		            	$data = array( 
							'date_action' => $date_action,
							'model_base' => 3,
							'id_caisse' => $this->input->post('verifcode'),
							'id_user' => $id_p
						);
	              		$this->Caisse_model->Insert31($data);

	              		$data = array( 
							'id' => $this->input->post('verifcode'),
							'vide' => $this->input->post('controle_adh')
						);
	              		$cop=$this->Caisse_model->recep_Id_caisse($data);
	              		
	              		if($cop['id_type']==2 || $cop['id_type']==5){
	              			
	              			$data = array( 
								'date_action' => $date_action,
								'model_base' => 3,
								'id_caisse' => $this->input->post('verifcode')-1,
								'id_user' => $id_p
							);
		              		$this->Caisse_model->Insert31($data);
		              		$this->session->set_flashdata('basicWarning', get_phrase('Successfully removed'));
	              			redirect('caisses/gexterne', 'refresh');
	              		}
	              		$this->session->set_flashdata('basicWarning', get_phrase('Successfully removed'));
	              		redirect('caisses/gexterne', 'refresh');
		            	
		            }else{
		            	$this->session->set_flashdata('basicWarning', get_phrase('Action deja realiser'));
	              		redirect('caisses/gexterne', 'refresh');
		            }
		        }
		      	if ($this->input->post('envoi')==get_phrase('begin')){
		      		$e = $this->input->post('d_act1');
	    			$a_date1 = explode("-", $e);
	        		$date_realisation1 = mktime(0,0,0,$a_date1[1],$a_date1[2],$a_date1[0]);
			        $e = $this->input->post('d_act2');
			        $a_date1 = explode("-", $e);
			        $date_realisation2 = mktime(23,59,59,$a_date1[1],$a_date1[2],$a_date1[0]);
		        	$da = array( 
		              'date_interval5' => $date_realisation1,
		              'date_interval6' => $date_realisation2
		            );
		            $this->session->set_userdata($da);
	          		redirect('caisses/gexterne', 'refresh');
		            
		        }

		    }
		}
	}

	public function Kiosque($es=Null)
	{
		if ($es) {

			$recupet = array('date_interval3','date_interval4');
            $this->session->unset_userdata($recupet);
			redirect('caisses/kiosque', 'refresh');
		} else {

      
		    if(!in_array('viewCaisse', $this->permission) || !in_array('deleteCaisse', $this->permission) || !in_array('updateCaisse', $this->permission) ) {
				redirect('dashboard', 'refresh');
			}
		     
		    $this->data['titre'] = 'Caisse';
		    $this->data['lien'] = 'Caisse';
		    $this->data['icon'] = '<i class="fa fa-dollar"> </i>';
		    $this->load->helper('form');
		    if (!$this->input->post()){
				$this->data['aff_service'] = $this->Caisse_model->Aff_caisse();
				$this->data['aff_type1'] = $this->Caisse_model->Aff_type_caisse(3);
				$this->data['aff_type2'] = $this->Caisse_model->Aff_type_caisse(4);

				if (isset($_SESSION['date_interval3'])==true || isset($_SESSION['date_interval4'])==true) {

					$somm=$this->Caisse_model->aff_somme_entrer(3,null,null,$_SESSION['date_interval3'],$_SESSION['date_interval4']);
					$this->data['e_caisse']=$somm['total'];

					$somm=$this->Caisse_model->aff_somme_sortie(4,null,$_SESSION['date_interval3'],$_SESSION['date_interval4']);
					$this->data['s_caisse'] = $somm['total'];

					$tto =$this->data['e_caisse'] - $this->data['s_caisse'];
					
					$this->data['e_caisse'] = $this->sete($this->data['e_caisse']);


					$this->data['s_caisse'] =  $this->sete($this->data['s_caisse']);
					
					$this->data['total_caisse'] =  $this->sete($tto);
					$this->data['total_caisse2'] =  $tto;
					

					$this->render_template('caisse/kiosque', $this->data);
				}else{
					$somm=$this->Caisse_model->aff_somme_entrer(3);
					$this->data['e_caisse']=$somm['total'];

					$somm=$this->Caisse_model->aff_somme_sortie(4);
					$this->data['s_caisse'] = $somm['total'];

					$tto =$this->data['e_caisse'] - $this->data['s_caisse'];
					
					$this->data['e_caisse'] = $this->sete($this->data['e_caisse']);


					$this->data['s_caisse'] =  $this->sete($this->data['s_caisse']);
					
					$this->data['total_caisse'] =  $this->sete($tto);
					$this->data['total_caisse2'] =  $tto;
					

					

					$this->render_template('caisse/kiosque', $this->data);
				}


				
		    }else{
				if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
					$this->session->set_flashdata('basicWarning', get_phrase('Error Password'));
					redirect('caisses/kiosque', 'refresh');
				}
		        
		        if ($this->input->post('envoi')==get_phrase('enregistrer')){
		          $this->form_validation->set_rules('types','types','trim|required');
		          $this->form_validation->set_rules('nom_type','nom_type','trim|required');
		          $this->form_validation->set_rules('montant','montant','trim|required');
		          $this->form_validation->set_rules('d_act','d_act','trim|required');
		          $this->form_validation->set_rules('h_act','h_act','trim|required');
		          $this->form_validation->set_rules('nom_indivi','nom_indivi','trim|required');
		          if($this->form_validation->run()===TRUE)
		          {
		            $dat = array( 
		              'nom_individu' => $this->input->post('nom_indivi'),
		              'type_indifidu' => $this->input->post('type_indivi'),
		              'contact' => $this->input->post('tel_indivi')
		            );
		            if ($this->Personne_model->verif_indiv($dat)==true) {}
		            else {
		              $this->Personne_model->create_indiv($dat);
		            }
		            $aff=$this->Personne_model->recep_indiv($dat);
		            $id_idu=$aff['id'];

		            if ($this->input->post('nom_type')==0) {
		            	if ($this->input->post('types') ==1) {
		            		$pate=3;
		            	}
		            	if ($this->input->post('types') ==2) {
		            		$pate=4;
		            	}
		              $dat = array( 
		                'type' => $pate,
		                'nom' => $this->input->post('autre_nom_type')
		              );
		              if ($this->Caisse_model->verif_typactcaisse($dat)==true) {}
		              else {
		                $this->Caisse_model->create_typactcaisse($dat);
		              }
		              $aff=$this->Caisse_model->recep_typactcaisse($dat);
		              $id_tac=$aff['id'];
		            } else {
		              $id_tac=$this->input->post('nom_type');
		            }
		            
		            $e = $this->input->post('d_act');
		            $a_date1 = explode("-", $e);
		            $e = $this->input->post('h_act');
		            $a_date2 = explode(":", $e);
		            $date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
		            $date_action=time();
		            if ($date_realisation>$date_action) {
		              $this->session->set_flashdata('basicErreur', get_phrase('Error in  controle the date!!'));
		              redirect('caisses/kiosque', 'refresh');
		            }
		            
		            $id_p = $this->session->userdata('id');
		            $codepartiecontrole=md5(uniqid(rand(), true));
		            $data = array( 
		              'vide' => $codepartiecontrole,
		              'raison' => $this->input->post('propos'),
		              'date_enreg' => $date_realisation,
		              'montant' => $this->input->post('montant'),
		              'id_type' => $id_tac,
		              'id_individu' => $id_idu
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
		            if ($id_tac == 5) {
			            $data = array( 
			              'vide' => $codepartiecontrole,
			              'raison' => 'Transmission recette Kiosque',
			              'date_enreg' => $date_realisation,
			              'montant' => $this->input->post('montant'),
			              'id_type' => 8,
			              'porte' => 2,
			              'id_individu' => $id_idu
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
		            }
		            $this->session->set_flashdata('basicWarning', get_phrase('Successfully created'));
		            redirect('caisses/kiosque', 'refresh');
		          }else{
		            $this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
		            redirect('caisses/kiosque', 'refresh');
		          } 
		        }
		        if ($this->input->post('envoi')==get_phrase('Modifier')){
		          $dat = array( 
		            'nom_individu' => $this->input->post('nom_indivi'),
		            'contact' => $this->input->post('tel_indivi')
		          );
		          if ($this->Personne_model->verif_indiv($dat)==true) {}
		          else {
		            $this->Personne_model->create_indiv($dat);
		          }
		          $aff=$this->Personne_model->recep_indiv($dat);
		          $id_idu=$aff['id'];
		          if ($this->input->post('nom_type')==0) {
		            $dat = array( 
		              'type' => $this->input->post('types'),
		              'nom' => $this->input->post('autre_nom_type')
		            );
		            if ($this->Caisse_model->verif_typactcaisse($dat)==true) {}
		            else {
		              $this->Caisse_model->create_typactcaisse($dat);
		            }
		            $aff=$this->Caisse_model->recep_typactcaisse($dat);
		            $id_tac=$aff['id'];
		          } else {
		            $id_tac=$this->input->post('nom_type');
		          }
		          $e = $this->input->post('d_act');
		          $a_date1 = explode("-", $e);
		          $e = $this->input->post('h_act');
		          $a_date2 = explode(":", $e);
		          $date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
		          $date_action=time();
		          if ($date_realisation>$date_action) {
		            $this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
		            redirect('caisses/kiosque', 'refresh');
		          }
		          $id_p = $this->session->userdata('id');
		          $mtoto= $this->input->post('montantancien')-$this->input->post('montant');
		          $data = array( 
		            'raison' => $this->input->post('propos'),
		            'date_enreg' => $date_realisation,
		            'montant' => $this->input->post('montant'),
		            'id_type' => $id_tac,
		            'id_individu' => $id_idu
		          );
		          
		          if ($this->Caisse_model->MajActionCaisse($data,$this->input->post('verifcode'))==true) {
		            $cop=$this->Caisse_model->recep_Id_caisse($data);
		            $data = array( 
		              'model_base' => 2,
		              'id_caisse' => $cop['id'],
		              'id_user' => $id_p,
		              'montant' => $mtoto,
		              'date_action' => $date_action,
		              'date_enreg' => $date_realisation,
		            );
		            $this->Caisse_model->Insert31($data);
		            if ($id_tac==5) {
			          	$data = array( 
							'raison' => $this->input->post('propos'),
							'date_enreg' => $date_realisation,
							'montant' => $this->input->post('montant'),
							'id_type' => 8,
							'id_individu' => $id_idu
				        );
			          	$rr=$this->input->post('verifcode');
			          	if ($this->Caisse_model->MajActionCaisse($data,$rr)==true) {
			          		$data = array( 
				              'model_base' => 2,
				              'id_caisse' => $cop['id']+1,
				              'id_user' => $id_p,
				              'montant' => $mtoto,
				              'date_action' => $date_action,
				              'date_enreg' => $date_realisation,
				            );
				            $this->Caisse_model->Insert31($data);
			          	}
			        }

		            $this->session->set_flashdata('basicWarning', get_phrase('Successfully update'));
		            redirect('caisses/kiosque', 'refresh');
		          }
		        }
		        if ($this->input->post('envoi')==get_phrase('Supprimer')){
		        	$id_p = $this->session->userdata('id');
		          	$date_action=time();
		          	
		            $data = array( 
		              'date_enreg' => $date_action,
		              'supprimer' => 1
		            );
		            
		            if ($this->Caisse_model->MajActionCaisse2($data,$this->input->post('controle_adh'))==true){
		            	$data = array( 
							'date_action' => $date_action,
							'model_base' => 3,
							'id_caisse' => $this->input->post('verifcode'),
							'id_user' => $id_p,
						);
	              		$this->Caisse_model->Insert31($data);

	              		$data = array( 
							'id' => $this->input->post('verifcode'),
							'vide' => $this->input->post('controle_adh')
						);
	              		$cop=$this->Caisse_model->recep_Id_caisse($data);
	              		if($cop['id_type']==5){
	              			$data = array( 
								'date_action' => $date_action,
								'model_base' => 3,
								'id_caisse' => $this->input->post('verifcode')+1,
								'id_user' => $id_p,
							);
		              		$this->Caisse_model->Insert31($data);
		              		
	              		}
	              		$this->session->set_flashdata('basicWarning', get_phrase('Successfully removed'));
	      				redirect('caisses/kiosque', 'refresh');
		            }else{
		            	$this->session->set_flashdata('basicWarning', get_phrase('Action deja realiser'));
	              		redirect('caisses/kiosque', 'refresh');
		            }
		        }
		      	if ($this->input->post('envoi')==get_phrase('begin')){
		      		$e = $this->input->post('d_act1');
	    			$a_date1 = explode("-", $e);
	        		$date_realisation1 = mktime(0,0,0,$a_date1[1],$a_date1[2],$a_date1[0]);
			        $e = $this->input->post('d_act2');
			        $a_date1 = explode("-", $e);
			        $date_realisation2 = mktime(23,59,59,$a_date1[1],$a_date1[2],$a_date1[0]);
		        	$da = array( 
		              'date_interval3' => $date_realisation1,
		              'date_interval4' => $date_realisation2
		            );
		            $this->session->set_userdata($da);
	          		redirect('caisses/kiosque', 'refresh');
		            
		        }

		    }

		}
	}

	public function verifidateIntervalCaisseValue(){
		/*echo var_dump($this->input->get());*/
		$e = $this->input->get('datedebut');
        $a_date1 = explode("-", $e);
        
        $date_realisation1 = mktime(0,0,0,$a_date1[1],$a_date1[2],$a_date1[0]);
        $e = $this->input->get('datefin');
        $a_date1 = explode("-", $e);
        
        $date_realisation2 = mktime(23,59,59,$a_date1[1],$a_date1[2],$a_date1[0]);
        if ($date_realisation1>$date_realisation2) {
          echo json_encode(false);
        }
        else{
        	echo json_encode(true);
        }
	}

	public function lavage($es=Null)
	{
		if ($es) {

			$recupet = array('date_interval1','date_interval2');
            $this->session->unset_userdata($recupet);
			redirect('caisses/lavage', 'refresh');
		} else {
			if(!in_array('viewCaisse', $this->permission) || !in_array('deleteCaisse', $this->permission) || !in_array('updateCaisse', $this->permission) ) {
				redirect('dashboard', 'refresh');
			}
		     
		    $this->data['titre'] = 'Caisse';
		    $this->data['lien'] = 'Caisse';
		    $this->data['icon'] = '<i class="fa fa-dollar"> </i>';
		    $this->load->helper('form');
		    if (!$this->input->post()){

				$this->data['aff_service'] = $this->Caisse_model->Aff_caisse();
				$this->data['aff_type1'] = $this->Caisse_model->Aff_type_caisse(1);
				$this->data['aff_type2'] = $this->Caisse_model->Aff_type_caisse(2);
				/*$_SESSION['date']=1;*/
				if (isset($_SESSION['date_interval1'])==true || isset($_SESSION['date_interval2'])==true) {

					$somm=$this->Caisse_model->aff_somme_entrer(1,null,null,$_SESSION['date_interval1'],$_SESSION['date_interval2']);
					$this->data['e_caisse']=$somm['total'];

					$somm=$this->Caisse_model->aff_somme_sortie(2,null,$_SESSION['date_interval1'],$_SESSION['date_interval2']);
					$this->data['s_caisse'] = $somm['total'];

					$tto =$this->data['e_caisse'] - $this->data['s_caisse'];
					
					$this->data['e_caisse'] = $this->sete($this->data['e_caisse']);


					$this->data['s_caisse'] =  $this->sete($this->data['s_caisse']);
					
					$this->data['total_caisse'] =  $this->sete($tto);
					$this->data['total_caisse2'] =  $tto;
					

					$this->render_template('caisse/lavage', $this->data);
				}else{
					$somm=$this->Caisse_model->aff_somme_entrer(1);
					$this->data['e_caisse']=$somm['total'];

					$somm=$this->Caisse_model->aff_somme_sortie(2);
					$this->data['s_caisse'] = $somm['total'];

					$tto =$this->data['e_caisse'] - $this->data['s_caisse'];
					
					$this->data['e_caisse'] = $this->sete($this->data['e_caisse']);


					$this->data['s_caisse'] =  $this->sete($this->data['s_caisse']);
					
					$this->data['total_caisse'] =  $this->sete($tto);
					$this->data['total_caisse2'] =  $tto;
					

					$this->render_template('caisse/lavage', $this->data);
				}
				
		    }else{
				if ($this->codeconfirmation($this->input->post('codeverifinconf'), $this->input->post('verifcationcode'))==false) {
					$this->session->set_flashdata('basicWarning', get_phrase('Error Password'));
					redirect('caisses/lavage', 'refresh');
				}
		        
		        
		        if ($this->input->post('envoi')==get_phrase('enregistrer')){
		          $this->form_validation->set_rules('types','types','trim|required');
		          $this->form_validation->set_rules('nom_type','nom_type','trim|required');
		          $this->form_validation->set_rules('montant','montant','trim|required');
		          $this->form_validation->set_rules('d_act','d_act','trim|required');
		          $this->form_validation->set_rules('h_act','h_act','trim|required');
		          $this->form_validation->set_rules('nom_indivi','nom_indivi','trim|required');
		          if($this->form_validation->run()===TRUE)
		          {
		            $dat = array( 
		              'nom_individu' => $this->input->post('nom_indivi'),
		              'contact' => $this->input->post('tel_indivi')
		            );
		            if ($this->Personne_model->verif_indiv($dat)==true) {
		            }
		            else {
		              $this->Personne_model->create_indiv($dat);
		            }
		            $aff=$this->Personne_model->recep_indiv($dat);
		            $id_idu=$aff['id'];
		            /*ECHO var_dump($id_idu);
		            exit();*/
		            if ($this->input->post('nom_type')==0) {
		              $dat = array( 
		                'type' => $this->input->post('types'),
		                'nom' => $this->input->post('autre_nom_type')
		              );
		              if ($this->Caisse_model->verif_typactcaisse($dat)==true) {}
		              else {
		                $this->Caisse_model->create_typactcaisse($dat);
		              }
		              $aff=$this->Caisse_model->recep_typactcaisse($dat);
		              $id_tac=$aff['id'];
		            } else {
		              $id_tac=$this->input->post('nom_type');
		            }
		            
		            $e = $this->input->post('d_act');
		            $a_date1 = explode("-", $e);
		            $e = $this->input->post('h_act');
		            $a_date2 = explode(":", $e);
		            $date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
		            $date_action=time();
		            if ($date_realisation>$date_action) {
		              $this->session->set_flashdata('basicErreur', get_phrase('Error in  controle the date!!'));
		              redirect('caisses/lavage', 'refresh');
		            }
		            
		            $id_p = $this->session->userdata('id');
		            $codepartiecontrole=md5(uniqid(rand(), true));
		            $data = array( 
		              'vide' => $codepartiecontrole,
		              'raison' => $this->input->post('propos'),
		              'date_enreg' => $date_realisation,
		              'montant' => $this->input->post('montant'),
		              'id_type' => $id_tac,
		              'id_individu' => $id_idu
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
		            if ($id_tac == 2) {
		            	
			            $data = array( 
			              'vide' => $codepartiecontrole,
			              'raison' => 'Transmission recette lavage',
			              'date_enreg' => $date_realisation,
			              'montant' => $this->input->post('montant'),
			              'id_type' => 7,
			              'porte' => 1,
			              'id_individu' => $id_idu
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
		            }
		            $this->session->set_flashdata('basicWarning', get_phrase('Successfully created'));
		            redirect('caisses/lavage', 'refresh');
		          }else{
		            $this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
		            redirect('caisses/lavage', 'refresh');
		          } 
		        }
		        if ($this->input->post('envoi')==get_phrase('Modifier')){
		          $dat = array( 
		            'nom_individu' => $this->input->post('nom_indivi'),
		            'type_indifidu' => $this->input->post('type_indivi')
		          );
		          if ($this->Personne_model->verif_indiv($dat)==true) {}
		          else {
		            $this->Personne_model->create_indiv($dat);
		          }
		          $aff=$this->Personne_model->recep_indiv($dat);
		          $id_idu=$aff['id'];
		          if ($this->input->post('nom_type')==0) {
		            $dat = array( 
		              'type' => $this->input->post('types'),
		              'nom' => $this->input->post('autre_nom_type')
		            );
		            if ($this->Caisse_model->verif_typactcaisse($dat)==true) {}
		            else {
		              $this->Caisse_model->create_typactcaisse($dat);
		            }
		            $aff=$this->Caisse_model->recep_typactcaisse($dat);
		            $id_tac=$aff['id'];
		          } else {
		            $id_tac=$this->input->post('nom_type');
		          }
		          $e = $this->input->post('d_act');
		          $a_date1 = explode("-", $e);
		          $e = $this->input->post('h_act');
		          $a_date2 = explode(":", $e);
		          $date_realisation = mktime($a_date2[0],$a_date2[1],0,$a_date1[1],$a_date1[2],$a_date1[0]);
		          $date_action=time();
		          if ($date_realisation>$date_action) {
		            $this->session->set_flashdata('basicErreur', get_phrase('Refersh the page again!!'));
		            redirect('caisses/lavage', 'refresh');
		          }
		          $id_p = $this->session->userdata('id');
		          $mtoto= $this->input->post('montantancien')-$this->input->post('montant');
		          $data = array( 
		            'raison' => $this->input->post('propos'),
		            'date_enreg' => $date_realisation,
		            'montant' => $this->input->post('montant'),
		            'id_type' => $id_tac,
		            'id_individu' => $id_idu
		          );
		          if ($this->Caisse_model->MajActionCaisse($data,$this->input->post('verifcode'))==true) {
		            $cop=$this->Caisse_model->recep_Id_caisse($data);
		            $data = array( 
		              'model_base' => 2,
		              'id_caisse' => $cop['id'],
		              'id_user' => $id_p,
		              'montant' => $mtoto,
		              'date_action' => $date_action,
		              'date_enreg' => $date_realisation,
		            );
		            $this->Caisse_model->Insert31($data);
		            $this->session->set_flashdata('basicWarning', get_phrase('Successfully update'));
		            redirect('caisses/lavage', 'refresh');
		          }
		        }
		        if ($this->input->post('envoi')==get_phrase('Supprimer')){
		        	$id_p = $this->session->userdata('id');
		          	$date_action=time();
		          	
		            $data = array( 
		              'date_enreg' => $date_action,
		              'supprimer' => 1
		            );
		            
		            if ($this->Caisse_model->MajActionCaisse2($data,$this->input->post('controle_adh'))==true){
		            	$data = array( 
							'date_action' => $date_action,
							'model_base' => 3,
							'id_caisse' => $this->input->post('verifcode'),
							'id_user' => $id_p,
						);
	              		$this->Caisse_model->Insert31($data);

	              		$data = array( 
							'id' => $this->input->post('verifcode'),
							'vide' => $this->input->post('controle_adh')
						);
	              		$cop=$this->Caisse_model->recep_Id_caisse($data);
	              		if($cop['id_type']==2){
	              			$data = array( 
								'date_action' => $date_action,
								'model_base' => 3,
								'id_caisse' => $this->input->post('verifcode')+1,
								'id_user' => $id_p,
							);
		              		$this->Caisse_model->Insert31($data);
		              		
	              		}
		            	$this->session->set_flashdata('basicWarning', get_phrase('Successfully removed'));
	              		redirect('caisses/lavage', 'refresh');
		            }else{
		            	$this->session->set_flashdata('basicWarning', get_phrase('Action deja realiser'));
	              		redirect('caisses/lavage', 'refresh');
		            }
		        }
		      	
		      	if ($this->input->post('envoi')==get_phrase('begin')){
		      		$e = $this->input->post('d_act1');
        			$a_date1 = explode("-", $e);
	        		$date_realisation1 = mktime(0,0,0,$a_date1[1],$a_date1[2],$a_date1[0]);
			        $e = $this->input->post('d_act2');
			        $a_date1 = explode("-", $e);
			        $date_realisation2 = mktime(23,59,59,$a_date1[1],$a_date1[2],$a_date1[0]);
		        	$da = array( 
		              'date_interval1' => $date_realisation1,
		              'date_interval2' => $date_realisation2
		            );
		            $this->session->set_userdata($da);
              		redirect('caisses/lavage', 'refresh');
		            
		        }

		    }
		}   
	}

	public function fetchCaisseData($aa=null)
  	{
      	if(!in_array('viewCaisse', $this->permission) || !in_array('deleteCaisse', $this->permission) || !in_array('updateCaisse', $this->permission) ) {
			redirect('dashboard', 'refresh');
		}
      	$result = array('data' => array());
      	if ($aa) {
      		if ($aa == 1) {
      			if (isset($_SESSION['date_interval1'])==true || isset($_SESSION['date_interval2'])==true) {
      				$aff_service = $this->Caisse_model->Aff_caisse4($aa,$_SESSION['date_interval1'],$_SESSION['date_interval2']);
      			}
      			else{
      				$aff_service = $this->Caisse_model->Aff_caisse4($aa);
      			}
      		}
      		if ($aa == 2) {
      			if (isset($_SESSION['date_interval3'])==true || isset($_SESSION['date_interval4'])==true) {
      				$aff_service = $this->Caisse_model->Aff_caisse4($aa,$_SESSION['date_interval3'],$_SESSION['date_interval4']);
      			}
      			else{
      				$aff_service = $this->Caisse_model->Aff_caisse4($aa);
      			}
      		}
      		if ($aa == 3) {
      			if (isset($_SESSION['date_interval5'])==true || isset($_SESSION['date_interval6'])==true) {
      				$aff_service = $this->Caisse_model->Aff_caisse4($aa,$_SESSION['date_interval5'],$_SESSION['date_interval6']);
      			}
      			else{
      				$aff_service = $this->Caisse_model->Aff_caisse4($aa);
      			}
      		}
      		
      	} else {
      		if (isset($_SESSION['date_interval7'])==true || isset($_SESSION['date_interval8'])==true) {
      			$aff_service = $this->Caisse_model->Aff_caisse2(null,$_SESSION['date_interval7'],$_SESSION['date_interval8']);
      		}
      		else{
      			$aff_service = $this->Caisse_model->Aff_caisse2();
      		}
      		
      	}
      	
      	

      	$n=0;
      	$ke=0;
      	foreach ($aff_service as $key => $value) {
			$ppp=$value['supprimer'];
			
			$dat1 = array( 
			'id' => $value['id_type']
			);
          
          	setlocale(LC_TIME,'Fra,Fra');                                 
			$aff1=$this->Caisse_model->recep_typactcaisse($dat1);
			$aff3=$this->Caisse_model->rep_date_caisse($value['id']);
			if ($ppp==1) {
				
			}else{
				$n++;
				$dat2 = array( 
              		'id' => $value['id_individu']
	            );
                $aff2=$this->Personne_model->recep_indiv($dat2);
                $dose='';
				if ($aff1['type']==1) {
					if (!$aa) {$dose=get_phrase('LAVAGE');}
					$p='<g title="'.$aff1['nom'].'">'.get_phrase('entrer en caisse').'&nbsp;<span style="color:#3c8dbc;float:right;" class="glyphicon glyphicon-log-in"></span><br/><b>'.$dose.'</b></g>';
					$benef='<g title="'.$value['raison'].'">'.get_phrase('remise par').' '.$aff2['nom_individu'].'</g>';
				}
				if ($aff1['type']==2) {
					if (!$aa) {$dose=get_phrase('LAVAGE');}
					$p='<g title="'.$aff1['nom'].'">'.get_phrase('sortie en caisse').'&nbsp;<span style="color:#ff851b;float:right;" class="glyphicon glyphicon-log-out"></span><br/><b>'.$dose.'</b></g>';
					$benef='<g title="'.$value['raison'].'">'.get_phrase('transmise a').' '.$aff2['nom_individu'].'</g>';
				}
				if ($aff1['type']==3) {
					if (!$aa) {$dose=get_phrase('KIOSQUE');}
					$p='<g title="'.$aff1['nom'].'">'.get_phrase('entrer en caisse').'&nbsp;<span style="color:#3c8dbc;float:right;" class="glyphicon glyphicon-log-in"></span><br/><b>'.$dose.'</b></g>';
					$benef='<g title="'.$value['raison'].'">'.get_phrase('remise par').' '.$aff2['nom_individu'].'</g>';
				}
				if ($aff1['type']==4) {
					if (!$aa) {$dose=get_phrase('KIOSQUE');}
					$p='<g title="'.$aff1['nom'].'">'.get_phrase('sortie en caisse').'&nbsp;<span style="color:#ff851b;float:right;" class="glyphicon glyphicon-log-out"></span><br/><b>'.$dose.'</b></g>';
					$benef='<g title="'.$value['raison'].'">'.get_phrase('transmise a').' '.$aff2['nom_individu'].'</g>';
				}
				if ($aff1['type']==5) {
					$pr="";
					if ($value['porte']) {
						if ($value['porte'] == 1) {
							$pr = 'LAVAGE';
						}
						else{
							if ($value['porte'] == 2) {
									$pr = 'KIOSQUE';
							}
							else {
								$pr = 'DE EXTERIEUR';
							}
						}
						
					}
					if (!$aa) {$dose=get_phrase('CAISSE EXTERNE');}
					$p='<g title="'.$aff1['nom'].'">'.get_phrase('entrer en caisse').'&nbsp;<span style="color:#3c8dbc;float:right;" class="glyphicon glyphicon-log-in"></span><br/><b>'.$dose.' '.$pr.'</b></g>';
					$benef='<g title="'.$value['raison'].'">'.get_phrase('remise par').' '.$aff2['nom_individu'].'</g>';
				}
				if ($aff1['type']==6) {
					$pr="";
					if ($aff1['liaison']) {
						if ($aff1['liaison'] == 2) {
							$pr = 'KIOSQUE';
						}
						if ($aff1['liaison'] == 1) {
							$pr = 'LAVAGE';
						}
						if ($aff1['liaison'] == 3) {
							$pr = 'AUTRE';
						}
					}
					if (!$aa) {$dose=get_phrase('CAISSE EXTERNE');}
					$p='<g title="'.$aff1['nom'].'">'.get_phrase('sortie en caisse').'&nbsp;<span style="color:#ff851b;float:right;" class="glyphicon glyphicon-log-out"></span><br/><b>'.$dose.' '.$pr.'</b></g>';
					$benef='<g title="'.$value['raison'].'">'.get_phrase('transmise a').' '.$aff2['nom_individu'].'</g>';
				}
				
            	
                	
                
            	
                
                $date_enreg=$value['date_enreg'];
                $montant=$this->sete($value['montant']);
            	
            	$buttons='';
	          	if ($aa) {
		          	if(in_array('deleteCaisse', $this->permission) || in_array('updateCaisse', $this->permission)) {
			          	if ($ppp==1) {
			           		$buttons='Supprimer&nbsp;<span style="color:red;float:right;" class="fa fa-remove"></span>';
			          	} else {
			          		if ($aa == 3) {

			          			
			          			if ($aff1['liaison'] == 0) {
			          				# code...
			          			} else {
			          				if(in_array('updateCaisse', $this->permission)) {
				              			$buttons .= '<button type="button" class="btn bg-teal color-palette" data-toggle="modal" data-target="#modal-modif" title="modification" onclick="modif_mouv('.$value['id'].',\''.$value['vide'].'\')" ><i class="fa fa-pencil-square-o"></i></button>&nbsp;';
				              		}
				              		if(in_array('deleteCaisse', $this->permission)) {
				              			$buttons .= '<button type="button" class="btn bg-red-active color-palette" data-toggle="modal" data-target="#modal-supp" title="suppresion"  onclick="modif_supp('.$value['id'].',\''.$value['vide'].'\')" ><i class="fa fa-trash-o"></i></button>';
				              		}
			          			}
			          			
			          		} else {
			          			// button
			            		if(in_array('updateCaisse', $this->permission)) {
			              			$buttons .= '<button type="button" class="btn bg-teal color-palette" data-toggle="modal" data-target="#modal-modif" title="modification" onclick="modif_mouv('.$value['id'].',\''.$value['vide'].'\')" ><i class="fa fa-pencil-square-o"></i></button>&nbsp;';
			              		}
			              		if(in_array('deleteCaisse', $this->permission)) {
			              			$buttons .= '<button type="button" class="btn bg-red-active color-palette" data-toggle="modal" data-target="#modal-supp" title="suppresion"  onclick="modif_supp('.$value['id'].',\''.$value['vide'].'\')" ><i class="fa fa-trash-o"></i></button>';
			              		}
			          		}
			          	}
		          	}
	          	}
	            
	            $result['data'][$ke] = array(
					$n,
					$p,
					$benef,
					$montant,
					date('Y-m-d à H:i',$date_enreg),
					$buttons
				);
				$ke=$ke+1;
      		}
          	
          	
          
          	
    	} // /foreach
    
    	echo json_encode($result);
  	}
	public function fetchCaisseValueById(){
		if( !in_array('updateCaisse', $this->permission) ) {
			redirect('dashboard', 'refresh');
		}
		$id = $this->input->get('id');
		$code = $this->input->get('code');
		$patre = $this->input->get('forma');
		if ($patre == 1) {
			$reponse="";

			//recuperation des information sur la ligne de la caisse à modifier
			$ddA = array('id' => (int)$id );
		  	$info1 = $this->Caisse_model->recep_Id_caisse($ddA);

		  	//recuperation des information sur la ligne du type demander
			$ddB = array('id' => $info1['id_type'] );
			$info2 = $this->Caisse_model->recep_typactcaisse($ddB);

			//controle d'access du type selectionner
			$type_mode=$info2['type'];
		  	if ($type_mode == 1 || $type_mode == 2) {
		  		//recuperration du reste en caisse au lavage
		  		$somm=$this->Caisse_model->aff_somme_entrer(1);
				$v = $somm['total'];
				;
				$somm=$this->Caisse_model->aff_somme_sortie(2);
				$total_caisse2 =  $v-$somm['total'];
		  		
		  	}
		  	if ($type_mode == 3 || $type_mode == 4) {
		  		//recuperation du reste en caisse au kiosque
		  		$type_mode=$type_mode-2;
		  		$somm=$this->Caisse_model->aff_somme_entrer(3);
				$v = $somm['total'];
				;
				$somm=$this->Caisse_model->aff_somme_sortie(4);
				$total_caisse2 =  $v-$somm['total'];

		  	}
		  	if ($type_mode == 5 || $type_mode == 6) {
		  		//recuperation du reste en caisse du gestionnaire
		  		$type_mode=$type_mode-4;
		  		$somm=$this->Caisse_model->aff_somme_entrer(5);
				$v = $somm['total'];
				;
				$somm=$this->Caisse_model->aff_somme_sortie(6);
				$total_caisse2 =  $v-$somm['total'];
		  	}
		  	//id du type selectionner
		  	$id_mode=$info2['id'];

		  	$reponse.='<div class="form-group">
				<select type="text" class="form-control" name="types" required disabled>
					<option  value="">'.get_phrase('Type d action').'</option>
					<option ';
					if ($type_mode==1) {
						$reponse.="selected='' ";
					} 
					$reponse.='value="1">'.get_phrase('Entrer en caisse').'</option>
					<option ';
					if ($type_mode==2) {
						$reponse.="selected='' ";
					} 
					$reponse.='value="2">'.get_phrase('Sortie de caisse').'</option>
		        </select>
		    </div>';
		    $reponse.="";
		  	$aff_table_type = $this->Caisse_model->recep_typactcaisse2();
		  	$select1="<select onclick='autrename2()' class='form-control col-md-6' name='nom_type' id='nom_tye2' required >";
		  		$select1.="<option  >".get_phrase('Acte realise')."</option>";
				if($aff_table_type){
					foreach($aff_table_type as $optionvalue){
			    		$vue=$optionvalue->type;
			    		if ($info2['type']==$vue) {
							$select1.="<option";
							$vue2=$optionvalue->id;
							if ($id_mode==$vue2) {
			        			$select1.=" selected=''";
			      			}
			      			$select1.="  value='";
			      			$select1.=$optionvalue->id;
			      			$select1.="'>";
			      			$select1.=$optionvalue->nom;
			      			$select1.="</option>";
			    		}
					}
				}
			if ($info2['type'] == 1 || $info2['type'] == 2) {
		  		$select1.="</select>";
			  	
			  	$reponse.="";
			  
			  	$reponse.='<div class="form-group col-md-12"">'.$select1.'</div>';
		  		
		  	}
		  	if ($info2['type'] == 3 || $info2['type'] == 4) {
		  		$select1.="<option value='0'>".get_phrase('autre')."</option></select>";
			  	$valeurautre1="<input type='text' class='form-control' name='autre_nom_type' id='autre_valeur2' disabled >";
			  	$reponse.="";
			  
			  	$reponse.='<div class="form-group col-md-6"">'.$select1.'</div>';
			  	$reponse.='<div class="form-group col-md-6">'.$valeurautre1.'</div>';

		  	}
		  	if ($info2['type'] == 5 || $info2['type'] == 6) {
		  		$select1.="<option value='0'>".get_phrase('autre')."</option></select>";
			  	$valeurautre1="<input type='text' class='form-control' name='autre_nom_type' id='autre_valeur2' disabled >";
			  	$reponse.="";
			  
			  	$reponse.='<div class="form-group col-md-6"">'.$select1.'</div>';
			  	$reponse.='<div class="form-group col-md-6">'.$valeurautre1.'</div>';
		  	}

		  	$reponse.='</div>
		    <label for="">'.get_phrase('Montant').'</label>
		    <div class="input-group" id="verifmontant">';
				$reponse.='<input type="number" min="0"';
				$reponse.=$total_caisse2;
				$reponse.=' class="form-control" name="montant" id="montant" value="'.$info1['montant'].'"';
				if ($type_mode==1) {
				 	$reponse.='';
				 }
				if ($type_mode==2) {
					$valeurmax=$total_caisse2+$info1['montant'];
				 	$reponse.='max="'.$valeurmax.'"';
				 }
				$reponse.='required>
	                <span class="input-group-addon">'.$this->company_currency().'</span>
	        </div> ';

	        $Y=strftime('%Y',$info1['date_enreg']);
			$M=strftime('%m',$info1['date_enreg']);
		  	$J=strftime('%d',$info1['date_enreg']);
			$H=strftime('%H',$info1['date_enreg']);
		  	$min=strftime('%M',$info1['date_enreg']);
		  	$reponse.='<div class="form-group">
				<label for="">'.get_phrase('Effectue le').'</label>
		    </div>
		    <div class="form-group col-md-6">
				<input type="date" class="form-control" name="d_act" required max="'.date('Y').'-'.date('m').'-'.date('d').'" value="'.$Y.'-'.$M.'-'.$J.'">
		    </div>
		    <div class="form-group col-md-1">
		      	'.get_phrase('to').'
		    </div>
		    <div class="form-group col-md-5">
				<input type="time" class="form-control" name="h_act"  required value="';
				if($H>=10){            
				$reponse.=$H.':'.$min;
				}else{
				$reponse.=$H.':'.$min;
				}$reponse.='">
			</div>';
			$ddC = array('id' => $info1['id_individu'] );
			$info3 = $this->Personne_model->recep_indiv($ddC);
			if ($type_mode==1) {
			$modeforme="<label for='libelle1'>".get_phrase('Remise par')."</label>";
			}
			if ($type_mode==2) {
			  $modeforme="<label for='libelle2'>".get_phrase('Transmise a')."</label>";
			}
			$content_tran= $modeforme."<input type='text' class='form-control' name='nom_indivi' placeholder='".get_phrase('Nom et prenom de la personne ou de l entreprise')."' value='".$info3['nom_individu']."' required>";
			$content_tran1="<label for='tel_indivi'>Tel/Cel(".get_phrase('facultatif').")</label><input type='text' class='form-control' name='tel_indivi' value='".$info3['contact']."'>";
			$type_personn="<input type='text' class='form-control' name='type_indivi' placeholder='".get_phrase('type de personne ou d entreprise')."' value='".$info3['type_indifidu']."'>";
			$reponse.='<div class="form-group col-md-12">'.$content_tran.'</div>';
			$reponse.='<div class="form-group col-md-12">'.$content_tran1.'</div>';





			$reponse.='<div class="form-group">
		        <textarea class="form-control" name="propos" placeholder="'.get_phrase('Remarque sur l action').'">'.$info1['raison'].'</textarea>
		    </div>';
		  	$reponse.='<div class="form-group col-md-12">
				<input type="password" class="form-control" name="verifcationcode" title="'.get_phrase('pour la verification de votre identite').'" placeholder="'.get_phrase('Entrer le code de validation').'" required >
            </div>
            <input type="hidden" name="codeverifinconf" value="Caisse">
            <input type="hidden" name="types" value="'.$info2['type'].'">
            <input type="hidden" name="montantancien" value="'.$info1['montant'].'">
            <input type="hidden" name="verifcode" value="'.$id.'" >';
			echo json_encode($reponse);
		}
		if ($patre == 2) {
			$reponse="";

			//recuperation des information sur la ligne de la caisse à modifier
			$ddA = array('id' => (int)$id );
		  	$info1 = $this->Caisse_model->recep_Id_caisse($ddA);
		  	
		  	//recuperation des information sur la ligne du type demander
			$ddB = array('id' => $info1['id_type'] );
			$info2 = $this->Caisse_model->recep_typactcaisse($ddB);
			$porte = $info2['liaison'];
			//controle d'access du type selectionner
			$type_mode=$info2['type'];
			if ($type_mode == 5 || $type_mode == 6) {
		  		//recuperation du reste en caisse du gestionnaire
		  		$type_mode=$type_mode-4;
		  		$somm=$this->Caisse_model->aff_somme_entrer(5);
				$v = $somm['total'];
				;
				$somm=$this->Caisse_model->aff_somme_sortie(6);
				$total_caisse2 =  $v-$somm['total'];
		  	}
		  	//id du type selectionner
		  	$id_mode=$info2['id'];
		  	$reponse.='<div class="form-group">
				<select type="text" class="form-control" name="types" required disabled>
					<option  value="">'.get_phrase('Type d action').'</option>
					<option ';
					if ($type_mode==1) {
						$reponse.="selected='' ";
					} 
					$reponse.='value="1">'.get_phrase('Entrer en caisse').'</option>
					<option ';
					if ($type_mode==2) {
						$reponse.="selected='' ";
					} 
					$reponse.='value="2">'.get_phrase('Sortie de caisse').'</option>
		        </select>
		    </div>';
		    if ($type_mode ==1) {}
		    if ($type_mode ==2) {
		    	$reponse.= '<div class="form-group col-md-12" ><select type="text" onclick="suite_type2()" class="form-control" name="lier" id="lierupdate" required ><option  value="">'.get_phrase('action pour').'</option>';
		    	$reponse.= '<option  value="2" ';
		    	if ($porte== 1) {
					$reponse.="selected='' ";
				} 
		    	$reponse.= '>'.get_phrase('pour kiosque').'</option><option  value="1" ';
		    	if ($porte == 2) {
					$reponse.="selected='' ";
				} 
		    	$reponse.= '>'.get_phrase('pour lavage').'</option><option  value="3" ';
		    	if ($porte == 3) {
					$reponse.="selected='' ";
				} 
		    	$reponse.= '>'.get_phrase('pour autre').'</option></select></div>';
		    }
		    $reponse.="";
		  	$aff_table_type = $this->Caisse_model->recep_typactcaisse2();
		  	$select1="<select onclick='autrename3()' class='form-control col-md-6' name='nom_type' id='nom_tye_update' required ><option  >".get_phrase('Acte realise')."</option>";
		  	if($aff_table_type){
				foreach($aff_table_type as $optionvalue){
		    		$vue=$optionvalue->type;
		    		$vuee=$optionvalue->liaison;
		    		if ($info2['liaison']==$vuee && $info2['type']==$vue) {
						$select1.="<option";
						$vue2=$optionvalue->id;
						if ($id_mode==$vue2) {
		        			$select1.=" selected=''";
		      			}
		      			$select1.="  value='";
		      			$select1.=$optionvalue->id;
		      			$select1.="'>";
		      			$select1.=$optionvalue->nom;
		      			$select1.="</option>";
		    		}
				}
			}
		  	$select1.="<option value='0'>".get_phrase('Autre')."</option></select>";
		  	$valeurautre1="<input type='text' class='form-control' name='autre_nom_type' id='autre_valeur2_update' disabled >";
			$reponse.="";
		    $reponse.='<div class="form-group col-md-6" id="personne_update">'.$select1.'</div>';
			$reponse.='<div class="form-group col-md-6" id="name_new_type_update">'.$valeurautre1.'</div>';
			$reponse.='</div>
		    <label for="">'.get_phrase('Montant').'</label>
		    <div class="input-group" id="verifmontant">';
				$reponse.='<input type="number" min="0"';
				$reponse.=$total_caisse2;
				$reponse.=' class="form-control" name="montant" id="montant" value="'.$info1['montant'].'"';
				if ($type_mode==1) {
				 	$reponse.='';
				 }
				if ($type_mode==2) {
					$valeurmax=$total_caisse2+$info1['montant'];
				 	$reponse.='max="'.$valeurmax.'"';
				 }
				$reponse.='required>
	                <span class="input-group-addon">'.$this->company_currency().'</span>
	        </div> ';
	        $Y=strftime('%Y',$info1['date_enreg']);
			$M=strftime('%m',$info1['date_enreg']);
		  	$J=strftime('%d',$info1['date_enreg']);
			$H=strftime('%H',$info1['date_enreg']);
		  	$min=strftime('%M',$info1['date_enreg']);
		  	$reponse.='<div class="form-group">
				<label for="">'.get_phrase('Effectue le').'</label>
		    </div>
		    <div class="form-group col-md-6">
				<input type="date" class="form-control" name="d_act" required max="'.date('Y').'-'.date('m').'-'.date('d').'" value="'.$Y.'-'.$M.'-'.$J.'">
		    </div>
		    <div class="form-group col-md-1">
		      	'.get_phrase('to').'
		    </div>
		    <div class="form-group col-md-5">
				<input type="time" class="form-control" name="h_act"  required value="';
				if($H>=10){            
				$reponse.=$H.':'.$min;
				}else{
				$reponse.=$H.':'.$min;
				}$reponse.='">
			</div>';
			$ddC = array('id' => $info1['id_individu'] );
			$info3 = $this->Personne_model->recep_indiv($ddC);
			if ($type_mode==1) {
			$modeforme="<label for='libelle1'>".get_phrase('Remise par')."</label>";
			}
			if ($type_mode==2) {
			  $modeforme="<label for='libelle2'>".get_phrase('Transmise a')."</label>";
			}
			$content_tran= $modeforme."<input type='text' class='form-control' name='nom_indivi' placeholder='".get_phrase('Nom et prenom de la personne ou de l entreprise')."' value='".$info3['nom_individu']."' required>";
			$content_tran1="<label for='tel_indivi'>Tel/Cel(".get_phrase('facultatif').")</label><input type='text' class='form-control' name='tel_indivi' value='".$info3['contact']."'>";
			$type_personn="<input type='text' class='form-control' name='type_indivi' placeholder='".get_phrase('type de personne ou d entreprise')."' value='".$info3['type_indifidu']."'>";
			$reponse.='<div class="form-group col-md-12">'.$content_tran.'</div>';
			$reponse.='<div class="form-group col-md-12">'.$content_tran1.'</div>';
			$reponse.='<div class="form-group">
		        <textarea class="form-control" name="propos" placeholder="'.get_phrase('Remarque sur l action').'">'.$info1['raison'].'</textarea>
		    </div>';
		  	$reponse.='<div class="form-group col-md-12">
				<input type="password" class="form-control" name="verifcationcode" title="'.get_phrase('pour la verification de votre identite').'" placeholder="'.get_phrase('Entrer le code de validation').'" required >
            </div>
            <input type="hidden" name="codeverifinconf" value="Caisse">
            <input type="hidden" name="types" value="'.$info2['type'].'">
            <input type="hidden" name="montantancien" value="'.$info1['montant'].'">
            <input type="hidden" name="verifcode" value="'.$id.'" >';






		  	echo json_encode($reponse);
		}
		else{
			$reponse='<div class="form-group">'.get_phrase('valeur inconnu').'</div>';
			echo json_encode($reponse);
		}
	}
}