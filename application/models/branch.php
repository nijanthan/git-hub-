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
    function get_user_branch($id){
         $this->db->select()->from('userbranchs')->where('emp_id',$id);
        $sql=  $this->db->get();
        $j=0;
       foreach ($sql->result() as $row) {
                
             $data[$j] = $row->branch_name 	 ;
             $j++;
            }
            return $data;
            
    }
    function get_selected_branch($id){
         $this->db->select()->from('userbranchs')->where('emp_id',$id);
        $sql=  $this->db->get();
        return $sql->result();
       
            
    }
    function get_selected_branch_for_view(){
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
    function delete_user_branchs($id){
        $this->db->where('emp_id',$id);
        $this->db->delete('userbranchs');
    }
    function get_user_branchs($id){
       $this->db->select()->from('userbranchs')->where('emp_id',$id);
       $sql=  $this->db->get();
       return $sql->result();
   }
   function get_user_branch_id_list($id){
        $this->db->select()->from('userbranchs')->where('emp_id',$id);
         $sql=  $this->db->get();
        $j=0;
        foreach ($sql->result() as $row) {
                
             $data[$j] = $row->branch_id  ;
             $j++;
            }
            return $data;
   }
   function get_user_for_branch($id){
       $this->db->select()->from('userbranchs')->where('emp_id',$id);
       $sql=$this->db->get();
       return $sql->result();
       
   }
   function get_user_seleted_branch($data){
          $this->db->select()->from('branch')->where('id',$data);
                $sql=  $this->db->get();
              
                foreach ($sql->result() as $row) {            
             $data = $row->store_name   ;
            
            } 
            return $data;
   }
}
?>
