<?php

class checkout_model extends CI_Model{
    
    public function save_customer_info($data)
    {
        $this->db->insert('tbl_customer',$data);
        $customer_id=$this->db->insert_id();
        return $customer_id;
    }
    
    public function save_billing_info($data)
    {
        $this->db->insert('tbl_billing',$data);
        $billing_id=$this->db->insert_id();
        return $billing_id;
    }
    
    public function save_shipping_info($data)
    {
        $this->db->insert('tbl_shipping',$data);
        $shipping_id=$this->db->insert_id();
        return $shipping_id;
    }
    
    public function save_shipping_method_info($data)
    {
        $this->db->insert('tbl_shipping_method',$data);
        $shipping_method_id=$this->db->insert_id();
        return $shipping_method_id;
    }
    
    public function save_payment_info()
    {
        $data=array();
        $data['payment_type']=$this->input->post('payment_type',true);
        $this->db->insert('tbl_payment',$data);
        $sdata=array();
        $sdata['payment_id']=$this->db->insert_id();
        $this->session->set_userdata($sdata);
    }
    
      public function select_billing_info($billing_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_billing');
        $this->db->where('billing_id',$billing_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_shipping_info($shipping_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_shipping');
        $this->db->where('shipping_id',$shipping_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_shipping_method_info($shipping_method_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_shipping_method');
        $this->db->where('shipping_method_id',$shipping_method_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function save_bkash_order_info() 
    {
        $data=array();
        $data['bkash_trxid']=$this->input->post('bkash_trxid',true);
        $this->db->insert('tbl_bkash',$data);
    }
    
    public function select_bkash_info($bkash_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_bkash');
        $this->db->where('bkash_id',$bkash_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function save_order_info()
    {
        $data=array();
        $data['customer_id']=$this->session->userdata('customer_id');
        $data['billing_id']=$this->session->userdata('billing_id');
        $data['shipping_id']=$this->session->userdata('shipping_id');
        $data['shipping_method_id']=$this->session->userdata('shipping_method_id');
        $data['payment_id']=$this->session->userdata('payment_id');
        $data['order_total']=$this->session->userdata('grand_total');
        $data['currency']=$this->session->userdata('currency');
        $data['invoice_date']= date('d/m/y');
        $this->db->insert('tbl_order',$data);
        $order_id=$this->db->insert_id();
        $contents=$this->cart->contents();
        $oddata=array();
        foreach($contents as $values)
        {
           $oddata['order_id']=$order_id;
           $oddata['product_id']=$values['id'];
           $oddata['product_price']=$values['price'];
           $oddata['product_name']=$values['name'];
           $oddata['product_sales_quantity']=$values['qty'];
           $this->db->insert('tbl_order_details',$oddata);
        }
        $sql = "update tbl_product, tbl_order_details
                set tbl_product.product_quantity = tbl_product.product_quantity - tbl_order_details.product_sales_quantity 
                where tbl_product.product_id = tbl_order_details.product_id
                and tbl_order_details.order_id = '$order_id' ";
        $this->db->query($sql);
    }
}