<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); if($branch_settings!=0){
?>

<script language="javascript"> 

function branch(value){
    var jibi=value;
  
	$.ajax({
            
		type: "post",
		url: "http://localhost/PointOfSale/index.php/home/set_branchs/"+jibi
					
		
        });
        alert('Language is Changed To '+value);
         window.location.reload(true);

        
}

function set_branch(){

var lang = document.getElementById("user_branchs").value;
 
   branch(lang);

}

</script>
<form action="">
<select name="branch"  id="user_branchs">
<?php foreach ($row as $brow){ ?>
    <option name="<?php echo $brow->branch_name; ?>" value="<?php echo $brow->branch_name; ?>" onClick="set_branch(this.form.branch)"><?php echo $brow->branch_name; ?></option>
<?php } ?>
    </select>
    <?php echo form_close(); 
    
    
    echo $_SESSION['user_branch']; }?>