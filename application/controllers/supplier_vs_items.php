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
    function add_items($id){
          if (!$_SERVER['HTTP_REFERER']){ redirect('home');}else{
        $this->load->model('supplier_model');
        $data['row']=  $this->supplier_model->added_items_for_supplier($_SESSION['Bid']);
                $this->load->view('template/header');
                $this->load->view('supplier_vs_items/add_items',$data);
                $this->load->view('template/footer');
          }
    }
    function get_selected_item()
    {
          if (!$_SERVER['HTTP_REFERER']){ redirect('home');}else{
       $this->load->model('receiving_items');
           $qo = mysql_real_escape_string( $_REQUEST['query'] );

        $value=  $this->receiving_items->get_selected_item_details($qo,$_SESSION['Bid']);

$data=$value[0];
$sel=$value[3];
$price=$value[1];
$id=$value[2];
   
	    echo '<ul>'."\n";
	    for($i=0;$i<count($data);$i++)
	    {
		$p = $data[$i];
		$p = preg_replace('/(' . $qo . ')/i', '<span style="font-weight:bold;">'.'</span>', $p);
		echo "\t".'<li id="autocomplete_'.$id[$i].'" rel="'.$price[$i].'_' . $sel[$i].'_' . $data[$i] .'_' . $id[$i]. '">'. utf8_encode( "$data[$i]" ) .'</li>'."\n";
	    }
	    echo '</ul>';
          }
	
    }
    function save_items(){
          if (!$_SERVER['HTTP_REFERER']){ redirect('home');}else{
        if($this->input->post('cancel')){
            redirect('supplier_vs_items/get_suppliers');
        }
        if($this->input->post('save')){
        $data=  $this->input->post('quty');
        for($i=0;$i<count($data);$i++){
           
            echo $data[$i]."<br>";
        }
    }
    }
    }

    
}
?>
