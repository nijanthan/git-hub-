
<style>
    .myrow{
        border-width: 1px;
        
    }
    .myrow td{
        border: none;
    }
</style>


    
    <script type="text/javascript" src="<?php echo base_url();?>src/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>src/js/simpleAutoComplete.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/css/simpleAutoComplete.css" />
    <script type="text/javascript">
	$(document).ready(function()
	{
	    $('#estado_autocomplete').simpleAutoComplete('http://localhost/PointOfSale/index.php/supplier_vs_items/get_selected_item',{}, get_items);

        });
	
	function get_items( par )
	{
             
	    $("#id_estado").val( par[0] );
           name=par[1] ;
           discri=par[0];          
           item=par[2];
           sell=par[1];
           
          
          
           if(document.getElementById(item)){          
               alert('this item is already added in this supplier');
              document.getElementById("estado_autocomplete").value="";
           }else{
          
          
            $('#yourTableId').append("<tr><td><input type=text value="+name+" id="+item+"  disabled> </td><td><input type=text value="+discri+" disabled> </td> </td><td><input type=text name=quty[]  > </td><td><input type=text  name=cost[]  > </td><td><input type=text value="+sell+" name=price[]  > </td><td><input type=text  value="+item+"><td></tr>").val('jibi');
	                 
             
             document.getElementById("estado_autocomplete").value="";
             
            
	    }
	}

	function cidadeCallback( par )
	{
                       $('#yourTableId').append('<tr><td>new row</td></tr>');
	    $("#id_cidade").val( par[0] );
	    $("#uf2").val( par[1] );
	}
	
    </script>
  </head>
  <body>
     
	 
      <div style="margin-left:100px;">
	  <?php echo form_open('supplier_vs_items/save_items') ?>
	
          <table id="yourTableId" border="1" class="myrow" >
              <tr><td style="width: 100" ><label>Item Code</label> </td><td style="width: 150">description   </td><td style="width: 150">Quty </td><td style="width: 150">Cost</td><td style="width: 150">selling price</td><td style="width:150">Discount.</td><tr>
              <?php if(count($row)>0){ foreach ($row as $irow){ ?>
                 
              <?php }}else{  ?>
                 <tr><td><input type="text" id="estado_autocomplete" name="estado" autocomplete="off"  /></td></tr>  
             <?php }?>
          
          <?php echo form_submit('save',$this->lang->line('save')); ?>
         <?php echo form_close();?>
      </div>
      
  </body>
</html>