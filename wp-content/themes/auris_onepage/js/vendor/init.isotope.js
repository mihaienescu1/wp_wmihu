jQuery(window).load(function() {
	var $container = jQuery('.wt_isotope');
	$container.imagesLoaded( function(){
	  var col_width = parseInt(jQuery('.wt_isotope_shortcode').width()/4,10);
	  $container.isotope({
		  itemSelector : '.wt_element',
		  masonry : {
                  columnWidth : 1
          },
	  });
	  jQuery(window).smartresize(function() {
	  	  var col_width = parseInt(jQuery('.wt_isotope_shortcode').width()/4,10);
		  $container.isotope({
			  itemSelector : '.wt_element',
			  masonry : {
                 	 columnWidth : 1
			  },
		  });
	  });	  
	});
});

      