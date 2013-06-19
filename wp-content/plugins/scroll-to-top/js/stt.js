jQuery(function () {
	var scroll_timer;
	var displayed = false;
	var top = jQuery(document.body).children(0).position().top;
	jQuery(window).scroll(function () {
		window.clearTimeout(scroll_timer);
		scroll_timer = window.setTimeout(function () {
			if(jQuery(window).scrollTop() <= top)
			{
				displayed = false;
				jQuery('#scroll_to_top a').fadeOut(500);
			}
			else if(displayed == false)
			{
				displayed = true;
				jQuery('#scroll_to_top a').stop(true, true).show().click(function () { jQuery('#scroll_to_top a').fadeOut(500); });
			}
		}, 100);
	});
});