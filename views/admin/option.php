<div>
<?php screen_icon(); ?>
<h2>CF7Geogle <?php echo __("Settings"); ?></h2>

<form method="post" action="options.php">
	<?php settings_fields( 'cf7geogle_option' ); ?>

	<h3>This is my option</h3>
	<p>Some text here.</p>
	<table>
		<tr valign="top">
			<th scope="row"><label for="cf7geogåle_option_google_api_key">Google Api Key</label></th>
			<td><input type="text" id="cf7geogle_option_google_api_key" name="cf7geogle_option_google_api_key" value="<?php echo get_option('cf7geogle_option_google_api_key'); ?>" size="100" /></td>
		</tr>

		<tr valign="top">
			<th scope="row"><label for="cf7geogle_option_is_include_api">Google Map Api を読み込む</label></th>
			<td>
				<select id="cf7geogle_option_is_include_api" name="cf7geogle_option_is_include_api">
					<option value="1" <?php if (get_option('cf7geogle_option_is_include_api')) echo 'selected="selected"'; ?>>読み込む</option>
					<option value="0" <?php if (!get_option('cf7geogle_option_is_include_api')) echo 'selected="selected"'; ?>>読み込まない</option>
				</select>
			</td>
		</tr>
	</table>

	<?php submit_button(); ?>

</form>

</div>
