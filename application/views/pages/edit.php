
<font color="green"><?php echo $msg ?></font>
<div >
<h4>Records from the DB</h4> 
<h5>Use the 'Edit' or 'Delete' buttons to modify or remove the records respectively </h5>
<center>

<!-- Gets the table contents from the database and displays in every page -->


<div style="border:1px solid black;margin:1 px;">
<table width="990 px">
<tr>
<td width="15%"><h4>Image Name</h4></td>
<td width="44%"><h4>Image Path</h4></td>
<td width="35%"><h4>OnClick URL</h4></td>
<td width="4%"></td>
<td width="2%"></td>
</tr>
</table>
</div>


<?php foreach ($images as $images_item): ?>
<div style="border:1px solid black;margin:1 px;">
<table width="990 px">
<tr>
<td width="15%"><?php echo $images_item['img_name'] ?></td>
<td width="44%"><?php echo $images_item['img_addr'] ?></td>
<td width="35%"><?php echo $images_item['img_url'] ?></td>

<td width="4%"><? echo form_open('pages/edit_load'); ?>
<? echo form_hidden('img_id', $images_item['img_id']); ?>
<? echo '<input type="submit" name="edit_sub" value="Edit" />'; ?>
<? echo form_close(); ?></td>

<td width="2%"><? echo form_open('pages/delete'); ?>
<? echo form_hidden('img_id', $images_item['img_id']); ?>
<? echo '<input type="submit" name="delete_sub" onClick="return confirm(\'Are you sure you want to delete this entry?\');" value="Delete" />'; ?>
<? echo form_close(); ?></td>
</tr>
</table> 

</div>
<?php endforeach ?>

</table>
</center>



</div>
