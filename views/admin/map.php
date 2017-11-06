<?php
$cf7geogle_descriptions='<br><span class="description" style="font-size:90%;">'.__('Please select the name of the field to enter from the button below or enter in the form of selector of css (* Please do not enter a space)', 'cf7geogle').'</span>
			<div class="cf7geogle exist_fields"></div>';
?>

<div class="control-box cf7geogle">

<fieldset>
<legend><?php _e('add Google Map to the form. you must fill all fields except for ID and class.', 'cf7geogle') ?></legend>

<table class="form-table">
<tbody>
	<tr>
	<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Name', 'cf7geogle') ?></label></th>
	<td><input type="text" name="name" class="tg-name oneline" id="tag-generator-panel-text-name"></td>
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
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Field of zoom', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="zoom" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>


	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Height of Map (px)', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="height" class="oneline option" id="">
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Default latitude', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="default_lat" class="oneline option" id="">
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Default longitude', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="default_lng" class="oneline option" id="">
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name"><?php _e('Default zoom', 'cf7geogle') ?></label></th>
		<td>
			<input type="text" name="default_zoom" class="oneline option" id="">
		</td>
	</tr>

	<tr>
	<th scope="row"><label for="tag-generator-panel-text-id">ID</label></th>
	<td><input type="text" name="id" class="idvalue oneline option" id="tag-generator-panel-text-id"></td>
	</tr>

	<tr>
	<th scope="row"><label for="tag-generator-panel-text-class">class</label></th>
	<td><input type="text" name="class" class="classvalue oneline option" id="tag-generator-panel-text-class"></td>
	</tr>

</tbody>
</table>
</fieldset>

</div>

<div class="insert-box">
  <input type="hidden" name="values" value="" />
  <input type="text" name="cf7geogle_map" class="tag code" readonly="readonly" onfocus="this.select()" />

  <div class="submitbox">
      <input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'contact-form-7' ) ); ?>" />
  </div>

  <br class="clear" />
</div>
