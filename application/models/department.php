<?php

class Department extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_department(){
        $this->db->select()->from('department');
        $sql=$this->db->get();
        return $sql->result(); 
    }
}
?>
