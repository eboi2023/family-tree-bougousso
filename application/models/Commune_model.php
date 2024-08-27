<?php 

class Commune_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	//verification de la commune
    public function verif_commune($data)
    {  
      $this->db->select();
      $this->db->from('commune');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
       } else {
         return false;
       }
      }

    //reception de la commune
    public function recep_commune($data)
    {  
      $this->db->select();
      $this->db->from('commune');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
       } else {
         return false;
       }
      }

    //creation de la commune
    public function create_commune($data) 
        {  
          $this->db->insert('commune',$data);
      }

    public function RecuperationDonnecommue($data)
    {  
      $this->db->select('');
      $this->db->from('commune');
      $this->db->where("id",$data);
        $query = $this->db->get();
      if ($query) {
        return $query->row_array();
      } else {
        return false;
      }
    }
	
  public function listes_commune($ville=null){  
        $this->db->select('');
        $this->db->order_by('nom_fr', 'ASC');
        $this->db->from('commune');
        if ($ville) {
          $this->db->where('id_ville',$ville);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }

	//reception liste de la commune
    public function recep_liste_commune($data)
    {  
      $this->db->select();
      $this->db->from('commune');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() >0) {
      return $query->result();
     } else {
       return false;
     }
    }

    //reception liste des quartier
    public function recep_liste_quartier($data)
    {  
      $this->db->select();
      $this->db->from('localisation');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() >0) {
      return $query->result();
     } else {
       return false;
     }
    }

    //reception liste des rue
    public function recep_liste_rue($data)
    {  
      $this->db->select();
      $this->db->from('rue');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() >0) {
      return $query->result();
     } else {
       return false;
     }
    }

    //reception liste des residence
    public function recep_liste_residence($data)
    {  
      $this->db->select();
      $this->db->from('residence');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() >0) {
      return $query->result();
     } else {
       return false;
     }
    }
	
	//verification de la localisation
    public function verif_localisation($data)
    {  
      $this->db->select();
      $this->db->from('localisation');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
       } else {
         return false;
       }
      }

    //reception de la localisation
    public function recep_localisation($data)
    {  
      $this->db->select();
      $this->db->from('localisation');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
       } else {
         return false;
       }
      }

    //creation de la localisation
    public function create_localisation($data) 
        {  
          $this->db->insert('localisation',$data);
      }
    public function RecuperationDonnerq($data)
    {  
      $this->db->select('');
      $this->db->from('localisation');
      $this->db->where("id",$data);
        $query = $this->db->get();
      if ($query) {
        return $query->row_array();
      } else {
        return false;
      }
    }

    //verification de l'adresse
    public function verif_adresse($data)
    {  
      $this->db->select();
      $this->db->from('adresse');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
       } else {
         return false;
       }
      }

    public function delete_adresse($data)
    {  
       
      if($data) {
        $this->db->where('id_personne', $data);
        $delete = $this->db->delete('adresse');
        return ($delete == true) ? true : false;
      }
    }

    //reception de l'adresse
    public function recep_adresse($data)
    {  
      $this->db->select();
      $this->db->from('adresse');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
       } else {
         return false;
       }
      }

    //creation de l'adresse
    public function create_adresse($data) 
    {  
      $this->db->insert('adresse',$data);
    }

    public function RecuperationDonneadresse($data)
    {  
      $this->db->select('');
      $this->db->from('adresse');
      $this->db->where("id",$data);
        $query = $this->db->get();
      if ($query) {
        return $query->row_array();
      } else {
        return false;
      }
    }

}