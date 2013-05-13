<?php
class Setting extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function get_branch_setting(){
        $this->db->select()->from('settings');
        $sql=$this->db->get();
    }
}
?>
