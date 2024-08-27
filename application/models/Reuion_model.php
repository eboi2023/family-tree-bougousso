<?php 

class Reuion_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  #action liste reuion
    public function lire_listes_Reuion(){  
      $this->db->select('');
      $this->db->order_by('id', 'ASC');
      $this->db->from('type_compteur');
      $query = $this->db->get();
      return $query->result_array();
       
    }

  
    public function verif_liste_Reuion($data)
    {  
      $this->db->select();
      $this->db->from('type_compteur');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() >0 ) {
        return true;
      } else {
        return false;
      }
    }

    public function create_liste_reuion($data) 
    {  
      $this->db->insert('type_compteur',$data);
    }

    public function update_liste_reuion($data,$id)
    {  
      $this->db->where('id', $id);
      if ($this->db->update('type_compteur', $data)) {
          return true;
      } else {
         return false;
      }
    }

    public function recep_liste_reuion($data)
    {  
      $this->db->select();
      $this->db->from('type_compteur');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->result_array();
       } else {
         return false;
       }
    }

    public function recep_liste_reuion2($data)
    {  
      $this->db->select();
      $this->db->from('type_compteur');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() > 0 ) {
        return $query->row_array();
       } else {
         return false;
       }
    }

    public function delete_liste_reuion($data)
    {  
       
      if($data) {
        $this->db->where('id', $data);
        $delete = $this->db->delete('type_compteur');
        return ($delete == true) ? true : false;
      }
    }

  #action liste reuion
    public function lire_listes_presence2($data){  
      $this->db->select('');
      $this->db->order_by('date_prise', 'ASC');
      $this->db->from('compteur');
      $this->db->where($data);
      $query = $this->db->get();
      return $query->result_array();
       
    }
    public function lire_listes_presence(){  
      $this->db->select('');
      $this->db->order_by('id', 'ASC');
      $this->db->from('compteur');
      $query = $this->db->get();
      return $query->result_array();
       
    }

  
    public function verif_liste_presence($data)
    {  
      $this->db->select();
      $this->db->from('compteur');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() >0 ) {
        return true;
      } else {
        return false;
      }
    }

    public function create_liste_presence($data) 
    {  
      $this->db->insert('compteur',$data);
    }

    public function update_liste_presence($data,$id)
    {  
      $this->db->where('id', $id);
      if ($this->db->update('compteur', $data)) {
          return true;
      } else {
         return false;
      }
    }
    public function update_liste_presence2($data,$id)
    {  
      $this->db->where($id);
      if ($this->db->update('compteur', $data)) {
          return true;
      } else {
         return false;
      }
    }

    public function recep_liste_presence($data)
    {  
      $this->db->select();
      $this->db->from('compteur');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->result_array();
       } else {
         return false;
       }
    }

    public function recep_liste_presence2($data)
    {  
      $this->db->select();
      $this->db->from('compteur');
      $this->db->where($data);
      $this->db->order_by('id', 'DESC');
      $query = $this->db->get();
      if ($query->num_rows() > 0 ) {
        return $query->row_array();
       } else {
         return false;
       }
    }

    public function delete_liste_presence($data)
    {  
       
      if($data) {
        $this->db->where('id', $data);
        $delete = $this->db->delete('compteur');
        return ($delete == true) ? true : false;
      }
    }

    public function delete_liste_presence2($data)
    {  
       
      if($data) {
        $this->db->where('id_compteur', $data);
        $delete = $this->db->delete('compteur');
        return ($delete == true) ? true : false;
      }
    }


}