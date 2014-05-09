jQuery(document).ready(function() {
	var slider = jQuery('#nivoSlider'),
		nivo_caption = slider.find('.nivo-caption');
	slider.imagesLoaded(function() {
		slider.nivoSlider({
			effect:slideShow['effect'],
			slices:slideShow['slices'],
			boxCols:slideShow['boxCols'],
			boxRows:slideShow['boxRows'],
			animSpeed:slideShow['animSpeed'],
			pauseTime:slideShow['pauseTime'],
			randomStart:slideShow['randomStart'],
			directionNav:slideShow['directionNav'],
			controlNav:slideShow['controlNav'],
			controlNavThumbs:slideShow['controlNavThumbs'],
			pauseOnHover:slideShow['pauseOnHover'],
			manualAdvance:slideShow['manualAdvance'],
			afterLoad: function(){
				slider.removeClass('nivo-preload');
				setTimeout(function() {
					 slider.addClass('animated');
				},500);
			},		
			beforeChange: function(){
				slider.removeClass('animated');
				nivo_caption.fadeOut(200);
			},
			afterChange: function(){
				nivo_caption.fadeIn(10);
				slider.addClass('animated');
			},
			lastSlide: function(){
				if(slideShow['stopAtEnd']){
					slider.data('nivoslider').stop();
				}
			}
		});
		function nivoCaption() {
			var nivoCaption = slider.find('.nivo-caption');
			if (nivoCaption.css("display") == "block") {
				nivoCaption.css('margin-top', function() {
					var captionH = parseInt(nivoCaption.height() / -2);
					return captionH;
				});
			}
		};
		nivoCaption();
		jQuery(window).smartresize(function() {
			nivoCaption();
		});				
	});	
});