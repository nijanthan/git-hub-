<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posmain extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('unit_test');
        session_start();        
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('poslanguage');                 
        $this->poslanguage->set_language();
        
    }
    function index()
    { if(!isset($_SESSION['Uid'])){
            $this->load->view('template/header');
            $this->load->view('login');
            $this->load->view('template/footer');
        }else{
            $this->load->view('template/header');
            $this->load->view('home');
            $this->load->view('template/footer');
        }
    }
   
    function home(){
       if($this->input->post('Employees')){
           echo $_SESSION['Emp_per']['read'];
           if($_SESSION['Emp_per']['read']==1){
               redirect('employees');
           }else{
               echo "U have No Permission to View Employees Details";
               $this->load->view('template/header');
               $this->load->view('home');
               $this->load->view('template/footer');
           }
       }
       if($this->input->post('logout')){
           session_destroy();
           redirect('userlogin');
       }
       if($this->input->post('department')){
           redirect('departmentCI');
       }
       
    }
    
    
    
}
?>
