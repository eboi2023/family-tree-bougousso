<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo get_phrase($page_title,4); ?></title>

  <?php $company_info = $this->model_company->getCompanyData(1); ?>
  <!-- Favicons -->
  <link rel="shortcut icon" href="<?php echo base_url('uploads/').''.$company_info['company_icon']?>" type="image/x-icon">
  <link rel="apple-touch-icon" href="<?php echo base_url('uploads/').''.$company_info['logo']?>"  type="image/x-icon">
  <?php $lien_company_icon=base_url('uploads/').''.$company_info['company_icon']; ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css'); ?>">
  <?php if ($page_title== "Dashboard") {?>
    <script src="<?php echo base_url('assets/page/free/produitkss.js'); ?>"></script>
    <link href="<?php echo base_url('assets/page/free/produitkss.css'); ?>" rel="stylesheet" />
  <?php } ?>
</head>
<body class="layout-top-nav layout-footer-fixed layout-navbar-fixed accent-success text-sm">
      
      
      
      