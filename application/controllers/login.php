<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class login extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the login model
          $this->load->model('login_model');
          $this->load->model('Shoppingbag_model');
     }

     public function index()
     {
          //get the posted values
          $username = $this->input->post("username");
          $password = $this->input->post("password");

          //set validations
          $this->form_validation->set_rules("username", "username", "trim|required");
          $this->form_validation->set_rules("password", "password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
                $this->load->view('template/header');
                $this->load->view('login');
                $this->load->view('template/footer');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_user($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                        $this->db->where('username', $username);
                        $CustomerData = $this->db->get('Customer')->row();
                         //set the session variables
                         $sessiondata = array(
                              'username' => $username,
                              'loginuser' => TRUE,
                              'CustomerID'=> $CustomerData->CustomerID,
                              'CustomerToken' => $CustomerData->token,
                              'is_admin'=>$CustomerData->is_admin
                         );
                         $this->session->set_userdata($sessiondata);
                         $this->session->set_userdata('cart_items', $this->Shoppingbag_model->get_user_unordered_cart_all($this->session->CustomerID));
                         
                         redirect("/");
                        
                    }
                    else
                    {
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('login');
                    }
               }
               else
               {
                    redirect('login');
               }
          }
     }

}?>