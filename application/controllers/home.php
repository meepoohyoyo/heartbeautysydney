<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
		// This is the last name from the form
		$ProductName = $this->input->post('ProductName');
		
		// Create the query
		$sql = "SELECT * FROM product WHERE ProductName = ?";
		
		// Execute it, replacing the ? with the last name from the form
		$query = $this->db->query($sql, array($ProductName));
		
			// Show results
		foreach ($query->result() as $row) {
			   echo $row->ProductName . "<br />";
			   echo $row->ProductName;
			}

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
}?>