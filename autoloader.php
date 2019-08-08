<?php 
include 'model/model.php';
foreach (glob("model/*.php") as $filename)
{
	if($filename!='model/model.php'){
		include $filename;	
	}
}
?>