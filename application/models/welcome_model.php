<?php

class Welcome_Model extends CI_Model {
    
    public function select_all_published_category() 
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_publication_status',1);        
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_subcategory()
    {
        $sql = "SELECT * FROM tbl_category AS c, tbl_sub_category AS s WHERE c.category_id = s.category_id";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_all_subcategory()
    {
        $this->db->select('*');
        $this->db->from('tbl_sub_category');
        $this->db->where('sub_category_publication_status',1);        
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_welcome_message() 
    {
        $this->db->select('*');
        $this->db->from('tbl_welcome_message');
        $this->db->where('welcome_message_publication_status',1);        
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_top_sellers() 
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_display_in_homepage',1);
        $this->db->where('product_publication_status',1);
        $this->db->limit(12);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_new_arrivals() 
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_publication_status',1);
        $this->db->order_by('product_id','desc');
        $this->db->limit(12);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_slider_product() 
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_publication_status',1);
        $this->db->where('product_slider',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_brand()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->where('brand_publication_status',1);        
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function save_brand_info() 
    {
        $data=array();
        $data['brand_name']=$this->input->post('brand_name',true);
        $data['brand_publication_status']=$this->input->post('brand_publication_status',true);
        $this->db->insert('tbl_brand',$data);
    }
    
    public function select_all_brand()
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

    public function unpublished_brand_by_id($brand_id)
    {
        $this->db->set('brand_publication_status',0);
        $this->db->where('brand_id',$brand_id);
        $this->db->update('tbl_brand');
    }
    
    public function published_brand_by_id($brand_id)
    {
        $this->db->set('brand_publication_status',1);
        $this->db->where('brand_id',$brand_id);
        $this->db->update('tbl_brand');
    }
    
    public function select_brand_by_id($brand_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->where('brand_id',$brand_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_brand_info()
    {
        $data=array();
        $data['brand_name']=$this->input->post('brand_name',true);
        $data['brand_publication_status']=$this->input->post('brand_publication_status',true);
        $brand_id=$this->input->post('brand_id',true);
        $this->db->where('brand_id',$brand_id);
        $this->db->update('tbl_brand',$data);
    }
    
    public function delete_brand_by_id($brand_id)
    {
        $this->db->where('brand_id',$brand_id);
        $this->db->delete('tbl_brand');
    }
    
    public function select_product_by_category_id($category_id)
    {
        $sql = "SELECT * FROM tbl_category AS c, tbl_product AS p WHERE c.category_id = p.category_id  AND c.category_id = '$category_id' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
	
    public function select_product_by_id($product_id)
    {
        $sql = "SELECT * FROM tbl_product AS p WHERE p.product_id = $product_id";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function search_product($text)
    {
        $sql = "SELECT * FROM tbl_product AS p WHERE p.product_name LIKE '%$text%' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
	
    public function select_product_by_sub_category_id($sub_category_id)
    {
        $sql = "SELECT * FROM tbl_sub_category AS s, tbl_product AS p WHERE s.sub_category_id = p.sub_category_id  AND s.sub_category_id = '$sub_category_id' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_category_by_name($category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('category_id',$category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_sub_category_by_id($sub_category_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sub_category');
        $this->db->where('sub_category_id',$sub_category_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function select_customer_info($customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }

	public function select_all_new_arrivals() 
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_publication_status',1);
        $this->db->order_by('product_id','desc');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }    
	
	public function select_all_top_sellers() 
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_display_in_homepage',1);
        $this->db->where('product_publication_status',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }

	public function select_all_slider_product() 
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_publication_status',1);
        $this->db->where('product_slider',1);
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }    
}