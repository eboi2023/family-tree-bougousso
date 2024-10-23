<div class="modal fade" id="modal-add-brothers">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo get_phrase("add_sister_or_brother",1); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-sm-12">
              <div class="box">
                <div class="form-group">
                  <label for="groups"><?php echo get_phrase('family_kinship'); ?></label>
                  <select class="form-control select_group" id="groups" name="groups">
                    <option value="1"><?php echo get_phrase('same_father_same_mother'); ?></option>
                    <option value="2"><?php echo get_phrase('same_father'); ?></option>
                    <option value="3"><?php echo get_phrase('same_mother'); ?></option>
                    
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
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-light">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal add brother-->

<div class="modal fade" id="modal-add-parents">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo get_phrase("add_parents",1); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-light">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal add sister-->


<div class="modal fade" id="modal-add-spouse">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo get_phrase("Add_a_spouse",4); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-light">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal add a spouse-->


<div class="modal fade" id="modal-add-son">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo get_phrase("Add_a_son",4); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-light">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal add a son-->



<div class="modal fade" id="modal-add-girl">
  <div class="modal-dialog">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo get_phrase("Add_a_girl",4); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline-light">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal add a girl-->

<div class="modal fade" id="modal-add-other-person">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo get_phrase("Add_other_person",4); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal add other person -->