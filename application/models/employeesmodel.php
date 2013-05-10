<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employeesmodel extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function employeecount(){
        return $this->db->count_all("users");
    }
     public function get_employees_details($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('deleted',0);
        $query = $this->db->get("users");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
           }
          return false;
   }
   function edit_employee($id){
       $this->db->select()->from('users')->where('id',$id);
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
   function update_employee($age,$sex,$id,$first_name,$last_name,$emp_id,$address,$city,$state,$zip,$country,$email,$phone,$dob,$image_name){
       $data=array(
           'age'=>$age,
           'sex'=>$sex,
           'user_id' =>$emp_id,	
          	
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
           	
           
           
       );

       $this->db->where('id',$id);
       $this->db->update('users',$data);
   }
   function delete_employee($id,$deleted_by){       
       $data=array(           	
           'deleted_by'=>$deleted_by,
           'deleted'=>1    
       );
       $this->db->where('id',$id);
       $this->db->update('users',$data);
       
   }
   function adda_new_employee($dob,$created_by,$sex,$age,$first_name,$last_name,$emp_id,$password,$address,$city,$state,$zip,$country,$email,$phone,$image_name){
            echo $image_name;
       $pass=md5($password);
       $data=array(
           'created_by'=>$created_by,
           'sex' =>$sex,
           'age'=>$age,
           'user_id' =>$emp_id,	
           'password' =>$pass, 
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
           	
           
           
       );
       $this->db->insert('users',$data);
       $id=$this->db->insert_id();
       return $id;
       
       
       
       
       }
       function get(){
         return TRUE;
       }
       function user_checking($email,$emp_id,$dob){
           $this->db->select()->from('users')->where('email',$email)->where('user_id',$emp_id);
       $sql=$this->db->get();
           if($sql->num_rows()>0){
               return TRUE;
       }else{
           return FALSE;
       }
       }
}
?>
