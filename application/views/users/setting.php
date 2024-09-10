

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo get_phrase('User'); ?>
        <small><?php echo get_phrase('Setting'); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
        <li class="active"><?php echo get_phrase('Setting'); ?></li>
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
          <?php 
            $attributes = array("class" => "",
                                "role" => "form",
                                "id" => "dq",
                                "name" => "");
            echo form_open("Users/setting", $attributes);
          ?>
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
                              if (($t1['id']==$user_data['id_pays']) and ($t2['id']==$user_data['id_ville']) and ($t3['id']==$user_data['id_zone'])) {
                               $position=$t1['nom_fr'].', '.$t2['nom_fr'].', '.$t3['nom_fr'];
                              }
                              $listposition.='<option value="'.$t1['nom_fr'].', '.$t2['nom_fr'].', '.$t3['nom_fr'].'"></option>';?>
                          <?php endif; ?>
                        <?php endforeach ?>
                      <?php endif; ?>  
                    <?php endif; ?>
                  <?php endforeach ?>
                <?php endif; ?>
              <?php endforeach ?>
            <?php endif; ?>
            <div class="col-sm-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo get_phrase('Update Information'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                  <?php echo validation_errors(); ?>

                  <div class="form-group col-sm-4">
                    <label for="username"><?php echo get_phrase('Username'); ?></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo get_phrase('Username'); ?>" value="<?php echo $user_data['username'] ?>" autocomplete="off">
                  </div>

                  <div class="form-group col-sm-4">
                    <label for="lname"><?php echo get_phrase('Last name'); ?></label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="<?php echo get_phrase('Last name'); ?>" value="<?php echo $user_data['lastname'] ?>" autocomplete="off">
                  </div>

                  <div class="form-group col-sm-4">
                    <label for="fname"><?php echo get_phrase('First name'); ?></label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo get_phrase('First name'); ?>" value="<?php echo $user_data['firstname'] ?>" autocomplete="off">
                  </div>  

                  <div class="form-group">
                    <label for="gender"><?php echo get_phrase('Gender'); ?></label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="gender" id="male" value="1" <?php if($user_data['gender'] == 1) {
                          echo "checked";
                        } ?>>
                        <?php echo get_phrase('Male'); ?>
                      </label>
                      <label>
                        <input type="radio" name="gender" id="female" value="2" <?php if($user_data['gender'] == 2) {
                          echo "checked";
                        } ?>>
                        <?php echo get_phrase('Female'); ?>
                      </label>
                    </div>
                  </div>     
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-sm-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo get_phrase('Update contact'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                    <label for="email"><?php echo get_phrase('Email'); ?></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo get_phrase('Email'); ?>" value="<?php echo $user_data['email'] ?>" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="phone"><?php echo get_phrase('Phone'); ?></label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo get_phrase('Phone'); ?>" value="<?php echo $user_data['phone'] ?>" autocomplete="off">
                  </div>
                        
                  <div class="form-group">
                    <label for="localization"><?php echo get_phrase('localization'); ?> <?php echo get_phrase('in'); ?> <?php echo get_phrase('french'); ?></label>
                    <input type="text" class="form-control" id="localization" name="localization" value="<?php echo $position ?>" placeholder="<?php echo get_phrase('country'); ?>,<?php echo get_phrase('city'); ?>,<?php echo get_phrase('street or neighborhood'); ?>" autocomplete="off" list="listelocalization" >
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
              <div class="box col-sm-6">
                <div class="box-header">
                  <h3 class="box-title"><?php echo get_phrase('Update password'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                    <div class="alert alert-info alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo get_phrase('Leave the password field empty if you don\'t want to change.'); ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cpassword"><?php echo get_phrase('Ancien password'); ?></label>
                    <input type="password" class="form-control" id="apassword" name="apassword" placeholder="Ancien Password" autocomplete="off" >
                  </div>

                  <div class="form-group">
                    <label for="password"><?php echo get_phrase('Niew Password'); ?></label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Niew Password" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label for="cpassword"><?php echo get_phrase('Confirm password'); ?></label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off" >
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <div class="col-sm-12">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><?php echo get_phrase('Save Changes'); ?></button>
                <a href="<?php echo base_url('users/') ?>" class="btn btn-warning "><?php echo get_phrase('Back'); ?></a>
              </div>
            </div>
          <?php echo form_close(); ?>
        </div>
       
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->

<?php 
  $passs="<datalist id='listevilles' ><option value='f1'>f1</option><option value='f2'>f2</option><option value='f3'>f3</option>";
  ?>
                          
                      <?php $passs.="</datalist> ";?>

 <script type="text/javascript">
  
  $(document).ready(function() {

    $("#description").wysihtml5();

    $("#settingcreate").addClass('active');
    
    
    

  });

  function SelectCountry(){ 
    var fff=document.getElementById("listecity");
    if (document.getElementById('country').options[document.getElementById('country').selectedIndex].value=='') {
    } 
    else {
      /*idval=document.getElementById('country').options[document.getElementById('country').selectedIndex].value;*/
      
      /*fff.innerHTML+="<?php echo $passs; ?>";*/
      
      

      
    }
  }

  function texe(){ 
var mycars = new Array();
  mycars[0]=('Herr',1);
  mycars[1]=('Frau',2);

  var options = '';

  for(var i = 0; i < mycars.length; i++)
    options += '<option value="'+mycars[i]+'" />';

  document.getElementById('listevilles').innerHTML = options;
}
  
</script>