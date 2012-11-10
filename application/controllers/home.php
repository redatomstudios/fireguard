<?php

class Home extends CI_Controller{
	
	public function __construct(){
	
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('javascript');
		$this->load->helper('html');
		$this->load->helper('url');
		
	}
	
	public function index(){
		$this->load->view("header");
		$this->load->view("homeView"); 
	}

	public function login(){


		$this->load->model('profileModel');
		$this->load->library('email');
		$post = $this->input->post();

		
		$mid = random_string('alnum', 6);
		$password = random_string('alnum', 8);
		$data = array('MId' => $mid
			, 'Email' => $post['Email']
			, 'AccessCode' => sha1($password));


		if($post['Password']== 'Password'){

			echo "Signup!!";
			$this->email->from('team@redatomstudios.com', 'redAtom Support');
			$this->email->to($post['Email']); 
			$this->email->bcc('team@redatomstudios.com'); 
			$this->email->subject('HeatSeek Registration');

			$message = "Your Username: ".$post['Email']."\n"
			."Password: ". $password."\n"
			."Member ID: ". $mid;

			$this->email->message($message);	
			$this->email->send();


			$this->profileModel->createProfile($data);

			echo "You have successfully registered!!\n Please check your mail for your password";


		}
		else{
			echo "Login";
		}

	}
	
	// public function register(){
			
	// 	$this->load->helper("form");
	// 	$this->load->view("header");
	// 	$this->load->view("signupView");
	// 	$this->load->view("footer");
			
	// }
	
	// public function signup(){
		
	// 	$this->load->model("userModel");
	// 	$this->load->helper('string');
		
	// 	$post = $this->input->post();
		
	// 	$data = array('FirstName' => $post['FirstName'],
	// 				 'LastName' => $post['LastName'],
	// 				  'Username' => $post['UserName'],
	// 				  'Age' => $post['Age'],
	// 				  'EmploymentDate' => $post['EmploymentDate'],
	// 				  'PhoneNumber' => $post['Phone'],
	// 				  'Password' => $post['Password']
	// 				  );
		
		
	// 	$this->userModel->createUser($data);
		
	// }


	
}

?>