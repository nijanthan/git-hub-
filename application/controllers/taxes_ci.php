<?php 
class Taxes_ci extends CI_Controller{
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
                redirect('home');
                }else{
            $this->get_taxs();
        }
    }
    function get_taxs(){
        if(!$_SERVER['HTTP_REFERER']){ redirect('taxes'); }else{
                $this->load->view('template/header');
                $this->load->view('tax/taxes');
                $this->load->view('template/footer');
        }
          
    }
    function taxes(){
       if(!$_SERVER['HTTP_REFERER']){ redirect('taxes'); }else{
           if($this->input->post('taxes')){
               $this->taxes_details();
           }
       }
          
    }
    function taxes_details(){
        if(!$_SERVER['HTTP_REFERER']){ redirect('taxes'); }else{
            if($_SESSION['admin']==2){// check user is admin or not
                $this->load->library("pagination"); 
                $this->load->model('taxes');                
	        $config["base_url"] = base_url()."index.php/taxes/taxes_details";
	        $config["total_rows"] = $this->taxes->supplier_count_for_admin($_SESSION['Bid']);// get supplier count
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['branch']=$this->taxes->get_selected_branch_for_view();
                $data['count']=$this->taxes->supplier_count_for_admin($_SESSION['Bid']);         
	        $data["row"] = $this->taxes->get_supplier_details_for_admin($config["per_page"], $page,$_SESSION['Bid']);
                $data['urow']= $this->taxes->get_suppliers();
	        $data["links"] = $this->pagination->create_links();                 
                $this->load->view('template/header');
                $this->load->view('supplier_list',$data);
                $this->load->view('template/footer');
            }else{
                $this->load->library("pagination");                 
                $this->load->model('taxes');
	        $config["base_url"] = base_url()."index.php/taxes/taxes_details";
                $config["total_rows"] = $this->taxes->get_count_for_user($_SESSION['Uid'],$_SESSION['Bid']);
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;               ;
                $data['count']=$this->taxes->get_count_for_user($_SESSION['Bid']);             
	        $data["row"] = $this->taxes->get_tax_details_for_user($config["per_page"], $page,$_SESSION['Bid']);               
	        $data["links"] = $this->pagination->create_links(); 
                
                $this->load->view('template/header');
                $this->load->view('tax/taxes_list',$data);
                $this->load->view('template/footer');
            }
            
                
           
       }
    }
    function active($id){
        if(!$_SERVER['HTTP_REFERER']){ redirect('taxes'); }else{
        $this->load->model('taxes');
        $this->taxes->activate_tax($id);
        redirect('taxes_ci/taxes_details');
        }
    }
    function inactive($id){
        if(!$_SERVER['HTTP_REFERER']){ redirect('taxes'); }else{
        $this->load->model('taxes');
        $this->taxes->inactivate_tax($id);
        redirect('taxes_ci/taxes_details');
         }
    }
    function delete_tax($id){
        if(!$_SERVER['HTTP_REFERER']){ redirect('taxes'); }else{
        $this->load->model('taxes');
        $this->taxes->delete_tax($id);
        redirect('taxes_ci/taxes_details');
         }
    }
    function manage_taxes(){
        if(!$_SERVER['HTTP_REFERER']){ redirect('taxes'); }else{
            if($this->input->post('delete')){
        $this->load->model('taxes');        
        $data['row']=  $this->taxes->delete_tax($id);
        $data1 = $this->input->post('mycheck'); 
              if(!$data1==''){         
              foreach( $data1 as $key => $value){   
                  $this->taxes->delete_tax($value);
              }
                            }
        redirect('taxes_ci/taxes_details');
         }
        }
        if($this->input->post('add_tax')){
            $this->load->model('taxes');
            $data['row']=  $this->taxes->get_tax_types($_SESSION['Bid']);
                $this->load->view('template/header');
                $this->load->view('tax/add_new',$data);
                $this->load->view('template/footer');
        }
    }
}
?>
