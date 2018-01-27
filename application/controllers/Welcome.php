<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('e-voting/home');
	}

	public function rules(){

		$this->load->view('e-voting/rules');
	}


	

	public function login(){

		//loading the login page
		$this->session->set_flashdata('success', 'Please Login');
		$this->load->view('e-voting/login');
	}
}
