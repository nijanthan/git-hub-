<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); if($_SESSION['Setting']['Branch']==1){
echo $links; 
 echo form_open('branchCI/branch_details');
    
    
if($count!=0){
     
foreach ($row as $erow){
   
?>


<table >
    
    
    <tr><td><input type="checkbox" name="mycheck[]" value="<?php echo $erow->id ?>" /><td style="width: 100px"><?php echo $erow->store_name ; ?>
        </td><td  style="width: 100px"><?php echo $erow->store_phone  ?></td><td  style="width: 150px"><?php echo $erow->store_fax  ?></td>
        <td style="width: 100px"><?php echo $erow->store_place ?></td><td  style="width: 100px">
            
           
        </td>
        <td style="width: 100px"><a href="<?php echo base_url() ?>index.php/branchCI/edit_branch_details/<?php echo $erow->id ?>"><?php echo $this->lang->line('edit') ?></a><td><td style="width: 100px"><a href="<?php echo base_url() ?>index.php/branchCI/delete_branch/<?php echo $erow->id ?>"><?php echo $this->lang->line('delete') ?></a></td>
    
    </tr>
    <?php ?>
</table>
<?php }}


?>  
<tb><input type="submit" name="delete_all" value="<?php echo $this->lang->line('delete') ?>"></td><tb><input type="submit" name="Add_branch" value="<?php echo $this->lang->line('branch_add') ?>"></td><td><?php echo form_submit('BacktoHome',$this->lang->line('back_to_home')) ?></td>
     <?php echo form_close(); }else{
         redirect('home');
     }
?> 