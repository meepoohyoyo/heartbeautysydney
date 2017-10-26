<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Producttype extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Producttype_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'producttype/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'producttype/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'producttype/index.html';
            $config['first_url'] = base_url() . 'producttype/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Producttype_model->total_rows($q);
        $producttype = $this->Producttype_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'producttype_data' => $producttype,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/header');
        $this->load->view('producttype/producttype_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->Producttype_model->get_by_id($id);
        if ($row) {
            $data = array(
		'TypeID' => $row->TypeID,
		'TypeName' => $row->TypeName,
	    );
            $this->load->view('producttype/producttype_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('producttype'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('producttype/create_action'),
	    'TypeID' => set_value('TypeID'),
	    'TypeName' => set_value('TypeName'),
	);
        $this->load->view('admin/header');
        $this->load->view('producttype/producttype_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'TypeName' => $this->input->post('TypeName',TRUE),
	    );

            $this->Producttype_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('producttype'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Producttype_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('producttype/update_action'),
		'TypeID' => set_value('TypeID', $row->TypeID),
		'TypeName' => set_value('TypeName', $row->TypeName),
	    );
            $this->load->view('producttype/producttype_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('producttype'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('TypeID', TRUE));
        } else {
            $data = array(
		'TypeName' => $this->input->post('TypeName',TRUE),
	    );

            $this->Producttype_model->update($this->input->post('TypeID', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('producttype'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Producttype_model->get_by_id($id);

        if ($row) {
            $this->Producttype_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('producttype'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('producttype'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('TypeName', 'typename', 'trim|required');

	$this->form_validation->set_rules('TypeID', 'TypeID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

