<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employees extends CI_Controller{
     
    function __construct() {
       
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('unit_test');
        session_start();        
        $this->load->helper(array('form', 'url'));
    }
    function index(){
        $this->get_employee_details();
       // $this->employee_testing();
    } 
    function employee_testing(){
         $this->load->model('employeesmodel');
        $test= $this->employeesmodel->get();
  
          $expected_result ='is_true';

        $test_name = 'Adds one plus one';
       
        $this->unit->run($test, $expected_result, $test_name);
      return $this->unit->report();
        
        
        
    }
    function get_employee_details(){
        
        
                $this->load->helper("url");
                $this->load->model('employeesmodel');
                $this->load->model('branch');
                $_SESSION['depart']="null";
                $_SESSION['branch']="null";
                
                $this->load->library("pagination"); 
	        $config["base_url"] = base_url()."index.php/employees/get_employee_details";
	        $config["total_rows"] = $this->employeesmodel->employeecount();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	        $this->pagination->initialize($config);	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['branch']=$this->branch->get_selected_branch_for_view();
                $data['count']=$this->employeesmodel->employeecount();             
	        $data["row"] = $this->employeesmodel->get_employees_details($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();  
                $this->load->view('employee_list',$data);
    }
    function edit_employee_details($id){
                $this->load->model('employeesmodel');
                $this->load->model('branch');
                $this->load->model('department');
                $data['row']=  $this->employeesmodel->edit_employee($id); 
                $data['error']="";
                $data['file_name']="null";
                $data['selected_branch']=$this->branch->get_selected_branch($id);
                $data['selected_depart']=$this->department->get_user_depart($id);
                $this->load->model('department');
                $depa=$this->department->get_all_departmentg();
                $this->load->model('branch');
                $branch=$this->branch->get_all_branch();
                $data['all_branch']=$this->get_selected_branchs($branch,$id);
                $data['branch']=$this->branch->get_branch();
                $data['all_depa']=  $this->department->get_department();
                $data['depa']=$this->get_selected_departments($depa,$id);
                $this->load->view('edit_employee_details',$data);
        
    }
     function get_selected_branchs($depart,$id){
        $this->load->model('branch');
        $new_depa=array();
        $o=0;
        $w = 0;
        $departed=$this->branch->get_user_branch($id);
        $arr=array_merge($depart,$departed);

                $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
        $temp = $arr[$i];
        $j = $i;
        for ($k = 0; $k < $len; $k++) {
            if ($k != $j) {
            if ($temp == $arr[$k]) {
               
                $arr[$k]=" ";
                $arr[$i]=" ";
            }
            }
        }
        }
$r=0;
        for ($i = 0; $i < $len; $i++) {
       if($arr[$i]==" "){
           
       }
       else{
           $new_depa[$r]=$arr[$i];
           $r++;
       }
        }
        return $new_depa;
           
    }
    function get_selected_departments($depart,$id){
        $this->load->model('department');
        $new_depa=array();
        $o=0;
        $w = 0;
        $departed=$this->department->get_all_user_depart($id);
        $arr=array_merge($depart,$departed);

                $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
        $temp = $arr[$i];
        $j = $i;
        for ($k = 0; $k < $len; $k++) {
            if ($k != $j) {
            if ($temp == $arr[$k]) {
               
                $arr[$k]=" ";
                $arr[$i]=" ";
            }
            }
        }
        }
$r=0;
        for ($i = 0; $i < $len; $i++) {
       if($arr[$i]==" "){
           
       }
       else{
           $new_depa[$r]=$arr[$i];
           $r++;
       }
        }
        return $new_depa;
           
    }
    
    function cancel(){
        $this->get_employee_details();
    }
    function upadate_employee_details(){
       $this->load->library('form_validation');
                $this->form_validation->set_rules("first_name","First_name","required"); 
                $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');
                $this->form_validation->set_rules('age', 'Age', 'required|max_length[2]|regex_match[/^[0-9]+$/]|xss_clean');
                $this->form_validation->set_rules("last_name","Last_name","required"); 
                $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
                $this->form_validation->set_rules('password','Password',"required");
                $this->form_validation->set_rules('address','Address',"required");
                $this->form_validation->set_rules('city','City',"required");
                $this->form_validation->set_rules('state','State',"required");
                $this->form_validation->set_rules('zip','Zip',"required");
                $this->form_validation->set_rules('dob','Dob',"required");                
                $this->form_validation->set_rules('age','Age',"required");
               // $this->form_validation->set_rules('branch','Branch',"required");
                $this->form_validation->set_rules('employee_id','Employee_id',"required");
                $this->form_validation->set_rules('country','Country',"required");
                 $id=  $this->input->post('id');
	  
	    if ( $this->form_validation->run() !== false ) {
			  $this->load->model('employeesmodel');
                          $first_name=$this->input->post('first_name');
                          $last_name=  $this->input->post('last_name');
                          $email=$this->input->post('email');
			  $emp_id=$this->input->post('employee_id');
                          $password=$this->input->post('password');
                          $address=$this->input->post('address');
                          $phone=$this->input->post('phone');
                          $city=$this->input->post('city');
                          $state=$this->input->post('state');
                          $zip=$this->input->post('zip');
                          $country=$this->input->post('country');
                          $branch=$this->input->post('branch');
                          $yourdatetime =$this->input->post('dob');
                          $image_name=$this->input->post('image_name');
                          $age=  $this->input->post('age');
                          $sex= $this->input->post('sex');
                          
                          $dob= strtotime($yourdatetime);
                         
                         $this->load->model('employeesmodel');
                         $this->employeesmodel->update_employee($id,$first_name,$last_name,$emp_id,$password,$address,$city,$state,$zip,$country,$email,$phone,$dob,$image_name);
                         $this->update_user_department($id);
                         $this->update_user_branch($id);
                         $this->get_employee_details();
                          
                          
                          
    }else{
        $this->load->model('branch');
        $data['branch']=  $this->branch->get_branch();
        $this->edit_employee_details($id);}
}
function update_user_branch($id){
    $str=$_SESSION['edit_bran'];
     $this->load->model('branch');
      $this->branch->delete_user_branchs($id);
            $branch = preg_split('/[\,\.\ ]/', $str);
           
            $branch_id=array();
            $i=0;
            foreach ($branch as $bra){

                $temp_branch =  preg_split("/,/", $bra);
                if($temp_branch){
                    foreach ($temp_branch as $temp){
                      
                        $branch_id[$i]=$temp;
                        $i++;
                    } 
                } else {
                    $branch_id[$i]=$temp;
                        $i++;  
                }
            }  
            for($ii=1; $ii<count($branch_id); $ii++){
               $this->branch->set_branch($id,$branch_id[$ii]);
            }
}
function update_user_department($id){
     $str= $_SESSION['edit_depa'];
     $this->load->model('department');
     $this->department->delete_user_depart($id);
     
            $depart = preg_split('/[\,\.\ ]/', $str);
            
            $depart_id=array();
            $i=0;
            foreach ($depart as $bra){

                $temp_depart =  preg_split("/,/", $bra);
                if($temp_depart){
                    foreach ($temp_depart as $temp){
                      
                        $depart_id[$i]=$temp;
                        $i++;
                    } 
                } else {
                    $depart_id[$i]=$temp;
                        $i++;  
                }
            }  
            for($ii=1; $ii<count($depart_id); $ii++){
               $this->department->set_department($id,$depart_id[$ii]);
            }

    
}

