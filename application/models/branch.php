<?php

class Branch extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_branch(){
            $this->db->select()->from('branchs');
            $sql=  $this->db->get();
            return $sql->result();                
    }
    function set_branch($id,$branch_id){
        echo $branch_id;
            $this->db->select()->from('branchs')->where('id',$branch_id);
            $sql=$this->db->get();
            foreach ($sql->result() as $row) {
                $name= $row->store_name ;
            }
            $data=array('emp_id'=>$id,
                    'branch_name'=>$name,
                    'branch_id'=>$branch_id);                       
                    $this->db->insert('users_X_branchs',$data);
    }
    function get_user_branch($id){
            $this->db->select()->from('users_X_branchs')->where('emp_id',$id);
            $sql=  $this->db->get();
            $j=0;
       foreach ($sql->result() as $row) {                
            $data[$j] = $row->branch_name 	 ;
            $j++;
            }
            return $data;
            
    }
    function get_selected_branch($id){
         $this->db->select()->from('users_X_branchs')->where('emp_id',$id);
         $sql=  $this->db->get();
         return $sql->result();               
    }
    function get_selected_branch_for_view(){
         $this->db->select()->from('users_X_branchs')->where('delete_status',0);;
         $sql=  $this->db->get();
         return $sql->result();             
    }
    function get_selected_branch_for_user_view(){
         $this->db->select()->from('users_X_branchs')->where('active_status',0)->where('delete_status',0);
         $sql=  $this->db->get();
         return $sql->result(); 
    }
    function get_all_branch(){
        $this->db->select()->from('branchs');
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
        $this->db->delete('users_X_branchs');
    }
    function get_user_branchs($id){
       $this->db->select()->from('users_X_branchs')->where('emp_id',$id);
       $sql=  $this->db->get();
       return $sql->result();
       
   }
   function get_user_branch_id_list($id){
        $this->db->select()->from('users_X_branchs')->where('emp_id',$id);
        $sql=  $this->db->get();
        $j=0;
        foreach ($sql->result() as $row) {                
             $data[$j] = $row->branch_id  ;
             $j++;
             }
             return $data;
   }
   function get_user_for_branch($id){
       $this->db->select()->from('users_X_branchs')->where('emp_id',$id);
       $sql=$this->db->get();
       return $sql->result();
       
   }
   function get_user_seleted_branch($data){
          $this->db->select()->from('branchs')->where('id',$data);
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
                $data = $row->store_name   ;            
            } 
            return $data;
   }
   function get_user_default_branch($id){
       $this->db->select()->from('users')->where('id',$id);
                 $sql=  $this->db->get();              
                 foreach ($sql->result() as $row) {            
             $data = $row->default_branch   ;            
                } 
            return $data; 	
   }
   function get_users_default_branch($id){
       $this->db->select()->from('users_X_branchs')->where('id',$id);
                $sql=  $this->db->get();              
                foreach ($sql->result() as $row) {            
                $data = $row->branch_name    ;            
            } 
            return $data; 
   }
   function check_deaprtment_is_already($depart,$branch){
       $this->db->select()->from('users_X_user_groups')->where('branch_id',$branch)->where('depart_name',$depart);
       $sql=  $this->db->get();
       if($sql->num_rows()>0){
           return TRUE;
       }else{
           return FALSE;
       }
   }
   function check_deaprtment_is_already_for_update($depart,$branch,$id){
      $this->db->select()->from('users_X_user_groups')->where('branch_id',$branch)->where('depart_name',$depart)->where('depart_id <>',$id);
       $sql= $this->db->get();       
       if($sql->num_rows()>0){
           return TRUE;
       }else{
           return FALSE;
       } 
   }
   function branchcount(){
       $this->db->where('active_status',0);      
       $this->db->from('branchs');
       return $this->db->count_all_results();      
   }
   function get_branch_details($limit, $start) {
        $this->db->limit($limit, $start);   
        $this->db->where('active_status',0);
        $query = $this->db->get("branch");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
           }
          return false;
   }
   function get_branch_details_for_edit($id){
        $this->db->select()->from('branchs')->where('id',$id);
        $sql=$this->db->get();
        return $sql->result();
   }
   function update_branch_details($id,$name,$city,$state,$zip,$country,$phone,$fax,$email,$tax1,$tax2,$website){
        $data=array('store_name'=>$name,
                    'store_city '=>$city	,
                    'store_state'=>$state,	
                    'store_zip'=>$zip,
                    'store_country'=>$country,
                    'store_website'=>$website,
                    'store_phone'=>$phone,
                    'store_email'=>$email,
                    'store_fax'=>$fax,
                    'store_tax1'=>$tax1,
                    'store_tax2'=>$tax2 );
        $this->db->where('id',$id);
        $this->db->update('branchs',$data);
   }
   function delete_branch($id){
       $data=array('delete_status '=>1);

       $this->db->where('id',$id);
       $this->db->update('branchs',$data);
   }
   function check_branch_is_in_acive($id){
        $this->db->select()->from('branchs')->where('id',$id)->where('active_status ',0);
        $sql=$this->db->get();
        if($sql->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
   }
   function is_in_active_branchs($Uid){                
        $this->db->select()->from('users_X_branchs')->where('emp_id',$Uid)->where('active_status',0);
        $sql_b=  $this->db->get();
        $data="";
        foreach ($sql_b->result() as $brow){
            $data=$brow->branch_id  ;
        }       
        return $data;
    }
    function get_active_user_branchs($id){
       $this->db->select()->from('users_X_branchs')->where('emp_id',$id);
       $sql_b=  $this->db->get();
        $data=array();
        $value=array();
       $j=0;
        foreach ($sql_b->result() as $brow){
             $data[]=$brow->branch_id  ;
        }
        for($i=0;$i<count($data);$i++){
           $this->db->select()->from('branchs')->where('id',$data[$i])->where('active_status',0);
           $sql=  $this->db->get();
          foreach ($sql->result() as $row){
                $value[$j]=$row->id;     
               $j++;
           }
        }
        return $value;
    }
}
?>
