<html>
<head>
	<title><?php echo $title ?> - Image Admin</title>


<!-- Holds the script for the transition effects of the slideshow -->
<script type='text/javascript' src='http://localhost/assignment/jquery-1.6.2.js'></script>
<link rel="stylesheet" type="text/css" href="http://localhost/assignment/main.css" />


</head>
<body style="background:black;text-align:center;font-family:Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif;">

<div style="margin: 0px auto;
	width: 1000px;">

<table width="1000px" style="text-align:center;">
<tr>



<?php
$links = "add,edit,final";
$pieces=explode(",",$links);
for($i=0;$i<count($pieces);$i++)
{
	
	if ($title == $pieces[$i])
		echo '<td bgcolor="white"><h3>
           <a style="text-decoration:none; color:black" ';

	else 
		echo '<td><h3><font face="calibri">
           <a style="text-decoration:none; color:white" ';
	
	echo 'href="http://localhost/pages/view/'.$pieces[$i].'">'.ucfirst($pieces[$i]).' Images</a></h3></td>';
	
}

?>


</tr>
</table>

</div>

<div style="margin: 15px auto;
	width: 1000px;
        min-height: 460px; 
	position: relative;
        background:white;
        border:5px solid white;
	overflow:auto;">
