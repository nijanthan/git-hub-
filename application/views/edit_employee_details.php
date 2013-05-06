<html>    
<head>
<script language="javascript"> 
function move(tbFrom, tbTo) 
{
    
 var arrFrom = new Array(); var arrTo = new Array(); 
 var arrLU = new Array();
 var i;
 for (i = 0; i < tbTo.options.length; i++) 
 {
  arrLU[tbTo.options[i].text] = tbTo.options[i].value;
  arrTo[i] = tbTo.options[i].text;
 }
 var fLength = 0;
 var tLength = arrTo.length;
 for(i = 0; i < tbFrom.options.length; i++) 
 {
  arrLU[tbFrom.options[i].text] = tbFrom.options[i].value;
  if (tbFrom.options[i].selected && tbFrom.options[i].value != "") 
  {
   arrTo[tLength] = tbFrom.options[i].text;
   tLength++;
  }
  else 
  {
   arrFrom[fLength] = tbFrom.options[i].text;
   fLength++;
  }
}

tbFrom.length = 0;
tbTo.length = 0;
var ii;

for(ii = 0; ii < arrFrom.length; ii++) 
{
  var no = new Option();
  no.value = arrLU[arrFrom[ii]];
  no.text = arrFrom[ii];
  tbFrom[ii] = no;
  
}

for(ii = 0; ii < arrTo.length; ii++) 
{
 var no = new Option();
 no.value = arrLU[arrTo[ii]];
 
 no.text = arrTo[ii];

 tbTo[ii] = no;
 
 
 
 
}
}

function makeAjaxCall(value){
    var jibi=value;
	$.ajax({
            
		type: "post",
		url: "http://localhost/PointOfSale/index.php/employees/add_jibi/"+jibi,
		cache: false,				
		data: $('combo_box').serialize(),
		success: function(json){						
                }
 });
}
function branchAjaxCall(value){
    var jibi=value;
	$.ajax({
            
		type: "post",
		url: "http://localhost/PointOfSale/index.php/employees/add_branch/"+jibi,
		cache: false,				
		data: $('combo_box').serialize(),
		success: function(json){						
                }
 });
}
function ajaxsave(tbTo){
var arrjibi="" ; var arrTo = new Array(); 
var monish=".";
 var arrLU = new Array();
 var i;
 for (i = 0; i < tbTo.options.length; i++) 
 {
  arrLU[tbTo.options[i].text] = tbTo.options[i].value;
  arrTo[i] = tbTo.options[i].text;
 arrjibi=arrjibi+monish+tbTo.options[i].value;
 }
  makeAjaxCall(arrjibi);
}
function ajaxbranch(tbTo){
var arrjibi="" ; var arrTo = new Array(); 
var monish=".";
 var arrLU = new Array();
 var i;
 for (i = 0; i < tbTo.options.length; i++) 
 {
  arrLU[tbTo.options[i].text] = tbTo.options[i].value;
  arrTo[i] = tbTo.options[i].text;
 arrjibi=arrjibi+monish+tbTo.options[i].value;
 }
  branchAjaxCall(arrjibi);
}
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.3.2.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/ajaxupload.3.5.js" ></script>

<link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" />
<script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>

<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>

</head>
<body>

	



