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
            $this->set_user_default_branch();
            ///
        }
    }
    function set_user_default_branch(){
        $this->load->model('branch');
        $data=$this->branch->get_user_default_branch($_SESSION['Uid']);
         $this->acl_session_for_user($data);
         redirect('home');
    }
   function acl_session_for_user($b_id){
        $this->load->library('acluser');                 
        $this->acluser->user_item_permissions($b_id,$_SESSION['Uid']);
        $this->acluser->user_employee_permissions($b_id,$_SESSION['Uid']);
        $this->acluser->user_department_permissions($b_id,$_SESSION['Uid']);
        $this->acluser->user_branch_permissions($b_id,$_SESSION['Uid']);
        
    }
  
    function department(){
        redirect('departmentCI');
    }
    function change_user_branch($brnch){
        $this->load->model('aclpermissionmodel');
        if($this->aclpermissionmodel->check_user_branch($brnch,$_SESSION['Uid'])){
            $this->acl_session_for_user($brnch);
        }
        
        
    }
    
}
?>
