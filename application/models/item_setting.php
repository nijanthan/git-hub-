<?php
class Item_setting extends CI_Model{
    function __construct() {
        parent::__construct();
    }
   
    function get_item_setting(){
        $this->db->select()->from('items_settings');
        $sql=  $this->db->get();
        return $sql->result();
    }
    function get_setting($id){
        $this->db->select()->from('items_settings')->where('item_id',$id);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function update($id,$min,$max,$tax,$allow_negative,$purchase_return,$purchase,$salses_return,$sale,$bid){
        $data=array('min_q'=>$min,
                    'max_q'=>$max,
                    'sales'=>$sale,
            'purchase'=>$purchase, 	
            'salses_return'=>$salses_return, 	
            'purchase_return'=>$purchase_return,
            'allow_negative'=>$allow_negative, 	
            'tax_inclusive'=>$tax, 	
            'updated_by'=>$bid);
        $this->db->where('id',$id);
        $this->db->update('items_settings',$data);
    }
}
?>