<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
foreach ($row as $erow){
   
  





?>



<link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css" />
<script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui.js"></script>

<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
</head>
<body>




<table>
    <?php $form =array('id'=>'form1',
                        'runat'=>'server');
    echo form_open('employees/upadate_employee_details',$form)?>
    <input type="hidden" name="id" value="<?php echo $erow->id?>">
    <tr><td><?php echo form_label('First Name')?> </td><td><input type="text" name="first_name" value="<?php echo $erow->first_name ?>"> </td></tr>
    <tr><td><?php echo form_label('Last Name')?></td><td><input type="text" name="last_name" value="<?php echo $erow->last_name ?>"> </td></tr>
     <tr><td><?php echo form_label('Address')?></td><td><input type="text" name="address" value="<?php echo $erow->address ?>"> </td></tr>
    <tr><td><?php echo form_label('City')?></td><td><input type="text" name="city" value="<?php echo $erow->city ?>"> </td></tr>
    <tr><td><?php echo form_label('State')?></td><td><input type="text" name="state" value="<?php echo $erow->state ?>"> </td></tr>
    <tr><td><?php echo form_label('zip')?></td><td><input type="text" name="zip" value="<?php echo $erow->zip ?>"> </td></tr>
    <tr><td><?php echo form_label('country')?></td><td><input type="text" name="country" value="<?php echo $erow->country ?>"> </td></tr>
    <tr><td><?php echo form_label('Email')?></td><td><input type="text" name="email" value="<?php echo $erow->email ?>"> </td></tr>
    <tr><td><?php echo form_label('Phone')?></td><td><input type="text" name="phone" value="<?php echo $erow->phone ?>" maxlength="13"> </td></tr>
    <tr><td><?php echo form_label('Date OF birth')?></td><td><input type="text" id="datepicker" name="dob" value="<?php echo date('n/j/Y', strtotime('+0 year, +0 days',$erow->dob));   ?>"> </td></tr>
   
    <tr><td><?php echo form_label('Department')?></td><td>
<table><tr><td>
          
          
<select multiple size="7" name="FromLB" style="width:150">
  <?php $j=0;
  while($j<count($depa)) {
                
               
                   ?><option name="<?php echo $depa[$j] ?>" value="<?php echo $depa[$j] ?>"> <?php echo $depa[$j] ?></option>
                      
           
           
        <?php  
        $j++;
        } 
        ?>
  
</select>
</td>
<td align="center" valign="middle">
<input type="button" onClick="move(this.form.FromLB,this.form.ToLB),ajaxsave(this.form.ToLB)" 
value="->"><br />
<input type="button" onClick="move(this.form.ToLB,this.form.FromLB),ajaxsave(this.form.ToLB)" 
value="<-">
</td>


<td>
<select multiple size="7" name="ToLB" style="width:150">
    
    
</select>
    
    <label name="ToLB"></label>
</td></tr></table>
        </td></tr><tr><td><?php echo form_label('Branch')?></td><td>
    <table><tr><td>
<select multiple size="7" name="FromLJ" style="width:150">
    <?php $h=0;
          while($h<  count($branch)){
           ?>   <option name="<?php echo $branch[$h]  ?>" value="<?php echo $branch[$h]  ?>" > <?php echo $branch[$h]  ?></option> 
          
        <?php $h++; }?>

</select>
</td>
<td align="center" valign="middle">
<input type="button" onClick="move(this.form.FromLJ,this.form.ToLJ),ajaxbranch(this.form.ToLJ)" 
value="->"><br />
<input type="button" onClick="move(this.form.ToLJ,this.form.FromLJ),ajaxbranch(this.form.ToLJ)"
value="<-">
</td>
<td>
<select multiple size="7" name="ToLJ" style="width:150">
</select>
</td></tr></table></td></tr>
    
   
    <tr><td><?php echo form_label('Employee Id')?></td><td><input type="text" name="employee_id" value="<?php echo $erow->user_id ?>"> </td></tr>
    <tr><td><?php echo form_label('Password')?></td><td><input type="text" name="password" value="<?php echo $erow->password ?>"> </td></tr>
    <tr><td><?php echo form_label('Photo')?></td><td><img src="<?php echo base_url();?>uploads/<?php if($file_name=="null"){ echo $erow->image;}else{echo $file_name;}?>"><input type="hidden" name="image_name" value="<?php if($file_name=='null'){ echo $erow->image;}else{echo $file_name;} ?>" </td></tr>
    <tr><td><?php echo form_submit('UPDATE','update') ?></td> 
       
        
        <?php echo form_close(); 
    echo form_open('employees/cancel')?>
        <td><?php echo form_submit('Cancel','cancel') ?></td>
    </tr> 
        
        <?php echo form_close();
    
    
}?>
    <?php echo $error;
$id= $erow->id?>
<?php echo form_open_multipart('employees/do_upload/'."$id");?>
<input type="file" name="userfile" size="50" /><input type="submit" value="upload" /></form>
    
</table>
    <?php echo validation_errors(); ?>
</body>
</html>
 