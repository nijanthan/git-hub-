<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Permissions extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function set_item_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item,
                    'depart_id'=>$depart_id,
                    'branch_id'=>$branch_id);
        $this->db->insert('item_per',$data);
        
    }
    function set_user_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item,
                    'depart_id'=>$depart_id,
                    'branch_id'=>$branch_id);
        $this->db->insert('user_per',$data);
        
    }
    function set_depart_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item,
                    'depart_id'=>$depart_id,
                    'branch_id'=>$branch_id);
        $this->db->insert('depart_per',$data);
        
    }
     function set_branch_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item,
                    'depart_id'=>$depart_id,
                    'branch_id'=>$branch_id);
        $this->db->insert('branch_per',$data);
        
    }
}
?>
