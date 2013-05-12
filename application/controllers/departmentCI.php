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
        $this->load->library('form_validation');
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
                $this->load->model('branch');
                $data['branch']=  $this->branch->get_branch();
                $this->load->view('template/header');
                $_SESSION['add_depa']='null';
                $this->load->view('add_department',$data);
                $this->load->view('template/footer');
        }
    }
    function select_department($depa){
         $_SESSION['add_depa']=$depa;
    }
    function add_department(){
       $this->load->model('department');
       $_SESSION['add_depa'];
           
           $this->form_validation->set_rules("department_name",$this->lang->line('department_name'),"required"); 
           if ( $this->form_validation->run() !== false and $_SESSION['add_depa']!='null') {
               $depart=$this->input->post('department_name');
               $id=$this->department->add_department($depart);
               $this->add_department_branch($id);
           }
       
           
    
    }
     function add_department_branch($id){
            
            $str=$_SESSION['add_depa'];
            $depart = preg_split('/[\,\.\ ]/', $str);
            $this->load->model('department');
            $branch_id=array();
            $i=0;
            foreach ($depart as $bra){

                $temp_depart =  preg_split("/,/", $bra);
                if($temp_depart){
                    foreach ($temp_depart as $temp){
                      
                        $branch_id[$i]=$temp;
                        $i++;
                    } 
                } else {
                    $branch_id[$i]=$temp;
                        $i++;  
                }
            }  
            for($ii=1; $ii<count($branch_id); $ii++){
               $this->department->set_branch_department($id,$branch_id[$ii]);
            }

        }
}
?>