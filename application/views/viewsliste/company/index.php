

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo get_phrase('Manage'); ?>
        <small><?= get_phrase($lien); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('');?>"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
        <li><a href="<?php echo site_url();?>/Dashboard"><i class="fa fa-home"></i>&nbsp;<?php echo get_phrase('Dashboard'); ?></a></li>
        <li class="active"><?= $icon; ?>&nbsp;<?= get_phrase($lien); ?></li>
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
          <?php elseif($this->session->flashdata('errors')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <?php 
              $attributes = array("class" => "",
                                  "role" => "form",
                                  "id" => "",
                                  "name" => "");
              echo form_open_multipart("company", $attributes);
            ?>
              <div class="box-header">
                <h3 class="box-title"><?php echo get_phrase('Manage Company Information'); ?></h3>
                <button type="submit" class="btn btn-primary pull-right"><?php echo get_phrase('Save Changes'); ?></button>
              </div>

              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="company_name"><?php echo get_phrase('Company Name'); ?></label>
                  <input type="text" class="form-control" id="company_name" name="company_name" placeholder="<?php echo get_phrase('Enter company name'); ?>" value="<?php echo $company_data['company_name'] ?>" autocomplete="off">
                </div>

                <div class="form-group col-md-2 col-xs-12">
                  <select name="symbole" class="form-control">
                    <option value="1" <?php if ($company_data['action_logo']==1) {echo 'selected="selected"';} ?>>logo</option>
                    <option <?php if ($company_data['action_logo']==2) {echo 'selected="selected"';} ?>value="2">Nom abrège</option>
                  </select>
                </div>
                <div class="form-group col-md-5 col-xs-12">
                  <input type="text" class="form-control" id="company_pseudo" name="company_pseudo" placeholder="<?php echo get_phrase('Enter company user'); ?>" value="<?php echo $company_data['pseudo'] ?>"  title="<?php echo get_phrase('Enter company pseudo user'); ?>" autocomplete="off">
                </div>

                <div class="form-group col-md-5 col-xs-12">
                  <input type="hidden" name="img1" value="<?php echo $company_data['logo_left'] ?>">
                  <div class="btn btn-default btn-file" >
                    <i class="fa fa-paperclip"></i> <b id="logo_left"><?php echo get_phrase('insert by image'); ?></b>

                     <?php 
                        $image = array(
                                'name'        => 'getlogo',
                                'id'          => 'getlogo',
                                'onchange'     => "vuezip('getlogo', 'logo_left', 2000, 2000)"
                        );
                    ?>
                    <?php echo form_upload($image);?>
                  </div>
                </div>

                <div class="form-group col-md-6 col-xs-12">
                  <label for="getimage1"><?php echo get_phrase('insert by ico'); ?></label>
                  <input type="hidden" name="ico" value="<?php echo $company_data['company_icon'] ?>">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> <b id="logo_ico"><?php echo get_phrase('Attachment'); ?></b>
                     <?php 
                        $image = array(
                                'name'        => 'getimage1',
                                'id'          => 'getimage1',
                                'onchange'     => "vuezip('getimage1', 'logo_ico', 6400, 6400)"
                        );
                    ?>
                    <?php echo form_upload($image);?>
                  </div>
                  <p class="help-block">En ICO Max. 20MB</p>
                </div>

                <div class="form-group col-md-6 col-xs-12">
                  <label for="getimage2"><?php echo get_phrase('insert by ico'); ?>2</label>
                  <input type="hidden" name="logo_ico" value="<?php echo $company_data['logo'] ?>">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> <b id="logo_icopng"><?php echo get_phrase('Attachment'); ?></b>
                     <?php 
                        $image3 = array(
                                'name'        => 'getimage2',
                                'id'          => 'getimage2',
                                'onchange'     => "vuezip('getimage2', 'logo_icopng', 1064, 1064)"
                        );
                    ?>
                    <?php echo form_upload($image3);?>
                  </div>
                  <p class="help-block">En png Max. 32MB</p>
                </div>
                
                <div class="form-group">
                  <label for="address"><?php echo get_phrase('Address Post'); ?></label>
                  <input type="text" class="form-control" id="address_poste" name="address_poste" placeholder="<?php echo get_phrase('Enter address poste'); ?>" value="<?php echo $company_data['company_poste'] ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="phone"><?php echo get_phrase('Email'); ?></label>
                  <input type="email" class="form-control" id="mail" name="mail" placeholder="<?php echo get_phrase('Enter mail'); ?>" value="<?php echo $company_data['company_mail'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="phone"><?php echo get_phrase('Phone'); ?></label>
                  <input type="text" required class="form-control" id="phone" name="phone" placeholder="<?php echo get_phrase('Enter phone'); ?>" value="<?php echo $company_data['phone'] ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="country"><?php echo get_phrase('Country'); ?></label>
                  <input type="text" class="form-control" id="country" name="country" placeholder="<?php echo get_phrase('Enter country'); ?>" value="<?php echo $company_data['country'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="address"><?php echo get_phrase('Localization'); ?></label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="<?php echo get_phrase('Enter address'); ?>" value="<?php echo $company_data['address'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="currency"><?php echo get_phrase('Currency'); ?></label>
                  <?php ?>
                  <select class="form-control" id="currency" name="currency">
                    <option value="">~~SELECT~~</option>

                    <?php foreach ($currency_symbols as $k => $v): ?>
                      <option value="<?php echo trim($k); ?>" <?php if($company_data['currency'] == $k) {
                        echo "selected";
                      } ?>><?php echo $k ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="writen"><?php echo get_phrase('Writen'); ?></label>
                  <?php ?>
                  <select class="form-control" id="writen" name="writen" required>
                    <option value="">~~WRITEN~~</option>
                    <option <?php if($company_data['writen']=="P"){echo "selected"; }?> value="P"><?php echo $v;?> 100 </option>
                    <option <?php if($company_data['writen']=="N"){echo "selected"; }?> value="N">100 <?php echo $v;?></option>

                  </select>
                </div>

                <div class="form-group">
                  <label for="description"><?php echo get_phrase('Description of the company for'); ?></label>
                  <textarea class="form-control" id="description" name="description"><?php echo $company_data['description_company'] ?></textarea>
                </div>
                
                <label class="form-label"><?php echo get_phrase('Model template of the company for'); ?></label>
                <div class="form-group" style="background: black">
                  
                  <ul class="list-unstyled clearfix">
                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin1')">
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('blue-black'); ?>
                        <input type="radio" name="template" <?php if ($company_data['template']=='skin-blue') {echo "checked='true'";} ?> value="skin-blue" id="blue-black">
                      </p>
                      <a id="skin-blue-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-blue') {}else{echo "full-opacity-hover";} ?>">
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span>
                          <span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7em; background: #222d32"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin2')">
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('white-black'); ?>
                        <input type="radio" name="template" value="skin-black" id="white-black"<?php if ($company_data['template']=='skin-black') {echo "checked='true'";} ?> >
                      </p>
                      <a id="skin-white-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-black') {}else{echo "full-opacity-hover";} ?>">
                        <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                          <span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span>
                          <span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span>
                        </div>
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7em; background: #222"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin3')">
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('purple-black'); ?>
                        <input type="radio" name="template"  <?php if ($company_data['template']=='skin-purple') {echo "checked='true'";} ?> value="skin-purple" id="purple-black">
                      </p>
                      <a style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-purple') {}else{echo "full-opacity-hover";} ?>"id="skin-purple-black" >
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span>
                          <span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7em; background: #222d32"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin4')">
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('green-black'); ?>
                        <input type="radio" name="template"   <?php if ($company_data['template']=='skin-green') {echo "checked='true'";} ?> value="skin-green" id="green-black">
                      </p>
                      <a style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-green') {}else{echo "full-opacity-hover";} ?>" id="skin-green-black">
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span>
                          <span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                          <div>
                            <span style="display:block; width: 20%; float: left; height: 7em; background: #222d32"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin5')">
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('red-black'); ?>
                        <input type="radio" name="template" <?php if ($company_data['template']=='skin-red') {echo "checked='true'";} ?> value="skin-red" id="red-black">
                      </p>
                      <a style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-red') {}else{echo "full-opacity-hover";} ?>" id="skin-red-black">
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span>
                          <span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                          <div>
                            <span style="display:block; width: 20%; float: left; height: 7em; background: #222d32"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin6')">
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('yellow-black'); ?>
                        <input type="radio" name="template" <?php if ($company_data['template']=='skin-yellow') {echo "checked='true'";} ?> value="skin-yellow" id="yellow-black">
                      </p>
                      <a style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-yellow') {}else{echo "full-opacity-hover";} ?>" id="skin-yellow-black">
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span>
                          <span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                          <div>
                            <span style="display:block; width: 20%; float: left; height: 7em; background: #222d32"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin7')">
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('blue-light'); ?>
                        <input type="radio" name="template" value="skin-blue-light" <?php if ($company_data['template']=='skin-blue-light') {echo "checked='true'";} ?> id="blue-light">
                      </p>
                      <a style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-blue-light') {}else{echo "full-opacity-hover";} ?>" id="skin-blue-light">
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span>
                          <span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7em; background: #f9fafc"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                        
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin8')">
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('white-light'); ?>
                        <input type="radio" name="template" value="skin-white-light" <?php if ($company_data['template']=='skin-white-light') {echo "checked='true'";} ?> id="white-light">
                      </p>
                      <a style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-white-light') {}else{echo "full-opacity-hover";} ?>" id="skin-white-light">
                        <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span></div>
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7em; background: #f9fafc"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                        
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin9')">
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('purple-light'); ?>
                        <input type="radio" name="template" value="skin-purple-light" <?php if ($company_data['template']=='skin-purple-light') {echo "checked='true'";} ?> id="purple-light">
                      </p>
                      <a style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-purple-light') {}else{echo "full-opacity-hover";} ?>" id="skin-purple-light">
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span>
                          <span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7em; background: #f9fafc"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                        
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin10')" >
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('green-light'); ?>
                        <input type="radio" name="template" value="skin-green-light" id="green-light" <?php if ($company_data['template']=='skin-green-light') {echo "checked='true'";} ?>>
                      </p>
                      <a style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-green-light') {}else{echo "full-opacity-hover";} ?>" id="skin-green-light">
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span>
                          <span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7em; background: #f9fafc"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                        
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin11')" >
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('red-light'); ?>
                        <input type="radio" name="template" value="skin-red-light" id="red-light" <?php if ($company_data['template']=='skin-red-light') {echo "checked='true'";} ?>>
                      </p>
                      <a style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-red-light') {}else{echo "full-opacity-hover";} ?>" id="skin-red-light">
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span>
                          <span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7em; background: #f9fafc"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                        
                      </a>
                    </li>

                    <li class=" col-md-4 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive('skin12')" >
                      <p class="text-center no-margin" style="text-align: center;color: #fff"><?php echo get_phrase('yellow-light'); ?>
                        <input type="radio" name="template" value="skin-yellow-light" id="yellow-light" <?php if ($company_data['template']=='skin-yellow-light') {echo "checked='true'";} ?>>
                      </p>
                      <a id="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix <?php if ($company_data['template']=='skin-yellow-light') {}else{echo "full-opacity-hover";} ?>">
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span>
                          <span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                          <span style="display:block; width: 20%; float: left; height: 7em; background: #f9fafc"></span>
                          <span style="display:block; width: 80%; float: left; height: 7em; background: #f4f5f7"></span>
                        </div>
                        
                      </a>
                    </li>
                  </ul>
                </div>

                <label><?php echo get_phrase('style template of the company for'); ?></label>
                <div class="form-group" style="background: black">
                  <ul class="list-unstyled clearfix">
                    <li class=" col-md-6 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive1('mode1')">
                      <input type="radio" id="mod1" name="model" value="1"  <?php if ($company_data['model_template']==1) {echo "checked='true'";} ?>>
                      <img id="moded1" src="<?php echo site_url('uploads/model_template/');?>model1.png" style="box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="col-md-12 clearfix <?php if ($company_data['model_template']==1) {}else{echo "full-opacity-hover";} ?>">
                    </li>
                    <li class=" col-md-6 col-xs-12" style="float:left; padding: 5px;" onclick="slectionactive1('mode0')">
                      <input type="radio" id="mod0" name="model" value="0" <?php if ($company_data['model_template']==0) {echo "checked='true'";} ?>>
                      <img id="moded0" src="<?php echo site_url('uploads/model_template/');?>model2.png" style="box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="col-md-12 clearfix <?php if ($company_data['model_template']==0) {}else{echo "full-opacity-hover";} ?>">
                    </li>
                    
                  </ul>
                </div>

                <div class="form-group">
                  <label for="code_confirm"><?php echo get_phrase('Code de validation'); ?></label>
                  <div class="form-group col-md-12">
                    <input type="password" class="form-control" name="verifcationcode" title="pour la verification de votre identité" placeholder="<?php echo get_phrase('Entrer le code de validation'); ?>" required >
                  </div>
                  <input type="hidden" name="codeverifinconf" value="Entreprise">
                </div>

                
                
                
                
                
                
                
                
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php echo get_phrase('Save Changes'); ?></button>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box -->
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
    $("#companyNav").addClass('active');
    $("#message").wysihtml5();
    $("#message2").wysihtml5();
  });

  function verifTaille(input,s,i1,i2){
    file =input.files[0];ddd=input.id;
    window.URL = window.URL || window.webkitURL;
    img = new Image();
    
    img.onload = function(){
        if(img.width > i1 || img.height > i2){
            pasGlop(ddd, img.width-i1, img.height-i2, s);
        }else{
            glop(img.width, img.height, s);
        }
    }
    img.src = window.URL.createObjectURL(file);
  }

  function glop(width, height, ss){
    var store = document.getElementById(ss);
    store.innerHTML="<?php echo get_phrase('image inserted'); ?>";
  }

  function pasGlop(inputs, width, height, ss){
       

    // pour une alerte
    var str = "votre image est trop "

    if(width>0 && height>0){str+="haute de "+height+"px et large de "+width+"px";}
    else{
        if(width>0){str+="large de "+width+"px";}
     
        if(height>0){str+="haute de "+height+"px.";}
    }
    
    alert(str);
 
    var store = document.getElementById(ss);
    store.innerHTML="<?php echo get_phrase('Try again'); ?>";
 
    document.getElementsByName(inputs)[0].value = ""; //efface le input

 
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

  function vuezip(d,a,widthi,heighti){
    var input = document.getElementById(d);
    verifTaille(input, a, widthi, heighti); 
  }
  function slectionactive(p){
    if (p=='skin1') {
      document.getElementById('blue-black').checked=true;
      $('#skin-blue-black').attr("class", "clearfix");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin2') {
      document.getElementById('white-black').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin3') {
      document.getElementById('purple-black').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin4') {
      document.getElementById('green-black').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin5') {
      document.getElementById('red-black').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin6') {
      document.getElementById('yellow-black').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin7') {
      document.getElementById('blue-light').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin8') {
      document.getElementById('white-light').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin9') {
      document.getElementById('purple-light').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin10') {
      document.getElementById('green-light').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin11') {
      document.getElementById('red-light').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix");
      $('#skin-yellow-light').attr("class", "clearfix full-opacity-hover");

    }

    if (p=='skin12') {
      document.getElementById('yellow-light').checked=true;
      $('#skin-blue-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-black').attr("class", "clearfix full-opacity-hover");
      $('#skin-blue-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-white-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-purple-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-green-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-red-light').attr("class", "clearfix full-opacity-hover");
      $('#skin-yellow-light').attr("class", "clearfix");

    }
  }

  function slectionactive1(p){
    if (p=='mode0') {
      document.getElementById('mod0').checked=true;
      $('#moded0').attr("class", "col-md-12 clearfix");
      $('#moded1').attr("class", "col-md-12 clearfix full-opacity-hover");
    }
    if (p=='mode1') {
      document.getElementById('mod1').checked=true;
      $('#moded1').attr("class", "col-md-12 clearfix");
      $('#moded0').attr("class", "col-md-12 clearfix full-opacity-hover");
    }
  }
</script>

