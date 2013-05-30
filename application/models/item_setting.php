<?php
class Item_setting extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    function get_item_cate_count_for_admin($bid){
            $this->db->where('delete_status',0);
            $this->db->where('branch_id ',$bid);         
            $this->db->from('item_category');
            return $this->db->count_all_results();
    }
    function get_item_cate_details_for_admin($limit,$start,$branch) {
            $this->db->limit($limit, $start);
            $this->db->where('delete_status',0);
            $this->db->where('branch_id ',$branch); 
            $query = $this->db->get('item_category');
            return $query->result();
    }
    function get_item_cate_count_for_user($bid){
            $this->db->where('delete_status',0);
            $this->db->where('active_status',0);
            $this->db->where('branch_id ',$bid);         
            $this->db->from('item_category');
            return $this->db->count_all_results();
    }
    function get_item_cate_details_for_user($limit,$start,$branch) {
            $this->db->limit($limit, $start);
            $this->db->where('delete_status',0);
            $this->db->where('active_status',0);
            $this->db->where('branch_id ',$branch); 
            $query = $this->db->get('item_category');
            return $query->result();
    }
    function get_item_setting(){
        $this->db->select()->from('items_settings');
        $sql=  $this->db->get();
        return $sql->result();
    }
}
?>
