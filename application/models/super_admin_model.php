<?php

class Super_Admin_Model extends CI_Model {
    
    public function save_category_info() 
    {
        $data=array();
        $data['category_name']=$this->input->post('category_name',true);
        $data['category_publication_status']=$this->input->post('category_publication_status',true);
        $this->db->insert('tbl_category',$data);
    }
    
    public function select_all_category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function unpublished_category_by_id($category_id)
    {
        $this->db->set('category_publication_status',0);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category');
    }
    
    public function published_category_by_id($category_id)
    {
        $this->db->set('category_publication_status',1);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category');
    }
    
    public function select_category_by_id($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_category_info()
    {
        $data=array();
        $data['category_name']=$this->input->post('category_name',true);
        $data['category_publication_status']=$this->input->post('category_publication_status',true);
        $category_id=$this->input->post('category_id',true);
        $this->db->where('category_id',$category_id);
        $this->db->update('tbl_category',$data);
    }
    
    public function delete_category_by_id($category_id)
    {
        $this->db->where('category_id',$category_id);
        $this->db->delete('tbl_category');
    }
    
    public function save_subcategory_info() 
    {
        $data=array();
        $data['category_id']=$this->input->post('category_id',true);
        $data['sub_category_name']=$this->input->post('sub_category_name',true);
        $data['sub_category_publication_status']=$this->input->post('sub_category_publication_status',true);
        $this->db->insert('tbl_sub_category',$data);
    }
    
    public function unpublished_subcategory_by_id($sub_category_id)
    {
        $this->db->set('sub_category_publication_status',0);
        $this->db->where('sub_category_id',$sub_category_id);
        $this->db->update('tbl_sub_category');
    }
    
    public function published_subcategory_by_id($sub_category_id)
    {
        $this->db->set('sub_category_publication_status',1);
        $this->db->where('sub_category_id',$sub_category_id);
        $this->db->update('tbl_sub_category');
    }
   
    public function select_subcategory_by_id($sub_category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sub_category');
        $this->db->where('sub_category_id',$sub_category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_subcategory_info()
    {
        $data=array();
        $data['category_id']=$this->input->post('category_id',true);
        $data['sub_category_name']=$this->input->post('sub_category_name',true);
        $data['sub_category_publication_status']=$this->input->post('sub_category_publication_status',true);
        $sub_category_id=$this->input->post('sub_category_id',true);
        $this->db->where('sub_category_id',$sub_category_id);
        $this->db->update('tbl_sub_category',$data);
    }
    
    public function delete_subcategory_by_id($sub_category_id)
    {
        $this->db->where('sub_category_id',$sub_category_id);
        $this->db->delete('tbl_sub_category');
    }
    
    public function nonslider_product_by_id($product_id)
    {
        $this->db->set('product_slider',0);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');
    }
    
    public function slider_product_by_id($product_id)
    {
        $this->db->set('product_slider',1);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');
    }
  
    public function select_all_customer()
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function unpublished_customer_by_id($customer_id)
    {
        $this->db->set('customer_activation_status',0);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer');
    }
    
    public function published_customer_by_id($customer_id)
    {
        $this->db->set('customer_activation_status',1);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer');
    }
    
    public function delete_customer_by_id($customer_id)
    {
        $this->db->where('customer_id', $customer_id);
        $this->db->delete('tbl_customer');
    }
   
    public function select_customer_by_id($customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function save_product_info($data) 
    {
        $this->db->insert('tbl_product',$data);
    }
        
    public function select_all_product()
    {
        $sql = "SELECT * FROM tbl_category AS c, tbl_sub_category AS s, tbl_product AS p WHERE s.category_id = c.category_id AND s.sub_category_id = p.sub_category_id;";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_product_by_id($product_id)
    {
        $sql = "SELECT * FROM tbl_category AS c, tbl_brand AS b, tbl_sub_category AS s, tbl_product AS p WHERE c.category_id = s.category_id AND p.category_id=c.category_id AND p.brand_id = b.brand_id AND p.product_id = '$product_id' ";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function no_discount_by_id($product_id)
    {
        $this->db->set('product_discount_price_status',0);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');    
    }        
    
    public function product_discount_by_id($product_id)
    {        
        $this->db->set('product_discount_price_status',1);       
        $this->db->where('product_id',$product_id);       
        $this->db->update('tbl_product');   
    }
    
    public function not_special_product_by_id($product_id){
        $this->db->set('product_display_in_homepage',0);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');
    }
    
    public function special_product_by_id($product_id){
        $this->db->set('product_display_in_homepage',1);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');
    }

    public function unpublished_product_by_id($product_id){
        $this->db->set('product_publication_status',0);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');
    }
    
    public function published_product_by_id($product_id){
        $this->db->set('product_publication_status',1);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product');
    }
    
    public function update_product_info()
    {		
        $data = array();        		
        $data['product_name'] = $this->input->post('product_name', true);        
        $data['category_id'] = $this->input->post('category_id', true);        
        $data['sub_category_id'] = $this->input->post('sub_category_id', true);        
        $data['brand_id'] = $this->input->post('brand_id', true);        
        $data['product_summary'] = $this->input->post('product_summary', true);        
        $data['product_description'] = $this->input->post('product_description', true);        
        $data['product_color'] = $this->input->post('product_color', true);        
        $data['product_size'] = $this->input->post('product_size', true);		
        $data['style_id'] = $this->input->post('style_id', true);		
        $data['product_quantity'] = $this->input->post('product_quantity', true);		
        $data['product_price_in_bdt'] = $this->input->post('product_price_in_bdt', true);		
        $data['product_price_in_usd'] = $this->input->post('product_price_in_usd', true);		
        $data['product_price_in_gbp'] = $this->input->post('product_price_in_gbp', true);		
        $data['product_price_in_euro'] = $this->input->post('product_price_in_euro', true);		
        $data['product_discount_price'] = $this->input->post('product_discount_price', true);		
        $data['product_discount_price_status'] = $this->input->post('product_discount_price_status', true);		
        $data['product_display_in_homepage'] = $this->input->post('product_display_in_homepage', true); 		$data['product_publication_status'] = $this->input->post('product_publication_status', true);
        $product_id=$this->input->post('product_id',true);
        $this->db->where('product_id',$product_id);
        $this->db->update('tbl_product',$data);
    }
    
    public function delete_product_by_id($product_id)
    {
        $this->db->where('product_id',$product_id);
        $this->db->delete('tbl_product');
    }
    
    public function select_new_order() 
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->order_by('order_id','desc');
        $this->db->limit(5);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_manage_order() 
    {
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->order_by('order_id','aesc');
        $this->db->limit(5);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_all_order()
    {
        $sql = "SELECT * FROM tbl_order AS o, tbl_customer AS c WHERE o.customer_id = c.customer_id";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function pending_order_by_id($order_id){
        $this->db->set('order_status','Pending');
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_order');
    }
    
    public function paid_order_by_id($order_id){
        $this->db->set('order_status','Paid');
        $this->db->where('order_id',$order_id);
        $this->db->update('tbl_order');
    }
    
    public function delete_order_by_id($order_id)
    {
        $this->db->where('order_id',$order_id);
        $this->db->delete('tbl_order');
    }
    
     public function select_order_by_id($order_id)
    {
        $sql = "SELECT * FROM tbl_customer AS c, tbl_billing AS b, tbl_shipping AS s, tbl_shipping_method AS m, tbl_payment AS p, tbl_order AS o WHERE c.customer_id = o.customer_id AND b.billing_id=o.billing_id AND s.shipping_id = o.shipping_id AND m.shipping_method_id=o.shipping_method_id AND p.payment_id=o.payment_id AND o.order_id= '$order_id'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
}