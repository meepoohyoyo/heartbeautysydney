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

	public function skincare()
	{
		$this->load->view('template/header');
		$this->load->view('skincare');
		$this->load->view('template/footer');
	}

	public function supplementary()
	{
		$this->load->view('template/header');
		$this->load->view('supplementary');
		$this->load->view('template/footer');
	}

	public function body()
	{
		$this->load->view('template/header');
		$this->load->view('body');
		$this->load->view('template/footer');
	}
}