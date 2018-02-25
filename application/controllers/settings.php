<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settings extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->model('notif');
		$this->load->model('get');

		$this->load->library('notify');
		$this->load->library('login');
		$this->load->library('mail');
		$this->load->library('image');

	}//end of __contruct
	public function index()
	{
		//check if user is logged in
		if($this->login->isLoggedIn()){
			if(isset($_POST['account'])){
			$id = $this->login->isLoggedIn();
			$selector= 'username';
			$condition = array('id'=>$id);
			$previoususername= $this->get->read('users',$condition,$selector)[0]['username'];
			$selector= 'fullname';
			$previouslastname= $this->get->read('users',$condition,$selector)[0]['fullname'];
			$selector= 'email';
			$previousemail= $this->get->read('users',$condition,$selector)[0]['email'];
			$selector= 'picture';
			$previousprofile= $this->get->read('users',$condition,$selector)[0]['picture'];
			$selector= 'header';
			$previousheader= $this->get->read('users',$condition,$selector)[0]['header'];
			
			$username = $this->input->post("username", TRUE);
			$fullname = $this->input->post("fullname", TRUE);
			$email = $this->input->post("email", TRUE);
			
			$profileimage= $_FILES['imgProfile'];
			$headerimage= $_FILES['imgHeader'];
			if($profileimage['name']=='') {
					//echo "<h2>An Image Please.</h2>";
					$profilelink=$previousprofile;
			}
			else{
			//print_r ($image);
			$profilelink=$this->image->uploadImage($profileimage); 
				if($profilelink==NULL)
				{
					$profilelink=$previousprofile;
					echo "<script type='text/javascript'>alert('Connection Error');</script>";
				}
			}
			
			if($headerimage['name']=='') {  
					//echo "<h2>An Image Please.</h2>";
					$headerlink=$previousheader;
			}
			else{
			//print_r ($image);
			$headerlink=$this->image->uploadImage($headerimage); 
			}
			
			if ($username==NULL){
				$username=$previoususername;
			}
			if ($fullname==NULL){
				$fullname=$previouslastname;
			}
			if ($email==NULL){
				$email=$previousemail;
			}
			
			$data = array(
					'username'=>$username,
					'fullname'=>$fullname,
					'email'=>$email,
					'picture'=>$profilelink,
					'header'=>$headerlink
					);
			$this->get->update('users',$data,$condition);
			
			}
			if(isset($_POST['mymusic'])){
			$id = $this->login->isLoggedIn();
			$selector= 'career';
			$condition = array('user_id'=>$id);
			$previouscareer= $this->get->read('about',$condition,$selector)[0]['career'];
			$genre1 = $this->input->post("genre1", TRUE);
			$genre2 = $this->input->post("genre2", TRUE);
			$genre3 = $this->input->post("genre3", TRUE);
			$mcareer =$this->input->post("mcareer", TRUE);
			$career="";
			if($mcareer==""){
				$career=$previouscareer;
			}
			else{
				foreach($mcareer as $car)
				{
					$career .= $car. ",";
						
				}
			}
			if($genre1=="None")
				{ $genre1=NULL;
				}
			if($genre2=="None")
				{ $genre2=NULL;
				}
			if($genre3=="None")
				{ $genre3=NULL;
				}
			
			$data = array(
					'genre1'=>$genre1,
					'genre2'=>$genre2,
					'genre3'=>$genre3,
					'career'=>$career
					);
			
			$this->get->update('about',$data,$condition);
			}
			$id = $this->login->isLoggedIn();
			$condition = array('id'=>$id);
			$data['users'] = $this->get->read('users',$condition);
			$condition = array('user_id'=>$id);
			$data['about'] = $this->get->read('about',$condition);
			$data['genre'] = $this->get->read('genre');
			$headerdata['title'] = "MimO | Settings";
			$this->load->view('include/header',$headerdata);
			$this->load->view('include/topnav', $data);
			$this->load->view('mimo_v/settings', $data);
			$this->load->view('include/footer');
		}
		else{
			redirect('home');
		}
	}
}
