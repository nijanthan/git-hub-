<?php

class Home extends CI_Controller
{
    function __construct() {
        parent::__construct();
        session_start();
    }
    function index(){
        if(!isset($_SESSION['Uid'])){
            redirect('userlogin');
        }
        
    }
    function pos_home(){
        $this->load->library('acluser');
        //$this->load->view('home');
        $this->acluser->user_item_permissions($_SESSION['Uid']);
                
    }
}
?>