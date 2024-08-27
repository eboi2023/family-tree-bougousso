<?php 

class rapport_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function AffichageCountRdvpartient(){  
        $this->db->select('COUNT(id) as `compte`');
        $this->db->from('RDV');
        $this->db->where('actif',1);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }
    public function SelectRapport($select_data){  
        $this->db->select('');
        $this->db->from('rapport');
        $this->db->where($select_data);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }

    public function aff_action_rapport($select_data,$r){  
        $this->db->select('');
        $this->db->from('controle_rapport');
        $this->db->where($select_data);
        $this->db->where('type_action',$r);
        $query = $this->db->get();
        return ($query->num_rows()>0) ? true : false;
    }

    public function compt_action_rapport($select_data,$r){  
        $this->db->select('');
        $this->db->from('action_document');
        $this->db->where($select_data);
        $this->db->where('mode',$r);
        $query = $this->db->get();
        if ($query) {
          return $query->num_rows();
         } else {
           return false;
         }
    }
    

    /* get the caisse data */
    public function aff_rapport_complet($id = null)
    {
      if($id) {
        $sql = "SELECT * FROM document where id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row_array();
      }

      $sql = "SELECT * FROM document ORDER BY `date_rapport` ASC";
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    /* get the caisse data */
    public function aff_rapport_complet2()
    {
      $sql = "SELECT * FROM document ORDER BY `date_rapport` desc";
      $query = $this->db->query($sql);
      return $query->result_array();
    }
    public function envoie($i){  
        $this->db->select('');
        $this->db->from('dossier');
        $this->db->where('ID',$i);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }
    /*public function envoie1($i){  
        $this->db->select('');
        $this->db->from('dossiertse');
        $this->db->where('dd',$i);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }*/
    public function CompteB(){  
        $this->db->select('count(id) as cpte');
        $this->db->from('de_banque');
        $this->db->where('validation =',0);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }
    public function envoie1($i){  
        $this->db->select('');
        $this->db->from('dossier');
        $this->db->where('id',$i);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }
    public function mise_a_jour0($i,$table) 
        {  
           $this->db->where('id',$i);
           $this->db->update('dossier', $table);
      } 
    public function mise_a_jour1($i,$table) 
        {  
           $this->db->where('ID',$i);
           $this->db->update('dossier', $table);
      } 
    public function mise_a_jour2($i,$table) 
        {  
           $this->db->where('id',$i);
           $this->db->update('dossier', $table);
      } 
    public function Modifrdv($i,$dd) 
        {  
           $this->db->where('id',$i);
           $this->db->update('rdv', $dd);
      } 
    public function UpdateService($i,$dd) 
        {  
           $this->db->where('id',$i);
           $this->db->update('service', $dd);
      }
    public function Updatefour($i,$dd) 
        {  
           $this->db->where($i);
           $this->db->update('fourniture', $dd);
      }
    public function AffDonneeDossier2(){  
        $this->db->select('');
        $this->db->from('dossier');
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }
    /*public function SelectPartient($insert_partient){  
        $this->db->select('');
        $this->db->from('partient');
        $this->db->where($insert_partient);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }*/

    public function AffListerapport(){  
        $this->db->select('');
        $this->db->from('document');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }

      //verification dans le document existance
    public function VerificationRapport($data)
    {  
      $this->db->select();
      $this->db->from('document');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return true;
       } else {
         return false;
       }
      }

    //reception dans le document du rapport
    public function RecupRapport($data)
    {  
      $this->db->select();
      $this->db->from('document');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
       } else {
         return false;
       }
      }

      //reception dans le document du rapport
    public function RecupRapport2($id_data)
    {
        if($id_data) {
          $sql = "SELECT * FROM document where id = ?";
          $query = $this->db->query($sql, array($id_data));
          
          return $query->result_array();
        }
    }

    //creation un document
    public function InsertionRapport($data) 
    {  
      $this->db->insert('document',$data);
    }

    public function UpdateRapport($i,$dd) 
        {  
           $this->db->where($i);
           $this->db->update('document', $dd);
      }

    //creation uine action sur le document
    public function InsertionActionRapport($data) 
    {  
      $this->db->insert('action_document',$data);
    }
	   public function Insert31($data) 
    {  
      $this->db->insert('calendrier',$data);
    }
     public function Insert32($data) 
    {  
      $this->db->insert('controle_rapport',$data);
    }

    public function recep_calender(){
      $this->db->select('');
        $this->db->from('calendrier');
        $query = $this->db->get();
        if ($query) {
           return $query->result_array();
         } else {
           return false;
         }
    }

    public function SelectcalederByID($id_data){  
        
        if($id_data) {
          $sql = "SELECT * FROM calendrier where id = ?";
          $query = $this->db->query($sql, array($id_data));
          
          return $query->result_array();
        }
    }
    public function mise_a_jourcalederByID($i,$table) 
        {  
           $this->db->where('id',$i);
           $this->db->update('calendrier', $table);
      } 
    
     public function delete_evenement($data)
    {  
       
      if($data) {
        $this->db->where($data);
        $delete = $this->db->delete('calendrier');
        return ($delete == true) ? true : false;
      }
    }
    //suppurinner le document
    public function delete_rapport($data)
    {  
       
      if($data) {
        $this->db->where($data);
        $delete = $this->db->delete('document');
        return ($delete == true) ? true : false;
      }
    }

    public function insertFicheAnnexe($iddoc,$file){
      $data = array(
        'id_doc' =>$iddoc,
        'lienfiche' => $file,
        'timeinsert' => time()
      );
      $this->db->insert('fichier_annexe',$data); 
    }

    /* get the caisse data */
    public function affFichierAnnexe($id = null)
    {
      if($id) {
        $sql = "SELECT * FROM fichier_annexe where id_doc = ?";
        $query = $this->db->query($sql, array($id));
        return $query->result_array();
      }

      $sql = "SELECT * FROM fichier_annexe ORDER BY `timeinsert` ASC";
      $query = $this->db->query($sql);
      return $query->result_array();
    }

     public function deleteFichierAnnexe($data)
    {  
       
      if($data) {
        $this->db->where($data);
        $this->db->delete('fichier_annexe');
      }
    }




}