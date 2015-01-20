<?php 
	$coll_id = $_REQUEST['coll_id'];
	$coll_sub_id = $_REQUEST['coll_sub_id'];

	if (isset($_REQUEST['type_id'])) {
		$type_id = $_REQUEST['type_id'];
	} else {
		$type_id = 1;
	}
?>