<?php

class Main extends CI_Controller
{
    function __construct() {
        parent::__construct();
         $this->load->helper('url'); 
         $this->load->helper('form');
         $this->load->helper(array('form', 'url'));
    }
    function index(){
        
       $this->employee();
      // $this->load->view('upload_form', array('error' => ' ' ));
      // $this->do_upload();
       
        
        } 
function employee()
{
    redirect('/employees');
}
function do_upload()
	{
		$config['upload_path'] = './employees/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('edit_employee_details', $error);
		}
		else
		{
			
		}
	}

}
?>
