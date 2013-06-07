
<style>
    .myrow{
        border-width: 1px;
        
    }
    .myrow td{
        border: none;
    }
    .data{
        list-style: none;
    }
    .data li{
        width: 12%;
         float:left;
       
    }
    .labeled{
        list-style: none;
    }
    
    .labeled li{
        width: 12%;
        float: left;
    }
     .labeleded{
        list-style: none;
    }
    
    .labeleded li{
        width: 12%;
        float: left;
    }
    .labeled input{
        width: 80px;
    }
</style>
<script>
function addTextTag(txt)
{
document.getElementById("text_tag_input").value+=txt;
}
function removeTextTag(e,id)
{
	var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8 && unicode!=46){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57)
{
var strng=document.getElementById(id).value;
title=document.getElementById(id).title;
document.getElementById(id).value=strng.replace(strng,title);
}
}
}
function removeElement(parentDiv, childDiv){
     if (childDiv == parentDiv) {
          alert("The parent div cannot be removed.");
     }
     else if (document.getElementById(childDiv)) {     
          var child = document.getElementById(childDiv);
          var parent = document.getElementById(parentDiv);
          parent.removeChild(child);
     }
     else {
          alert("Child div has already been removed or does not exist.");
          return false;
     }
}
function disableEnterKey(e){   
var key;
    if(window.event){
    key = window.event.keyCode;
    } else {
    key = e.which;     
    }
    if(key == 13){
    return false;

    } else {
      
    return true;
    }
    
} 


</script>

    <script type="text/javascript" src="<?php echo base_url();?>src/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>src/js/simpleAutoComplete.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/css/simpleAutoComplete.css" />
    <script type="text/javascript">
        function get_mag(but){             
                        $("#"+but+"").remove();
 
        }
	$(document).ready(function()
	{
	    $('#supplier').simpleAutoComplete('http://localhost/PointOfSale/index.php/purchase_main/get_selected_supplier',{}, get_supplier);
           
        });
	
	function get_supplier( par )
	{
             
	    $("#id_estado").val( par[0] );
           name=par[1] ;
           discri=par[0];          
           item=par[2];
        
           if(document.getElementById(item)){          
               alert('this item is already added in this supplier');
              document.getElementById("supplier").value="";
           }else{
              
           // $('#yourTableId').append("<div id="+item+"><ul   class=data  ><li><input type=hidden name=itemsid[] value="+item+" style=width: 80px> <input type=text value="+name+" disabled style=width: 80px > </li><li ><input type=text value="+discri+" disabled style=width: 80px > </li><li ><input type=text name=quty[] title=0 id="+item+"5 value=0 onkeyup=removeTextTag(event,"+item+"5) style=width: 80px > </li><li ><input type=text value="+cost+" title="+cost+" id="+item+"6 name=cost[] onkeyup=removeTextTag(event,"+item+"6)style=width: 80px  > </li><li ><input type=text value="+sell+"  name=price[] title="+sell+" id="+item+"7 onkeyup=removeTextTag(event,"+item+"7) style=width: 80px  > </li><li ><input type=text name=disco[] value=0 title=0 id="+item+"8  onkeyup=removeTextTag(event,"+item+"8) style=width: 80px ></li><li><input type=checkbox name="+item+" <?php echo set_checkbox("+iteme+", '1'); ?> style=width: 80px ></li><li ><input type=button value=X name=send  onclick=get_mag("+item+") ><input type=hidden name=items[] value="+item+" ></li></ul></div>");	         
           document.getElementById('name').value=discri;
           document.getElementById('supplierid').value=item;
             //document.getElementById("supplier").value="";                        
	    }
	}
function get_item_details(item){
	
        $(document).ready(function()
	{
	     $('#'+item).simpleAutoComplete('http://localhost/PointOfSale/index.php/purchase_main/get_selected_item',{}, get_items);

        });

        function get_items( par )
	{
             
	   document.getElementById('descri').value= par[0];  
           alert(par[2]);
            // document.getElementById('descri').class=par[1];
        }    
        }
  function myFunction(id)
{
    var itm=document.getElementById("item_deatils1");
    var cln=itm.cloneNode(true);
    document.getElementById("item_deatils2").appendChild(cln);
    document.getElementById(id).id=id+"w";
    itemid=document.getElementById('id_list').value;
    document.getElementById(itemid).value=document.getElementById('item_id2').value;
    document.getElementById('item_id2').value="";
    document.getElementById(itemid).id=itemid+"1";
    document.getElementById('id_list').value=itemid+"1";
    
    dis=document.getElementById('dis_list').value;
    document.getElementById(dis).value=document.getElementById('descri').value;
    document.getElementById(dis).id=dis+"1";
    document.getElementById('dis_list').value=dis+"1";
    document.getElementById('descri').value="";
    
    quty=document.getElementById('quty_list').value;
    document.getElementById(quty).value=document.getElementById('quty').value;
    document.getElementById(quty).id=quty+"1";
    document.getElementById('quty_list').value=quty+"1";
    document.getElementById('quty').value="";
    
    cost=document.getElementById('cost_list').value;
    document.getElementById(cost).value=document.getElementById('cost').value;
    document.getElementById(cost).id=cost+"1";
    document.getElementById('cost_list').value=cost+"1";
    document.getElementById('cost').value="";
    
    sell=document.getElementById('sell_list').value;
    document.getElementById(sell).value=document.getElementById('sell').value;
    document.getElementById(sell).id=cost+"1";
    document.getElementById('sell_list').value=cost+"1";
    document.getElementById('sell').value="";
  
}  
        function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8 && unicode!=46){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57)

