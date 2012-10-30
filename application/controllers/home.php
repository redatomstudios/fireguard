<?php

class Home extends CI_Controller{
	
	public function __construct(){
	
		parent::__construct();
		$this->load->helper('form');
		
		
		$this->load->helper('url');
		
	}
	
	public function index(){
		$this->load->helper("url");
		$this->load->view("header");
		$this->load->view("homeView");
		$this->load->view("footer");
		
	}
	
	public function register(){
			
		$this->load->helper("form");
		$this->load->view("header");
		$this->load->view("signupView");
		$this->load->view("footer");
			
	}
	
	public function signup(){
		
		$this->load->model("profileModel");
		
		
		$post = $this->input->post();
		
		$data = array('FirstName' => $post['FirstName'],
					 'LastName' => $post['LastName'],
					  'Username' => $post['UserName'],
					  'Password' => $post['Password'],
					  );
		
		$data = $this->input->post();
		$this->profileModel->addProfile($data);
		
	}
	
}

?>