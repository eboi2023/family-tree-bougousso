<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesoutil extends CI_Model {
    
    
    public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
	
	/*private $Table = 'stock';
    var $select_column = array("libelle_produit","entree_stock","sortie_stock","date_entree","date_sortie","origine_stock");
    var $order_column = array("libelle_produit","entree_stock","sortie_stock","date_entree","date_sortie","origine_stock");*/
    
    //affichage du contenu du stock entree
    public function Affichagestockentree(){  
        $this->db->select('id,libelle,entree,origine,datemod');
        $this->db->from('stock');
        $this->db->where('sortie',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    //affichage ducontenu du stock sortie
    public function Affichagestocksortie(){  
        $this->db->select('id,libelle,sortie,origine,datemod');
        $this->db->from('stock');
        $this->db->where('entree',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
  
  
  

  
  public function Aff_service(){  
        $this->db->select('');
        $this->db->from('service');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
  public function Aff_client(){  
        $this->db->select('');
        $this->db->from('membres');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
  public function Aff_agences(){  
        $this->db->select('');
        $this->db->from('agence_stock');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
  public function Aff_fournisseurs(){  
        $this->db->select('');
        $this->db->from('fournisseur');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
  public function SelectProduit($rech)
  {  
    $this->db->select('');    
    $this->db->from('item');
    $this->db->where($rech);
    $query = $this->db->get();
    if ($query) {
       return $query->row_array();
     } else {
       return false;
     }
    }
  public function SelectProduit1()
  {  
    $this->db->select('');    
    $this->db->from('item');
    $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    public function Selectfournir($rech)
  {  
    $this->db->select('');    
    $this->db->from('fourniture');
    $this->db->where($rech);
    $query = $this->db->get();
    if ($query) {
       return $query->row_array();
     } else {
       return false;
     }
    }
  public function Aff_categories(){  
        $this->db->select('');
        $this->db->from('item_categorie');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
   public function Aff_sous_categorie(){  
        $this->db->select('');
        $this->db->from('item_scategorie');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    public function Aff_marque(){  
        $this->db->select('');
        $this->db->from('item_marque');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }

  /*public function AffStock()
  {  
    $this->db->select('sum(qte) as cptes');    
    $this->db->from('fourniture');
    $query = $this->db->get();
    if ($query) {
       return $query->row_array();
     } else {
       return false;
     }
    }*/
  //recuperation des donnees produits
  public function liste_employer(){  
    $this->db->select('*');
    $this->db->from('users');
    $query = $this->db->get();
    if ($query->num_rows() > 0 ) {
      return $query->result_array();
    } else {
      return false;
    }
  }

  

  

  

  /*public function AffFourni()
  {  
    $this->db->select('count(id) as cptes');    
    $this->db->from('fournisseur');
    $query = $this->db->get();
    if ($query) {
       return $query->row_array();
     } else {
       return false;
     }
    }*/
  public function selectb($rech)
  {  
    $this->db->select('');    
    $this->db->from('brandc');
    $this->db->where($rech);
    $query = $this->db->get();
    if ($query) {
       return $query->row_array();
     } else {
       return false;
     }
    }

    public function Aff_color(){  
        $this->db->select('');
        $this->db->from('item_couleur');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }

    public function Aff_taille(){  
        $this->db->select('');
        $this->db->from('item_taille');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }

    
    
    public function Aff_banque(){  
        $this->db->select('');
        $this->db->from('de_banque');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }

    public function Aff_acte(){  
        $this->db->select('');
        $this->db->from('acte');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    
    /*public function Aff_partient(){  
        $this->db->select('');
        $this->db->from('partient');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }*/
    Public function AffichageListeRdvpartient(){
      $this->db->select('');
      $this->db->from('RDV');
      $this->db->where('actif', 1);
      $query = $this->db->get();
    if ($query->num_rows() > 0 ) {
       return $query->result();
     } else {
       return false;
     }
    } 

    public function AffichageListepartientId($rech){  
        $this->db->select('');
        $this->db->from('dossier');
        $this->db->where("(id =".$rech.")");
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    
    public function Aff_dossier(){  
        $this->db->select('');
        $this->db->from('dossier');
        $this->db->where('actif',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    public function AffDonneeDossier($r1){  
        $this->db->select('');
        $this->db->from('dossier');
        $this->db->where("(id =".$r1." and actif = 0)");
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    public function AffRDVForme(){  
        $this->db->select('');
        $this->db->from('RDV');
        $this->db->where('actif',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    
    public function SelectAssu($ths){  
        $this->db->select('');
        $this->db->from('assurance');
        $this->db->where('assurance',$ths);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }

    public function selectass($lig){  
        $this->db->select('');
        $this->db->from('assurance');
        $this->db->where('assurance',$lig);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }

    public function SelectBon($insert_Bon){  
        $this->db->select('');
        $this->db->from('bon');
        $this->db->where($insert_Bon);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }
    public function AffListeDossier(){  
        $this->db->select('');
        $this->db->from('dossier');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    


    public function AffListeAssurance(){  
        $this->db->select('');
        $this->db->from('assurance');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    public function AffListeAssurances($part2){  
        $this->db->select('');
        $this->db->from('assurance');
        $this->db->where('id',$part2);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    public function AffListeAssururee(){  
        $this->db->select('');
        $this->db->from('assurer');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    public function AffListeAssurure($part1){  
        $this->db->select('matricule_assurance');
        $this->db->from('assurer');
        $this->db->where('id_dossier',$part1);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    public function AffListeBon(){  
        $this->db->select('');
        $this->db->from('bon');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    










    public function Aff_prestation(){  
        $this->db->select('');
        $this->db->from('prestation');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    public function VerifModif(){  
        $this->db->select('');
        $this->db->from('dossier');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }
    

    public function VerifDossier($part1){  
      $this->db->select();
      $this->db->from('dossier');
      $this->db->where('id',$part1);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }

    public function VerifAssurancein($lig){  
      $this->db->select();
      $this->db->from('assurance');
      $this->db->where('assurance',$lig);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }


    public function VerifAssurance($part2){  
      $this->db->select();
      $this->db->from('assurance');
      $this->db->where('id',$part2);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }
    public function VerifDossier1($verif_data){  
      $this->db->select();
      $this->db->from('dossier');
      $this->db->where($verif_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }
    public function VerifUser($verif_data){  
      $this->db->select();
      $this->db->from('users');
      $this->db->where($verif_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }
    public function verifibamque($data1){  
      $this->db->select();
      $this->db->from('de_banque');
      $this->db->where($data1);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }
    public function verififournisseurs($insert_data){  
      $this->db->select();
      $this->db->from('fournisseur');
      $this->db->where($insert_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }
    public function verifiagences($insert_data){  
      $this->db->select();
      $this->db->from('fournisseur');
      $this->db->where($insert_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }
    public function verifitem($insert_data){  
      $this->db->select();
      $this->db->from('item');
      $this->db->where($insert_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }

    public function verififo($insert_data){  
      $this->db->select();
      $this->db->from('fourniture');
      $this->db->where($insert_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }
  public function verificategorie($insert_data){  
      $this->db->select();
      $this->db->from('item_categorie');
      $this->db->where($insert_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }

    public function verifisouscategorie($insert_data){  
      $this->db->select();
      $this->db->from('item_scategorie');
      $this->db->where($insert_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }
    
    public function verificolor($insert_data){  
      $this->db->select();
      $this->db->from('item_couleur');
      $this->db->where($insert_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }

    public function verifitaille($insert_data){  
      $this->db->select();
      $this->db->from('item_taille');
      $this->db->where($insert_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }

    public function verifimarque($insert_data){  
      $this->db->select();
      $this->db->from('item_marque');
      $this->db->where($insert_data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }
    public function VerifAssances($EE){  
      $this->db->select();
      $this->db->from('assurance');
      $this->db->where('assurance',$EE);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
         return true;
       } else {
         return false;
       }
    }
    public function VerifAssurer($art1,$art2){  
      $this->db->select();
      $this->db->from('assurer');
      $this->db->where("(id_assurance =".$art2." and id_dossier = ".$art1." and date >= ".time().")");
      $query = $this->db->get();
      if ($query->num_rows() ==1 ) {
         return true;
       } else {
         return false;
       }
    }

    public function VerifPartient($insert_partient){  
      $this->db->select();
      $this->db->from('dossier');
      $this->db->where($insert_partient);
      $query = $this->db->get();
      if ($query->num_rows() ==1 ) {
         return true;
       } else {
         return false;
       }
    }
    public function Verifbon($insert_Bon){  
      $this->db->select();
      $this->db->from('bon');
      $this->db->where($insert_Bon);
      $query = $this->db->get();
      if ($query->num_rows() ==1 ) {
         return true;
       } else {
         return false;
       }
    }
    /*public function Aff_entreecaisse(){  
        $this->db->select('id,libelle,entree,date');
        $this->db->from('caisse_directe');
        $this->db->where('sortie',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }*/
  public function Aff_sortiecaisse(){  
        $this->db->select('id,libelle,sortie,date');
        $this->db->from('caisse_directe');
        $this->db->where('entree',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    public function load_avatar() {
      $upload_data = $this->upload->data();
      $this->db->set('user_avatar', $upload_data['file_name']);
      return $this->db->insert('avatar');  
    }
    
    public function insDossier1($tabl)
        {  
          $this->db->insert('dossier',$tabl);
      }
 public function InsertAssurer($tabl)
        {  
          $this->db->insert('assurer',$tabl);
      }
    public function InsertAssurance($tabl)
        {  
          $this->db->insert('assurance',$tabl);
      }
      public function Insertrdv($tabl)
        {  
          $this->db->insert('rdv',$tabl);
      }

    public function Insertincaisse1($data) 
        {  
          $this->db->insert('service',$data);
      } 
 
    public function Insertincaisse2($data) 
        {  
          $this->db->insert('type_service',$data);
      }
      public function Insertincaisse3($data) 
        {  
          $this->db->insert('acte',$data);
      } 
      public function Insertincaisse7($data) 
        {  
          $this->db->insert('document',$data);
      } 
      public function Insertinvente40($insert_data) 
        {  
          $this->db->insert('prestation',$insert_data);
      }
  //insertion dans la vente
    public function Insertinvente($data) 
        {  
          $this->db->insert('V_produit',$data);
      } 
      /*public function Insertincaisse24($insert_partient) 
        {  
          $this->db->insert('partient',$insert_partient);
      }*/
    public function Insertincaisse26($insert_Bon) 
        {  
          $this->db->insert('bon',$insert_Bon);
      }
      public function Insertincaisse27($insert_dossier) 
        {  
          $this->db->insert('dossier',$insert_dossier);
      }
      public function Insertincaisse12($additional_data) 
        {  
          $this->db->insert('users',$additional_data);
      }
  public function Insertincaisse25($th) 
        {  

          $this->db->insert('assurance',$th);
      }
  
  public function Insert10($data) 
        {  
          $this->db->insert('item_categorie',$data);
      }
  public function Insert11($data) 
        {  
          $this->db->insert('item_scategorie',$data);
      }
  public function Insert12($data) 
        {  
          $this->db->insert('item_marque',$data);
      }
  
  public function Insert15($data) 
        {  
          $this->db->insert('item_taille',$data);
      }
  public function Insert16($data) 
        {  
          $this->db->insert('fournisseur',$data);
      }
  public function Insert17($data) 
        {  
          $this->db->insert('agence_stock',$data);
      }
  public function Insert18($data) 
        {  
          $this->db->insert('item',$data);
      }
  public function Insert19($data4) 
        {  
          $this->db->insert('fourniture',$data4);
      }

  public function Insert20($data4) 
        {  
          $this->db->insert('de_banque',$data4);
      }
  public function mise_a_jour_i1($p,$data4) 
        {  
          $this->db->insert($p,$data4);
      }
  //recuperation des donnees produits
  public function listevente_produit(){  
        $this->db->select('*');
        $this->db->from('V_produit');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
  
  
  
  
  public function vente_produit(){  
        $this->db->select('*');
        $this->db->from('st_produit');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    
    public function Aff_fournisseurs1($lig){  
        $this->db->select('');
        $this->db->from('fourniture');
        $this->db->where($lig);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }
    public function Aff_item1($lig){  
        $this->db->select('');
        $this->db->from('item');
        $this->db->where($lig);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }
    public function verifq($lig){  
        $this->db->select('');
        $this->db->from('item1');
        $this->db->where($lig);
        $query = $this->db->get();
        if ($query->num_rows() == 1 ) {
           return true;
         } else {
           return false;
         }
    }
    public function SelectProduitv1($lig){  
        $this->db->select('');
        $this->db->from('item1');
        $this->db->where($lig);
        $query = $this->db->get();
        if ($query) {
           return $query->row_array();
         } else {
           return false;
         }
    }
    public function Insert18v($data4) 
        {  
          $this->db->insert('item1',$data4);
      }
    public function MiseAjoutv($i,$table) 
        {  
           $this->db->where('id',$i);
           $this->db->update('fourniture', $table);
      }









    public function listes_group(){  
        $this->db->select('');
        $this->db->from('groups');
        $query = $this->db->get();
        if ($query->num_rows() > 0 ) {
           return $query->result();
         } else {
           return false;
         }
    }
    
    

  

    

    

    

    


      


    

    

    


    

    public function verif_user_exist($data)
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

    //reception un user 
    public function recep_user_exist($data)
    {  
      $this->db->select();
      $this->db->from('users');
      $this->db->where($data);
      $query = $this->db->get();
      if ($query->num_rows() == 1 ) {
        return $query->row_array();
       } else {
         return false;
       }
      }

    //creation user
    public function create_user_exist($data) 
        {  
          $this->db->insert('users',$data);
      }
      //creation liesion de groupe
    public function create_user_group($data) 
        {  
          $this->db->insert('users_groups',$data);
      }

    

    

    
    

  

  
}
  
