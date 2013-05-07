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
        
            $this->db->select()->from('branch')->where('id',$branch_id);
            $sql=$this->db->get();
            foreach ($sql->result() as $row) {
                $name= $row->store_name ;
            }
            $data=array('emp_id'=>$id,
                    'branch_name'=>$name,
                    'branch_id'=>$branch_id);
                       
                $this->db->insert('userbranchs',$data);
    }
    function get_user_branch(){
         $this->db->select()->from('userbranchs');
        $sql=  $this->db->get();
        $j=0;
       foreach ($sql->result() as $row) {
                
             $data[$j] = $row->branch_name 	 ;
             $j++;
            }
            return $data;
            
    }
    function get_selected_branch(){
         $this->db->select()->from('userbranchs');
        $sql=  $this->db->get();
        return $sql->result();
       
            
    }
    function get_all_branch(){
        $this->db->select()->from('branch');
        $sql=  $this->db->get();
        $j=0;
        foreach ($sql->result() as $row) {
                
             $data[$j] = $row->store_name ;
             $j++;
            }
            return $data;
    }
}
?>
