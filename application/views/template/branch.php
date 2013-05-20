<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); if($branch_settings!=0){
?>
<script>
    function change_branch(){
        var jibi = document.getElementById("branch").value;
        alert(jibi);
    
     var xmlhttp;
        if (window.XMLHttpRequest)
        {
        xmlhttp=new XMLHttpRequest();
        }
        else
        {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
       
        xmlhttp.open("GET","<?php echo base_url() ?>index.php/posmain/change_user_branch/"+jibi,false);
        xmlhttp.send();
        }
</script>
<?php echo $_SESSION['jibi'];
echo form_open('home/change_branch') ?>
<select id="branch">
<?php foreach ($row as $brow){ 
   
    ?><option onclick="change_branch()" value="<?php echo $brow->branch_id ?>" ><?php echo $brow->branch_name ?></option>
    
   <?php } ?>
</select>
    <?php echo form_close(); 
}
   ?>