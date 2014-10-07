/**
 * link: http://webdesignerwall.com/tutorials/animated-scroll-to-top
 */

jQuery(document).ready(function(){

	// hide #back-top first
	jQuery(".back-to-top").hide();
	
	// fade in #back-top
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.back-to-top').fadeIn();
			} else {
				jQuery('.back-to-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		jQuery('.back-to-top a').click(function () {
			jQuery('body,html,header').animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	});

});