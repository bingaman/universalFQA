<?php
if( $_SESSION['valid'] ) {
	
	$acronym = mysqli_real_escape_string($db_link, $_POST['species']);
	$percent_cover = mysqli_real_escape_string($db_link, $_POST['percent_cover']);
	$cover_range_midpoint = mysqli_real_escape_string($db_link, $_POST['cover_range_midpoint']);
	$quadrat = unserialize($_SESSION['quadrat']);
	
	if ($quadrat->add_taxa_by_column_value('acronym', $acronym, $percent_cover, $cover_range_midpoint, $db_link)) {
		$_SESSION['quadrat'] = serialize($quadrat);
		echo 'success';
	}
}
?>