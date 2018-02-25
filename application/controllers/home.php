<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	public function __construct(){
		parent::__construct();
	
		$this->load->model('get');
		$this->load->library('login');
	}//end of __contruct
	public function index()
	{
		if(!$this->login->isLoggedIn()){
			$headerdata['title'] = "MimO | Welcome";
			$this->load->view('include/header',$headerdata);
			$this->load->view('mimo_v/home');
			$this->load->view('include/footer');
		}
		else{
			redirect('mimo');
		}
	}
}