function do_upload($id)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
                        $file_name='null';
			$this->after_uploading($id, $error);
		}
		else
		{
                   
                      $upload_data = $this->upload->data();
                      $file_name =$upload_data['file_name'];
                      $error="";
                      $this->after_uploading($id, $error,$file_name);
			
		}
                
	}
        function after_uploading($id,$error,$file_name){
             $this->load->model('employeesmodel');
                $data['row']=  $this->employeesmodel->edit_employee($id); 
                $data['error']=$error;
                $data['file_name']=$file_name;
                $this->load->model('department');
                $data['depa']=  $this->department->get_department();
                $this->load->model('branch');
                $data['branch']=  $this->branch->get_branch();
                $this->load->view('edit_employee_details',$data);
        }
       
        
        function delete_selected_employees(){
            if($this->input->post('BacktoHome')){
                redirect('posmain');
            }
           if($this->input->post('delete_all')){
              $data1 = $this->input->post('mycheck'); 
              if(!$data1==''){
              $deleted_by=$_SESSION['Uid'];
              $this->load->model('employeesmodel');
              foreach( $data1 as $key => $value){           
             $this->employeesmodel->delete_employee($value,$deleted_by); 
            
              }}
            $this->get_employee_details();
              }
            if($this->input->post('Add_employee')){
                    $this->load->model('department');
                    $this->load->model('branch');
                    $data['branch']=  $this->branch->get_branch();
                    $data['depa']=  $this->department->get_department();
                    $this->load->view('add_new_employee',$data);
             }
        }
        function add_employee_details(){
            
            
           if ($this->input->post('Cancel')) {
             $this->get_employee_details();
  
            }
            if ($this->input->post('Save')) {
                
                
                 $this->load->library('form_validation');
                $this->form_validation->set_rules("first_name","First_name","required"); 
                $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[10]|regex_match[/^[0-9]+$/]|xss_clean');
                $this->form_validation->set_rules('age', 'Age', 'required|max_length[2]|regex_match[/^[0-9]+$/]|xss_clean');
                $this->form_validation->set_rules("last_name","Last_name","required"); 
                $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
                $this->form_validation->set_rules('password','Password',"required");
                $this->form_validation->set_rules('address','Address',"required");
                $this->form_validation->set_rules('city','City',"required");
                $this->form_validation->set_rules('state','State',"required");
                $this->form_validation->set_rules('zip','Zip',"required");
                $this->form_validation->set_rules('dob','Dob',"required");
                
                $this->form_validation->set_rules('age','Age',"required");
               // $this->form_validation->set_rules('branch','Branch',"required");
                $this->form_validation->set_rules('employee_id','Employee_id',"required");
                $this->form_validation->set_rules('country','Country',"required");
                $id=  $this->input->post('id');
	  
	    if ( $this->form_validation->run() !== false ) {
               
			  $this->load->model('employeesmodel');
                          $first_name=$this->input->post('first_name');
                          $last_name=  $this->input->post('last_name');
                          $email=$this->input->post('email');
			  $emp_id=$this->input->post('employee_id');
                          $password=$this->input->post('password');
                          $address=$this->input->post('address');
                          $phone=$this->input->post('phone');
                          $city=$this->input->post('city');
                          $state=$this->input->post('state');
                          $zip=$this->input->post('zip');
                          $country=$this->input->post('country');
                          $branch=$this->input->post('branch');
                          $yourdatetime =$this->input->post('dob');
                          $image_name=$_SESSION['image_name'];
                          $age=  $this->input->post('age');
                          $sex= $this->input->post('sex');
                          $dob= strtotime($yourdatetime);
                          $created_by=$_SESSION['Uid'];
                          $this->load->model('employeesmodel');
                          if($this->employeesmodel->user_checking($email,$emp_id,$dob)==FALSE){
                               if($_SESSION['branch']!="" and $_SESSION['branch']!="null" and $_SESSION['depart']!="" and $_SESSION['depart']!="null"){
                          $id= $this->employeesmodel->adda_new_employee($created_by,$sex,$age,$first_name,$last_name,$emp_id,$password,$address,$city,$state,$zip,$country,$email,$phone,$branch,$dob, $image_name);
                          $this->add_user_branchs($id);
                          $this->add_user_department($id);
                          $this->load->model('employeepermission');
                          $this->employeepermission->adda_default_permission($id);
                          $this->get_employee_details();
                            }                                                    
                          else{
                              echo "Set the branch and department of the user";
                  $this->load->model('department');
                  $data['depa']=  $this->department->get_department();
                  $this->load->model('branch');
                  $data['branch']=  $this->branch->get_branch();
                  $this->load->view('add_new_employee',$data);
                              
                          }
                          }
                          else{
                   echo 'this user is alreay added';
                   
                   $this->load->model('department');
                   $data['depa']=  $this->department->get_department();
                   $this->load->model('branch');
                   $data['branch']=  $this->branch->get_branch();
                   $this->load->view('add_new_employee',$data);
                        
                          }
            }else{
                   //echo  ."<br>";
                  
                      
                   
                  $this->load->model('department');
                  $data['depa']=  $this->department->get_department();
                  $this->load->model('branch');
                  $data['branch']=  $this->branch->get_branch();
                  $this->load->view('add_new_employee',$data);
              }
    
             }
                  
        }
        function add_user_department($id){
            
            $str=$_SESSION['depart'];
            $depart = preg_split('/[\,\.\ ]/', $str);
            $this->load->model('department');
            $depart_id=array();
            $i=0;
            foreach ($depart as $bra){

                $temp_depart =  preg_split("/,/", $bra);
                if($temp_depart){
                    foreach ($temp_depart as $temp){
                      
                        $depart_id[$i]=$temp;
                        $i++;
                    } 
                } else {
                    $depart_id[$i]=$temp;
                        $i++;  
                }
            }  
            for($ii=1; $ii<count($depart_id); $ii++){
               $this->department->set_department($id,$depart_id[$ii]);
            }

        }
         function add_user_branchs($id){
            
            $str=$_SESSION['branch'];
            $branch = preg_split('/[\,\.\ ]/', $str);
            $this->load->model('branch');
            $branch_id=array();
            $i=0;
            foreach ($branch as $bra){

                $temp_branch =  preg_split("/,/", $bra);
                if($temp_branch){
                    foreach ($temp_branch as $temp){
                      
                        $branch_id[$i]=$temp;
                        $i++;
                    } 
                } else {
                    $branch_id[$i]=$temp;
                        $i++;  
                }
            }  
            for($ii=1; $ii<count($branch_id); $ii++){
               $this->branch->set_branch($id,$branch_id[$ii]);
            }

        }
        
        function add_employee_image(){
              $uploaddir = './uploads/'; 
               $file = $uploaddir . basename($_FILES['uploadfile']['name']); 
               $_SESSION['image_name']=basename($_FILES['uploadfile']['name']); 
               
                if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
                echo "success"; 
                } else {
                        echo "error";
                }

        }
        function edit_employee_permission($id){
             $this->load->model('employeesmodel');
             $data['irow']=  $this->employeesmodel->edit_employee(1); 
             $this->load->view('edit_employee_permission',$data);
        }
        function getoptionvalue(){
            echo "haii";
            
        }
        function add_jibi($ud){
           $_SESSION['depart']=$ud;
        }
        function add_branch($branch){
             $_SESSION['branch']=$branch;
        }
        function edit_department($dep){
            $_SESSION['edit_depa']=$dep;
        }
        function edit_branch($dep){
            $_SESSION['edit_bran']=$dep;
        }


}
?>
