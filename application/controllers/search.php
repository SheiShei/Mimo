<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class search extends CI_Controller {

	public function __construct(){
		parent::__construct();
	
		$this->load->model('getposts');
		$this->load->model('getSearch');

		$this->load->model('comments');
		$this->load->model('get');
		
		$this->load->library('login');
		$this->load->library('topics');
		$this->load->library('image');
		$this->load->library('post');

	}//end of __contsruct()
	
	public function index(){

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$search = $this->input->post("searchword");
				if($search!=''){
					$query = $this->getSearch->getlistsearch($search);
					echo json_encode($query);
				}
			}
			else if(isset($_GET['q'])){
				$data['q']=$_GET['q'];
				if($data['q']!=''){
					$id = $this->login->isLoggedIn();
					$condition = array('id'=>$id);
					$data['users'] = $this->get->read('users',$condition);

					$headerdata['title'] = "MimO | Search";
					$this->load->view('include/header',$headerdata);
					$this->load->view('include/topnav', $data);
					$this->load->view('mimo_v/searchpage',$data);
					$this->load->view('include/footer');
				}
				else{
					redirect('mimo');
				}
			}

			else{
				redirect('error');
			}
	}//end of index()

	public function artist(){
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$toSearch = $this->input->post("toSearch");
			$id = $this->login->isLoggedIn();
			if($this->getSearch->getartistsearch($toSearch,$id)){
				$result = $this->getSearch->getartistsearch($toSearch,$id);
				echo json_encode($result);
			}
			else{
				echo json_encode(array('id'=>"error"));
			}
		}
		else{
			redirect('error');
		}
	}//end of artist()

	public function thoughts(){
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$toSearch = $this->input->post("toSearch");
			$result = array();
			$result = $this->post->thoughts($toSearch,'search');
			echo json_encode($result);

		}
		else{
			redirect('error');
		}
	}//end of thoughts()

	public function audios(){
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$toSearch = $this->input->post("toSearch");
			$result = array();
			$result = $this->post->audios($toSearch,'search');
			echo json_encode($result);
		}
		else{
			redirect('error');
		}
	}//end of audios()

	public function videos(){
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$toSearch = $this->input->post("toSearch");
			$result = array();
			$result = $this->post->videos($toSearch,'search');
			echo json_encode($result);
		}
		else{
			redirect('error');
		}
	}//end of videos()
	
}
