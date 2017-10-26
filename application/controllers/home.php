<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template');
		$this->load->view('template/footer');
	}

	public function page()
	{
		$this->load->view('template/header');
		$this->load->view('shoppage');
		$this->load->view('template/footer');
		
	}

	public function login()
	{
		$this->load->view('template/header');
		$this->load->view('login');
		$this->load->view('template/footer');
	}

	
}