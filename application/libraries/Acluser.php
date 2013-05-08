<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acluser{
    function __construct() {
       
    }
    function user_item_permissions($id){
         $CI=  get_instance();
         $CI->load->library('session');
         $CI->load->model('aclpermissionmodel');
         $num=$CI->aclpermissionmodel->item_permission($id); 
         
        $read= $num%10;
        $add= $num/10%10;
        $edit= $num/100%10;
        $delete= $num/1000%10;
        $item = array(
                   'item'=>$num,
                   'read'=>$read,
                   'add'=> $add,
                   'edit' =>$edit,
                   'delete'=>$delete
               );

        $_SESSION['Item_per']=$item;
        
        
    }
    function user_employee_permissions($id){
         $CI=  get_instance();
         $CI->load->library('session');
         $CI->load->model('aclpermissionmodel');
         $num=$CI->aclpermissionmodel->empl_permission($id); 
         
        $read= $num%10;
        $add= $num/10%10;
        $edit= $num/100%10;
        $delete= $num/1000%10;
        $emp = array(
                   'emp'=>$num,
                   'read'=>$read,
                   'add'=> $add,
                   'edit' =>$edit,
                   'delete'=>$delete
               );

        $_SESSION['Emp_per']=$emp;
        
        
    }
    
}
?>
