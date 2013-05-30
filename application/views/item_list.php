<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); echo $links; 
?><table style="width: 550px">
    
<?php  echo  form_open('items/items_details'); 
if($count!=0){
      if($_SESSION['admin']==2){?><table >
          <?php foreach ($row as $erow){
        
              ?>
          
          <tr><td><input type="checkbox" name="mycheck[]" value="<?php echo $erow->id ?>" /><td style="width: 100px"><?php echo $erow->code ; ?>
        </td><td  style="width: 100px"><?php echo $erow->name  ?></td><td  style="width: 150px"><?php echo $erow->brand_id  ?></td>
        <td style="width: 100px"><?php echo $erow->selling_price ?></td><td  style="width: 100px">
            
            <?php foreach ($branch as $user_b){
            if($user_b->item_id==$erow->id){
                echo $user_b->branch_name;
            }
                    
            }?>
        
        </td> <td style="width: 150;margin-left: 150px"><?php if($erow->active_status==0){ ?><a href="<?php echo base_url() ?>index.php/items/to_deactivate_item/<?php echo $erow->id ?>">Deactivate</a> <?php } else{ ?><a href="<?php echo base_url() ?>index.php/items/to_activate_item/<?php echo $erow->id ?>"> Activate</a> <?php } ?></td>
        <td style="width: 100px"><a href="<?php echo base_url() ?>index.php/items/edit_item_details/<?php echo $erow->id ?>"><?php echo $this->lang->line('edit') ?></a><td>
        <td><a href=" <?php echo base_url() ?>index.php/items/delete_item_details_in_admin/<?php echo $erow->id ?>"><?php echo $this->lang->line('delete') ?></a></td>
    </tr><?php }?></table>
    <tb><?php echo form_submit('activate',$this->lang->line('activate'))?></td><tb><?php echo form_submit('deactivate',$this->lang->line('deactivate'))?></td><td><input type="submit" name="delete_item_for_admin" value="<?php echo $this->lang->line('delete') ?>"></td><tb><input type="submit" name="Add_item" value="<?php echo $this->lang->line('add_new_item') ?>"></td><td><?php echo form_submit('add_category',$this->lang->line('add_category')) ?> </td><td><?php echo form_submit('BacktoHome',$this->lang->line('back_to_home')) ?></td>
  
     <?php }else{?><table ><?php
foreach ($row as $b_row){
          foreach ($urow as $erow){ if($b_row->item_id==$erow->id){
   
?>



    
    
    <tr><td><input type="checkbox" name="mycheck[]" value="<?php echo $erow->id ?>" /><td style="width: 100px"><?php echo $erow->code ?>
        </td><td  style="width: 100px"><?php echo $erow->name ?></td><td  style="width: 150px">
            <?php foreach ($brands as $item_brands){
            if($item_brands->id==$erow->brand_id ){
                echo $item_brands->name;
            }
                  
            }?></td>
        <td style="width: 100px"><?php echo $erow->selling_price ?></td><td  style="width: 100px">
            
           <?php foreach ($branch as $user_b){
            if($user_b->item_id==$erow->id){
                echo $user_b->branch_name;
            }
                    
            }?>
        
        </td>
        <td style="width: 100px"><a href="<?php echo base_url() ?>index.php/items/edit_item_details/<?php echo $erow->id ?>"><?php echo $this->lang->line('edit') ?></a><td><td style="width: 100px"><a href="<?php echo base_url() ?>index.php/items/delete_item/<?php echo $erow->id ?>"><?php echo $this->lang->line('delete') ?></a></td>
    
    </tr>
    <?php ?>

<?php }}}?></table> 
<td><?php echo form_submit('add_category',$this->lang->line('add_category')) ?> </td><tb><input type="submit" name="delete_all" value="<?php echo $this->lang->line('delete') ?>"></td><tb><input type="submit" name="Add_item" value="<?php echo $this->lang->line('add_new_item') ?>"></td><td><?php echo form_submit('BacktoHome',$this->lang->line('back_to_home')) ?></td>
  
<?php }
}else{   if($_SESSION['admin']==2){ ?>
    <td><?php echo form_submit('add_category',$this->lang->line('add_category')) ?> </td><td><input type="submit" name="Add_item" value="<?php echo $this->lang->line('add_new_item') ?>"></td><td><?php echo form_submit('BacktoHome',$this->lang->line('back_to_home')) ?></td>
 
<?php }else{?>
    <td><?php echo form_submit('add_category',$this->lang->line('add_category')) ?> </td><td><input type="submit" name="Add_item" value="<?php echo $this->lang->line('add_new_item') ?>"></td><td><?php echo form_submit('BacktoHome',$this->lang->line('back_to_home')) ?></td>
 
<?php }

}


?>  
  <?php   echo form_close() ?> 