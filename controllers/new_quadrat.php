<?php
if( !$_SESSION['valid'] ) 
	require_once('../views/login.php');
else {
	require_once('../views/nav.php');

	// display view
	require_once('../views/new_quadrat.php');
	/*
	// get all the data for this inventory
	$assessment = new InventoryAssessment( $url_parts[1] );
	if (is_null($assessment->id))
		require_once('../views/error.php');
	else {
		require_once('../views/nav.php');
		require_once('../views/edit_inventory.php');
	} */
}
?>