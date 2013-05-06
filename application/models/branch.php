<?php

class Branch extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_branch(){
        $this->db->select()->from('branch');
        $sql=  $this->db->get();
        return $sql->result();
                
    }
    function set_branch($id,$branch_id){
        $data=array('emp_id'=>$id,
                    'branch_id'=>$branch_id);
                $this->db->insert('userbranchs',$data);
    }
}
?>
