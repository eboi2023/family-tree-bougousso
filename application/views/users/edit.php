    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo get_phrase($actions2); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('');?>"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
            <li><a href="<?php echo site_url();?>/Dashboard"><i class="fa fa-home"></i>&nbsp;<?php echo get_phrase('Dashboard'); ?></a></li>
            <li><a href="<?php echo site_url('users/profile/');?>"><?= $icon; ?>&nbsp; <?php echo get_phrase('Profil'); ?></a></li>
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


                        <img class="profile-user-img img-responsive img-circle profileImgUrl" src="<?php 
                                if ($info_personel['lien_photo'] =='') {
                                    if ($info_personel['civilite'] =='1') {
                                        echo site_url('./uploads/membres/avatar1.png');
                                    }
                                    if ($info_personel['civilite'] =='2' || $info_personel['civilite'] =='3') {
                                        echo site_url('./uploads/membres/avatar2.png');
                                    }
                                    if ($info_personel['civilite'] =='') {
                                        echo site_url('./uploads/membres/user2-160x1601.jpg');
                                    }
                            
                                } else {
                                    echo site_url('./uploads/membres/'.$info_personel['lien_photo'].'');
                                }
                        
                            ?>" alt="<?=$info_personel['nom'];?>"><br/>
                        <?php echo form_open_multipart('users/modifier_profil/4',array('class' => 'form-horizontal UpdateDetails'));?>
                            <input type="hidden" name="id_user" value="<?=$info_user['id']?>" >
                            <input type="hidden" name="id_personne" value="<?=$info_personel['id'];?>">
                            <input type="hidden" name="userfile" value="<?=$info_personel['lien_photo'];?>">

                            <style type="text/css">
                                .error {
                                    color: #CF0000;
                                    display: none;
                                }
                                .invisible {
                                    display:none;
                                    visibility:visible;
                                }
                            </style>
                            <p class="text-muted text-mutedcenter" style="text-align: center;" ><input name="getimage" id="getimage" type="file"  onfocus="check();" class="col-sm-8" /><label  onclick="check();" >Votre nouvelle image </label><br/>
                    
                            <p> </p>
                            <div class="error left-align" id="err-imgsize">
                                Les dimensions de image sont trop grandes<p> </p>
                            </div>
                            <div id="imgstore"></div>
                    
                            <script>
                                var input = document.getElementById("getimage");

                                function verifTaille(){
                                    file =input.files[0];
                                    window.URL = window.URL || window.webkitURL;
                                    img = new Image();
                                    
                                    img.onload = function(){
                                        if(img.width > 1024 || img.height > 800){
                                            pasGlop(img.width-1024, img.height-800);
                                        }else{
                                            glop(img.width, img.height);
                                        }
                                    }
                                    img.src = window.URL.createObjectURL(file);
                                }
                                        
                                function glop(width, height){
                                    var store = document.getElementById('imgstore');
                                 store.innerHTML='<img src="' + img.src +'" width="100%">';
                                }

                                function pasGlop(width, height){
                                   

                                    // pour une alerte
                                    var str = "votre image est trop "

                                    if(width>0 && height>0){str+="haute de "+height+"px et large de "+width+"px";}
                                    else{
                                        if(width>0){str+="large de "+width+"px";}
                                     
                                        if(height>0){str+="haute de "+height+"px.";}
                                    }
                                    
                                    alert(str);
                                 
                                    var store = document.getElementById('imgstore');
                                    store.innerHTML='';
                                 
                                    document.getElementsByName("getimage")[0].value = ""; //efface le input

                                 
                                    //pour une animation, avec le css et la balise class=error
                                    $('#err-imgsize').show(500);
                                    $('#err-imgsize').delay(4000);
                                    $('#err-imgsize').animate({
                                        height: 'toggle'
                                    }, 500, function () {
                                        // Animation complete.
                                    });
                                    error = true; // change the error state to true
                                        
                                }

                                input.onchange=verifTaille; 
                            </script>
                            <input type="hidden" name="type_modif" value="4">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                   <input type="submit" name="modifier-profil" value="mofifier" class="btn btn-primary">
                                </div>
                            </div>
                        <?php echo form_close(); ?>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom" id="element_overlap1">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab"><?php if($modification_donnees==1) { echo'Informations générales';} if($modification_donnees==2) { echo'Informations sur contact';} if($modification_donnees==3) { echo'votre Adresse complet';} ?></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                           
                           <?php
                               if($this->session->flashdata('message_erreur') !== null){
                                   echo '<div class="alert alert-danger" role="alert">Erreur: ' .$this->session->flashdata('message_erreur').'</div>';
                               }
                                 
                               elseif(validation_errors() !== ''){
                                   echo '<div class="alert alert-danger" role="alert">Erreur: ' .validation_errors().'</div>';
                               }
                            if ($modification_donnees==1) {
                                
                                echo form_open('users/modifier_profil/1',array('class' => 'form-horizontal UpdateDetails'));?>
                                   
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Surnom:</label>
                                        <div class="form-group col-md-2">
                                            <select name="civilite" class="form-control" id="civilite" placeholder="civilité" required >
                                              <option <?php if ($info_personel['civilite']==1) {echo'selected';}?> value="1">M</option>
                                              <option <?php if ($info_personel['civilite']==2) {echo'selected';}?> value="2">Mme</option>
                                              <option <?php if ($info_personel['civilite']==3) {echo'selected';}?> value="3">Mlle</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" value="<?=$info_personel['pseudo']?>" name="surnom">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Nom et Prénom:</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="nom" value="<?=$info_personel['nom']?>" placeholder="nom" style="font-variant: all-small-caps;">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="prenom" value="<?=$info_personel['prenom']?>" placeholder="Prénom" style="font-variant: all-small-caps;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Date et lieu de naissance:</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="date_naiss" value="<?=$info_personel['date_naiss']?>" placeholder="Date de naissance (exple: 11/07/1972)">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="lieu_naiss" value="<?=$info_personel['lieu_naiss']?>" placeholder="Lieu de naissance" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Nationalité:</label>
                                        <div class="col-sm-9">
                                            
                                            <datalist id="nationalite">
                                              <?php 
                                                  if($aff_nationalite){
                                                      foreach($aff_nationalite as $selectvalue){
                                                        ?>
                                                        <option ><?=  $nom_nt = $selectvalue->type_nationalite;?></option>
                                                

                                                <?php }} ?>
                                            </datalist>
                                            <input type="text"  list="nationalite" name="national" class="form-control" id="national" placeholder="Nationalité" value="<?=$info_nationalite['type_nationalite']?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Poste</label>
                                        <div class="col-sm-9">
                                            <?php 
                                                $poste_occupe='Adhérent';
                                                if ($user_group['group_name']=='Adhérent') {
                                                   $poste_occupe=$poste_occupe.'';
                                                } else {
                                                   $poste_occupe=$poste_occupe.' / '.$user_group['group_name'];
                                                }
                                                
                                            ?>
                                            <input type="text" class="form-control" value="<?=$poste_occupe;?>" disabled />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomp" class="col-sm-12 text-center">Information sur le Père</label><input type="hidden" name="id_p" value="<?=$info_parentp['id']?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <select name="santepere" class="form-control" id="santepere" readonly>
                                              <option <?php if($info_parentp['existe_personne']==1){echo "selected";} ?> value="1">Vie</option>
                                              <option <?php if($info_parentp['existe_personne']==2){echo "selected";} ?> value="2">Décédé</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="nomp" value="<?=$info_parentp['nom']?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="prenomp" value="<?=$info_parentp['prenom']?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="numbrep" value="<?php if(substr($info_parentp['num_membre'], 0, 4)=='sans'){echo'inconnu';}else{ if (strlen($info_parentp['code_m'])==1) {$code='M000'.$info_parentp['code_m'].'B' ;}if (strlen($info_parentp['code_m'])==2) {$code='M00'.$info_parentp['code_m'].'B' ;}if (strlen($info_parentp['code_m'])==3) {$code='M0'.$info_parentp['code_m'].'B';}if (strlen($info_parentp['code_m'])==4) {$code='M'.$info_parentp['code_m'].'B';}echo $code;} ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomp" class="col-sm-12 text-center">Information sur le mère</label>
                                        <input type="hidden" class="form-control" name="id_m" value="<?=$info_parentm['id']?> ">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2">
                                            <select name="santepere" class="form-control" id="santepere" readonly>
                                              <option <?php if($info_parentm['existe_personne']==1){echo "selected";} ?> value="1">Vie</option>
                                              <option <?php if($info_parentm['existe_personne']==2){echo "selected";} ?> value="2">Décédé</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="nomm" value="<?=$info_parentm['nom']?>" >
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="prenomm" value="<?=$info_parentm['prenom']?>" >
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" name="numbrem" value="<?php if(substr($info_parentm['num_membre'], 0, 4)=='sans'){echo'inconnu';}else{ if (strlen($info_parentm['code_m'])==1) {$code='M000'.$info_parentm['code_m'].'B' ;}if (strlen($info_parentm['code_m'])==2) {$code='M00'.$info_parentm['code_m'].'B' ;}if (strlen($info_parentm['code_m'])==3) {$code='M0'.$info_parentm['code_m'].'B';}if (strlen($info_parentm['code_m'])==4) {$code='M'.$info_parentm['code_m'].'B';}echo $code;} ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExperience" class="col-sm-2 control-label">A propos de moi</label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="apropos" placeholder="A propos de moi"><?=$info_personel['description']?></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="type_modif" value="<?=$modification_donnees;?>" >
                                    <input type="hidden" name="id_user" value="<?=$info_user['id']?>" >
                                    <input type="hidden" name="id_personne" value="<?=$info_personel['id']?>" >
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                           <input type="submit" name="modifier-profil" value="Je modifie" class="btn btn-primary">
                                        </div>
                                    </div>
                                <?php echo form_close(); 

                            }
                            if ($modification_donnees==2) {
                                
                                echo form_open('users/modifier_profil/2',array('class' => 'form-horizontal UpdateDetails'));?>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Téléphone:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="numtel" value="<?=$info_contact['tel']?>" placeholder="Numéro téléphone" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Célulaire:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="numcel" value="<?=$info_contact['cel']?>" placeholder="Numéro Célulaire" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" value="<?=$info_contact['email']?>" placeholder="Email" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="" class="col-sm-3 control-label"><?php echo get_phrase('Adresse postal'); ?>:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="adressepost" value="<?=$info_contact['adresse_postal']?>" placeholder="<?php echo get_phrase('adresse postale'); ?>">
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Numéro faxe:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="faxe" value="<?=$info_contact['faxe']?>" placeholder="Numéro faxe" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Lien Facebook:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lien_fb" value="<?=$info_contact['lien_facebook']?>" placeholder="lien de connexion facebook" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Lien whatsApp:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="numero_whatsapp" value="<?=$info_contact['numero_whatsapp']?>" placeholder="lien de demande d'amis ou numero" >
                                        </div>
                                    </div>
                                    <input type="hidden" name="type_modif" value="<?=$modification_donnees;?>" >
                                    <input type="hidden" name="id_contact" value="<?=$info_contact['id'];?>" >
                                    <input type="hidden" name="id_user" value="<?=$info_user['id']?>" >
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                           <input type="submit" name="modifier-profil" value="Je modifie" class="btn btn-primary">
                                        </div>
                                    </div>
                                <?php echo form_close(); 

                            }

                            if ($modification_donnees==3) {
                                
                                echo form_open('users/modifier_profil/3',array('class' => 'form-horizontal UpdateDetails'));?>
                                         
                                        <div class="form-group">
                                            <label for="" class="col-sm-6 control-label">Pays:</label>
                                            <div class="col-sm-6">
                                                <select type="text" class="form-control select2" name="pays" id="pays" required >
                                                  <option>Pays de Résidence</option>
                                                   <?php 
                                                      if($aff_p){
                                                          foreach($aff_p as $selectvalue){
                                                            ?>
                                                            <option <?php if ($info_pays['nom_fr']==$selectvalue->nom_fr) {
                                                                echo"selected";
                                                            }?> value="<?= $libel = $selectvalue->id; ?>"><?=  $nom_pays = $selectvalue->nom_fr;?></option>
                                                    

                                                    <?php }} ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-6 control-label">Ville:</label>
                                            <div class="col-sm-6">
                                                <select type="text" class="form-control" name="ville" id="ville" onclick="afficheautreville()" required >
                                                  <option>Ville de Résidence</option>
                                                  <option value="0">autre ville</option>
                                                   <?php 
                                                      if($aff_v){
                                                          foreach($aff_v as $selectvalue){
                                                            ?>
                                                            <option <?php if ($info_ville['nom_fr']==$selectvalue->nom_fr) {
                                                                echo"selected";
                                                            }?> value="<?= $libel = $selectvalue->id; ?>"><?=  $nom_ville = $selectvalue->nom_fr;?></option>
                                                    

                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" id="autre_ville">
                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-sm-6 control-label"><?php echo get_phrase('Commune'); ?>/<?php echo get_phrase('Prefecture'); ?>/<?php echo get_phrase('Sous-prefecture'); ?>:</label>
                                            <div class="col-sm-6">
                                                <select type="text" class="form-control" name="commune" id="commune" onclick="afficheautrecommune()" required >
                                                  <option><?php echo get_phrase('Commune'); ?> <?php echo get_phrase('or'); ?> <?php echo get_phrase('Prefecture'); ?> <?php echo get_phrase('or'); ?> <?php echo get_phrase('Sous-prefecture'); ?></option>
                                                  <option value="0"><?php echo get_phrase('autre'); ?> <?php echo get_phrase('Commune'); ?> <?php echo get_phrase('or'); ?> <?php echo get_phrase('Prefecture'); ?> <?php echo get_phrase('or'); ?> <?php echo get_phrase('Sous-prefecture'); ?></option>
                                                   <?php 
                                                      if($aff_c){
                                                          foreach($aff_c as $selectvalue){
                                                            ?>
                                                            <option <?php if ($info_commune['nom_fr']==$selectvalue->nom_fr) {
                                                                echo"selected";
                                                            }?> value="<?= $libel = $selectvalue->id; ?>"><?=  $nom_ville = $selectvalue->nom_fr;?></option>
                                                    

                                                    <?php }} ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group" id="autre_commune">
                                            
                                        </div>

                                        
                                        <div class="form-group">
                                            <label for="" class="col-sm-6 control-label">Rue:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="rue" value="<?=$info_localisation['nom_rue']?>" placeholder="Rue" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-sm-6 control-label">Quartier:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="quartier" value="<?=$info_localisation['nom_quartier']?>" placeholder="Quartier" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-sm-6 control-label">Residence:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="residence" value="<?=$info_localisation['type_residence']?>" placeholder="type de residence(Batiment trace ou residence Bamba)">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-sm-6 control-label">Niveau:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="position" value="<?=$info_localisation['niveau_residence']?>" placeholder="position dans la residence(2eme étage ou stidio à gauche)">
                                            </div>
                                        </div>
                                        <input type="hidden" name="type_modif" value="<?=$modification_donnees;?>" >
                                        <input type="hidden" name="id_user" value="<?=$info_user['id']?>" >
                                        <input type="hidden" name="id_personne" value="<?=$info_personel['id'];?>">
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                               <input type="submit" name="modifier-profil" value="Je modifie" class="btn btn-primary">
                                            </div>
                                        </div>
                                <?php echo form_close(); 

                            }?>
                            
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
<!-- Select2 -->
  <link rel="stylesheet" href="<?php echo site_url('assets/');?>bower_components/select2/dist/css/select2.min.css">

<!-- Select2 -->
<script src="<?php echo site_url('assets/');?>bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- /.content-wrapper -->
<script type="text/javascript">
    $(document).ready(function() {
      $("#profilNav").addClass('active');
      $('.select2').select2();
    }); 
    function afficheautreville(){
        var select = document.getElementById("ville");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur==0) {
            document.getElementById('autre_ville').innerHTML='<label for="valeur_autre_ville" class="col-sm-6 control-label">Autre ville:</label><div class="col-sm-6"><input type="text" class="form-control" name="valeur_autre_ville" id"valeur_autre_ville" placeholder="la ville" ></div>';
        }else{
            document.getElementById('autre_ville').innerHTML='';
        }
    }
    function afficheautrecommune(){
        var select = document.getElementById("commune");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur==0) {
            document.getElementById('autre_commune').innerHTML='<label for="valeur_autre_commune" class="col-sm-6 control-label">Autre Commune/préfecture/Sous-préfecture:</label><div class="col-sm-6"><input type="text" class="form-control" name="valeur_autre_commune" id="valeur_autre_commune"  placeholder="la ville" ></div>';
        }else{
            document.getElementById('autre_commune').innerHTML='';
        }
    }
</script>