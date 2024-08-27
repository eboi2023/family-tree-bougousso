<!DOCTYPE html>
<html>
    <head>
    
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title><?php echo get_phrase($page_title,4); ?></title>
	    <?php $company_info = $this->model_company->getCompanyData(1); ?>
	    
	    
	    <!-- Favicons -->
	    <link rel="shortcut icon" href="<?php echo base_url('uploads/').''.$company_info['company_icon']?>" type="image/x-icon">
	    <link rel="apple-touch-icon" href="<?php echo base_url('uploads/').''.$company_info['logo']?>"  type="image/x-icon">
	    <?php $lien_company_icon=base_url('uploads/').''.$company_info['company_icon']; ?>