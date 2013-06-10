<?php
class excelmodel extends  CI_Model{
	function __construct(){
		parent::__construct();
		
	}
	function savedata($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$aa){
		
		//$this->load->database();
		echo $a."<br>".$b;
		
		$data22=array('id'=>$a,'first_name'=>$b,'title'=>$c,'last_name'=>$d,'address1'=>$e,'address2'=>$f,'bday'=>$g,'mday'=>$h,'city'=>$i,'state'=>$j,'zip'=>$k,'country'=>$l,'category_id'=>$m,'comments'=>$n,'company_name'=>$o,'email'=>$p,'phone'=>$q,'account_number'=>$r,'bank_name'=>$s,'bank_location'=>$t,'website'=>$u,'cst'=>$v,'gst'=>$w,'tax_no'=>$x,'created_by'=>$y,'active_status'=>$z,'delete_status'=>$aa);
		echo 'id';
		print_r($data22);
		$this->load->database();
		
		$this->db->insert('customers',$data22);

	}
}
?>