<?php 
class xls_model extends  CI_Model{
	function __construct(){
		parent::__construct();
		
	}

function get_all_volunteers(){
	
	//$query = $this->db->get('volunteers');
	
       $this->db->select('id,first_name,title,last_name,address1,address2,bday,mday,city,state,zip,country,category_id,comments,company_name,email,phone,account_number,bank_name,bank_location,website,cst,gst,tax_no,created_by,active_status,delete_status');
        $query = $this->db->get('customers');
            if($query->num_rows() > 0) {
            	return $query->result();
            	
            }
            return FALSE;
            
            
        }
    }