<?php
class Administrator_Model extends CI_Model {
    public function admin_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_email_address',$data['admin_email_address']);
        $this->db->where('admin_password',$data['admin_password']);
        $this->db->where('admin_activation_status',1);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function check_password($data)
    {
        $sql="select * from tbl_admin where admin_email_address='$data'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
}