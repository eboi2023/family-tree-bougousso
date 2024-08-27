<?php 

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUserData($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM users WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

		$sql = "SELECT code_m,username,`users`.email AS email,firstname,phone,group_name,`users`.id AS iduser,lastname,`user_group`.group_id AS idgroup,cel FROM users,user_group,groups,personne,contact WHERE `users`.id =`user_group`.user_id AND `groups`.id =`user_group`.group_id  AND `personne`.id =`users`.id_info AND `contact`.id =`personne`.id_contact AND  `users`.id != ? AND `user_group`.group_id != ?";
		$query = $this->db->query($sql, array(1,20));
		return $query->result_array();
	}
	public function ListeUserslast(){
		$sql = "SELECT * FROM adhesion,personne WHERE `adhesion`.num_adhe =`personne`.id ORDER BY `nom` ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	

	public function getUserGroup($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM user_group WHERE user_id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			$group_id = $result['group_id'];
			$g_sql = "SELECT * FROM groups WHERE id = ? ";
			$g_query = $this->db->query($g_sql, array($group_id));
			$q_result = $g_query->row_array();
			return $q_result;
		}

	}

	//reception une persomme 
	public function recep_users($data){  
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

	public function create($data = '', $group_id = null)
	{

		if($data && $group_id) {
			$create = $this->db->insert('users', $data);

			$user_id = $this->db->insert_id();

			$group_data = array(
				'user_id' => $user_id,
				'group_id' => $group_id
			);

			$group_data = $this->db->insert('user_group', $group_data);

			return ($create == true && $group_data) ? true : false;
		}
	}

	public function edit($data = array(), $id = null, $group_id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);

		if($group_id) {
			// user group
			$update_user_group = array('group_id' => $group_id);
			$this->db->where('user_id', $id);
			$user_group = $this->db->update('user_group', $update_user_group);
			return ($update == true && $user_group == true) ? true : false;	
		}
			
		return ($update == true) ? true : false;	
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('users');
		return ($delete == true) ? true : false;
	}
	public function delete_users($delete)
	{
		$this->db->where($delete);
		$delete = $this->db->delete('users');
		return ($delete == true) ? true : false;
		
		
	}

	public function delete_user_group($delete)
	{
		$this->db->where($delete);
		$delete = $this->db->delete('user_group');
		return ($delete == true) ? true : false;
		
		
	}

	public function countTotalUsers()
	{
		$sql = "SELECT * FROM users";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}

	public function verific($a, $b)
	{
		$sql = "SELECT * FROM users WHERE id=? AND password=?";
		$query = $this->db->query($sql, array($a, $b));
		if ($query->num_rows()>0) {
			$ret=true;
		} else {
			$ret=false;
		}
		
		return $ret;
	}

	public function veux($a, $b)
	{
		$sql = "SELECT * FROM users WHERE id = ?";
		$query = $this->db->query($sql, array($a));

		if($query->num_rows() == 1) {
			$result = $query->row_array();
			$hash_password = password_verify($b, $result['password']);
			if($hash_password === true) {
				return true;	
			}
			else {
				return false;
			}
		}else{
			return false;
		}
	}

	public function getcontrole($userId = null) 
	{
		if($userId) {
			$sql = "SELECT * FROM user_group WHERE user_id = ? AND group_id= 20";
			$query = $this->db->query($sql, array($userId));
			if ($query->num_rows()>0) {
				$result = true;
			}else{
				$result = false;
			}
			

			return $result;
		}
	}

	public function controle_pass_page($r)
	{  
 		$this->db->select('');		
		$this->db->from('code_valide');
		$this->db->where($r);
  		$query = $this->db->get();
 		if ($query->num_rows() > 0) {
			  return true;
		 } else {
			 return false;
		 }
   	}

   	public function ContrlardEsCode($s1)
	{  
 		$this->db->select('');
		$this->db->from('code_valide');
		$this->db->where($s1);
		$query = $this->db->get();
 		if ($query->num_rows() > 0) {
			 return true;
		 } else {
			 return false;
		 }
   	}

   	public function updateEsCode($id,$data)
	{  
 		$this->db->where('type_code', $id);
        
        if ($this->db->update('code_valide', $data)) {
			  return true;
		 } else {
			 return false;
		 }
 		
   	}

   	public function listes_groups(){  
      $this->db->select('');
      $this->db->from('groups');
      $this->db->not_like('id',20);
      $this->db->not_like('id',1);
      $query = $this->db->get();
      if ($query->num_rows() > 0 ) {
         return $query->result();
       } else {
         return false;
       }
  	}

  	public function update_group_users($id,$data)
	{  
 		$this->db->where('user_id', $id);
        
        if ($this->db->update('user_group', $data)) {
			  return true;
		 } else {
			 return false;
		 }
 		
   	}

   	public function MajProfil($data,$id)
	{  
 		$this->db->where('id', $id);
        
        if ($this->db->update('users', $data)) {
			  return true;
		 } else {
			 return false;
		 }
 		
   	}

   	public function compareUserInPerson($iduser,$numpersonne){  
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
   	
	
}