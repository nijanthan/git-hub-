<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION['Uid'])){
    redirect('userlogin');
}else{
echo form_open('posmain/home');
?><h1>POS HOME</h1><td><?php echo form_submit('logout','LOGOUT');?></td>
<table><tr><td style="width: 200"><?php echo form_label('Employees') ?></td><td><?php echo form_label('Items') ?></td></tr>
    <tr><td><?php echo form_submit('Employees','Employees');?></td><td><?php echo form_submit('Items','ITEMS');?></td></tr>
    
</table>
<?php

echo form_close();
}
?>
