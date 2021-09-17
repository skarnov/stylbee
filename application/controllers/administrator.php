<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Administrator extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $admin_id=$this->session->userdata('admin_id');
        if($admin_id !=NULL)
        {
            redirect('super_admin','refresh'); 
        }
    }
    
    public function index()
    {
        $this->load->view('admin/admin_login');
    }
    
    public function check_admin_login()
    {
        $data=array();
        $data['admin_email_address']=$this->input->post('admin_email_address',true);
        $data['admin_password']=$this->input->post('admin_password',true);
        $result=$this->administrator_model->admin_login_check($data);
        
        $sdata=array();
        if($result)
        {
            $sdata['admin_id']=$result->admin_id;
            $sdata['admin_name']=$result->admin_name;
            $this->session->set_userdata($sdata);
            redirect('super_admin');
        }
        
        else{
            $sdata['exception']='Your Email / Password Invalide !';
            $this->session->set_userdata($sdata);
            redirect('administrator');
        }
    }
    
    
    public function forgot_password()
    {        
        $data = array();
        $data['title'] = 'Admin Forget Password';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['maincontent'] = $this->load->view('admin_forgot_password', '', true);
        $this->load->view('master', $data);
    }
    
    public function reset_password()
    {     
        $data = $this->input->post('admin_email_address', true);
        $result = $this->administrator_model->check_password($data);
        $password=$result->admin_password;
    
        if($password)
        {
            $mdata=array();
            $mdata['from_address']='maruf@stylbee.com';
            $mdata['admin_full_name']='Stylbee Account';
            $mdata['to_address']=$data;
            $mdata['subject']='Stylbee Forget Password';
            $mdata['customer_password']=$password;
            $this->mailer_model->password($mdata,'forget_password_email');
            echo 'Please Check Your Mail';
            redirect('administrator/forgot_password');
        }
        else{
            echo 'Your Password Is Not Exists Our Database';
            redirect('administrator/forgot_password');
        }                
    }
}