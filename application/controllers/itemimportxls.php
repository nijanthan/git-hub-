<?php

class itemimportxls extends CI_Controller

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
	$this->load->view('upload1', array('error' => ' ' ));

}



function do_upload()
{
	$config['upload_path'] = './uploads/';
	$config['allowed_types'] = '*';
	$config['max_size']	= '3000';


	$this->load->library('upload', $config);
	if ( ! $this->upload->do_upload())
	{
		$error = array('error' => $this->upload->display_errors());

		$this->load->view('/item_list', $error);
	}
	else
	{
		$data =  $this->upload->data();
		$filePath=$data['file_path'].$data['file_name'];
		$type=$data['file_type'];
		print_r($type);
		switch ($type){
			case "application/msword":
				$this->load->library('Excel');
				$objReader = new PHPExcel_Reader_Excel5();
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
								'code' => $p['B'],
								'barcode' => $p['C'],
								'category_id' => $p['D'],
								'branch_id' => $p['E'],
								'supplier_id' => $p['F'],
								'name' => $p['G'],
								'description' => $p['H'],
								'cost_price' => $p['I'],
								'mrf' => $p['J'],
								'landing_cost' => $p['K'],
								'brand_id' => $p['L'],
								'category_id' => $p['M'],
								'item_type_id' => $p['N'],
								'selling_price' => $p['O'],
								'discount_amount' => $p['P'],
								'start_date' => $p['Q'],
								'account_number' => $p['R'],
								'end_date' => $p['S'],
								'tax_id' => $p['T'],
								'tax_area_id' => $p['U'],
								'location' => $p['V'],
									
						);
						$this->load->database();
						$this->load->model('excelmodel');
						$this->excelmodel->savedata($p['A'],$p['B'],$p['C'], $p['D'],$p['E'],$p['F'],$p['G'],$p['H'],$p['I'],$p['J'],$p['K'],$p['L'],$p['M'],$p['N'],$p['O'],$p['P'],$p['Q'],$p['R'],$p['S'],$p['T'],$p['U'],$p['V']);
					}
				}
				break;
			case"application/zip":
				//	case "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"||"application/vnd.ms-excel":
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
								'code' => $p['B'],
								'barcode' => $p['C'],
								'category_id' => $p['D'],
								'branch_id' => $p['E'],
								'supplier_id' => $p['F'],
								'name' => $p['G'],
								'description' => $p['H'],
								'cost_price' => $p['I'],
								'mrf' => $p['J'],
								'landing_cost' => $p['K'],
								'brand_id' => $p['L'],
								'category_id' => $p['M'],
								'item_type_id' => $p['N'],
								'selling_price' => $p['O'],
								'discount_amount' => $p['P'],
								'start_date' => $p['Q'],
								'account_number' => $p['R'],
								'end_date' => $p['S'],
								'tax_id' => $p['T'],
								'tax_area_id' => $p['U'],
								'location' => $p['V'],
									
								// what do you want here?
						);
						$this->load->database();
						$this->load->model('itemxlsimport_model');
						$this->itemxlsimport_model->savedata($p['A'],$p['B'],$p['C'], $p['D'],$p['E'],$p['F'],$p['G'],$p['H'],$p['I'],$p['J'],$p['K'],$p['L'],$p['M'],$p['N'],$p['O'],$p['P'],$p['Q'],$p['R'],$p['S'],$p['T'],$p['U'],$p['V']);
							
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
								'code' => $p['B'],
								'barcode' => $p['C'],
								'category_id' => $p['D'],
								'branch_id' => $p['E'],
								'supplier_id' => $p['F'],
								'name' => $p['G'],
								'description' => $p['H'],
								'cost_price' => $p['I'],
								'mrf' => $p['J'],
								'landing_cost' => $p['K'],
								'brand_id' => $p['L'],
								'category_id' => $p['M'],
								'item_type_id' => $p['N'],
								'selling_price' => $p['O'],
								'discount_amount' => $p['P'],
								'start_date' => $p['Q'],
								'account_number' => $p['R'],
								'end_date' => $p['S'],
								'tax_id' => $p['T'],
								'tax_area_id' => $p['U'],
								'location' => $p['V'],
									
								// what do you want here?
						);
						$this->load->database();
						$this->load->model('itemxlsimport_model');
						$this->itemxlsimport_model->savedata($p['A'],$p['B'],$p['C'], $p['D'],$p['E'],$p['F'],$p['G'],$p['H'],$p['I'],$p['J'],$p['K'],$p['L'],$p['M'],$p['N'],$p['O'],$p['P'],$p['Q'],$p['R'],$p['S'],$p['T'],$p['U'],$p['V']);
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
								'code' => $p['B'],
								'barcode' => $p['C'],
								'category_id' => $p['D'],
								'branch_id' => $p['E'],
								'supplier_id' => $p['F'],
								'name' => $p['G'],
								'description' => $p['H'],
								'cost_price' => $p['I'],
								'mrf' => $p['J'],
								'landing_cost' => $p['K'],
								'brand_id' => $p['L'],
								'category_id' => $p['M'],
								'item_type_id' => $p['N'],
								'selling_price' => $p['O'],
								'discount_amount' => $p['P'],
								'start_date' => $p['Q'],
								'account_number' => $p['R'],
								'end_date' => $p['S'],
								'tax_id' => $p['T'],
								'tax_area_id' => $p['U'],
								'location' => $p['V'],
									
								// what do you want here?
						);
						$this->load->database();
						$this->load->model('itemxlsimport_model');
						$this->itemxlsimport_model->savedata($p['A'],$p['B'],$p['C'], $p['D'],$p['E'],$p['F'],$p['G'],$p['H'],$p['I'],$p['J'],$p['K'],$p['L'],$p['M'],$p['N'],$p['O'],$p['P'],$p['Q'],$p['R'],$p['S'],$p['T'],$p['U'],$p['V']);
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
								'code' => $p['B'],
								'barcode' => $p['C'],
								'category_id' => $p['D'],
								'branch_id' => $p['E'],
								'supplier_id' => $p['F'],
								'name' => $p['G'],
								'description' => $p['H'],
								'cost_price' => $p['I'],
								'mrf' => $p['J'],
								'landing_cost' => $p['K'],
								'brand_id' => $p['L'],
								'category_id' => $p['M'],
								'item_type_id' => $p['N'],
								'selling_price' => $p['O'],
								'discount_amount' => $p['P'],
								'start_date' => $p['Q'],
								'account_number' => $p['R'],
								'end_date' => $p['S'],
								'tax_id' => $p['T'],
								'tax_area_id' => $p['U'],
								'location' => $p['V'],
									
								// what do you want here?
						);
						$this->load->database();
						$this->load->model('itemxlsimport_model');
						$this->itemxlsimport_model->savedata($p['A'],$p['B'],$p['C'], $p['D'],$p['E'],$p['F'],$p['G'],$p['H'],$p['I'],$p['J'],$p['K'],$p['L'],$p['M'],$p['N'],$p['O'],$p['P'],$p['Q'],$p['R'],$p['S'],$p['T'],$p['U'],$p['V']);
					}}
					break;
		}}}}