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
             $this->acl_session_for_user();
        }
    }
   function acl_session_for_user(){
        $this->load->library('acluser');                 
        $this->acluser->user_item_permissions($_SESSION['Uid']);
        $this->acluser->user_employee_permissions($_SESSION['Uid']);
        
    }
  
    function department(){
        redirect('departmentCI');
    }
    
    
}
?>
