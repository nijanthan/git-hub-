<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acluser{
    function __construct() {
       
    }
    function user_item_permissions($bid,$id){
       
         $CI=  get_instance();
         $CI->load->library('session');
         $CI->load->model('aclpermissionmodel');
         $deaprt=$CI->aclpermissionmodel->get_user_department($id,$bid);
          
         $num=0000;
         for($i=0;$i<count($deaprt);$i++){
         $num=$num+$CI->aclpermissionmodel->item_permission($deaprt[$i],$bid); 
         
         }
         
        if($num%10==0){  $read=0; }else{  $read=1; }
        if($num/10%10==0){  $add=0; }else{  $add=1; }
        if($num/100%10==0){ $edit=0; }else{  $edit=1; }
        if($num/1000%10==0){ $delete= 0; }else{  $delete= 1; }
         
        $item = array(
                   'item'=>$num,
                   'read'=>$read,
                   'add'=> $add,
                   'edit' =>$edit,
                   'delete'=>$delete
               );

        $_SESSION['Item_per']=$item;
        
        
    }
    function user_employee_permissions($bid,$id){
         $CI=  get_instance();
         $CI->load->library('session');
         $CI->load->model('aclpermissionmodel');
          $deaprt=$CI->aclpermissionmodel->get_user_department($id,$bid);          
         $num=0000;
         for($i=0;$i<count($deaprt);$i++){
         $num=$num+$CI->aclpermissionmodel->empl_permission($deaprt[$i],$bid); 
         }
         
        if($num%10==0){  $read=0; }else{  $read=1; }
        if($num/10%10==0){  $add=0; }else{  $add=1; }
        if($num/100%10==0){ $edit=0; }else{  $edit=1; }
        if($num/1000%10==0){ $delete= 0; }else{  $delete= 1; }
         
        $emp = array(
                   'item'=>$num,
                   'read'=>$read,
                   'add'=> $add,
                   'edit' =>$edit,
                   'delete'=>$delete               );
        $_SESSION['Emp_per']=$emp;       
        
    }
    function user_department_permissions($bid,$id){
         $CI=  get_instance();
         $CI->load->library('session');
         $CI->load->model('aclpermissionmodel');
          $deaprt=$CI->aclpermissionmodel->get_user_department($id,$bid);          
         $num=0000;
         for($i=0;$i<count($deaprt);$i++){
         $num=$num+$CI->aclpermissionmodel->department_permission($deaprt[$i],$bid); 
         }
         
        if($num%10==0){  $read=0; }else{  $read=1; }
        if($num/10%10==0){  $add=0; }else{  $add=1; }
        if($num/100%10==0){ $edit=0; }else{  $edit=1; }
        if($num/1000%10==0){ $delete= 0; }else{  $delete= 1; }
         echo $num;
        $emp = array(
                   'item'=>$num,
                   'read'=>$read,
                   'add'=> $add,
                   'edit' =>$edit,
                   'delete'=>$delete               );
        $_SESSION['Depa_per']=$emp;       
        
    }
     function user_branch_permissions($bid,$id){
         $CI=  get_instance();
         $CI->load->library('session');
         $CI->load->model('aclpermissionmodel');
          $deaprt=$CI->aclpermissionmodel->get_user_department($id,$bid);          
         $num=0000;
         for($i=0;$i<count($deaprt);$i++){
         $num=$num+$CI->aclpermissionmodel->branch_permission($deaprt[$i],$bid); 
         }         
        if($num%10==0){  $read=0; }else{  $read=1; }
        if($num/10%10==0){  $add=0; }else{  $add=1; }
        if($num/100%10==0){ $edit=0; }else{  $edit=1; }
        if($num/1000%10==0){ $delete= 0; }else{  $delete= 1; }
         echo $num;
        $emp = array(
                   'item'=>$num,
                   'read'=>$read,
                   'add'=> $add,
                   'edit' =>$edit,
                   'delete'=>$delete               );
        $_SESSION['Branch_per']=$emp;       
        
    }
    
}
?>
