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
}
?>
