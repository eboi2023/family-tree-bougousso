<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */


if ( ! function_exists('get_phrase'))
{
	function get_phrase($phrase = '',$typephrase=0) {
        $phrase = str_replace(' ','_',trim(strtolower($phrase)));
		$CI	=&	get_instance();
		$CI->load->database();
		$current_language	=	$CI->db->get_where('users' )->row()->language;

		if ( $current_language	==	'') {
			$current_language	=	'english';
			$CI->session->set_userdata('current_language' , $current_language);
		}


		/** insert blank phrases initially and populating the language db ***/
		$check_phrase	=	$CI->db->get_where('language' , array('phrase' => $phrase))->num_rows();
		if ( $check_phrase == 0)
			$CI->db->insert('language' , array('phrase' => $phrase));

		// query for finding the phrase from `language` table
		$query	=	$CI->db->get_where('language' , array('phrase' => $phrase));
		$row   	=	$query->row();

		// return the current sessioned language field of according phrase, else return uppercase spaced word
		if (isset($row->$current_language) && $row->$current_language !=""){
			if ($typephrase==0) {# Do nothing
				return $row->$current_language;	
			}
			if ($typephrase==1) {# All caps
				return mb_strtoupper($row->$current_language, 'UTF-8');
			}
			if ($typephrase==2) {# All in lower case
				return mb_strtolower($row->$current_language, 'UTF-8');	
			}
			if ($typephrase==3) {# First letter in capitals
				return ucfirst(mb_strtoupper($row->$current_language, 'UTF-8'));	
			}
			if ($typephrase==4) {# All first letters in capitals
				return ucwords(mb_strtoupper($row->$current_language, 'UTF-8'));	
			}
			
			
		}
		else
			if ($typephrase==0) {# Do nothing
				return str_replace('_',' ',$phrase);
			}
			if ($typephrase==1) {# All caps
				return strtoupper(str_replace('_',' ',$phrase));
			}
			if ($typephrase==2) {# All in lower case
				return strtolower(str_replace('_',' ',$phrase));
			}
			if ($typephrase==3) {# First letter in capitals
				return ucfirst(str_replace('_',' ',$phrase));
			}
			if ($typephrase==4) {# All first letters in capitals
				return ucwords(str_replace('_',' ',$phrase));
			}
	}
}

// ------------------------------------------------------------------------
/* End of file language_helper.php */
/* Location: ./system/helpers/language_helper.php */
