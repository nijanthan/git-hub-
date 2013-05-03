<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
foreach ($edrow as $drow){
    echo $drow->first_name."<br>";
     $drow->image;
    ?>
<img src="<?php echo base_url()?>uploads/<?php echo $drow->image ?>">
<?php
    
    
}





?>



<body>
    <br><br>
    <form>
        <table>
            <tr><td><label>ITEM PERMISSION</label> </br></br></td></tr>
           
 <?php foreach ($irow as $iprow){
     $num= $iprow->permission;
    
}

 $read= $num%10;

 $add= $num/10%10;

 $edit= $num/100%10;

 $delete= $num/1000%10;

?>
            
<tr><td><label>READ</label> </td>
    <td><input type="radio" name="read" value="0001" <?php if($read==1){ ?>checked<?php }?> > ON</td>
    <td><input type="radio" name="read" value="0000" <?php if($read==0) { ?>checked<?php }?> > OFF</td>
</tr>
<tr><td><label>ADD</label> </td>
    <td><input type="radio" name="add" value="0010" <?php if($add==1){ ?>checked<?php }?> > ON</td>
    <td><input type="radio" name="add" value="0000" <?php if($add==0){ ?>checked<?php }?>> OFF</td>
</tr>
<tr><td><label>EDIT</label> </td>
    <td><input type="radio" name="edit" value="0100"<?php if($edit==1){ ?>checked<?php }?>> ON</td>
    <td><input type="radio" name="edit" value="0000" <?php if($edit==0){ ?>checked<?php }?>> OFF</td>
</tr>
<tr><td><label>DELETE</label> </td>
    <td><input type="radio" name="delete" value="1000" <?php if($delete==1 ){ ?>checked<?php }?>> ON</td>
    <td><input type="radio" name="delete" value="0000" <?php if($delete==0){ ?>checked<?php }?>> OFF</td>
</tr>

        </table>
        <table style="margin-left: 270px;margin-top: -145px">
            <tr><td><label>FOR EMPLOYEE PERMISSION</label> </br></br></td></tr>
           
 <?php foreach ($erow as $eprow){
    $per=$eprow->permission;
}



 $eread= $per%10;

 $eadd= $per/10%10;

 $eedit= $per/100%10;

 $edelete= $per/1000%10;

?>
            
<tr><td><label>READ</label> </td>
    <td><input type="radio" name="eread" value="0001" <?php if($eread==1){ ?>checked<?php }?> > ON</td>
    <td><input type="radio" name="eread" value="0000" <?php if($eread==0) { ?>checked<?php }?> > OFF</td>
</tr>
<tr><td><label>ADD</label> </td>
    <td><input type="radio" name="eadd" value="0010" <?php if($eadd==1){ ?>checked<?php }?> > ON</td>
    <td><input type="radio" name="eadd" value="0000" <?php if($eadd==0){ ?>checked<?php }?>> OFF</td>
</tr>
<tr><td><label>EDIT</label> </td>
    <td><input type="radio" name="eedit" value="0100"<?php if($eedit==1){ ?>checked<?php }?>> ON</td>
    <td><input type="radio" name="eedit" value="0000" <?php if($eedit==0){ ?>checked<?php }?>> OFF</td>
</tr>
<tr><td><label>DELETE</label> </td>
    <td><input type="radio" name="edelete" value="1000" <?php if($edelete==1 ){ ?>checked<?php }?>> ON</td>
    <td><input type="radio" name="edelete" value="0000" <?php if($edelete==0){ ?>checked<?php }?>> OFF</td>
</tr>

        </table>
    </form>
</body>
</html>

