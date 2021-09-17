<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Super_Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $admin_id = $this->session->userdata('admin_id');
        if ($admin_id == NULL) {
            redirect('administrator', 'refresh');
        }
    }

    public function index() {
        $data = array();
        $data['all_order'] = $this->super_admin_model->select_new_order();
        $data['order'] = $this->super_admin_model->select_manage_order();
        $data['dashboard'] = $this->load->view('admin/dashboard', $data, true);
        $data['title'] = 'Dashboard';
        $this->load->view('admin/admin_master', $data);
    }

    public function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $sdata['message'] = 'You are successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('administrator');
    }

    public function add_category() {
        $data = array();
        $data['dashboard'] = $this->load->view('admin/add_category', '', true);
        $data['title'] = 'Add Category';
        $this->load->view('admin/admin_master', $data);
    }

    public function save_category() {
        $this->super_admin_model->save_category_info();
        $data = array();
        $data['category_publication_status'] = $this->input->post('category_publication_status', true);
        if ($data['category_publication_status'] == '1') {
            $sdata = array();
            $sdata['message'] = 'Category Published';
            $this->session->set_userdata($sdata);
        }
        if ($data['category_publication_status'] == '0') {
            $sdata = array();
            $sdata['message'] = 'Category Saved But Not Published';
            $this->session->set_userdata($sdata);
        }
        redirect('super_admin/add_category');
    }

    public function manage_category() {
        $data = array();
        $data['all_category'] = $this->super_admin_model->select_all_category();
        $data['dashboard'] = $this->load->view('admin/manage_category', $data, true);
        $data['title'] = 'Manage Category';
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_category($category_id) {
        $this->super_admin_model->unpublished_category_by_id($category_id);
        redirect('super_admin/manage_category');
    }

    public function published_category($category_id) {
        $this->super_admin_model->published_category_by_id($category_id);
        redirect('super_admin/manage_category');
    }

    public function edit_category($category_id) {
        $data = array();
        $data['category_info'] = $this->super_admin_model->select_category_by_id($category_id);
        $data['dashboard'] = $this->load->view('admin/edit_category', $data, true);
        $data['title'] = 'Edit Category';
        $sdata = array();
        $sdata['message'] = 'Update Category Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_category() {
        $this->super_admin_model->update_category_info();
        redirect('super_admin/manage_category');
    }

    public function delete_category($category_id) {
        $this->super_admin_model->delete_category_by_id($category_id);
        redirect('super_admin/manage_category');
    }

    public function add_subcategory() {
        $data = array();
        $data['all_category'] = $this->super_admin_model->select_all_category();
        $data['dashboard'] = $this->load->view('admin/add_subcategory', $data, true);
        $data['title'] = 'Add Sub Category';
        $this->load->view('admin/admin_master', $data);
    }

    public function save_subcategory() {
        $this->super_admin_model->save_subcategory_info();
        $data = array();
        $data['sub_category_publication_status'] = $this->input->post('sub_category_publication_status', true);
        if ($data['sub_category_publication_status'] == '1') {
            $sdata = array();
            $sdata['message'] = 'Subcategory Published';
            $this->session->set_userdata($sdata);
        }
        if ($data['sub_category_publication_status'] == '0') {
            $sdata = array();
            $sdata['message'] = 'Subcategory Saved But Not Published';
            $this->session->set_userdata($sdata);
        }
        redirect('super_admin/add_subcategory');
    }

    public function manage_subcategory() {
        $data = array();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['dashboard'] = $this->load->view('admin/manage_subcategory', $data, true);
        $data['title'] = 'Manage Subcategory';
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_subcategory($sub_category_id) {
        $this->super_admin_model->unpublished_subcategory_by_id($sub_category_id);
        redirect('super_admin/manage_subcategory');
    }

    public function published_subcategory($sub_category_id) {
        $this->super_admin_model->published_subcategory_by_id($sub_category_id);
        redirect('super_admin/manage_subcategory');
    }

    public function edit_subcategory($sub_category_id) {
        $data = array();
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['subcategory_info'] = $this->super_admin_model->select_subcategory_by_id($sub_category_id);
        $data['dashboard'] = $this->load->view('admin/edit_subcategory', $data, true);
        $data['title'] = 'Edit Subcategory';
        $sdata = array();
        $sdata['message'] = 'Update Subcategory Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_subcategory() {
        $this->super_admin_model->update_subcategory_info();
        redirect('super_admin/manage_subcategory');
    }

    public function delete_subcategory($sub_category_id) {
        $this->super_admin_model->delete_subcategory_by_id($sub_category_id);
        redirect('super_admin/manage_subcategory');
    }

    public function manage_slider() {
        $data = array();
        $data['slider_product'] = $this->super_admin_model->select_all_product();
        $data['dashboard'] = $this->load->view('admin/manage_slider', $data, true);
        $data['title'] = 'Manage Slider';
        $this->load->view('admin/admin_master', $data);
    }

    public function nonslider_product($product_id) {
        $this->super_admin_model->nonslider_product_by_id($product_id);
        redirect('super_admin/manage_slider');
    }

    public function slider_product($product_id) {
        $this->super_admin_model->slider_product_by_id($product_id);
        redirect('super_admin/manage_slider');
    }

    public function manage_customer() {
        $data = array();
        $data['all_customer'] = $this->super_admin_model->select_all_customer();
        $data['dashboard'] = $this->load->view('admin/manage_customer', $data, true);
        $data['title'] = 'Manage Customer';
        $this->load->view('admin/admin_master', $data);
    }

    public function disable_customer($customer_id) {
        $this->super_admin_model->unpublished_customer_by_id($customer_id);
        redirect('super_admin/manage_customer');
    }

    public function enable_customer($customer_id) {
        $this->super_admin_model->published_customer_by_id($customer_id);
        redirect('super_admin/manage_customer');
    }

    public function delete_customer($customer_id) {
        $this->super_admin_model->delete_customer_by_id($customer_id);
        redirect('super_admin/manage_customer');
    }

    public function view_customer($customer_id) {
        $data = array();
        $data['customer_info'] = $this->super_admin_model->select_customer_by_id($customer_id);
        $data['dashboard'] = $this->load->view('admin/view_customer', $data, true);
        $data['title'] = 'View Customer';
        $this->load->view('admin/admin_master', $data);
    }

    public function add_brand() {
        $data = array();
        $data['dashboard'] = $this->load->view('admin/add_brand', '', true);
        $data['title'] = 'Add Brand';
        $this->load->view('admin/admin_master', $data);
    }

    public function save_brand() {
        $this->welcome_model->save_brand_info();
        $data = array();
        $data['brand_publication_status'] = $this->input->post('brand_publication_status', true);
        if ($data['brand_publication_status'] == '1') {
            $sdata = array();
            $sdata['message'] = 'Brand Published';
            $this->session->set_userdata($sdata);
        }
        if ($data['brand_publication_status'] == '0') {
            $sdata = array();
            $sdata['message'] = 'Brand Saved But Not Published';
            $this->session->set_userdata($sdata);
        }
        redirect('super_admin/add_category');
    }

    public function manage_brand() {
        $data = array();
        $data['all_brand'] = $this->welcome_model->select_all_brand();
        $data['dashboard'] = $this->load->view('admin/manage_brand', $data, true);
        $data['title'] = 'Manage Brand';
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_brand($brand_id) {
        $this->welcome_model->unpublished_brand_by_id($brand_id);
        redirect('super_admin/manage_brand');
    }

    public function published_brand($brand_id) {
        $this->welcome_model->published_brand_by_id($brand_id);
        redirect('super_admin/manage_brand');
    }

    public function edit_brand($brand_id) {
        $data = array();
        $data['brand_info'] = $this->welcome_model->select_brand_by_id($brand_id);
        $data['dashboard'] = $this->load->view('admin/edit_brand', $data, true);
        $data['title'] = 'Edit Category';
        $sdata = array();
        $sdata['message'] = 'Update Brand Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_brand() {
        $this->welcome_model->update_brand_info();
        redirect('super_admin/manage_brand');
    }

    public function delete_brand($brand_id) {
        $this->welcome_model->delete_brand_by_id($brand_id);
        redirect('super_admin/manage_brand');
    }

    public function add_product() {
        $data = array();
        $data['all_category'] = $this->super_admin_model->select_all_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['all_brand'] = $this->welcome_model->select_brand();
        $data['dashboard'] = $this->load->view('admin/add_product', $data, true);
        $data['title'] = 'Manage Category';
        $this->load->view('admin/admin_master', $data);
    }

    public function save_product() {
        $data = array();
        $data['product_name'] = $this->input->post('product_name', true);
        $data['category_id'] = $this->input->post('category_id', true);
        $data['sub_category_id'] = $this->input->post('sub_category_id', true);
        $data['brand_id'] = $this->input->post('brand_id', true);
        $data['product_summary'] = $this->input->post('product_summary', true);
        $data['product_description'] = $this->input->post('product_description', true);
        $data['product_color'] = $this->input->post('product_color', true);
        $data['product_size'] = $this->input->post('product_size', true);

        $cnt = 0;
        foreach ($_FILES as $eachFile) {
            if ($eachFile['size'] > 0) {
                $config['upload_path'] = 'images/product_photo_' . $cnt . '/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5120';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $error = '';
                $fdata = array();
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('product_photo_' . $cnt)) {
                    $error = $this->upload->display_errors();
                    echo $error;
                    exit();
                } else {
                    $fdata = $this->upload->data();
                    $index = 'product_photo_' . $cnt;
                    $data[$index] = $config['upload_path'] . $fdata['file_name'];
                }
                $config['image_library'] = 'gd2';
                $config['new_image'] = 'images/product_thumbnail/';
                $config['source_image'] = $data[$index];
                $config['create_thumb'] = TRUE;
                $config['create_ratio'] = TRUE;
                $config['width'] = '300';
                $config['height'] = '300';
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_error();
                } else {
                    $index = 'product_photo_thumb_' . $cnt;
                    $data[$index] = $config['new_image'] . $fdata['raw_name'] . '_thmb' . $fdata['file_ext'];
                }
                $cnt++;
            }
        }
        $data['style_id'] = $this->input->post('style_id', true);
        $data['product_quantity'] = $this->input->post('product_quantity', true);
        $data['product_price_in_bdt'] = $this->input->post('product_price_in_bdt', true);
        $data['product_price_in_usd'] = $this->input->post('product_price_in_usd', true);
        $data['product_price_in_gbp'] = $this->input->post('product_price_in_gbp', true);
        $data['product_price_in_euro'] = $this->input->post('product_price_in_euro', true);
        $data['product_discount_price'] = $this->input->post('product_discount_price', true);
        $data['product_discount_price_status'] = $this->input->post('product_discount_price_status', true);
        $data['product_display_in_homepage'] = $this->input->post('product_display_in_homepage', true);
        $data['product_publication_status'] = $this->input->post('product_publication_status', true);
        $this->super_admin_model->save_product_info($data);
        $sdata = array();
        $sdata['message'] = 'Product Has Been Saved';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_product');
    }

    public function manage_product() {
        $data = array();
        $data['all_product'] = $this->super_admin_model->select_all_product();
        $data['dashboard'] = $this->load->view('admin/manage_product', $data, true);
        $data['title'] = 'Manage Product';
        $this->load->view('admin/admin_master', $data);
    }

    public function product_discount($product_id) {
        $this->super_admin_model->product_discount_by_id($product_id);
        redirect('super_admin/manage_product');
    }

    public function no_discount($product_id) {
        $this->super_admin_model->no_discount_by_id($product_id);
        redirect('super_admin/manage_product');
    }

    public function not_special_product($product_id) {
        $this->super_admin_model->not_special_product_by_id($product_id);
        redirect('super_admin/manage_product');
    }

    public function special_product($product_id) {
        $this->super_admin_model->special_product_by_id($product_id);
        redirect('super_admin/manage_product');
    }

    public function view_product($product_id) {
        $data = array();
        $data['product_info'] = $this->super_admin_model->select_product_by_id($product_id);
        $data['dashboard'] = $this->load->view('admin/view_product', $data, true);
        $data['title'] = 'View Product';
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_product($product_id) {
        $this->super_admin_model->unpublished_product_by_id($product_id);
        redirect('super_admin/manage_product');
    }

    public function published_product($product_id) {
        $this->super_admin_model->published_product_by_id($product_id);
        redirect('super_admin/manage_product');
    }

    public function edit_product($product_id) {
        $data = array();
        $data['all_category'] = $this->super_admin_model->select_all_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['all_brand'] = $this->welcome_model->select_brand();
        $data['product_info'] = $this->super_admin_model->select_product_by_id($product_id);
        $data['dashboard'] = $this->load->view('admin/edit_product', $data, true);
        $data['title'] = 'Edit Product';
        $sdata = array();
        $sdata['message'] = 'Update Product Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_product() {
        $this->super_admin_model->update_product_info();
        redirect('super_admin/manage_product');
    }

    public function delete_product($product_id) {
        $this->super_admin_model->delete_product_by_id($product_id);
        redirect('super_admin/manage_product');
    }

    public function manage_order() {
        $data = array();
        $data['all_order'] = $this->super_admin_model->select_all_order();
        $data['dashboard'] = $this->load->view('admin/manage_order', $data, true);
        $data['title'] = 'Manage Order';
        $this->load->view('admin/admin_master', $data);
    }

    public function pending_order($order_id) {
        $this->super_admin_model->pending_order_by_id($order_id);
        redirect('super_admin/manage_order');
    }

    public function paid_order($order_id) {
        $this->super_admin_model->paid_order_by_id($order_id);
        redirect('super_admin/manage_order');
    }

    public function order_details($order_id) {
        $data = array();
        $data['all_category'] = $this->super_admin_model->select_all_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['all_brand'] = $this->welcome_model->select_brand();
        $data['product_info'] = $this->super_admin_model->select_product_by_id($order_id);
        $data['dashboard'] = $this->load->view('admin/edit_product', $data, true);
        $data['title'] = 'Edit Product';
        $sdata = array();
        $sdata['message'] = 'Update Product Information Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('admin/admin_master', $data);
    }

    public function delete_order($order_id) {
        $this->super_admin_model->delete_order_by_id($order_id);
        redirect('super_admin/manage_order');
    }

    public function invoice($order_id) {
        $data = array();
        $data['order_info'] = $this->super_admin_model->select_order_by_id($order_id);
        $data['dashboard'] = $this->load->view('admin/invoice', $data, true);
        $data['title'] = 'Invoice';
        $this->load->view('admin/admin_master', $data);
    }

    public function about_cms() {
        $data = array();
        $data['title'] = 'About Sk Arnov';
        $data['dashboard'] = $this->load->view('admin/about_cms', $data, true);
        $this->load->view('admin/admin_master', $data);
    }
}