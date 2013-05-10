<html >
<head>
  <meta charset="utf-8">
  <title>POS</title>
<head>

<script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.3.2.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/ajaxupload.3.5.js" ></script>
<script language="javascript"> 

function makeAjaxCall1(value){
    var jibi=value;
  
	$.ajax({
            
		type: "post",
		url: "http://localhost/PointOfSale/index.php/userlogin/setlanguage/"+jibi,
		cache: false			
		
        });
        alert('Language is Changed');
         window.location.reload(true);

        
}

function ajaxsave1(tbTo){
var arrjibi="" ; var arrTo = new Array(); 
var monish=".";
var lang = document.getElementById("chnagelang").value;
 var arrLU = new Array();
 var i;
 for (i = 0; i < tbTo.options.length; i++) 
 {
  arrLU[tbTo.options[i].text] = tbTo.options[i].value;
  arrTo[i] = tbTo.options[i].text;
 arrjibi=arrjibi+monish+tbTo.options[i].value;
 }
    makeAjaxCall1(lang);

}

</script>

</head>
<body> <form action="">  
<select  name="ToLB" id="chnagelang" style="width:150">
    
   <option name="english" value="english" onClick="ajaxsave1(this.form.ToLB)">English</option>
      <option name="malayalam" value="malayalam" onClick="ajaxsave1(this.form.ToLB)">Malayalam</option>
</select> 
</form>
        
