<?php

class Dashboard extends CI_Controller{
	
	
	public function __construct(){
	
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');

		
		
		 if($this->session->userdata('MId') == FALSE)
	 		redirect('/home');
		
	}
	
	
	public function index(){
		$this->load->view("header");
		$data['pageTitle'] = 'Dashboard';
		$this->load->view("navMenu", $data);
		$this->load->view("dashboard");
		$this->load->view("footer");
	}
}
?>