<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DepartmentCI extends CI_Controller{
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
    function index(){
         if(!isset($_SESSION['Uid'])){
            $this->load->view('template/header');
            $this->load->view('login');
            $this->load->view('template/footer');
        }else{
            $this->get_department();
        }
    }
    function get_department(){
        $this->load->model('department');
        $data['depa']=$this->department->get_department();
        
               $this->load->view('template/header');
               $this->load->view('department',$data);
               $this->load->view('template/footer');
    }
}
?>