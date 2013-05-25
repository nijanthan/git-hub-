<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Customers extends CI_Controller{
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
            $this->get_customers();
        }
    }
    
    function get_customers(){// Read all customers
        if (!$_SERVER['HTTP_REFERER']){ redirect('home');} //check the function is call directly or not if yes then redirect to home
        else{
            if($_SESSION['admin']==2){// check user is admin or not
                $this->load->library("pagination"); 
                $this->load->model('branch');
                $this->load->model('customer_model');
	        $config["base_url"] = base_url()."index.php/customer/get_customers";
	        $config["total_rows"] = $this->customer_model->customer_count_for_admin($_SESSION['Bid']);// get customer count
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['branch']=$this->customer_model->get_selected_branch_for_view();
                $data['count']=$this->customer_model->customer_count_for_admin($_SESSION['Bid']);         
	        $data["row"] = $this->customer_model->get_customer_details_for_admin($config["per_page"], $page,$_SESSION['Bid']);
                $data['urow']= $this->customer_model->get_customers();
	        $data["links"] = $this->pagination->create_links();                 
                $this->load->view('template/header');
                $this->load->view('customer_list',$data);
                $this->load->view('template/footer');
            }else{
                $this->load->library("pagination"); 
                $this->load->model('branch');
                $this->load->model('customer_model');
	        $config["base_url"] = base_url()."index.php/customer/get_customers";
                $config["total_rows"] = $this->customer_model->pos_customer_count($_SESSION['Uid'],$_SESSION['Bid']);
	        $config["per_page"] = 8;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['branch']=$this->customer_model->get_selected_branch_for_view();
                $data['count']=$this->customer_model->pos_customer_count($_SESSION['Uid'],$_SESSION['Bid']);             
	        $data["row"] = $this->customer_model->get_customer_details($config["per_page"], $page,$_SESSION['Uid'],$_SESSION['Bid']);
                $data['urow']=$this->customer_model->get_customers();
	        $data["links"] = $this->pagination->create_links(); 
                
                $this->load->view('template/header');
                $this->load->view('customer_list',$data);
                $this->load->view('template/footer');
            }
        }
        
    }
    function customers_details(){
        if (!$_SERVER['HTTP_REFERER']){ redirect('customers');} else{
            if($this->input->post('BacktoHome')){
                redirect('home');
            }
            if($this->input->post('Add_customer')){
                if($_SESSION['Customer_per']['add']==1){
                    $this->load->view('template/header');
                    $this->load->view('add_customer');
                    $this->load->view('template/footer');
                }else{
                    echo "You have no permission to add customer";
                    $this->get_customers();
                }
            }
            if($this->input->post('delete_all')){
                 if($_SESSION['Customer_per']['delete']==1){
                     $data = $this->input->post('mycheck'); 
                            if(!$data==''){              
                            $this->load->model('pos_users_model');
                            foreach( $data as $key => $value){  
                               $this->load->model('customer_model');
                               $this->customer_model->delete_customer_for_user($value,$_SESSION['Bid'],$_SESSION['Uid']);
                            }
                           }
                            redirect('customers');
                 }else{
                     $this->get_customers();
                 }
            }
            if($this->input->post('activate')){
                if($_SESSION['admin']==2){
                 $this->load->model('customer_model');
                 $data = $this->input->post('mycheck'); 
                            if(!$data==''){              
                            $this->load->model('pos_users_model');
                            foreach( $data as $key => $value){  
                                 $this->customer_model->to_activate_customer($value,$_SESSION['Bid']);
                            }
                            }
                 redirect('customers');
                 
             }else{
                 redirect('home');
             }
            }
            if($this->input->post('deactivate')){
                     if($_SESSION['admin']==2){
                 $this->load->model('customer_model');
                 $data = $this->input->post('mycheck'); 
                            if(!$data==''){              
                            $this->load->model('pos_users_model');
                            foreach( $data as $key => $value){  
                                 $this->customer_model->deactivate_customers($value,$_SESSION['Bid']);
                            }
                            }
                 redirect('customers');
                 
             }else{
                 redirect('home');
             }
            }
            if($this->input->post('delete_customer_for_admin')){
                if($_SESSION['admin']==2){
                 $this->load->model('customer_model');
                 $data = $this->input->post('mycheck'); 
                            if(!$data==''){              
                            $this->load->model('pos_users_model');
                            foreach( $data as $key => $value){  
                                 $this->customer_model->delete_customers_details_in_admin($value,$_SESSION['Bid']);
                            }
                            }
                 redirect('customers');
                 
             }else{
                 redirect('home');
             } 
            }
            
        }
        
    }
    function add_new_customer(){
        if(!$_SERVER['HTTP_REFERER']){ redirect('customers'); }else{
            if($this->input->post('cancel')){
                $this->get_customers();
            }
            if($this->input->post('save')){
                if($_SESSION['Customer_per']['add']==1){
                    $this->load->library('form_validation');
                            $this->form_validation->set_rules("first_name",$this->lang->line('first_name'),"required"); 
                            $this->form_validation->set_rules("last_name",$this->lang->line('last_name'),"required"); 
                            $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');
                            $this->form_validation->set_rules('email', $this->lang->line('email'), 'valid_email');                             	  
                        if ( $this->form_validation->run() !== false ) {
                                    $this->load->model('customer_model');
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
                                   if(!$this->customer_model->check_customer_already_in($phone,$_SESSION['Bid'])){
                                    $id=$this->customer_model->add_customer($first_name,$last_name,$email,$phone,$city,$state,$country,$zip,$comments,$website,$account_no,$address1,$address2,$company,$txable,$_SESSION['Uid']);
                                    $this->customer_model->add_customer_branchs($id,$_SESSION['Bid']);
                                    $this->get_customers();
                                    
                                   }else{
                                        echo "this user is already added";
                                        $this->load->view('template/header');
                                        $this->load->view('add_customer');
                                        $this->load->view('template/footer');
                                   }
                                    
                                    
                        }else{
                                $this->load->view('template/header');
                                $this->load->view('add_customer');
                                $this->load->view('template/footer');
                        }
                    
                }else{
                    redirect('customers');
                }
            }
        }
    }
    function edit_customer_details($id){
         if(!$_SERVER['HTTP_REFERER']){ redirect('customers'); }else{
             if($_SESSION['Customer_per']['edit']==1){
                 $this->load->model('customer_model');
                 $data['row']= $this->customer_model->get_customer_details_for_edit($id);
                  $this->load->view('template/header');
                  $this->load->view('edit_customer',$data);
                  $this->load->view('template/footer');
             }else{
                 redirect('customer');
             }
        }
        
    }
    function update_customer(){        
     if(!$_SERVER['HTTP_REFERER']){ redirect('customers'); }else{
            if($this->input->post('cancel')){
                $this->get_customers();
            }
            if($this->input->post('save')){
                if($_SESSION['Customer_per']['edit']==1){
                    $this->load->library('form_validation');
                            $this->form_validation->set_rules("first_name",$this->lang->line('first_name'),"required"); 
                            $this->form_validation->set_rules("last_name",$this->lang->line('last_name'),"required"); 
                            $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');
                            $this->form_validation->set_rules('email', $this->lang->line('email'), 'valid_email');                             	  
                        if ( $this->form_validation->run() !== false ) {
                                    $this->load->model('customer_model');
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
                                    $id=  $this->input->post('id');
                                     $txable=0;
                                    if($this->input->post('taxable')){
                                         $txable=1;
                                    }
                                   if(!$this->customer_model->check_customer_already_for_update($id,$phone,$_SESSION['Bid'])){
                                    $this->customer_model->update_customer($id,$first_name,$last_name,$email,$phone,$city,$state,$country,$zip,$comments,$website,$account_no,$address1,$address2,$company,$txable);
                                    $this->get_customers();
                                    
                                   }else{
                                        echo "this user is already added";
                                        $this->load->view('template/header');
                                        $this->load->view('add_customer');
                                        $this->load->view('template/footer');
                                   }
                                    
                                    
                        }else{
                                $this->load->view('template/header');
                                $this->load->view('add_customer');
                                $this->load->view('template/footer');
                        }
                    
                }else{
                    redirect('customers');
                }
            }
        }
    }
    function delete_customer($id){
        if(!$_SERVER['HTTP_REFERER']){ redirect('customers'); }else{
             if($_SESSION['Customer_per']['delete']==1){
                 $this->load->model('customer_model');
                 $this->customer_model->delete_customer_for_user($id,$_SESSION['Bid'],$_SESSION['Uid']);
                 redirect('customers');
                 
             }else{
                 echo "You Have no permission to delete customer Details";
                 $this->get_customers();
             }
            
        }
    }
    function delete_customer_details_in_admin($id){
        if(!$_SERVER['HTTP_REFERER']){ redirect('customers'); }else{
              if($_SESSION['admin']==2){
                 $this->load->model('customer_model');
                 $this->customer_model->delete_customers_details_in_admin($id,$_SESSION['Bid']);
                 redirect('customers');
                 
             }else{
                 redirect('home');
             }
            
        }
    }
    function to_deactivate_customer($id){
        if(!$_SERVER['HTTP_REFERER']){ redirect('customers'); }else{
              if($_SESSION['admin']==2){
                 $this->load->model('customer_model');
                 $this->customer_model->deactivate_customers($id,$_SESSION['Bid']);
                 redirect('customers');
                 
             }else{
                 redirect('home');
             }
            
        }
    }
    function to_activate_customer($id){
        if(!$_SERVER['HTTP_REFERER']){ redirect('customers'); }else{
              if($_SESSION['admin']==2){
                 $this->load->model('customer_model');
                 $this->customer_model->to_activate_customer($id,$_SESSION['Bid']);
                 redirect('customers');
                 
             }else{
                 redirect('home');
             }
            
        }
    }
    
    
}

?>
