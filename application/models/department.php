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
    function set_department($id,$depa_id,$branch_id){
        $this->db->select()->from('department')->where('id',$depa_id);
            $sql=$this->db->get();
            foreach ($sql->result() as $row) {
                $name= $row->dep_name ;
            }
        $data=array('emp_id'=>$id,
                    'depart_name'=>$name,
                    'depart_id'=>$depa_id,
                    'branch_id'=>$branch_id);
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
function get_department_count($branch){
   $this->db->where('branch_id',$branch);
   $this->db->from('depabranch');
   return $this->db->count_all_results();
}
 public function get_department_details($limit,$start,$brnch) {
        $this->db->limit($limit, $start);  
        $this->db->where('branch_id',$brnch);
        $query = $this->db->get("depabranch");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
           }
          return false;
   }
   function  add_department($depart,$bid){
       $data=array('dep_name'=>$depart,
                   'branch_id'=>$bid
           );
       $this->db->insert('department',$data);
        $id=$this->db->insert_id();
       return $id;
   }
   function set_branch_department($id,$branch_id){
       $data=array('branch_id'=>$branch_id,
                    'department_id'=>$id);
                $this->db->insert('depabranch',$data);
   }
   function delete_department($id){
       $this->db->where('id',$id);
       $this->db->delete('department');       
   }
   function delete_item_permission($id){
        $this->db->where('depart_id',$id);
        $this->db->delete('item_per');
   }
   function delete_user_permission($id){
        $this->db->where('depart_id',$id);        
        $this->db->delete('user_per');
   }
   function delete_branch_permission($id){
        $this->db->where('depart_id',$id);        
        $this->db->delete('branch_per');
   }
    function delete_depart_permission($id){
        $this->db->where('depart_id',$id);        
        $this->db->delete('depart_per');
   }
   function delete_depart_branch($id){
       $this->db->where('department_id',$id);
       $this->db->delete('depabranch');
   }
   function get_user_deprtment($id){
       $this->db->select()->from('depabranch')->where('branch_id',$id);
        $sql=  $this->db->get();
        $j=0;
        foreach ($sql->result() as $row) {
                $this->db->select()->from('department')->where('id',$row->department_id);
                $sql=  $this->db->get();
              
                foreach ($sql->result() as $row) {            
             $data[$j] = $row->dep_name  ;
            
            } $j++;
        }
            return $data;
       
   }
   function get_user_deprtment_id($id){
       $this->db->select()->from('depabranch')->where('branch_id',$id);
        $sql=  $this->db->get();
        $j=0;
        foreach ($sql->result() as $row) {
                $this->db->select()->from('department')->where('id',$row->department_id);
                $sql=  $this->db->get();
              
                foreach ($sql->result() as $row) {            
             $data[$j] = $row->id  ;
            
            } $j++;
        }
            return $data;
       
   }
   function get_user_seleted_depa($d_id){
       $this->db->select()->from('department')->where('id',$d_id);
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
             $data = $row->dep_name  ;            
            }
            return $data;
   }
   
    
}
?>
