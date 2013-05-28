<?php 
class Taxes extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_taxes_for_admin($bid){
        $this->db->select()->from('taxes')->where('branch_id',$bid)->where('delete_status',0);
        $sql=$this->db->get();
        return $sql->result();
    }
    function get_count_for_admin($bid){            
            $this->db->where('delete_status',0);        
            $this->db->where('branch_id',$bid);         
            $this->db->from('taxes');
            return $this->db->count_all_results();
    }
    function get_count_for_user($bid){            
            $this->db->where('delete_status',0); 
            $this->db->where('active_status',0);
            $this->db->where('branch_id',$bid);         
            $this->db->from('taxes');
            return $this->db->count_all_results();
    }
    function get_tax_details_for_user($limit, $start,$bid){
                $this->db->limit($limit, $start);            
                $this->db->where('delete_status',0); 
                $this->db->where('active_status',0);
                $this->db->where('branch_id',$bid); 
                $query = $this->db->get('taxes');
                return $query->result();
    }
    function get_tax_details($id){
        $this->db->select()->from('taxes')->where('id',$id);
        $sql=  $this->db->get();
        return $sql->result();
    }
    function activate_tax($id){
        $data=array('status'=>0);
        $this->db->where('id',$id);
        $this->db->update('taxes',$data);
    }
    function inactivate_tax($id){
        $data=array('status'=>1);
        $this->db->where('id',$id);
        $this->db->update('taxes',$data);
    }
    function delete_tax($id){
        $data=array('active_status'=>1);
        $this->db->where('id',$id);
        $this->db->update('taxes',$data);
    }
}
?>