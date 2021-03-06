<?php
if( $_SESSION['valid'] ) {
	
	$user = new User;
	$sites = $user->get_sites($_SESSION['user_id']);
	if (count($sites) == 0) {
?>
				<div class="span6">
					<label class="small-text">Site Name: <font class="red">*</font></label>
					<input class="input-medium" type="text" id="site_name" value="" size="23" maxlength="23" required />
					<label class="small-text">City:</label>
					<input class="input-medium" type="text" id="site_city" value="" size="23" maxlength="256" />
					<label class="small-text">County:</label>
					<input class="input-medium" type="text" id="site_county" value="" size="23" maxlength="256" />
					<label class="small-text">State:</label>
					<input class="input-medium" type="text" id="site_state" value="" size="23" maxlength="256" />
					<label class="small-text">Country:</label>
					<input class="input-medium" type="text" id="site_country" value="" size="23" maxlength="256" />
					<label class="small-text">Omernik Ecoregion:</label>
					<select id="omernik_ecoregion" name="omernik_ecoregion" style="width:auto;">
						<?php
							$ecoregions = OmernikEcoregion::get_omernik_ecoregions();
							foreach ($ecoregions as $ecoregion) {
								echo '<option value="' . $ecoregion->id . '">' . $ecoregion->display_name . '</option>';
							}
						?>
					</select>
				</div>
<?php			
	} else {
?>
<div class="span6">
	<label class="small-text">Site: </label>
<?php
		$selected_site = '';
		$selected_ecoregions = '';
		echo '<select id="site_select">';
		foreach($sites as $site) {
			if ($assessment->site->name == $site->name) {
				echo '<option selected value="'.$site->id.'">'.$site->name.'</option>';
				$selected_state = $site->state;
				$selected_ecoregions = $site->ecoregions;
			} else {
				echo '<option value="'.$site->id.'">'.$site->name.'</option>';
			}
		}
		echo '</select>';
		if (!empty($selected_state)) {
			echo '<p>Site State/Province: ' . $selected_state . '</p>';
		}
		foreach ($selected_ecoregions as $selected_ecoregion) {
			echo '<p>Site Omernik Ecoregion: ' . $selected_ecoregion->display_name . '</p>';
		}
		
?>
	<br>	
	<button class="btn btn-info" onclick="javascript:window.location = '/edit_site/' + $('#site_select').val();return false;">Edit Selected Site</button>
	<button class="btn btn-info" onclick="javascript:window.location = '/new_site';return false;">Create New Site</button>
</div>
<?php
	}
}
?>