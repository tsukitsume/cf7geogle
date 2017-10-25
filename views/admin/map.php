<?php
$cf7geogle_descriptions='<br><span class="description" style="font-size:90%;">下記ボタンより入力するフィールドの名前を選択するか、css のセレクタの形でで入力してください(※スペースは入寮しないでください)</span>
			<div class="cf7geogle exist_fields"></div>';
?>

<div class="control-box cf7geogle">

<fieldset>
<legend>GoogleMap をフォームに追加します</legend>

<table class="form-table">
<tbody>
	<tr>
	<th scope="row"><label for="tag-generator-panel-text-name">名前</label></th>
	<td><input type="text" name="name" class="tg-name oneline" id="tag-generator-panel-text-name"></td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">緯度を入力するフィールド</label></th>
		<td>
			<input type="text" name="lat" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">経度を入力するフィールド</label></th>
		<td>
			<input type="text" name="lng" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">拡大縮小率を入力するフィールド</label></th>
		<td>
			<input type="text" name="zoom" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>


	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">表示する地図の高さ(ピクセル)</label></th>
		<td>
			<input type="text" name="height" class="oneline option" id="">
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">デフォルト値：緯度</label></th>
		<td>
			<input type="text" name="default_lat" class="oneline option" id="">
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">デフォルト値：経度</label></th>
		<td>
			<input type="text" name="default_lng" class="oneline option" id="">
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">デフォルト値：拡大縮小率</label></th>
		<td>
			<input type="text" name="default_zoom" class="oneline option" id="">
		</td>
	</tr>






	<tr>
	<th scope="row"><label for="tag-generator-panel-text-id">ID 属性</label></th>
	<td><input type="text" name="id" class="idvalue oneline option" id="tag-generator-panel-text-id"></td>
	</tr>

	<tr>
	<th scope="row"><label for="tag-generator-panel-text-class">クラス属性</label></th>
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
