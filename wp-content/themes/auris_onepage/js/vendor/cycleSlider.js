jQuery(document).on('cycle-post-initialize', '#cycle_slider', function(){
	var slider = jQuery('#cycle_slider');
	cycleCaption();
	jQuery(window).smartresize(function() {
		cycleCaption();
	});	
	slider.removeClass('cycle-preload');
	setTimeout(function() {
		 slider.addClass('animated');
	},500);
});

setTimeout(function() {
	var slider = jQuery('#cycle_slider'),
		cycle_caption = slider.find('.cycle-overlay');
		//cycleSlideshow = slider.cycle();
		
	slider.on({
		'cycle-before': function(event, opts) {	
			slider.removeClass('animated');
			cycle_caption.fadeOut(200);
		},
		'cycle-after': function(event, opts) {
			cycleCaption();
			jQuery(window).smartresize(function() {
				cycleCaption();
			});	
			
			cycle_caption.fadeIn(10);
			setTimeout(function() {
				 slider.addClass('animated');
			},500);
		}
	});	
},500);
	
function cycleCaption() {
	var slider = jQuery('#cycle_slider'),
		cycleCaption = slider.find('.cycle-overlay');
		
	if (cycleCaption.css("display") == "block") {
		cycleCaption.css('margin-top', function() {
			var captionH = parseInt(cycleCaption.height() / -2);
			return captionH;
		});
	}
};