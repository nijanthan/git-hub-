<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Permissions extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function set_item_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item,
                    'depart_id'=>$depart_id,
                    'branch_id'=>$branch_id);
        $this->db->insert('item_X_page_permissions',$data);
        
    }
    function set_user_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item,
                    'depart_id'=>$depart_id,
                    'branch_id'=>$branch_id);
        $this->db->insert('user_X_page_X_permissions',$data);
        
    }
    function set_depart_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item,
                    'depart_id'=>$depart_id,
                    'branch_id'=>$branch_id);
        $this->db->insert('user_groups_x_page_x_permissions',$data);
        
    }
     function set_branch_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item,
                    'depart_id'=>$depart_id,
                    'branch_id'=>$branch_id);
        $this->db->insert('branch_x_page_x_permissions',$data);
        
    }
    
    function update_item_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item);
        $this->db->where('depart_id ',$depart_id)->where('branch_id',$branch_id); 
        $this->db->update('item_X_page_permissions',$data);
        
    }
    function update_user_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item);
        $this->db->where('depart_id ',$depart_id)->where('branch_id',$branch_id); 
        $this->db->update('user_X_page_X_permissions',$data);
        
    }
    function update_depart_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item);
        $this->db->where('depart_id ',$depart_id)->where('branch_id',$branch_id); 
        $this->db->update('user_groups_x_page_x_permissions',$data);
        
    }
     function update_branch_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item);
        $this->db->where('depart_id ',$depart_id)->where('branch_id',$branch_id); 
        $this->db->update('branch_x_page_x_permissions',$data);
        
    }
    function get_user_permission($id,$bid){
         $this->db->select()->from('user_X_page_X_permissions')->where('depart_id ',$id)->where('branch_id',$bid); 	 
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
                $data = $row->permission    ;            
            } 
            return $data; 
    }
    function get_item_permission($id,$bid){
         $this->db->select()->from('item_X_page_permissions')->where('depart_id ',$id)->where('branch_id',$bid); 	 
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
                $data = $row->permission    ;            
            } 
                return $data; 
    }
    function get_depart_permission($id,$bid){
         $this->db->select()->from('user_groups_x_page_x_permissions')->where('depart_id ',$id)->where('branch_id',$bid); 	 
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
                $data = $row->permission    ;            
            } 
                return $data; 
    }
    function get_branch_permission($id,$bid){
         $this->db->select()->from('branch_x_page_x_permissions')->where('depart_id ',$id)->where('branch_id',$bid); 	 
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
                $data = $row->permission    ;            
            } 
                return $data; 
    }
}
?>
