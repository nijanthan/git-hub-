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
		url: "http://localhost/PointOfSale/index.php/employees/edit_department/"+jibi,
		cache: false			
		
 });
}
function branchAjaxCall(value){
    var jibi=value;
	$.ajax({
            
		type: "post",
		url: "http://localhost/PointOfSale/index.php/employees/edit_branch/"+jibi,
		cache: false			
		
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
    <tr><td><?php echo form_label($this->lang->line('first_name'))?> </td><td><input type="text" name="first_name" value="<?php echo $erow->first_name ?>"> </td></tr>
    <tr><td><?php echo form_label($this->lang->line('last_name'))?></td><td><input type="text" name="last_name" value="<?php echo $erow->last_name ?>"> </td></tr>
    <tr><td><?php echo form_label($this->lang->line('sex'))?></td><td><select name="sex"><option name="male" value="Male" <?php if($erow->sex=='Male') {?> selected <?php }?>>Male</option><option name="Female" value="FeMale"<?php if($erow->sex=='FeMale'){ ?>selected<?php }?>>Female</option></select></td></tr>
    <tr><td><?php echo form_label($this->lang->line('age'))?></td><td><input type="text" name="age" value="<?php echo $erow->age ?>"></td></tr>
     
     <tr><td><?php echo form_label($this->lang->line('address'))?></td><td><input type="text" name="address" value="<?php echo $erow->address ?>"> </td></tr>
    <tr><td><?php echo form_label($this->lang->line('city'))?></td><td><input type="text" name="city" value="<?php echo $erow->city ?>"> </td></tr>
    <tr><td><?php echo form_label($this->lang->line('state'))?></td><td><input type="text" name="state" value="<?php echo $erow->state ?>"> </td></tr>
    <tr><td><?php echo form_label($this->lang->line('zip'))?></td><td><input type="text" name="zip" value="<?php echo $erow->zip ?>"> </td></tr>
    <tr><td><?php echo form_label($this->lang->line('country'))?></td><td><input type="text" name="country" value="<?php echo $erow->country ?>"> </td></tr>
    <tr><td><?php echo form_label($this->lang->line('email'))?></td><td><input type="text" name="email" value="<?php echo $erow->email ?>"> </td></tr>
    <tr><td><?php echo form_label($this->lang->line('phone'))?></td><td><input type="text" name="phone" value="<?php echo $erow->phone ?>" maxlength="13"> </td></tr>
    <tr><td><?php echo form_label($this->lang->line('date_of'))?></td><td><input type="text" id="datepicker" name="dob" value="<?php echo date('n/j/Y', strtotime('+0 year, +0 days',$erow->dob));   ?>"> </td></tr>
   
    <tr><td><?php echo form_label($this->lang->line('department'))?></td><td>
<table><tr><td>
        <?php foreach ($depa as $my_depa) ?>  
          
<select multiple size="7" name="FromLB" style="width:150">
  <?php $j=0;
  while($j<count($depa)) {
                
               
                   ?><option name="<?php foreach ($all_depa as $all_d){ if($depa[$j]==$all_d->dep_name) echo $all_d->id; }?>" 
                           value="<?php foreach ($all_depa as $all_d){ if($depa[$j]==$all_d->dep_name) echo $all_d->id;} ?>"> 
                       <?php    foreach ($all_depa as $all_d){ if($depa[$j]==$all_d->dep_name) echo $all_d->dep_name;}?></option>                
                           
                         
                   
                      
           
           
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
     <?php foreach ($selected_depart as $serow){ ?>
    <option name="<?php echo $serow->depart_id  ?>" value="<?php echo $serow->depart_id  ?>"> <?php echo $serow->depart_name   ?></option>
    <?php }?>
    
</select>
    
    <label name="ToLB"></label>
</td></tr></table>
        </td></tr><tr><td><?php echo form_label($this->lang->line('branch'))?></td><td>
    <table><tr><td>
<select multiple size="7" name="FromLJ" style="width:150">
    <?php $j=0;
  while($j<count($all_branch)) {
                
                ?><option name="<?php foreach ($branch as $all_d){ if($all_branch[$j]==$all_d->store_name) echo $all_d->id; }?>" 
                           value="<?php foreach ($branch as $all_d){ if($all_branch[$j]==$all_d->store_name) echo $all_d->id;} ?>"> 
                       <?php    foreach ($branch as $all_d){ if($all_branch[$j]==$all_d->store_name) echo $all_d->store_name;}?></option>                
              
                   
                      
           
           
        <?php  
        $j++;
        } 
        ?>

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
    <?php foreach ($selected_branch as $se_branch) {?>
    
     <option name="<?php echo $se_branch->branch_id   ?>" value="<?php echo$se_branch->branch_id  ?>"> <?php echo $se_branch->branch_name   ?></option>
    <?php }?>
</select>
</td></tr></table></td></tr>
    
   
    <tr><td><?php echo form_label($this->lang->line('user_name'))?></td><td><input type="text" name="employee_id" value="<?php echo $erow->user_id ?>"> </td></tr>
    <tr><td><?php echo form_label($this->lang->line('photo'))?></td><td><img src="<?php echo base_url();?>uploads/<?php if($file_name=="null"){ echo $erow->image;}else{echo $file_name;}?>"><input type="hidden" name="image_name" value="<?php if($file_name=='null'){ echo $erow->image;}else{echo $file_name;} ?>" </td></tr>
    <tr><td><?php echo form_submit('UPDATE',$this->lang->line('update')) ?></td> 
       
        
        <?php echo form_close(); 
    echo form_open('employees/cancel')?>
        <td><?php echo form_submit('Cancel',$this->lang->line('cancel')) ?></td>
    </tr> 
        
        <?php echo form_close();
    
    
}?>
    <?php echo $error;
$id= $erow->id?>
<?php echo form_open_multipart('employees/do_upload/'."$id");?>
<input type="file" name="userfile" size="50" /><input type="submit" value="<?php $this->lang->line('photo') ?>" /></form>
    
</table>
    <?php echo validation_errors(); ?>
</body>
</html>
 