<?php
echo form_open('taxes_ci/add_new_taxe');
echo "<tr><td>";echo form_label($this->lang->line('tax'));echo "</td><td>"; echo form_input('rate',set_value('rate'),'id=rate autofocus');echo "</td></tr>";

echo form_close();
?>
