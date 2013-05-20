<?php
class Aclpermissionmodel extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function check_user_branch($brnch,$id){
        $this->db->select()->from('userbranchs')->where('emp_id',$id)->where('branch_id ',$brnch);
        $sql=$this->db->get();
        if($sql->num_rows()>0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    function item_permission($id)
    {
        $this->db->select('permission')->from('itempermission')->where('emp_id', $id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {           
                 $value =$row->permission;           
        }
       
        return $value;
      
    }
    function empl_permission($id)
    {
        $this->db->select('permission')->from('employeepermission')->where('emp_id', $id);
        $query = $this->db->get();
        foreach ($query->result() as $row) {           
                 $value =$row->permission;           
        }
       
        return $value;
      
    }
    
}
?>
