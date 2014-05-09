<?php
$wt_options = array(

	array(
		"class" => "nav-tab-wrapper",
		"default" => '',
		"options" => array(
			"slideshow" => __('Slideshow','wt_admin'),
			"static_image" => __('Static Image','wt_admin'),
		),
		"type" => "wt_navigation",
	),
	
	array(
		"type" => "group_start",
		"group_id" => "slideshow",
	),
		array(
			"name" => __("Sliders",'wt_admin'),
			"type" => "open",
		),	
		array(
			"name" => __("SlideShow Type",'wt_admin'),
			"desc" => __("Select which type of slidershow you want to use. <code>Unfortunately, Anything Slider is not RESPONSIVE..., yet</code>.",'wt_admin'),
			"id" => "slideshow_type",
			"default" => 'flex',
			"options" => array(
				"flex" => __('Flex Slider','wt_admin'),
				"nivo" => __('Nivo Slider','wt_admin'),
				"cycle" => __('Cycle Slider','wt_admin'),
				"anything" => __('Anything Slider','wt_admin'),
			),
			"chosen" => "true",
			"type" => "select",
		),	
		array(
			"name" => __("Enable Slideshow Everywhere",'wt_admin'),
			"desc" => __("If the button is ON then the <b>Slideshow</b> will be enabled on all pages/posts unless is overridden by custom pages/posts 'Page Intro Area Type' options. <b>Static Image Everywhere</b> button should be OFF.",'wt_admin'),
			"id" => "slideshow_everywhere",
			"default" => false,
			"type" => "toggle"
		),
		array(
			"type" => "close"
		),	
		array(
			"type" => "reset"
		),
	array(
		"type" => "group_end",
	),
	
	array(
		"type" => "group_start",
		"group_id" => "static_image",
	),
		array(
		"name" => __("Static Image",'wt_admin'),
		"type" => "open"
		),
			array(
				"name" => __("Static Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a <b>'Static Image for the Intro Header Area'</b> or you can simply upload it using the button. This image is overridden by every page/post <b>Featured Image</b> ",'wt_admin'),
				"id" => "static_image",
				"default" => "",
				"type" => "upload"
			),
			array(
				"name" => __("Height",'wt_admin'),
				"desc" => __("The height of the static image.",'wt_admin'),
				"id" => "static_image_height",
				"min" => "100",
				"max" => "600",
				"step" => "1",
				"unit" => 'px',
				"default" => "400",
				"type" => "range"
			),
			array(
				"name" => __("Adaptive Height",'wt_admin'),
				"desc" => __("If the button is set to ON then the Static Image height depends on the original image.",'wt_admin'),
				"id" => "static_adaptive_height",
				"default" => false,
				"type" => "toggle"
			),
			array(
				"name" => __("Enable Lightbox",'wt_admin'),
				"desc" => __("If the button is ON then the <b>Static Image</b> will be wrapped by a link that opens the image in lightbox.",'wt_admin'),
				"id" => "static_image_lightbox",
				"default" => false,
				"type" => "toggle"
			),
			array(
				"name" => __("Enable Static Image Everywhere",'wt_admin'),
				"desc" => __("If the button is ON then the <b>Static Image</b> will be enabled on all pages/posts unless is overridden by custom pages/posts 'Page Intro Area Type' options.",'wt_admin'),
				"id" => "static_image_everywhere",
				"default" => false,
				"type" => "toggle"
			),
		array(
			"type" => "close"
		),
		array(
			"type" => "reset"
		),
	array(
		"type" => "group_end",
	),
	
);
return array(
	'auto' => true,
	'name' => 'introheader',
	'options' => $wt_options
);