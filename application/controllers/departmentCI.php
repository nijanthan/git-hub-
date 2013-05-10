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
       // $data['depa']=$this->department->get_department();
        
               
                $this->load->library("pagination"); 
               
	        $config["base_url"] = base_url()."index.php/departmentCI/get_department";
	        $config["total_rows"] = $this->department->get_department_count();
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
               
                $data['count']=$this->department->get_department_count();         
	        $data["depa"] = $this->department->get_department_details($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links(); 
                
                $this->load->view('template/header');
                $this->load->view('department',$data);
                $this->load->view('template/footer');
    }
    function department(){
        if($this->input->post('back')){
            redirect('posmain');
        }
        if($this->input->post('add')){
                $this->load->view('template/header');
                $this->load->view('add_department');
                $this->load->view('template/footer');
        }
    }
}
?>