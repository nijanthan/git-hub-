<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userlogin extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('unit_test');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('form');
        $this->load->library('form_validation');
        session_start();
        $this->chnagelanguage();
        
      
    }
    function index(){
        
       //$this->employee();
        if(!isset($_SESSION['Uid'])){
            $this->load->view('template/header');
            $this->load->view('login');
            $this->load->view('template/footer');
        }else{
            $this->load->view('template/header');
            $this->load->view('home');
            $this->load->view('template/footer');
        }
       
     
        } 
function employee()
{
    redirect('/employees');
}
function login(){
    $this->load->library('form_validation');
    if($this->input->post('login')){
        $this->form_validation->set_rules('username',$this->lang->line('user_name'), 'required');
        $this->form_validation->set_rules('password',$this->lang->line('password'),'required');
        if($this->form_validation->run()!=FALSE){
            $username=  $this->input->post('username');
            $password=$this->input->post('password');
            $this->load->model('logindetails');
            if($this->logindetails->login($username,$password)){
               
                $_SESSION['Uid']= $this->logindetails->loginid($username,$password);
                redirect('home/pos_home');
                $this->load->view('template/footer');
            }else{
                echo "Invalid Username and password";
                $this->load->view('template/header');
                $this->load->view('login');
                $this->load->view('template/footer');
            }
            
            
        }  else {
             $this->load->view('template/header');
             $this->load->view('login');
             $this->load->view('template/footer');
        }
    }
     
}
 function chnagelanguage(){
         
         
         
        $this->config->set_item('language','malayalam'); 
        $this->lang->load('malayalam');
        
    }

}
?>
