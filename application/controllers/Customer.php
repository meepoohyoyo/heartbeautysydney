<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'customer/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'customer/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'customer/index.html';
            $config['first_url'] = base_url() . 'customer/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Customer_model->total_rows($q);
        $customer = $this->Customer_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'customer_data' => $customer,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/header');
        $this->load->view('customer/customer_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->Customer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'CustomerID' => $row->CustomerID,
		'Firstname' => $row->Firstname,
		'Lastname' => $row->Lastname,
		'Address' => $row->Address,
		'MobilePhone' => $row->MobilePhone,
		'Email' => $row->Email,
		'Username' => $row->Username,
		'Password' => $row->Password,
	    );
            $this->load->view('customer/customer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function getUserInfo(){
        $row = $this->Customer_model->get_by_id($_SESSION['CustomerID']);
        $data = array(
            'CustomerID' => $row->CustomerID,
            'Firstname' => $row->Firstname,
            'Lastname' => $row->Lastname,
            'Address' => $row->Address,
            'MobilePhone' => $row->MobilePhone,
            'Email' => $row->Email,
            'Username' => $row->Username,
            'Password' => $row->Password,
            );

        $this->load->view('template/header');
        $this->load->view('customer/clientcustomer', $data);
        $this->load->view('template/footer');
    }

    public function createuser()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('registeruser'),
	    'CustomerID' => set_value('CustomerID'),
	    'Firstname' => set_value('Firstname'),
	    'Lastname' => set_value('Lastname'),
	    'Address' => set_value('Address'),
	    'MobilePhone' => set_value('MobilePhone'),
	    'Email' => set_value('Email'),
	    'Username' => set_value('Username'),
	    'Password' => set_value('Password'),
	);
        $this->load->view('template/header');
        $this->load->view('register', $data);
        $this->load->view('template/footer');
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('customer/create_action'),
	    'CustomerID' => set_value('CustomerID'),
	    'Firstname' => set_value('Firstname'),
	    'Lastname' => set_value('Lastname'),
	    'Address' => set_value('Address'),
	    'MobilePhone' => set_value('MobilePhone'),
	    'Email' => set_value('Email'),
	    'Username' => set_value('Username'),
	    'Password' => set_value('Password'),
	);
        $this->load->view('admin/header');
        $this->load->view('customer/customer_form', $data);
        $this->load->view('admin/footer');
    }

    public function createuser_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->createuser();
        } else {
            $data = array(
		'Firstname' => $this->input->post('Firstname',TRUE),
		'Lastname' => $this->input->post('Lastname',TRUE),
		'Address' => $this->input->post('Address',TRUE),
		'MobilePhone' => $this->input->post('MobilePhone',TRUE),
		'Email' => $this->input->post('Email',TRUE),
		'Username' => $this->input->post('Username',TRUE),
        'Password' => $this->input->post('Password',TRUE),
        'token'=> str_pad(rand(0, 99999999),8,"0",STR_PAD_LEFT)        
	    );

            $this->Customer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('login')); //กลับมาตรงนี้
        }
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Firstname' => $this->input->post('Firstname',TRUE),
		'Lastname' => $this->input->post('Lastname',TRUE),
		'Address' => $this->input->post('Address',TRUE),
		'MobilePhone' => $this->input->post('MobilePhone',TRUE),
		'Email' => $this->input->post('Email',TRUE),
		'Username' => $this->input->post('Username',TRUE),
        'Password' => $this->input->post('Password',TRUE),
        'token'=> str_pad(rand(0, 99999999),8,"0",STR_PAD_LEFT)
	    );

            $this->Customer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customer/update_action'),
		'CustomerID' => set_value('CustomerID', $row->CustomerID),
		'Firstname' => set_value('Firstname', $row->Firstname),
		'Lastname' => set_value('Lastname', $row->Lastname),
		'Address' => set_value('Address', $row->Address),
		'MobilePhone' => set_value('MobilePhone', $row->MobilePhone),
		'Email' => set_value('Email', $row->Email),
		'Username' => set_value('Username', $row->Username),
		'Password' => set_value('Password', $row->Password),
	    );
            $this->load->view('admin/header');
            $this->load->view('customer/customer_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('CustomerID', TRUE));
        } else {
            $data = array(
		'Firstname' => $this->input->post('Firstname',TRUE),
		'Lastname' => $this->input->post('Lastname',TRUE),
		'Address' => $this->input->post('Address',TRUE),
		'MobilePhone' => $this->input->post('MobilePhone',TRUE),
		'Email' => $this->input->post('Email',TRUE),
		'Username' => $this->input->post('Username',TRUE),
		'Password' => $this->input->post('Password',TRUE),
	    );

            $this->Customer_model->update($this->input->post('CustomerID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $this->Customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Firstname', 'firstname', 'trim|required');
	$this->form_validation->set_rules('Lastname', 'lastname', 'trim|required');
	$this->form_validation->set_rules('Address', 'address', 'trim|required');
	$this->form_validation->set_rules('MobilePhone', 'mobilephone', 'trim|required');
	$this->form_validation->set_rules('Email', 'email', 'trim|required');
	$this->form_validation->set_rules('Username', 'username', 'trim|required');
	$this->form_validation->set_rules('Password', 'password', 'trim|required');

	$this->form_validation->set_rules('CustomerID', 'CustomerID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

