<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); echo $links; 
?><table style="width: 550px">
    
<?php  echo  form_open('departmentCI/department');
if($count>0){ 
    if($_SESSION['admin']==2){ foreach ($depa as $drow) {?>
    <tr><td><input type="checkbox" name="mycheck[]" value="<?php echo $drow->id ?>" /><?php  echo $drow->dep_name ; ?></td><td><?php if($drow->active_status==0){ ?><a href="<?php echo base_url() ?>index.php/departmentCI/to_deactivate_department/<?php echo $drow->id ?>">De Active</a> <?php } else{ ?><a href="<?php echo base_url() ?>index.php/departmentCI/to_activate_department/<?php echo $drow->id ?>"> Active</a> <?php } ?></td><td><a href="<?php echo base_url() ?>index.php/departmentCI/edit_department/<?php echo $drow->id ?>"><?php echo $this->lang->line('edit')?></a></td><td><a href="<?php echo base_url() ?>index.php/departmentCI/department_delete/<?php echo $drow->id?>"><?php echo $this->lang->line('delete')?></a></td><td ><a href="<?php echo base_url() ?>index.php/departmentCI/edit_department_permission/<?php echo $drow->id ?>"><?php echo $this->lang->line('edit_permission')?></a></td></tr>
    <?php } }
    else{
foreach ($depa as $row) {
   foreach ($all_depa as $drow){ 
       if($drow->id==$row->department_id){
    ?>

    <tr><td><input type="checkbox" name="mycheck[]" value="<?php echo $drow->id ?>" /><?php  echo $drow->dep_name ;	 ?></td><td><a href="<?php echo base_url() ?>index.php/departmentCI/edit_department/<?php echo $drow->id ?>"><?php echo $this->lang->line('edit')?></a></td><td><a href="<?php echo base_url() ?>index.php/departmentCI/department_delete/<?php echo $drow->id?>"><?php echo $this->lang->line('delete')?></a></td><td ><a href="<?php echo base_url() ?>index.php/departmentCI/edit_department_permission/<?php echo $drow->id ?>"><?php echo $this->lang->line('edit_permission')?></a></td></tr>
<?php }}}}?>
    <tr><td><?php echo form_submit('delete',$this->lang->line('delete')) ?></td><td><?php echo form_submit('add',$this->lang->line('add')) ?></td><td><?php echo form_submit('back',$this->lang->line('back_to_home')) ?></td></tr>
    <?php

echo form_open();}
?>

</table>