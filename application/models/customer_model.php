<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Customer_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_customers(){ // get all customer details
        $this->db->select()->from('customers');
        $sql=$this->db->get();
        return $sql->result();
    }
    function customer_count_for_admin($branch){  
            $this->db->where('branch_id',$branch);
            $this->db->where('customer_delete',0);
            $this->db->where('delete_status',0);
            $this->db->from('customers_x_branchs');
            return $this->db->count_all_results();
   }
   function get_customer_details_for_admin($limit, $start,$branch) {
            $this->db->limit($limit, $start);   
            $this->db->where('branch_id',$branch);
            $this->db->where('customer_delete',0);
            $query = $this->db->get('customers_x_branchs');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
           }
          return false;          
   }
   function pos_customer_count($id,$branch){       
            $this->db->where('customer_id <>',$id);
            $this->db->where('customer_delete ',0);
            $this->db->where('customer_active',0);  
            $this->db->where('active_status',0);
            $this->db->where('branch_id ',$branch);         
            $this->db->from('customers_x_branchs');
            return $this->db->count_all_results();
        
    }
    function get_customer_details($limit,$start,$id,$branch) {
            $this->db->limit($limit, $start);
            $this->db->where('customer_id <>',$id);
            $this->db->where('customer_delete ',0);
            $this->db->where('active_status',0);
            $this->db->where('customer_active',0);        
            $this->db->where('branch_id ',$branch);
       $query = $this->db->get('customers_x_branchs');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
           }
          return false;  
   }
   function get_selected_branch_for_view(){
         $this->db->select()->from('customers_x_branchs')->where('delete_status',0)->where('active_status',0);
         $sql=  $this->db->get();
         return $sql->result();             
    }
    function add_customer($first_name,$last_name,$email,$phone,$city,$state,$country,$zip,$comments,$website,$account_no,$address1,$address2,$company,$txable,$uid){
        $data=array('first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'email'=>$email,
                    'phone'=>$phone,
                    'city'=>$city,
                    'state'=>$state,
                    'country'=>$country,
                    'zip'=>$zip,
                    'comments'=>$comments,
                    'website'=>$website,
                    'company_name'=>$company,
                    'account_number'=>$account_no,
                    'address1'=>$address1,
                    'address2'=>$address2,
                    'taxable'=>$txable,
                    'created_by'=>$uid );
                $this->db->insert('customers',$data);
                return $this->db->insert_id();
    }
     function update_customer($id,$first_name,$last_name,$email,$phone,$city,$state,$country,$zip,$comments,$website,$account_no,$address1,$address2,$company,$txable){
        $data=array('first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'email'=>$email,
                    'phone'=>$phone,
                    'city'=>$city,
                    'state'=>$state,
                    'country'=>$country,
                    'zip'=>$zip,
                    'comments'=>$comments,
                    'website'=>$website,
                    'company_name'=>$company,
                    'account_number'=>$account_no,
                    'address1'=>$address1,
                    'address2'=>$address2,
                    'taxable'=>$txable
                     );
                     $this->db->where('id',$id);
                   $this->db->update('customers',$data);
               
    }
    
    function add_customer_branchs($id,$bid){
        $this->db->select()->from('branchs')->where('id',$bid);
        $sql=$this->db->get();
        foreach ($sql->result() as $row) {
                $dat= $row->store_name;
            }
        $data=array('branch_id '=>$bid,
                    'branch_name '=>$dat,
                    'customer_id '=>$id);
                $this->db->insert('customers_x_branchs',$data);
    }
    function check_customer_already_in($phone,$bid){
        $this->db->select()->from('customers')->where('phone',$phone);
        $query=  $this->db->get();
        if($query->num_rows()>0){
        foreach ($query->result() as $crow){
            $cid=$crow->id;
        }        
        $this->db->select()->from('customers_x_branchs')->where('customer_id',$cid)->where('branch_id',$bid);
        $sql=$this->db->get();
        if($sql->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }        
        }else{
            return FALSE;
        }
        
    }
    function check_customer_already_for_update($id,$phone,$bid){
        $this->db->select()->from('customers')->where('phone',$phone)->where('id <>',$id);
        $query=  $this->db->get();
        if($query->num_rows()>0){
        foreach ($query->result() as $crow){
            $cid=$crow->id;
        }        
        $this->db->select()->from('customers_x_branchs')->where('customer_id',$cid)->where('branch_id',$bid);
        $sql=$this->db->get();
        if($sql->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }        
        }else{
            return FALSE;
        }
    }
    function get_customer_details_for_edit($id){
        $this->db->select()->from('customers')->where('id',$id);
        $sql=$this->db->get();
        return $sql->result();
        
    }
    function delete_customer_for_user($id,$bid,$uid){
        $data=array('customer_active '=>1,
                    'deleted_by'=>$uid);
        $this->db->where('customer_id',$id);
        $this->db->where('branch_id',$bid);
        $this->db->update('customers_x_branchs',$data);
    }
    function delete_customers_details_in_admin($id,$bid){
        $data=array('customer_active '=>1,
                    'customer_delete '=>1);
        $this->db->where('customer_id',$id);
        $this->db->where('branch_id',$bid);
        $this->db->update('customers_x_branchs',$data);
    }
    function deactivate_customers($id,$bid){
        $data=array('customer_active '=>1);
        $this->db->where('customer_id',$id);
        $this->db->where('branch_id',$bid);
        $this->db->update('customers_x_branchs',$data);
    }
    function to_activate_customer($id,$bid){
        $data=array('customer_active '=>0);
        $this->db->where('customer_id',$id);
        $this->db->where('branch_id',$bid);
        $this->db->update('customers_x_branchs',$data);
    }
}
?>
