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
	
		//$this->login($data);
			
		
		
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

		$res = $this->db->query('select MId from member where Email like "'.$data['Email'].'"');
		if($res->num_rows()>0){
			
			$res1 = $this->db->query('select count(AccessCode) as C from opensesame where AccessCode like "'.sha1($data['Password']).'" AND MId like "'.$res->row()->MId.'"');
			if($res1->row()->C > 0){
				//echo "Login Success!!";
				$ses= array('MId' => $res->row()->MId,'Email' => $data['Email']);
				$this->session->set_userdata($ses);
				return 1;
			}			
			else {
				//echo "Login Failure!!";
				return 0;
			}
		}
	}


	public function isEmptyProfile($MId){
		//$this->db->select('MId');
		//$query = $this->db->get_where('profile', array('MId' => $MId, 'FirstName' => NULL)) ;
		$query = $this->db->query('select * from profile where MId like "'.$MId.'" AND FirstName like ""');
		if($query->num_rows() >0){
			return true;
		}
		else{
			return false;
		}
	}
}

?>