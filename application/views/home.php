<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!isset($_SESSION['Uid'])){
    redirect('userlogin');
}else{
//echo form_open();
echo "its working";
echo $_SESSION['Uid'];
}
?>
