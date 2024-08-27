<?php 

class Nationalite_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	
	//verification de la nationalité
  public function verif_nationalite($data)
  {  
    $this->db->select();
    $this->db->from('nationalite');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      return true;
     } else {
       return false;
     }
  }

  //reception de la nationalité
  public function recep_nationalite($data)
  {  
    $this->db->select();
    $this->db->from('nationalite');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      return $query->row_array();
     } else {
       return false;
     }
  }

  //creation de la nationalité
  public function create_nationalite($data) 
  {  
    $this->db->insert('nationalite',$data);
  }

  public function RecuperationDonnenationalite($data)
  {  
    $this->db->select('');
    $this->db->from('nationalite');
    $this->db->where("id",$data);
      $query = $this->db->get();
    if ($query) {
      return $query->row_array();
    } else {
      return false;
    }
  }

  public function listes_nationalite(){  
      $this->db->select('');
      $this->db->from('nationalite');
      $query = $this->db->get();
      if ($query->num_rows() > 0 ) {
         return $query->result();
       } else {
         return false;
       }
  }

}