
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
          <li id="bigfamilyNav" class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo get_phrase("my_big_family",3); ?>
            </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li>
                <a href="<?php echo site_url('my_big_family/list');?>" id="bigfamilyList" class="dropdown-item">
                  <?php echo get_phrase("view_list",3); ?>
                </a>
              </li>
              <li>
                <a href="<?php echo site_url('my_big_family/tree');?>" id="bigfamilyTree" class="dropdown-item" >
                  <?php echo get_phrase("the_tree",3); ?>
                </a>
              </li>
            </ul>
          </li>
          <li id="littlefamilyNav" class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo get_phrase("my_little_family",3); ?>
            </a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li>
                <a href="<?php echo site_url('my_little_family/list');?>" id="littlefamilyList" class="dropdown-item">
                  <?php echo get_phrase("view_list",3); ?>
                </a>
              </li>
              <li>
                <a href="<?php echo site_url('my_little_family/tree');?>" id="littlefamilyTree" class="dropdown-item">
                  <?php echo get_phrase("the_tree",3); ?>
                </a>
              </li>
            </ul>
          </li>
          <li id="dropdownSubMenu1" class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo get_phrase("register_a_family_member",4); ?></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-add-parents"><?php echo get_phrase("add_parents",4); ?></a></li>
              <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-add-brothers"><?php echo get_phrase("add_sister_or_brother",4); ?></a></li>
              <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-add-spouse"><?php echo get_phrase("Add_a_spouse",4); ?> </a></li>
              <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-add-son"><?php echo get_phrase("Add_a_son",4); ?></a></li>
              <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-add-girl"><?php echo get_phrase("Add_a_girl",4); ?></a></li>
              <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-add-other-person"><?php echo get_phrase("other_person",4); ?></a></li>
            </ul>
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
      

  </section>
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?= get_phrase($lien,3); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url();?>/Dashboard"><i class="fa fa-home"></i>&nbsp;<?php echo get_phrase('Dashboard',3); ?></a></li>
              <li class="breadcrumb-item active"><?= $icon; ?>&nbsp;<?= get_phrase($lien,3); ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->