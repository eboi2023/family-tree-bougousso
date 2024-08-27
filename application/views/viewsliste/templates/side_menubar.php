<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
      
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header" style="font-size: 1.1em"><?php echo get_phrase('GENERAL MENU'); ?> </li>
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-home"></i> <span><?php echo get_phrase('Dashboard'); ?></span>
          </a>
        </li>
        <?php if($user_permission): ?>

          <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission) || in_array('updateMembers', $user_permission) || in_array('viewMembers', $user_permission) || in_array('deleteMembers', $user_permission) || in_array('viewAccessory', $user_permission) || in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
              
              <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                <li id="Menuemploie">
                    <a href="<?php echo site_url('groups');?>">
                      <i class="fa fa-code-fork"></i>
                      <span>
                        <?php echo get_phrase('Personal post'); ?>
                      </span>
                    </a>
                </li>
              <?php endif; ?>

              <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                  <li id="manageUserNav">
                    <a href="<?php echo base_url('users') ?>">
                      <i class="fa fa-apple"></i> 
                      <span>
                        <?php echo get_phrase('Personal'); ?>
                      </span>
                    </a>
                  </li>
                <?php endif; ?>
          <?php endif; ?>

         

          <?php if(in_array('viewCalcul', $user_permission) || in_array('createCaisse', $user_permission) || in_array('updateCaisse', $user_permission) || in_array('viewCaisse', $user_permission) || in_array('deleteCaisse', $user_permission)  || in_array('viewAccessory', $user_permission)): ?> 

            <li class="header"><?php echo get_phrase('ACCOUTING'); ?> </li>

              <?php if(in_array('viewCalcul', $user_permission)): ?>
                <li id="MenuCalcul">
                    <a href="#" onclick="pages()" type="button" data-toggle="modal" data-target="#modal-calculatrice">
                      <i class="fa fa-calculator"></i>
                      <span>
                        <?php echo get_phrase('Calculatrice'); ?>
                      </span>
                    </a>
                </li>
              <?php endif; ?>

              <?php if(in_array('createCaisse', $user_permission) || in_array('updateCaisse', $user_permission) || in_array('viewCaisse', $user_permission) || in_array('deleteCaisse', $user_permission)): ?>
                <li id="Menucompteur">
                    <a href="<?php echo base_url('Domino/') ?>">
                      <i class="fa fa-line-chart"></i>
                      <span>
                        <?php echo get_phrase('Compteur'); ?>
                      </span>
                    </a>
                </li>
              <?php endif; ?>

              <?php if(in_array('createCaisse', $user_permission) || in_array('updateCaisse', $user_permission) || in_array('viewCaisse', $user_permission) || in_array('deleteCaisse', $user_permission)): ?>
                <li id="CaisseNav">
                  <a href="<?php echo base_url('Caisses/') ?>">
                    <i class="fa fa-dollar"></i> <span><?php echo get_phrase('Cashier movement'); ?></span>
                  </a>
                </li>
              <?php endif; ?>

          <?php endif; ?>

          <?php if(in_array('updateCompany', $user_permission) || in_array('updateCode_Modification_company', $user_permission) || in_array('updateCode_Modification_Bureau', $user_permission) || in_array('updateCode_Modification_repport', $user_permission) || in_array('updateCode_Modification_checkout', $user_permission) || in_array('updateCode_Modification_member', $user_permission)): ?>
            <li class="header"><?php echo get_phrase('COMPANY SETTINGS'); ?> </li>

              <?php if(in_array('updateCompany', $user_permission)): ?>
                <li id="companyNav">
                  <a href="<?php echo base_url('company/') ?>">
                    <i class="fa fa-files-o"></i>
                    <span>
                      <?php echo get_phrase('Business parameter'); ?>
                    </span>
                  </a>
                </li>
              <?php endif; ?>

              <?php if($this->session->userdata('id')==1): ?>
                <li id="languageNav">
                  <a href="<?php echo base_url('Langue/') ?>">
                    <i class="fa fa-bomb"></i>
                    <span>
                      <?php echo get_phrase('langue'); ?>
                    </span>
                  </a>
                </li>
              <?php endif; ?>

              <?php if(in_array('updateCode_Modification_company', $user_permission) || in_array('updateCode_Modification_Bureau', $user_permission) || in_array('updateCode_Modification_repport', $user_permission) || in_array('updateCode_Modification_checkout', $user_permission) || in_array('updateCode_Modification_member', $user_permission)): ?>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-expeditedssl"></i> 
                    <span>
                      <?php echo get_phrase('Code_Modification'); ?>
                    </span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <?php if(in_array('updateCode_Modification_company', $user_permission)): ?>
                      <li id="modif1">
                        <a href="#" data-toggle="modal" data-target="#modal-code-modif" onclick="code_modif_acces('Entreprise')" >
                          <i class="fa fa-connectdevelop"></i> 
                          <span>
                            <?php echo get_phrase('company'); ?>
                          </span>
                        </a>
                      </li>
                    <?php endif; ?>
                    
                    <?php if(in_array('updateCode_Modification_Bureau', $user_permission)): ?>
                      <li id="modif1">
                        <a href="#" data-toggle="modal" data-target="#modal-code-modif" onclick="code_modif_acces('Bureau')" >
                          <i class="fa fa-connectdevelop"></i> 
                          <span>
                            <?php echo get_phrase('Bureau'); ?>
                          </span>
                        </a>
                      </li>
                    <?php endif; ?>
                    
                    <?php if(in_array('updateCode_Modification_repport', $user_permission)): ?>
                      <li id="modif1">
                        <a href="#" data-toggle="modal" data-target="#modal-code-modif" onclick="code_modif_acces('Rapport')" >
                          <i class="fa fa-connectdevelop"></i> 
                          <span>
                            <?php echo get_phrase('Repport'); ?>
                          </span>
                        </a>
                      </li>
                    <?php endif; ?>

                    <?php if(in_array('validateRepport', $user_permission)): ?>
                      <li id="modif1">
                        <a href="#" data-toggle="modal" data-target="#modal-code-modif" onclick="code_modif_acces('valideRapport')" >
                          <i class="fa fa-connectdevelop"></i> 
                          <span>
                            <?php echo get_phrase('valide Repport'); ?>
                          </span>
                        </a>
                      </li>
                    <?php endif; ?>
                    
                    <?php if(in_array('updateCode_Modification_checkout', $user_permission)): ?>
                      <li id="modif1">
                        <a href="#" data-toggle="modal" data-target="#modal-code-modif" onclick="code_modif_acces('Caisse')" >
                          <i class="fa fa-connectdevelop"></i> 
                          <span>
                            <?php echo get_phrase('Caisse'); ?>
                          </span>
                        </a>
                      </li>
                    <?php endif; ?>
                    
                    <?php if(in_array('updateCode_Modification_member', $user_permission)): ?>
                      <li id="modif5">
                        <a href="#" data-toggle="modal" data-target="#modal-code-modif" onclick="code_modif_acces('Membre')" >
                          <i class="fa fa-connectdevelop"></i> 
                          <span>
                            <?php echo get_phrase('member'); ?>
                          </span>
                        </a>
                      </li>
                    <?php endif; ?>
                    <?php if(in_array('updateCode_Modification_poste', $user_permission)): ?>
                      <li id="modif5">
                        <a href="#" data-toggle="modal" data-target="#modal-code-modif" onclick="code_modif_acces('Post')" >
                          <i class="fa fa-connectdevelop"></i> 
                          <span>
                            <?php echo get_phrase('Job'); ?>
                          </span>
                        </a>
                      </li>
                    <?php endif; ?>
                    <?php if(in_array('updateCode_Modification_Evenement', $user_permission)): ?>
                      <li id="modif5">
                        <a href="#" data-toggle="modal" data-target="#modal-code-modif" onclick="code_modif_acces('Evenement')" >
                          <i class="fa fa-connectdevelop"></i> 
                          <span>
                            <?php echo get_phrase('evenement'); ?>
                          </span>
                        </a>
                      </li>
                    <?php endif; ?>
                  </ul>
                </li>
              <?php endif; ?>
          <?php endif; ?>

          

        <?php endif; ?>
      <!-- user permission info -->
      <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span><?php echo get_phrase('Logout'); ?></span></a></li>

    </ul>
  </section>
    <!-- /.sidebar -->
</aside>