<?php  if($_SESSION['Item_per']['add']==1){
    ?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
$(function() {
$( "#date_start_picker" ).datepicker();
$( "#date_end_picker" ).datepicker();
});

</script>
        <?php 
     echo form_open('items/update_item');
     echo "<table>";
     foreach ($irow as $it_row){
         echo form_hidden('id',$it_row->id);
     echo "<tr><td>"; echo form_label($this->lang->line('code'));echo "</td><td>";echo form_input('code',$it_row->code,'id="code" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('barcode'));echo "</td><td>";echo form_input('barcode',$it_row->barcode,'id="barcode" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('item_name'));echo "</td><td>";echo form_input('item_name',$it_row->name,'id="address1" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('description'));echo "</td><td>";echo form_textarea('description',$it_row->description,'id="description" autofocusm ');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('cost_price'));echo "</td><td>";echo form_input('cost_price',$it_row->cost_price,'id="cost_price" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('current_stock'));echo "</td><td>";echo form_input('stock',$it_row->current_stock,'id="stock" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('quantity'));echo "</td><td>";echo form_input('quantity',$it_row->quantity,'id="quantity" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('salling_price'));echo "</td><td>";echo form_input('salling_price',$it_row->salling_price,'id="salling_price" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('discount_amount'));echo "</td><td>";echo form_input('discount_amount',$it_row->discount_amount,'id="discount_amount" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('start_date'));echo "</td><td>";?><input type="text" name="start_date" id="date_start_picker" value="<?php echo date('n/j/Y', strtotime('+0 year, +0 days',$it_row->start_date ));   ?>"/><?php echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('end_date'));echo "</td><td>";?><input type="text" name="end_date" id="date_end_picker" value="<?php echo date('n/j/Y', strtotime('+0 year, +0 days',$it_row->end_date ));   ?>"><?php echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('tax1'));echo "</td><td>";echo form_input('tax1',$it_row->tax1,'id="tax1" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('tax2'));echo "</td><td>";echo form_input('tax2',$it_row->tax2,'id="tax2" autofocus');echo "</td></tr>";
      echo "<tr><td>"; echo form_label($this->lang->line('location'));echo "</td><td>";echo form_input('location',$it_row->location,'id="location" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('cate_name'));echo "</td><td>"; if(count($row)>0 ){ ?><select name="category" style="width:150"><?php foreach ($row as $c_row){        foreach ($crow as $irow){ if($c_row->category_id == $irow->id){   if($it_row->category_id ==$irow->id ){ ?>          <option name="<?php echo $irow->id  ?> " value="<?php echo $irow->id  ?>" selected="selected"> <?php echo $irow->category_name  ?> </option><?php      }else{?>   <option name="<?php echo $irow->id  ?> " value="<?php echo $irow->id  ?>"> <?php echo $irow->category_name  ?> </option><?php }}}}echo "</select>";?> <a href="<?php echo base_url() ?>index.php/items/add_new_category">Add Category</a> <?php }else{?> <a href="<?php echo base_url() ?>index.php/items/add_new_category">Add Category</a> <?php }  echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('cate_name'));echo "</td><td>"; if(count($srow)>0 ){ ?><select name="supplier" style="width:150"><?php foreach ($srow as $cs_row){     foreach ($sb_row as $csk_row){ if($cs_row->supplier_id == $csk_row->id){ if($it_row->supplier_id ==$csk_row->id ){ ?><option name="<?php echo $csk_row->id ?> "value="<?php echo $csk_row->id?> "selected="selected"> <?php echo $csk_row->company_name  ?> </option><?php }else{ ?><option name="<?php echo $csk_row->id ?> "value="<?php echo $csk_row->id?> "> <?php echo $csk_row->company_name  ?> </option><?php }}}}echo "</select>";?> <a href="<?php echo base_url() ?>index.php/items/add_supplier">Add supplier</a> <?php }else{?> <a href="<?php echo base_url() ?>index.php/items/add_supplier">Add Supplier</a> <?php }  echo "</td></tr>";
     echo "<tr><td>"; echo form_submit('save',$this->lang->line('save'));echo "</td><td>";echo form_submit('cancel',$this->lang->line('cancel')); echo "</td></tr>";
     }
     echo "</table>";
     echo form_close();
 }else{
     redirect('home');
 }
 echo validation_errors();
?>


