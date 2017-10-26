<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Product_model');
        $this->load->model('Producttype_model');
        $this->load->model('Shoppingbag_model');
        $this->load->model('Customer_model');
        $this->load->model('Order_model');
    }

	public function index()
	{
		$data = array(
			'completeOrders'=> count($this->Order_model->get_all_complete()),
			'todayOrderingOrders'=> count($this->Order_model->get_all_ordering()),
			'newCustomers'=>count($this->Customer_model->get_all_new_today()),
			'latestOrders'=>$this->Order_model->get_latest_all(),
			'sum_amount' => $this->Order_model->get_join_product()[0]->sum_amount,
			'sum_totalprice' => $this->Order_model->get_join_product()[0]->sum_totalprice,
		);

		$this->load->view('admin/header');
		$this->load->view('admin/admin', $data);
		$this->load->view('admin/footer');

	}

	public function report()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/report');
		$this->load->view('admin/footer');
	}

	

}