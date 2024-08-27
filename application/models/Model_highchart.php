<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

/**
* Description of highchart_model
*
* @author https://www.roytuts.com
*/
class Model_highchart extends CI_Model {

	private $site_log = 'site_log';

	/**
	* get chart data
	*/
	function get_chart_data_for_visits($start_date, $end_date) {
		$sql = 'SELECT SUM(no_of_visits) total_visits, DATE(access_date) day_date FROM site_log WHERE DATE(access_date) >= ? AND DATE(access_date) <= ? GROUP BY DATE(access_date) ORDER BY DATE(access_date) DESC';
		$query = $this->db->query($sql, array($this->db->escape($start_date), $this->db->escape($end_date)));
		if ($query->num_rows() > 0) {
			$data = array();
			foreach ($query->result_array() as $key => $value) {
				$data[$key]['label'] = $value['day_date'];
				$data[$key]['value'] = $value['total_visits'];
			}
			return $data;
		}
		return NULL;
	}

}

/* End of file highchart_model.php */
/* Location: ./application/models/highchart_model.php */