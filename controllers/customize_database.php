<?php
if( !$_SESSION['valid'] ) 
	require_once('../views/login.php');
else { 
	require_once('../views/nav.php');
	// get original fqa details
	$states_provinces = StateProvince::get_states_provinces();
	$ecoregions = OmernikEcoregion::get_omernik_ecoregions();
	$original_fqa_id = mysqli_real_escape_string($db_link, $url_parts[1]);
	$fqa = new FQADatabase;
	$fqa_databases = $fqa->get_fqa($original_fqa_id); 
	// if database is not found show all databases
	if (mysqli_num_rows($fqa_databases) == 0) {
		require_once('../views/nav.php');
		$fqa_databases = $fqa->get_all();
		// get this user's custom fqa databases
		$custom_fqa = new CustomFQADatabase;
		$custom_fqa_databases = $custom_fqa->get_all_for_user($_SESSION['user_id']);
		// display view
		require_once('../views/view_databases.php');
	} else { 
		$fqa_database = mysqli_fetch_assoc($fqa_databases);
		$region = $fqa_database['region_name'];
		$year = $fqa_database['publication_year'];
		$description = $fqa_database['description'];
		$new_custom_db = new CustomFQADatabase;
		$custom_fqa_database = $new_custom_db->insert_new($original_fqa_id, $region, $description, $year);
		$custom_fqa_id = $custom_fqa_database->id;
		// get original fqa taxa
		$fqa_taxa = $fqa->get_taxa($original_fqa_id);
		$custom_fqa_database->insert_taxa($custom_fqa_id, $original_fqa_id, $fqa_taxa);
		// get taxa for this db
		$taxa = $custom_fqa_database->get_taxa($custom_fqa_id);
		require_once('../views/nav_disabled_links.php');
		require_once('../views/edit_custom_database.php');
	}
}

?>