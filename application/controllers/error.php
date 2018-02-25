<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class error extends CI_Controller {

	public function index()
	{
		$headerdata['title'] = "MimO | Error Page";
		$this->load->view('include/header',$headerdata);
		$this->load->view('mimo_v/error_page');
		$this->load->view('include/footer');
	}
}
