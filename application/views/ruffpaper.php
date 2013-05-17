<html>
<head>
<script>
function select_branch(tbTo)
{
    
 var arrLU="";
    for (i = 0;i < tbTo.options.length; i++) 
 {
  arrLU =arrLU+" "+tbTo.options[i].value;
 
           
 }
 
 
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
xmlhttp.open("GET","<?php echo base_url() ?>index.php/departmentselecting/add/"+jibi+"/"+arrLU,false);

xmlhttp.send();
document.getElementById("myDiv").innerHTML=xmlhttp.responseText;



}
function move(tbFrom, tbTo) 
{      
 var arrFrom = new Array(); var arrTo = new Array(); 
 var arrLU = new Array();
 var i;
 for (i = 0;i < tbTo.options.length; i++) 
 {
  arrLU[tbTo.options[i].text] = tbTo.options[i].value;
  arrTo[i] = tbTo.options[i].text;
 }
 var fLength = 0;
 var tLength = arrTo.length;
 for(i = 0; i < tbFrom.options.length; i++) 
 {
  arrLU[tbFrom.options[i].text] = tbFrom.options[i].value;
  if (tbFrom.options[i].selected && tbFrom.options[i].value != "") 
  {
   arrTo[tLength] = tbFrom.options[i].text;
   tLength++;
  }
  else 
  {
   arrFrom[fLength] = tbFrom.options[i].text;
   fLength++;
  }
}

tbFrom.length = 0;
tbTo.length = 0;
var ii;

for(ii = 0; ii < arrFrom.length; ii++) 
{
  var no = new Option();
  no.value = arrLU[arrFrom[ii]];
  no.text = arrFrom[ii];
  
  tbFrom[ii] = no;
  
}

for(ii = 0; ii < arrTo.length; ii++) 
{
 var no = new Option();
 no.value = arrLU[arrTo[ii]];

  
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                xmlhttp=new XMLHttpRequest();
                }
                else
                {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("GET","<?php echo base_url() ?>index.php/departmentselecting/get_department_branch/"+arrLU[arrTo[ii]],false);
                xmlhttp.send();
              no.text = xmlhttp.responseText;

 tbTo[ii] = no; 
}
}
function backmove(tbFrom, tbTo) 
{
 var jibi = document.getElementById("chnagelang").value;
 var arrFrom = new Array(); var arrTo = new Array(); 
 var arrLU = new Array();
 var i;
 for (i = 0;i < tbTo.options.length; i++) 
 {
  arrLU[tbTo.options[i].text] = tbTo.options[i].value;
  arrTo[i] = tbTo.options[i].text;
 }
 var fLength = 0;
 var tLength = arrTo.length;
 for(i = 0; i < tbFrom.options.length; i++) 
 {
  arrLU[tbFrom.options[i].text] = tbFrom.options[i].value;
  if (tbFrom.options[i].selected && tbFrom.options[i].value != "") 
  {
   arrTo[tLength] = tbFrom.options[i].text;
   tLength++;
  }
  else 
  {
   arrFrom[fLength] = tbFrom.options[i].text;
   fLength++;
  }
}

tbFrom.length = 0;
tbTo.length = 0;
var ii;

for(ii = 0; ii < arrFrom.length; ii++) 
{
  var no = new Option();
  no.value = arrLU[arrFrom[ii]];
  no.text = arrFrom[ii];
  
  tbFrom[ii] = no;
  
}

for(ii = 0; ii < arrTo.length; ii++) 
{
 var no = new Option();
 no.value = arrLU[arrTo[ii]]; 
  
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                xmlhttp=new XMLHttpRequest();
                }
                else
                {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.open("GET","<?php echo base_url() ?>index.php/departmentselecting/set_department_branch/"+jibi+"/"+arrLU[arrTo[ii]],false);
                xmlhttp.send();
                
              no.text = xmlhttp.responseText;

 tbTo[ii] = no; 
}
}
function get_selected(tbTo){
var arrLU="";
    for (i = 0;i <tbTo.options.length; i++) 
 {
  arrLU =arrLU+" "+tbTo.options[i].value;
 }
 
        var xmlhttp;
        if (window.XMLHttpRequest)
        {
        xmlhttp=new XMLHttpRequest();
        }
        else
        {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        if(arrLU!=""){
        xmlhttp.open("GET","<?php echo base_url() ?>index.php/departmentselecting/get_selected_department/"+arrLU,false);

        xmlhttp.send();
      document.getElementById("mine").innerHTML=xmlhttp.responseText;
 
           }else{
                document.getElementById("mine").innerHTML="";
           }
 

}
</script>
</head>
<body>


    <form action="<?php echo base_url()?>index.php/departmentselecting/save" method="post">
<select id="chnagelang" name="FromLJ" style="width:150">
    <?php foreach ($branch as $brow) {
          
        ?> <option name="<?php echo $brow->branch_id ?>" value="<?php echo $brow->branch_id ?>" onClick="select_branch(this.form.lang)" > <?php echo $brow->branch_name ?></option>
<?php }?>

</select>
<select multiple id="myDiv" name="ToLJ" style="width: 150">
</select>
<input type="button" onClick="move(this.form.ToLJ,this.form.lang),get_selected(this.form.lang)" 
value="->">
<input type="button" onClick="backmove(this.form.lang,this.form.ToLJ),get_selected(this.form.lang)" 
value="<-">
<select multiple  name="lang" size="7" name="ToLJed" style="width: 250">

</select>
<p id="mine" ></p>
<?php  echo form_submit('save','save'); ?>
</form>

</body>