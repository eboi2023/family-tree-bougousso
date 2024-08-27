<?php 

class Personne_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function Aff_personne(){  
    $this->db->select('');
    $this->db->from('personne');
    $query = $this->db->get();
    if ($query->num_rows() > 0 ) {
       return $query->result();
     } else {
       return false;
     }
  }

  public function verif_personne($data)
  {  
    $this->db->select();
    $this->db->from('personne');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      return true;
    } else {
      return false;
    }
  }
  //creation l'une adherent
    public function create_adherent($data) 
    {  
      $this->db->insert('adhesion',$data);
    }

  public function RecuperationDonnepersonnel($data)
  {  
    $this->db->select('');
    $this->db->from('personne');
    $this->db->where("id",$data);
      $query = $this->db->get();
    if ($query) {
       return $query->row_array();
     } else {
       return false;
     }
    }

  //creation l'une personne
    public function create_personne($data) 
    {  
      $this->db->insert('personne',$data);
    }
    //creation l'une personne
    public function create_unionparent ($data) 
    {  
      $this->db->insert('nee_de',$data);
    }

  //verification de l'adherent
  public function verif_adherent($data)
  {  
    $this->db->select();
    $this->db->from('users');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      return true;
    } else {
      return false;
    }
  }

  public function verif_adherent_not_poste($data)
  {  
    if ($data) {
      $this->db->select();
      $this->db->from('users');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        $this->db->select();
        $this->db->from('users');
        $this->db->where($data);
        $query = $this->db->get();
        $result = $query->row_array();
        $id = $result['id'];

        $this->db->select();
        $this->db->from('user_group');
        $this->db->where('group_id',20);
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        if ($query->num_rows() == 1 ) {
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }


      

      
      $g_sql = "SELECT * FROM user_group WHERE user_id = ?";
      $g_query = $this->db->query($g_sql, array($id));
      if ($g_query->num_rows() == 1){return true;
    } else {
      return false;
    }
    }


    /*$this->db->select();
    $this->db->from('users');
    $this->db->where($data);
    $query = $this->db->get();
    
      return true;
    } else {
      return false;
    }


    if($userId) {
      $sql = "SELECT * FROM user_group WHERE user_id = ?";
      $query = $this->db->query($sql, array($userId));
      $result = $query->row_array();

      $group_id = $result['group_id'];
      $g_sql = "SELECT * FROM groups WHERE id = ? ";
      $g_query = $this->db->query($g_sql, array($group_id));
      $q_result = $g_query->row_array();
      return $q_result;
    }*/
  }

  //reception une persomme 
  public function recep_personne($data)
  {  
    $this->db->select();
    $this->db->from('personne');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      return $query->row_array();
     } else {
       return false;
     }
  }

  //reception une adherent 
  public function recep_adherent($data)
  {  
    $this->db->select();
    $this->db->from('adhesion');
    $this->db->where($data);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      return $query->row_array();
     } else {
       return false;
     }
  }

    public function Majpersonne($data,$id)
  {  
    $this->db->where('id', $id);
        
        if ($this->db->update('personne', $data)) {
        return true;
     } else {
       return false;
     }
  }

   //reception une persomme 
  public function listes_parents($pouid,$data)
  {  
    $arrayparent = array('type_parent' => $pouid,'id_enfant' =>  $data);
    $this->db->select();
    $this->db->from('nee_de');
    $this->db->where($arrayparent);
    $query = $this->db->get();
    if ($query->num_rows() == 1 ) {
      $id_parent=$query->row_array();
      $arrayp = array('id' => $id_parent['id_personne']);
      $this->db->select();
      $this->db->from('personne');
      $this->db->where($arrayp);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
      }else{
        return false;
      }
     } else {
       return false;
     }
  }

  public function listes_action_nee_de($data, $ty)
  {  
    $this->db->select('');
    $this->db->from('nee_de');
    $this->db->where('type_parent', $ty);
    $this->db->where_in('id_personne', $data);
    $query = $this->db->get();
    if ($query->num_rows() > 0 ) {
       return $query->result();
     } else {
       return false;
     }
  }

  public function delete_adherent($data, $data2=null)
  {  
     
    if($data) {
      $this->db->where('id', $data);
      $delete = $this->db->delete('adhesion');
      return ($delete == true) ? true : false;
      
    }
  }

  public function delete_adherent2($data)
  {  
     
    if($data) {
      $this->db->where('id_info', $data);
      $delete = $this->db->delete('users');
      return ($delete == true) ? true : false;
    }
  }

  public function delete_group2($data)
  {  
     
    if($data) {
      $this->db->where('user_id', $data);
      $delete = $this->db->delete('user_group');
      return ($delete == true) ? true : false;
    }
  }

  public function delete_personne($data)
  {  
     
    if($data) {
      $this->db->where('id', $data);
      $delete = $this->db->delete('personne');
      return ($delete == true) ? true : false;
    }
  }

  public function delete_parent($data)
  {  
     
    if($data) {
      $this->db->where('id_enfant', $data);
      $delete = $this->db->delete('nee_de');
      return ($delete == true) ? true : false;
    }
  }

  /* get the caisse data */
  public function Affpersonnereel2($id = null)
  {
    if($id) {
      $sql = "SELECT * FROM personne where id = ?";
      $query = $this->db->query($sql, array($id));
      return $query->row_array();
    }

    $sql = "SELECT * FROM personne WHERE `num_membre` NOT LIKE '%sans%' and `id` NOT LIKE 3 ORDER BY nom ASC";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

   /* get the caisse data */
  public function Affpersonnereel3($a = null, $b = null, $c=null, $d=null, $e=null, $f=null, $g=null, $h=null, $i=null, $j=null, $k=null, $l=null, $m=null, $n=null, $o=null, $p=null, $q=null, $r=null, $s=null, $t=null, $u=null, $v=null, $w=null)
  {
    /*$names = array('Frank', 'Todd', 'James');*/
    
    //slection de la recherche
    $this->db->select('*');
    $this->db->from('personne');
    if ($r || $s || $t) {
      $this->db->join('adresse', 'personne.id = adresse.id_personne');
    }
    $this->db->not_like('num_membre', 'sans');
    if ($a) {
      $this->db->like('num_membre', $a);
    }
    if ($b) {
      $this->db->like('civilite', $b);
    }
    if ($c) {
      $this->db->like('nom', $c);
    }
    if ($d) {
      $this->db->like('prenom', $d);
    }
    if ($e) {
      $this->db->like('pseudo', $e);
    }
    if ($f) {
    $this->db->where("date_naiss like '%".$f."'");
    }
    if ($g) {
        $this->db->where("date_naiss like '%_____".$g."%'");
    }
    if ($h) {
      $this->db->where("date_naiss like '".$h."%'");
    }
    if ($i) {
      $this->db->like('lieu_naiss', $i);
    }
    if ($j) {
      $this->db->like('existe_personne', $j);
    }

    if ($k) {
        $this->db->where_in('personne.id', $k);
    }

    if ($l) {
        $this->db->where_in('personne.id', $l);
    }

    if ($m) {
        $this->db->where_in('personne.id', $m);
    }

    if ($n) {
        $this->db->where_in('personne.id', $n);
    }

    if($o){
      $a_date = explode("-", $o);
      $interp=mktime(0,0,0,$a_date[1],$a_date[2],$a_date[0]);
      $this->db->where('created_on>=', $interp);
    }
    if($p){
      $a_date = explode("-", $p);
      $inters=mktime(24,59,59,$a_date[1],$a_date[2],$a_date[0]);
      $this->db->where('created_on<=', $inters);
    }
    if ($q) {
      $this->db->where_in('id_nationalite', $q);
    }
    if ($r || $s || $t) {
      if ($r) {
        $this->db->where_in('id_pays', $r);
      }
      if ($s) {
        $this->db->where_in('id_ville', $s);
      }
      if ($t) {
        $this->db->where_in('id_commune', $t);
      }
    }
    if ($u) {
        $this->db->where_in('personne.id', $u);
    }
    if ($v) {
        $this->db->where_in('personne.id', $v);
    }
    if ($w) {
        $this->db->where_in('personne.id', $w);
    }
    $query = $this->db->get();
    return $query->result_array();
    
  }

  public function Affadherent()
  {  
    $this->db->select('count(id) as cptes');    
    $this->db->from('adhesion');
    $query = $this->db->get();
    if ($query) {
      return $query->row_array();
    } else {
      return false;
    }
  }
	
  public function Affpersonnesans()
  {  
    $this->db->select('count(id) as cptes');    
    $this->db->from('personne');
    $this->db->where("`num_membre` NOT LIKE '%sans%'");
    $query = $this->db->get();
    if ($query) {
       return $query->row_array();
     } else {
       return false;
     }
  }

  public function Affpersonnereel()
  {  
    $this->db->select();    
    $this->db->from('personne');
    $this->db->where("`num_membre` NOT LIKE '%sans%'");
    $query = $this->db->get();
    if ($query) {
       return $query->result();
     } else {
       return false;
     }
  }

  //mise à jour d'une personne
    public function mise_a_jour_info($i,$nametable,$infotable) 
    {  
       $this->db->where($i);
       $this->db->update($nametable, $infotable);
    }

  //verification de existance du perer et de ma mere
    public function verifparent($data){
      $this->db->select();
      $this->db->from('nee_de');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() > 0 ) {
        return true;
      } else {
        return false;
      }
      
    }

    public function verif_indiv($data)
    {  
      $this->db->select();
      $this->db->from('individu');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
      } else {
        return false;
      }
    }

    //creation 
    public function create_indiv($data) 
    {  
      $this->db->insert('individu',$data);
    }

    //reception une persomme 
    public function recep_indiv($data)
    {  
      $this->db->select();
      $this->db->from('individu');
      $this->db->where($data);
      $query = $this->db->get();
      return $query->row_array();
       
    }

    //mise à jour d'une personne
    public function mise_a_jour_info_personne($i,$nametable,$infotable) 
    {  
       $this->db->where($i);
       if ($this->db->update($nametable, $infotable)) {
        return true;
       } else {
         return false;
       }
       
       
    } 

}