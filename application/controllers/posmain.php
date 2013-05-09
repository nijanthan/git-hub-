<?php

class Posmain extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('unit_test');
        session_start();        
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->changelanguage();
    }
    function index()
    {
        $this->load->view('home'); 
    }
   
    function home(){
       if($this->input->post('Employees')){
           echo $_SESSION['Emp_per']['read'];
           if($_SESSION['Emp_per']['read']==1){
               redirect('employees');
           }else{
               echo "U have No Permission to View Employees Details";
               $this->load->view('home'); 
           }
       }
       if($this->input->post('logout')){
           session_destroy();
           redirect('userlogin');
       }
       
    }
    function changelanguage(){
        if(!isset($_SESSION['lang'])){
        $this->config->set_item('language','english'); 
        $this->lang->load('english');
        }else{            
        $lang= $_SESSION['lang'];
        $this->config->set_item('language',"$lang"); 
        $this->lang->load("$lang");
        }
    }
    
    
}
?>
