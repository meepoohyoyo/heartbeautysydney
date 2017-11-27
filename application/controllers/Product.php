<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Product_model');
        $this->load->model('Producttype_model');
        $this->load->model('Shoppingbag_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'product/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'product/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'product/index.html';
            $config['first_url'] = base_url() . 'product/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Product_model->total_rows($q);
        $product = $this->Product_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'product_data' => $product,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('admin/header');
        $this->load->view('product/product_list', $data);
        $this->load->view('admin/footer');
    }

    public function add_to_cart($ProductID){

        if(!isset($_SESSION['username'])){
            redirect(site_url('login'));
        }

        $row = $this->Product_model->get_by_id($ProductID);

        if($this->Shoppingbag_model->is_item_in_cart($ProductID, $this->session->CustomerID)){
            redirect(site_url('/'));
        }

        $data = array(
		'CustomerID' => $this->session->CustomerID,
		'ProductID' => $ProductID,
		'amount' => 1,
		'totalprice' => $row->ProductPrice,
		'status' => null,
	    );

        $this->Shoppingbag_model->insert($data);
        $this->session->set_flashdata('message', 'Item Added');

        $this->session->set_userdata('cart_items', count($this->Shoppingbag_model->get_user_cart_all($this->session->CustomerID)));

        redirect(site_url('/'));
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
            $this->load->view('product/product_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('product/create_action'),
	    'ProductID' => set_value('ProductID'),
	    'ProductName' => set_value('ProductName'),
	    'ProductPrice' => set_value('ProductPrice'),
	    'ImagePath' => set_value('ImagePath'),
	    'ProductDetail' => set_value('ProductDetail'),
	    'Cost' => set_value('Cost'),
	    'TypeID' => set_value('TypeID'),
	);
    // var_dump('asdf');
    // die();
        $data['product_type']= $this->Producttype_model->get_all();
        $this->load->view('admin/header');
        $this->load->view('product/product_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            if (!empty($_FILES['ImagePath']['name'])) {
                // upload
                $config['upload_path']          = realpath(dirname(__FILE__)) .'\..\..\assets\img';
                $config['max_size']             = 0;
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('ImagePath'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump($this->upload->display_errors());
                        die();
                }
                $data = array(
                    'ProductName' => $this->input->post('ProductName',TRUE),
                    'ProductPrice' => $this->input->post('ProductPrice',TRUE),
                    'ImagePath' => $this->upload->data('file_name'),
                    'ProductDetail' => $this->input->post('ProductDetail',TRUE),
                    'Cost' => $this->input->post('Cost',TRUE),
                    'TypeID' => $this->input->post('TypeID',TRUE),
                    );

                $this->Product_model->insert($data);

                $config['image_library'] = 'gd2';
                $config['source_image'] =  $this->upload->data('full_path');
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 450;
                $config['height']       = 450;

                $this->load->library('image_lib', $config);

                if ( ! $this->image_lib->resize())
                {
                    var_dump($this->image_lib->display_errors());
                }
            }else{
                $data = array(
                    'ProductName' => $this->input->post('ProductName',TRUE),
                    'ProductPrice' => $this->input->post('ProductPrice',TRUE),
                    'ImagePath' => "",
                    'ProductDetail' => $this->input->post('ProductDetail',TRUE),
                    'Cost' => $this->input->post('Cost',TRUE),
                    'TypeID' => $this->input->post('TypeID',TRUE),
                    );

                $this->Product_model->insert($data);
            }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('product'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('product/update_action'),
		'ProductID' => set_value('ProductID', $row->ProductID),
		'ProductName' => set_value('ProductName', $row->ProductName),
		'ProductPrice' => set_value('ProductPrice', $row->ProductPrice),
		'ImagePath' => set_value('ImagePath', $row->ImagePath),
		'ProductDetail' => set_value('ProductDetail', $row->ProductDetail),
		'Cost' => set_value('Cost', $row->Cost),
		'TypeID' => set_value('TypeID', $row->TypeID),
	    );
            $data['product_type']= $this->Producttype_model->get_all();
            $this->load->view('admin/header');
            $this->load->view('product/product_form', $data);
            $this->load->view('admin/footer');
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
       
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ProductID', TRUE));
        } else {

            if (!empty($_FILES['ImagePath']['name'])){
                // upload
                $config['upload_path']          = realpath(dirname(__FILE__)) .'\..\..\assets\img';
                $config['max_size']             = 0;
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('ImagePath'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump($this->upload->display_errors());
                        die();
                }else{
                    $config['image_library'] = 'gd2';
                    $config['source_image'] =  $this->upload->data('full_path');
                    $config['maintain_ratio'] = TRUE;
                    $config['width']         = 450;
                    $config['height']       = 450;
                    
                    $this->load->library('image_lib', $config);
                    
                    if ( ! $this->image_lib->resize())
                    {
                        var_dump($this->image_lib->display_errors());
                    }
                }

                $data = array(
                    'ProductName' => $this->input->post('ProductName',TRUE),
                    'ProductPrice' => $this->input->post('ProductPrice',TRUE),
                    'ImagePath' => $this->upload->data('file_name'),
                    'ProductDetail' => $this->input->post('ProductDetail',TRUE),
                    'Cost' => $this->input->post('Cost',TRUE),
                    'TypeID' => $this->input->post('TypeID',TRUE),
                    );

                $this->Product_model->update($this->input->post('ProductID', TRUE), $data);
            }else{
                $data = array(
                    'ProductName' => $this->input->post('ProductName',TRUE),
                    'ProductPrice' => $this->input->post('ProductPrice',TRUE),
                    'ProductDetail' => $this->input->post('ProductDetail',TRUE),
                    'Cost' => $this->input->post('Cost',TRUE),
                    'TypeID' => $this->input->post('TypeID',TRUE),
                    );

                $this->Product_model->update($this->input->post('ProductID', TRUE), $data);
            }
    

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('product'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            $this->Product_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('product'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ProductName', 'productname', 'trim|required');
	$this->form_validation->set_rules('ProductPrice', 'productprice', 'trim|required');
	$this->form_validation->set_rules('ProductDetail', 'productdetail', 'trim|required');
	$this->form_validation->set_rules('Cost', 'cost', 'trim|required');
	$this->form_validation->set_rules('TypeID', 'typeid', 'trim|required');

	$this->form_validation->set_rules('ProductID', 'ProductID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
