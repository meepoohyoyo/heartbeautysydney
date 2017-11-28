<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model');
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'order/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'order/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'order/index.html';
            $config['first_url'] = base_url() . 'order/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Order_model->total_rows($q);
        $order = $this->Order_model->get_limit_data($config['per_page'], $start, $q);

        $allCustomerID = array();
        foreach($order as $item){
            if(!in_array($item->CustomerID, $allCustomerID)){
                $allCustomerID[] = $item->CustomerID;
            }
        }

        $allCustomerName = array();
        foreach($allCustomerID as $customerID){
            $customer = $this->Customer_model->get_by_id($customerID);
            $allCustomerName[$customerID] = $customer->Firstname . " " . $customer->Lastname;
        }
        foreach($order as $item){
            $item->{"CustomerName"} = $allCustomerName[$item->CustomerID];
        }

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'order_data' => $order,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/header');
        $this->load->view('order/order_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->Order_model->get_by_id($id);
        if ($row) {
            $data = array(
		'OrderID' => $row->OrderID,
		'OrderDate' => $row->OrderDate,
		'OrderStatus' => $row->OrderStatus,
		'CustomerID' => $row->CustomerID,
	    );
            $this->load->view('order/order_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('order/create_action'),
	    'OrderID' => set_value('OrderID'),
	    'OrderDate' => set_value('OrderDate'),
	    'OrderStatus' => set_value('OrderStatus'),
	    'CustomerID' => set_value('CustomerID'),
	);
        $this->load->view('admin/header');
        $this->load->view('order/order_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'OrderDate' => $this->input->post('OrderDate',TRUE),
		'OrderStatus' => $this->input->post('OrderStatus',TRUE),
		'CustomerID' => $this->input->post('CustomerID',TRUE),
	    );

            $this->Order_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('order'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Order_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('order/update_action'),
		'OrderID' => set_value('OrderID', $row->OrderID),
		'OrderDate' => set_value('OrderDate', $row->OrderDate),
		'OrderStatus' => set_value('OrderStatus', $row->OrderStatus),
		'CustomerID' => set_value('CustomerID', $row->CustomerID),
	    );
            $this->load->view('admin/header');
            $this->load->view('order/order_form', $data);
            $this->load->view('admin/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('OrderID', TRUE));
        } else {
            $data = array(
		'OrderDate' => $this->input->post('OrderDate',TRUE),
		'OrderStatus' => $this->input->post('OrderStatus',TRUE),
		'CustomerID' => $this->input->post('CustomerID',TRUE),
	    );

            $this->Order_model->update($this->input->post('OrderID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('order'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Order_model->get_by_id($id);

        if ($row) {
            $this->Order_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('order'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('order'));
        }
    }

    public function confirmOrder($id){
        $row = $this->Order_model->get_by_id($id);

        if($row){
            if($row->OrderStatus==="wait_confirm"){
                $data = array(
                    'OrderStatus' => 'confirm'
                );
                $this->Order_model->update($id, $data);
                $this->session->set_flashdata('message', 'ยืนยันการชำระเงินสำเร็จ');
            }else{
                $this->session->set_flashdata('error_message', 'ลูกค้ายังไม่แจ้งชำระเงิน');
            }
            if($this->input->get('from') && $this->input->get('from')==='payment'){
                redirect(site_url('payment?onlywaitconfirm=true'));
            }else{
                redirect(site_url('order'));                
            }
        }else{
            $this->load->view('errors/404');
        }
    }

    public function completeOrder($id){
        $row = $this->Order_model->get_by_id($id);

        if($row){
            if($row->OrderStatus==="confirm"){
                $data = array(
                    'OrderStatus' => 'complete'
                );
                $this->Order_model->update($id, $data);
                $this->session->set_flashdata('message', 'ยืนยันการจัดส่งสำเร็จ');
            }else{
                $this->session->set_flashdata('error_message', 'ออร์เดอร์ยังไม่อยู่ในสถานะยืนยันการชำระเงิน');                
            }

            redirect(site_url('order'));
        }else{
            $this->load->view('errors/404');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('OrderDate', 'orderdate', 'trim|required');
	$this->form_validation->set_rules('OrderStatus', 'orderstatus', 'trim|required');
	$this->form_validation->set_rules('CustomerID', 'customerid', 'trim|required');

	$this->form_validation->set_rules('OrderID', 'OrderID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

