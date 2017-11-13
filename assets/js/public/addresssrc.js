jQuery(function($)
{
	$('.cf7geogle-addresssrc').on('click', addresssrcHandler);

	function addresssrcHandler()
	{
		var api_key = JsData.API_KEY;

		var zip  = CF7Geogle.createSelector($(this).data('zip'));
		var pref = CF7Geogle.createSelector($(this).data('pref'));
		var city = CF7Geogle.createSelector($(this).data('city'));
		var addr = CF7Geogle.createSelector($(this).data('addr'));

		var zip_elm  = $(zip);
		var pref_elm = $(pref);
		var city_elm = $(city);
		var addr_elm = $(addr);

		var zip_value = '';
		zip_elm.each(function()
		{
			zip_value += $(this).val().replace(/[^0-9]/g, '');
		});

		if (!zip_value)
		{
			alert('郵便番号を入力してください');
			return;
		}

		$.ajax({
			url: 'https://maps.googleapis.com/maps/api/geocode/json',
			type: 'GET',
			dataType: 'json',
			data: {
				key: api_key,
				address: zip_value,
				language: 'ja'
			}
		}).done(function(data)
		{
			if (data.status == "OK")
			{
				var components = data.results[0].address_components;
				console.log(components);
				console.log(components.length);
				if (components.length == 5)
				{
					pref_elm.val(pref_elm.val() + components[3].long_name);
					city_elm.val(city_elm.val() + components[2].long_name);
					addr_elm.val(addr_elm.val() + components[1].long_name);
					console.log(addr_elm);
				}
				else if (components.length == 6)
				{
					pref_elm.val(pref_elm.val() + components[4].long_name);
					city_elm.val(city_elm.val() + components[3].long_name + components[2].long_name);
					addr_elm.val(addr_elm.val() + components[1].long_name);
					console.log(addr_elm);
				}
			}
			else if (data.status == "ZERO_RESULTS")
			{
				alert('検索結果が 0 件でした');
			}
		});
	}


});
