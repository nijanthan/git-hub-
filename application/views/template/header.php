<html>    
<head>
<script language="javascript"> 

function ajaxsave(tbTo){ 
var arrjibi="" ; var arrTo = new Array(); 

 var Students;

            var x = document.getElementById("ToLB");
            for (var i = 0; i < x.options.length; i++) {
                if (x.options[i].selected == true) {
                    Students=x.options[i].value;
                }
            }
            alert(Students);
 alert(arrjibi);
 
 //makeAjaxCall(arrjibi);

 
}
function makeAjaxCall(value){
    var jibi=value;
	$.ajax({
            
		type: "post",
		url: "http://localhost/PointOfSale/index.php/employees/edit_department/"+jibi,
		cache: false			
		
 });
}

</script>



<body>




    <form>


          

</td>
<td align="center" valign="middle">
<input type="button" onClick="ajaxsave(this.form.ToLB)" 
value="->"><br />
<input type="button" onClick="ajaxsave(this.form.ToLB)" 
value="<-">
</td>


<td>
   
<select multiple size="7" name="ToLB" style="width:150">
    
  
    <option name="english" value="english">English</option>
      <option name="malayalam" value="malayalam">Malayalam</option>
</select>
    
 
    
</form>
        
    </tr> 
        
     
 
  

    
</table>
   
</body>
</html>
 