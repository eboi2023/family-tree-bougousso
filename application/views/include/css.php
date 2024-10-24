



<?php 
	if ($page_title == 'home' || $page_title == 'register') {?>
		<link href="<?php echo base_url('assets/page/css/main.css') ?>" rel="stylesheet"> 
		<link rel="stylesheet" href="<?php echo base_url('assets/page/bootstrap/css/bootstrap.min.css') ?>">
		<link href="<?php echo base_url('assets/page/css/responsive.css') ?>" rel="stylesheet">
	<?php }
	if ($page_title == 'login' || $page_title == 'passwordnew') {?>
		<link href="<?php echo base_url('assets/page/login/style.css') ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
		<style type="text/css">
			.wrapper{
			    position: absolute;
			    top: 50%;
			    left: 50%;
			    transform: translate(-50%,-50%);
			}

			.btn_grp{
			    display: flex;
			}

			.btn_grp .btn{
			    width: 225px;
			    height: 50px;
			    line-height: 50px;
			    text-align: center;
			    background: #fff;
			    margin: 0 10px;
			    border-radius: 3px;
			    cursor: pointer;
			    text-transform: uppercase;
			    letter-spacing: 2px;
			    font-size: 14px;
			}
			.btn_grp .btn.btn_error,
			.alert_item.alert_error{
			    background: #ecc8c5;
			    color: #b32f2d;
			}
			.btn_grp .btn.btn_error:hover{
			    background: #c79995;
			}

			.alert_wrapper{
			    position: relative;
			    width: 100%;
			    height: 100%;
			    z-index: 999;
			    visibility: hidden;
			}

			.alert_backdrop{
			    position: fixed;
			    top: 0;
			    left: 0;
			    width: 100%;
			    height: 100%;
			    background: #2d333f;
			    opacity: 0.9;
			    z-index: 2;
			}

			.alert_wrapper .alert_item{
			    z-index: 3; 
			    position: fixed;
			    top: -100%;
			    left: 50%;
			    transform: translate(-50%,-50%);
			    display: flex;
			    align-items: center;
			    padding: 25px 50px;
			    border-radius: 3px;
			    transition: all 0.2s ease;
			}

			.alert_wrapper .alert_item .data{
			    margin: 0 50px;
			}
			.alert_wrapper .alert_item .data .title{
			    font-size: 18px;
			    margin-bottom: 5px;
			}
			.alert_wrapper .alert_item .data span{
			    font-weight: 700;
			}
			.alert_wrapper .alert_item .data .sub{
			    font-size: 14px;
			    font-weight: 100;
			}
			.alert_wrapper .alert_item .icon{
			    font-size: 32px;
			}
			.alert_wrapper .alert_item .close{
			    cursor: pointer;
			    color: red;
			}

			.alert_item.alert_error .close:hover{
			    color: #c79995;
			}

			.alert_wrapper.active{
			    visibility: visible;
			}
			.alert_wrapper.active .alert_item{
			    top: 50%;
			}
        </style>
	<?php }?>