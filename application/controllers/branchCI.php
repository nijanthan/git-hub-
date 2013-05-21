<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BranchCI extends CI_Controller{
    function __construct() {
                parent::__construct();
                $this->load->helper('form');
                $this->load->helper('url');
                $this->load->library('unit_test');
                session_start();        
                $this->load->helper(array('form', 'url'));
                $this->load->library('poslanguage');                 
                $this->poslanguage->set_language();
    }
    function index(){
        if($_SESSION['Setting']['Branch']==1){
         if(!isset($_SESSION['Uid'])){
                $this->load->view('template/header');
                $this->load->view('login');
                $this->load->view('template/footer');
            }else{
                $this->get_branch();
        }
        }else{
            redirect('home');
        }
    }
    function get_branch(){
         if($_SESSION['Branch_per']['read']==1){
                $this->load->library("pagination"); 
                $this->load->model('branch');
	        $config["base_url"] = base_url()."index.php/branch/get_branch";
	        $config["total_rows"] = $this->branch->branchcount();
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;                
                $data['count']=$this->branch->branchcount();             
	        $data["row"] = $this->branch->get_branch_details($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links(); 
                $this->load->view('template/header');
                $this->load->view('branch',$data);
                $this->load->view('template/footer');
         }
         else{
             echo "You have no permission To read Branch details";
             redirect('home');
         }
    }
    function edit_branch_details($id){
       if($_SESSION['Branch_per']['edit']==1){
           $this->load->model('branch');
           $data['row']=  $this->branch->get_branch_details_for_edit($id);
           $this->load->view('template/header');
           $this->load->view('edit_branch',$data);
           $this->load->view('template/footer');
           
       }else{
           echo "you have no permission To edit Branch";
           redirect('branchCI');
       }
       
    }
    function branch_details(){
        if($this->input->post('BacktoHome')){
            redirect('home');
        }
    }
}
?>
