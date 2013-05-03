<?php

class Main extends CI_Controller
{
    function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->library('unit_test');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    function index(){
        
       //$this->employee();
       $this->load->view('login');
     
        } 
function employee()
{
    redirect('/employees');
}
function login(){
    $this->load->library('form_validation');
    if($this->input->post('login')){
        $this->form_validation->set_rules('username','Username', 'required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run()!=FALSE){
            $username=  $this->input->post('username');
            $password=$this->input->post('password');
            $this->load->model('logindetails');
            if($this->logindetails->login($username,$password)){
                echo "login suceess";
                
            }else{
                echo "login fails";
            }
            
            
        }  else {
             $this->load->view('login');
        }
    }
}

}
?>
