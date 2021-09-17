<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Administrator extends CI_Controller {
    
    public function customer_login_check() {
        $data = array();
        $data['customer_email_address'] = $this->input->post('customer_email_address', true);
        $data['customer_password'] = $this->input->post('customer_password', true);
        $result = $this->user_administrator_model->user_login_check($data);
        $sdata = array();
        if ($result) {
            $sdata['customer_id'] = $result->customer_id;
            $sdata['customer_user_name'] = $result->customer_user_name;
            $this->session->set_userdata($sdata);
            $in_checkout = $this->session->userdata('in_checkout');
            if($in_checkout){
                redirect('checkout/show_shipping_form');
            }else{
                redirect('welcome');
            }
            
        } else {
            $sdata['exception'] = 'Your Stylbee Login Information Invalid! Contact With Stylbee';
            $this->session->set_userdata($sdata);
            redirect('welcome/login');
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('welcome/login');
    }
}