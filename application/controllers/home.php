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
        $this->pos_home();
        
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
        $this->load->model('branch');
        
        $data['branch_settings']=$this->setting->get_branch_setting();
        $data['row']=  $this->branch->get_user_branchs($_SESSION['Uid']);
        $this->load->view('template/header');
        $this->load->view('template/branch',$data);
        $this->load->view('home');   
        $this->load->view('template/footer');
                
    }
    function set_branchs($branch){
        $_SESSION['user_branch']=$branch;
        echo "jii";
    }
    function change_branch(){
       $this->load->model('branch');
       $data=$this->branch->get_user_branch_id_list($_SESSION['Uid']);
       for($i=0;$i<count($data);$i++){
          if($this->input->post($data[$i])){
              echo $data[$i];
          }
       }
     
    }
      function home_fun(){
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
     function department(){
        redirect('departmentCI');
    }
    
}
?>