return false 
}
}

    </script>
  </head>
  <body>
    
	 
      <div style="margin-left:100px;"><table>
              <form action="supplier_vs_items/save_items" method="post" id="form">
	  
              <table>
            <tr><td><?php echo form_label($this->lang->line('supplier code'))?></td>
                <td><input type="text" id="supplier"  name="estado" onKeyPress="return disableEnterKey(event)" autocomplete="off" style="width: 100px" /></td>
                <td><?php echo form_label($this->lang->line('exp_date'))?></td><td><input type="text" name="expdate" style="width: 100px"></td>
                <td><?php echo form_label($this->lang->line('podate'))?></td><td><input type="text" name="podate" style="width: 100px"></td>
                <td><?php echo form_label($this->lang->line('disamount'))?></td><td><input type="text" name="date" style="width: 100px"></td>
                <td><?php echo form_label($this->lang->line('Round off Amount'))?></td><td><input type="text" name="date" style="width: 100px"></td>
            </tr>
            <tr><td><?php echo form_label($this->lang->line('supplier name'))?></td><td>
                    <input type="text" id="name" name="estado" autocomplete="off" disabled style="width: 100px"/>
                    <input type="hidden"   name="supplier"> </td>
            <td><?php echo form_label($this->lang->line('pono'))?></td><td><input type="text" name="pono" style="width: 100px"></td>
             <td><?php echo form_label($this->lang->line('discount'))?></td><td><input type="text" name="date" style="width: 100px"></td>
             <td><?php echo form_label($this->lang->line('Freight'))?></td><td><input type="text" name="date" style="width: 100px"></td>
            </tr>
              </table><input type="hidden" id="id_list" value="item_id">
              <input type="hidden" id="id_list" value="item_id">
              <input type="hidden" id="dis_list" value="descri1">
              <input type="hidden" id="quty_list" value="quty1">
              <input type="hidden" id="cost_list" value="cost1">
              <input type="hidden" id="sell_list" value="sell1">
              
                            
              
	<ul class="labeled">
            <li> <label>Item Code</label> </li><li> description  </li><li><label>Quty</label> </li><li><label>Cost</label></li><li><label>selling price</label></li><li><label>Remove</label></li></ul>
                  </br></br>
                  <table>
          
         <tr><td><ul class="labeleded" id="item_deatils3"><table> 
                         <tr><td><input type="text" name="code" id="item_id2"  onkeypress="get_item_details(this.id) ; return disableEnterKey(event)"  style="width: 100px"    autocomplete="off" ></td><td><input type="text" name="discri" id="descri" style="width: 100px" ></td><td><input type="text" id="quty" name="quty[]" onKeyPress="return numbersonly(event)" style="width: 100px" ></td><td><input type="text" name="cost[]" id="cost" onKeyPress="return numbersonly(event)" style="width: 100px"></td><td><input type="text" name="sell[[]" id="sell" onKeyPress="return numbersonly(event)" style="width: 100px"></td><td><input type="button" value="X" id="item_id1" onclick="myFunction(this.id)" style="width: 100px"></li></tr>
           </table> </ul></td></tr>
         <tr><td> <ul class="labeleded" id="item_deatils2">
              
          </ul></td></tr>
       <tr><td style="visibility: hidden"><ul class="labeleded" id="item_deatils1"><table> 
                       <tr ><td><input type="text" name="code" id="item_id"  style="width: 100px"  onkeypress="get_item_details(this.id) ; return disableEnterKey(event)"   autocomplete="off" ></td><td><input type="text" name="discri" id="descri1" style="width: 100px" ></td><td><input type="text" name="quty[]" id="quty1" onKeyPress="return numbersonly(event)" style="width: 100px" ></td><td><input type="text" name="cost[]" id="cost1"  onKeyPress="return numbersonly(event)" style="width: 100px"></td><td><input type="text" name="sell[[]" id="sell1" onKeyPress="return numbersonly(event)" style="width: 100px"></td><td><input type="button" value="X" name="sell[]" style="width: 100px"></li></tr>
           </table> </ul></td></tr>
           
                  </table>
           
               
           <div id="yourTableId" border="1" class="myrow" >
                
          <tr><td> <?php echo form_submit('save',$this->lang->line('save')); ?> <?php echo form_submit('cancel',$this->lang->line('cancel')); ?></td></tr>
             
 <?php echo form_close();?>
      </div>
      </div>
    
  </body>
</html>