<?php 

class Ville_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//verification de la ville
    public function verif_ville($data)
    {  
      $this->db->select();
      $this->db->from('ville');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
       } else {
         return false;
       }
    }

    public function listes_ville($pays=null){  
        $this->db->select('');
        $this->db->order_by('nom_fr', 'ASC');
        $this->db->from('ville');
        if ($pays) {
          $this->db->where('id_pays',$pays);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }

    //reception de la ville
    public function recep_ville($data)
    {  
      $this->db->select();
      $this->db->from('ville');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
      return $query->row_array();
     } else {
       return false;
     }
    }

    //reception liste de la ville
    public function recep_liste_ville($data)
    {  
      $this->db->select();
      $this->db->from('ville');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() >0) {
      return $query->result();
     } else {
       return false;
     }
    }


    //creation de la ville
    public function create_ville($data) 
        {  
          $this->db->insert('ville',$data);
      }

    public function RecuperationDonneville($data)
    {  
      $this->db->select('');
      $this->db->from('ville');
      $this->db->where("id",$data);
        $query = $this->db->get();
      if ($query) {
        return $query->row_array();
      } else {
        return false;
      }
    }
	

}