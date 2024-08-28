<?php 
    if ($page_title == 'login' || $page_title == 'passwordnew') {?>
        <script>
            var alert_items = document.querySelectorAll(".alert_item");
            var btns = document.querySelectorAll(".btn");
            var alert_wrapper = document.querySelector(".alert_wrapper");
            var close_btns = document.querySelectorAll(".close");

            

            close_btns.forEach(function(close, close_index){
                close.addEventListener("click", function(){
                    alert_wrapper.classList.remove("active");

                    alert_items.forEach(function(alert_item, alert_index){
                        alert_item.style.top = "-100%";
                    })
                })
            })

        </script>
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
