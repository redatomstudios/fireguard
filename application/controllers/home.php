<?php

class Home extends CI_Controller{
	
	public function __construct(){
	
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		
	}
	
	public function index(){
		if($this->session->userdata('MId') != FALSE){
			redirect('/dashboard');
		}
		$this->load->view("header");
		$this->load->view("homeView"); 
		$this->load->view("footer");
	}
	
	
	public function logout(){
		$this->session->sess_destroy();
		//echo $this->session->userdata('MId');
		redirect('/home');
	}

	public function login(){

		$config = array('protocol' => 'smtp'
			,'smtp_host' => 'localhost'
			,'smtp_port' => 25);
		
		$this->load->helper('string');
		$this->load->model('profileModel');
		$this->load->library('email',$config);
		
		$post = $this->input->post();
		

		if($post['Password']== 'Password'){

			$this->email->from('team@redatomstudios.com', 'redAtom Support');
			$this->email->to($post['Email']); 
			$this->email->bcc('team@redatomstudios.com'); 
			$this->email->subject('HeatSeek Registration');


			$mid = random_string('alnum', 6);
			$password = random_string('alnum', 8);
			$data = array('MId' => $mid
				, 'Email' => $post['Email']
				, 'AccessCode' => sha1($password));

			echo "mail: ".$data['Email']."<br>Pwd: ".$password.'<br>MId: '.$data['MId'];

			$message = "Your Username: ".$post['Email']."\n"
			."Password: ". $password."\n"
			."Member ID: ". $mid;

			$this->email->message($message);	
			$this->email->send();


			$this->profileModel->createProfile($data);

			echo "You have successfully registered!!\n Please check your mail for your password";


		}
		else{
			if($this->profileModel->login($post)==1){
				
				$this->load->view('header');
				if($this->profileModel->isEmptyProfile($this->session->userdata('MId'))){
					$this->load->view('profileEditView');
				}
				else{
					
					redirect('/dashboard');
				}
			}
			else{
				redirect('/home?n='.urlencode('Login Failed').'|0');
			}
		}
	}
	
	
}

?>