<?php  if($_SESSION['Item_per']['add']==1){ ?>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
$(function() {
$( "#date_start_picker" ).datepicker();
$( "#date_end_picker" ).datepicker();
});

</script><?php
     echo form_open('items/add_new_item');
     echo "<table>";
     echo "<tr><td>"; echo form_label($this->lang->line('code'));echo "</td><td>";echo form_input('code',set_value('code'),'id="code" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('barcode'));echo "</td><td>";echo form_input('barcode',set_value('barcode'),'id="barcode" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('item_name'));echo "</td><td>";echo form_input('item_name',set_value('item_name'),'id="address1" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('description'));echo "</td><td>";echo form_textarea('description',set_value('description'),'id="description" autofocusm ');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('cost_price'));echo "</td><td>";echo form_input('cost_price',set_value('cost_price'),'id="cost_price" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('unit_price'));echo "</td><td>";echo form_input('unit_price',set_value('unit_price'),'id="unit_price" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('salling_price'));echo "</td><td>";echo form_input('salling_price',set_value('salling_price'),'id="salling_price" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('discount_amount'));echo "</td><td>";echo form_input('discount_amount',set_value('discount_amount'),'id="discount_amount" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('start_date'));echo "</td><td>";echo form_input('start_date',set_value('start_date'),'id="date_start_picker" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('end_date'));echo "</td><td>";echo form_input('end_date',set_value('end_date'),'id="date_end_picker" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('tax1'));echo "</td><td>";echo form_input('tax1',set_value('tax1'),'id="tax1" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('tax2'));echo "</td><td>";echo form_input('tax2',set_value('tax2'),'id="tax2" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('quantity'));echo "</td><td>";echo form_input('quantity',set_value('quantity'),'id="quantity" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('location'));echo "</td><td>";echo form_input('location',set_value('location'),'id="location" autofocus');echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('cate_name'));echo "</td><td>"; if(count($row)>0 ){ ?><select  style="width:150" name="category"><?php foreach ($row as $c_row){        foreach ($crow as $irow){ if($c_row->category_id == $irow->id){ ?><option name="<?php echo $irow->id  ?> " value="<?php echo $irow->id  ?>"> <?php echo $irow->category_name  ?> </option><?php }}}echo "</select>";?> <a href="<?php echo base_url() ?>index.php/items/add_new_category">Add Category</a> <?php }else{?> <a href="<?php echo base_url() ?>index.php/items/add_new_category">Add Category</a> <?php }  echo "</td></tr>";
     echo "<tr><td>"; echo form_label($this->lang->line('cate_name'));echo "</td><td>"; if(count($srow)>0 ){ ?><select style="width:150" name="supplier"  ><?php foreach ($srow as $cs_row){        foreach ($sb_row as $csk_row){ if($cs_row->supplier_id == $csk_row->id){ ?><option name="<?php echo $csk_row->id  ?>" value="<?php echo $csk_row->id  ?>"> <?php echo $csk_row->company_name  ?> </option><?php }}}echo "</select>";?> <a href="<?php echo base_url() ?>index.php/items/add_supplier">Add supplier</a> <?php }else{?> <a href="<?php echo base_url() ?>index.php/items/add_supplier">Add Supplier</a> <?php }  echo "</td></tr>";
     echo "<tr><td>"; echo form_submit('save',$this->lang->line('save'));echo "</td><td>";echo form_submit('cancel',$this->lang->line('cancel')); echo "</td></tr>";
     echo "</table>";
     echo form_close();
 }else{
     redirect('home');
 }
 echo validation_errors();
?>