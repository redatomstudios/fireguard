<?php

class ProfileModel extends CI_Model{

	public function createProfile($data){

		$profTable = $opensesameTable = $memberTable = $data;
		unset($profTable['Email'],$profTable['AccessCode']);
		unset($opensesameTable['Email']);
		unset($memberTable['AccessCode']);
		


		$profTable['JoiningDate'] = date("Y-m-d");

		
		$r = $this->db->insert('member',$memberTable);
		if(!$r){

		//echo "Error Number: ".$this->db->_error_number();
		if($this->db->_error_number() == 1062)
			echo "You have already registered!!!";
		}
		else{
			
			$this->db->insert('profile',$profTable);
			$this->db->insert('opensesame',$opensesameTable);
		}
	}
	//test

	public function getProfile($MId){
	
		$data = array();
		//echo 'select FirstName, LastName, EmploymentDate, JoiningDate, Age from profile where MId = "'.$MId.'"';
		$res = $this->db->query('select FirstName, LastName, EmploymentDate, JoiningDate, Age from profile where MId = "'.$MId.'"');
		if($res->num_rows() >0){
			
			
			$r = $res->row();
			$data['FirstName'] = $r->FirstName;
			$data['LastName'] = $r->LastName;
			$data['EmploymentDate'] = $r->EmploymentDate;
			$data['JoiningDate'] = $r->JoiningDate;
			$data['Age'] = $r->Age;
		}
		$res = $this->db->query('select PhoneNumber from member where MId = "'.$MId.'"');
		if($res->num_rows() >0){
			
			
			$r = $res->row();
			$data['Phone'] = $r->PhoneNumber;
		}
			
		return $data;
		
	}
	
	public function updateProfile($data){
		
		$opensesameTable['AccessCode'] = sha1($data['AccessCode']);

		unset($data['AccessCode']);
		$profileTable = $memberTable = $data;

		
		unset($profileTable['PhoneNumber'], $profileTable['MId']);
		unset($memberTable['EmploymentDate'], $memberTable['Age'], $memberTable['MId']);

		$this->db->where('MId', $data['MId']);
		$this->db->update('profile', $profileTable);
		$this->db->update('member', $memberTable);
		$this->db->update('opensesame', $opensesameTable);

		$this->db->flush_cache();
		
	}


	
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