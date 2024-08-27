

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo get_phrase('Manage'); ?>
        <small><?php echo get_phrase('Users'); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
        <li class="active"><?php echo get_phrase('Users'); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
          <?php $listposition='';$position='';?>
          <?php if($list_country): ?> 
            <?php foreach ($list_country as $t1): ?>
              
              <?php if($list_city): ?> 
                <?php foreach ($list_city as $t2): ?>
                  
                  <?php if ($t1['id']==$t2['id_pays']): ?>
                    <?php if($list_street_or_neighborhood): ?>
                      <?php foreach ($list_street_or_neighborhood as $t3): ?>
                        
                        <?php if ($t2['id']==$t3['id_ville']): ?>
                          <?php
                            $listposition.='<option value="'.$t1['nom_fr'].', '.$t2['nom_fr'].', '.$t3['nom_fr'].'"></option>';?>
                        <?php endif; ?>
                      <?php endforeach ?>
                    <?php endif; ?>  
                  <?php endif; ?>
                <?php endforeach ?>
              <?php endif; ?>
            <?php endforeach ?>
          <?php endif; ?>
          <?php 
            $attributes = array("class" => "",
                                "role" => "form",
                                "id" => "",
                                "name" => "");
            echo form_open("Users/create", $attributes);
          ?>
            <div class="col-sm-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo get_phrase('Add User'); ?></h3>
                </div>
                <div class="box-body">
                  <?php echo validation_errors(); ?>
                  <div class="form-group">
                    <label for="groups"><?php echo get_phrase('Groups'); ?></label>
                    <select class="form-control select_group" id="groups" name="groups">
                      <option value=""><?php echo get_phrase('Select Groups'); ?></option>
                      <?php foreach ($group_data as $k => $v): ?>
                        <option value="<?php echo $v['id'] ?>"><?php echo $v['group_name'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group col-sm-4">
                    <label for="username"><?php echo get_phrase('Username'); ?></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo get_phrase('Username'); ?>" autocomplete="off">
                  </div>

                  <div class="form-group col-sm-4">
                    <label for="fname"><?php echo get_phrase('First name'); ?></label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo get_phrase('First name'); ?>" autocomplete="off">
                  </div>

                  <div class="form-group col-sm-4">
                    <label for="lname"><?php echo get_phrase('Last name'); ?></label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="<?php echo get_phrase('Last name'); ?>" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="gender"><?php echo get_phrase('Gender'); ?></label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="gender" id="male" value="1">
                        <?php echo get_phrase('Male'); ?>
                      </label>
                      <label>
                        <input type="radio" name="gender" id="female" value="2">
                        <?php echo get_phrase('Female'); ?>
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box-body -->
            </div>

            <div class="col-sm-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo get_phrase('Contact'); ?></h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <label for="email"><?php echo get_phrase('Email'); ?></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo get_phrase('Email'); ?>" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="phone"><?php echo get_phrase('Phone'); ?></label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo get_phrase('Phone'); ?>" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="localization"><?php echo get_phrase('localization'); ?> <?php echo get_phrase('in'); ?> <?php echo get_phrase('french'); ?></label>
                    <input type="text" class="form-control" id="localization" name="localization"  autocomplete="off" list="listelocalization" >
                    <datalist id='listelocalization' style="background: red">
                      <?php echo $listposition;?>
                    </datalist>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-sm-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo get_phrase('Password'); ?></h3>
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <label for="password"><?php echo get_phrase('Password'); ?></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo get_phrase('Password'); ?>" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="cpassword"><?php echo get_phrase('Confirm password'); ?></label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="<?php echo get_phrase('Confirm password'); ?>" autocomplete="off">
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <div class="col-sm-6">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-left"><?php echo get_phrase('Save'); ?></button>
                <button type="reset" class="btn btn-default pull-right"><?php echo get_phrase('restore'); ?></button>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {

    $("#mainUserNav").addClass('active');
    $("#createUserNav").addClass('active');
    $(".select_group").select2();
  });
</script>
