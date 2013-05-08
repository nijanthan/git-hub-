<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Point Of Sales</title>
  
        
</head>
<body>
    <?php 
    echo form_open('userlogin/chnage_language');?>
    <select name="language" id="ListBox">
        <option name="malayalam" value="malayalam">Malayalam</option>
        <option name="english" value="english">English</option>
    </select>           
  
    <input type="submit" name="change" value="Chnage" >
      <?php echo form_close();
    ?>
