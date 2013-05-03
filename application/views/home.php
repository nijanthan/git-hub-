<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION['Uid'])){
    redirect('login');
}else{
echo form_open();
}
?>
