<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

echo form_open('userlogin/login');?>
<table><tr><td>
<?php echo form_label('USER ID');?></td><td>
<?php echo form_input('username',set_value('username'), 'id="username" autofocus')?></td></tr><tr><td>
<?php echo form_label('PASSWORD');?></td><td>
<?php echo form_password('password',set_value('password'), 'id="password" autofocus');?></tr>
<tr><td><?php echo form_submit('login','LOGIN') ?></td></tr>

</table>
    <?php
   
echo form_close();


?><?php echo validation_errors(); ?>