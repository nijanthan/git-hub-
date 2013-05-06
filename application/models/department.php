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
        $this->db->select()->from('department')->where('id',$branch_id);
            $sql=$this->db->get();
            foreach ($sql->result() as $row) {
                $name= $row->dep_name ;
            }
        $data=array('emp_id'=>$id,
                    'depart_name'=>$name,
                    'depart_id'=>$branch_id);
                $this->db->insert('userdepart',$data);
    }
    function get_user_depart(){
        $this->db->select()->from('userdepart');
        $sql=  $this->db->get();
        return $sql->result();
    }
}
?>
