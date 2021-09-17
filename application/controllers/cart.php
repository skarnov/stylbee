<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
    public function add_to_cart($product_id) {
        $qty = $this->input->post('qty', TRUE);
        if ($qty == 0) {
            $qty = 1;
        }
        $product_info = $this->welcome_model->select_product_by_id($product_id);
		$currency = $this->session->userdata('currency');
        switch ($currency) {
            case 'BDT':
                $price = $product_info->product_price_in_bdt;
                break;
            case 'USD':
                $price = $product_info->product_price_in_usd;
                break;
            case 'EURO':
                $price = $product_info->product_price_in_euro;
                break;
            case 'GBP':
                $price = $product_info->product_price_in_gbp;
                break;
        }
        $data = array(
            'id' => $product_info->product_id,
            'qty' => $qty,
            'price' => $price,
            'name' => $product_info->product_name,
            'image' => $product_info->product_photo_0,
            'model' => $product_info->style_id,
        );
        $this->cart->insert($data);
        redirect('cart/show_cart');
    }

    public function show_cart() {
        $data = array();
        $data['title'] = 'Stylbee Shoping Cart';
        $data['all_category'] = $this->welcome_model->select_all_published_category();
        $data['all_subcategory'] = $this->welcome_model->select_subcategory();
        $data['top_sellers'] = $this->welcome_model->select_top_sellers();
        $data['new_arrivals'] = $this->welcome_model->select_new_arrivals();
        $data['slider_product'] = $this->welcome_model->select_slider_product();
        $data['maincontent'] = $this->load->view('cart_view', $data, true);
        $this->load->view('master', $data);
    }

    public function update_cart() {
        $qty = $this->input->post('product_quantity', true);
        $rowid = $this->input->post('rowid', true);
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }

    public function remove($rowid) {
        $data = array(
            'rowid' => $rowid,
            'qty' => '0'
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }
}