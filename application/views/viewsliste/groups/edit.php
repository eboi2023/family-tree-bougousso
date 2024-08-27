

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo get_phrase('Manage'); ?>
        <small><?php echo get_phrase('Groups'); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('');?>"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
        <li><a href="<?php echo site_url();?>/Dashboard"><i class="fa fa-home"></i>&nbsp;<?php echo get_phrase('Dashboard'); ?></a></li>
        <li><a href="<?php echo site_url();?>/groups"><i class="fa fa-code-fork"></i>&nbsp;<?php echo get_phrase('Personal post'); ?></a></li>
        <li class="active"><i class="fa fa-plug" ></i> <?php echo get_phrase('edit'); ?> <?php echo get_phrase('Personal post'); ?></li>

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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo get_phrase('Edit Group'); ?></h3>
            </div>
            <?php 
              $attributes = array("class" => "",
                                  "role" => "form",
                                  "id" => "",
                                  "name" => "");
              echo form_open("Groups/edit/".$id, $attributes);
            ?> 
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name"><?php echo get_phrase('Group Name'); ?></label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo $group_data['group_name']; ?>">
                </div>
                <div class="form-group">
                  <label for="permission"><?php echo get_phrase('Permission'); ?></label>

                  <?php $serialize_permission = unserialize($group_data['permission']); ?>
                  
                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th><label for="permission"><u><?php echo ucfirst(get_phrase('Click_to_select_all')); ?> </u></label></th>
                        <th><?php echo ucfirst(get_phrase('Create')); ?></th>
                        <th><?php echo ucfirst(get_phrase('Update')); ?></th>
                        <th><?php echo ucfirst(get_phrase('View')); ?></th>
                        <th><?php echo ucfirst(get_phrase('Delete')); ?></th>
                        <th><?php echo ucfirst(get_phrase('Validate')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><?php echo ucfirst(get_phrase('Dashboard')); ?></td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo ucfirst(get_phrase('Members')); ?></td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateMembers" class="minimal" <?php if($serialize_permission) { if(in_array('updateMembers', $serialize_permission)) { echo "checked"; } } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewMembers" class="minimal" <?php if($serialize_permission) { if(in_array('viewMembers', $serialize_permission)) { echo "checked"; }} ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteMembers" class="minimal" <?php if($serialize_permission) { if(in_array('deleteMembers', $serialize_permission)) { echo "checked"; }} ?> ></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo ucfirst(get_phrase('Reports')); ?></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createRepport" class="minimal" <?php if($serialize_permission) {if(in_array('createRepport', $serialize_permission)) { echo "checked"; }} ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateRepport" class="minimal" <?php if($serialize_permission) {if(in_array('updateRepport', $serialize_permission)) { echo "checked"; }} ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewRepport" class="minimal" <?php if($serialize_permission) {if(in_array('viewRepport', $serialize_permission)) { echo "checked"; }} ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteRepport" class="minimal" <?php if($serialize_permission) {if(in_array('deleteRepport', $serialize_permission)) { echo "checked"; }} ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="validateRepport" class="minimal" <?php if($serialize_permission) {if(in_array('validateRepport', $serialize_permission)) { echo "checked"; }} ?> ></td>
                      </tr>
                      <tr>
                        <td><?php echo ucfirst(get_phrase('Evenement')); ?></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createEvenement" class="minimal" <?php if($serialize_permission) {if(in_array('createEvenement', $serialize_permission)) { echo "checked"; }} ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateEvenement" class="minimal" <?php if($serialize_permission) {if(in_array('updateEvenement', $serialize_permission)) { echo "checked"; }} ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewEvenement" class="minimal" <?php if($serialize_permission) {if(in_array('viewEvenement', $serialize_permission)) { echo "checked"; }} ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteEvenement" class="minimal" <?php if($serialize_permission) {if(in_array('deleteEvenement', $serialize_permission)) { echo "checked"; }} ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="validateEvenement" class="minimal" <?php if($serialize_permission) {if(in_array('validateEvenement', $serialize_permission)) { echo "checked"; }} ?> ></td>
                      </tr>
                      <tr>
                        <td><?php echo ucfirst(get_phrase('calculatrice')); ?></td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCalcul" class="minimal"<?php if($serialize_permission) { if(in_array('viewCalcul', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo ucfirst(get_phrase('Accessory')); ?></td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewAccessory" class="minimal"<?php if($serialize_permission) { if(in_array('viewAccessory', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteAccessory" class="minimal"<?php if($serialize_permission) { if(in_array('deleteAccessory', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="validateAccessory" class="minimal"<?php if($serialize_permission) { if(in_array('validateAccessory', $serialize_permission)) { echo "checked"; } } ?>></td>
                      </tr>
                      <?php if ($this->session->userdata('id')==1) {?>
                        <tr>
                          <td><?php echo ucfirst(get_phrase('Groups')); ?></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="createGroup" class="minimal"<?php if($serialize_permission) { if(in_array('createGroup', $serialize_permission)) { echo "checked"; } } ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup" class="minimal"<?php if($serialize_permission) { if(in_array('updateGroup', $serialize_permission)) { echo "checked"; } } ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup" class="minimal"<?php if($serialize_permission) { if(in_array('viewGroup', $serialize_permission)) { echo "checked"; } } ?>></td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup" class="minimal"<?php if($serialize_permission) { if(in_array('deleteGroup', $serialize_permission)) { echo "checked"; } } ?>></td>
                          <td> - </td>
                        </tr>
                      <?php } ?>
                      <tr>
                        <td><?php echo ucfirst(get_phrase('Users')); ?></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser" class="minimal"<?php if($serialize_permission) { if(in_array('createUser', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" class="minimal"<?php if($serialize_permission) { if(in_array('updateUser', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" class="minimal"<?php if($serialize_permission) { if(in_array('viewUser', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" class="minimal"<?php if($serialize_permission) { if(in_array('deleteUser', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                      </tr>
                      <?php if ($this->session->userdata('id')==1) {?>
                        <tr>
                          <td><?php echo get_phrase('Company'); ?></td>
                          <td> - </td>
                          <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany" class="minimal"<?php if($serialize_permission) { if(in_array('updateCompany', $serialize_permission)) { echo "checked"; } } ?>></td>
                          <td> - </td>
                          <td> - </td>
                          <td> - </td>
                        </tr>
                      <?php } ?>
                      <tr>
                        <td><?php echo ucfirst(get_phrase('Memberships')); ?></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createMemberships" class="minimal"<?php if($serialize_permission) { if(in_array('createMemberships', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateMemberships" class="minimal"<?php if($serialize_permission) { if(in_array('updateMemberships', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewMemberships" class="minimal"<?php if($serialize_permission) { if(in_array('viewMemberships', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteMemberships" class="minimal"<?php if($serialize_permission) { if(in_array('deleteMemberships', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo ucfirst(get_phrase('Memberships_fee')); ?></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createMemberships_fee" class="minimal" <?php if($serialize_permission) { if(in_array('createMemberships_fee', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateMemberships_fee" class="minimal" <?php if($serialize_permission) { if(in_array('updateMemberships_fee', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewMemberships_fee" class="minimal" <?php if($serialize_permission) { if(in_array('viewMemberships_fee', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteMemberships_fee" class="minimal" <?php if($serialize_permission) { if(in_array('deleteMemberships_fee', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo get_phrase('Caisse'); ?></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCaisse" class="minimal" <?php if($serialize_permission) { if(in_array('createCaisse', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCaisse" class="minimal" <?php if($serialize_permission) { if(in_array('createCaisse', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCaisse" class="minimal" <?php if($serialize_permission) { if(in_array('createCaisse', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCaisse" class="minimal" <?php if($serialize_permission) { if(in_array('createCaisse', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo get_phrase('Code_Modification_company'); ?></td>
                        <td> - </td>
                         <td><input type="checkbox" name="permission[]" id="permission" value="updateCode_Modification_company" class="minimal" <?php if($serialize_permission) { if(in_array('updateCode_Modification_company', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo get_phrase('Code_Modification_Bureau'); ?></td>
                        <td> - </td>
                         <td><input type="checkbox" name="permission[]" id="permission" value="updateCode_Modification_Bureau" class="minimal" <?php if($serialize_permission) { if(in_array('updateCode_Modification_Bureau', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo get_phrase('Code_Modification_repport'); ?></td>
                        <td> - </td>
                         <td><input type="checkbox" name="permission[]" id="permission" value="updateCode_Modification_repport" class="minimal" <?php if($serialize_permission) { if(in_array('updateCode_Modification_repport', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo get_phrase('Code_Modification_checkout'); ?></td>
                        <td> - </td>
                         <td><input type="checkbox" name="permission[]" id="permission" value="updateCode_Modification_checkout" class="minimal" <?php if($serialize_permission) { if(in_array('updateCode_Modification_checkout', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo get_phrase('Code_Modification_member'); ?></td>
                        <td> - </td>
                         <td><input type="checkbox" name="permission[]" id="permission" value="updateCode_Modification_member" class="minimal" <?php if($serialize_permission) { if(in_array('updateCode_Modification_member', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo get_phrase('Code_Modification_job'); ?></td>
                        <td> - </td>
                         <td><input type="checkbox" name="permission[]" id="permission" value="updateCode_Modification_poste" class="minimal" <?php if($serialize_permission) { if(in_array('updateCode_Modification_poste', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                       <tr>
                        <td><?php echo get_phrase('Code_Modification_Evenement'); ?></td>
                        <td> - </td>
                         <td><input type="checkbox" name="permission[]" id="permission" value="updateCode_Modification_Evenement" class="minimal" <?php if($serialize_permission) { if(in_array('updateCode_Modification_Evenement', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo get_phrase('Profile'); ?></td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateProfile" class="minimal" <?php if($serialize_permission) { if(in_array('updateProfile', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile" class="minimal" <?php if($serialize_permission) { if(in_array('viewProfile', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td><?php echo get_phrase('Changes_password'); ?></td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateChangespassword" class="minimal" <?php if($serialize_permission) { if(in_array('updateChangespassword', $serialize_permission)) { echo "checked"; } } ?>></td>
                        <td> - </td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                    </tbody>
                  </table>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php echo get_phrase('Update modification'); ?></button>
                <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning"><?php echo get_phrase('return'); ?></a>
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
    $("#Menuemploie").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
  });
</script>
