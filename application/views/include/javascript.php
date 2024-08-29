<?php 
    if ($page_title == 'login' || $page_title == 'passwordnew') {?>
        
    <?php }
    if ($page_title == 'home' || $page_title == 'register') {?>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/owl.carousel.min.js')?>"></script>
     <?php }
    if ($page_title == 'vue') {?>   
        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    } );

    
    $(document).ready(function() {
        $('#myModal').modal({
            keyboard: false,
            show: true,
            backdrop: "static"
        }); 
        $("#myModal").modal('show');
    } );
        
</script>



<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js')?>"></script>

<script src="<?php echo base_url('assets/js/jquery.countdown.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.isotope-3.0.6.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/waypoints.js') ?>"></script>

<script src="<?php echo base_url('assets/js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.meanmenu.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/sticker.js') ?>"></script>
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>
<script src="<?php echo base_url('assets/js/details.js') ?>"></script>
<script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
<?php }
?>
