<?php
$cf7geogle_descriptions='<br><span class="description" style="font-size:90%;">下記ボタンより入力するフィールドの名前を選択するか、css のセレクタの形でで入力してください(※スペースは入寮しないでください)</span>
			<div class="cf7geogle exist_fields"></div>';
?>


<div class="control-box cf7geogle">

<fieldset>
<legend>住所から緯度経度を検索するボタンを作成します。検索対象のフィールドと、緯度及び経度を入力するフィールドを登録してください</legend>

<table class="form-table">
<tbody>
	<tr>
	<th scope="row"><label for="tag-generator-panel-text-name">名前</label></th>
	<td><input type="text" name="name" class="tg-name oneline" id="tag-generator-panel-text-name"></td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">ボタンのラベル</label></th>
		<td>
			<input type="text" name="label" class="oneline option">
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">検索フィールド郵便番号</label></th>
		<td>
			<input type="text" name="zip" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">検索フィールド都道府県フィールド</label></th>
		<td>
			<input type="text" name="pref" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">検索フィールド市区町村フィールド</label></th>
		<td>
			<input type="text" name="city" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">検索フィールド住所入力フィールド</label></th>
		<td>
			<input type="text" name="addr" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">緯度の入力フィールド</label></th>
		<td>
			<input type="text" name="lat" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
		</td>
	</tr>

	<tr>
		<th scope="row"><label for="tag-generator-panel-text-name">経度の入力フィールド</label></th>
		<td>
			<input type="text" name="lng" class="oneline option" id="">
			<?php echo $cf7geogle_descriptions; ?>
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
  <input type="text" name="cf7geogle_geocoding" class="tag code" readonly="readonly" onfocus="this.select()" />

  <div class="submitbox">
      <input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'contact-form-7' ) ); ?>" />
  </div>

  <br class="clear" />
</div>
