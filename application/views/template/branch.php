<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); if($branch_settings!=0){
?>
<?php echo form_open('home/change_branch') ?>

<?php foreach ($row as $brow){ 
    echo form_submit($brow->branch_id ,$brow->branch_name);
    ?>
    
   <?php } ?>
  
    <?php echo form_close(); 
}
   ?>