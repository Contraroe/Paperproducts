<?php 
	$coll_id = $_REQUEST['coll_id'];

	global  $coll_atel;

	if (isset($_REQUEST['coll_sub_id'])) {
		$coll_sub_id = $_REQUEST['coll_sub_id'];
	} else {
	    $coll_sub_id = 1;
	}

	if (isset($_REQUEST['type_id'])) {
	    $coll_atel = $_REQUEST['coll_atel'];
	} else {
	    $coll_atel = 1;
	}

	if (isset($_REQUEST['type_id'])) {
		$type_id = $_REQUEST['type_id'];
	} else {
		$type_id = 1;
	}

	$coll_atel =$_REQUEST['coll_atel'];

//	if (isset($_REQUEST['aCollection'])) {
//		$aCollection[] = $_REQUEST['aCollection'];
//	} else {
//		$aCollection[] = ();
//	}
?>