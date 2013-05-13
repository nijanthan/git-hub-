<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        session_start();
        $this->load->library('session');
        $this->load->library('poslanguage');                                       
        $this->poslanguage->set_language();
        
       
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
        //echo $_SESSION['Item_per']['item'];
        //echo $_SESSION['Emp_per']['emp'];
    }
    function pos_home(){
        
        $this->acl_session_for_user();
        $this->load->model('setting');
        $data['branch_settings']=$this->setting->get_branch_setting();
        $data['row']=
        $this->load->view('template/header');
        $this->load->view('home');   
        $this->load->view('template/footer');
                
    }
    
}
?>