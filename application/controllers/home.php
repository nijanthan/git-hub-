<?php

class Home extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        session_start();
        $this->load->library('session');
    }
    function index(){
        if(!isset($_SESSION['Uid'])){
            redirect('userlogin');
        }
        
    }
    function acl_session_for_user(){
        $this->load->library('acluser');                 
        $this->acluser->user_item_permissions($_SESSION['Uid']);
        $this->acluser->user_employee_permissions($_SESSION['Uid']);
        echo $_SESSION['Item_per']['item'];
        echo $_SESSION['Emp_per']['emp'];
    }
    function pos_home(){
        $this->acl_session_for_user();
        $this->load->view('home');       
                
    }
}
?>