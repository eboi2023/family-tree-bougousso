<?php 

class Model_localization extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	

	/* get the country data */
	public function getListCountryData()
	{
		$sql = "SELECT * FROM pays ORDER BY `pays`.`nom_fr` ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/* get the city data */
	public function getListCityData()
	{
		$sql = "SELECT * FROM ville ORDER BY `ville`.`nom_fr` ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/* get the city data */
	public function getListStreetOrNeighborhoodgroupData()
	{
		$sql = "SELECT * FROM rue_quartier ORDER BY `rue_quartier`.`nom_fr` ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/* get the country data is id existe or no existe */
	public function selectCountryData($dataid)
	{
		$sql = "SELECT id FROM pays WHERE nom_fr = ?";
		$query = $this->db->query($sql, $dataid);
		if ($query->num_rows() > 0 ) {
			 return $query->row_array();
		 } else {
			 return false;
		 }
	}
	/*verif is existe city for country*/
	public function SelectCityData($id1,$dataval)
	{
		$this->db->select('*');
        $this->db->from('ville');
        $this->db->where("id_pays",$id1);
        $this->db->where("nom_fr",$dataval);
		$query = $this->db->get();
 		if ($query->num_rows() > 0 ) {
			 return $query->row_array();
		 } else {
			 return false;
		 }	
	}

	/*verif is existe city for city*/
	public function CreateCityData($data)
	{
		if($data) {
			$insert = $this->db->insert('ville', $data);
		}
	}

	/*verif is existe Street Or Neighborhood for country*/
	public function SelectZoneData($id1,$dataval)
	{
		$this->db->select('*');
        $this->db->from('rue_quartier');
        $this->db->where("id_ville",$id1);
        $this->db->where("nom_fr",$dataval);
		$query = $this->db->get();
 		if ($query->num_rows() > 0 ) {
			 return $query->row_array();
		 } else {
			 return false;
		 }	
	}

	/*verif is existe city for city*/
	public function CreateZoneData($data)
	{
		if($data) {
			$insert = $this->db->insert('rue_quartier', $data);
		}
	}


	/*verif is existe insert localization*/
	public function SelectLocalizationData($id1,$id2,$id3)
	{
		$this->db->select('*');
        $this->db->from('localisation');
        $this->db->where("id_pays",$id1);
        $this->db->where("id_ville",$id2);
        $this->db->where("id_zone",$id3);
        $query = $this->db->get();
 		if ($query->num_rows() > 0 ) {
			 return $query->row_array();
		 } else {
			 return false;
		 }	
	}

	/*verif is existe city for localization*/
	public function CreateLocalizationData($data)
	{
		if($data) {
			$insert = $this->db->insert('localisation', $data);
		}
	}

	
	

}