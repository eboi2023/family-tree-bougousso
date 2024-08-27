<?php 

class Model_company extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getCompanyData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM company WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('company', $data);

			return ($update == true) ? true : false;
		}
	}

	public function verific($a)
	{
		$sql = "SELECT * FROM company WHERE id=1 AND code_confirmation=?";
		$query = $this->db->query($sql, array($a));
		if ($query->num_rows()>0) {
			$ret=true;
		} else {
			$ret=false;
		}
		
		return $ret;
	}

}