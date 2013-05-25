<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION['Uid'])){
    redirect('userlogin');
}else{ 
echo form_open('home/home_main');
?><h1>POS HOME</h1><td><?php echo form_submit('logout',$this->lang->line('logout'));?></td>
<table><tr><td style="width: 200"><?php echo form_label($this->lang->line('pos_users')) ?></td><td><?php echo form_label($this->lang->line('item')) ?></td><td><?php if($_SESSION['Setting']['Depart']==1){ echo form_label($this->lang->line('user_groups')); }?></td><td><?php if($_SESSION['Setting']['Branch']==1)  { echo form_label($this->lang->line('branch')); }?></td>
        <td><?php echo form_label($this->lang->line('sales')) ?></td><td><?php echo form_label($this->lang->line('Suppliers')) ?></td><td><?php echo form_label($this->lang->line('customers')) ?></td></tr>
    <tr><td><?php echo form_submit('pos_users',$this->lang->line('pos_users'))?></td><td><?php echo form_submit('Items',$this->lang->line('item'));?></td><td><?php if($_SESSION['Setting']['Depart']==1){ echo form_submit('user_groups',$this->lang->line('user_groups'));}?></td><td><?php if($_SESSION['Setting']['Branch']==1) { echo form_submit('branch',$this->lang->line('branch')); }?></td>
    <td><?php echo form_submit('sales',$this->lang->line('sales'))?></td><td><?php echo form_submit('suppliers',$this->lang->line('Suppliers'))?></td><td><?php echo form_submit('customers',$this->lang->line('customers'))?></td></tr>
    
</table>
<?php

echo form_close();
}
?>
