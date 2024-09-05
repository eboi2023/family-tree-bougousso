<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo get_phrase($page_title); ?></title>
    <?php $company_info = $this->model_company->getCompanyData(1); ?>
    
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url('uploads/').''.$company_info['company_icon']?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo base_url('uploads/').''.$company_info['logo']?>"  type="image/x-icon">

    <?php if ($page_title == 'Dashboard' || $page_title == 'Users' || $page_title == 'Groups' || $page_title == 'Brands' || $page_title == 'Clients' || $page_title == 'Category' || $page_title == 'Stores' || $page_title == 'Products' || $page_title == 'Add Order' || $page_title == 'Update Order' || $page_title == 'Manage Orders' || $page_title == 'Company' || $page_title == 'Manage Inventaire' || $page_title == 'Manage Reservation' || $page_title == 'Add Reservation' || $page_title == 'Mon profil' || $page_title == 'Report' || $page_title == 'Caisses' || $page_title == 'Modifier Mdp | Administration' || $page_title == 'Modifier mon profil' || $page_title == 'Evenement') {?>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->  
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
      <!-- Font Awesome -->  
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
      <!-- Morris chart -->

      <!-- jQuery 3 -->
      <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
      
      <!-- Sparkline -->
      <script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
      <!-- jvectormap -->
      <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
      <!-- SlimScroll -->
      <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
      <!-- ChartJS -->
      <script src="<?php echo base_url('assets/bower_components/chart.js/Chart.js') ?>"></script>
      <!-- daterangepicker -->
      <script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
      <!-- datepicker -->
      <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
      <!-- Slimscroll -->
      <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
      <!-- AdminLTE App -->  
      <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
    <?php } ?>
    <?php if ($page_title == 'Dashboard' || $page_title == 'Evenement') {?>
      <!-- fullCalendar -->
      <link rel="stylesheet" href="<?php echo base_url('assets/') ?>bower_components/fullcalendar/dist/fullcalendar.min.css">
      <link rel="stylesheet" href="<?php echo base_url('assets/') ?>bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <?php } ?>
    <?php if ($page_title == 'Products' || $page_title == 'Company') {?>
      
      <!-- Morris chart -->
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/morris.js/morris.css') ?>">
      <!-- jvectormap -->
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/jvectormap/jquery-jvectormap.css') ?>">
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
      <!-- Daterange picker -->  
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">
      
      <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fileinput/fileinput.min.css') ?>">

      <!-- icheck -->
      <!-- iCheck for checkboxes and radio inputs -->
      <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css') ?>">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      
      <!-- Morris.js charts -->
      <script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js') ?>"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
      <script src="<?php echo base_url('assets/plugins/fileinput/fileinput.min.js') ?>"></script>
      <!-- icheck -->
      <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
    <?php } ?>
    <?php if ($page_title == 'Products' || $page_title == 'Add Order' || $page_title == 'Update Order' || $page_title == 'Add Reservation' || $page_title == 'Update Reservation' || $page_title == 'Users') {?>
      <!-- Select2 -->
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>">

      <!-- Select2 -->
      <script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
          
    <?php } ?>
    <?php if ($page_title == 'Users' || $page_title == 'Groups' || $page_title == 'Brands' || $page_title == 'Category' || $page_title == 'Stores' || $page_title == 'Products' || $page_title == 'Manage Orders' || $page_title == 'Manage Inventaire'  || $page_title == 'Manage Reservation' || $page_title == 'Caisses' || $page_title == 'Clients' || $page_title == 'Langue' || $page_title == 'Evenement') {?>
      <!-- icheck -->
      <!-- iCheck for checkboxes and radio inputs -->
      <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css') ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
      

      <!-- icheck -->
      <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
      <!-- DataTables -->
      <script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
      

      <script type="text/javascript">
        
      </script>


    <?php } ?>
    <?php if ($page_title == 'Attributes') {?>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->  
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
      <!-- Font Awesome -->  
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
      <!-- Morris chart -->

      <!-- jQuery 3 -->
      <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
      
      <!-- Sparkline -->
      <script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
      <!-- jvectormap -->
      <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
      <!-- daterangepicker -->
      <script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
      <!-- datepicker -->
      <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
      <!-- Slimscroll -->
      <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
      <!-- Select2 -->
      <script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
      <!-- AdminLTE App -->  
      <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
      <!-- icheck -->
      <!-- iCheck for checkboxes and radio inputs -->
      <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css') ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">

      <!-- icheck -->
      <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
      <!-- DataTables -->
      <script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
      <!-- Bootstrap Color Picker -->
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/') ?>bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
      <!-- bootstrap color picker -->
      <script src="<?php echo base_url('assets/bower_components/') ?>bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
      <script type="text/javascript">
        $(function () {
          //Colorpicker
          $('.my-colorpicker1').colorpicker()
          //color picker with addon
          $('.my-colorpicker2').colorpicker()

        })
      </script>
    <?php } ?>
    
    <?php if ($page_title == 'Dashboard' || $page_title == 'Evenement') {?>
      <!-- fullCalendar -->
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/') ?>fullcalendar/dist/fullcalendar.min.css">
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/') ?>fullcalendar/dist/fullcalendar.print.min.css" media="print">
      
      <!-- fullCalendar -->
      <script src="<?php echo base_url('assets/bower_components/') ?>moment/moment.js"></script>
      <script src="<?php echo base_url('assets/bower_components/') ?>fullcalendar/dist/fullcalendar.min.js"></script>
    <?php } ?>

    <?php if ($page_title == 'Caisses') {?>
          <script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js') ?>"></script>
    <?php } ?>
    <?php if ($page_title == 'List Inventaire') {?>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->  
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
      <!-- Font Awesome -->  
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
      <!-- Morris chart -->

      <!-- jQuery 3 -->
      <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
      
      <!-- Sparkline -->
      <script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
      <!-- jvectormap -->
      <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
      <!-- jQuery Knob Chart -->
      <script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
      <!-- daterangepicker -->
      <script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
      <!-- datepicker -->
      <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
      <!-- Slimscroll -->
      <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
      <!-- AdminLTE App -->  
      <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>



      <!-- iCheck for checkboxes and radio inputs -->
      <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css') ?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
      

      <!-- icheck -->
      <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
      <!-- DataTables 
      <script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>-->
  
      <!-- This is data table -->
        <script src="<?php echo base_url('assets/d/assets/vendor_components/datatable/datatables.min.js') ?>"></script>
        
      <!-- Medi Admin for Data Table -->
      <script src="<?php echo base_url('assets/d/js/data-table.js') ?>"></script>
    <?php } ?>
    
    <?php if ($page_title == 'Listes Membres' || $page_title == 'Listes languague' || $page_title == 'rapport' || $page_title == 'caisse' || $page_title == 'Liste adherent' || $page_title == 'Cotisation' || $page_title == 'Accessoire' || $page_title == 'Listes presence') {?>

      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?php echo site_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo site_url('assets/');?>bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?php echo site_url('assets/');?>bower_components/Ionicons/css/ionicons.min.css">

      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo site_url('assets/');?>dist/css/AdminLTE.min.css">

      <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="<?php echo site_url('assets/');?>dist/css/skins/_all-skins.min.css">

      <!-- Datatables -->
      <link href="<?php echo site_url('assets/');?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo site_url('assets/');?>bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo site_url('assets/');?>bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo site_url('assets/');?>bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo site_url('assets/');?>bower_components/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">



      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]--> 
      <!-- jQuery 3 -->
      <script src="<?php echo site_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>

      <!-- Bootstrap 3.3.7 -->
      <script src="<?php echo site_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

      <!-- Datatables -->
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/jszip/dist/jszip.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/pdfmake/build/pdfmake.min.js"></script>
      <script src="<?php echo site_url('assets/');?>bower_components/pdfmake/build/vfs_fonts.js"></script>

      <!-- Sparkline -->
      <script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>

      <!-- jQuery Knob Chart -->
      <script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
      <!-- daterangepicker -->
      <script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
      <!-- datepicker -->
      <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
      <!-- Bootstrap WYSIHTML5 -->
      <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>


        <!-- SlimScroll -->
        <script src="<?php echo site_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('assets/bower_components/fastclick/lib/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('assets/dist/js/adminlte.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('assets/dist/js/demo.js');?>"></script>
        <!-- page script -->
        <script>
          $(function () {
            $('#example2').DataTable()
              $('#example1').DataTable({
                "language": {
                  "decimal": ",",
                  "thousands": ".",
                  "info": "De _START_ à _END_ pour _TOTAL_ ligne(s)",
                  "infoEmpty": "Aucune entrée",
                  "infoPostFix": "",
                  "infoFiltered": " - filtré du total _MAX_ entrées",
                  "loadingRecords": "Veuillez patienter - Chargement des données ...",
                  "lengthMenu": "Nombre de ligne à afficher: _MENU_",
                  "paginate": {
                  "first": "Premier",
                  "last": "Dernier",
                  "next": "Suivant",
                  "previous": "Précédent"
                },
                "processing": "veillez passienter ...",
                "search": "Recherche: ",
                "searchPlaceholder": "",
                "zeroRecords": "Pas de données! S'il vous plaît changer votre terme de recherche.",
                "emptyTable": "Aucune donnée disponible",
                "aria": {
                "sortAscending":  ": permet de trier la colonne par ordre croissant",
                "sortDescending": ": permet de trier la colonne par ordre décroissant"
                },
                //only works for built-in buttons, not for custom buttons
                "buttons": {
                  "create": "Nouveau",
                  "edit": "Changement",
                  "remove": "Effacer",
                  "copy": "copie",
                  "csv": "CSV-Datei",
                  "excel": "Excel-Tabelle",
                  "pdf": "PDF-Document",
                  "print": "Imprimer",
                  "colvis": "Sélection de colonne",
                  "collection": "Sélection"
                },
                select: {
                  rows: {
                    _: '%d Lignes sélectionnées',
                    0: 'Cliquez sur la ligne pour sélectionner',
                    1: 'Une ligne sélectionnée'
                  }
                }
              },
              'paging'      : true,
              'lengthChange': true,
              'searching'   : true,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
            })
          })
        </script>

    <?php } ?>
    
  </head>
  
  <?php 
      if ($company_info['model_template']==0) {
        $style_model='';
      }else{
        $style_model='sidebar-collapse';
      }
        $pps=$company_info['template'];echo'<body class="'.$company_info['template'].' hold-transition sidebar-mini '.$style_model.'">';?>
   

  