<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Receiving extends CI_Controller{
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
    function get_items(){
        $this->load->model('receiving_items');
        $data['i_row']=  $this->receiving_items->get_items($_SESSION['Bid']);
    }
}
?>
