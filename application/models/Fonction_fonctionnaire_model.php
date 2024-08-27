<?php 

class Fonction_fonctionnaire_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	
	public function listes_fonction_fonctionnaire($typ){  
    $this->db->select('');
    $this->db->order_by('profession', 'ASC');
    $this->db->from('profession');
    $this->db->where('type_profession',$typ);
    $query = $this->db->get();
    if ($query->num_rows() > 0 ) {
       return $query->result();
     } else {
       return false;
     }
  }

  //action sur la profession
    public function verif_profss($data)
    {  
      $this->db->select();
      $this->db->from('profession');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
      } else {
        return false;
      }
    }

    //reception une profession 
    public function recep_profss($data)
    {  
      $this->db->select();
      $this->db->from('profession');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
       } else {
         return false;
       }
    }

    //creation l'une profession
    public function create_profss($data) 
    {  
      $this->db->insert('profession',$data);
    }

    //creation l'une profession
    public function create__action_profss($data) 
    {  
      $this->db->insert('action_profession',$data);
    }

    //action sur la profesion
    public function verif_proffesion($data)
    {  
      $this->db->select();
      $this->db->from('action_profession');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->num_rows();
      } else {
        return false;
      }
    }

    // recuperation sur action de la profesion
    public function recep_proffesion($data)
    {  
      $this->db->select();
      $this->db->from('action_profession');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1) {
        return $query->row_array();
      } else {
        return false;
      }
    }
    public function listes_action_profession($data)
  {  
    $this->db->select('');
    $this->db->from('action_profession');
    $this->db->where_in('id_fonction', $data);
    $query = $this->db->get();
    if ($query->num_rows() > 0 ) {
       return $query->result();
     } else {
       return false;
     }
  }
    public function AffProfPersonne()
  {  
    $this->db->select();    
    $this->db->from('profession');
    $query = $this->db->get();
    if ($query) {
       return $query->result();;
     } else {
       return false;
     }
  }

  public function delete_action_proffesion($data)
  {  
     
    if($data) {
      $this->db->where('id_personne', $data);
      $delete = $this->db->delete('action_profession');
      return ($delete == true) ? true : false;
    }
  }



}