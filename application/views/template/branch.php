<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<select>
<?php foreach ($row as $brow){ ?>
    <option name="<?php echo $brow->branch_name; ?>" value="<?php echo $brow->branch_name; ?>"><?php echo $brow->branch_name; ?></option>
<?php } ?>
    </select>