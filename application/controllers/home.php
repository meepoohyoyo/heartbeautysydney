<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Promotion_model');
        $this->load->model('Promotionproduct_model');
	}
	
	public function index()
	{
		// This is the last name from the form
		$ProductName = $this->input->post('ProductName');
		
		// Create the query
		$sql = "SELECT * FROM product WHERE ProductName = ?";
		
		// Execute it, replacing the ? with the last name from the form
		$query = $this->db->query($sql, array($ProductName));
		$data = array();
		$data['promotions'] = $this->Promotion_model->get_all_active();

		foreach($data['promotions'] as $promotion){
			$allProducts = $this->Promotionproduct_model->get_all_by_id($promotion->PromotionID);
			$sumCost = 0;
			foreach($allProducts as $pp){
				$productModel = $this->Product_model->get_by_id($pp->ProductID);
				if((int)$promotion->TypePromotion===1){ //ลด %
					$sumCost += (float)$productModel->Cost 
					- ( (float)$productModel->Cost * ( (float)$promotion->UnitOfDiscount/100.0) );
				}else if((int) $promotion->TypePromotion===2){ // ลดเป็นบาท
					$sumCost += (float)$productModel->Cost - (float)$promotion->UnitOfDiscount/100.0;
				}
			}

			$promotion->{"sumCost"} = ceil($sumCost);
		}

		$this->load->view('template/header');
		$this->load->view('template', $data);
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