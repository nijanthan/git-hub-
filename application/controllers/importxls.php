<?php

class importxls extends CI_Controller

{

	function __construct()

	{
        parent::__construct();

		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
	}

function index()

{

	$this->load->view('ruffpaper');
	//-------------------------------nijan
	$this->load->view('upload1', array('error' => ' ' ));
	//--------------------------------nijan

}



function do_upload()
{
	$config['upload_path'] = './uploads/';
	$config['allowed_types'] = '*';
	$config['max_size']	= '3000';
	//$config['max_width']  = '';
	//$config['max_height']  = '';

	$this->load->library('upload', $config);
	if ( ! $this->upload->do_upload())
	{
		$error = array('error' => $this->upload->display_errors());

		$this->load->view('customers/customer_list', $error);
	}
	else
	{
		$data =  $this->upload->data();

		//$this->load->view('upload_success', $data);
		$filePath=$data['file_path'].$data['file_name'];
		//	echo $hh;
		//	$filePath = "/opt/lampp/htdocs/day/excel/application/1/ee.xls";
		$type=$data['file_type'];
		print_r($type);
		switch ($type){
			case "application/msword":
				$this->load->library('Excel');
				$objReader = new PHPExcel_Reader_Excel5();
				//  $fname = $filename.".xls";
				$objPHPExcel = $objReader->load($filePath);
				$objPHPExcel->setActiveSheetIndex();
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				print_r($sheetData);

				$i=0;
				foreach($sheetData as $p) {
					$i++;
					if($i>1){
						$data = array(

								'id' => $p['A'],
								'first_name' => $p['B'],
								'title' => $p['C'],
								'last_name' => $p['D'],
								'address1' => $p['E'],
								'address2' => $p['F'],
								'bday' => $p['G'],
								'mday' => $p['H'],
								'city' => $p['I'],
								'state' => $p['J'],
								'zip' => $p['K'],
								'country' => $p['L'],
								'category_id' => $p['M'],
								'comments' => $p['N'],
								'company_name' => $p['O'],
								'email' => $p['P'],
								'phone' => $p['Q'],
								'account_number' => $p['R'],
								'bank_name' => $p['S'],
								'bank_location' => $p['T'],
								'website' => $p['U'],
								'cst' => $p['V'],
								'gst' => $p['W'],
								'tax_no' => $p['X'],
								'created_by' => $p['Y'],
								'active_status' => $p['Z'],
								'delete_status' => $p['AA'],
									
								// what do you want here?
						);
						$this->load->database();
						$this->load->model('excelmodel');
						$this->excelmodel->savedata($p['A'],$p['B'],$p['C'], $p['D'],$p['E'],$p['F'],$p['G'],$p['H'],$p['I'],$p['J'],$p['K'],$p['L'],$p['M'],$p['N'],$p['O'],$p['P'],$p['Q'],$p['R'],$p['S'],$p['T'],$p['U'],$p['V'],$p['W'],$p['X'],$p['Y'],$p['Z'],$p['AA']);
					}
				}

				print_r("hello");
				break;
			case"application/zip":
				//	case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"||"application/vnd.ms-excel":
				print_r('nijan');
				$this->load->library('Excel');
				$objReader = new PHPExcel_Reader_Excel2007();
				//  $fname = $filename.".xls";
				$objPHPExcel = $objReader->load($filePath);
				$objPHPExcel->setActiveSheetIndex();
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				print_r($sheetData);

				$i=0;
				foreach($sheetData as $p) {
					$i++;
					if($i>1){
						$data = array(

								'id' => $p['A'],
								'first_name' => $p['B'],
								'title' => $p['C'],
								'last_name' => $p['D'],
								'address1' => $p['E'],
								'address2' => $p['F'],
								'bday' => $p['G'],
								'mday' => $p['H'],
								'city' => $p['I'],
								'state' => $p['J'],
								'zip' => $p['K'],
								'country' => $p['L'],
								'category_id' => $p['M'],
								'comments' => $p['N'],
								'company_name' => $p['O'],
								'email' => $p['P'],
								'phone' => $p['Q'],
								'account_number' => $p['R'],
								'bank_name' => $p['S'],
								'bank_location' => $p['T'],
								'website' => $p['U'],
								'cst' => $p['V'],
								'gst' => $p['W'],
								'tax_no' => $p['X'],
								'created_by' => $p['Y'],
								'active_status' => $p['Z'],
								'delete_status' => $p['AA'],
									
								// what do you want here?
						);
						$this->load->database();
						$this->load->model('excelmodel');
						$this->excelmodel->savedata($p['A'],$p['B'],$p['C'], $p['D'],$p['E'],$p['F'],$p['G'],$p['H'],$p['I'],$p['J'],$p['K'],$p['L'],$p['M'],$p['N'],$p['O'],$p['P'],$p['Q'],$p['R'],$p['S'],$p['T'],$p['U'],$p['V'],$p['W'],$p['X'],$p['Y'],$p['Z'],$p['AA']);
							
					}			}
					//	application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
					break;
			case "application/vnd.oasis.opendocument.spreadsheet":
					
				$this->load->library('Excel');
				$objReader = new PHPExcel_Reader_OOCalc();
				$objPHPExcel = $objReader->load($filePath);
				$objPHPExcel->setActiveSheetIndex();
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				print_r($sheetData);
					
				$i=0;
				foreach($sheetData as $p) {
					$i++;
					if($i>1){
						$data = array(
									
								'id' => $p['A'],
								'first_name' => $p['B'],
								'title' => $p['C'],
								'last_name' => $p['D'],
								'address1' => $p['E'],
								'address2' => $p['F'],
								'bday' => $p['G'],
								'mday' => $p['H'],
								'city' => $p['I'],
								'state' => $p['J'],
								'zip' => $p['K'],
								'country' => $p['L'],
								'category_id' => $p['M'],
								'comments' => $p['N'],
								'company_name' => $p['O'],
								'email' => $p['P'],
								'phone' => $p['Q'],
								'account_number' => $p['R'],
								'bank_name' => $p['S'],
								'bank_location' => $p['T'],
								'website' => $p['U'],
								'cst' => $p['V'],
								'gst' => $p['W'],
								'tax_no' => $p['X'],
								'created_by' => $p['Y'],
								'active_status' => $p['Z'],
								'delete_status' => $p['AA'],
									
								// what do you want here?
						);
						$this->load->database();
						$this->load->model('excelmodel');
						$this->excelmodel->savedata($p['A'],$p['B'],$p['C'], $p['D'],$p['E'],$p['F'],$p['G'],$p['H'],$p['I'],$p['J'],$p['K'],$p['L'],$p['M'],$p['N'],$p['O'],$p['P'],$p['Q'],$p['R'],$p['S'],$p['T'],$p['U'],$p['V'],$p['W'],$p['X'],$p['Y'],$p['Z'],$p['AA']);
					}}
						
					break;
			case "application/xml":
					
				$this->load->library('Excel');
				$objReader = new PHPExcel_Reader_Excel2003XML();
				$objPHPExcel = $objReader->load($filePath);
				$objPHPExcel->setActiveSheetIndex();
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				print_r($sheetData);
					
				$i=0;
				foreach($sheetData as $p) {
					$i++;
					if($i>1){
						$data = array(
									
								'id' => $p['A'],
								'first_name' => $p['B'],
								'title' => $p['C'],
								'last_name' => $p['D'],
								'address1' => $p['E'],
								'address2' => $p['F'],
								'bday' => $p['G'],
								'mday' => $p['H'],
								'city' => $p['I'],
								'state' => $p['J'],
								'zip' => $p['K'],
								'country' => $p['L'],
								'category_id' => $p['M'],
								'comments' => $p['N'],
								'company_name' => $p['O'],
								'email' => $p['P'],
								'phone' => $p['Q'],
								'account_number' => $p['R'],
								'bank_name' => $p['S'],
								'bank_location' => $p['T'],
								'website' => $p['U'],
								'cst' => $p['V'],
								'gst' => $p['W'],
								'tax_no' => $p['X'],
								'created_by' => $p['Y'],
								'active_status' => $p['Z'],
								'delete_status' => $p['AA'],
									
								// what do you want here?
						);
						$this->load->database();
						$this->load->model('excelmodel');
						$this->excelmodel->savedata($p['A'],$p['B'],$p['C'], $p['D'],$p['E'],$p['F'],$p['G'],$p['H'],$p['I'],$p['J'],$p['K'],$p['L'],$p['M'],$p['N'],$p['O'],$p['P'],$p['Q'],$p['R'],$p['S'],$p['T'],$p['U'],$p['V'],$p['W'],$p['X'],$p['Y'],$p['Z'],$p['AA']);
					}}

					break;
			case "text/plain":
					
				$this->load->library('Excel');
				$objReader = new PHPExcel_Reader_CSV();
				$objPHPExcel = $objReader->load($filePath);
				$objPHPExcel->setActiveSheetIndex();
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				print_r($sheetData);
					
				$i=0;
				foreach($sheetData as $p) {
					$i++;
					if($i>1){
						$data = array(
									
								'id' => $p['A'],
								'first_name' => $p['B'],
								'title' => $p['C'],
								'last_name' => $p['D'],
								'address1' => $p['E'],
								'address2' => $p['F'],
								'bday' => $p['G'],
								'mday' => $p['H'],
								'city' => $p['I'],
								'state' => $p['J'],
								'zip' => $p['K'],
								'country' => $p['L'],
								'category_id' => $p['M'],
								'comments' => $p['N'],
								'company_name' => $p['O'],
								'email' => $p['P'],
								'phone' => $p['Q'],
								'account_number' => $p['R'],
								'bank_name' => $p['S'],
								'bank_location' => $p['T'],
								'website' => $p['U'],
								'cst' => $p['V'],
								'gst' => $p['W'],
								'tax_no' => $p['X'],
								'created_by' => $p['Y'],
								'active_status' => $p['Z'],
								'delete_status' => $p['AA'],
									
								// what do you want here?
						);
						$this->load->database();
						$this->load->model('excelmodel');
						$this->excelmodel->savedata($p['A'],$p['B'],$p['C'], $p['D'],$p['E'],$p['F'],$p['G'],$p['H'],$p['I'],$p['J'],$p['K'],$p['L'],$p['M'],$p['N'],$p['O'],$p['P'],$p['Q'],$p['R'],$p['S'],$p['T'],$p['U'],$p['V'],$p['W'],$p['X'],$p['Y'],$p['Z'],$p['AA']);
					}}
					break;
		}}}}