<?php

class ProfileModel extends CI_Model{
	
	public function addProfile($data){
		
		echo "First Name: ".$data['FirstName'];
		$this->db->insert('profile',$data);
		
	}
	
}

?>