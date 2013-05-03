<?php 
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
    <?php echo form_open('employees/upadate_employee_details')?>
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
    <tr><td><?php echo form_label('Department')?></td><td><input type="text" name="branch" value="<?php echo $erow->group ?>"> </td></tr>
    <tr><td><?php echo form_label('Employee Id')?></td><td><input type="text" name="employee_id" value="<?php echo $erow->emp_id ?>"> </td></tr>
    <tr><td><?php echo form_label('Password')?></td><td><input type="text" name="password" value="<?php echo $erow->password ?>"> </td></tr>
    <tr><td><?php echo form_label('Photo')?></td><td><img src="<?php echo base_url();?>employees/<?php if($file_name=="null"){ echo $erow->image;}else{echo $file_name;}?>"><input type="hidden" name="image_name" value="<?php if($file_name=='null'){ echo $erow->image;}else{echo $file_name;} ?>" </td></tr>
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