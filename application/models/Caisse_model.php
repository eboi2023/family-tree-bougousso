<?php 

class Caisse_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function aff_somme_entrer($a,$z=null,$y=null,$h=null,$g=null){
    $this->db->select('sum(montant) AS total');
    $this->db->from('action_caisse');
    $this->db->join('type_action_caisse', 'type_action_caisse.id = action_caisse.id_type');
    $this->db->where('type', $a);
    if ($z) {
      $this->db->where('liaison', $z);
    }
    if ($y) {
      $this->db->where('porte', $y);
    }
    if ($h) {
      $this->db->where('date_enreg >', $h);
    }
     if ($g) {
      $this->db->where('date_enreg <', $g);
    }
    $this->db->where('supprimer', 0);
    $query = $this->db->get();
    return $query->row_array();
         
  }

  public function aff_somme_sortie($a,$z=Null,$h=null,$g=null){
    $this->db->select('sum(montant) AS total');
    $this->db->from('action_caisse');
    $this->db->join('type_action_caisse', 'type_action_caisse.id = action_caisse.id_type');
    $this->db->where('type', $a);
    if ($z) {
      $this->db->where('liaison', $z);
    }
    if ($h) {
      $this->db->where('date_enreg >', $h);
    }
     if ($g) {
      $this->db->where('date_enreg <', $g);
    }
    $this->db->where('supprimer', 0);
    $query = $this->db->get();
    return $query->row_array();
         
  }

  public function aff_somme_adhe(){
    $this->db->select('sum(montant) AS total');
    $this->db->from('action_caisse');
    $this->db->join('type_action_caisse', 'type_action_caisse.id = action_caisse.id_type');
    $this->db->where('type', 3);
    $this->db->where('supprimer', 0);
    $query = $this->db->get();
    return $query->row_array();
         
  }

  public function aff_somme_cot(){
    $this->db->select('sum(montant) AS total');
    $this->db->from('action_caisse');
    $this->db->join('type_action_caisse', 'type_action_caisse.id = action_caisse.id_type');
    $this->db->where('type', 4);
    $this->db->where('supprimer', 0);
    $query = $this->db->get();
    return $query->row_array();
         
  }
  public function Montantvers($num_code){
    $this->db->select('sum(montant) AS total');
    $this->db->from('action_caisse');
    $this->db->join('type_action_caisse', 'type_action_caisse.id = action_caisse.id_type');
    $this->db->join('adhesion', 'adhesion.id = action_caisse.id_individu');
    $this->db->join('personne', 'personne.id = adhesion.num_adhe');
    $this->db->where('type', 4);
    $this->db->where('supprimer', 0);
    $this->db->where('num_membre', $num_code);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row_array();
    } else {
      return false;
    }
    
    
         
  }
  
  public function somme_sortie(){
    $this->db->select('sum(sortie)');
    $this->db->from('caisse_directe');
    $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
  }
  public function Aff_caisse(){  
        $this->db->select('');
        $this->db->from('action_caisse');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }

    //compter le nombre de jour de travail
    public function AffFourni($q1,$q2,$q3)
    {  
      $sql = "SELECT count(`id`) AS cptes FROM action_caisse where `supprimer`= 0 AND `id_type`=".$q1." AND `date_enreg`>=".$q2." AND `date_enreg`<=".$q3." ";

       $query = $this->db->query($sql);
      if ($query) {
         return $query->row_array();
       } else {
         return false;
       }
    }

    /* get the caisse data */
    public function Aff_caisse2($id = null,$h = null,$g = null)
    {
      if($id) {
        $sql = "SELECT * FROM action_caisse where id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row_array();
      }

      
      if ($h && $g) {
        $sql = "SELECT * FROM action_caisse WHERE `date_enreg`>=".$h." AND `date_enreg`<=".$g." ORDER BY `date_enreg` ASC";
      }else{
        $sql = "SELECT * FROM action_caisse ORDER BY date_enreg DESC";
      }
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    /* get the caisse data */
    public function Aff_caisse4($id = null,$h=null,$g=null)
    {
        
      if ($id==1) {
          if ($h && $g) {
            $sql = "SELECT `action_caisse`.`id` AS id,`porte`, `vide`, `raison`, `date_enreg`, `montant`, `id_type`, `id_individu`, `supprimer`, `type_action_caisse`.`id` AS idtype, `type`, `nom` FROM action_caisse, type_action_caisse where `type_action_caisse`.`id`=`action_caisse`.`id_type` AND `type` IN ( 1,2)  AND `date_enreg`>=".$h." AND `date_enreg`<=".$g." ORDER BY `date_enreg` DESC";
          } else {
            $sql = "SELECT `action_caisse`.`id` AS id,`porte`, `vide`, `raison`, `date_enreg`, `montant`, `id_type`, `id_individu`, `supprimer`, `type_action_caisse`.`id` AS idtype, `type`, `nom` FROM action_caisse, type_action_caisse where `type_action_caisse`.`id`=`action_caisse`.`id_type` AND `type` IN ( 1,2) ORDER BY `date_enreg` DESC";
          }
          
          
      }
      if ($id==2) {
          if ($h && $g) {
            $sql = "SELECT `action_caisse`.`id` AS id,`porte`, `vide`, `raison`, `date_enreg`, `montant`, `id_type`, `id_individu`, `supprimer`, `type_action_caisse`.`id` AS idtype, `type`, `nom` FROM action_caisse, type_action_caisse where `type_action_caisse`.`id`=`action_caisse`.`id_type` AND `type` IN ( 3,4)  AND `date_enreg`>=".$h." AND `date_enreg`<=".$g." ORDER BY `date_enreg` DESC";
          } else {
            $sql = "SELECT `action_caisse`.`id` AS id,`porte`, `vide`, `raison`, `date_enreg`, `montant`, `id_type`, `id_individu`, `supprimer`, `type_action_caisse`.`id` AS idtype, `type`, `nom` FROM action_caisse, type_action_caisse where `type_action_caisse`.`id`=`action_caisse`.`id_type` AND `type` IN ( 3,4) ORDER BY `date_enreg` DESC";
          }
      }
      if ($id==3) {
          if ($h && $g) {
            $sql = "SELECT `action_caisse`.`id` AS id,`porte`, `vide`, `raison`, `date_enreg`, `montant`, `id_type`, `id_individu`, `supprimer`, `type_action_caisse`.`id` AS idtype, `type`, `nom` FROM action_caisse, type_action_caisse where `type_action_caisse`.`id`=`action_caisse`.`id_type` AND `type` IN ( 5,6)  AND `date_enreg`>=".$h." AND `date_enreg`<=".$g." ORDER BY `date_enreg` DESC";
          } else {
            $sql = "SELECT `action_caisse`.`id` AS id,`porte`, `vide`, `raison`, `date_enreg`, `montant`, `id_type`, `id_individu`, `supprimer`, `type_action_caisse`.`id` AS idtype, `type`, `nom` FROM action_caisse, type_action_caisse where `type_action_caisse`.`id`=`action_caisse`.`id_type` AND `type` IN ( 5,6) ORDER BY `date_enreg` DESC";
          }
      }
        
      $query = $this->db->query($sql);
      return $query->result_array();
     
    }

    /* get the caisse data */
    public function Aff_caisse3($id = null)
    {
      $sql = "SELECT `action_caisse`.`id` AS idaction,`vide`,`raison`,`date_enreg`,`montant`,`id_type`,`id_individu`,`supprimer`,`type_action_caisse`.`id`AS idtypeactioncaisse,`type`,`nom` FROM action_caisse,type_action_caisse,adhesion WHERE `action_caisse`.id_type=`type_action_caisse`.id AND `adhesion`.id=`action_caisse`.id_individu AND nom='cotisation' AND num_adhe=? ORDER BY date_enreg DESC";
      $query = $this->db->query($sql, array($id));
      return $query->result_array();
    }

    public function MajActionCaisse($data,$id)
    {  
      $this->db->where('id', $id);
      $verif = $this->db->update('action_caisse', $data);          
      return ($verif == true) ? true : false;
      
      }
      public function MajActionCaisse2($data,$id)
    {  
      $this->db->where('vide', $id);
      $verif = $this->db->update('action_caisse', $data);          
      return ($verif == true) ? true : false;
      
      }

    /* get the caisse data */
    public function rep_date_caisse($id = null)
    {
      if($id) {
        $sql = "SELECT * FROM caisse_reel where id = ? ORDER BY id DESC";
        $query = $this->db->query($sql, array($id));
        return $query->row_array();
      }

      $sql = "SELECT * FROM caisse_reel";
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    public function Aff_type_caisse($a){  
        $this->db->select('');
        $this->db->from('type_action_caisse');
        $this->db->where('type', $a);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    

    public function verif_actioncaisse($data)
    {  
      $this->db->select();
      $this->db->from('action_caisse');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
      } else {
        return false;
      }
    }

    public function verif_typactcaisse($data)
    {  
      $this->db->select();
      $this->db->from('type_action_caisse');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
      } else {
        return false;
      }
    }

    //creation 
    public function create_typactcaisse($data) 
    {  
      $this->db->insert('type_action_caisse',$data);
    }

    //reception une caisse 
    public function recep_typactcaisse($data)
    {  
      $this->db->select();
      $this->db->from('type_action_caisse');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
       } else {
         return false;
       }
    }

    //reception une caisse 
    public function recep_typactcaisse2()
    {  
      $this->db->select();
      $this->db->from('type_action_caisse');
      $query = $this->db->get();
      if ($query->num_rows() >0 ) {
        return $query->result();
       } else {
         return false;
       }
    }

    //reception une caisse 
    public function recep_Id_caisse($data)
    {  
      $this->db->select();
      $this->db->from('action_caisse');
      $this->db->where($data);
      
      $query = $this->db->get();
      if ($query->num_rows() > 0 ) {
        return $query->row_array();
       } else {
         return false;
       }
    }

    

    public function delete_ActionCaisse($data)
    {  
       
      if($data) {
        $this->db->where($data);
        $delete = $this->db->delete('action_caisse');
        return ($delete == true) ? true : false;
      }
    }

    public function Insert13($data) 
    {  
      $this->db->insert('action_caisse',$data);
    }
    public function Insert31($data) 
    {  
      $this->db->insert('caisse_reel',$data);
    }
	
	

}