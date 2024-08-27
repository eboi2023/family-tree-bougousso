<?php 

class Niveau_etude_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function verif_action_etude2($data)
  {  
    $this->db->select();
    $this->db->from('action_new_etude');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return false;
    }
  }

  public function verif_action_etude($data)
  {  
    $this->db->select();
    $this->db->from('action_new_etude');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      return true;
    } else {
      return false;
    }
  }

  public function create_action_etude($data) 
  {  
    $this->db->insert('action_new_etude',$data);
  }

  public function verif_etudes($data)
  {  
    $this->db->select();
    $this->db->from('new_etude');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      return true;
    } else {
      return false;
    }
  }

    //reception une etudes 
  public function recep_etudes($data)
  {  
    $this->db->select();
    $this->db->from('new_etude');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      return $query->row_array();
     } else {
       return false;
     }
  }

  //reception une  action etudes 
  public function recep_action_etudes($data)
  {  
    $this->db->select();
    $this->db->from('action_new_etude');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      return $query->row_array();
     } else {
       return false;
     }
  }


  //creation l'une etudes
  public function create_etudes($data) 
  {  
    $this->db->insert('new_etude',$data);
  }
	
	public function listes_niveau_etude()
  {  
    $this->db->select('');
    $this->db->order_by('id', 'ASC');
    $this->db->from('new_etude');
    $query = $this->db->get();
    if ($query->num_rows() > 0 ) {
       return $query->result();
     } else {
       return false;
     }
  }
  public function listes_action_niveau_etude($data)
  {  
    $this->db->select('');
    $this->db->from('action_new_etude');
    $this->db->where_in('id_etude', $data);
    $query = $this->db->get();
    if ($query->num_rows() > 0 ) {
       return $query->result();
     } else {
       return false;
     }
  }

  public function delete_action_etudes($data)
  {  
     
    if($data) {
      $this->db->where('id_personne', $data);
      $delete = $this->db->delete('action_new_etude');
      return ($delete == true) ? true : false;
    }
  }

}