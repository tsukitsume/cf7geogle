<?php
$cf7geogle_descriptions='<br><span class="description" style="font-size:90%;">'.__('Please select the name of the field to enter from the button below or enter in the form of selector of css (* Please do not enter a space)', 'cf7geogle').'</span>
			<div class="cf7geogle exist_fields"></div>';
?>

<div class="control-box cf7geogle">

<fieldset>
<legend><?php _e('Generate button to search latitude and longitude from address. Please enter the field to be searched and the field for entering latitude and longitude. if not splited address field, enter only the search field.', 'cf7geogle') ?></legend>

<table class="form-table">
<tbody>
	<tr>
	<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Name', 'cf7geogle') ?></label></th>
	<td><input type="text" name="name" class="tg-name oneline" id="tag-generator-panel-text-name"></td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Label text (ex: search from address)', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="label" class="oneline option">
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Field name of zip code', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="zip" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Field name of prefecture', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="pref" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Field name of city', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="city" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Field name of address', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="addr" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Field of latitude', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="lat" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Field of longitude', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="lng" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
	<th scope="row"><label for="tag-generator-panel-text-id">ID</label></th>
	<td><input type="text" name="id" class="idvalue oneline option" id="tag-generator-panel-text-id"></td>
	</tr>

	<tr>
	<th scope="row"><label for="tag-generator-panel-text-class">Class</label></th>
	<td><input type="text" name="class" class="classvalue oneline option" id="tag-generator-panel-text-class"></td>
	</tr>

</tbody>
</table>
</fieldset>

</div>

<div class="insert-box">
  <input type="hidden" name="values" value="" />
  <input type="text" name="cf7geogle_geocoding" class="tag code" readonly="readonly" onfocus="this.select()" />

  <div class="submitbox">
      <input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'contact-form-7' ) ); ?>" />
  </div>

  <br class="clear" />
</div>
