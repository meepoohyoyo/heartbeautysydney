<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shoppingbag extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Shoppingbag_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'shoppingbag/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'shoppingbag/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'shoppingbag/index.html';
            $config['first_url'] = base_url() . 'shoppingbag/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Shoppingbag_model->total_rows($q);
        $shoppingbag = $this->Shoppingbag_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'shoppingbag_data' => $shoppingbag,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('shoppingbag/shoppingbag_list', $data);
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

/* End of file Shoppingbag.php */
/* Location: ./application/controllers/Shoppingbag.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-03-28 14:48:09 */
/* http://harviacode.com */