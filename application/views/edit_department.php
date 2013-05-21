<?php if($_SESSION['Depa_per']['edit']==1){ 
    echo form_open('departmentCI/update_department');
     foreach ($row as $drow){
         echo form_label($this->lang->line('department')). form_input('department',$drow->dep_name);
         echo form_submit('update',$this->lang->line('update'));
         echo form_hidden('id',$drow->id);
         echo form_submit('cancel',$this->lang->line('cancel'));
     }
    
}else{
    redirect('departmentCI');
}
?>
