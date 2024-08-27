<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo get_phrase($titre); ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('');?>"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
            <li class="active"><?= $icon; ?>&nbsp;<?php echo get_phrase($lien); ?> </li>
        </ol>
    </section>
    <!-- Main content -->
    
    <section class="content">
      <div class="row">
        <div class="pull-left col-xs-12">
            <a id="controleligne" href="<?php echo site_url('');?>inscription.html" class="btn btn-success pull-left" >
                &nbsp;<?php echo get_phrase('Enregistrer nouveau membre'); ?>
            </a>
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-printe" title="'.get_phrase('deleted').'" >&nbsp;<?php echo get_phrase('print'); ?></button>
            

        </div>
        <div class="col-xs-12">
            <div class="box">
              
              <!-- /.box-header -->
              <div class="box-body">
                <table id="manageTable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th width="2%">
                        <?php echo get_phrase('Matricule membre'); ?>
                      </th>
                      <th width="4%">
                        <?php echo get_phrase('Nom et Prenom'); ?>
                      </th>
                      <th width="5%">
                        <?php echo get_phrase('Niveau d`etude'); ?>
                      </th>
                      <th width="5%">
                        <?php echo get_phrase('Diplome(s) obtenu(s)'); ?>
                      </th>
                      <th width="5%">
                        <?php echo get_phrase('Fonction/Metier'); ?>
                      </th>
                      <th>
                        <?php echo get_phrase('Contact'); ?>
                      </th>
                      <th>
                        <?php echo get_phrase('Adresse'); ?>
                      </th>
                      <th>
                        <?php echo get_phrase('date et lieu nais'); ?>
                      </th>
                      <th>
                        <?php echo get_phrase('Nationalite'); ?>
                      </th>
                      <th>
                        <?php echo get_phrase('Nom et Prenom pere'); ?> <br/><?php echo get_phrase('Nom et Prenom mere'); ?>
                      </th>
                      <th>
                        <?php echo get_phrase('Action'); ?>
                      </th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    
                  </tbody>
                  <tfoot>
                   <tr>
                      <td><?php echo get_phrase('Matricule membre'); ?></td>
                      <td><?php echo get_phrase('Nom et Prenom'); ?></td>
                      <td><?php echo get_phrase('etude'); ?></td>
                      <td><?php echo get_phrase('Diplome'); ?></td>
                      <td><?php echo get_phrase('Fonction/metier'); ?></td>
                      <th><?php echo get_phrase('Contact'); ?></th>
                      <th><?php echo get_phrase('Adresse'); ?></th>
                      <td><?php echo get_phrase('date et lieu nais'); ?></td>
                      <th><?php echo get_phrase('Nationalite'); ?></th>
                      <th><?php echo get_phrase('Nom et Prenom pere'); ?><br/><?php echo get_phrase('Nom et Prenom mere'); ?></th>
                      <th><?php echo get_phrase('Action'); ?></th>
                      
                    </tr>
                  </tfoot>
                </table>

              </div>
              <div id="voireattent2" >
              
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <?php 
              $attributes = array("class" => "",
                                  "role" => "form",
                                  "id" => "",
                                  "name" => "");
              echo form_open("", $attributes);
            ?>
              <div class="modal-header">
                <input type="submit" name="envoi" id="controleligne" class="btn btn-primary pull-left" value="<?php echo get_phrase('search'); ?>"/>
                <a href="<?php echo base_url('/listes_membres/index/refresh'); ?>" class="pull-right" >
                  <h3><i id="icone" aria-hidden="true" class="fa fa-refresh"></i></h3>
                </a>
                <h4 class="modal-title">
                    <center>
                        <h2 class="box-title"><?php echo get_phrase('search more complex'); ?></h2>
                    </center>
                </h4>
              </div>
              <div class="box-body">
                <!-- recherche par mitricule -->
                  <div  class="form-group col-md-3 col-xs-12">
                    <input onkeyup="recherchepull()" type="text" class="form-control" name="matricule" id="matricule" placeholder="<?php echo get_phrase('Matricule membre'); ?>" value="<?=$this->session->userdata('matricule')?>">
                  </div>

                <!-- recherche s'il vie -->
                  <div  class="form-group col-md-2 col-xs-12">
                    <select onkeyup="recherchepull()" class="form-control" id="civile" name="civile">
                      <option value="">M/Mme/Mlle</option>
                      <option value="1" <?php if($this->session->userdata('civile')==1){echo"selected";} ?>>M</option>
                      <option value="2" <?php if($this->session->userdata('civile')==2){echo"selected"; }?>>Mme</option>
                      <option value="3" <?php if($this->session->userdata('civile')==3){echo"selected";} ?>>Mlle</option>
                    </select>
                  </div>

                <!-- recherche sur son nom -->
                  <div class="form-group col-md-3 col-xs-12" >
                    <input type="text" class="form-control" name="n" id="n" placeholder="<?php echo get_phrase('last name'); ?>" value="<?=$this->session->userdata('n')?>">
                  </div>

                <!-- recherche sur son prénom -->
                  <div class="form-group col-md-4 col-xs-12" >
                    <input type="text" class="form-control" name="p" id="p" placeholder="<?php echo get_phrase('prenom'); ?>" value="<?=$this->session->userdata('p')?>">
                  </div>

                <!-- recherche sur son pseudo -->
                  <div class="form-group col-md-2 col-xs-12" >
                    <input type="text" class="form-control" name="ps" id="ps" placeholder="<?php echo get_phrase('pseudo'); ?>" value="<?=$this->session->userdata('ps')?>">
                  </div>

                <!-- recherche sur son jour de naiss -->
                  <div class="form-group col-md-2 col-xs-12">
                    <input type="number" min="1" class="form-control" name="dnaisj" id="dnaisj" placeholder="<?php echo get_phrase('day nais'); ?>" value="<?=$this->session->userdata('dnaisj')?>">
                  </div>

                <!-- recherche sur son mois naiss -->
                  <div class="form-group col-md-2 col-xs-12">
                    <input type="number" min="1" class="form-control" name="dnaism" id="dnaism" placeholder="<?php echo get_phrase('month nais'); ?>" value="<?=$this->session->userdata('dnaism')?>">
                  </div>

                <!-- recherche sur son annee naiss -->
                  <div class="form-group col-md-2 col-xs-12">
                    <input type="number" min="1800" class="form-control" name="dnaisa" id="dnaisa" placeholder="<?php echo get_phrase('year nais'); ?>" value="<?=$this->session->userdata('dnaisa')?>">
                  </div>

                <!-- recherche sur son lieu naiss -->
                  <div class="form-group col-md-2 col-xs-12">
                    <input type="text" class="form-control" name="lnais" id="lnais" placeholder="<?php echo get_phrase('lieu nais'); ?>" value="<?=$this->session->userdata('lnais')?>">
                  </div>

                <!-- recherche s'il vie oui est mort -->
                  <div  class="form-group col-md-2 col-xs-12">
                    <select onkeyup="recherchepull()" class="form-control" id="existe" name="existe">
                      <option value=""><?php echo get_phrase('living'); ?>/<?php echo get_phrase('die'); ?></option>
                      <option value="1" <?php if($this->session->userdata('existe')==1){echo"selected";} ?>><?php echo get_phrase('living'); ?></option>
                      <option value="2" <?php if($this->session->userdata('existe')==2){echo"selected"; }?>><?php echo get_phrase('die'); ?></option>
                    </select>
                  </div>

                <!-- recherche par le père -->
                  <label for="n_p" class="form-group col-md-3 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;"><?php echo get_phrase('nom et prenom pere'); ?>: </label>
                  <div class="form-group col-md-3 col-xs-12" >
                    <input type="text" class="form-control" name="n_p" id="n_p" placeholder="<?php echo get_phrase('last name'); ?>" value="<?=$this->session->userdata('n_p')?>">
                  </div>

                  <div class="form-group col-md-6 col-xs-12" >
                    <input type="text" class="form-control" name="p_p" id="p_p" placeholder="<?php echo get_phrase('prenom'); ?>" value="<?=$this->session->userdata('p_p')?>">
                  </div>

                <!-- recherche par la mère -->
                  <label for="n_m" class="form-group col-md-3 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;"><?php echo get_phrase('nom et prenom mere'); ?>: </label>
                  <div class="form-group col-md-3 col-xs-12" >
                    <input type="text" class="form-control" name="n_m" id="n_m" placeholder="<?php echo get_phrase('last name'); ?>" value="<?=$this->session->userdata('n_m')?>">
                  </div>

                  <div class="form-group col-md-6 col-xs-12" >
                    <input type="text" class="form-control" name="p_m" id="p_m" placeholder="<?php echo get_phrase('prenom'); ?>" value="<?=$this->session->userdata('p_m')?>">
                  </div>
                
                <!-- l'interval d'inscription -->
                  <?php
                    if ($this->session->userdata('interp')) {
                      if ($this->session->userdata('interp')=='') {
                        $datep='2019-01-01';
                      } else {
                        $datep=$this->session->userdata('interp');
                      }
                      
                    } else {
                      $datep='2019-01-01';
                    }

                    if ($this->session->userdata('inters')) {
                      if ($this->session->userdata('inters')=='') {
                        $dates=date('Y-m-d');
                      } else {
                        $dates=$this->session->userdata('inters');
                      }
                      
                    } else {
                      $dates=date('Y-m-d');
                    }
                    
                  ?>
                  <div class="form-group col-md-12 col-xs-12">
                    <label for="interp" class="form-group col-md-2 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;">inscrit depuit le :</label>
                    <div class="col-md-4 col-xs-12">
                      <input type="date" required="" class="form-control" name="interp" id="interp" value="<?=$datep;?>" title="le debut de la date de l'interval" />
                    </div>

                    <label for="inters" class="form-group col-md-2 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;">au :</label>
                    <div class="col-md-4 col-xs-12">
                      <input type="date" required="" class="form-control" name="inters" id="inters" value="<?=$dates;?>" title="la fin de la date de l'interval">
                    </div>
                  </div>
                
                <!-- recherche par liste de nationalité -->
                  <label for="nationalite" class="form-group col-md-3 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;"><?php echo get_phrase('Nationalite'); ?>: </label>
                  <div class="form-group col-md-8 col-xs-12">
                    <select class="form-control select2 box-danger" multiple="multiple" name="nationalite[]" id="nationalite" title="<?php echo get_phrase('Nationalite'); ?>" >
                      <?php 
                        if ($this->session->userdata('nationalite')) {
                          $r=$this->session->userdata('nationalite');
                          if($aff_nationalite){
                            foreach($aff_nationalite as $selectvalue){?>
                              <option value="<?=$id_nt = $selectvalue->id;?>"
                                <?php for ($u=0; $u <count($r); $u++) { 
                                  if($id_nt==$r[$u]){echo'selected="selected"';}
                                }?> ><?=  $nom_nt = $selectvalue->type_nationalite;?>
                                
                              </option>
                            <?php }
                          }
                        } else {
                          if($aff_nationalite){
                            foreach($aff_nationalite as $selectvalue){?>
                              <option value="<?=  $nom_nt = $selectvalue->id;?>" ><?=  $nom_nt = $selectvalue->type_nationalite;?></option>
                            <?php }
                          }
                        } ?>
                            
                            
                            
                    </select>
                  </div>

                <!-- recherche par liste pays -->
                  <label for="pays" class="form-group col-md-3 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;"><?php echo get_phrase('pays'); ?>: </label>
                  <div class="form-group col-md-8 col-xs-12">
                    <select class="form-control select2 box-danger" multiple="multiple" name="pays[]" id="pays" title="<?php echo get_phrase('pays'); ?>" >
                      <?php if ($this->session->userdata('pays')) {
                        $r=$this->session->userdata('pays');
                        if($aff_p){
                          foreach($aff_p as $selectvalue){?>
                            <option value="<?=$id_nt = $selectvalue->id;?>"
                              <?php for ($u=0; $u <count($r); $u++) { 
                                if($id_nt==$r[$u]){echo'selected="selected"';}
                              }?> ><?=  $nom_nt = $selectvalue->nom_fr;?>
                              
                            </option>
                          <?php }
                        }
                      } else {
                        if($aff_p){
                          foreach($aff_p as $selectvalue){?>
                            <option value="<?=  $nom_nt = $selectvalue->id;?>" ><?=  $nom_nt = $selectvalue->nom_fr;?></option>
                          <?php }
                        }
                      } ?>
                    </select>
                  </div>

                <!-- recherche par liste de ville -->
                  <label for="ville" class="form-group col-md-3 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;"><?php echo get_phrase('ville'); ?>: </label>
                  <div class="form-group col-md-8 col-xs-12">
                    <select class="form-control select2 box-danger" multiple="multiple" name="ville[]" id="ville" title="<?php echo get_phrase('ville'); ?>" >
                      <?php 
                        if ($this->session->userdata('ville')) {
                          $r=$this->session->userdata('ville');
                          if($aff_ville){
                            foreach($aff_ville as $selectvalue){?>
                              <option value="<?=$id_nt = $selectvalue->id;?>"
                                <?php for ($u=0; $u <count($r); $u++) { 
                                  if($id_nt==$r[$u]){echo'selected="selected"';}
                                }?> ><?=  $nom_nt = $selectvalue->nom_fr;?>
                                
                              </option>
                            <?php }
                          }
                        } else {
                          if($aff_ville){
                            foreach($aff_ville as $selectvalue){?>
                              <option value="<?=  $nom_nt = $selectvalue->id;?>" ><?=  $nom_nt = $selectvalue->nom_fr;?></option>
                            <?php }
                          }
                        } ?>
                            
                            
                            
                    </select>
                  </div>

                <!-- recherche par liste de commune -->
                  <label for="commune" class="form-group col-md-3 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;"><?php echo get_phrase('commune'); ?>: </label>
                  <div class="form-group col-md-8 col-xs-12">
                    <select class="form-control select2 box-danger" multiple="multiple" name="commune[]" id="commune" title="<?php echo get_phrase('commune'); ?>" >
                      <?php 
                        if ($this->session->userdata('commune')) {
                          $r=$this->session->userdata('commune');
                          if($aff_commune){
                            foreach($aff_commune as $selectvalue){?>
                              <option value="<?=$id_nt = $selectvalue->id;?>"
                                <?php for ($u=0; $u <count($r); $u++) { 
                                  if($id_nt==$r[$u]){echo'selected="selected"';}
                                }?> ><?=  $nom_nt = $selectvalue->nom_fr;?>
                                
                              </option>
                            <?php }
                          }
                        } else {
                          if($aff_commune){
                            foreach($aff_commune as $selectvalue){?>
                              <option value="<?=  $nom_nt = $selectvalue->id;?>" ><?=  $nom_nt = $selectvalue->nom_fr;?></option>
                            <?php }
                          }
                        } ?>
                    </select>
                  </div>

                <!-- recherche par liste de niveau d'étude -->
                  <label for="netude" class="form-group col-md-3 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;"><?php echo get_phrase('niveau d`etude'); ?>: </label>
                  <div class="form-group col-md-8 col-xs-12">
                    <select class="form-control select2 box-danger" multiple="multiple" name="netude[]" id="netude" title="<?php echo get_phrase('niveau d`etude'); ?>" >
                      <?php 
                        if ($this->session->userdata('netude')) {
                          $r=$this->session->userdata('netude');
                          if($aff_Netude){
                            foreach($aff_Netude as $selectvalue){?>
                              <option value="<?=$id_nt = $selectvalue->id;?>"
                                <?php for ($u=0; $u <count($r); $u++) { 
                                  if($id_nt==$r[$u]){echo'selected="selected"';}
                                }?> ><?=  $nom_nt = $selectvalue->niveau;?>
                                
                              </option>
                            <?php }
                          }
                        } else {
                          if($aff_Netude){
                            foreach($aff_Netude as $selectvalue){?>
                              <option value="<?=  $nom_nt = $selectvalue->id;?>" ><?=  $nom_nt = $selectvalue->niveau;?></option>
                            <?php }
                          }
                        } ?>
                    </select>
                  </div>

                <!-- recherche par liste de diplome -->
                  <label for="diplome" class="form-group col-md-3 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;"><?php echo get_phrase('Diplome(s) obtenu(s)'); ?>: </label>
                  <div class="form-group col-md-8 col-xs-12">
                    <select class="form-control select2 box-danger" multiple="multiple" name="diplome[]" id="diplome" title="<?php echo get_phrase('Diplome(s) obtenu(s)'); ?>" >
                      <?php 
                        if ($this->session->userdata('diplome')) {
                          $r=$this->session->userdata('diplome');
                          if($aff_diplo){
                            foreach($aff_diplo as $selectvalue){?>
                              <option value="<?=$id_nt = $selectvalue->id;?>"
                                <?php for ($u=0; $u <count($r); $u++) { 
                                  if($id_nt==$r[$u]){echo'selected="selected"';}
                                }?> ><?=  $nom_nt = $selectvalue->diplome.'('.$selectvalue->titre.')';?>
                                
                              </option>
                            <?php }
                          }
                        } else {
                          if($aff_diplo){
                            foreach($aff_diplo as $selectvalue){?>
                              <option value="<?=  $nom_nt = $selectvalue->id;?>" ><?=  $nom_nt = $selectvalue->diplome.'('.$selectvalue->titre.')';?></option>
                            <?php }
                          }
                        } ?>
                    </select>
                  </div>

                <!-- recherche par liste de fontionnaire ou métier -->
                  <label for="fonction_metier" class="form-group col-md-3 col-xs-12" style="margin-top: .5em;margin-bottom: .5em;"><?php echo get_phrase('Fonction/metier'); ?>: </label>
                  <div class="form-group col-md-8 col-xs-12">
                    <select class="form-control select2 box-danger" multiple="multiple" name="fonction_metier[]" id="fonction_metier" title="<?php echo get_phrase('Fonction/metier'); ?>" >
                      <?php 
                        if ($this->session->userdata('fonction_metier')) {
                          $r=$this->session->userdata('fonction_metier');
                          if($aff_prof){
                            foreach($aff_prof as $selectvalue){?>
                              <option value="<?=$id_nt = $selectvalue->id;?>"
                                <?php for ($u=0; $u <count($r); $u++) { 
                                  if($id_nt==$r[$u]){echo'selected="selected"';}
                                }?> ><?php
                                $nom_nt = $selectvalue->type_profession;
                                if ($nom_nt==0) {
                                   $note='Faire rien';
                                 }
                                 if ($nom_nt==1) {
                                   $note='Ménagère';
                                 }
                                 if ($nom_nt==2) {
                                   $note='&Eacute;lève';
                                 }
                                 if ($nom_nt==3) {
                                   $note='&Eacute;tudiant';
                                 }
                                 if ($nom_nt==4) {
                                   $note='Foctionalaire'.'('.$selectvalue->profession.')';
                                 }
                                 if ($nom_nt==5) {
                                   $note='Métier'.'('.$selectvalue->profession.')';
                                 }
                                  echo$note;?>
                                
                              </option>
                            <?php }
                          }
                        } else {
                          if($aff_prof){
                            foreach($aff_prof as $selectvalue){?>
                              <option value="<?=  $nom_nt = $selectvalue->id;?>" ><?php
                                $nom_nt = $selectvalue->type_profession;
                                if ($nom_nt==0) {
                                   $note='Faire rien';
                                 }
                                 if ($nom_nt==1) {
                                   $note='Ménagère';
                                 }
                                 if ($nom_nt==2) {
                                   $note='&Eacute;lève';
                                 }
                                 if ($nom_nt==3) {
                                   $note='&Eacute;tudiant';
                                 }
                                 if ($nom_nt==4) {
                                   $note='Foctionalaire'.'('.$selectvalue->profession.')';
                                 }
                                 if ($nom_nt==5) {
                                   $note='Métier'.'('.$selectvalue->profession.')';
                                 }
                                  echo$note;?></option>
                            <?php }
                          }
                        } ?>
                    </select>
                  </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="refresh" value="faux">
                <input type="submit" name="envoi" id="controleligne" class="btn btn-primary pull-right" value="<?php echo get_phrase('search'); ?>"/>
                <button type="button" class="btn btn-success pull-left" data-toggle="modal" data-target="#modal-printe" title="'.get_phrase('deleted').'" >&nbsp;<?php echo get_phrase('print'); ?></button>
              </div>
            <?php echo form_close(); ?>
            <div id="voireattent" >
              
            </div>
          </div>

          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      
    </section>
    <div class="modal modal-default fade" id="modal-printe">
      <div class="modal-dialog" style="width: 100%;">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">
                      <center>
                          <h2 class="box-title"><?php echo get_phrase('print'); ?></h2>
                          <h4></h4>
                      </center>
                  </h4>
              </div>
              <div class="modal-body box box-success">
                  <?php $t = array('target' => "__blank" ); echo form_open(site_url('').'listes_membres/printmember') ; ?>
                      <div class="box-body">                        
                          <div class="form-group col-md-12">
                            <div class="form-group col-md-2">
                               <select class="form-control" name="entete[]" id="sel1" onchange="modfi_select1()" >
                                 <option value="0"><?php echo get_phrase('selected'); ?></option>
                                 <option value="1"><?php echo get_phrase('Matricule membre'); ?></option>
                                 <option value="2"><?php echo get_phrase('Nom et Prenom'); ?></option>
                                 <option value="3"><?php echo get_phrase('etude'); ?></option>
                                 <option value="4"><?php echo get_phrase('Diplome'); ?></option>
                                 <option value="5"><?php echo get_phrase('Fonction/metier'); ?></option>
                                 <option value="6"><?php echo get_phrase('Contact'); ?></option>
                                 <option value="7"><?php echo get_phrase('Adresse'); ?></option>
                                 <option value="8"><?php echo get_phrase('date et lieu nais'); ?></option>
                                 <option value="9"><?php echo get_phrase('Nationalite'); ?></option>
                                 <option value="10"><?php echo get_phrase('Nom et Prenom pere'); ?><br/><?php echo get_phrase('Nom et Prenom mere'); ?></option>


                               </select>
                            </div>
                            <div class="form-group col-md-2">
                               <select class="form-control" name="entete[]" id="sel2" onchange="modfi_select2()" disabled>
                                 <option value="0"><?php echo get_phrase('selected'); ?></option>
                               </select>
                            </div>
                            <div class="form-group col-md-2">
                               <select class="form-control" name="entete[]" id="sel3" onchange="modfi_select3()" disabled>
                                 <option value="0"><?php echo get_phrase('selected'); ?></option>
                               </select>
                            </div>
                            <div class="form-group col-md-2">
                               <select class="form-control" name="entete[]" id="sel4" onchange="modfi_select4()" disabled>
                                 <option value="0"><?php echo get_phrase('selected'); ?></option>
                               </select>
                            </div>
                            <div class="form-group col-md-2">
                               <select class="form-control" name="entete[]" id="sel5" onchange="modfi_select5()" disabled>
                                 <option value="0"><?php echo get_phrase('selected'); ?></option>
                               </select>
                            </div>
                            <div class="form-group col-md-2">
                               <select class="form-control" name="entete[]" id="sel6" disabled>
                                 <option value="0"><?php echo get_phrase('selected'); ?></option>
                               </select>
                            </div>
                          </div>

                      </div>
                      <div class="modal-footer box box-success">
                          <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Fermer</button>
                          <input type="submit" value="<?php echo get_phrase('Deleted'); ?>" class="btn btn-success"/>
                
                      </div>
                  <?php echo form_close() ; ?>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>  
    </div>
    <div class="modal modal-default fade" id="modal-supp">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">
                      <center>
                          <h2 class="box-title">Voulez-vous vraiment le supprimer?</h2>
                          <h4>Si oui entrer le code de validation et cliquer sur supprimer</h4>
                      </center>
                  </h4>
              </div>
              <div class="modal-body box box-danger">
                  <?php echo form_open('') ; ?>
                      <div class="box-body">                        
                          <div class="form-group col-md-12">
                               <input type="password" class="form-control" name="verifcationcode" title="pour la verification de votre identité" placeholder="Entrer le code de validation" required >
                          </div>
                          <input type="hidden" name="codeverifinconf" value="Membre">
                          <input type="hidden" name="verifcode" id="verifcode" >

                      </div>
                      <div class="modal-footer box box-danger">
                          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fermer</button>
                          <input type="submit" id="valider3" value="<?php echo get_phrase('Deleted'); ?>" class="btn btn-danger" name="envoi" />
                
                      </div>
                  <?php echo form_close() ; ?>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>  
    </div> 
  </div>
  
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo site_url('assets/');?>bower_components/select2/dist/css/select2.min.css">

  <!-- Select2 -->
  <script src="<?php echo site_url('assets/');?>bower_components/select2/dist/js/select2.full.min.js"></script>
  <script type="text/javascript">
    var manageTable;
      var base_url = "<?php echo base_url(''); ?>";

      $(document).ready(function() {
        //Initialize Select2 Elements
      $('.select2').select2({
        theme: 'classic'
      });
        $("#Menulistmembre").addClass('active');
          // initialize the datatable 
          
          manageTable = $('#manageTable').DataTable({
               "language": {
                  "decimal": ",",
                  "thousands": ".",
                  "info": "<?php echo get_phrase('to'); ?> _START_ <?php echo get_phrase('to'); ?> _END_ <?php echo get_phrase('for'); ?> _TOTAL_ <?php echo get_phrase('ligne(s)'); ?>",
                  "infoEmpty": "<?php echo get_phrase('Aucune entree'); ?>",
                  "infoPostFix": "",
                  "infoFiltered": " - <?php echo get_phrase('filtre du total'); ?> _MAX_ <?php echo get_phrase('entrees'); ?>",
                  "loadingRecords": "<?php echo get_phrase('Veuillez patienter - Chargement des donnees ...'); ?>",
                  "lengthMenu": "<?php echo get_phrase('Nombre de ligne a afficher'); ?>: _MENU_",
                  "paginate": {
                      "first": "<?php echo get_phrase('Premier'); ?>",
                      "last": "<?php echo get_phrase('Dernier'); ?>",
                      "next": "<?php echo get_phrase('Suivant'); ?>",
                      "previous": "<?php echo get_phrase('Precedent'); ?>"
                  },
                  "processing": "<?php echo get_phrase('veillez passienter ...'); ?>",
                  "search": "<?php echo get_phrase('search'); ?>: ",
                  "searchPlaceholder": "",
                  "zeroRecords": "<?php echo get_phrase('Pas de donnees! S il vous plait changer votre terme de recherche'); ?>.",
                  "emptyTable": "<?php echo get_phrase('Aucune donnee disponible'); ?>",
                  "aria": {
                      "sortAscending":  ": <?php echo get_phrase('permet de trier la colonne par ordre croissant'); ?>",
                      "sortDescending": ": <?php echo get_phrase('permet de trier la colonne par ordre decroissant'); ?>"
                  },
                  //only works for built-in buttons, not for custom buttons
                  "buttons": {
                      "create": "<?php echo get_phrase('Nouveau'); ?>",
                      "edit": "<?php echo get_phrase('Changement'); ?>",
                      "remove": "<?php echo get_phrase('Effacer'); ?>",
                      "copy": "<?php echo get_phrase('copie'); ?>",
                      "csv": "<?php echo get_phrase('CSV-Datei'); ?>",
                      "excel": "<?php echo get_phrase('Excel-Tabelle'); ?>",
                      "pdf": "<?php echo get_phrase('PDF-Document'); ?>",
                      "print": "<?php echo get_phrase('Imprimer'); ?>",
                      "colvis": "<?php echo get_phrase('Selection de colonne'); ?>",
                      "collection": "<?php echo get_phrase('selection'); ?>"
                  },
                  select: {
                      rows: {
                          _: '%d <?php echo get_phrase('Lignes selectionnees'); ?>',
                          0: '<?php echo get_phrase('Cliquez sur la ligne pour selectionner'); ?>',
                          1: '<?php echo get_phrase('Une ligne selectionnee'); ?>'
                      }
                  }
              },

              'paging'      : true,
              'lengthChange': true,
              'searching'   : true,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : true,
              'ajax': base_url + 'Listes_membres/fetchMembreData',
              'order': [],
              dom: 'Bfrtip',
                    buttons:[
                      'copy', 'csv', 'excel'
                    ]
          });
          $('#manageTable tfoot td').each( function () {
              var title = $(this).text();
                $(this).html( '<input type="text" id="'+title+'" placeholder="<?php echo get_phrase('search'); ?>" />' );
              
          } );
   
          // DataTable
          var table = $('#manageTable').DataTable();
       
          // Apply the search
          table.columns().every( function () {
              var that = this;
       
              $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                  that
                      .search( this.value )
                      .draw();
                }
              } );
          } );
          
          $('#controleligne').on('click', function () {
            $("#voireattent").addClass('overlay');
            document.getElementById('voireattent').innerHTML='<i class="fa fa-refresh fa-spin"></i>';
            $("#voireattent2").addClass('overlay');
            document.getElementById('voireattent2').innerHTML='<i class="fa fa-refresh fa-spin"></i>';
          });
      

      });  
      
   
      
      function modif_supp(num){
        document.getElementById('verifcode').value=num;
      }

      function modif_refresh(){
        document.getElementById('refresh').value='vrai';
      }

      function modfi_select1(){
        var note='';
        var select = document.getElementById("sel1");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur == 0) {
          document.getElementById("sel2").disabled=true;
          document.getElementById("sel3").disabled=true;
          document.getElementById("sel4").disabled=true;
          document.getElementById("sel5").disabled=true;
          document.getElementById("sel6").disabled=true;
          note+="<option value='0'><?php echo get_phrase('selected'); ?></option>"
        }
        else{
          note+="<option value='0'><?php echo get_phrase('selected'); ?></option>";
          if (valeur == 1) {}
          else{note+="<option value='1'><?php echo get_phrase('Matricule membre'); ?></option>";}
          
          if (valeur == 2) {}
          else{note+="<option value='2'><?php echo get_phrase('Nom et Prenom'); ?></option>";} 

          if (valeur == 3) {}
          else{note+="<option value='3'><?php echo get_phrase('etude'); ?></option>";} 

          if (valeur == 4) {}
          else{note+="<option value='4'><?php echo get_phrase('Diplome'); ?></option>";} 

          if (valeur == 5) {}
          else{note+="<option value='5'><?php echo get_phrase('Fonction/metier'); ?></option>";} 

          if (valeur == 6) {}
          else{note+="<option value='6'><?php echo get_phrase('Contact'); ?></option>";} 

          if (valeur == 7) {}
          else{note+="<option value='7'><?php echo get_phrase('Adresse'); ?></option>";} 

          if (valeur == 8) {}
          else{note+="<option value='8'><?php echo get_phrase('date et lieu nais'); ?></option>";} 

          if (valeur == 9) {}
          else{note+="<option value='9'><?php echo get_phrase('Nationalite'); ?></option>";} 

          if (valeur == 10) {}
          else{note+="<option value='10'><?php echo get_phrase('Nom et Prenom pere'); ?><br/><?php echo get_phrase('Nom et Prenom mere'); ?></option>";}  
           
          
          
          document.getElementById("sel2").disabled=false;
          document.getElementById("sel3").disabled=true;
          document.getElementById("sel4").disabled=true;
          document.getElementById("sel5").disabled=true;
          document.getElementById("sel6").disabled=true;
        }
        document.getElementById("sel2").innerHTML=note;
        //fin select 1
      }
      function modfi_select2(){
        var note='';
        var select = document.getElementById("sel1");
        var valeur1 = select.options[select.selectedIndex].value;
        var select = document.getElementById("sel2");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur == 0) {
          document.getElementById("sel3").disabled=true;
          document.getElementById("sel4").disabled=true;
          document.getElementById("sel5").disabled=true;
          document.getElementById("sel6").disabled=true;
          note+="<option value='0'><?php echo get_phrase('selected'); ?></option>"
        }
        else{
          note+="<option value='0'><?php echo get_phrase('selected'); ?></option>";
          if (valeur == 1) {
          }
          else{
            if(valeur1 == 1){}
            else{note+="<option value='1'><?php echo get_phrase('Matricule membre'); ?></option>";}
          }
          
          if (valeur == 2) {
          }
          else{
            if(valeur1 == 2){}
            else{note+="<option value='2'><?php echo get_phrase('Nom et Prenom'); ?></option>";}
          }

          if (valeur == 3) {
          }
          else{
            if(valeur1 == 3){}
            else{note+="<option value='3'><?php echo get_phrase('etude'); ?></option>";}
          }

          if (valeur == 4) {
          }
          else{
            if(valeur1 == 4){}
            else{note+="<option value='4'><?php echo get_phrase('Diplome'); ?></option>";}
          }

          if (valeur == 5) {
          }
          else{
            if(valeur1 == 5){}
            else{note+="<option value='5'><?php echo get_phrase('Fonction/metier'); ?></option>";}
          }

          if (valeur == 6) {
          }
          else{
            if(valeur1 == 6){}
            else{note+="<option value='6'><?php echo get_phrase('Contact'); ?></option>";}
          } 

          if (valeur == 7) {
          }
          else{
            if(valeur1 == 7){}
            else{note+="<option value='7'><?php echo get_phrase('Adresse'); ?></option>";}
          }

          if (valeur == 8) {
          }
          else{
            if(valeur1 == 8){}
            else{note+="<option value='8'><?php echo get_phrase('date et lieu nais'); ?></option>";}
          }

          if (valeur == 9) {
          }
          else{
            if(valeur1 == 9){}
            else{note+="<option value='9'><?php echo get_phrase('Nationalite'); ?></option>";}
          }

          if (valeur == 10) {
          }
          else{
            if(valeur1 == 10){}
            else{note+="<option value='10'><?php echo get_phrase('Nom et Prenom pere'); ?><br/><?php echo get_phrase('Nom et Prenom mere'); ?></option>";}
          } 
           
          
          
          document.getElementById("sel3").disabled=false;
          document.getElementById("sel4").disabled=true;
          document.getElementById("sel5").disabled=true;
          document.getElementById("sel6").disabled=true;
        }
        document.getElementById("sel3").innerHTML=note;
        var p2=valeur;
        //fin select 2
      }

      function modfi_select3(){
        var note='';
        var select = document.getElementById("sel1");
        var valeur1 = select.options[select.selectedIndex].value;
        var select = document.getElementById("sel2");
        var valeur2 = select.options[select.selectedIndex].value;
        var select = document.getElementById("sel3");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur == 0) {
          document.getElementById("sel4").disabled=true;
          document.getElementById("sel5").disabled=true;
          document.getElementById("sel6").disabled=true;
          note+="<option value='0'><?php echo get_phrase('selected'); ?></option>"
        }
        else{
          note+="<option value='0'><?php echo get_phrase('selected'); ?></option>";
          if (valeur == 1) {
          }
          else{
            if(valeur1 == 1){}
            else{if(valeur2 == 1){}
            else{note+="<option value='1'><?php echo get_phrase('Matricule membre'); ?></option>";}}
          }
          
          if (valeur == 2) {}
          else{
            if(valeur1 == 2){}
            else{if(valeur2 == 2){}
            else{note+="<option value='2'><?php echo get_phrase('Nom et Prenom'); ?></option>";}}
          }

          if (valeur == 3) {}
          else{
            if(valeur1 == 3){}
            else{if(valeur2 == 3){}
            else{note+="<option value='3'><?php echo get_phrase('etude'); ?></option>";}}
          }

          if (valeur == 4) {}
          else{
            if(valeur1 == 4){}
            else{if(valeur2 == 4){}
            else{note+="<option value='4'><?php echo get_phrase('Diplome'); ?></option>";}}
          }

          if (valeur == 5) {}
          else{
            if(valeur1 == 5){}
            else{if(valeur2 == 5){}
            else{note+="<option value='5'><?php echo get_phrase('Fonction/metier'); ?></option>";}}
          }

          if (valeur == 6) {}
          else{
            if(valeur1 == 6){}
            else{if(valeur2 == 6){}
            else{note+="<option value='6'><?php echo get_phrase('Contact'); ?></option>";}}
          } 

          if (valeur == 7) {}
          else{
            if(valeur1 == 7){}
            else{if(valeur2 == 7){}
            else{note+="<option value='7'><?php echo get_phrase('Adresse'); ?></option>";}}
          }

          if (valeur == 8) {}
          else{
            if(valeur1 == 8){}
            else{if(valeur2 == 8){}
            else{note+="<option value='8'><?php echo get_phrase('date et lieu nais'); ?></option>";}}
          }

          if (valeur == 9) {}
          else{
            if(valeur1 == 9){}
            else{if(valeur2 == 9){}
            else{note+="<option value='9'><?php echo get_phrase('Nationalite'); ?></option>";}}
          }

          if (valeur == 10) {}
          else{
            if(valeur1 == 10){}
            else{if(valeur2 == 10){}
            else{note+="<option value='10'><?php echo get_phrase('Nom et Prenom pere'); ?><br/><?php echo get_phrase('Nom et Prenom mere'); ?></option>";}}
          } 
           
          
          
          document.getElementById("sel4").disabled=false;
          document.getElementById("sel5").disabled=true;
          document.getElementById("sel6").disabled=true;
        }
        document.getElementById("sel4").innerHTML=note;
        //fin select 2
        
      }

      function modfi_select4(){
        var note='';
        var select = document.getElementById("sel1");
        var valeur1 = select.options[select.selectedIndex].value;
        var select = document.getElementById("sel2");
        var valeur2 = select.options[select.selectedIndex].value;
        var select = document.getElementById("sel3");
        var valeur3 = select.options[select.selectedIndex].value;
        var select = document.getElementById("sel4");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur == 0) {
          document.getElementById("sel5").disabled=true;
          document.getElementById("sel6").disabled=true;
          note+="<option value='0'><?php echo get_phrase('selected'); ?></option>"
        }
        else{
          note+="<option value='0'><?php echo get_phrase('selected'); ?></option>";
          if (valeur == 1) {}
          else{
            if(valeur1 == 1){}
            else{
              if(valeur2 == 1){}
              else{
                if(valeur3 == 1){}
                else{note+="<option value='1'><?php echo get_phrase('Matricule membre'); ?></option>";}
              }
            }
          }
          
          if (valeur == 2) {}
          else{
            if(valeur1 == 2){}
            else{if(valeur2 == 2){}
            else{if(valeur3 == 2){}
            else{note+="<option value='2'><?php echo get_phrase('Nom et Prenom'); ?></option>";}}}
          }

          if (valeur == 3) {}
          else{
            if(valeur1 == 3){}
            else{if(valeur2 == 3){}
            else{if(valeur3 == 3){}
            else{note+="<option value='3'><?php echo get_phrase('etude'); ?></option>";}}}
          }

          if (valeur == 4) {}
          else{
            if(valeur1 == 4){}
            else{if(valeur2 == 4){}
            else{if(valeur3 == 4){}
            else{note+="<option value='4'><?php echo get_phrase('Diplome'); ?></option>";}}}
          }

          if (valeur == 5) {}
          else{
            if(valeur1 == 5){}
            else{if(valeur2 == 5){}
            else{if(valeur3 == 5){}
            else{note+="<option value='5'><?php echo get_phrase('Fonction/metier'); ?></option>";}}}
          }

          if (valeur == 6) {}
          else{
            if(valeur1 == 6){}
            else{if(valeur2 == 6){}
            else{if(valeur3 == 6){}
            else{note+="<option value='6'><?php echo get_phrase('Contact'); ?></option>";}}}
          } 

          if (valeur == 7) {}
          else{
            if(valeur1 == 7){}
            else{if(valeur2 == 7){}
            else{if(valeur3 == 7){}
            else{note+="<option value='7'><?php echo get_phrase('Adresse'); ?></option>";}}}
          }

          if (valeur == 8) {}
          else{
            if(valeur1 == 8){}
            else{if(valeur2 == 8){}
            else{if(valeur3 == 8){}
            else{note+="<option value='8'><?php echo get_phrase('date et lieu nais'); ?></option>";}}}
          }

          if (valeur == 9) {}
          else{
            if(valeur1 == 9){}
            else{if(valeur2 == 9){}
            else{if(valeur3 == 9){}
            else{note+="<option value='9'><?php echo get_phrase('Nationalite'); ?></option>";}}}
          }

          if (valeur == 10) {}
          else{
            if(valeur1 == 10){}
            else{if(valeur2 == 10){}
            else{if(valeur3 == 10){}
            else{note+="<option value='10'><?php echo get_phrase('Nom et Prenom pere'); ?><br/><?php echo get_phrase('Nom et Prenom mere'); ?></option>";}}}
          } 
           
          
          
          document.getElementById("sel5").disabled=false;
          document.getElementById("sel6").disabled=true;
        }
        document.getElementById("sel5").innerHTML=note;
        //fin select 2
        
      }

      function modfi_select5(){
        var note='';
        var select = document.getElementById("sel1");
        var valeur1 = select.options[select.selectedIndex].value;
        var select = document.getElementById("sel2");
        var valeur2 = select.options[select.selectedIndex].value;
        var select = document.getElementById("sel3");
        var valeur3 = select.options[select.selectedIndex].value;
        var select = document.getElementById("sel4");
        var valeur4 = select.options[select.selectedIndex].value;
        var select = document.getElementById("sel5");
        var valeur = select.options[select.selectedIndex].value;
        if (valeur == 0) {
          document.getElementById("sel6").disabled=true;
          note+="<option value='0'><?php echo get_phrase('selected'); ?></option>"
        }
        else{
          note+="<option value='0'><?php echo get_phrase('selected'); ?></option>";
          if (valeur == 1) {}
          else{
            if(valeur1 == 1){}
            else{
              if(valeur2 == 1){}
              else{
                if(valeur3 == 1){}
                else{if(valeur4 == 1){}
                else{note+="<option value='1'><?php echo get_phrase('Matricule membre'); ?></option>";}}
              }
            }
          }
          
          if (valeur == 2) {}
          else{
            if(valeur1 == 2){}
            else{if(valeur2 == 2){}
            else{if(valeur3 == 2){}
            else{if(valeur4 == 2){}
            else{note+="<option value='2'><?php echo get_phrase('Nom et Prenom'); ?></option>";}}}}
          }

          if (valeur == 3) {}
          else{
            if(valeur1 == 3){}
            else{if(valeur2 == 3){}
            else{if(valeur3 == 3){}
            else{if(valeur4 == 3){}
            else{note+="<option value='3'><?php echo get_phrase('etude'); ?></option>";}}}}
          }

          if (valeur == 4) {}
          else{
            if(valeur1 == 4){}
            else{if(valeur2 == 4){}
            else{if(valeur3 == 4){}
            else{if(valeur4 == 4){}
            else{note+="<option value='4'><?php echo get_phrase('Diplome'); ?></option>";}}}}
          }

          if (valeur == 5) {}
          else{
            if(valeur1 == 5){}
            else{if(valeur2 == 5){}
            else{if(valeur3 == 5){}
            else{if(valeur4 == 5){}
            else{note+="<option value='5'><?php echo get_phrase('Fonction/metier'); ?></option>";}}}}
          }

          if (valeur == 6) {}
          else{
            if(valeur1 == 6){}
            else{if(valeur2 == 6){}
            else{if(valeur3 == 6){}
            else{if(valeur4 == 6){}
            else{note+="<option value='6'><?php echo get_phrase('Contact'); ?></option>";}}}}
          } 

          if (valeur == 7) {}
          else{
            if(valeur1 == 7){}
            else{if(valeur2 == 7){}
            else{if(valeur3 == 7){}
            else{if(valeur4 == 7){}
            else{note+="<option value='7'><?php echo get_phrase('Adresse'); ?></option>";}}}}
          }

          if (valeur == 8) {}
          else{
            if(valeur1 == 8){}
            else{if(valeur2 == 8){}
            else{if(valeur3 == 8){}
            else{if(valeur4 == 8){}
            else{note+="<option value='8'><?php echo get_phrase('date et lieu nais'); ?></option>";}}}}
          }

          if (valeur == 9) {}
          else{
            if(valeur1 == 9){}
            else{if(valeur2 == 9){}
            else{if(valeur3 == 9){}
            else{if(valeur4 == 9){}
            else{note+="<option value='9'><?php echo get_phrase('Nationalite'); ?></option>";}}}}
          }

          if (valeur == 10) {}
          else{
            if(valeur1 == 10){}
            else{if(valeur2 == 10){}
            else{if(valeur3 == 10){}
            else{if(valeur4 == 10){}
            else{note+="<option value='10'><?php echo get_phrase('Nom et Prenom pere'); ?><br/><?php echo get_phrase('Nom et Prenom mere'); ?></option>";}}}}
          } 
           
          
          
          document.getElementById("sel6").disabled=false;
        }
        document.getElementById("sel6").innerHTML=note;
        //fin select 2
        
      }
      
  </script>