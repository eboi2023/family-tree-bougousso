
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
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
          <li class="nav-item">
            <a href="index3.html" class="nav-link">my big family</a>
          </li>
          <li class="nav-item">
            <a href="index3.html" class="nav-link">my little family</a>
          </li>
          <li class="nav-item">
            <a href="index3.html" class="nav-link">the family</a>
          </li>
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
            <a href="<?php echo site_url('users/profile/');?>" class="dropdown-item" title="Mon profil">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="fas fa-user-plus"> </i>
                  profil
                </h3>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('users/modifier_mdp');?>" class="dropdown-item" title="Modifier son mot de passe">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="fas fa-edit"> </i>
                  MDP
                </h3>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" data-widget="fullscreen" role="button" title="Agrandir le navigateur">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="fas fa-expand-arrows-alt"> </i>
                  ecran
                </h3>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo site_url('auth/logout');?>" class="dropdown-item" title="Déconnexion">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <i class="fas fa-undo"> </i>
                  deconnection
                </h3>
              </div>
            </a>



                
                
                

          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->