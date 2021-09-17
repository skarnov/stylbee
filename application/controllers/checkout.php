<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Checkout extends CI_Controller {

    public function index() {
        $customer_id = $this->session->userdata('customer_id');
        $billing_id = $this->session->userdata('billing_id');
        $data = array();
        if ($customer_id == NULL) {
            $data = array();
            $data['title'] = 'Stylbee Checkout';
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['top_sellers'] = $this->welcome_model->select_top_sellers();
            $data['new_arrivals'] = $this->welcome_model->select_new_arrivals();
            $data['maincontent'] = $this->load->view('login', $data, true);
            $this->load->view('master', $data);
        }
        if ($customer_id != NULL && $billing_id == NULL) {
            redirect('checkout/show_billing_form');
        }
    }

    public function show_billing_form() {
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        if ($customer_id != NULL) {
            $data = array();
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['title'] = 'Stylbee Checkout';
            $data['maincontent'] = $this->load->view('billing_form', $data, true);
            $this->load->view('master', $data);
        }
    }

    public function save_billing_information() {
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        $data = array();
        $data['customer_id'] = $customer_id;
        $data['billing_first_name'] = $this->input->post('billing_first_name', true);
        $data['billing_last_name'] = $this->input->post('billing_last_name', true);
        $data['billing_email'] = $this->input->post('billing_email', true);
        $data['billing_phone'] = $this->input->post('billing_phone', true);
        $data['billing_country'] = $this->input->post('billing_country', true);
        $data['billing_address'] = $this->input->post('billing_address', true);
        $data['billing_city'] = $this->input->post('billing_city', true);
        $data['billing_post_code'] = $this->input->post('billing_post_code', true);
        
        $this->form_validation->set_rules('billing_first_name', 'First Name', 'required|min_length[5]');
        $this->form_validation->set_rules('billing_email', 'Customer Email', 'required|valid_email');
        $this->form_validation->set_rules('billing_phone', 'Phone', 'required|min_length[5]');
        $this->form_validation->set_rules('billing_country', 'Country', 'required|min_length[2]');
        $this->form_validation->set_rules('billing_address', 'Address', 'required|min_length[10]');
        $this->form_validation->set_rules('billing_city', 'City', 'required|min_length[2]');

        if ($this->form_validation->run() == False) {
            $data = array();
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['title'] = 'Stylbee Checkout';
            $data['maincontent'] = $this->load->view('billing_form', $data, true);
            $this->load->view('master', $data);
        } else {
            $billing_id = $this->checkout_model->save_billing_info($data);
            $sdata = array();
            $sdata['billing_id'] = $billing_id;
            $this->session->set_userdata($sdata);
            redirect('checkout/show_shipping_form');
        }
    }

    public function show_shipping_form() {
        $customer_id = $this->session->userdata('customer_id');
        $billing_id = $this->session->userdata('billing_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        if ($billing_id != NULL) {
            $data = array();
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['title'] = 'Stylbee Checkout';
            $data['maincontent'] = $this->load->view('shipping_form', $data, true);
            $this->load->view('master', $data);
        }
    }

    public function save_shipping_information() {
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        $data = array();
        $data['customer_id'] = $customer_id;
        $data['shipping_first_name'] = $this->input->post('shipping_first_name', true);
        $data['shipping_last_name'] = $this->input->post('shipping_last_name', true);
        $data['shipping_email'] = $this->input->post('shipping_email', true);
        $data['shipping_phone'] = $this->input->post('shipping_phone', true);
        $data['shipping_country'] = $this->input->post('shipping_country', true);
        $data['shipping_address'] = $this->input->post('shipping_address', true);
        $data['shipping_city'] = $this->input->post('shipping_city', true);
        $data['shipping_post_code'] = $this->input->post('shipping_post_code', true);

        $this->form_validation->set_rules('shipping_first_name', 'First Name', 'required|min_length[5]');
        $this->form_validation->set_rules('shipping_email', 'Customer Email', 'required|valid_email');
        $this->form_validation->set_rules('shipping_phone', 'Phone', 'required|min_length[5]');
        $this->form_validation->set_rules('shipping_country', 'Country', 'required|min_length[2]');
        $this->form_validation->set_rules('shipping_address', 'Address', 'required|min_length[10]');
        $this->form_validation->set_rules('shipping_city', 'City', 'required|min_length[2]');

        if ($this->form_validation->run() == False) {
            $data = array();
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['title'] = 'Stylbee Checkout';
            $data['maincontent'] = $this->load->view('shipping_form', $data, true);
            $this->load->view('master', $data);
        } else {
            $shipping_id = $this->checkout_model->save_shipping_info($data);
            $sdata = array();
            $sdata['shipping_id'] = $shipping_id;
            $this->session->set_userdata($sdata);
            redirect('checkout/show_shipping_method');
        }
    }

    public function show_shipping_method() {
        $customer_id = $this->session->userdata('customer_id');
        $shipping_id = $this->session->userdata('shipping_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        if ($shipping_id != NULL) {
            $data = array();
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['title'] = 'Stylbee Checkout';
            $data['maincontent'] = $this->load->view('shipping_method', $data, true);
            $this->load->view('master', $data);
        }
    }

    public function save_shipping_method_information() {
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        $data = array();
        $data['customer_id'] = $customer_id;
        $data['shipping_method_type'] = $this->input->post('shipping_method_type', true);
        $shipping_method_id = $this->checkout_model->save_shipping_method_info($data);
        $sdata = array();
        $sdata['shipping_method_id'] = $shipping_method_id;
        $this->session->set_userdata($sdata);
        redirect('checkout/show_payment_form');
    }

    public function show_payment_form() {
        $customer_id = $this->session->userdata('customer_id');
        $shipping_method_id = $this->session->userdata('shipping_method_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        if ($shipping_method_id != NULL) {
            $data = array();
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['title'] = 'Stylbee Checkout';
            $data['maincontent'] = $this->load->view('payment_form', $data, true);
            $this->load->view('master', $data);
        }
    }

    public function confirm_order() {
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        if ($customer_id != NULL) {
            $payment_method = $this->input->post('payment_type', true);
            if ($payment_method == 'cash_on_delivery') {
                $this->checkout_model->save_payment_info();
                $this->checkout_model->save_order_info();
                $mdata = array();
                $customer_id = $this->session->userdata('customer_id');
                $billing_id = $this->session->userdata('billing_id');
                $shipping_id = $this->session->userdata('shipping_id');
                $shipping_method_id = $this->session->userdata('shipping_method_id');
                $mdata['customer_info'] = $this->welcome_model->select_customer_info($customer_id);
                $mdata['billing_info'] = $this->checkout_model->select_billing_info($billing_id);
                $mdata['shipping_info'] = $this->checkout_model->select_shipping_info($shipping_id);
                $mdata['shipping_method_info'] = $this->checkout_model->select_shipping_method_info($shipping_method_id);
                $mdata['from_address'] = 'contact@stylbee.com';
                $mdata['admin_full_name'] = 'Stylbee Invoice';
                $mdata['cc_address'] = 'contact@stylbee.com';
                $mdata['to_address'] = $mdata['customer_info']->customer_email;
                $mdata['subject'] = 'Stylbee - Order Invoice';
                $this->mailer_model->sendEmail($mdata, 'invoice');
                redirect('checkout/order_complete');
            }

            if ($payment_method == 'bkash') {
                $this->checkout_model->save_payment_info();
                $this->checkout_model->save_order_info();
                redirect('checkout/bkash');
            }
        }
    }

    public function bkash() {
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        if ($customer_id != NULL) {
            $data = array();
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['title'] = 'Stylbee Complete Order';
            $data['maincontent'] = $this->load->view('bkash_order_complete', $data, true);
            $this->load->view('master', $data);
        }
    }

    public function bkash_order_complete() {
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        if ($customer_id != NULL) {
            $this->checkout_model->save_bkash_order_info();
            $data = array();
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['title'] = 'Stylbee Complete Order';
            $trxid = $this->input->post('bkash_trxid', true);
            $mdata = array();
            $customer_id = $this->session->userdata('customer_id');
            $billing_id = $this->session->userdata('billing_id');
            $shipping_id = $this->session->userdata('shipping_id');
            $shipping_method_id = $this->session->userdata('shipping_method_id');
            $mdata['customer_info'] = $this->welcome_model->select_customer_info($customer_id);
            $mdata['billing_info'] = $this->checkout_model->select_billing_info($billing_id);
            $mdata['shipping_info'] = $this->checkout_model->select_shipping_info($shipping_id);
            $mdata['shipping_method_info'] = $this->checkout_model->select_shipping_method_info($shipping_method_id);
            $mdata['bkash_info'] = $trxid;
            $mdata['from_address'] = 'contact@stylbee.com';
            $mdata['admin_full_name'] = 'Stylbee Invoice';
            $mdata['cc_address'] = 'contact@stylbee.com';
            $mdata['to_address'] = $mdata['customer_info']->customer_email;
            $mdata['subject'] = 'Stylbee - Order Invoice';
            $this->mailer_model->sendEmail($mdata, 'bkash_invoice');
            redirect('checkout/order_complete');
        }
    }

    public function order_complete() {
        $customer_id = $this->session->userdata('customer_id');
        if ($customer_id == NULL) {
            redirect('welcome/login');
        }
        if ($customer_id != NULL) {
            $data = array();
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['title'] = 'Stylbee Complete Order';
            $data['maincontent'] = $this->load->view('order_complete', $data, true);
            $this->load->view('master', $data);
        }
    }
}