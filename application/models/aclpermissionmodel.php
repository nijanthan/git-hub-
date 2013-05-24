<?php
class Aclpermissionmodel extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function check_user_branch($brnch,$id){
        $this->db->select()->from('users_X_branchs')->where('emp_id',$id)->where('branch_id ',$brnch);
        $sql=$this->db->get();
        if($sql->num_rows()>0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    function get_user_groups($id,$bid){
        $this->db->select()->from('users_X_user_groups')->where('emp_id',$id)->where('branch_id',$bid)->where('active_status',0);
        $query = $this->db->get();
        $value=array();
        $i=0;
        foreach ($query->result() as $row) {           
                 $value[] =$row->depart_id ;  
                 $i++;
                
        }
        return $value;
    }
    function item_permission($did,$bid)
    {
        $this->db->select('permission')->from('item_X_page_permissions')->where('depart_id',$did)->where('branch_id', $bid);
        $query = $this->db->get();
        $value=0000;
        if($query->num_rows()>0){
        foreach ($query->result() as $row) {           
                 $value =$row->permission;           
        }       
        return $value;        
        }else{
            return $value;
        }
      
    }
    function empl_permission($did,$bid)
    {
        $this->db->select('permission')->from('user_X_page_X_permissions')->where('depart_id',$did)->where('branch_id', $bid);
        $query = $this->db->get();
        $value=0000;
        if($query->num_rows()>0){
        foreach ($query->result() as $row) {           
                 $value =$row->permission;           
        }       
        return $value;  
        }else{
            return $value;
        }
    }
     function user_groups_permission($did,$bid)
    {
        $this->db->select('permission')->from('user_groups_X_page_X_permissions')->where('depart_id',$did)->where('branch_id', $bid);
        $query = $this->db->get();
        $value=0000;
        if($query->num_rows()>0){
        foreach ($query->result() as $row) {           
                 $value =$row->permission;           
        }       
        return $value;  
        }else{
            return $value;
        }
    }
    
    function branch_permission($did,$bid)
    {
        $this->db->select('permission')->from('branch_X_page_X_permissions')->where('depart_id',$did)->where('branch_id', $bid);
        $query = $this->db->get();
         $value=0000;
        if($query->num_rows()>0){
        foreach ($query->result() as $row) {           
                 $value =$row->permission;           
        }       
        return $value;  
        }else{
            return $value;
        }
    }
    function user_supplier_permission($did,$bid)
    {
        $this->db->select('permission')->from('suppliers_x_page_permissions')->where('depart_id',$did)->where('branch_id', $bid);
        $query = $this->db->get();
         $value=0000;
        if($query->num_rows()>0){
        foreach ($query->result() as $row) {           
                 $value =$row->permission;           
        }       
        return $value;  
        }else{
            return $value;
        }
    }
}
?>
