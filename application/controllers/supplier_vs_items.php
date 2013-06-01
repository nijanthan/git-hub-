<?php
class Supplier_vs_items extends CI_Controller{
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
         if(!isset($_SESSION['Uid'])){// check user is login or not
                redirect('home');// if user is didnt login then redirect to login page
        }else{
            $this->get_suppliers();
        }
    }
    
    function get_suppliers(){// Read all suppliers
        if (!$_SERVER['HTTP_REFERER']){ redirect('home');} //check the function is call directly or not if yes then redirect to home
        else{
            if($_SESSION['admin']==2){// check user is admin or not
                $this->load->library("pagination"); 
                $this->load->model('branch');
                $this->load->model('supplier_model');
	        $config["base_url"] = base_url()."index.php/supplier_vs_items/get_suppliers";
	        $config["total_rows"] = $this->supplier_model->supplier_count_for_admin($_SESSION['Bid']);// get supplier count
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['branch']=$this->supplier_model->get_selected_branch_for_view();
                $data['count']=$this->supplier_model->supplier_count_for_admin($_SESSION['Bid']);         
	        $data["row"] = $this->supplier_model->get_supplier_details_for_admin($config["per_page"], $page,$_SESSION['Bid']);
                $data['urow']= $this->supplier_model->get_suppliers();
	        $data["links"] = $this->pagination->create_links();                 
                $this->load->view('template/header');
                $this->load->view('supplier_vs_items/supplier_list',$data);
                $this->load->view('template/footer');
            }else{
                $this->load->library("pagination"); 
                $this->load->model('branch');
                $this->load->model('supplier_model');
	        $config["base_url"] = base_url()."index.php/supplier_vs_items/get_suppliers";
                $config["total_rows"] = $this->supplier_model->pos_supplier_count($_SESSION['Bid']);
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['branch']=$this->supplier_model->get_selected_branch_for_view();
                $data['count']=$this->supplier_model->pos_supplier_count($_SESSION['Bid']);             
	        $data["row"] = $this->supplier_model->get_supplier_details($config["per_page"], $page,$_SESSION['Bid']);
                $data['urow']=$this->supplier_model->get_suppliers();
	        $data["links"] = $this->pagination->create_links(); 
                
                $this->load->view('template/header');
                $this->load->view('supplier_vs_items/supplier_list',$data);
                $this->load->view('template/footer');
            }
        }
        
    }
}
?>
