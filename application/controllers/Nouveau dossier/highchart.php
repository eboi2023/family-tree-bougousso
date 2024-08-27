<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

/**
*
* @author https://roytuts.com
*/
class Highchart extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('model_highchart');
		$this->load->library('form_validation');
	}

	public function index() {
		$this->load->view('highchart');
	}

	function get_chart_data() {
		if (isset($_POST['start']) AND isset($_POST['end'])) {
			$start_date = $_POST['start'];
			$end_date = $_POST['end'];
			$results = $this->highchart_model->get_chart_data_for_visits($start_date, $end_date);
			if ($results === NULL) {
				echo json_encode('No record found');
			} else {
				echo json_encode($results);
			}
		} else {
			echo json_encode('Date must be selected.');
		}
	}

}

/* End of file highchart.php */
/* Location: ./application/controllers/highchart.php */