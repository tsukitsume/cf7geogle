(function($)
{
	var mapCanvas = document.getElementById(JsData.id);

	var lat = CF7Geogle.createSelector($(mapCanvas).data('lat'));
	var lng = CF7Geogle.createSelector($(mapCanvas).data('lng'));
	var zoom = CF7Geogle.createSelector($(mapCanvas).data('zoom'));

	var lat_elm  = $(lat);
	var lng_elm  = $(lng);
	var zoom_elm = $(zoom);

	if (JsData.default_lat)  lat_elm.val(JsData.default_lat);
	if (JsData.default_lng)  lng_elm.val(JsData.default_lng);
	if (JsData.default_zoom) zoom_elm.val(JsData.default_zoom);

	var map = new google.maps.Map(mapCanvas, {
		center: new google.maps.LatLng(parseFloat(JsData.default_lat), parseFloat(JsData.default_lng)),
		zoom: parseInt(JsData.default_zoom),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false,
	});

	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(JsData.default_lat, JsData.default_lng),
		map: map,
		clickable: false,
		draggable: true,
		zIndex: 10,
	});
	marker.addListener('drag', markerDragHandler);

	map.addListener('zoom_changed', markerDragHandler);

	function markerDragHandler()
	{
		lat_elm.val(marker.getPosition().lat());
		lng_elm.val(marker.getPosition().lng());
		zoom_elm.val(map.getZoom());
	}
	function valueChangeHandler()
	{
		var pos = new google.maps.LatLng(parseFloat(lat_elm.val()), parseFloat(lng_elm.val()));
		marker.setPosition(pos);
		map.setCenter(pos);
		if (zoom_elm && Number.isInteger(parseInt(zoom_elm.val())))
		{
			map.setZoom(parseInt(zoom_elm.val()));
		}
	}

	lat_elm.on('change', valueChangeHandler);
	lng_elm.on('change', valueChangeHandler);
	zoom_elm.on('change', valueChangeHandler);

})(jQuery);
