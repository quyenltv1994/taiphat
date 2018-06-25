<?php
	global $post;
	$post_id 		= $post->ID;
	$_post_config 	= get_post_meta($post_id,'_tvlgiao_wpdance_custom_room_config',true);
	$_default_post_config = array(
		'rooms_rates'			=> '',
		'rooms_acreage'			=> '',
		'rooms_bathrooms'		=> '',
		'rooms_rating'			=> '',
	);
	if( strlen($_post_config) > 0 ){
		$_post_config = unserialize($_post_config);
		if( is_array($_post_config) && count($_post_config) > 0 ){
			$_post_config['rooms_rates'] 		= ( isset($_post_config['rooms_rates']) && strlen($_post_config['rooms_rates']) > 0 ) ? $_post_config['rooms_rates'] : $_default_post_config['rooms_rates'];
			$_post_config['rooms_acreage'] 		= ( isset($_post_config['rooms_acreage']) && strlen($_post_config['rooms_acreage']) > 0 ) ? $_post_config['rooms_acreage'] : $_default_post_config['rooms_acreage'];
			$_post_config['rooms_bathrooms'] 	= ( isset($_post_config['rooms_bathrooms']) && strlen($_post_config['rooms_bathrooms']) > 0 ) ? $_post_config['rooms_bathrooms'] : $_default_post_config['rooms_bathrooms'];
			$_post_config['rooms_rating'] 		= ( isset($_post_config['rooms_rating']) && strlen($_post_config['rooms_rating']) > 0 ) ? $_post_config['rooms_rating'] : $_default_post_config['rooms_rating'];
		}
	}else{
		$_post_config = $_default_post_config;
	}
	$_bed_room 		= get_post_meta($post_id,'_tvlgiao_bed_rooms',true);
	$_featured_room = get_post_meta($post_id,'_tvlgiao_featured_room',true);
	$_good_room 	= get_post_meta($post_id,'_tvlgiao_good_price',true);
?>
<table class="form-table">
	<tbody>
		<tr>
			<th><label for="rooms_address"><?php esc_html_e('Room Rates: ', 'wpdance') ?></label></th>
			<td><input type="text" name="rooms_rates_name" id="rooms_rates" value="<?php echo strlen($_post_config['rooms_rates'])? esc_attr($_post_config['rooms_rates']): ''; ?>" size="40">
			<br><span class="description"><?php esc_html_e('Room Rates', 'wpdance') ?></span></td>
		</tr>
		<tr>
			<th><label for="rooms_count"><?php esc_html_e('Acreage: ', 'wpdance') ?></label></th>
			<td><input type="text" name="rooms_acreage_name" id="rooms_count" value="<?php echo strlen($_post_config['rooms_acreage'])? esc_attr($_post_config['rooms_acreage']): ''; ?>" size="40">
			<br><span class="description"><?php esc_html_e('Acreage the rooms (m2)', 'wpdance') ?></span></td>
       	</tr>
		<tr>
			<th><label for="rooms_address"><?php esc_html_e('Number Rooms: ', 'wpdance') ?></label></th>
			<td>
				<select name="rooms_number_name" id="rooms_number">
					<option value="1" <?php if( strcmp($_bed_room,'1') == 0 ) echo "selected='selected'";?> ><?php esc_html_e('1 Bedroom', 'wpdance') ?></option>
					<option value="2" <?php if( strcmp($_bed_room,'2') == 0 ) echo "selected='selected'";?> ><?php esc_html_e('2 Bedroom', 'wpdance') ?></option>
					<option value="3" <?php if( strcmp($_bed_room,'3') == 0 ) echo "selected='selected'";?> ><?php esc_html_e('3 Bedroom', 'wpdance') ?></option>
					<option value="4" <?php if( strcmp($_bed_room,'4') == 0 ) echo "selected='selected'";?> ><?php esc_html_e('4 Bedroom', 'wpdance') ?></option>
					<option value="0" <?php if( strcmp($_bed_room,'0') == 0 ) echo "selected='selected'";?>><?php esc_html_e('Shophouse', 'wpdance') ?></option>
				</select>
			<br><span class="description"><?php esc_html_e('Number rooms', 'wpdance') ?></span></td>
		</tr>
		<tr>
			<th><label for="rooms_address"><?php esc_html_e('Number of Bathrooms: ', 'wpdance') ?></label></th>
			<td><input type="text" name="rooms_bathrooms_name" id="rooms_bathrooms" value="<?php echo strlen($_post_config['rooms_bathrooms'])? esc_attr($_post_config['rooms_bathrooms']): ''; ?>" size="40">
			<br><span class="description"><?php esc_html_e('Number of Bathrooms', 'wpdance') ?></span></td>
		</tr>

		<tr>
			<th><label for="rooms_address"><?php esc_html_e('Rating Rooms: ', 'wpdance') ?></label></th>
			<td><input type="text" name="rooms_rating_name" id="rooms_rating" value="<?php echo strlen($_post_config['rooms_rating'])? esc_attr($_post_config['rooms_rating']): ''; ?>" size="40">
			<br><span class="description"><?php esc_html_e('Rating Rooms', 'wpdance') ?></span></td>
		</tr>
		<tr>
			<th><label for="rooms_address"><?php esc_html_e('Featured Room: ', 'wpdance') ?></label></th>
			<td><input type="checkbox" name="rooms_featured_name" id="rooms_featured" value="1" <?php if( strcmp($_featured_room,'1') == 0 ) echo "checked";?> >
			<br><span class="description"><?php esc_html_e('Tick it if room featured', 'wpdance') ?></span></td>
		</tr>
		<tr>
			<th><label for="rooms_address"><?php esc_html_e('Good Price: ', 'wpdance') ?></label></th>
			<td><input type="checkbox" name="rooms_goodprice_name" id="rooms_goodprice" value="1" <?php if( strcmp($_good_room,'1') == 0 ) echo "checked";?>>
			<br><span class="description"><?php esc_html_e('Tick it if room good price', 'wpdance') ?></span></td>
		</tr>		
	</tbody>
	<input type="hidden" name="custom_room_layout" class="change-layout" value="custom_single_room_layout"/>
</table>
