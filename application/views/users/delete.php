

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo get_phrase('Manage'); ?>
        <small><?php echo get_phrase('Groups'); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo get_phrase('Home'); ?></a></li>
        <li><a href="<?php echo base_url('users/') ?>"><?php echo get_phrase('Users'); ?></a></li>
        <li class="active"><?php echo get_phrase('Delete'); ?></li>
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

          <h1><?php echo get_phrase('Do you really want to remove ?'); ?></h1>
          <?php 
            $attributes = array("class" => "",
                                "role" => "form",
                                "id" => "",
                                "name" => "");
            echo form_open("Users/delete/".$id, $attributes);
          ?> 
            <input type="submit" class="btn btn-primary" name="confirm" value="<?php echo get_phrase('Confirm'); ?>">
            <a href="<?php echo base_url('users') ?>" class="btn btn-warning"><?php echo get_phrase('Cancel'); ?></a>
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
    $("#manageUserNav").addClass('active');
  });
</script>