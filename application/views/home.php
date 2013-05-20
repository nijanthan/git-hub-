<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION['Uid'])){
    redirect('userlogin');
}else{ 
echo form_open('home/home_main');
?><h1>POS HOME</h1><td><?php echo form_submit('logout',$this->lang->line('logout'));?></td>
<table><tr><td style="width: 200"><?php echo form_label($this->lang->line('employee')) ?></td><td><?php echo form_label($this->lang->line('item')) ?></td><td><?php echo form_label($this->lang->line('department')) ?></td></tr>
    <tr><td><?php echo form_submit('Employees',$this->lang->line('employee'))?></td><td><?php echo form_submit('Items',$this->lang->line('item'));?></td><td><?php echo form_submit('department',$this->lang->line('department'));?></td></tr>
    
</table>
<?php

echo form_close();
}
?>
