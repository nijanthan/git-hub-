<?php
$q = strtolower($_GET["q"]);
if (!$q) return;
  $this->load->model('purchase');
           

$value=  $this->purchase->get_selected_item($q,$_SESSION['Bid']);

$data=$value[0];
$dis=$value[1];
$id=$value[2];
$cost=$value[3];
$sell=$value[4];

   
	    echo '<ul>'."\n";
	    for($i=0;$i<count($data);$i++)
	    {
		echo "$data[$i]|$dis[$i]\n";
	}

?>