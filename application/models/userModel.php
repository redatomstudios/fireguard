<?php

class UserModel extends CI_Model{
	
	public function createUser($data){
		
		
		$data['MId'] = random_string('alnum', 6);
		$prof = $data;
		unset($prof['Password'],$prof['Email']);
		
		$prof['JoiningDate'] = date("Y-m-d");
		if($this->db->insert('profile',$prof)){
			echo "Inserted into profile table!!";
		}
		else {
			echo "Not insterted into profile";
		}
		
		
		
		$member = $data;
		unset($member['Password'], $member['EmploymentDate'], $member['Age']);
		
		if($this->db->insert('member',$member)){
		
			echo "Inserted into member!";
		}
		else {
			echo "Not insterted into member";
		}
		
		$sesame = array('MId' => $data['MId'],
						'AccessCode' => $data['Password']);
		if($this->db->insert('opensesame',$sesame)){
		
			echo "Inserted into AccessCode!";
		}
		else {
			echo "Not insterted into member";
		}
	}
	
}

?>