<?php
class Employeepermission extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function item_permission_employee($id){
        
        $this->db->select()->from('itempermission')->where('id',$id);
        $sql=$this->db->get();
        return $sql->result();
        
     }
      function emp_permission_employee($id){
        
        $this->db->select()->from('employeepermission')->where('id',$id);
        $sql=$this->db->get();
       
        return $sql->result();
     }
      function edit_employee($id){
       $this->db->select()->from('employeedetails')->where('id',$id);
        $sql=$this->db->get();
       
        return $sql->result();
   }
    
    
}
?>
