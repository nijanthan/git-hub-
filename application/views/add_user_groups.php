<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css" />


<?php echo form_open('user_groupsCI/add_user_groups') ;?>
<table><tr><td>
            
    <?php echo form_label($this->lang->line('user_groups_name'));?></td><td><?php echo form_input('user_groups_name',set_value('user_groups_name'), 'id="user_groups_name" autofocus')?></td>
    </tr>
</table>
<br><section class="main">
<table border="1"><tr><td>
<table>
<tr><td><label><?php echo $this->lang->line('item_read'); ?> </label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="item_read" value="0001"><label><i></i></label></div></td>
</tr>
<tr><td><label><?php echo $this->lang->line('item_add'); ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="item_add" value="0010" ><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('item_edit');?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="item_edit" value="0100"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('item_delete');  ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="item_delete" value="1000"><label><i></i></label></td>
</tr>
</table></td><td>
<table >
<tr><td><label><?php echo $this->lang->line('user_read'); ?> </label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="user_read" value="0001"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('user_add'); ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="user_add"  value="0010"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('user_edit');?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="user_edit" value="0100"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('user_delete');  ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="user_delete" value="1000"><label><i></i></label></td>
</tr>
</table></td><td>
<table >
<tr><td><label><?php echo $this->lang->line('branch_read'); ?> </label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="branch_read" value="0001"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('branch_add'); ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="branch_add" value="0010"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('branch_edit');?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="branch_edit" value="0100"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('branch_delete');  ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="branch_delete" value="1000"><label><i></i></label></td>
</tr>
</table></td><td>
<table >
<tr><td><label><?php echo $this->lang->line('depa_read'); ?> </label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="depa_read" value="0001"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('depa_add'); ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="depa_add" value="0010"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('depa_edit');?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="depa_edit" value="0100"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('depa_delete');  ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="depa_delete" value="1000"><label><i></i></label></td>
</tr>
</table></td></tr>
</table></section>

<?php echo form_submit('save',$this->lang->line('save'));echo form_submit('cancel',$this->lang->line('cancel'));
echo form_close() ?>
<?php echo validation_errors(); ?>