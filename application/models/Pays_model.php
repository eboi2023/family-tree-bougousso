<?php 

class Pays_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function listes_pays(){  
        $this->db->select('');
        $this->db->order_by('nom_fr', 'ASC');
        $this->db->from('pays');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }

    public function RecuperationDonnepays($data)
    {  
      $this->db->select('');
      $this->db->from('pays');
      $this->db->where("id",$data);
        $query = $this->db->get();
      if ($query) {
        return $query->row_array();
      } else {
        return false;
      }
    }
	

}