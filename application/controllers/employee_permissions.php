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
    function edit_employee_permission($id){
        $this->load->model('employeepermission');
        $data['edrow']=  $this->employeepermission->edit_employee($id); 
        
       
        $data['irow']=  $this->employeepermission->item_permission_employee($id);
        $data['erow']=  $this->employeepermission->emp_permission_employee($id);
        
        $this->load->view('edit_employee_permission',$data);
    }
}
?>
