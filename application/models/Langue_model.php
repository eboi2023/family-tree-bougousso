<?php 

class Langue_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function fechTypeLangueList(){  
		$this->db->select('');
		$this->db->order_by('type_language', 'ASC');
		$this->db->from('type_language');
		$query = $this->db->get();
		if ($query->num_rows() > 0 ) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	/* get the language data */
    public function aff_laguage_complet($id = null)
    {
      if($id) {
        $sql = "SELECT * FROM language where phrase_id = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row_array();
      }

      $sql = "SELECT * FROM language ";
      $query = $this->db->query($sql);
      return $query->result_array();
    }

    public function insertLangueList(){
		$count = count($this->input->post('idvalue'));
    	for($x = 0; $x < $count; $x++) {
    		$value_controle = str_replace("'", '`', $this->input->post('value')[$x], $bb);
    		$data = array(
	    		$this->input->post('Langue')[$x] => $value_controle
    		);
    		$this->db->where('phrase_id', $this->input->post('idvalue')[$x]);
			$update = $this->db->update('language', $data);
    	}
    	return true;
    }
    public function Option_Langue(){
    	$this->load->dbforge();
    	if ($this->input->post('action_option_emision')==1) {

            $sql = "SELECT * FROM type_language where type_language = ?";
            $query = $this->db->query($sql, array($this->input->post('add_langue')));
            if ($query->row_array() == 0) {
                $data = array('type_language' => $this->input->post('add_langue') );
        		$insert = $this->db->insert('type_language', $data);
        		if ($insert==true) {
        			$fields = array(
    	        		$this->input->post('add_langue') => array('type' => 'LONGTEXT','null' => FALSE)
    				);
    				$query = $this->dbforge->add_column('language', $fields);
                    if ($query==true) {
                        $perm = array('optact' => 1,'verifval' => 0,'verifvaltab' => 0,'contract' => true );
                        return $perm;
                    }else{
                        $perm = array('optact' => 1,'verifval' => 0,'verifvaltab' => 0,'contract' => false );
                        return $perm;
                    }
        		}else{
                    $perm = array('optact' => 1,'verifval' => 0,'verifvaltab' => 1,'contract' => false );
                    return $perm;
                }
            }else{
                $perm = array('optact' => 1,'verifval' => 1,'verifvaltab' => null,'contract' => false );
                return $perm;
            }
    	}
    	if ($this->input->post('action_option_emision')==2) {
    		$data = array('type_language' => $this->input->post('langue') );
    		$delete = $this->db->delete('type_language', $data);
    		if ($delete == true) {
				$query = $this->dbforge->drop_column('language', $this->input->post('langue'));
	    		if ($query==true) {
                    $perm = array('optact' => 2,'verifval' => 0,'verifvaltab' => 0,'contract' => true );
                    return $perm;
                }else{
                    $perm = array('optact' => 2,'verifval' => 0,'verifvaltab' => 1,'contract' => false );
                    return $perm;
                }
    		}else{
                $perm = array('optact' => 2,'verifval' => 1,'verifvaltab' => null,'contract' => false );
                return $perm;
            }
    	}



		$count = count();
    	for($x = 0; $x < $count; $x++) {
    		$value_controle = str_replace("'", '`', $this->input->post('value')[$x], $bb);
    		$data = array(
	    		$this->input->post('Langue')[$x] => $value_controle
    		);
    		$this->db->where('phrase_id', $this->input->post('idvalue')[$x]);
			$update = $this->db->update('language', $data);
    	}
    	return true;
    }
}