<?php 

class Diplome_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	
	public function listes_diplome(){  
    $this->db->select('');
    $this->db->order_by('id', 'ASC');
    $this->db->from('diplome');
    $query = $this->db->get();
    if ($query->num_rows() > 0 ) {
       return $query->result();
     } else {
       return false;
     }
  }

  //action sur la diplome
    public function verif_diplome($data)
    {  
      $this->db->select();
      $this->db->from('diplome');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
      } else {
        return false;
      }
    }

    //action sur le diplome mode 2
    public function verif_diplome2($data)
    {  
      $this->db->select();
      $this->db->from('action_diplome');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->num_rows();
      } else {
        return false;
      }
    }

    //reception action sur diplome
    public function recep_action_diplome($data)
    {  
      $this->db->select();
      $this->db->from('action_diplome');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
       } else {
         return false;
       }
    }

    public function listes_action_diplome($data)
  {  
    $this->db->select('');
    $this->db->from('action_diplome');
    $this->db->where_in('id_diplome', $data);
    $query = $this->db->get();
    if ($query->num_rows() > 0 ) {
       return $query->result();
     } else {
       return false;
     }
  }

    //reception une profession 
    public function recep_diplome($data)
    {  
      $this->db->select();
      $this->db->from('diplome');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
       } else {
         return false;
       }
    }

    //creation l'une profession
    public function create_diplome($data) 
    {  
      $this->db->insert('diplome',$data);
    }

    //creation l'une diplome
    public function create_action_diplome($data) 
    {  
      $this->db->insert('action_diplome',$data);
    }
    //verif user diplome 
    public function verif_action_diplome($data)
    {  
      $this->db->select();
      $this->db->from('action_diplome');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
       } else {
         return false;
       }
    }

    public function delete_action_diplome($data)
    {  
       
      if($data) {
        $this->db->where('id_personne', $data);
        $delete = $this->db->delete('action_diplome');
        return ($delete == true) ? true : false;
      }
    }

}