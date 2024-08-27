<?php        
	$title='Egroxam sport - Multipurpose eCommerce Bootstrap 4 Template';
	$category= $this->model_category->getActiveCategroy();
	$categoryProduct= $this->model_category->getCategoryValueData();
	
	$listeproducts = $this->model_products->getProductData();
	// attributes 
	$attribute_data = $this->model_attributes->getActiveAttributeData();

	$attributes_final_data = array();
	foreach ($attribute_data as $k => $v) {
		$attributes_final_data[$k]['attribute_data'] = $v;

		$value = $this->model_attributes->getAttributeValueData($v['id']);

		$attributes_final_data[$k]['attribute_value'] = $value;
	}
	$attributes = $attributes_final_data;

	$brands= $this->model_brands->getActiveBrands();  
     