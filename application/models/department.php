<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
    function get_user_depart($id){
        $this->db->select()->from('userdepart')->where('emp_id',$id);
        $sql=  $this->db->get();
       
            return $sql->result();
    }
    function get_all_user_depart($id){
        $this->db->select()->from('userdepart')->where('emp_id',$id);
        $sql=  $this->db->get();
        $j=0;
        foreach ($sql->result() as $row)
            {
                
             $data[$j] = $row->depart_name;
             $j++;
            }
            return $data;
    }
    function get_all_departmentg(){
        $this->db->select()->from('department');
        $sql=  $this->db->get();
        $j=0;
        foreach ($sql->result() as $row)
            {
                
             $data[$j] = $row->dep_name;
             $j++;
            }
            return $data;
    
}
function delete_user_depart($id){
    $this->db->where('emp_id',$id);
    $this->db->delete('userdepart');
}
function get_department_count(){
     return $this->db->count_all("department");
}
 public function get_department_details($limit, $start) {
      
        $query = $this->db->get("department");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
           }
          return false;
   }
   function  add_department($depart){
       $data=array('dep_name'=>$depart);
       $this->db->insert('department',$data);
        $id=$this->db->insert_id();
       return $id;
   }
   function set_branch_department($id,$branch_id){
       $data=array('branch_id'=>$branch_id,
                    'department_id'=>$id);
                $this->db->insert('depabranch',$data);
   }
    
}
?>
