<header class="main-header">
    <!-- Logo -->
    <?php $company_info = $this->model_company->getCompanyData(1); ?>
    <?php $compte_info = $this->model_users->getUserData($this->session->userdata('id')); ?>
    <a href="<?php echo base_url('') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php if($company_info['action_logo']==2){echo $company_info['pseudo'];} if($company_info['action_logo']==1){echo '<img src="'.site_url('./uploads').'/'.$company_info['logo_left'].'" class="user-image" alt="User Image" style="width: 3em;">';} ?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $company_info['company_name']?></b></span>
    </a>
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"><?php echo get_phrase('Toggle navigation'); ?></span>
      </a>
      <?php if ($this->session->userdata('id') == 1) {
      ?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <?php 
              if ($compte_info['photo'] =='') { 
                if ($compte_info['gender'] ==1) {
                  $imageuser = site_url('uploads/membres/avatar1.png');
                }
                if ($compte_info['gender'] ==2 || $compte_info['gender'] ==3){
                  $imageuser = site_url('uploads/membres/avatar2.png');
                }
                if ($compte_info['gender'] =='') {
                  $imageuser = site_url('uploads/membres/user2-160x1601.jpg');
                }
              } else { 
                $imageuser = site_url("uploads/membres").'/'.$compte_info['photo'];
              }
            ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=$imageuser;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo strtoupper($compte_info['firstname']); ?>&nbsp;<?php echo strtoupper($compte_info['lastname']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img class="profile-user-img img-responsive img-circle profileImgUrl" src="<?=$imageuser;?>" class="user-image" alt="User Image">
                <span class="hidden-xs">
                <?php  $compte_info_plus = $this->Personne_model->RecuperationDonnepersonnel($compte_info['id_info']); ?>
                <?php $com = array('num_adhe' =>  $compte_info['id']); $compte_info_plus2 = $this->Personne_model->recep_adherent($com); ?>

                <p style="font-size: 1.3em;color: #FFF;">
                    <small> <?php echo get_phrase('Membre depuis'); ?> <?php echo date('d/m/Y',$compte_info_plus['created_on']); ?></small><br/>
                    <small><?php echo get_phrase('and'); ?></small><br/>
                    <small><?php echo get_phrase('Adherent depuis'); ?> <?php echo date('d/m/Y',$compte_info_plus2['date_adh']); ?></small>
                </p>
              </li>
              <li class="user-body">
                <div class="row">
                  <?php $group_info = $this->model_users->getUserGroup($this->session->userdata('id')); if($group_info['group_name']=='Adérent'){?>
                    <div class="col-xs-12 text-center">
                      <a href="#"><?php echo get_phrase('membership'); ?></a>
                    </div>
                  <?php }else{ ?>
                    <div class="col-xs-6 text-center">
                      <a href="#"><?php echo get_phrase('membership'); ?></a>
                    </div>
                    <div class="col-xs-6 text-center">
                      <a href="#"><?php echo $group_info['group_name']; ?></a>
                    </div>
                  <?php } ?>
                  
                </div>
                <!-- /.row -->
              </li>
              <li class="user-footer">
                <div class="pull-left col-md-3">
                    <a href="<?php echo site_url('users/profile/');?>" class="btn btn-default btn-flat" title="Mon profil"><i class="fa fa-user"></i></a>
                </div>
                <div class="pull-left col-md-3">
                    <a href="<?php echo site_url('users/modifier_mdp');?>" class="btn btn-default btn-flat" title="Modifier son mot de passe"><i class="fa fa-wrench"></i></a>
                </div>
                <div class="pull-left col-md-3">
                    <a href="#"  class="btn btn-default btn-flat" title="Agrandir le navigateur"><i class="glyphicon glyphicon-fullscreen"></i></a>
                </div>
                <div class="pull-right col-md-3">
                    <a href="<?php echo site_url('auth/logout');?>" class="btn btn-default btn-flat" title="Déconnexion"><i class="fa fa-sign-out"></i></a>
                </div>
              </li>
            </ul>
          </li>
          <?php if ($this->session->userdata('id')==1 || $this->session->userdata('id')==9) {?>
              <!-- Control Sidebar Toggle Button -->
              <li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
          <?php }?>
        </ul>
      </div>
      <?php
      } ?>
    </nav>
</header>

  <!-- Left side column. contains the logo and sidebar -->
  <ul class="dropdown-menu">
                                   
                            
    <!-- Menu Footer-->
    <li class="user-footer">
        <div class="pull-left col-md-3">
            <a href="<?php echo site_url('Adminstration~gm2019/parametres_compte/profil');?>" class="btn btn-default btn-flat" title="Mon profil"><i class="fa fa-user"></i></a>
        </div>
        <div class="pull-left col-md-3">
            <a href="<?php echo site_url('Adminstration~gm2019/parametres_compte/modifier_mdp');?>" class="btn btn-default btn-flat" title="<?php echo get_phrase('Modifier son mot de passe'); ?>"><i class="fa fa-wrench"></i></a>
        </div>
        <div class="pull-left col-md-3">
            <a href="#" class="btn btn-default btn-flat" title="<?php echo get_phrase('Agrandir le navigateur'); ?>"><i class="glyphicon glyphicon-fullscreen"></i></a>
        </div>
        <div class="pull-right col-md-3">
            <a href="<?php echo site_url('Adminstration~gm2019/deconnexion');?>" class="btn btn-default btn-flat" title="<?php echo get_phrase('sign out'); ?>"><i class="fa fa-sign-out"></i></a>
        </div>
    </li>
  </ul>