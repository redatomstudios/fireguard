<?php

class ProfileModel extends CI_Model{

	public function createProfile($data){

		$profTable = $opensesameTable = $memberTable = $data;
		unset($profTable['Email'],$profTable['AccessCode']);
		unset($opensesameTable['Email']);
		unset($profTable['AccessCode']);


		$this->db->insert('profile',$profTable);
		$this->db->insert('opensesame',$opensesameTable);
		$this->db->insert('member',$memberTable);
	}
	//test

	public function updateProfile($data){

		
	}

	public function login($data){


	}
}

?>