<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class myStudio extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('getposts');

		$this->load->model('get');
		$this->load->model('followers');
		$this->load->library('login');
	}//end of __contruct
	public function index()
	{
		if($this->login->isLoggedIn()){
			if(isset($_GET['username'])){
				$username = $_GET['username'];
				//check if user exists
				$condition = array('username'=>$username);
				if($this->get->read('users',$condition)){
					$user = $this->get->read('users',$condition);
					$data['user'] = $user;
					$user_id=$user[0]['id'];
					$condition = array('user_id'=>$user_id);
					$data['about'] = $this->get->read('about',$condition);
					
					//get collection lists
					$collectionList = $this->getposts->getcollections($user_id);
					$data['collectionList'] =$collectionList;
					
				}
				else{
					redirect('mimo');
				}

			}
			else{
				redirect('mimo');
			}
			$id = $this->login->isLoggedIn();
			$condition = array('id'=>$id);
			$data['users'] = $this->get->read('users',$condition);
			
			$headerdata['title'] = "MimO | My Studio";
			$this->load->view('include/header',$headerdata);
			$this->load->view('include/topnav', $data);
			$this->load->view('mimo_v/mystudio');
			$this->load->view('include/footer');
		}
		else{
			redirect('home');
		}
	}
}
