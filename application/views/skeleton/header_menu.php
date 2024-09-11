
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white  sidebar-mini">
    <div class="container">
      <a href="<?php echo base_url(''); ?>" class="navbar-brand">
        <img src="<?php echo base_url('uploads/').''.$company_info['logo']?>" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li id="bigfamilyNav" class="nav-item">
            <a href="<?php echo site_url('my_big_family');?>" class="nav-link">
              <?php echo get_phrase("my_big_family",4); ?>
            </a>
          </li>
          <li id="littlefamilyNav" class="nav-item">
            <a href="<?php echo site_url('my_little_family');?>" class="nav-link">
              <?php echo get_phrase("my_little_family",4); ?>
            </a>
          </li>
          <li id="registerfamilymemberNav" class="nav-item">
            <a href="<?php echo site_url('register_a_family_member');?>" class="nav-link">
              <?php echo get_phrase("register_a_family_member",4); ?>
            </a>
          </li>
          <?php if($this->session->userdata('id')==1): ?>
            <li id="languageNav"  class="nav-item">
              <a href="<?php echo base_url('langues') ?>"  class="nav-link">
                  <?php echo get_phrase('langue'); ?>
              </a>
            </li>
          <?php endif; ?>
        </ul>

       
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
       
         <!-- profil Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-show dropdown-menu-right">
            <a href="<?php echo site_url('users/profile/');?>" class="dropdown-item" title="<?php echo get_phrase("Mon_profil",4); ?>">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="fas fa-user-plus"> </i>
                  <?php echo get_phrase("Mon_profil",4); ?>
                </h3>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('users/modifier_mdp');?>" class="dropdown-item" title="<?php echo get_phrase("update_password",4); ?>">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="fas fa-edit"> </i>
                  <?php echo get_phrase("update_password",4); ?>
                </h3>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" data-widget="fullscreen" role="button" title="<?php echo get_phrase("Agrandir_le_navigateur",4); ?>">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="fas fa-expand-arrows-alt"> </i>
                  <?php echo get_phrase("ecran",4); ?>
                </h3>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('auth/logout');?>" class="dropdown-item" title="<?php echo get_phrase("click_of_deconneted",4); ?>">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="fas fa-undo"> </i>
                  <?php echo get_phrase("deconneted",4); ?>
                </h3>
              </div>
            </a>

            
                
                
                

          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <?php 
        if ($page_title== "Listes languague") {
         
      ?>

  </section>
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?= get_phrase($lien,3); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('');?>"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home',3); ?></a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url();?>/Dashboard"><i class="fa fa-home"></i>&nbsp;<?php echo get_phrase('Dashboard',3); ?></a></li>
              <li class="breadcrumb-item active"><?= $icon; ?>&nbsp;<?= get_phrase($lien,3); ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <?php } ?>
    </div>
    <!-- /.content-header -->