<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Items extends CI_Controller{
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
            $this->get_items();
        }
    }
    
    function get_items(){// Read all items
        if (!$_SERVER['HTTP_REFERER']){ redirect('home');} //check the function is call directly or not if yes then redirect to home
        else{
            if($_SESSION['admin']==2){// check user is admin or not
                $this->load->library("pagination"); 
                $this->load->model('branch');
                $this->load->model('item_model');
	        $config["base_url"] = base_url()."index.php/item/get_items";
	        $config["total_rows"] = $this->item_model->item_count_for_admin($_SESSION['Bid']);// get item count
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['branch']=$this->item_model->get_selected_branch_for_view();
                $data['count']=$this->item_model->item_count_for_admin($_SESSION['Bid']);         
	        $data["row"] = $this->item_model->get_item_details_for_admin($config["per_page"], $page,$_SESSION['Bid']);
                $data['urow']= $this->item_model->get_items();
	        $data["links"] = $this->pagination->create_links();                 
                $this->load->view('template/header');
                $this->load->view('item_list',$data);
                $this->load->view('template/footer');
            }else{
                $this->load->library("pagination"); 
                $this->load->model('branch');
                $this->load->model('item_model');
	        $config["base_url"] = base_url()."index.php/item/get_items";
                $config["total_rows"] = $this->item_model->pos_item_count($_SESSION['Uid'],$_SESSION['Bid']);
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['branch']=$this->item_model->get_selected_branch_for_view();
                $data['count']=$this->item_model->pos_item_count($_SESSION['Uid'],$_SESSION['Bid']);             
	        $data["row"] = $this->item_model->get_item_details($config["per_page"], $page,$_SESSION['Uid'],$_SESSION['Bid']);
                $data['urow']=$this->item_model->get_items();
	        $data["links"] = $this->pagination->create_links(); 
                
                $this->load->view('template/header');
                $this->load->view('item_list',$data);
                $this->load->view('template/footer');
            }
        }
        
    }
      function items_details(){
        if (!$_SERVER['HTTP_REFERER']){ redirect('items');} else{
            if($this->input->post('BacktoHome')){
                redirect('home');
            }
            if($this->input->post('Add_item')){
                if($_SESSION['Item_per']['add']==1){
                    $this->add_new_item_in_branch();
                }else{
                    echo "You have no permission to add item";
                    $this->get_items();
                }
            }
            if($this->input->post('delete_all')){
                 if($_SESSION['tem_per']['delete']==1){
                     $data = $this->input->post('mycheck'); 
                            if(!$data==''){              
                            $this->load->model('pos_users_model');
                            foreach( $data as $key => $value){  
                               $this->load->model('item_model');
                               $this->item_model->delete_item_for_user($value,$_SESSION['Bid'],$_SESSION['Uid']);
                            }
                           }
                            redirect('items');
                 }else{
                     $this->get_items();
                 }
            }
            if($this->input->post('activate')){
                if($_SESSION['admin']==2){
                 $this->load->model('item_model');
                 $data = $this->input->post('mycheck'); 
                            if(!$data==''){              
                            $this->load->model('pos_users_model');
                            foreach( $data as $key => $value){  
                                 $this->item_model->to_activate_item($value,$_SESSION['Bid']);
                            }
                            }
                 redirect('items');
                 
             }else{
                 redirect('home');
             }
            }
            if($this->input->post('deactivate')){
                     if($_SESSION['admin']==2){
                 $this->load->model('item_model');
                 $data = $this->input->post('mycheck'); 
                            if(!$data==''){              
                            $this->load->model('pos_users_model');
                            foreach( $data as $key => $value){  
                                 $this->item_model->deactivate_items($value,$_SESSION['Bid']);
                            }
                            }
                 redirect('items');
                 
             }else{
                 redirect('home');
             }
            }
            if($this->input->post('delete_item_for_admin')){
                if($_SESSION['admin']==2){
                 $this->load->model('item_model');
                 $data = $this->input->post('mycheck'); 
                            if(!$data==''){              
                            $this->load->model('pos_users_model');
                            foreach( $data as $key => $value){  
                                 $this->item_model->delete_items_details_in_admin($value,$_SESSION['Bid']);
                            }
                            }
                 redirect('items');
                 
             }else{
                 redirect('home');
             } 
            }
            if($this->input->post('add_category')){
                if($_SESSION['Item_per']['add']==1 or $_SESSION['Item_per']['edit']==1){
                     $this->load->view('template/header');
                     $this->load->view('add_item_category');
                     $this->load->view('template/footer');
                 }else{
                     $this->get_items();
                 }
            }
            
        }
        
    }
    function add_new_item_in_branch(){
        if(!$_SERVER['HTTP_REFERER']){ redirect('items'); }else{
        if($_SESSION['Item_per']['add']==1){
        $this->load->model('item_model');
                    $data['row']=$this->item_model->get_item_category($_SESSION['Bid']);
                    $data['crow']=$this->item_model->get_category($_SESSION['Bid']);
                    $data['srow']=$this->item_model->get_suppier_in_branch($_SESSION['Bid']);
                    $data['sb_row']=$this->item_model->get_supplier_details();
                    $this->load->view('template/header');
                    $this->load->view('add_item',$data);
                    $this->load->view('template/footer');
        }else{
            redirect('items');
        }           
        }
    }
    function delete_item_details_in_admin($id){
        if(!$_SERVER['HTTP_REFERER']){ redirect('items'); }else{
              if($_SESSION['admin']==2){
                 $this->load->model('item_model');
                 $this->item_model->delete_items_details_in_admin($id,$_SESSION['Bid']);
                 redirect('items');
                 
             }else{
                 redirect('home');
             }
            
        }
    }
    function to_deactivate_item($id){
        if(!$_SERVER['HTTP_REFERER']){ redirect('items'); }else{
              if($_SESSION['admin']==2){
                 $this->load->model('item_model');
                 $this->item_model->deactivate_items($id,$_SESSION['Bid']);
                 redirect('items');
                 
             }else{
                 redirect('home');
             }
            
        }
    }
    function to_activate_item($id){
        if(!$_SERVER['HTTP_REFERER']){ redirect('items'); }else{
              if($_SESSION['admin']==2){
                 $this->load->model('item_model');
                 $this->item_model->to_activate_item($id,$_SESSION['Bid']);
                 redirect('items');
                 
             }else{
                 redirect('home');
             }
            
        }
    }
    function add_category(){
         if(!$_SERVER['HTTP_REFERER']){ redirect('items'); }else{
             if($this->input->post('cancel')){
                 redirect('items');
             }
             if($_SESSION['Item_per']['add']==1 or $_SESSION['Item_per']['edit']==1){
                  $this->load->library('form_validation');
                            $this->form_validation->set_rules("name",$this->lang->line('name'),"required"); 
                                                        	  
                        if ( $this->form_validation->run() !== false ) {
                                    $cat= $this->input->post('name');
                                    $this->load->model('item_model');
                                    if(!$this->item_model->check_item_category($cat,$_SESSION['Bid'])){
                                    $id=$this->item_model->add_category($cat,$_SESSION['Bid']);
                                    $this->item_model->add_item_category_branch($id,$_SESSION['Bid']);
                                    $this->get_items();
                                    }else{
                                        echo "this category is already added";
                                        $this->load->view('template/header');
                                        $this->load->view('add_item_category');
                                        $this->load->view('template/footer');
                                    }
                        }else{
                                $this->load->view('template/header');
                                $this->load->view('add_item_category');
                                $this->load->view('template/footer');
                        }
             }
           
         }
    }
    function add_new_category(){
        if(!$_SERVER['HTTP_REFERER']){ redirect('items'); }else{
        if($_SESSION['Item_per']['add']==1 or $_SESSION['Item_per']['edit']==1){
                     $this->load->view('template/header');
                     $this->load->view('add_item_category');
                     $this->load->view('template/footer');
                 }else{
                     $this->get_items();
                 }
        }
    }
    function add_new_item(){
        if(!$_SERVER['HTTP_REFERER']){ redirect('items'); }else{
        if($this->input->post('cancel')){
            redirect('items');
        }
        if($this->input->post('save')){
             if($_SESSION['Item_per']['add']==1){
                 
             } 
        }
    }
    }
    function add_supplier(){
        $this->load->view('template/header');
        $this->load->view('add_new_supplier');
        $this->load->view('template/footer');
    }
    function add_new_supplier(){   
         if(!$_SERVER['HTTP_REFERER']){ redirect('suppliers'); }else{
            if($this->input->post('cancel')){
                $this->get_suppliers();
            }
            if($this->input->post('save')){
                if($_SESSION['Supplier_per']['add']==1){
                    $this->load->library('form_validation');
                            $this->form_validation->set_rules("first_name",$this->lang->line('first_name'),"required"); 
                            $this->form_validation->set_rules("company",$this->lang->line('company'),"required");
                            $this->form_validation->set_rules("last_name",$this->lang->line('last_name'),"required"); 
                            $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');
                            $this->form_validation->set_rules('email', $this->lang->line('email'), 'valid_email');                             	  
                        if ( $this->form_validation->run() !== false ) {
                                    $this->load->model('supplier_model');
                                    $first_name=$this->input->post('first_name');
                                    $last_name=  $this->input->post('last_name');
                                    $email=$this->input->post('email');
                                    $phone=$this->input->post('phone');
                                    $city=$this->input->post('city');
                                    $state=$this->input->post('state');
                                    $country=$this->input->post('country');
                                    $zip=$this->input->post('zip');
                                    $comments=$this->input->post('comments');
                                    $website=$this->input->post('website');
                                    $account_no=$this->input->post('account');
                                    $address1=$this->input->post('address1');
                                    $address2=$this->input->post('address2');
                                    $company=$this->input->post('company');
                                     $txable=0;
                                    if($this->input->post('taxable')){
                                         $txable=1;
                                    }
                                   if(!$this->supplier_model->check_supplier_already_in($phone,$_SESSION['Bid'])){
                                    $id=$this->supplier_model->add_supplier($first_name,$last_name,$email,$phone,$city,$state,$country,$zip,$comments,$website,$account_no,$address1,$address2,$company,$txable,$_SESSION['Uid']);
                                    $this->supplier_model->add_supplier_branchs($id,$_SESSION['Bid']);
                                    $this->add_new_item_in_branch();
                                    
                                   }else{
                                        echo "this user is already added";
                                        $this->load->view('template/header');
                                        $this->load->view('add_new_supplier');
                                        $this->load->view('template/footer');
                                   }                           
                          
                        }else{
                                $this->load->view('template/header');
                                $this->load->view('add_new_supplier');
                                $this->load->view('template/footer');
                        }                    
                }else{
                    redirect('items');
                }
            }
        }
    }
    
}
?>
