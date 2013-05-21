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
         if($_SESSION['Depa_per']['read']==1){ 
                $this->load->model('department');            
                $this->load->library("pagination");                
	        $config["base_url"] = base_url()."index.php/departmentCI/get_department";
	        $config["total_rows"] = $this->department->get_department_count($_SESSION['Bid']);
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;               
                $data['count']=$this->department->get_department_count($_SESSION['Bid']);         
	        $data["depa"] = $this->department->get_department_details($config["per_page"], $page,$_SESSION['Bid']);
                $data['all_depa']=$this->department->get_department();
	        $data["links"] = $this->pagination->create_links();                 
                $this->load->view('template/header');
                $this->load->view('department',$data);
                $this->load->view('template/footer');
    }
    else{
                echo "Ypu Have No permission to Read Department Details";
                redirect('home');
    }}
    function department(){
        if($this->input->post('back')){
                redirect('home');
        }
        if($this->input->post('add')){
             if($_SESSION['Depa_per']['add']==1){ 
                $this->load->model('branch');
               // $data['branch']=  $this->branch->get_users_default_branch($_SESSION['Bid']);
                $this->load->view('template/header');               
                $this->load->view('add_department');
                $this->load->view('template/footer');
        }
        else{
            echo "you have no permission to add department";
                $this->get_department();
        }}
        if($this->input->post('delete')){
            if($_SESSION['Depa_per']['delete']==1){ 
                $this->delete_selected_department();
             redirect('posmain/department');
        }else{
                echo "You have no permission to delete";
                $this->get_department();
        }    
        }
    }
    function delete_selected_department(){
         if($_SESSION['Depa_per']['delete']==1){ 
                $data1 = $this->input->post('mycheck'); 
              if(!$data1==''){              
              $this->load->model('department');             
              foreach( $data1 as $key => $value){           
              $this->department_delete($value);            
              }              
              }
         }else{
             echo "You have no permission to delete";
             $this->get_department();
         }
    }    
    function add_department(){
        if($_SESSION['Depa_per']['add']==1){ 
                $this->load->model('department');            
                $this->form_validation->set_rules("department_name",$this->lang->line('department_name'),"required"); 
               // $this->form_validation->set_rules('branchs',$this->lang->line('branch'),"required");
                
           if ($this->form_validation->run()) {
                $this->load->model('branch');
                $depart=$this->input->post('department_name');
             if($this->branch->check_deaprtment_is_already($depart,$_SESSION['Bid'])!=TRUE){
                 
                $id=$this->department->add_department($depart,$_SESSION['Bid']);
                $this->add_department_branch($id,$_SESSION['Bid']);               
                $item_add=  $this->input->post('item_read');
                $item_read=$this->input->post('item_add');
                $item_edit=$this->input->post('item_edit');
                $item_delete=$this->input->post('item_delete');
                $item=$item_add+$item_delete+$item_edit+$item_read;               
                $user_read=$this->input->post('user_read');
                $user_add=$this->input->post('user_add');
                $user_edit=$this->input->post('user_edit');
                $user_delete=$this->input->post('user_delete');
                $user=$user_add+$user_delete+$user_edit+$user_read;               
                $depa_read=$this->input->post('depa_read');
                $depa_add=$this->input->post('depa_add');
                $depa_edit=$this->input->post('depa_edit');
                $depa_delete=$this->input->post('depa_delete');
                $depa=$depa_add+$depa_delete+$depa_edit+$depa_read;                 
                $branch_read=$this->input->post('branch_read');
                $branch_add=$this->input->post('branch_add');
                $branch_edit=$this->input->post('branch_edit');
                $branch_delete=$this->input->post('branch_delete');
                $branch=$branch_add+$branch_delete+$branch_edit+$branch_read;               
                $this->add_permission($item,$depa,$user,$branch,$id,$_SESSION['Bid']);
               redirect('posmain/department');
               
               }else{
                   echo "This is department is already added in this branch";
                $this->load->model('branch');
                $data['branch']=  $this->branch->get_branch();
                $this->load->view('template/header');                
                $this->load->view('add_department',$data);
                $this->load->view('template/footer');
               }
           }else{
                $this->load->model('branch');
                $data['branch']=  $this->branch->get_branch();
                $this->load->view('template/header');                
                $this->load->view('add_department',$data);
                $this->load->view('template/footer');
           }
           
        }
           else{
                echo "You Have No permission to add department";
                $this->get_department();
           }       
           if($this->input->post('cancel')){
                redirect('posmain/department');
           }    
    }
   
    function add_permission($item,$depa,$user,$branch,$depart_id,$branchid){
         if($_SESSION['Depa_per']['add']==1){ 
                $this->load->model('permissions');
                $this->permissions->set_item_permission($item,$depart_id,$branchid);
                $this->permissions->set_user_permission($user,$depart_id,$branchid);
                $this->permissions->set_depart_permission($depa,$depart_id,$branchid);
                $this->permissions->set_branch_permission($branch,$depart_id,$branchid);
            
         }else{
             $this->get_department();
         }
    }
     function add_department_branch($id,$branch){
         if($_SESSION['Depa_per']['add']==1){                 
                $this->load->model('department');                
                $this->department->set_branch_department($id,$branch);                
                }else{
                    $this->get_department();
                }
        }
        function department_delete($id){
            if($_SESSION['Depa_per']['delete']==1){ 
                $this->load->model('department');
                $this->department->delete_department($id);
                $this->department->delete_item_permission($id);
                $this->department->delete_user_permission($id);
                $this->department->delete_branch_permission($id);
                $this->department->delete_depart_permission($id);
                $this->department->delete_depart_branch($id);                 
                redirect('departmentCI/get_department');
            }else{
                redirect('departmentCI/get_department');
            }            
        }
        function edit_department($id){
            if($_SESSION['Depa_per']['edit']==1){  
                
            }else{
                echo "you have No permission To Edit department";                
                redirect('departmentCI');
            }
        }
}
?>