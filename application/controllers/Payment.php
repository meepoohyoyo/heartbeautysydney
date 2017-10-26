<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->model('Order_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'payment/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'payment/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'payment/index.html';
            $config['first_url'] = base_url() . 'payment/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Payment_model->total_rows($q);
        $payment = $this->Payment_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'payment_data' => $payment,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('template/header');
        $this->load->view('payment/payment_list', $data);
        $this->load->view('template/footer');
    }

    public function read($id) 
    {
        $row = $this->Payment_model->get_by_id($id);
        if ($row) {
            $data = array(
		'PaymentID' => $row->PaymentID,
		'PaymentDate' => $row->PaymentDate,
		'TotalPrice' => $row->TotalPrice,
		'OrderID' => $row->OrderID,
		'PhoneNum' => $row->PhoneNum,
		'bank' => $row->bank,
        'ImagePath' => $row->ImagePath,
        );
        
        $this->load->view('template/header');
        $this->load->view('payment/payment_read', $data);
        $this->load->view('template/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'ยืนยัน',
            'action' => site_url('payment/create_action'),
            'PaymentID' => set_value('PaymentID'),
            'PaymentDate' => set_value('PaymentDate'),
            'TotalPrice' => set_value('TotalPrice'),
            'OrderID' => set_value('OrderID'),
            'PhoneNum' => set_value('PhoneNum'),
            'bank' => set_value('bank'),
            'ImagePath' => set_value('ImagePath'),
            'orders' => $this->Order_model->get_all_ordering_by_client($this->session->CustomerID)
        );

        $this->load->view('template/header');
        $this->load->view('payment/clientpayment', $data);
        $this->load->view('template/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'PaymentDate' => $this->input->post('PaymentDate',TRUE),
		'TotalPrice' => $this->input->post('TotalPrice',TRUE),
		'OrderID' => $this->input->post('OrderID',TRUE),
		'PhoneNum' => $this->input->post('PhoneNum',TRUE),
		'bank' => $this->input->post('bank',TRUE),
        'ImagePath' => $this->input->post('ImagePath',TRUE),
	    );

            $this->Payment_model->insert($data);
            $this->session->set_flashdata('message', 'ยืนยันการแจ้งชำระเงินสำเร็จ');
            $this->session->set_flashdata('success_message', 'ยืนยันการแจ้งชำระเงินสำเร็จ');
            redirect(site_url('allorders'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Payment_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('payment/update_action'),
		'PaymentID' => set_value('PaymentID', $row->PaymentID),
		'PaymentDate' => set_value('PaymentDate', $row->PaymentDate),
		'TotalPrice' => set_value('TotalPrice', $row->TotalPrice),
		'OrderID' => set_value('OrderID', $row->OrderID),
		'PhoneNum' => set_value('PhoneNum', $row->PhoneNum),
		'bank' => set_value('bank', $row->bank),
        'ImagePath' => set_value('ImagePath', $row->ImagePath),
	    );
             $this->load->view('template/header');
            $this->load->view('payment/payment_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('PaymentID', TRUE));
        } else {
            $data = array(
		'PaymentDate' => $this->input->post('PaymentDate',TRUE),
		'TotalPrice' => $this->input->post('TotalPrice',TRUE),
		'OrderID' => $this->input->post('OrderID',TRUE),
		'PhoneNum' => $this->input->post('PhoneNum',TRUE),
		'bank' => $this->input->post('bank',TRUE),
        'ImagePath' => $this->input->post('ImagePath',TRUE),
	    );

            $this->Payment_model->update($this->input->post('PaymentID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('payment'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Payment_model->get_by_id($id);

        if ($row) {
            $this->Payment_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('payment'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('PaymentDate', 'paymentdate', 'trim|required');
	$this->form_validation->set_rules('TotalPrice', 'totalprice', 'trim|required');
	$this->form_validation->set_rules('OrderID', 'orderid', 'trim|required');
	$this->form_validation->set_rules('PhoneNum', 'phonenum', 'trim|required');
	$this->form_validation->set_rules('bank', 'bank', 'trim|required');
    $this->form_validation->set_rules('ImagePath', 'imagepath', 'trim|required');

	$this->form_validation->set_rules('PaymentID', 'PaymentID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
