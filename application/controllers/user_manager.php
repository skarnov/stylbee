<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Manager extends CI_Controller {
    
    public function save_customer()
    {
        $data = array();
        $data['customer_first_name'] = $this->input->post('customer_first_name', true);
        $data['customer_last_name'] = $this->input->post('customer_last_name', true);
        $data['customer_user_name'] = $this->input->post('customer_user_name', true);
        $data['customer_password'] = ($this->input->post('customer_password', true));
        $data['customer_email'] = $this->input->post('customer_email', true);
        $data['customer_address_temporary'] = $this->input->post('customer_address_temporary', true);
        $data['customer_address_permanent'] = $this->input->post('customer_address_permanent', true);
        $data['customer_city'] = $this->input->post('customer_city', true);
        $data['customer_state'] = $this->input->post('customer_state', true);
        $data['customer_postal_code'] = $this->input->post('customer_postal_code', true);
        $data['customer_country'] = $this->input->post('customer_country', true);
        $data['customer_phone'] = $this->input->post('customer_phone', true);
        
        $this->form_validation->set_rules('customer_first_name', 'First Name', 'required|min_length[5]');
        $this->form_validation->set_rules('customer_user_name', 'User Name', 'required|min_length[5]');
        $this->form_validation->set_rules('customer_password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('customer_email','Customer Email','required|valid_email');
        $this->form_validation->set_rules('customer_address_permanent', 'Permanent Address', 'required|min_length[10]');
        $this->form_validation->set_rules('customer_city', 'City', 'required|min_length[2]');
        $this->form_validation->set_rules('customer_country', 'Country', 'required|min_length[5]');
        $this->form_validation->set_rules('customer_phone', 'Phone', 'required|min_length[5]');
        
        if($this->form_validation->run() == False)
        {
       	    $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['maincontent'] = $this->load->view('signup', '', true);
            $this->load->view('master', $data);
        }
        
        else
        { 
            $this->user_administrator_model->save_customer_info($data);
            /*--------------Start Send Account Creation Email------------*/
            $mdata=array();
            $mdata['from_address']='maruf@stylbee.com';
            $mdata['cc_address']='maruf@stylbee.com';
            $mdata['admin_full_name']='Stylbee Account';
            $mdata['to_address']=$data['customer_email'];
            $mdata['subject']='Stylbee New Customer! - Account Created Successfully';
            $mdata['customer_password']=$this->input->post('customer_password',true);
            $mdata['customer_last_name']=$this->input->post('customer_last_name',true);
            $this->mailer_model->sendEmail($mdata,'activation_email');
            /*--------------End Send Account Creation Email------------*/
            redirect('welcome/login');
	}
    }
	
    public function forgot_password()
    {        
        $data = array();
        $data['title'] = 'Forget Password';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['maincontent'] = $this->load->view('forgot_password', '', true);
        $this->load->view('master', $data);
    }
    
    public function reset_password()
    {     
        $data = $this->input->post('customer_email', true);
        $result = $this->user_administrator_model->check_password($data);
        $password=$result->customer_password;
    
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
            redirect('user_manager/forgot_password');
        }
        else{
            echo 'Your Password Is Not Exists Our Database';
            redirect('user_manager/forgot_password');
        }                
    }
}