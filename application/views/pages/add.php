
<center><h2><u>Add records</u></h2> 

<p><h5>Enter the details of the Image file to be stored in the database</h5>
</p>

<!-- Form input elements that gets required input from user -->

<? echo form_open('pages/input'); ?>
<table width="700px">
<tr>
<td>File Name:</td> 
<td><? echo form_input(array('name' => 'img_name', 'value' => set_value('img_name'), 'size' => '50')); ?></td>
<tr>
</tr>
<td>File Path:</td> 
<td><? echo form_input(array('name' => 'img_addr', 'value' => set_value('img_addr'), 'size' => '50')); ?></td>
</tr>
<tr>
<td>OnClick URL:</td> 
<td><? echo form_input(array('name' => 'img_url', 'value' => set_value('img_url'), 'size' => '50')); ?></td>
</tr>
</table>
<br />
<? echo form_submit('dbsubmit','Submit to DB');  ?>
<? echo form_close(); ?>
</center>
<font color="green"><?php echo $msg ?></font>




