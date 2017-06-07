<?php
if( $_SESSION['valid'] ) {
	
	$quadrat = unserialize($_SESSION['quadrat']); 
	$html = '<table class="table table-hover"><tr><td></td>
				<td><strong>Scientific Name</strong></td>
				<td><strong>Family</strong></td>
				<td><strong>Acronym</strong></td>
				<td><strong>% Cover</strong></td>
				<td><strong>Cover Range/Midpoint</strong></td>
				<td><strong>Native?</strong></td>
				<td><strong>C</strong></td>
				<td><strong>W</strong></td>
				<td><strong>Physiognomy</strong></td>
				<td><strong>Duration</strong></td>
				<td><strong>Common Name</strong></td>
			</tr> ';
	if (count($quadrat->taxa) == 0) {
		$html = $html . '<tr><td colspan=11>You have not entered any species yet.</td></tr></table>';
	} else {
		$sorted_taxa = sort_array_of_objects($quadrat->taxa, 'scientific_name');
		foreach ($sorted_taxa as $taxon) {
			$html = $html . '<tr><td><input type="checkbox" name="taxa" value="' . $taxon->id . '"></td>';
			$html = $html . '<td>' . $taxon->scientific_name . '</td>';
			$html = $html . '<td>' . prettify_value($taxon->family) . '</td>';
			$html = $html . '<td>' . prettify_value($taxon->acronym) . '</td>';
			if ($taxon->cover_range_midpoint === UFQA_COVER_RANGE_MIDPOINT_DEFAULT) {
				$html = $html . '<td><input class="input-mini" onChange="update_quadrat_taxa(' . $taxon->id . ', this.value)" type="text" value="' . $taxon->percent_cover . '"></td>';
			} else {
				$html = $html . '<td><input class="input-mini" onChange="update_quadrat_taxa(' . $taxon->id . ', this.value)" type="text" value="' . $taxon->percent_cover . '" disabled></td>';			
			}
			$html = $html . '<td>' . $taxon->cover_range_midpoint . '</td>';
			$html = $html . '<td>' . $taxon->native . '</td>';
			$html = $html . '<td>' . $taxon->c_o_c . '</td>';
			$html = $html . '<td>' . prettify_value($taxon->c_o_w) . '</td>';
			$html = $html . '<td>' . prettify_value($taxon->physiognomy) . '</td>';
			$html = $html . '<td>' . prettify_value($taxon->duration) . '</td>';
			$html = $html . '<td>' . prettify_value($taxon->common_name) . '</td></tr>';
		}
	}
	echo $html;
}

function prettify_value( $value ) {
	if (trim($value) == '') 
		return 'n/a';
	else
		return $value;
}

function sort_array_of_objects($arr, $var) { 
	$tarr = array(); 
	$rarr = array(); 
	for($i = 0; $i < count($arr); $i++) { 
	  $element = $arr[$i]; 
	  $tarr[] = strtolower($element->{$var}); 
	} 
	reset($tarr); 
	asort($tarr); 
	$karr = array_keys($tarr); 
	for($i = 0; $i < count($tarr); $i++) { 
	  $rarr[] = $arr[intval($karr[$i])]; 
	} 
	return $rarr; 
} 
?>