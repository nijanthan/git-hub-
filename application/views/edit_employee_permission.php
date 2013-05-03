<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
foreach ($edrow as $drow){
    echo $drow->first_name."<br>";
    //echo $drow->image;
    ?>
<img src="<?php echo base_url()?>uploads/<?php echo $drow->image ?>">
<?php
    
    
}


foreach ($erow as $eprow){
    $per=$eprow->permission;
}




?>

  </style>
</head>

<body>
    <br><br>
    <form>
        <table>
            <tr><td><label>ITEM PERMISSION</label> </br></br></td></tr>
           
            <?php foreach ($irow as $iprow){
     $num= $iprow->permission;
    
}
$last= $num%10;

$second= $num/10%10;

$first= $num/100%100;


?>
<tr><td><label>READ</label> </td>
    <td><input type="radio" name="read" value="001" <?php if($num!=000){ ?>checked<?php }?> > ON</td>
    <td><input type="radio" name="read" value="000" <?php if($num==000) { ?>checked<?php }?> > OFF</td>
</tr>
<tr><td><label>ADD</label> </td>
    <td><input type="radio" name="add" value="on" <?php if($second==1){ ?>checked<?php }?> > ON</td>
    <td><input type="radio" name="add" value="off" <?php if($second==0){ ?>checked<?php }?>> OFF</td>
</tr>
<tr><td><label>EDIT</label> </td>
    <td><input type="radio" name="edit" value="on"> ON</td>
    <td><input type="radio" name="edit" value="off" checked> OFF</td>
</tr>
<tr><td><label>DELETE</label> </td>
    <td><input type="radio" name="delete" value="on"> ON</td>
    <td><input type="radio" name="delete" value="off" checked> OFF</td>
</tr>

        </table>
    </form>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>