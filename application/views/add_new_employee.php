<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

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

		
                <table>
    <?php echo form_open_multipart('employees/add_employee_details/');?>
   
    <tr><td><?php echo form_label('First Name')?> </td><td><?php echo form_input('first_name',set_value('first_name'), 'id="first_name" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('Last Name')?></td><td><?php echo form_input('last_name',set_value('last_name'), 'id="llast_name" autofocus')?></td></tr>
     <tr><td><?php echo form_label('Address')?></td><td><?php echo form_input('address',set_value('address'), 'id="address" autofocus')?></td></tr>
    <tr><td><?php echo form_label('City')?></td><td><?php echo form_input('city',set_value('city'), 'id="city" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('State')?></td><td><?php echo form_input('state',set_value('state'), 'id="state" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('zip')?></td><td><?php echo form_input('zip',set_value('zip'), 'id="zip" autofocus')?></td></tr>
    <tr><td><?php echo form_label('country')?></td><td><?php echo form_input('country',set_value('country'), 'id="country" autofocus')?></td></tr>
    <tr><td><?php echo form_label('Email')?></td><td><?php echo form_input('email',set_value('email'), 'id="email" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('Phone')?></td><td><?php echo form_input('phone',set_value('phone'), 'id="phone" autofocus')?></td></tr>
    <tr><td><?php echo form_label('Date OF birth')?></td><td><?php echo form_input('dob',set_value('dob'), 'id="dob" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('Department')?></td><td><?php echo form_input('branch',set_value('branch'), 'id="branch" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('Employee Id')?></td><td><?php echo form_input('employee_id',set_value('employee_id'), 'id="employee_id" autofocus')?> </td></tr>
    <tr><td><?php echo form_label('Password')?></td><td><?php echo form_input('password',set_value('password'), 'id="password" autofocus')?></td></tr>
   <tr><td><?php echo form_submit('Save','Save') ?></td> 
       
   
        <td><?php echo form_submit('Cancel','Cancel') ?></td>
    </tr> 
        
        




    
</table>
   
   
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
 <?php form_close() ?>
    <?php echo validation_errors(); ?>

</body>