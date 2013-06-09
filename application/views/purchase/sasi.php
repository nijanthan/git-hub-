<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<title>jQuery Autocomplete Plugin</title>
<script type="text/javascript" src="<?php echo base_url(); ?>auto/lib/jquery.js"></script>
<script type='text/javascript' src='<?php echo base_url(); ?>auto/lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>auto/lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>auto/lib/thickbox-compressed.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>auto/jquery.autocomplete.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>auto/demo/localdata.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>auto/demo/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>auto/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>auto/lib/thickbox.css" />
	
<script type="text/javascript">
$().ready(function() {

	function log(event, data, formatted) {
		$("<li>").html( !data ? "No match!" : "Selected: " + formatted).appendTo("#result");
	}
	
	function formatItem(row) {
		return row[0] + " (<strong>id: " + row[1] + "</strong>)";
               
	}
	function formatResult(row) {
		return row[0].replace(/(<.+?>)/gi, '');
	}
	
	
	$("#suggest4").autocomplete('http://localhost/PointOfSale/index.php/purchase_main/get_new', {
		width: 300,
		multiple: true,
		matchContains: true,
		formatItem: formatItem,
		formatResult: formatResult
	});
        $("#suggest5").autocomplete('http://localhost/PointOfSale/index.php/purchase_main/get_new', {
		width: 300,
		multiple: true,
		matchContains: true,
		formatItem: formatItem,
		formatResult: formatResult
	});
	

	
	
	
	
	
	$("#suggest5").result(function(event, data, formatted) {
	document.getElementById('suggest5').value="";
                 document.getElementById('item_ided1').value=data[4];
	});
  
	$("#scrollChange").click(changeScrollHeight);
	
	
	
	$("#clear").click(function() {
		$(":input").unautocomplete();
	});
});




</script>
	
</head>

<body>

	
	
	
	


</body>
</html>
