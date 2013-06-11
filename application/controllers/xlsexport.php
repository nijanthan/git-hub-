<?php
class xlsexport extends CI_Controller {

	function __construct()
	{	parent::__construct();
	$this->load->library('session');
	$this->load->helper('form');
	$this->load->helper('url');
	}
	function  index()
	{

//id,first_name,title,last_name,address1,address2,bday,mday,city,state,zip,country,category_id,comments,company_name,email,phone,account_number,bank_name,bank_location,website,cst,gst,tax_no,created_by,active_status,delete_status');


		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Single');
		$this->excel->getActiveSheet()->setCellValue('A1', 'id');
		$this->excel->getActiveSheet()->setCellValue('B1', 'first_name');
		$this->excel->getActiveSheet()->setCellValue('C1', 'title');
		$this->excel->getActiveSheet()->setCellValue('D1', 'last_name');
		$this->excel->getActiveSheet()->setCellValue('E1', 'address1');
		$this->excel->getActiveSheet()->setCellValue('F1', 'address2');
		$this->excel->getActiveSheet()->setCellValue('G1', 'bday');
		$this->excel->getActiveSheet()->setCellValue('H1', 'mday');
		$this->excel->getActiveSheet()->setCellValue('I1', 'city');
		$this->excel->getActiveSheet()->setCellValue('J1', 'state');
		$this->excel->getActiveSheet()->setCellValue('k1', 'zip');
		$this->excel->getActiveSheet()->setCellValue('L1', 'country');
		$this->excel->getActiveSheet()->setCellValue('M1', 'country_id');
		$this->excel->getActiveSheet()->setCellValue('N1', 'comments');
		$this->excel->getActiveSheet()->setCellValue('O1', 'company_name');
		$this->excel->getActiveSheet()->setCellValue('P1', 'email');
		$this->excel->getActiveSheet()->setCellValue('Q1', 'phone');
		$this->excel->getActiveSheet()->setCellValue('R1', 'account_number');
		$this->excel->getActiveSheet()->setCellValue('S1', 'bank_name');
		$this->excel->getActiveSheet()->setCellValue('T1', 'bank_location');
		$this->excel->getActiveSheet()->setCellValue('U1', 'website');
		$this->excel->getActiveSheet()->setCellValue('V1', 'cst');
		$this->excel->getActiveSheet()->setCellValue('W1', 'gst');
		$this->excel->getActiveSheet()->setCellValue('X1', 'tax_no');
		$this->excel->getActiveSheet()->setCellValue('Y1', 'created_by');
		$this->excel->getActiveSheet()->setCellValue('Z1', 'active_status');
		$this->excel->getActiveSheet()->setCellValue('AA1', 'delete_status');
		$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);
		$this->load->model('xls_model');
		$single_items = $this->xls_model->get_all_volunteers();
//	print_r($single_items);
		if($single_items) {
			$count = count($single_items);
			for($i = 0; $i < $count; $i++) {
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2 ,strtoupper($single_items[$i]->id));
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2 ,strtoupper($single_items[$i]->first_name));
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $i+2 ,$single_items[$i]->title);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $i+2 ,$single_items[$i]->last_name);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $i+2 ,$single_items[$i]->address1);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, $i+2 ,$single_items[$i]->address2);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, $i+2 ,$single_items[$i]->bday);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, $i+2 ,$single_items[$i]->mday);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, $i+2 ,$single_items[$i]->city);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(9, $i+2 ,$single_items[$i]->state);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(10, $i+2 ,$single_items[$i]->zip);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(11, $i+2 ,$single_items[$i]->country);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(12, $i+2 ,$single_items[$i]->category_id);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(13, $i+2 ,$single_items[$i]->comments);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(14, $i+2 ,$single_items[$i]->company_name);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(15, $i+2 ,$single_items[$i]->email);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(16, $i+2 ,$single_items[$i]->phone);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(17, $i+2 ,$single_items[$i]->account_number);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(18, $i+2 ,$single_items[$i]->bank_name);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(19, $i+2 ,$single_items[$i]->bank_location);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(20, $i+2 ,$single_items[$i]->website);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(21, $i+2 ,$single_items[$i]->cst);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(22, $i+2 ,$single_items[$i]->gst);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(23, $i+2 ,$single_items[$i]->tax_no);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(24, $i+2 ,$single_items[$i]->created_by);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(25, $i+2 ,$single_items[$i]->active_status);
				$this->excel->getActiveSheet()->setCellValueByColumnAndRow(26, $i+2 ,$single_items[$i]->delete_status);
			}
			$filename='nijan.xls';
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			$objWriter->save('php://output');
		}
	}}
