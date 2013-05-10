<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?><table>
<?php foreach ($depa as $row) {
   
    ?>

    <tr><td><?php echo $row->dep_name ?></td><td><a href=""><?php echo $this->lang->line('edit')?></a></td><td><a href=""><?php echo $this->lang->line('edit_permission')?></a></td></tr>
<?php }?>

</table>