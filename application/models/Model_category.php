<?php 

class Model_category extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get active Category infromation */
	public function getActiveCategroy()
	{
		$sql = "SELECT * FROM categories WHERE active = ? GROUP BY name ASC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get active Category infromation */
	public function getActiveCategroy2()
	{
		$sql = "SELECT `categories`.`id` AS `idcategorie` ,`sous_categories`.`id`AS `idsouscategorie`, `categories`.`name` AS `nomcategorie` ,`sous_categories`.`name`AS `nomsouscategorie` FROM `categories`,`sous_categories` WHERE `categories`.`id`=`sous_categories`.`categorie_id` AND `active`= ? GROUP BY `categories`.`name` ASC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the Category data */
	public function getCategoryData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM categories GROUP BY name ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getCategoryData2($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM sous_categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM sous_categories GROUP BY name ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/* get the Category data */
	public function getInCategoryData($id)
	{
		
			$sql = "SELECT * FROM sous_categories WHERE categorie_id = ? GROUP BY name ASC";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		
	}

	public function countCategoryValue($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM sous_categories WHERE categorie_id = ? GROUP BY name ASC";
			$query = $this->db->query($sql, array($id));
			return $query->num_rows();
		}
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('categories', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($id, $data)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('categories', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('categories');
			return ($delete == true) ? true : false;
		}
	}

	/* get the category value data */
	// $id = category_parent_id
	public function getCategoryValueData($id = null)
	{
		if ($id) {
			$sql = "SELECT * FROM sous_categories WHERE categorie_id = ? GROUP BY name ASC";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}
		$sql = "SELECT * FROM sous_categories GROUP BY name ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getCategorieValueById($id = null)
	{
		$sql = "SELECT * FROM sous_categories WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	public function createValue($data)
	{
		if($data) {
			$insert = $this->db->insert('sous_categories', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function updateValue($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('sous_categories', $data);
			return ($update == true) ? true : false;
		}
	}

	public function updateInCategory($id,$data)
	{
		if($data && $id) {
			$this->db->where('categorie_id', $id);
			$update = $this->db->update('sous_categories', $data);
			return ($update == true) ? true : false;
		}
	}

	public function updateValueRemove($id,$data)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('sous_categories', $data);
			return ($update == true) ? true : false;
		}
	}

	public function removeValue($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('sous_categories');
			return ($delete == true) ? true : false;
		}
	}
	
	/* get the name brand for one */
	public function getCategoryValueById($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}

	}

	/* get the name brand for one */
	public function getInCategoryValueById($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM sous_categories WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}

	}

}