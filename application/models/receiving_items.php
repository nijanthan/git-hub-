<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Receiving_items extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_items($bid){
        $this->db->select()->from('items_x_branchs')->where('active_status',0)->where('branch_id',$bid);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_item_details($bid){
        $this->db->select()->from('items')->where('branch_id',$bid);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_selected_item_details($data){
        
        $this->db->select()->from('items')->like('code',$data);
        $sql=  $this->db->get();
        $details=array();
        $cost=array();
        $stock=array();
        $id=array();
        foreach ($sql->result() as $row){
            $details[]=$row->name;
            $cost[]=$row->cost_price ;
            $stock[]=$row->current_stock;
            $id[]=$row->id;
        }
        $sasi[0]=$details;
        $sasi[1]=$cost;
        $sasi[2]=$stock;
        $sasi[3]=$id;
        return $sasi;
        
    }
}
