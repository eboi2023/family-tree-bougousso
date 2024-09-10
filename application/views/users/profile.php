<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo get_phrase($titre); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('');?>"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
            <li><a href="<?php echo site_url();?>/Dashboard"><i class="fa fa-home"></i>&nbsp;<?php echo get_phrase('Dashboard'); ?></a></li>
            <li class="active"><?= $icon; ?>&nbsp;<?php echo get_phrase($lien); ?> </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary" id="element_overlap">
                    <div class="box-body box-profile">
                        <?php 
                          if ($this->session->userdata('photo') =='') { 
                            if ($this->session->userdata('sexe') ==1) {
                              $imageuser = site_url('uploads/membres/avatar1.png');
                            }
                            if ($this->session->userdata('sexe') ==2 || $this->session->userdata('sexe') ==3){
                              $imageuser = site_url('uploads/membres/avatar2.png');
                            }
                            if ($this->session->userdata('sexe') =='') {
                              $imageuser = site_url('uploads/membres/user2-160x1601.jpg');
                            }
                          } else { 
                            $imageuser = site_url("uploads/membres").'/'.$this->session->userdata('photo');
                          }
                        ?>

                        <img class="profile-user-img img-responsive img-circle profileImgUrl" src="<?=$imageuser;?>">
                        <h3 class="profile-username text-center NameEdt">
                            <?=$info_personel['pseudo'];?>
                        </h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nom:</b> 
                                <a class="pull-right" <?php if($info_personel['civilite'] == 2 || $info_personel['civilite'] == 3) {echo'style="color: #f312e2!important;"';}?>><?=$info_personel['nom']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Pr&agrave;nom:</b>
                              <a class="pull-right" <?php if($info_personel['civilite'] == 2 || $info_personel['civilite'] == 3) {echo'style="color: #f312e2!important;"';}?>><?=$info_personel['prenom']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>N° Membre:</b> 
                              <a class="pull-right" <?php if($info_personel['civilite'] == 2 || $info_personel['civilite'] == 3) {echo'style="color: #f312e2!important;"';}?>><?php if (strlen($info_personel['code_m'])==1) {
                                                     $code='M000'.$info_personel['code_m'].'B' ;
                                                    }
                                                    if (strlen($info_personel['code_m'])==2) {
                                                     $code='M00'.$info_personel['code_m'].'B' ;
                                                    }
                                                    if (strlen($info_personel['code_m'])==3) {
                                                      $code='M0'.$info_personel['code_m'].'B';
                                                    }
                                                    if (strlen($info_personel['code_m'])==4) {
                                                      $code='M'.$info_personel['code_m'].'B';
                                                    } echo $code;?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Poste:</b> 
                              <a class="pull-right" <?php if($info_personel['civilite'] == 2 || $info_personel['civilite'] == 3) {echo'style="color: #f312e2!important;"';}?>><?=$user_group['group_name']?></a>
                            </li>
                            <li class="list-group-item">
                              <b>Membre depuis:</b> 
                              <a class="pull-right" <?php if($info_personel['civilite'] == 2 || $info_personel['civilite'] == 3) {echo'style="color: #f312e2!important;"';}?>>Le
                              <?php echo date('d/m/Y',$info_personel['created_on']);?></a>
                            </li>
                        </ul>
                        
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom" id="element_overlap1">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#activity" data-toggle="tab"><?php echo get_phrase('General Informations'); ?></a>
                        </li>
                        <li >
                            <a href="#contact" data-toggle="tab"><?php echo get_phrase('Contacts Informations'); ?></a>
                        </li>
                        <li >
                            <a href="#adresse" data-toggle="tab"><?php echo get_phrase('Complete Address'); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                           
                            <?php
                               if($this->session->flashdata('message') != null){
                                   echo '<div class="alert alert-success" role="alert">' .$this->session->flashdata('message').'</div>';
                               }
                                
                            ?>
                           
                            <form class="form-horizontal UpdateDetails">
                                
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"><?php echo get_phrase('Full name'); ?>:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nom" value="<?=$info_personel['nom']?>" placeholder="<?php echo get_phrase('name'); ?>" readonly>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="prenoms" value="<?=$info_personel['prenom']?>" placeholder="<?php echo get_phrase('first name'); ?>" readonly>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"><?php echo get_phrase('Date birth'); ?>:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="date_naissance" value="<?php $a_date = explode("-", $info_personel['date_naiss']);
                                        echo $a_date[2]."/".$a_date[1]."/".$a_date[0]; ?>" placeholder="<?php echo get_phrase('Date birth'); ?> (exple: 11/07/1972)" readonly>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="lieu_naissance" value="<?=$info_personel['lieu_naiss'] ?>" placeholder="<?php echo get_phrase('Place of birth'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputNation" class="col-sm-3 control-label"><?php echo get_phrase('Nationality'); ?>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="natio" value="<?=$info_nationalite['type_nationalite']?>" placeholder="<?php echo get_phrase('Nationality'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-12 text-center">* <?php echo get_phrase('For the dead decsased'); ?></label>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="pere" class="col-sm-3 control-label"><?php echo get_phrase('Father'); ?></label>
                                    <div class="col-sm-9">
                                        <input type="text" style="<?php if($info_parentp['existe_personne']==2){echo 'color:red';} ?>" class="form-control" name="pere" value="<?=$info_parentp['nom']?> <?=$info_parentp['prenom']?><?php if($info_parentp['existe_personne']==2){echo "*";} ?>"
                                         readonly>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="mere" class="col-sm-3 control-label"><?php echo get_phrase('Mother'); ?></label>
                                    <div class="col-sm-9">
                                        <input type="text" style="<?php if($info_parentm['existe_personne']==2){echo 'color:red';} ?>" class="form-control" name="mere" value="<?=$info_parentm['nom']?> <?=$info_parentm['prenom']?><?php if($info_parentm['existe_personne']==2){echo "*";} ?>" readonly>
                                    </div>

                                </div>
                               
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label"><?php echo get_phrase('A propos de moi'); ?></label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="propos" placeholder="<?php echo get_phrase('A propos de moi'); ?>" readonly><?=$info_personel['description']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <a class="btn btn-primary" href="<?=base_url('users/modifier_profil/1');?>"><?php echo get_phrase('Edit my profile'); ?></a>
                                    </div>
                                </div>
                                
                            </form>
                            
                        </div>
                        <div class="tab-pane" id="contact">
                           <form class="form-horizontal UpdateDetails">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"><?php echo get_phrase('Mother'); ?><?php echo get_phrase('Telephone'); ?>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Numéro de téléphone" value="<?=$info_contact['tel']?>" placeholder="<?php echo get_phrase('Numero telephone'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"><?php echo get_phrase('Mother'); ?><?php echo get_phrase('Celulaire'); ?>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Numéro de téléphone" value="<?=$info_contact['cel']?>" placeholder="<?php echo get_phrase('Numero Celulaire'); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"><?php echo get_phrase('Email'); ?></label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" value="<?=$info_contact['email']?>" placeholder="<?php echo get_phrase('Email'); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"><?php echo get_phrase('Adresse postal'); ?>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="adressepost" value="<?=$info_contact['adresse_postal']?>" placeholder="<?php echo get_phrase('adresse postale'); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"><?php echo get_phrase('Numero faxe'); ?>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Numéro de téléphone" value="<?=$info_contact['faxe']?>" placeholder="<?php echo get_phrase('Numero faxe'); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"><?php echo get_phrase('Lien Facebook'); ?>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Numéro de téléphone" value="<?=$info_contact['lien_facebook']?>" placeholder="<?php echo get_phrase('lien de connexion facebook'); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"><?php echo get_phrase('Lien whatsApp'); ?>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="Numéro de téléphone" value="<?=$info_contact['numero_whatsapp']?>" placeholder="<?php echo get_phrase('lien de transmision'); ?>" readonly>
                                    </div>
                                </div>
                                

                                
                                
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <a class="btn btn-primary" href="<?=base_url('users/modifier_profil/2');?>"><?php echo get_phrase('Edit my profile'); ?></a>
                                    </div>
                                </div>
                                
                            </form>
                            
                        </div>
                        <div class="tab-pane" id="adresse">
                           <form class="form-horizontal UpdateDetails">
                                <div class="form-group">
                                    <label for="" class="col-sm-6 control-label"><?php echo get_phrase('Pays'); ?>:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pays" value="<?=$info_pays['nom_fr']?>" placeholder="<?php echo get_phrase('pays'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-6 control-label"><?php echo get_phrase('Ville'); ?>:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="ville" value="<?=$info_ville['nom_fr']?>" placeholder="<?php echo get_phrase('ville'); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-6 control-label"><?php echo get_phrase('Commune'); ?>/<?php echo get_phrase('Prefecture'); ?>/<?php echo get_phrase('Sous-prefecture'); ?>:</label>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control" name="commune" value="<?=$info_commune['nom_fr']?>" placeholder="<?php echo get_phrase('commune'); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-6 control-label"><?php echo get_phrase('Rue'); ?>:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="rue" value="<?=$info_qr['nom_rue']?>" placeholder="<?php echo get_phrase('Rue'); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-6 control-label"><?php echo get_phrase('Quartier'); ?>:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="quartier" value="<?=$info_qr['nom_quartier']?>" placeholder="<?php echo get_phrase('Quartier'); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-6 control-label"><?php echo get_phrase('Residence'); ?>:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="residence" value="<?=$info_qr['type_residence']?>" placeholder="<?php echo get_phrase('Type of residence'); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-6 control-label"><?php echo get_phrase('Level'); ?>:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="position" value="<?=$info_qr['niveau_residence']?>" placeholder="<?php echo get_phrase('Position in the residence'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <a class="btn btn-primary" href="<?=base_url('users/modifier_profil/3');?>"><?php echo get_phrase('Edit my profile'); ?></a>
                                    </div>
                                </div>
                                
                            </form>
                            
                        </div>

                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->


</div>



<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <form class="UploadForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="document_name">Change Profile Photo</h4>
                </div>
                <div class="modal-body">
                    <input type="file" required id="userImage">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info Upload">Upload</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
      $("#profilNav").addClass('active');
    }); 
</script>