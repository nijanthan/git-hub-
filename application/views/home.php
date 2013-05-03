<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION['Uid'])){
    redirect('userlogin');
}else{
echo form_open('posmain/home');
?>

<?php

echo form_submit('Item','ITEM');
echo form_close();
}
?>
