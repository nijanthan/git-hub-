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
    function pos_home(){             
        $this->load->model('setting');
        $this->load->model('branch');        
        $data['branch_settings']=$this->setting->get_branch_setting();
        if($_SESSION['admin']==2){
         $data['row']=  $this->branch->get_branch();
        
        }else{
        $data['row']=  $this->branch->get_user_branchs($_SESSION['Uid']);
        $data['a_row']=$this->branch->get_active_user_branchs($_SESSION['Uid']);
        }
        $this->load->view('template/header');
        if($_SESSION['Setting']['Branch']==1){
        $this->load->view('template/branch',$data);
          }
        $this->load->view('home');   
        $this->load->view('template/footer');                
    }
    function set_branchs($branch){
       // $_SESSION['user_branch']=$branch;        
    }    
      function home_main(){
       if($this->input->post('Employees')){           
           if($_SESSION['user_per']['read']==1){
               redirect('employees');
           }else{
               echo "U have No Permission to View Employees Details";
               $this->pos_home();
           }
       }
       if($this->input->post('department')){          
           if($_SESSION['Depa_per']['read']==1){
               redirect('departmentCI');
           }else{
               echo "U have No Permission to View Department Details";
               $this->pos_home();
           }
       }
       if($this->input->post('logout')){
           session_destroy();
           redirect('userlogin');
       }
       if($this->input->post('branch')){
           if($_SESSION['Branch_per']['read']==1){
               redirect('branchCI');
           }else{
               echo "U have No Permission to View Branch Details";
               $this->pos_home();
           }
       }       
    }
     function department(){
        redirect('departmentCI');
    }
    
}
?>