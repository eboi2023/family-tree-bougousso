<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Highchart example in Codeigniter </title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/charts/chart.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/charts/xcharts.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/charts/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets/css/daterangepicker.css">
<script src="<?php echo base_url(); ?>assets/assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/js/jquery-migrate-1.2.1.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/js/jquery-ui-1.10.3-custom.min.js"></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/assets/js/charts/d3.v2.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/assets/js/charts/sugar.min.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/assets/js/charts/xcharts.min.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/assets/js/charts/script.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>assets/assets/js/daterangepicker.js'></script>
</head>
<body>
<div style="margin: 10px 0 0 10px;">
<h3>Codeigniter Highchart Example</h3>
<form class="form-horizontal">
<fieldset>
<div class="input-prepend">
<span class="add-on"><i class="icon-calendar"></i></span>
<input type="text" name="range" id="range" />
</div>
</fieldset>
</form>
<div id="msg"></div>
<div id="placeholder">
<figure id="chart"></figure>
</div>
</div>
</body>
</html>