jQuery(function($)
{
	$('.cf7geogle-geocoding').on('click', geocodeHandler);


	function geocodeHandler()
	{
		var api_key = JsData.API_KEY;

		var zip  = CF7Geogle.createSelector($(this).data('zip'));
		var pref = CF7Geogle.createSelector($(this).data('pref'));
		var city = CF7Geogle.createSelector($(this).data('city'));
		var addr = CF7Geogle.createSelector($(this).data('addr'));
		var lat  = CF7Geogle.createSelector($(this).data('lat'));
		var lng  = CF7Geogle.createSelector($(this).data('lng'));

		var lat_elm = $(lat);
		var lng_elm = $(lng);

		var search_value = '';
		if (zip  && $(zip).length  > 0) $(zip).each(function() { search_value += $(this).val(); });
		if (pref && $(pref).length > 0) $(pref).each(function(){ search_value += $(this).val(); });
		if (city && $(city).length > 0) $(city).each(function(){ search_value += $(this).val(); });
		if (addr && $(addr).length > 0) $(addr).each(function(){ search_value += $(this).val(); });

		$.ajax({
			url: 'https://maps.googleapis.com/maps/api/geocode/json',
			type: 'GET',
			dataType: 'json',
			data: {
				key: api_key,
				address: search_value,
				language: 'ja'
			}
		}).done(function(data)
		{
			if (data.status == "OK")
			{
				if (lat_elm) lat_elm.val(data.results[0].geometry.location.lat);
				if (lng_elm) lng_elm.val(data.results[0].geometry.location.lng);
				if (lat_elm) {
					lat_elm.change();
				} else {
					lng_elm.change();
				}
			}
		});
	}
});
