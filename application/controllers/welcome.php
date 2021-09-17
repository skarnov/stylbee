<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Welcome extends CI_Controller {

    public function index()
    {
        $data = array();
        if(!$this->session->userdata('currency'))
	{
            $this->set_currency('BDT');
        }       
        $data['title'] = 'Stylbee Store || Online GigaShop';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['top_sellers'] = $this->welcome_model->select_top_sellers();
        $data['new_arrivals'] = $this->welcome_model->select_new_arrivals();
        $data['slider_product'] = $this->welcome_model->select_slider_product();
        $data['maincontent'] = $this->load->view('home_content', $data, true);
        $this->load->view('master', $data);
    }
    
    public function set_currency($currency)
    {
        $sdata= array();
        $sdata['currency'] = $currency;
        $this->session->set_userdata($sdata);
    }

    public function login()
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Stylbee Login';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['maincontent'] = $this->load->view('login', '', true);
        $this->load->view('master', $data);
    }
    
    public function cart() 
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Stylbee Shopping Cart';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['maincontent'] = $this->load->view('cart', '', true);
        $this->load->view('master', $data);
    }
    
    public function signup()
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Stylbee Signup';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['maincontent'] = $this->load->view('signup', '', true);
        $this->load->view('master', $data);
    }

    public function about()
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Stylbee About Us';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['maincontent'] = $this->load->view('about', '', true);
        $this->load->view('master', $data);
    }

    public function contact()
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Stylbee Contact Us';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['maincontent'] = $this->load->view('contact', '', true);
        $this->load->view('master', $data);
    }

    public function product_details($product_id)
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Stylbee Products';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['product_detail'] = $this->super_admin_model->select_product_by_id($product_id);
        $data['maincontent'] = $this->load->view('product_details', $data, true);
        $this->load->view('master', $data);
    }

    public function product_listing($category_id) 
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Stylbee Products';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['category'] = $this->welcome_model->select_category_by_name($category_id);
        $data['category_product'] = $this->welcome_model->select_product_by_category_id($category_id);
        $data['maincontent'] = $this->load->view('product_listing', $data, true);
        $this->load->view('master', $data);
    }

    public function product_listing_sub($category_name, $sub_category_id)
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Stylbee Products';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['category_name'] = $category_name;
        $data['sub_category'] = $this->welcome_model->select_sub_category_by_id($sub_category_id);
        $data['category_product'] = $this->welcome_model->select_product_by_sub_category_id($sub_category_id);
        $data['maincontent'] = $this->load->view('product_listing_sub', $data, true);
        $this->load->view('master', $data);
    }

    public function search_product($text)
    {
        if ($text != NULL)
	{
            $data = array();
            $data['title'] = 'Stylbee Products';
            $data['all_category'] = $this->welcome_model->select_all_published_category();
            $data['all_subcategory'] = $this->welcome_model->select_subcategory();
            $data['search_product'] = $this->welcome_model->search_product($text);
            $maincontent = $this->load->view('search_product', $data, true);
            echo $maincontent;
        }   
    }
	
    public function new_arival() 
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'New Arival';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['new_arrivals'] = $this->welcome_model->select_all_new_arrivals();
        $data['maincontent'] = $this->load->view('new_arival', $data, true);
        $this->load->view('master', $data);
    }
    
    public function top_seller() 
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Top Seller';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['top_sellers'] = $this->welcome_model->select_all_top_sellers();
        $data['maincontent'] = $this->load->view('top_sellers', $data, true);
        $this->load->view('master', $data);
    }
	
    public function big_discount() 
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Top Seller';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['slider_product'] = $this->welcome_model->select_all_top_sellers();
        $data['maincontent'] = $this->load->view('big_discount', $data, true);
        $this->load->view('master', $data);
    }
    
    public function special_product() 
    {
        $data = array();
        if(!$this->session->userdata('currency'))
        {
            $this->set_currency('BDT');
        }
        $data['title'] = 'Top Seller';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['special_product'] = $this->welcome_model->select_all_slider_product();
        $data['maincontent'] = $this->load->view('special_product', $data, true);
        $this->load->view('master', $data);
    }
}