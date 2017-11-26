<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function read($id) 
    {
        $row = $this->Product_model->get_by_id($id);
        if ($row) {
            $data = array(
                'ProductID' => $row->ProductID,
                'ProductName' => $row->ProductName,
                'ProductPrice' => $row->ProductPrice,
                'ImagePath' => $row->ImagePath,
                'ProductDetail' => $row->ProductDetail,
                'Cost' => $row->Cost,
                'TypeID' => $row->TypeID,
                );

            $this->load->view('template/header');
            $this->load->view('body', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('/'));
        }
    }

}