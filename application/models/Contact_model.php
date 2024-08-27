<?php 

class Contact_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function verif_contact($data)
    {  
      $this->db->select();
      $this->db->from('contact');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
       } else {
         return false;
       }
      }

    //reception de les contact
    public function recep_contact($data)
    {  
      $this->db->select();
      $this->db->from('contact');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
       } else {
         return false;
       }
      }

    //creation de la nationalité
    public function create_contact($data) 
    {  
      $this->db->insert('contact',$data);
    }

    public function delete_contact($data)
    {  
       
      if($data) {
        $this->db->where('id', $data);
        $delete = $this->db->delete('contact');
        return ($delete == true) ? true : false;
      }
    }

    public function RecuperationDonnecontact($data)
    {  
      $this->db->select('');
      $this->db->from('contact');
      $this->db->where("id",$data);
        $query = $this->db->get();
      if ($query) {
        return $query->row_array();
      } else {
        return false;
      }
    }

    public function Majcontct($data,$id)
  	{  
	    $this->db->where('id', $id);
	        
	        if ($this->db->update('contact', $data)) {
	        return true;
	     } else {
	       return false;
	     }
    
    }
	

}