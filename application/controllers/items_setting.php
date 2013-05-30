<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Items_category extends CI_Controller{
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
            $this->get_category();
        }
    }
    function get_category(){
        if(!$_SERVER['HTTP_REFERER']){ redirect('home'); }else{
            if($_SESSION['admin']==2){// check user is admin or not
                $this->load->library("pagination"); 
                $this->load->model('item_setting');                
	        $config["base_url"] = base_url()."index.php/item_category/get_category";
	        $config["total_rows"] = $this->item_setting->get_item_cate_count_for_admin($_SESSION['Bid']);// get supplier count
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;               
                $data['count']=$this->item_setting->get_item_cate_count_for_admin($_SESSION['Bid']);         
	        $data["row"] = $this->item_setting->get_item_cate_details_for_admin($config["per_page"], $page,$_SESSION['Bid']);           
	        $data['irow']=  $this->item_setting->get_item_setting();
                $data["links"] = $this->pagination->create_links();                  
                $this->load->view('template/header');
                $this->load->view('item_category/category_list',$data);
                $this->load->view('template/footer'); 
            }else{
                $this->load->library("pagination");                 
                $this->load->model('item_setting');
	        $config["base_url"] = base_url()."index.php/item_category/get_category";
                $config["total_rows"] = $this->item_setting->get_item_cate_count_for_user($_SESSION['Bid']);
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;               ;
                $data['count']=$this->item_setting->get_item_cate_count_for_user($_SESSION['Bid']);             
	        $data["row"] = $this->item_setting->get_item_cate_details_for_user($config["per_page"], $page,$_SESSION['Bid']);               
	        $data['irow']=  $this->item_setting->get_item_setting();
                $data["links"] = $this->pagination->create_links();                 
                $this->load->view('template/header');
                $this->load->view('item_category/category_list',$data);
                $this->load->view('template/footer'); 
            }                      
       }
    }
}
?>
