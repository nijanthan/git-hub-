<?php
class Ruff extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    function index(){
        
        $this->get();
    }
    function get(){
                    $this->load->model('department');
                    $this->load->model('branch');
                    $data['branch']=  $this->branch->get_user_for_branch(55);
                    $data['depa']=  $this->department->get_department();
                  
                    $this->load->view('ruffpaper',$data);
                   
    }
    function add($jibi){
       
        $this->load->model('department');
        $data=$this->department->get_user_deprtment($jibi);
        $id=$this->department->get_user_deprtment_id($jibi);
        
        for($i=0;$i<  count($data);$i++){
       echo  "<option   value=$id[$i]>$data[$i]</option>";
        }
    }
    function department($b_id,$d_id){
        $this->load->model('branch');
        $this->load->model('department');
        $branch=$this->branch->get_user_seleted_branch($b_id);
        $depa=$this->department->get_user_seleted_depa($d_id);
                echo $branch.$depa;
        
         
    }
    function my_department($b_id,$d_id,$bid,$data){
        $idArray=array();
        $idArray = explode(',',$bid );
        $f_id=$idArray[0];
         $id=$b_id.",".$d_id;
         $this->load->model('branch');
        $this->load->model('department');
        $branch=$this->branch->get_user_seleted_branch($b_id);
        $depa=$this->department->get_user_seleted_depa($d_id);
        $n=2;
        $i=0;
       while($i<$n){
        echo "<option id=added value=".$id." >" . urldecode($data). $depa.$f_id." </option>";
        $i++;
       }
    }
}
?>
