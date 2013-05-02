<?php
class Employeepermission extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function item_permission_employee($id){
        
        $this->db->select()->from('employeedetails');
        $sql=$this->db->get();
       
        return $sql->result();
        
    }
}
?>
