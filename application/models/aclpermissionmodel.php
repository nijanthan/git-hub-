<?php
class Aclpermissionmodel extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    function check_user_branch($brnch,$id){
        $this->db->select()->from('userbranchs')->where('emp_id',$id)->where('branch_id ',$brnch);
        $sql=$this->db->get();
        if($sql->num_rows()>0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    function get_user_department($id,$bid){
        $this->db->select()->from('userdepart')->where('emp_id',$id)->where('branch_id',$bid);
        $query = $this->db->get();
        $value=array();
        $i=0;
        foreach ($query->result() as $row) {           
                 $value[] =$row->depart_id ;  
                 $i++;
                
        }
        return $value;
    }
    function item_permission($did,$bid)
    {
        $this->db->select('permission')->from('item_per')->where('depart_id',$did)->where('branch_id', $bid);
        $query = $this->db->get();
        $value="";
        foreach ($query->result() as $row) {           
                 $value =$row->permission;           
        }
       
        return $value;
      
    }
    function empl_permission($did,$bid)
    {
        $this->db->select('permission')->from('user_per')->where('depart_id',$did)->where('branch_id', $bid);
        $query = $this->db->get();
        $value="";
        foreach ($query->result() as $row) {           
                 $value =$row->permission;           
        }       
        return $value;      
    }
     function department_permission($did,$bid)
    {
        $this->db->select('permission')->from('depart_per')->where('depart_id',$did)->where('branch_id', $bid);
        $query = $this->db->get();
        $value="";
        foreach ($query->result() as $row) {           
                 $value =$row->permission;           
        }       
        return $value;      
    }
    
    
}
?>
