jQuery(function($)
{

	$('.thickbox.button').on('click', update_exist_fields);

	function update_exist_fields()
	{
		$('.cf7geogle.exist_fields').empty()

		var field_texts = $('#wpcf7-form').val().match(/\[text(\*\s|\s)[a-zA-Z0-9_-]+(\s|\])/gi);
		if (field_texts)
		{
			for (var key in field_texts)
			{
				var name = field_texts[key].replace(/(\[text|\s|\*|\])/gi, '');

				$('.cf7geogle.exist_fields').append($('<input type="button" value="' + name + '" class="" data-input="input[name=' + name + ']">'));
			}
		}
		var textarea_fields = $('#wpcf7-form').val().match(/\[textarea(\*\s|\s)[a-zA-Z0-9_-]+(\s|\])/gi)
		if (textarea_fields)
		{
			for (var key in textarea_fields)
			{
				var name = textarea_fields[key].replace(/(\[textarea|\s|\*|\])/gi, '');

				$('.cf7geogle.exist_fields').append($('<input type="button" value="' + name + '" class="" data-input="input[name=' + name + ']">'));
			}
		}


		$('.cf7geogle.exist_fields input[type=button]').on('click', function(e)
		{
			var input_field = $(e.target).closest('td').find('input[type=text]');
			if (input_field.val())
			{
				input_field.val(input_field.val() + ',' + $(e.target).val() );
			}
			else
			{
				input_field.val( $(e.target).val() );
			}
			input_field.change();
		});
	}



});

