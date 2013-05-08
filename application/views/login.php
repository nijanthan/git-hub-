

<?php echo form_open('userlogin/chnagelanguage');?>
    <select name="language" >
        <option name="malayalam" value="malayalam" >Malayalam</option>
        <option name="english" value="english">English</option>
        <input type="submit" name="change" value="Chnage"  onClick="chnagelanguage($this.form.valueOf(language))">
    </select>
</form>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

echo form_open('userlogin/login');?>
<table><tr><td>
            
<?php echo form_label($this->lang->line('user_name'));?></td><td>
<?php echo form_input('username',set_value('username'), 'id="username" autofocus')?></td></tr><tr><td>
<?php echo form_label($this->lang->line('password'));?></td><td>
<?php echo form_password('password',set_value('password'), 'id="password" autofocus');?></tr>
<tr><td><?php echo form_submit('login',$this->lang->line('login')) ?></td></tr>

</table>
    <?php
echo form_close();


?><?php echo validation_errors(); ?>