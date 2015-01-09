<?php
	$connect=mysqli_connect($dbhost,$dbuser,$dbpass,$database) or die("Error connecting to Database!");
	mysqli_query($connect,"SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");
?>
