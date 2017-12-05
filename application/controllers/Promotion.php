<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promotion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Promotion_model');
        $this->load->model('Promotionproduct_model');
        $this->load->model('Product_model');
        $this->load->library('form_validation');

        if ( ! $this->session->userdata('loginuser')){ 
            redirect('login');
        }else{
            $allowed = array(
                'create','create_action','update','update_action','delete'
            );
            if ( in_array($this->router->fetch_method(), $allowed) 
            && (!$this->session->userdata('is_admin') 
            || (int)$this->session->userdata('is_admin')!==1))
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
            $config['base_url'] = base_url() . 'promotion/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'promotion/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'promotion/index.html';
            $config['first_url'] = base_url() . 'promotion/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Promotion_model->total_rows($q);
        $promotion = $this->Promotion_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'promotion_data' => $promotion,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/header');
        $this->load->view('promotion/promotion_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->Promotion_model->get_by_id($id);
        if ($row) {
            $data = array(
		'PromotionID' => $row->PromotionID,
		'StartDate' => $row->StartDate,
		'EndDate' => $row->EndDate,
		'PromotionDetail' => $row->PromotionDetail,
		'PromotionName' => $row->PromotionName,
		'UnitOfDiscount' => $row->UnitOfDiscount,
		'TypePromotion' => $row->TypePromotion,
        'ImagePath' => $row->ImagePath,
        );
            $this->load->view('admin/header');
            $this->load->view('promotion/promotion_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promotion'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('promotion/create_action'),
            'PromotionID' => set_value('PromotionID'),
            'StartDate' => set_value('StartDate'),
            'EndDate' => set_value('EndDate'),
            'PromotionDetail' => set_value('PromotionDetail'),
            'PromotionName' => set_value('PromotionName'),
            'UnitOfDiscount' => set_value('UnitOfDiscount'),
            'TypePromotion' => set_value('TypePromotion'),
            'products' => $this->Product_model->get_customer_search_data(),
            'ImagePath' => set_value('ImagePath'),
        );

        $this->load->view('admin/header');
        $this->load->view('promotion/promotion_form', $data);
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
                    'StartDate' => $this->input->post('StartDate',TRUE),
                    'EndDate' => $this->input->post('EndDate',TRUE),
                    'PromotionDetail' => $this->input->post('PromotionDetail',TRUE),
                    'PromotionName' => $this->input->post('PromotionName',TRUE),
                    'UnitOfDiscount' => $this->input->post('UnitOfDiscount',TRUE),
                    'TypePromotion' => $this->input->post('TypePromotion',TRUE),
                    'ImagePath' =>  $this->upload->data('file_name'),
                );
    
                $promotion_id = $this->Promotion_model->insert($data);

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
                    'StartDate' => $this->input->post('StartDate',TRUE),
                    'EndDate' => $this->input->post('EndDate',TRUE),
                    'PromotionDetail' => $this->input->post('PromotionDetail',TRUE),
                    'PromotionName' => $this->input->post('PromotionName',TRUE),
                    'UnitOfDiscount' => $this->input->post('UnitOfDiscount',TRUE),
                    'TypePromotion' => $this->input->post('TypePromotion',TRUE),
                    'ImagePath' =>  $this->upload->data('file_name'),
                );
    
                $promotion_id = $this->Promotion_model->insert($data);
            }

            foreach($this->input->post('promotionproduct') as $productID){
                $ppData = array(
                    'ProductID'=>$productID,
                    'PromotionID'=>$promotion_id
                );

                $this->Promotionproduct_model->insert($ppData);
            }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('promotion'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Promotion_model->get_by_id($id);

        if ($row) {
            $allProductID = array();
            foreach($this->Promotionproduct_model->get_all_by_id($id) as $pp){
                $allProductID[] = $pp->ProductID;
            }
            $data = array(
                'button' => 'Update',
                'action' => site_url('promotion/update_action'),
                'PromotionID' => set_value('PromotionID', $row->PromotionID),
                'StartDate' => set_value('StartDate', $row->StartDate),
                'EndDate' => set_value('EndDate', $row->EndDate),
                'PromotionDetail' => set_value('PromotionDetail', $row->PromotionDetail),
                'PromotionName' => set_value('PromotionName', $row->PromotionName),
                'UnitOfDiscount' => set_value('UnitOfDiscount', $row->UnitOfDiscount),
                'TypePromotion' => set_value('TypePromotion', $row->TypePromotion),
                'ImagePath' => set_value('ImagePath', $row->ImagePath),
                'allProductID' => $allProductID,
                );
            $this->load->view('admin/header');
            $this->load->view('promotion/promotion_form', $data);
            $this->load->view('admin/footer');

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promotion'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('PromotionID', TRUE));
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
                    'StartDate' => $this->input->post('StartDate',TRUE),
                    'EndDate' => $this->input->post('EndDate',TRUE),
                    'PromotionDetail' => $this->input->post('PromotionDetail',TRUE),
                    'PromotionName' => $this->input->post('PromotionName',TRUE),
                    'UnitOfDiscount' => $this->input->post('UnitOfDiscount',TRUE),
                    'TypePromotion' => $this->input->post('TypePromotion',TRUE),
                    'ImagePath' => $this->upload->data('file_name')
                );
    
                $this->Promotion_model->update($this->input->post('PromotionID', TRUE), $data);
            }else{
                $data = array(
                    'StartDate' => $this->input->post('StartDate',TRUE),
                    'EndDate' => $this->input->post('EndDate',TRUE),
                    'PromotionDetail' => $this->input->post('PromotionDetail',TRUE),
                    'PromotionName' => $this->input->post('PromotionName',TRUE),
                    'UnitOfDiscount' => $this->input->post('UnitOfDiscount',TRUE),
                    'TypePromotion' => $this->input->post('TypePromotion',TRUE),
                );
    
                $this->Promotion_model->update($this->input->post('PromotionID', TRUE), $data);
            }

            foreach($this->input->post('promotionproduct') as $productID){
                $ppData = array(
                    'ProductID'=>$productID,
                    'PromotionID'=>$promotion_id
                );

                $this->Promotionproduct_model->insert($ppData);
            }

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('promotion'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Promotion_model->get_by_id($id);

        if ($row) {
            $this->Promotion_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('promotion'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('promotion'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('StartDate', 'startdate', 'trim|required');
	$this->form_validation->set_rules('EndDate', 'enddate', 'trim|required');
	$this->form_validation->set_rules('PromotionDetail', 'promotiondetail', 'trim|required');
	$this->form_validation->set_rules('PromotionName', 'promotionname', 'trim|required');
	$this->form_validation->set_rules('UnitOfDiscount', 'unitofdiscount', 'trim|required');
	$this->form_validation->set_rules('TypePromotion', 'typepromotion', 'trim|required');
	$this->form_validation->set_rules('promotionproduct[]', 'promotionproduct', 'required');

	$this->form_validation->set_rules('PromotionID', 'PromotionID', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Promotion.php */
/* Location: ./application/controllers/Promotion.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-02-02 15:50:55 */
/* http://harviacode.com */