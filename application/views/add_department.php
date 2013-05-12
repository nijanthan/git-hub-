<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css" />

<script language="javascript"> 
function move(tbFrom, tbTo) 
{
    
 var arrFrom = new Array(); var arrTo = new Array(); 
 var arrLU = new Array();
 var i;
 for (i = 0; i < tbTo.options.length; i++) 
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
 
 no.text = arrTo[ii];

 tbTo[ii] = no;
 
 
 
 
}
}

function makeAjaxCall(value){
    var jibi=value;
	$.ajax({
            
		type: "post",
		url: "http://localhost/PointOfSale/index.php/employees/add_jibi/"+jibi,
		cache: false,				
		data: $('combo_box').serialize(),
		success: function(json){						
                }
 });
}
function branchAjaxCall(value){
    var jibi=value;
	$.ajax({
            
		type: "post",
		url: "http://localhost/PointOfSale/index.php/departmentCI/select_department/"+jibi,
		cache: false,				
		data: $('combo_box').serialize(),
		success: function(json){						
                }
 });
}
function ajaxsave(tbTo){
var arrjibi="" ; var arrTo = new Array(); 
var monish=".";
 var arrLU = new Array();
 var i;
 for (i = 0; i < tbTo.options.length; i++) 
 {
  arrLU[tbTo.options[i].text] = tbTo.options[i].value;
  arrTo[i] = tbTo.options[i].text;
 arrjibi=arrjibi+monish+tbTo.options[i].value;
 }
  makeAjaxCall(arrjibi);
}
function ajaxbranch(tbTo){
var arrjibi="" ; var arrTo = new Array(); 
var monish=".";
 var arrLU = new Array();
 var i;
 for (i = 0; i < tbTo.options.length; i++) 
 {
  arrLU[tbTo.options[i].text] = tbTo.options[i].value;
  arrTo[i] = tbTo.options[i].text;
 arrjibi=arrjibi+monish+tbTo.options[i].value;
 }
  branchAjaxCall(arrjibi);
}
</script>
<?php echo form_open('departmentCI/add_department') ;?>
<table><tr><td>
            
    <?php echo form_label($this->lang->line('department_name'));?></td><td><?php echo form_input('department_name',set_value('department_name'), 'id="department_name" autofocus')?></td>
    </tr>
<tr><td><?php echo form_label($this->lang->line('branch'))?></td><td>
  
<select multiple size="7" name="FromLJ" style="width:150">
    <?php foreach ($branch as $brow) {
          
           ?>   <option name="<?php echo $brow->id  ?>" value="<?php echo $brow->id  ?>" > <?php echo $brow->store_name  ?></option> 
          
        <?php  }?>
           

</select>
</td>
<td align="center" valign="middle">
<input type="button" onClick="move(this.form.FromLJ,this.form.ToLJ),ajaxbranch(this.form.ToLJ)" 
value="->"><br />
<input type="button" onClick="move(this.form.ToLJ,this.form.FromLJ),ajaxbranch(this.form.ToLJ)"
value="<-">
</td>
<td>
<select multiple size="7" name="ToLJ" style="width:150">
</select>
</td></tr></table>
<br><section class="main">
<table border="1"><tr><td>
<table>
<tr><td><label><?php echo $this->lang->line('item_read'); ?> </label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="item_read" value="0001"><label><i></i></label></div></td>
</tr>
<tr><td><label><?php echo $this->lang->line('item_add'); ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="item_add" value="0010" ><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('item_edit');?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="item_edit" value="0100"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('item_delete');  ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="item_delete" value="1000"><label><i></i></label></td>
</tr>
</table></td><td>
<table >
<tr><td><label><?php echo $this->lang->line('user_read'); ?> </label> </td>
    <td><div class="switch demo3" ><input type="checkbox" name="user_read"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('user_add'); ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="user_add"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('user_edit');?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="user_edit"><label><i></i></label></td>
</tr>
<tr><td><label><?php echo $this->lang->line('user_delete');  ?></label> </td>
    <td><div class="switch demo3" ><input type="checkbox"  name="user_delete"><label><i></i></label></td>
</tr>
</table></td></tr>
</table></section>

<?php echo form_submit('save',$this->lang->line('save'));
echo form_close() ?>