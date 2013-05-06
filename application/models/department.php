<?php

class Department extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_department(){
        $this->db->select()->from('department');
        $sql=$this->db->get();
        return $sql->result(); 
    }
    function set_department($id,$branch_id){
        $data=array('emp_id'=>$id,
                    'depart_id'=>$branch_id);
                $this->db->insert('userdepart',$data);
    }
}
?>
