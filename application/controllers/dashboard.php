<?php

class Dashboard extends CI_Controller{
	
	
	public function __construct(){
	
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');

		
		
		 // if($this->session->userdata('MId') == FALSE)
	 	// 	redirect('/home');
	 	// echo $this->session->userdata('MId');
		
	}
	
	
	public function index(){
		$this->load->view("header");
		$this->load->view("navMenu");
		$this->load->view("dashboard");
		$this->load->view("footer");
	}
}
?>