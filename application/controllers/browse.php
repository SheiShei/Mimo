<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class browse extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		
		$this->load->model('getposts');
		$this->load->model('getSearch');
		$this->load->model('getBrowse');
		$this->load->model('artists');
		
		$this->load->model('comments');
		$this->load->model('get');
		
		$this->load->library('login');
		$this->load->library('topics');
		$this->load->library('image');
		$this->load->library('post');

	}//end of __contsruct()
	
	public function index(){
		$id = $this->login->isLoggedIn();
		$condition = array('id'=>$id);
		$data['users'] = $this->get->read('users',$condition);
		$headerdata['title'] = "MimO | Browse";
		$data['mimoartists'] = $this->artists->mimoartists();
		$this->load->view('include/header',$headerdata);
		$this->load->view('include/topnav', $data);
		$this->load->view('mimo_v/browse', $data);
		$this->load->view('include/footer');
	}//end of index()

	public function artist(){
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$id = $this->login->isLoggedIn();
				$result = $this->getBrowse->getartistsearch();
				echo json_encode($result);
		}
		else{
			redirect('error');
		}
	}//end of artist()

	public function audios(){
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$result = array();
			$result = $this->post->audios('','');
			echo json_encode($result);
		}
		else{
			redirect('error');
		}
	}//end of audios()
	public function videos(){
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$result = array();
			$result = $this->post->videos('','');
			echo json_encode($result);
		}
		else{
			redirect('error');
		}
	}//end of videos()
}
