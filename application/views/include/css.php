



<?php 
	if ($page_title == 'home' || $page_title == 'register') {?>
		<link href="<?php echo base_url('assets/css/main.css') ?>" rel="stylesheet"> 
		<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
		<link href="<?php echo base_url('assets/css/responsive.css') ?>" rel="stylesheet">
	<?php }
	if ($page_title == 'login' || $page_title == 'passwordnew') {?>
		<link href="<?php echo base_url('assets/login/style.css') ?>" rel="stylesheet">
	<?php }

	if ($page_title == 'vue') {?>
		<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet"><link href="<?php echo base_url('assets/css/magnific-popup.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/all.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/meanmenu.min.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/owl.carousel.css') ?>" rel="stylesheet">

	<?php }
?>

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">