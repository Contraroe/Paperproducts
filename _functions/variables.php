<?php 
	$coll_id = $_REQUEST['coll_id'];
	if (isset($_REQUEST['coll_atel'])) {
		$coll_atel = $_REQUEST['coll_atel'];
	} else {
		$coll_atel = 0;
	}
	if (isset($_REQUEST['coll_sub_id'])) {
		$coll_sub_id = $_REQUEST['coll_sub_id'];
	} else {
	    $coll_sub_id = 1;
	}	
	if (isset($_REQUEST['type_id'])) {
		$type_id = $_REQUEST['type_id'];
	} else {
		$type_id = 1;
	}
	

?>