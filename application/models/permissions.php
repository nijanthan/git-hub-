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
    
    function update_item_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item);
        $this->db->where('depart_id ',$depart_id)->where('branch_id',$branch_id); 
        $this->db->update('item_per',$data);
        
    }
    function update_user_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item);
        $this->db->where('depart_id ',$depart_id)->where('branch_id',$branch_id); 
        $this->db->update('user_per',$data);
        
    }
    function update_depart_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item);
        $this->db->where('depart_id ',$depart_id)->where('branch_id',$branch_id); 
        $this->db->update('depart_per',$data);
        
    }
     function update_branch_permission($item,$depart_id,$branch_id){
        $data=array('permission'=>$item);
        $this->db->where('depart_id ',$depart_id)->where('branch_id',$branch_id); 
        $this->db->update('branch_per',$data);
        
    }
    function get_user_permission($id,$bid){
         $this->db->select()->from('user_per')->where('depart_id ',$id)->where('branch_id',$bid); 	 
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
                $data = $row->permission    ;            
            } 
            return $data; 
    }
    function get_item_permission($id,$bid){
         $this->db->select()->from('item_per')->where('depart_id ',$id)->where('branch_id',$bid); 	 
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
                $data = $row->permission    ;            
            } 
                return $data; 
    }
    function get_depart_permission($id,$bid){
         $this->db->select()->from('depart_per')->where('depart_id ',$id)->where('branch_id',$bid); 	 
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
                $data = $row->permission    ;            
            } 
                return $data; 
    }
    function get_branch_permission($id,$bid){
         $this->db->select()->from('branch_per')->where('depart_id ',$id)->where('branch_id',$bid); 	 
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
                $data = $row->permission    ;            
            } 
                return $data; 
    }
}
?>
