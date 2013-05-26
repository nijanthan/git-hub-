<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Item_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_items(){ // get all item details
        $this->db->select()->from('items');
        $sql=$this->db->get();
        return $sql->result();
    }
    function item_count_for_admin($branch){  
            $this->db->where('branch_id',$branch);
            $this->db->where('item_delete',0);
            $this->db->where('delete_status',0);
            $this->db->from('items_x_branchs');
            return $this->db->count_all_results();
   }
   function get_item_details_for_admin($limit, $start,$branch) {
            $this->db->limit($limit, $start);   
            $this->db->where('branch_id',$branch);
            $this->db->where('item_delete',0);
            $query = $this->db->get('items_x_branchs');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
           }
          return false;          
   }
   function pos_item_count($id,$branch){       
            $this->db->where('item_id <>',$id);
            $this->db->where('item_delete ',0);
            $this->db->where('item_active',0);  
            $this->db->where('active_status',0);
            $this->db->where('branch_id ',$branch);         
            $this->db->from('items_x_branchs');
            return $this->db->count_all_results();
        
    }
    function get_item_details($limit,$start,$id,$branch) {
            $this->db->limit($limit, $start);
            $this->db->where('item_id <>',$id);
            $this->db->where('item_delete ',0);
            $this->db->where('active_status',0);
            $this->db->where('item_active',0);        
            $this->db->where('branch_id ',$branch);
       $query = $this->db->get('items_x_branchs');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
           }
          return false;  
   }
   function get_selected_branch_for_view(){
         $this->db->select()->from('items_x_branchs')->where('delete_status',0)->where('active_status',0);
         $sql=  $this->db->get();
         return $sql->result();             
    }
    function delete_items_for_user($id,$bid,$uid){
        $data=array('item_active '=>1,
                    'deleted_by'=>$uid);
        $this->db->where('item_id',$id);
        $this->db->where('branch_id',$bid);
        $this->db->update('items_x_branchs',$data);
    }
    function delete_items_details_in_admin($id,$bid){
        $data=array('item_active '=>1,
                    'item_delete '=>1);
        $this->db->where('item_id',$id);
        $this->db->where('branch_id',$bid);
        $this->db->update('items_x_branchs',$data);
    }
    function deactivate_items($id,$bid){
        $data=array('item_active '=>1);
        $this->db->where('item_id',$id);
        $this->db->where('branch_id',$bid);
        $this->db->update('items_x_branchs',$data);
    }
    function to_activate_item($id,$bid){
        $data=array('item_active '=>0);
        $this->db->where('item_id',$id);
        $this->db->where('branch_id',$bid);
        $this->db->update('items_x_branchs',$data);
    }
    function add_category($name,$bid){
        $data=array('category_name'=>$name,
                    'branch_id'=>$bid);
                $this->db->insert('item_category',$data);
                return $this->db->insert_id();                
    }
    function add_item_category_branch($id,$bid){
        $this->db->select()->from('branchs')->where('id',$bid);
        $sql=  $this->db->get();
        foreach ($sql->result() as $row){
            $name=$row->store_name;
        }
        $data=array('branch_id'=>$bid,
                    'branch_name'=>$name,
                    'category_id'=>$id);
                $this->db->insert('item_category_x_branchs',$data);
    }
    function check_item_category($cat,$bid){
        $this->db->select()->from('item_category')->where('branch_id',$bid)->where('category_name',$cat);
        $sql=  $this->db->get();
        if($sql->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function get_item_category($id){
        $this->db->select()->from('item_category_x_branchs')->where('branch_id',$id)->where('category_active',0);
        $sql=  $this->db->get();
        return $sql->result();        
    }
    function get_category($id){
        $this->db->select()->from('item_category')->where('branch_id',$id);
        $sql=  $this->db->get();
        return $sql->result(); 
    }
    function get_suppier_in_branch($id){
        $this->db->select()->from('suppliers_x_branchs')->where('branch_id',$id)->where('supplier_active',0);
        $sql=  $this->db->get();
        return $sql->result();  
    }
    function get_supplier_details(){
        $this->db->select()->from('suppliers');
        $sql=  $this->db->get();
        return $sql->result(); 
    }
    function get_selected_item($id){
        $this->db->select()->from('items')->where('id',$id);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function update_item($id,$code,$barcode,$item_name,$description,$cost,$unit,$saling,$discount,$start,$end,$tax1,$tax2,$quantity,$location,$category,$suppier){
        $data=array('code'=>$code,	
            'barcode'=>$barcode,
            'category_id'=>$category,            
            'supplier_id'=>$suppier, 	
            'name'=>$item_name,
            'description'=>$description,
            'cost_price'=>$cost,
            'unit_price'=>$unit,
            'salling_price'=>$saling,
            'discount_amount'=>$discount,
            'start_date'=>$start,
            'end_date '=>$end,
            'tax1'=>$tax1,
            'tax2 '=>$tax2,
            'quantity'=>$quantity,
            'location'=>$location);
        $this->db->where('id',$id);
        $this->db->update('items',$data);
    }
    function add_item($id,$bid,$uid,$code,$barcode,$item_name,$description,$cost,$unit,$saling,$discount,$start,$end,$tax1,$tax2,$quantity,$location,$category,$suppier){
        $data=array('code'=>$code,	
            'barcode'=>$barcode,
            'category_id'=>$category,
            'added_by '=>$uid,
            'branch_id'=>$bid,
            'supplier_id'=>$suppier, 	
            'name'=>$item_name,
            'description'=>$description,
            'cost_price'=>$cost,
            'unit_price'=>$unit,
            'salling_price'=>$saling,
            'discount_amount'=>$discount,
            'start_date'=>$start,
            'end_date '=>$end,
            'tax1'=>$tax1,
            'tax2 '=>$tax2,
            'quantity'=>$quantity,
            'location'=>$location);
        $this->db->insert('items',$data);
    }
                                   
                                   
}
?>
