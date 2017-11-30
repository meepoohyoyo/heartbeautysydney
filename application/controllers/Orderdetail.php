<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orderdetail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Orderdetail_model');
        $this->load->library('form_validation');
        if ( ! $this->session->userdata('loginuser')){ 
            redirect('login');
        }else{
            $allowed = array(
                'index','read','create','create_action','update','update_action','delete'
            );
            if ( in_array($this->router->fetch_method(), $allowed) 
            && (!$this->session->userdata('is_admin') 
            || (int)$this->session->userdata('is_admin')!==1) )
            {
                redirect('login');
            }
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'orderdetail/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'orderdetail/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'orderdetail/index.html';
            $config['first_url'] = base_url() . 'orderdetail/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Orderdetail_model->total_rows($q);
        $orderdetail = $this->Orderdetail_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'orderdetail_data' => $orderdetail,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('orderdetail/orderdetail_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Orderdetail_model->get_by_id($id);
        if ($row) {
            $data = array(
		'OrderQuantity' => $row->OrderQuantity,
		'OrderID' => $row->OrderID,
		'ProductID' => $row->ProductID,
	    );
            $this->load->view('orderdetail/orderdetail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orderdetail'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('orderdetail/create_action'),
	    'OrderQuantity' => set_value('OrderQuantity'),
	    'OrderID' => set_value('OrderID'),
	    'ProductID' => set_value('ProductID'),
	);
        $this->load->view('orderdetail/orderdetail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'OrderID' => $this->input->post('OrderID',TRUE),
		'ProductID' => $this->input->post('ProductID',TRUE),
	    );

            $this->Orderdetail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('orderdetail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Orderdetail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('orderdetail/update_action'),
		'OrderQuantity' => set_value('OrderQuantity', $row->OrderQuantity),
		'OrderID' => set_value('OrderID', $row->OrderID),
		'ProductID' => set_value('ProductID', $row->ProductID),
	    );
            $this->load->view('orderdetail/orderdetail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orderdetail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('OrderQuantity', TRUE));
        } else {
            $data = array(
		'OrderID' => $this->input->post('OrderID',TRUE),
		'ProductID' => $this->input->post('ProductID',TRUE),
	    );

            $this->Orderdetail_model->update($this->input->post('OrderQuantity', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('orderdetail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Orderdetail_model->get_by_id($id);

        if ($row) {
            $this->Orderdetail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('orderdetail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orderdetail'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('OrderID', 'orderid', 'trim|required');
	$this->form_validation->set_rules('ProductID', 'productid', 'trim|required');

	$this->form_validation->set_rules('OrderQuantity', 'OrderQuantity', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Orderdetail.php */
/* Location: ./application/controllers/Orderdetail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-02-13 18:57:01 */
/* http://harviacode.com */