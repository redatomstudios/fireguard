<?php

class ProfileModel extends CI_Model{

	public function createProfile($data){

		$profTable = $opensesameTable = $memberTable = $data;
		unset($profTable['Email'],$profTable['AccessCode']);
		unset($opensesameTable['Email']);
		unset($memberTable['AccessCode']);
		


		$profTable['JoiningDate'] = date("Y-m-d");
		$this->db->insert('profile',$profTable);
		$this->db->insert('opensesame',$opensesameTable);
		$this->db->insert('member',$memberTable);
	}
	//test

	public function getProfile($data){
	
		$this->login($data);
			
		
		
	}
	
	public function updateProfile($data){

		
	}


	/*

		Returns
		0 - Login Failure
		1 - Login Sucess
		2 - Profile Edit
	*/
	public function login($data){

		$res = $this->db->query('select MId, FirstName from member where Email like "'.$data['Email'].'"');
		if($res->num_rows()>0){
			echo "Email present<br>";
			$FirstName = $res->row()->FirstName;
			
			
			$res = $this->db->query('select count(AccessCode) as C from opensesame where AccessCode like "'.sha1($data['Password']).'" AND MId like "'.$res->row()->MId.'"');
			if($res->row()->C > 0){
				echo "Login Success!!";
				if($FirstName == NULL)
					echo "Profile Edit";
				else
					echo "Home page";
			}			
			else {
				echo "Login Failure!!";
			}










		}
	}
}

?>