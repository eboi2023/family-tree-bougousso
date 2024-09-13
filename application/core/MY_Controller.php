<?php 

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_company');
	}
}

class Admin_Controller extends MY_Controller 
{
	var $permission = array();

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('model_company');
		$group_data = array();
		if(empty($this->session->userdata('logged_kl_in'))) {
			$session_data = array('logged_kl_in' => FALSE);
			$this->session->set_userdata($session_data);
		}
		else {
			$user_id = $this->session->userdata('id');
			$this->load->model('model_groups');
			$group_data = $this->model_groups->getUserGroupByUserId($user_id);
			
			$this->data['user_permission'] = unserialize($group_data['permission']);
			$this->permission = unserialize($group_data['permission']);
		}
	}

	public function logged_kl_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_kl_in'] == TRUE) {
			redirect('dashboard', 'refresh');
		}
	}


	
	public function not_logged_kl_in()
	{
		$session_data = $this->session->userdata();
		if($session_data['logged_kl_in'] == FALSE) {
			redirect('auth/login', 'refresh');
		}
	}

	public function codecrytevale(){
		
	}

	public function encrpte_vamail($val=Null){
		
		
		if ($val == null) {

		}else{
			$tydata = '%Y %m %j %G %i %s';
			$time = mdate($tydata, time());
			$data = $val.' '.$time;
		    $key_password = "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDBnLS9jZ9eZnovuLuxtkaXgnX6iqj1wvHlrd3l9XhHpti3XC+rLbNlCXcnpobyFc7tH27QVnGAyPJjcheftxKNfV35PitSo2T2VjZ8PODm6oW03Px4d8tYmYptBmwWY/SFVtHJPqjZjWIKRC8LikApTRmsPA5paXR1bFVv54zmg7A9zcGp8m0tCtfJfeEebUa8SL17uza7hwwzFGAhrpLMOTkm3VRb4/NWPyDjLuHw2kZAfBOY7b6hNsR4nMqU72IGRe0TmwVl8q4GlGcLcB0youpxetgi8j/ZR3WsjxEn0zA3pscNW1OMPLeJLGRCwHS4XAgMBAAECggEAB+MxPpN+P5sOgCgCvSsIiFpOaK/5rUuSdAaE+eK/5KxvNqoOJiFzA+uNvPfEgFQ/hSsCnDzrLdMmUoGpTgQsPc6eIaUyR/7D5k1rCkIiOcSfL2WmBd+qLrJhLsTlUuS+MxYiRfGK4Bt7rQyWfOZDyF1aFv/6oXNqCpZuIeP3aTc5bDmzKdLWkE0hYnNt/9+5xgA2sM1iCnGJ+O/9S7IhT2oPmXo0bYwRy9x+eOuM2pDzHrE4N6kG3zNlSgqS/A0pZwBdG6lT1dUfNcIhKsCJFt7eQa1Ri6xqkOvI7n/8RvWfFvEYgDyM1mUZVr4+aHxXOQKBgQDlPnBdJ+e5tY0bCpA4EiWu6s7c8VUoqPzHxLd3rKu5fS+2wVgCmF/LXaEJhTnAeDpKlMxPcRkMlA/4oZBcXsHjyvB9zGmTfQ+VhFb2yA2Rk4W6YmLrEb+oIaG/5CZiSdU0gJtYUwAXeTnKsOuIqjG3BwPbqNp9FfHrDx3kQKBgQC8v1yNp0/zWtXN7eEoYdCkSjVbFJiA+Mhwnu9sKjRi4aPZyHc5zvWZ6BnOuIhU2l/7cRlTmq/bqD+KKxIVrE3txyc1m/0gPxtaA9IwLsM8o5eQXUKtOrAYBfVnG1i2tBLz8pKsld+ySdNkD14slDFYIqOcwKBgQCfzOVAKixWJrHmTyldhU+uFbEeO7aEDwvJZAH6sYY+CwQBS97lLYo8eyMxbsMYXWhSBCuuxpPGTHAWL4tGD/qAMdpd3BU/Rn0EXC22jyn/ML0iYZAvG";

		    // CRYPTER
		    $encrypted_chaine = openssl_encrypt($data, "AES-128-ECB" ,$key_password);
		    while (substr_count($encrypted_chaine, ' ') >0) {
		    	$encrypted_chaine = openssl_encrypt($data, "AES-128-ECB" ,$key_password);
		    }
		    
		    // var_dump($encrypted_chaine);
		    return $encrypted_chaine;
		}
			
	}
	public function decrpte_vamail($val=Null){
		if ($val == null) {

		}else{
			$tydata = '%Y %m %j %G %i %s';
			$time = mdate($tydata, time());
		
			$pieces = explode(" ", $time);
			$data = $val.' '.$time;
			$key_password = "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQDBnLS9jZ9eZnovuLuxtkaXgnX6iqj1wvHlrd3l9XhHpti3XC+rLbNlCXcnpobyFc7tH27QVnGAyPJjcheftxKNfV35PitSo2T2VjZ8PODm6oW03Px4d8tYmYptBmwWY/SFVtHJPqjZjWIKRC8LikApTRmsPA5paXR1bFVv54zmg7A9zcGp8m0tCtfJfeEebUa8SL17uza7hwwzFGAhrpLMOTkm3VRb4/NWPyDjLuHw2kZAfBOY7b6hNsR4nMqU72IGRe0TmwVl8q4GlGcLcB0youpxetgi8j/ZR3WsjxEn0zA3pscNW1OMPLeJLGRCwHS4XAgMBAAECggEAB+MxPpN+P5sOgCgCvSsIiFpOaK/5rUuSdAaE+eK/5KxvNqoOJiFzA+uNvPfEgFQ/hSsCnDzrLdMmUoGpTgQsPc6eIaUyR/7D5k1rCkIiOcSfL2WmBd+qLrJhLsTlUuS+MxYiRfGK4Bt7rQyWfOZDyF1aFv/6oXNqCpZuIeP3aTc5bDmzKdLWkE0hYnNt/9+5xgA2sM1iCnGJ+O/9S7IhT2oPmXo0bYwRy9x+eOuM2pDzHrE4N6kG3zNlSgqS/A0pZwBdG6lT1dUfNcIhKsCJFt7eQa1Ri6xqkOvI7n/8RvWfFvEYgDyM1mUZVr4+aHxXOQKBgQDlPnBdJ+e5tY0bCpA4EiWu6s7c8VUoqPzHxLd3rKu5fS+2wVgCmF/LXaEJhTnAeDpKlMxPcRkMlA/4oZBcXsHjyvB9zGmTfQ+VhFb2yA2Rk4W6YmLrEb+oIaG/5CZiSdU0gJtYUwAXeTnKsOuIqjG3BwPbqNp9FfHrDx3kQKBgQC8v1yNp0/zWtXN7eEoYdCkSjVbFJiA+Mhwnu9sKjRi4aPZyHc5zvWZ6BnOuIhU2l/7cRlTmq/bqD+KKxIVrE3txyc1m/0gPxtaA9IwLsM8o5eQXUKtOrAYBfVnG1i2tBLz8pKsld+ySdNkD14slDFYIqOcwKBgQCfzOVAKixWJrHmTyldhU+uFbEeO7aEDwvJZAH6sYY+CwQBS97lLYo8eyMxbsMYXWhSBCuuxpPGTHAWL4tGD/qAMdpd3BU/Rn0EXC22jyn/ML0iYZAvG";
			// DECRYPTER
		    $decrypted_chaine1 = str_replace(" ", "+", $val);
		    $decrypted_chaine = openssl_decrypt($decrypted_chaine1, "AES-128-ECB" ,$key_password);
		    $decrypted_chainetable = explode(" ", $decrypted_chaine);

		    if ($pieces[0] <= $decrypted_chainetable[1] && $pieces[1] <= $decrypted_chainetable[2] && $pieces[2] <= $decrypted_chainetable[3] && $pieces[3] <= $decrypted_chainetable[4]) {
		    	$tableautranslect = array(
		    		'action' => true,
		    		'mail' =>  $decrypted_chainetable[0]
		    	);
		    	

		    }else{
		    	$tableautranslect = array(
		    		'action' => false,
		    		'mail' =>  'ErrorPage_template'
		    	);
		    	
		    }
		    return $tableautranslect;
		     // var_dump($tableautranslect); var_dump($decrypted_chaine);return $error;
		    
		   
		}
	}
	public function sete($monnaie)
	{
		$position=$this->company_currency_position();
		$company_currency=$this->company_currency();
		$zz= number_format($monnaie, 0, ',', ' ');
		if ($position== 'N') {
	        $writlen=$zz.' '.$company_currency;
	    }
	    if ($position== 'P') {
	        $writlen=$company_currency.' '.$zz;
	    }

	    return $writlen;
	}

	public function modulenumber($monnaie)
	{
		
		$zz= number_format($monnaie, 0, ',', ' ');
		
	    $writlen=$zz;
	    

	    return $writlen;
	}

	public function render_template($page = null, $data = array())
	{
		
		$this->load->model('model_users');
		$this->load->model('Personne_model');
		$this->load->view('skeleton/header',$data);
		$this->load->view('skeleton/header_menu',$data);
		$this->load->view($page, $data);
		$this->load->view('skeleton/modale_insert',$data);
		$this->load->view('skeleton/footer',$data);
	}
	public function render_primary($page = null, $data = array())
	{
		
		$this->load->view('skeleton/first_part',$data);
		$this->load->view('include/javascript',$data);
		$this->load->view('include/css',$data);
		$this->load->view('skeleton/second_part',$data);
		$this->load->view($page, $data);
		$this->load->view('skeleton/third_part',$data);
		$this->load->view('skeleton/fourth_part',$data);
	}

	public function render_page($page = null, $data = array())
	{
		
		$this->load->view('templates/header_page',$data);
		$this->load->view($page, $data);
		$this->load->view('templates/footer_page',$data);
	}

	public function render_printer($page = null, $data = array())
	{
		
		$this->load->view($page, $data);
	}

	public function company_currency()
	{
		
		$company_currency = $this->model_company->getCompanyData(1);
		$currencies = $this->currency();
			
		$currency = '';
		foreach ($currencies as $key => $value) {
			if($key == $company_currency['currency']) {
				$currency = $value;
			}
		}

		return $currency;

	}

	public function verifcodeconfirmation($codconfi)
	{
		
		$c = $this->model_company->getCompanyData(1);
		if (md5($codconfi)==$c['code_confirmation']) {
			$valeur=true;	
		}
		else{
			$valeur=false;
		}
		

		return $valeur;

	}

	public function codeconfirmation($ligne, $codconfi)
	{
		$ddd = array(
            'type_code' => $ligne,
            'code' => md5($codconfi)
        );
		$this->load->model('model_users');
		return $this->model_users->controle_pass_page($ddd);
	}

	

	public function company_currency_position()
	{
		
		$company_currency = $this->model_company->getCompanyData(1);
		$position = $company_currency['writen'];

		return $position;

	}

	public function company_pays()
	{
		
		
		$currencies = $this->currency();
		$currency = '';
		foreach ($currencies as $key => $value) {
			if($key == $company_currency['currency']) {
				$currency = $value;
			}
		}

		return $currency;

	}
	public function pays(){
		return $valuepays = array (
		  'AF' => 'Afghanistan',
		  'ZA' => 'Afrique du Sud',
		  'AL' => 'Albanie',
		  'DZ' => 'Algérie',
		  'DE' => 'Allemagne',
		  'AD' => 'Andorre',
		  'AO' => 'Angola',
		  'AI' => 'Anguilla',
		  'AQ' => 'Antarctique',
		  'AG' => 'Antigua-et-Barbuda',
		  'SA' => 'Arabie saoudite',
		  'AR' => 'Argentine',
		  'AM' => 'Arménie',
		  'AW' => 'Aruba',
		  'AU' => 'Australie',
		  'AT' => 'Autriche',
		  'AZ' => 'Azerbaïdjan',
		  'BS' => 'Bahamas',
		  'BH' => 'Bahreïn',
		  'BD' => 'Bangladesh',
		  'BB' => 'Barbade',
		  'BE' => 'Belgique',
		  'BZ' => 'Belize',
		  'BJ' => 'Bénin',
		  'BM' => 'Bermudes',
		  'BT' => 'Bhoutan',
		  'BY' => 'Biélorussie',
		  'BO' => 'Bolivie',
		  'BA' => 'Bosnie-Herzégovine',
		  'BW' => 'Botswana',
		  'BR' => 'Brésil',
		  'BN' => 'Brunéi Darussalam',
		  'BG' => 'Bulgarie',
		  'BF' => 'Burkina Faso',
		  'BI' => 'Burundi',
		  'KH' => 'Cambodge',
		  'CM' => 'Cameroun',
		  'CA' => 'Canada',
		  'CV' => 'Cap-Vert',
		  'CL' => 'Chili',
		  'CN' => 'Chine',
		  'CY' => 'Chypre',
		  'CO' => 'Colombie',
		  'KM' => 'Comores',
		  'CG' => 'Congo-Brazzaville',
		  'CD' => 'Congo-Kinshasa',
		  'KP' => 'Corée du Nord',
		  'KR' => 'Corée du Sud',
		  'CR' => 'Costa Rica',
		  'CI' => 'Côte d’Ivoire',
		  'HR' => 'Croatie',
		  'CU' => 'Cuba',
		  'CW' => 'Curaçao',
		  'DK' => 'Danemark',
		  'DJ' => 'Djibouti',
		  'DM' => 'Dominique',
		  'EG' => 'Égypte',
		  'AE' => 'Émirats arabes unis',
		  'EC' => 'Équateur',
		  'ER' => 'Érythrée',
		  'ES' => 'Espagne',
		  'EE' => 'Estonie',
		  'SZ' => 'Eswatini',
		  'VA' => 'État de la Cité du Vatican',
		  'FM' => 'États fédérés de Micronésie',
		  'US' => 'États-Unis',
		  'ET' => 'Éthiopie',
		  'FJ' => 'Fidji',
		  'FI' => 'Finlande',
		  'FR' => 'France',
		  'GA' => 'Gabon',
		  'GM' => 'Gambie',
		  'GE' => 'Géorgie',
		  'GS' => 'Géorgie du Sud et îles Sandwich du Sud',
		  'GH' => 'Ghana',
		  'GI' => 'Gibraltar',
		  'GR' => 'Grèce',
		  'GD' => 'Grenade',
		  'GL' => 'Groenland',
		  'GP' => 'Guadeloupe',
		  'GU' => 'Guam',
		  'GT' => 'Guatemala',
		  'GG' => 'Guernesey',
		  'GN' => 'Guinée',
		  'GQ' => 'Guinée équatoriale',
		  'GW' => 'Guinée-Bissau',
		  'GY' => 'Guyana',
		  'GF' => 'Guyane française',
		  'HT' => 'Haïti',
		  'HN' => 'Honduras',
		  'HU' => 'Hongrie',
		  'BV' => 'Île Bouvet',
		  'CX' => 'Île Christmas',
		  'IM' => 'Île de Man',
		  'NF' => 'Île Norfolk',
		  'AX' => 'Îles Åland',
		  'KY' => 'Îles Caïmans',
		  'CC' => 'Îles Cocos',
		  'CK' => 'Îles Cook',
		  'FO' => 'Îles Féroé',
		  'HM' => 'Îles Heard et McDonald',
		  'FK' => 'Îles Malouines',
		  'MP' => 'Îles Mariannes du Nord',
		  'MH' => 'Îles Marshall',
		  'UM' => 'Îles mineures éloignées des États-Unis',
		  'PN' => 'Îles Pitcairn',
		  'SB' => 'Îles Salomon',
		  'TC' => 'Îles Turques-et-Caïques',
		  'VG' => 'Îles Vierges britanniques',
		  'VI' => 'Îles Vierges des États-Unis',
		  'IN' => 'Inde',
		  'ID' => 'Indonésie',
		  'IQ' => 'Irak',
		  'IR' => 'Iran',
		  'IE' => 'Irlande',
		  'IS' => 'Islande',
		  'IL' => 'Israël',
		  'IT' => 'Italie',
		  'JM' => 'Jamaïque',
		  'JP' => 'Japon',
		  'JE' => 'Jersey',
		  'JO' => 'Jordanie',
		  'KZ' => 'Kazakhstan',
		  'KE' => 'Kenya',
		  'KG' => 'Kirghizistan',
		  'KI' => 'Kiribati',
		  'KW' => 'Koweït',
		  'RE' => 'La Réunion',
		  'LA' => 'Laos',
		  'LS' => 'Lesotho',
		  'LV' => 'Lettonie',
		  'LB' => 'Liban',
		  'LR' => 'Libéria',
		  'LY' => 'Libye',
		  'LI' => 'Liechtenstein',
		  'LT' => 'Lituanie',
		  'LU' => 'Luxembourg',
		  'MK' => 'Macédoine du Nord',
		  'MG' => 'Madagascar',
		  'MY' => 'Malaisie',
		  'MW' => 'Malawi',
		  'MV' => 'Maldives',
		  'ML' => 'Mali',
		  'MT' => 'Malte',
		  'MA' => 'Maroc',
		  'MQ' => 'Martinique',
		  'MU' => 'Maurice',
		  'MR' => 'Mauritanie',
		  'YT' => 'Mayotte',
		  'MX' => 'Mexique',
		  'MD' => 'Moldavie',
		  'MC' => 'Monaco',
		  'MN' => 'Mongolie',
		  'ME' => 'Monténégro',
		  'MS' => 'Montserrat',
		  'MZ' => 'Mozambique',
		  'MM' => 'Myanmar (Birmanie)',
		  'NA' => 'Namibie',
		  'NR' => 'Nauru',
		  'NP' => 'Népal',
		  'NI' => 'Nicaragua',
		  'NE' => 'Niger',
		  'NG' => 'Nigéria',
		  'NU' => 'Niue',
		  'NO' => 'Norvège',
		  'NC' => 'Nouvelle-Calédonie',
		  'NZ' => 'Nouvelle-Zélande',
		  'OM' => 'Oman',
		  'UG' => 'Ouganda',
		  'UZ' => 'Ouzbékistan',
		  'PK' => 'Pakistan',
		  'PW' => 'Palaos',
		  'PA' => 'Panama',
		  'PG' => 'Papouasie-Nouvelle-Guinée',
		  'PY' => 'Paraguay',
		  'NL' => 'Pays-Bas',
		  'BQ' => 'Pays-Bas caribéens',
		  'PE' => 'Pérou',
		  'PH' => 'Philippines',
		  'PL' => 'Pologne',
		  'PF' => 'Polynésie française',
		  'PR' => 'Porto Rico',
		  'PT' => 'Portugal',
		  'QA' => 'Qatar',
		  'HK' => 'R.A.S. chinoise de Hong Kong',
		  'MO' => 'R.A.S. chinoise de Macao',
		  'CF' => 'République centrafricaine',
		  'DO' => 'République dominicaine',
		  'RO' => 'Roumanie',
		  'GB' => 'Royaume-Uni',
		  'RU' => 'Russie',
		  'RW' => 'Rwanda',
		  'EH' => 'Sahara occidental',
		  'BL' => 'Saint-Barthélemy',
		  'KN' => 'Saint-Christophe-et-Niévès',
		  'SM' => 'Saint-Marin',
		  'MF' => 'Saint-Martin',
		  'SX' => 'Saint-Martin (partie néerlandaise)',
		  'PM' => 'Saint-Pierre-et-Miquelon',
		  'VC' => 'Saint-Vincent-et-les-Grenadines',
		  'SH' => 'Sainte-Hélène',
		  'LC' => 'Sainte-Lucie',
		  'SV' => 'Salvador',
		  'WS' => 'Samoa',
		  'AS' => 'Samoa américaines',
		  'ST' => 'Sao Tomé-et-Principe',
		  'SN' => 'Sénégal',
		  'RS' => 'Serbie',
		  'SC' => 'Seychelles',
		  'SL' => 'Sierra Leone',
		  'SG' => 'Singapour',
		  'SK' => 'Slovaquie',
		  'SI' => 'Slovénie',
		  'SO' => 'Somalie',
		  'SD' => 'Soudan',
		  'SS' => 'Soudan du Sud',
		  'LK' => 'Sri Lanka',
		  'SE' => 'Suède',
		  'CH' => 'Suisse',
		  'SR' => 'Suriname',
		  'SJ' => 'Svalbard et Jan Mayen',
		  'SY' => 'Syrie',
		  'TJ' => 'Tadjikistan',
		  'TW' => 'Taïwan',
		  'TZ' => 'Tanzanie',
		  'TD' => 'Tchad',
		  'CZ' => 'Tchéquie',
		  'TF' => 'Terres australes françaises',
		  'IO' => 'Territoire britannique de l’océan Indien',
		  'PS' => 'Territoires palestiniens',
		  'TH' => 'Thaïlande',
		  'TL' => 'Timor oriental',
		  'TG' => 'Togo',
		  'TK' => 'Tokelau',
		  'TO' => 'Tonga',
		  'TT' => 'Trinité-et-Tobago',
		  'TN' => 'Tunisie',
		  'TM' => 'Turkménistan',
		  'TR' => 'Turquie',
		  'TV' => 'Tuvalu',
		  'UA' => 'Ukraine',
		  'UY' => 'Uruguay',
		  'VU' => 'Vanuatu',
		  'VE' => 'Venezuela',
		  'VN' => 'Vietnam',
		  'WF' => 'Wallis-et-Futuna',
		  'YE' => 'Yémen',
		  'ZM' => 'Zambie',
		  'ZW' => 'Zimbabwe',
		);
	}
	public function currency()
	{
		return $currency_symbols = array(
		  'AED' => '&#1583;.&#1573;', // ?
		  'AFN' => '&#65;&#102;',
		  'ALL' => '&#76;&#101;&#107;',
		  'ANG' => '&#402;',
		  'AOA' => '&#75;&#122;', // ?
		  'ARS' => '&#36;',
		  'AUD' => '&#36;',
		  'AWG' => '&#402;',
		  'AZN' => '&#1084;&#1072;&#1085;',
		  'BAM' => '&#75;&#77;',
		  'BBD' => '&#36;',
		  'BDT' => '&#2547;', // ?
		  'BGN' => '&#1083;&#1074;',
		  'BHD' => '.&#1583;.&#1576;', // ?
		  'BIF' => '&#70;&#66;&#117;', // ?
		  'BMD' => '&#36;',
		  'BND' => '&#36;',
		  'BOB' => '&#36;&#98;',
		  'BRL' => '&#82;&#36;',
		  'BSD' => '&#36;',
		  'BTN' => '&#78;&#117;&#46;', // ?
		  'BWP' => '&#80;',
		  'BYR' => '&#112;&#46;',
		  'BZD' => '&#66;&#90;&#36;',
		  'CAD' => '&#36;',
		  'CDF' => '&#70;&#67;',
		  'CHF' => '&#67;&#72;&#70;',
		  'CLP' => '&#36;',
		  'CNY' => '&#165;',
		  'COP' => '&#36;',
		  'CRC' => '&#8353;',
		  'CUP' => '&#8396;',
		  'CVE' => '&#36;', // ?
		  'CZK' => '&#75;&#269;',
		  'DJF' => '&#70;&#100;&#106;', // ?
		  'DKK' => '&#107;&#114;',
		  'DOP' => '&#82;&#68;&#36;',
		  'DZD' => '&#1583;&#1580;', // ?
		  'EGP' => '&#163;',
		  'ETB' => '&#66;&#114;',
		  'EUR' => '&#8364;',
		  'FJD' => '&#36;',
		  'FKP' => '&#163;',
		  'GBP' => '&#163;',
		  'GEL' => '&#4314;', // ?
		  'GHS' => '&#162;',
		  'GIP' => '&#163;',
		  'GMD' => '&#68;', // ?
		  'GNF' => '&#70;&#71;', // ?
		  'GTQ' => '&#81;',
		  'GYD' => '&#36;',
		  'HKD' => '&#36;',
		  'HNL' => '&#76;',
		  'HRK' => '&#107;&#110;',
		  'HTG' => '&#71;', // ?
		  'HUF' => '&#70;&#116;',
		  'IDR' => '&#82;&#112;',
		  'ILS' => '&#8362;',
		  'INR' => '&#8377;',
		  'IQD' => '&#1593;.&#1583;', // ?
		  'IRR' => '&#65020;',
		  'ISK' => '&#107;&#114;',
		  'JEP' => '&#163;',
		  'JMD' => '&#74;&#36;',
		  'JOD' => '&#74;&#68;', // ?
		  'JPY' => '&#165;',
		  'KES' => '&#75;&#83;&#104;', // ?
		  'KGS' => '&#1083;&#1074;',
		  'KHR' => '&#6107;',
		  'KMF' => '&#67;&#70;', // ?
		  'KPW' => '&#8361;',
		  'KRW' => '&#8361;',
		  'KWD' => '&#1583;.&#1603;', // ?
		  'KYD' => '&#36;',
		  'KZT' => '&#1083;&#1074;',
		  'LAK' => '&#8365;',
		  'LBP' => '&#163;',
		  'LKR' => '&#8360;',
		  'LRD' => '&#36;',
		  'LSL' => '&#76;', // ?
		  'LTL' => '&#76;&#116;',
		  'LVL' => '&#76;&#115;',
		  'LYD' => '&#1604;.&#1583;', // ?
		  'MAD' => '&#1583;.&#1605;.', //?
		  'MDL' => '&#76;',
		  'MGA' => '&#65;&#114;', // ?
		  'MKD' => '&#1076;&#1077;&#1085;',
		  'MMK' => '&#75;',
		  'MNT' => '&#8366;',
		  'MOP' => '&#77;&#79;&#80;&#36;', // ?
		  'MRO' => '&#85;&#77;', // ?
		  'MUR' => '&#8360;', // ?
		  'MVR' => '.&#1923;', // ?
		  'MWK' => '&#77;&#75;',
		  'MXN' => '&#36;',
		  'MYR' => '&#82;&#77;',
		  'MZN' => '&#77;&#84;',
		  'NAD' => '&#36;',
		  'NGN' => '&#8358;',
		  'NIO' => '&#67;&#36;',
		  'NOK' => '&#107;&#114;',
		  'NPR' => '&#8360;',
		  'NZD' => '&#36;',
		  'OMR' => '&#65020;',
		  'PAB' => '&#66;&#47;&#46;',
		  'PEN' => '&#83;&#47;&#46;',
		  'PGK' => '&#75;', // ?
		  'PHP' => '&#8369;',
		  'PKR' => '&#8360;',
		  'PLN' => '&#122;&#322;',
		  'PYG' => '&#71;&#115;',
		  'QAR' => '&#65020;',
		  'RON' => '&#108;&#101;&#105;',
		  'RSD' => '&#1044;&#1080;&#1085;&#46;',
		  'RUB' => '&#1088;&#1091;&#1073;',
		  'RWF' => '&#1585;.&#1587;',
		  'SAR' => '&#65020;',
		  'SBD' => '&#36;',
		  'SCR' => '&#8360;',
		  'SDG' => '&#163;', // ?
		  'SEK' => '&#107;&#114;',
		  'SGD' => '&#36;',
		  'SHP' => '&#163;',
		  'SLL' => '&#76;&#101;', // ?
		  'SOS' => '&#83;',
		  'SRD' => '&#36;',
		  'STD' => '&#68;&#98;', // ?
		  'SVC' => '&#36;',
		  'SYP' => '&#163;',
		  'SZL' => '&#76;', // ?
		  'THB' => '&#3647;',
		  'TJS' => '&#84;&#74;&#83;', // ? TJS (guess)
		  'TMT' => '&#109;',
		  'TND' => '&#1583;.&#1578;',
		  'TOP' => '&#84;&#36;',
		  'TRY' => '&#8356;', // New Turkey Lira (old symbol used)
		  'TTD' => '&#36;',
		  'TWD' => '&#78;&#84;&#36;',
		  'UAH' => '&#8372;',
		  'UGX' => '&#85;&#83;&#104;',
		  'USD' => '&#36;',
		  'UYU' => '&#36;&#85;',
		  'UZS' => '&#1083;&#1074;',
		  'VEF' => '&#66;&#115;',
		  'VND' => '&#8363;',
		  'VUV' => '&#86;&#84;',
		  'WST' => '&#87;&#83;&#36;',
		  'XAF' => '&#70;&#67;&#70;&#65;',
		  'XCD' => '&#36;',
		  'XPF' => '&#70;',
		  'YER' => '&#65020;',
		  'ZAR' => '&#82;',
		  'ZMK' => '&#90;&#75;', // ?
		  'ZWL' => '&#90;&#36;',
		  'XOF' => 'F CFA',
		);
	}
}