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

	public function getSaleReport()
	{
		$data = array(
			'report'=>'sale', 
			'results'=>array() );

		$fromDate = $this->input->post('from_date');
		$toDate = $this->input->post('to_date');
		if($fromDate && $toDate){
			$sql = "select `order`.`OrderID`,`order`.`OrderDate` , 
			CONCAT( customer.Firstname , ' ',customer.Lastname) as CustomerName 
			, `order`.`OrderStatus` , SUM(shoppingbag.totalprice) as SumTotal 
			from `order` 
			left join customer on `order`.`CustomerID`=customer.CustomerID 
			left join shoppingbag on `order`.`OrderID`=shoppingbag.OrderID 
			where `order`.`OrderDate` between ? and ?
			group by `order`.`OrderID`, `order`.`OrderDate`,customer.Firstname
			, customer.Lastname,`order`.`OrderStatus`";

			$query = $this->db->query($sql, array($fromDate, $toDate) );
			$data['results'] = $query->result();
			$data['fromDate'] =$fromDate;
			$data['toDate']=$toDate;
		
		}

		$this->load->view('admin/header');
		$this->load->view('admin/ReportSale', $data);
		$this->load->view('admin/footer');
	}

	public function getBestSaleReport(){
		$data = array('report'=>'best-sale');
		
		$this->load->view('admin/header');
		$this->load->view('admin/ReportBestSeller', $data);
		$this->load->view('admin/footer');

	}

	public function getPaymentReport(){
		$data = array(
			'report'=>'payment', 
			'results'=>array() );

		$fromDate = $this->input->post('from_date');
		$toDate = $this->input->post('to_date');
		if($fromDate && $toDate){
			$sql = "select `order`.`OrderID`,`order`.`OrderDate` , 
			CONCAT( customer.Firstname , ' ',customer.Lastname) as CustomerName 
			, `order`.`OrderStatus` , SUM(shoppingbag.totalprice) as SumTotal 
			from `order` 
			left join customer on `order`.`CustomerID`=customer.CustomerID 
			left join shoppingbag on `order`.`OrderID`=shoppingbag.OrderID 
			where `order`.`OrderDate` between ? and ? and `order`.OrderStatus = 'confirm'
			group by `order`.`OrderID`, `order`.`OrderDate`,customer.Firstname
			, customer.Lastname,`order`.`OrderStatus`";

			$query = $this->db->query($sql, array($fromDate, $toDate) );
			$data['results'] = $query->result();
			$data['fromDate'] =$fromDate;
			$data['toDate']=$toDate;
		
		}
		
		$this->load->view('admin/header');
		$this->load->view('admin/ReportPayment', $data);
		$this->load->view('admin/footer');
	}

	

}