<?php

class Dashboard extends CI_Controller{
	
	
	public function __construct(){
	
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		
	}
	
	
	public function index(){
		$this->load->view("header");
		$this->load->view("navMenu");
		$this->load->view("dashboard");
		$this->load->view("footer");
	}
}
?>