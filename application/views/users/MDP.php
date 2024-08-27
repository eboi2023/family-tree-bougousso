<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $titre; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url();?>"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
            <li><a href="<?php echo site_url();?>/Dashboard"><i class="fa fa-home"></i>&nbsp;<?php echo get_phrase('Dashboard'); ?></a></li>
            <li class="active"><?= $icon; ?> &nbsp;<?= get_phrase($lien); ?></li>
        </ol>
    </section>
    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">

        <div class="row">
            
            <div class="col-md-12">
                <div class="nav-tabs-custom" id="element_overlap1">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab"><?php echo get_phrase('Changer votre mot de passe'); ?></a></li>
                    </ul>
                    <div class="tab-content">
                        
                        <div class="active tab-pane" id="settings">
                           <?php
                               if($this->session->flashdata('message') !== null){
                                   echo '<div class="alert alert-danger" role="alert">Erreur: ' .$this->session->flashdata('message').'</div>';
                               }
                               elseif($this->session->flashdata('message-bon') !== null){
                                   echo '<div class="alert alert-success" role="alert">' .$this->session->flashdata('message-bon').'</div>';
                               }  
                               
                            
                            echo form_open('',array('class' => 'form-horizontal UpdateDetails'));?>
                                <div class="form-group">
                                    <label for="apassword" class="col-sm-3 control-label"><?php echo get_phrase('Ancien password'); ?></label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required name="apassword" id="apassword" placeholder="<?php echo get_phrase('Enter ancien mot de passe'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label"><?php echo get_phrase('New Password'); ?></label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required name="password" id="password" placeholder="<?php echo get_phrase('enter New Password'); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="cpassword" required class="col-sm-3 control-label"><?php echo get_phrase('Confirm password'); ?></label>

                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required name="cpassword" id="cpassword" placeholder="<?php echo get_phrase('Confirm password'); ?>">
                                    </div>
                                </div>

                              
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">

                                        <button type="submit" name="modifier-mdp" class="btn bg-green ChangePassword"><?php echo get_phrase('Updated'); ?></button>
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
<script type="text/javascript">
    $(document).ready(function() {
      $("#Menumdp").addClass('active');
    }); 
</script>