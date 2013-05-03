<?php
class Aclpermissionmodel extends CI_Model
{
    function __construct() {
        parent::__construct();
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
