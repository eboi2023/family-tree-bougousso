<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <?php
      if (date("Y")>2024) {
        $datecreateweb="2024 - ".date("Y");
      }else{
        $datecreateweb=date("Y");
      }
    ?>
    <strong>Copyright &copy; <?=$datecreateweb;?><a href="https://jprobeweb.com/backup/fr" target="_blank"> JPROBEWEB</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js'); ?>"></script>

</body>
</html>
