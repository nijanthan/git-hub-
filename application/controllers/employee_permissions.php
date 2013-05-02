<?php
class Employee_permissions extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('unit_test');
        session_start();        
        $this->load->helper(array('form', 'url'));
    }
    function index(){
        
    }
    function item_permission($id){
        
        $this->load->model('employeepermission');
        $data['irow']=  $this->employeepermission->item_permission_employee($id);
        $this->load->view('edit_employee_permission',$data);
    }
}
?>
