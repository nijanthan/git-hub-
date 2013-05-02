<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employeesmodel extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function employeecount(){
        return $this->db->count_all("employeedetails");
    }
     public function get_employees_details($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("employeedetails");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
           }
          return false;
   }
   function edit_employee($id){
       $this->db->select()->from('employeedetails')->where('id',$id);
        $sql=$this->db->get();
       
        return $sql->result();
   }
   function get_file_name($upload_data){
       echo $upload_data['0'];
       foreach ($upload_data as $item => $value){
    
     if($item=='file_name'){
        echo $value;
        
        
    }
    
    }
   }
   function update_employee($id,$first_name,$last_name,$emp_id,$password,$address,$city,$state,$zip,$country,$email,$phone,$branch,$dob, $image_name){
       $data=array(
           	
           'emp_id' =>$emp_id,	
           'password' =>$password,	
           'first_name' =>$first_name,           
           'last_name '	=>$last_name,
           'address '=>$address,	
           'city '=>$city,
           'state'=>$state,	
           'zip'=>$zip,	
           'country'=>$country,	
           'email'=>$email,	
           'phone'=>$phone, 	
           'image'=>$image_name,	
           'dob'=>$dob,          	
           'group'=>$branch 	
           
           
       );

       $this->db->where('id',$id);
       $this->db->update('employeedetails',$data);
   }
   function delete_employee($id){
       
       $this->db->where('id',$id);
       $this->db->delete('employeedetails');
   }
   function adda_new_employee($first_name,$last_name,$emp_id,$password,$address,$city,$state,$zip,$country,$email,$phone,$branch,$dob, $image_name){
       $data=array(
           	
           'emp_id' =>$emp_id,	
           'password' =>$password,	
           'first_name' =>$first_name,           
           'last_name '	=>$last_name,
           'address '=>$address,	
           'city '=>$city,
           'state'=>$state,	
           'zip'=>$zip,	
           'country'=>$country,	
           'email'=>$email,	
           'phone'=>$phone, 	
           'image'=>$image_name,	
           'dob'=>$dob,          	
           'group'=>$branch 	
           
           
       );
       $this->db->insert('employeedetails',$data);
       
       }
       function get(){
         return TRUE;
       }
}
?>
