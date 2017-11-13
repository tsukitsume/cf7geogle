var CF7Geogle = {
	createSelector: function (text)
	{
		var selectors = '';
		if (text)
		{
			texts = text.split(',');
			for (key in texts)
			{
				var selector = '';
				if (texts[key].replace(/\s/gi, '').match(/^(\.|\#)/))
				{
					selector = texts[key].replace(/\s/gi, '');
				}
				else if (texts[key].replace(/\s/gi, '').match(/^[A-za-z]/))
				{
					selector = 'input[name=' + texts[key].replace(/\s/gi, '') + '], '+
						'textarea[name=' + texts[key].replace(/\s/gi, '') + ']';
				}

				if (selector)
				{
					if (selectors) {
						selectors += ', ' + selector;
					} else {
						selectors = selector;
					}
				}
			}

		}

		return selectors;
	},
}
