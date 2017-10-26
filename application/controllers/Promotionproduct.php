<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promotionproduct extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Promotionproduct_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'promotionproduct/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'promotionproduct/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'promotionproduct/index.html';
            $config['first_url'] = base_url() . 'promotionproduct/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Promotionproduct_model->total_rows($q);
        $promotionproduct = $this->Promotionproduct_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'promotionproduct_data' => $promotionproduct,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('promotionproduct/promotionproduct_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Promotionproduct_model->get_by_id($id);
        if ($row) {
            $data = array(
		'PromotionID' => $row->PromotionID,
		'ProductID' => $row->ProductID,
		'PPDate' => $row->PPDate,
	    );
            $this->load->view('promotionproduct/promotionproduct_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promotionproduct'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('promotionproduct/create_action'),
	    'PromotionID' => set_value('PromotionID'),
	    'ProductID' => set_value('ProductID'),
	    'PPDate' => set_value('PPDate'),
	);
        $this->load->view('promotionproduct/promotionproduct_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'PromotionID' => $this->input->post('PromotionID',TRUE),
		'ProductID' => $this->input->post('ProductID',TRUE),
		'PPDate' => $this->input->post('PPDate',TRUE),
	    );

            $this->Promotionproduct_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('promotionproduct'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Promotionproduct_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('promotionproduct/update_action'),
		'PromotionID' => set_value('PromotionID', $row->PromotionID),
		'ProductID' => set_value('ProductID', $row->ProductID),
		'PPDate' => set_value('PPDate', $row->PPDate),
	    );
            $this->load->view('promotionproduct/promotionproduct_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promotionproduct'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'PromotionID' => $this->input->post('PromotionID',TRUE),
		'ProductID' => $this->input->post('ProductID',TRUE),
		'PPDate' => $this->input->post('PPDate',TRUE),
	    );

            $this->Promotionproduct_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('promotionproduct'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Promotionproduct_model->get_by_id($id);

        if ($row) {
            $this->Promotionproduct_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('promotionproduct'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promotionproduct'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('PromotionID', 'promotionid', 'trim|required');
	$this->form_validation->set_rules('ProductID', 'productid', 'trim|required');
	$this->form_validation->set_rules('PPDate', 'ppdate', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Promotionproduct.php */
/* Location: ./application/controllers/Promotionproduct.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-02-02 15:51:07 */
/* http://harviacode.com */