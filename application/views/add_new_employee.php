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

		
                <table><?php
                    $form =array('id'=>'form1',
                        'runat'=>'server',
                        'name'=>'combo_box');
     echo form_open_multipart('employees/add_employee_details/',$form);?>

<tr><td><?php echo form_label('First Name')?> </td><td><?php echo form_input('first_name',set_value('first_name'), 'id="first_name" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('Last Name')?></td><td><?php echo form_input('last_name',set_value('last_name'), 'id="llast_name" autofocus')?></td></tr>
    <tr><td><?php echo form_label('Sex')?></td><td><select name="sex"><option name="male" value="Male">Male</option><option name="Female" value="FeMale">Female</option></select></td></tr>
     <tr><td><?php echo form_label('Age')?></td><td><?php  echo form_input('age',set_value('age'), 'id="age" autofocus')?></td></tr>
     <tr><td><?php echo form_label('Address')?></td><td><?php echo form_input('address',set_value('address'), 'id="address" autofocus')?></td></tr>
    <tr><td><?php echo form_label('City')?></td><td><?php echo form_input('city',set_value('city'), 'id="city" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('State')?></td><td><?php echo form_input('state',set_value('state'), 'id="state" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('zip')?></td><td><?php echo form_input('zip',set_value('zip'), 'id="zip" autofocus')?></td></tr>
    <tr><td><?php echo form_label('country')?></td><td><?php echo form_input('country',set_value('country'), 'id="country" autofocus')?></td></tr>
    <tr><td><?php echo form_label('Email')?></td><td><?php echo form_input('email',set_value('email'), 'id="email" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('Phone')?></td><td><?php echo form_input('phone',set_value('phone'), 'id="phone" autofocus')?></td></tr>
    <tr><td><?php echo form_label('Date OF birth')?></td><td><?php echo form_input('dob',set_value('dob'), 'id="dob" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('Department')?></td><td>
<table><tr><td>
<select multiple size="7" name="FromLB" style="width:150">

            <?php foreach ($depa as $dep) {?>
           
           <option name="<?php echo $dep->id ?>" value="<?php echo $dep->id ?>"> <?php echo $dep->dep_name ?></option>
        <?php  }?>
           
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
    <?php foreach ($branch as $brow) {
          
           ?>   <option name="<?php echo $brow->id  ?>" value="<?php echo $brow->id  ?>" > <?php echo $brow->store_name  ?></option> 
          
        <?php  }?>

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
    <tr><td><?php echo form_label('Employee Id')?></td><td><?php echo form_input('employee_id',set_value('employee_id'), 'id="employee_id" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('Password')?></td><td><?php echo form_input('password',set_value('password'), 'id="password" autofocus')?></td></tr>
   <tr><td></td> 
       
   <td><input type="submit" name="Save" value="Save" >
          
        <?php echo form_submit('Cancel','Cancel') ?></td>
    </tr> 
        
        




    
</table>
    <?php form_close() ?>
    <?php //echo validation_errors(); ?>
   
                <script type="text/javascript" >
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '<?php echo base_url();?>index.php/employees/add_employee_image',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				//On completion clear the status
				status.text('');
				//Add uploaded file to list
				if(response==="success"){
					$('<li></li>').appendTo('#files').html('<img src="<?php echo base_url();?>uploads/'+file+'" alt="" /><br />'+file).addClass('success');
				} else{
					$('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
		
	});
</script>
                <div id="upload" ><span>Upload Photo<span></div><span id="status" ></span>
		
		<ul id="files" ></ul>

   



</form>
<?php echo validation_errors(); ?>
</body>
</html> 