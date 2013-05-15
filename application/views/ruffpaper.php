<html>
<head>
<script>
function select_branch()
{
    
    
var jibi = document.getElementById("chnagelang").value;
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.open("GET","<?php echo base_url() ?>/index.php/ruff/add/"+jibi,false);
xmlhttp.send();
document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
}


function select_department(tbTo){   
     
     var jibi= document.getElementById("chnagelang").value;
     var annan = document.getElementById("myDiv").value;
     
     
   if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  
  }
else
  {
      
  
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }


var arrjibi="" ; var arrTo = new Array(); 

 var id;
 var i;
 for (i = 0; i < tbTo.options.length; i++) 
 {
 id=tbTo.options[i].value;
 arrjibi=tbTo.options[i].text;
 
 }
 
xmlhttp.open("GET","<?php echo base_url() ?>index.php/ruff/my_department/"+jibi+"/"+annan+"/"+id+"/"+arrjibi,false);
xmlhttp.send();
document.getElementById("lang").innerHTML=xmlhttp.responseText;

}


</script>
</head>
<body>


    <form>
<select id="chnagelang" name="FromLJ" style="width:150">
    <?php foreach ($branch as $brow) {
          
        ?>   <option name="<?php echo $brow->branch_id   ?>" value="<?php echo $brow->branch_id   ?>" onClick="select_branch()" > <?php echo $brow->branch_name  ?></option> 
          
        <?php  }?>

</select>
    <select  multiple id="myDiv" name="ToLJ"  style="width: 150">
   
</select>
    <input type="button" onClick="select_department(this.form.lang)" 
value="->">
<input type="button" onClick="move(this.form.ToLJed,this.form.ToLJ)" 
value="<-">
<select  multiple id="lang" name="ToLJed"  style="width: 550">
   
</select>
    </form>

</body>
