<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class shoppingbagclient extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Shoppingbag_model');
        $this->load->model('Product_model');
        $this->load->model('Order_model');
        $this->load->model('Promotionproduct_model');
        $this->load->model('Promotion_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        if(!isset($_SESSION['username'])){
            redirect(site_url('login'));
        }

        $cartItems = $this->Shoppingbag_model->get_user_unordered_cart($this->session->CustomerID);
        foreach($cartItems as $item){
            $product = $this->Product_model->get_by_id($item->ProductID);
            $item->{"ProductName"} = $product->ProductName;
            $item->{"ProductPrice"} = $product->ProductPrice;
        }

        $data = array(
            'items'=>$cartItems
        );

        $this->load->view('template/header');
        $this->load->view('shoppingbags', $data);
        $this->load->view('template/footer');
    }

    public function checkout(){
        if(!isset($_SESSION['username'])){
            redirect("/login");
        }


    }

    public function read($id) 
    {
        $row = $this->Shoppingbag_model->get_by_id($id);
        if ($row) {
            $data = array(
		'CustomerID' => $row->CustomerID,
		'ProductID' => $row->ProductID,
		'amount' => $row->amount,
		'totalprice' => $row->totalprice,
		'status' => $row->status,
	    );
            $this->load->view('shoppingbag/shoppingbag_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shoppingbag'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('shoppingbag/create_action'),
	    'CustomerID' => set_value('CustomerID'),
	    'ProductID' => set_value('ProductID'),
	    'amount' => set_value('amount'),
	    'totalprice' => set_value('totalprice'),
	    'status' => set_value('status'),
	);
        $this->load->view('shoppingbag/shoppingbag_form', $data);
    }
    
    public function bagdelete($id){
        $row = $this->Shoppingbag_model->get_by_id($id);

        if ($row) {
            $this->Shoppingbag_model->delete($id);
            $this->session->set_userdata('cart_items', count($this->Shoppingbag_model->get_user_cart_all($this->session->CustomerID)));
            redirect(site_url('shoppingbagclient'));
        } else {
            redirect(site_url('shoppingbagclient'));
        }
    }

    public function promotionbagdelete($id){
        $row = $this->Shoppingbag_model->get_by_id($id);

        $this->Shoppingbag_model->deleteAllPromotion($row->PromotionID, $row->CustomerID);
        $this->session->set_userdata('cart_items', count($this->Shoppingbag_model->get_user_cart_all($this->session->CustomerID)));            

        redirect(site_url('shoppingbagclient'));
    }

    public function submitbag(){
        // var_dump($this->input->post());
        // die();
        if(count($this->input->post('ShoppingBagID'))>0){
            $data = array(
                'OrderDate'=> date("Y-m-d"),
                'OrderStatus'=> 'ordering',
                'CustomerID'=> $this->session->CustomerID
            );
            $order = $this->Order_model->insert($data);

            // update generate number
            $id = $order->OrderID;
            $generateNo = "TH01-" . str_pad($order->OrderID, 5, '0', STR_PAD_LEFT)
            . "-" . $this->session->CustomerToken;
            $data = array('GenerateNo' => $generateNo);
            $this->Order_model->update($id, $data);

            $count = 0;
            foreach($this->input->post('ShoppingBagID') as $shoppingBagId){
                $data = array(
                    'amount' => $this->input->post('amount')[$count],
                    'totalprice' => $this->input->post('totalprice')[$count],
                    'status' => 'ordering',
                    'OrderID'=> $order->OrderID
                );
                $row = $this->Shoppingbag_model->update($shoppingBagId, $data);
                $count++;
            }

            $this->session->set_userdata('cart_items', 0);

            redirect(site_url('allorders'));
        }
    
        //ShoppingBagID
        //amount
        //totalprice
    }

    public function order_all(){
        if(!isset($_SESSION['username'])){
            redirect(site_url('login'));
        }

        $data = array();
        $data['orders'] = $this->Order_model->get_all_by_client($this->session->CustomerID);

        $this->load->view('template/header');
        $this->load->view('orderclient', $data);
        $this->load->view('template/footer');
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'CustomerID' => $this->input->post('CustomerID',TRUE),
		'ProductID' => $this->input->post('ProductID',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'totalprice' => $this->input->post('totalprice',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Shoppingbag_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('shoppingbag'));
        }

    }
    
    public function update($id) 
    {
        $row = $this->Shoppingbag_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('shoppingbag/update_action'),
		'CustomerID' => set_value('CustomerID', $row->CustomerID),
		'ProductID' => set_value('ProductID', $row->ProductID),
		'amount' => set_value('amount', $row->amount),
		'totalprice' => set_value('totalprice', $row->totalprice),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('shoppingbag/shoppingbag_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shoppingbag'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'CustomerID' => $this->input->post('CustomerID',TRUE),
		'ProductID' => $this->input->post('ProductID',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'totalprice' => $this->input->post('totalprice',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Shoppingbag_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('shoppingbag'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Shoppingbag_model->get_by_id($id);

        if ($row) {
            $this->Shoppingbag_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('shoppingbag'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shoppingbag'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('CustomerID', 'customerid', 'trim|required');
	$this->form_validation->set_rules('ProductID', 'productid', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');
	$this->form_validation->set_rules('totalprice', 'totalprice', 'trim|required|numeric');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}