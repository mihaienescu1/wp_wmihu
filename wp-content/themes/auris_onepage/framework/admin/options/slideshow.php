<?php
$wt_options = array(	
		
	array(
		"name" => __("Slideshows Options",'wt_admin'),
		"desc" => __("Bellow you can set the options for all slideshows. After that you can set the type of slideshow to be displayed in <b>Intro Header Area</b> from <a href='?page=intro_header'>Intro Header Option</a>",'wt_admin'),
		"type" => "wt_title"
	),		
	array(
		"name" => __("Select the SlideShow",'wt_admin'),
		"open_class" => "openSliders",
		"type" => "wt_open",
	),	
	array(
		"name" => __("",'wt_admin'),
		//"desc" => __("Select type of slideshow, to make changes.",'wt_admin'),
		"one_col" => "true",
		"id" => "slideshow_type",
		"default" => 'flex',
		"options" => array(
			"flex" => __('Flex Slider','wt_admin'),
			"cycle" => __('Cycle Slider','wt_admin'),
			"nivo" => __('Nivo Slider','wt_admin'),
		),
		"chosen" => "true",
		"type" => "wt_select",
	),	
	array(
		"type" => "wt_close"
	),	
	array(
		"type" => "wt_reset"
	),
	
	array(
		"open_class" => "wt_options_tabs_wrap flexSwitch",
		"type" => "wt_open_group",
	),	
		array(
			"class" => "nav-tab-wrapper",
			"default" => '',
			"options" => array(
				"flex_slider" => __('Flex Slider','wt_admin'),
				"flex_slider_options" => __('Flex Options','wt_admin'),
			),
			"type" => "wt_navigation",
		),
		array(
			"type" => "wt_group_start",
			"group_id" => "flex_slider",
			),				
			array(
				"name" => __("Flex Slider",'wt_admin'),
				"type" => "wt_open",
				),
				array(	
					"name" => __('Flex Slider', 'wt_admin'),
					"id" => "flex_custom_slider",
					"desc" =>__( "Enter the full URL of your slide image: e.g http://www.site.com/image.jpg",'wt_admin'),
					"default" => "",
					"type" => "wt_flex_custom_slider"
				),	
			array(
				"type" => "wt_just_close"
			),
		array(
			"type" => "wt_group_end",
		),
		array(
			"type" => "wt_group_start",
			"group_id" => "flex_slider_options",
			),
			array(
				"name" => __("jQuery Flex Slider Settings",'wt_admin'),
				"type" => "wt_open",
			),
				array(
					"name" => __("Height",'wt_admin'),
					"desc" => __("The height of the slider.",'wt_admin'),
					"id" => "flex_height",
					"min" => "60",
					"max" => "1000",
					"step" => "1",
					"unit" => 'px',
					"default" => "700",
					"type" => "wt_range"
				),
				array(
					"name" => __("Animation Effects",'wt_admin'),
					"desc" => __("Select your animation type, 'fade' or 'slide'.",'wt_admin'),
					"id" => "flex_animation",
					"default" => 'slide',
					"options" => array(				
						"fade" => 'fade',
						"slide" => 'slide',
					),
					"chosen" => "true",
					"type" => "wt_select",
				),		
				array(
					"name" => __("Easing Effects",'wt_admin'),
					"desc" => __("Select the easing method used in jQuery transitions.",'wt_admin'),
					"id" => "flex_easing",
					"default" => 'linear',
					"options" => array(
						"linear" => 'linear',
						"swing" => 'swing',
						"easeInOutBounce" => 'easeInOutBounce',
						"easeOutBounce" => 'easeOutBounce',
						"easeInBounce" => 'easeInBounce',
						"easeInOutBack" => 'easeInOutBack',
						"easeOutBack" => 'easeOutBack',
						"easeInBack" => 'easeInBack',
						"easeInOutElastic" => 'easeInOutElastic',
						"easeOutElastic" => 'easeOutElastic',
						"easeInElastic" => 'easeInElastic',
						"easeInOutCirc" => 'easeInOutCirc',
						"easeOutCirc" => 'easeOutCirc',
						"easeInCirc" => 'easeInCirc',
						"easeInOutExpo" => 'easeInOutExpo',
						"easeOutExpo" => 'easeOutExpo',
						"easeInExpo" => 'easeInExpo',
						"easeInOutSine" => 'easeInOutSine',
						"easeOutSine" => 'easeOutSine',
						"easeInSine" => 'easeInSine',
						"easeInOutQuint" => 'easeInOutQuint',
						"easeOutQuint" => 'easeOutQuint',
						"easeInQuint" => 'easeInQuint',
						"easeInOutQuart" => 'easeInOutQuart',
						"easeOutQuart" => 'easeOutQuart',
						"easeInQuart" => 'easeInQuart',
						"easeInOutCubic" => 'easeInOutCubic',
						"easeOutCubic" => 'easeOutCubic',
						"easeInCubic" => 'easeInCubic',
						"easeInOutQuad" => 'easeInOutQuad',
						"easeOutQuad" => __('easeOutQuad','wt_admin'),			
						"easeInQuad" => 'easeInQuad',
						"easeOutQuad" => 'easeOutQuad'
					),
					"chosen" => "true",
					"type" => "wt_select",
				),
				array(
					"name" => __("Direction",'wt_admin'),
					"desc" => __("Select the sliding direction, 'horizontal' or 'vertical'.",'wt_admin'),
					"id" => "flex_direction",
					"default" => 'horizontal',
					"options" => array(				
						"horizontal" => 'horizontal',
						"vertical" => 'vertical',
					),
					"chosen" => "true",
					"type" => "wt_select",
				),
				array(
					"name" => __("Animation Speed",'wt_admin'),
					"desc" => __("Define the speed of animations.",'wt_admin'),
					"id" => "flex_animationSpeed",
					"min" => "200",
					"max" => "3000",
					"step" => "100",
					'unit' => 'miliseconds',
					"default" => "600",
					"type" => "wt_range"
				),
				array(
					"name" => __("Slideshow Speed",'wt_admin'),
					"desc" => __("Set the speed of the slideshow cycling.",'wt_admin'),
					"id" => "flex_slideshowSpeed",
					"min" => "1000",
					"max" => "30000",
					"step" => "500",
					"unit" => 'miliseconds',
					"default" => "5000",
					"type" => "wt_range"
				),
				array(
					"name" => __("Next & Prev Buttons",'wt_admin'),
					"desc" => __("Turn on the button if you want the 'Next & Preview Buttons' to be permanently displayed.",'wt_admin'),
					"id" => "flex_directionNav",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Control Navigation",'wt_admin'),
					"desc" => __("If the button is ON then the Control Navigation is displayed.",'wt_admin'),
					"id" => "flex_controlNav",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Control Navigation Thumbnails",'wt_admin'),
					"desc" => __("If the button is ON then the Control Navigation Thumbnails are displayed.",'wt_admin'),
					"id" => "flex_controlNavThumbs",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Control Navigation Thumbnails Slider",'wt_admin'),
					"desc" => __("If the button is ON then the Control Navigation Thumbnails area will slide also.",'wt_admin'),
					"id" => "flex_controlNavThumbsSlider",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Pause On Action",'wt_admin'),
					"desc" => __("Pause the slideshow when interacting with control elements.",'wt_admin'),
					"id" => "flex_pauseOnAction",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Pause On Hover",'wt_admin'),
					"desc" => __("If the button is ON then the slider stops while you are hovering.",'wt_admin'),
					"id" => "flex_pauseOnHover",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Automatic Slideshow",'wt_admin'),
					"desc" => __("If the button is ON then the slider will animate automatically.",'wt_admin'),
					"id" => "flex_slideshow",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Animation Loop",'wt_admin'),
					"desc" => __("Should the animation loop? If false, directionNav will received 'disable' classes at either end.",'wt_admin'),
					"id" => "flex_animationLoop",
					"default" => true,
					"type" => "wt_toggle"
				),
			array(
				"type" => "wt_just_close"
			),		
		array(
			"type" => "wt_group_end",
		),		
	array(
		"type" => "wt_close_group"
	),	
	
	array(
		"open_class" => "wt_options_tabs_wrap cycleSwitch",
		"type" => "wt_open_group",
	),	
		array(
			"class" => "nav-tab-wrapper",
			"default" => '',
			"options" => array(
				"cycle_slider" => __('Cycle Slider','wt_admin'),
				"cycle_slider_options" => __('Cycle Options','wt_admin'),
			),
			"type" => "wt_navigation",
		),
				
		array(
			"type" => "wt_group_start",
			"group_id" => "cycle_slider",
			),	
			array(
				"name" => __("Cycle Slider",'wt_admin'),
				"type" => "wt_open",
			),
				array(	
					"name" => __('Cycle Slider', 'wt_admin'),
					"id" => "cycle_custom_slider",
					"desc" =>__( "Enter the full URL of your slide image: e.g http://www.site.com/image.jpg",'wt_admin'),
					"default" => "",
					"type" => "wt_cycle_custom_slider"
				),
			array(
				"type" => "wt_just_close"
			),
		array(
			"type" => "wt_group_end",
		),	
		array(
			"type" => "wt_group_start",
			"group_id" => "cycle_slider_options",
			),
			array(
				"name" => __("jQuery Cycle Slider Settings",'wt_admin'),
				"type" => "wt_open",
			),
				array(
					"name" => __("Height",'wt_admin'),
					"desc" => __("The height of the slider. If the slider has youtube videos, then this has no effect. There will be an automatic height.",'wt_admin'),
					"id" => "cycle_height",
					"min" => "60",
					"max" => "1000",
					"step" => "1",
					"unit" => 'px',
					"default" => "700",
					"type" => "wt_range"
				),
				array(
					"name" => __("Transition Effects",'wt_admin'),
					"desc" => __("Here you can set the transition effect when the images are changing. For random effects, you should choose 'all' effect.",'wt_admin'),
					"id" => "cycle_effect",
					"default" => 'fade',
					"options" => array(
						"none" => 'none',
						"fade" => 'fade',
						"fadeout" => 'fadeOut',
						"scrollHorz" => 'scrollHorz',
						"scrollVert" => 'scrollVert',
						"shuffle" => 'shuffle',
						"tileSlide" => 'tileSlide',
						"tileBlind" => 'tileBlind',
						"tileSlideHorz" => 'tileSlideHorz',
						"tileBlindHorz" => 'tileBlindHorz',
		
					),
					"chosen" => "true",
					"type" => "wt_select",
				),
				array(
					"name" => __("Easing Effects",'wt_admin'),
					"desc" => __("Select the easing method for both in and out transitions.",'wt_admin'),
					"id" => "cycle_easing",
					"default" => 'null',
					"options" => array(
						"null" => 'null',
						"linear" => 'linear',
						"easeInOutBounce" => 'easeInOutBounce',
						"easeOutBounce" => 'easeOutBounce',
						"easeInBounce" => 'easeInBounce',
						"easeInOutBack" => 'easeInOutBack',
						"easeOutBack" => 'easeOutBack',
						"easeInBack" => 'easeInBack',
						"easeInOutElastic" => 'easeInOutElastic',
						"easeOutElastic" => 'easeOutElastic',
						"easeInElastic" => 'easeInElastic',
						"easeInOutCirc" => 'easeInOutCirc',
						"easeOutCirc" => 'easeOutCirc',
						"easeInCirc" => 'easeInCirc',
						"easeInOutExpo" => 'easeInOutExpo',
						"easeOutExpo" => 'easeOutExpo',
						"easeInExpo" => 'easeInExpo',
						"easeInOutSine" => 'easeInOutSine',
						"easeOutSine" => 'easeOutSine',
						"easeInSine" => 'easeInSine',
						"easeInOutQuint" => 'easeInOutQuint',
						"easeOutQuint" => 'easeOutQuint',
						"easeInQuint" => 'easeInQuint',
						"easeInOutQuart" => 'easeInOutQuart',
						"easeOutQuart" => 'easeOutQuart',
						"easeInQuart" => 'easeInQuart',
						"easeInOutCubic" => 'easeInOutCubic',
						"easeOutCubic" => 'easeOutCubic',
						"easeInCubic" => 'easeInCubic',
						"easeInOutQuad" => 'easeInOutQuad',
						"easeOutQuad" => __('easeOutQuad','wt_admin'),			
						"easeInQuad" => 'easeInQuad',
						"easeOutQuad" => 'easeOutQuad'
						),
					"chosen" => "true",
					"type" => "wt_select",
				),
				array(
					"name" => __("Ease Out Effects",'wt_admin'),
					"desc" => __("Select the easing method for out transitions.",'wt_admin'),
					"id" => "cycle_easeOut",
					"default" => 'null',
					"options" => array(
						"null" => 'null',
						"linear" => 'linear',
						"easeInOutBounce" => 'easeInOutBounce',
						"easeOutBounce" => 'easeOutBounce',
						"easeInBounce" => 'easeInBounce',
						"easeInOutBack" => 'easeInOutBack',
						"easeOutBack" => 'easeOutBack',
						"easeInBack" => 'easeInBack',
						"easeInOutElastic" => 'easeInOutElastic',
						"easeOutElastic" => 'easeOutElastic',
						"easeInElastic" => 'easeInElastic',
						"easeInOutCirc" => 'easeInOutCirc',
						"easeOutCirc" => 'easeOutCirc',
						"easeInCirc" => 'easeInCirc',
						"easeInOutExpo" => 'easeInOutExpo',
						"easeOutExpo" => 'easeOutExpo',
						"easeInExpo" => 'easeInExpo',
						"easeInOutSine" => 'easeInOutSine',
						"easeOutSine" => 'easeOutSine',
						"easeInSine" => 'easeInSine',
						"easeInOutQuint" => 'easeInOutQuint',
						"easeOutQuint" => 'easeOutQuint',
						"easeInQuint" => 'easeInQuint',
						"easeInOutQuart" => 'easeInOutQuart',
						"easeOutQuart" => 'easeOutQuart',
						"easeInQuart" => 'easeInQuart',
						"easeInOutCubic" => 'easeInOutCubic',
						"easeOutCubic" => 'easeOutCubic',
						"easeInCubic" => 'easeInCubic',
						"easeInOutQuad" => 'easeInOutQuad',
						"easeOutQuad" => __('easeOutQuad','wt_admin'),			
						"easeInQuad" => 'easeInQuad',
						"easeOutQuad" => 'easeOutQuad'
						),
					"chosen" => "true",
					"type" => "wt_select",
				),
				array(
					"name" => __("Random Slides",'wt_admin'),
					"desc" => __("If true the order of the slides will be randomized.",'wt_admin'),
					"id" => "cycle_random",
					"default" => false,
					"type" => "wt_toggle"
				),	
				array(
					"name" => __("Reverse",'wt_admin'),
					"desc" => __("If true the slideshow will proceed in reverse order and transitions that support this option will run a reverse animation.",'wt_admin'),
					"id" => "cycle_reverse",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("buildNavigation",'wt_admin'),
					"desc" => __("If true, builds a list of anchor links to link to each slide item.",'wt_admin'),
					"id" => "cycle_buildNavigation",
					"default" => false,
					"type" => "wt_toggle"
				),	
				array(
					"name" => __("buildArrows",'wt_admin'),
					"desc" => __("If true, builds the forwards and backwards buttons.",'wt_admin'),
					"id" => "cycle_buildArrows",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Captions",'wt_admin'),
					"desc" => __("If true, the slideshow will display the overlayed captions.",'wt_admin'),
					"id" => "cycle_captions",
					"default" => true,
					"type" => "wt_toggle"
				),			
				array(
					"name" => __("Speed",'wt_admin'),
					"desc" => __("The speed of the transition effect in milliseconds.",'wt_admin'),
					"id" => "cycle_speed",
					"min" => "200",
					"max" => "5000",
					"step" => "100",
					'unit' => 'miliseconds',
					"default" => "500",
					"type" => "wt_range"
				),	
				array(
					"name" => __("Timeout",'wt_admin'),
					"desc" => __("Choose '0' to stop automatic slideshow. Milliseconds between slide transitions.",'wt_admin'),
					"id" => "cycle_timeout",
					"min" => "0",
					"max" => "10000",
					"step" => "100",
					'unit' => 'miliseconds',
					"default" => "4000",
					"type" => "wt_range"
				),
				array(
					"name" => __("Delay",'wt_admin'),
					"desc" => __("Set the additional delay (in ms) for first transition (hint: can be negative).",'wt_admin'),
					"id" => "cycle_delay",
					"min" => "-30000",
					"max" => "30000",
					"step" => "500",
					"unit" => 'miliseconds',
					"default" => "0",
					"type" => "wt_range"
				),
				array(
					"name" => __("pauseOnHover",'wt_admin'),
					"desc" => __("If true & the slideshow is active, the slideshow will pause on hover",'wt_admin'),
					"id" => "cycle_pauseOnHover",
					"default" => true,
					"type" => "wt_toggle"
				),	
				array(
					"name" => __("Loop",'wt_admin'),
					"desc" => __("The number of times an auto-advancing slideshow should loop before terminating. If the value is less than 1 then the slideshow will loop continuously. Set to 1 to loop once, etc.",'wt_admin'),
					"id" => "cycle_loop",
					"min" => "0",
					"max" => "100",
					"step" => "1",
					"unit" => 'times',
					"default" => "0",
					"type" => "wt_range"
				),
				array(
					"name" => __("Continous",'wt_admin'),
					"desc" => __("IF true, the slideshow will be continous. While the use of continuous slideshows is strongly discouraged due to their impact on CPU usage, they are possible with Cycle2 by setting the easing as 'linear'.",'wt_admin'),
					"id" => "cycle_continous",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("YouTube Autostart",'wt_admin'),
					"desc" => __("If true, the videos automatically start when they are visible in the slideshow.",'wt_admin'),
					"id" => "cycle_youtubeAutoStart",
					"default" => false,
					"type" => "wt_toggle"
				),	
				array(
					"name" => __("Swipe",'wt_admin'),
					"desc" => __("Set to true to enable swipe gesture support for advancing the slideshow forward or back.",'wt_admin'),
					"id" => "cycle_swipe",
					"default" => true,
					"type" => "wt_toggle"
				),
			array(
				"type" => "wt_just_close"
			),		
		array(
			"type" => "wt_group_end",
		),				
	array(
		"type" => "wt_close_group"
	),		
	
	array(
		"open_class" => "wt_options_tabs_wrap nivoSwitch",
		"type" => "wt_open_group",
	),	
		array(
			"class" => "nav-tab-wrapper",
			"default" => '',
			"options" => array(
				"nivo_slider" => __('Nivo Slider','wt_admin'),
				"nivo_slider_options" => __('Nivo Options','wt_admin'),
			),
			"type" => "wt_navigation",
		),
				
		array(
			"type" => "wt_group_start",
			"group_id" => "nivo_slider",
			),	
			array(
				"name" => __("Nivo Slider",'wt_admin'),
				"type" => "wt_open",
			),
				array(	
					"name" => __('Nivo Slider', 'wt_admin'),
					"id" => "nivo_custom_slider",
					"desc" =>__( "Enter the full URL of your slide image: e.g http://www.site.com/image.jpg",'wt_admin'),
					"default" => "",
					"type" => "wt_nivo_custom_slider"
				),
			array(
				"type" => "wt_just_close"
			),
		array(
			"type" => "wt_group_end",
		),
		array(
			"type" => "wt_group_start",
			"group_id" => "nivo_slider_options",
			),
			array(
				"name" => __("jQuery Nivo Slider Settings",'wt_admin'),
				"type" => "wt_open",
			),
				array(
					"name" => __("Height",'wt_admin'),
					"desc" => __("The height of the slider.",'wt_admin'),
					"id" => "nivo_height",
					"min" => "60",
					"max" => "1000",
					"step" => "1",
					"unit" => 'px',
					"default" => "700",
					"type" => "wt_range"
				),
				array(
					"name" => __("Transition Effects",'wt_admin'),
					"desc" => __("Here you can set the transition effect when the images are changing.",'wt_admin'),
					"id" => "nivo_effect",
					"default" => 'random',
					"options" => array(				
						"sliceDownRight" => 'sliceDownRight',
						"sliceDownLeft" => 'sliceDownLeft',
						"sliceUpRight" => 'sliceUpRight',
						"sliceUpLeft" => 'sliceUpLeft',
						"sliceUpDown" => 'sliceUpDown',
						"sliceUpDownLeft" => 'sliceUpDownLeft',
						"fade" => 'fade',
						"fold" => 'fold',
						"random" => 'random',
						"boxRandom" => 'boxRandom',
						"boxRain" => 'boxRain',
						"boxRainReverse" => 'boxRainReverse',
						"boxRainGrow" => 'boxRainGrow',
						"boxRainGrowReverse" => 'boxRainGrowReverse',
						"slideInRight" => 'slideInRight',
						"slideInLeft" => 'slideInLeft',
					),
					"chosen" => "true",
					"type" => "wt_select",
				),
				array(
					"name" => __("Slices",'wt_admin'),
					"desc" => __("The number of slices for slice animations.",'wt_admin'),
					"id" => "nivo_slices",
					"default" => '10',
					"min" => 1,
					"max" => 30,
					"step" => "1",
					"type" => "wt_range",
				),
				array(
					"name" => __("Box Cols",'wt_admin'),
					"desc" => __("The number of boxCols for box animations.",'wt_admin'),
					"id" => "nivo_boxCols",
					"default" => '8',
					"min" => 1,
					"max" => 30,
					"step" => "1",
					"type" => "wt_range",
				),
				array(
					"name" => __("Box Rows",'wt_admin'),
					"desc" => __("The number of boxRows for box animations.",'wt_admin'),
					"id" => "nivo_boxRows",
					"default" => '4',
					"min" => 1,
					"max" => 30,
					"step" => "1",
					"type" => "wt_range",
				),
				array(
					"name" => __("Animation Speed",'wt_admin'),
					"desc" => __("Define how fast will take untill the transitions between images are completed.",'wt_admin'),
					"id" => "nivo_animSpeed",
					"min" => "200",
					"max" => "3000",
					"step" => "100",
					'unit' => 'miliseconds',
					"default" => "500",
					"type" => "wt_range"
				),
				array(
					"name" => __("Pause Time",'wt_admin'),
					"desc" => __("Set the delay you want untill the slider starts playing.",'wt_admin'),
					"id" => "nivo_pauseTime",
					"min" => "1000",
					"max" => "30000",
					"step" => "500",
					"unit" => 'miliseconds',
					"default" => "3000",
					"type" => "wt_range"
				),
				array(
					"name" => __("Random Start",'wt_admin'),
					"desc" => __("If true, you'll set a random starting slide.",'wt_admin'),
					"id" => "nivo_randomStart",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Next & Prev Buttons",'wt_admin'),
					"desc" => __("Turn on the button if you want the 'Next & Preview Buttons' to be permanently displayed.",'wt_admin'),
					"id" => "nivo_directionNav",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Control Navigation",'wt_admin'),
					"desc" => __("If the button is ON then the Control Navigation is displayed.",'wt_admin'),
					"id" => "nivo_controlNav",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Control Navigation Thumbnails",'wt_admin'),
					"desc" => __("If the button is ON then the Control Navigation Thumbnails are displayed.",'wt_admin'),
					"id" => "nivo_controlNavThumbs",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Pause On Hover",'wt_admin'),
					"desc" => __("If the button is ON then the slider stops while you are hovering.",'wt_admin'),
					"id" => "nivo_pauseOnHover",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Manual Transitions",'wt_admin'),
					"desc" => __("Set the button to ON if you want 'Force manual transitions' option to be enabled.",'wt_admin'),
					"id" => "nivo_manualAdvance",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Stop At End",'wt_admin'),
					"desc" => __("If the button is set to ON, the slideshow will stop at last image.",'wt_admin'),
					"id" => "nivo_stopAtEnd",
					"default" => false,
					"type" => "wt_toggle"
				),
			array(
				"type" => "wt_just_close"
			),		
		array(
			"type" => "wt_group_end",
		),					
	array(
		"type" => "wt_close_group"
	),
	
	array(
		"open_class" => "wt_options_tabs_wrap anythingSwitch",
		"type" => "wt_open_group",
	),	
		array(
			"class" => "nav-tab-wrapper",
			"default" => '',
			"options" => array(
				"anything_slider" => __('Anything Slider','wt_admin'),
				"anything_slider_options" => __('Anything Options','wt_admin'),
			),
			"type" => "wt_navigation",
		),
				
		array(
			"type" => "wt_group_start",
			"group_id" => "anything_slider",
			),	
			array(
				"name" => __("Anything Slider",'wt_admin'),
				"type" => "wt_open",
			),
				array(	
					"name" => __('Anything Slider', 'wt_admin'),
					"id" => "anything_custom_slider",
					"desc" =>__( "Enter the full URL of your slide image: e.g http://www.site.com/image.jpg",'wt_admin'),
					"default" => "",
					"type" => "wt_anything_custom_slider"
				),
			array(
				"type" => "wt_just_close"
			),
		array(
			"type" => "wt_group_end",
		),
		array(
			"type" => "wt_group_start",
			"group_id" => "anything_slider_options",
			),
			array(
				"name" => __("jQuery Anything Slider Settings",'wt_admin'),
				"type" => "wt_open",
			),	
				// Appearance
				array(
					"name" => __("Height",'wt_admin'),
					"desc" => __("The height of the slider.",'wt_admin'),
					"id" => "anything_height",
					"min" => "60",
					"max" => "1000",
					"step" => "1",
					"unit" => 'px',
					"default" => "700",
					"type" => "wt_range"
				),		
				array(
					"name" => __("Easing Effects",'wt_admin'),
					"desc" => __("Select the easing effect you want to use.",'wt_admin'),
					"id" => "anything_easing",
					"default" => 'linear',
					"options" => array(
						"linear" => 'linear',
						"bouncein" => 'bouncein',
						"easeInOutBounce" => 'easeInOutBounce',
						"easeOutBounce" => 'easeOutBounce',
						"easeInBounce" => 'easeInBounce',
						"easeInOutBack" => 'easeInOutBack',
						"easeOutBack" => 'easeOutBack',
						"easeInBack" => 'easeInBack',
						"easeInOutElastic" => 'easeInOutElastic',
						"easeOutElastic" => 'easeOutElastic',
						"easeInElastic" => 'easeInElastic',
						"easeInOutCirc" => 'easeInOutCirc',
						"easeOutCirc" => 'easeOutCirc',
						"easeInCirc" => 'easeInCirc',
						"easeInOutExpo" => 'easeInOutExpo',
						"easeOutExpo" => 'easeOutExpo',
						"easeInExpo" => 'easeInExpo',
						"easeInOutSine" => 'easeInOutSine',
						"easeOutSine" => 'easeOutSine',
						"easeInSine" => 'easeInSine',
						"easeInOutQuint" => 'easeInOutQuint',
						"easeOutQuint" => 'easeOutQuint',
						"easeInQuint" => 'easeInQuint',
						"easeInOutQuart" => 'easeInOutQuart',
						"easeOutQuart" => 'easeOutQuart',
						"easeInQuart" => 'easeInQuart',
						"easeInOutCubic" => 'easeInOutCubic',
						"easeOutCubic" => 'easeOutCubic',
						"easeInCubic" => 'easeInCubic',
						"easeInOutQuad" => 'easeInOutQuad',
						"easeOutQuad" => __('easeOutQuad','wt_admin'),			
						"easeInQuad" => 'easeInQuad',
						"easeOutQuad" => 'easeOutQuad'
					),
					"chosen" => "true",
					"type" => "wt_select",
				),
				array(
					"name" => __("buildArrows",'wt_admin'),
					"desc" => __("If true, builds the forwards and backwards buttons",'wt_admin'),
					"id" => "anything_buildArrows",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("buildNavigation",'wt_admin'),
					"desc" => __("If true, builds a list of anchor links to link to each panel",'wt_admin'),
					"id" => "anything_buildNavigation",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("toggleArrows",'wt_admin'),
					"desc" => __("if true, side navigation arrows will slide out on hovering & hide @ other times",'wt_admin'),
					"id" => "anything_toggleArrows",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("toggleControls",'wt_admin'),
					"desc" => __("if true, slide in controls (navigation + play/stop button) on hover and slide change, hide @ other times",'wt_admin'),
					"id" => "anything_toggleControls",
					"default" => false,
					"type" => "wt_toggle"
				),	
				array(
					"name" => __("Caption Opacity",'wt_admin'),
					"desc" => __("Here you can set the opacity of the caption.",'wt_admin'),
					"id" => "anything_captionOpacity",
					"min" => "0",
					"max" => "1",
					"step" => "0.1",
					"default" => "0.8",
					"type" => "wt_range"
				),
				
				// Function
				array(
					"name" => __("enableArrows",'wt_admin'),
					"desc" => __("if false, arrows will be visible, but not clickable.",'wt_admin'),
					"id" => "anything_enableArrows",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("enableNavigation",'wt_admin'),
					"desc" => __("if false, navigation links will still be visible, but not clickable.",'wt_admin'),
					"id" => "anything_enableNavigation",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("enableKeyboard",'wt_admin'),
					"desc" => __("if false, keyboard arrow keys will not work for this slider.",'wt_admin'),
					"id" => "anything_enableKeyboard",
					"default" => true,
					"type" => "wt_toggle"
				),
				
				// Slideshow options
				array(
					"name" => __("autoPlay",'wt_admin'),
					"desc" => __("If true, the slideshow will automatically starts running .",'wt_admin'),
					"id" => "anything_autoPlay",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("autoPlayLocked",'wt_admin'),
					"desc" => __("If true, user changing slides will not stop the slideshow.",'wt_admin'),
					"id" => "anything_autoPlayLocked",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("autoPlayDelayed",'wt_admin'),
					"desc" => __("If true, starting a slideshow will delay advancing slides; if false, the slider will immediately advance to the next slide when slideshow starts.",'wt_admin'),
					"id" => "anything_autoPlayDelayed",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("pauseOnHover",'wt_admin'),
					"desc" => __("If true & the slideshow is active, the slideshow will pause on hover",'wt_admin'),
					"id" => "anything_pauseOnHover",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("stopAtEnd",'wt_admin'),
					"desc" => __("If true & the slideshow is active, the slideshow will stop on the last page",'wt_admin'),
					"id" => "anything_stopAtEnd",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("playRtl",'wt_admin'),
					"desc" => __("If true, the slideshow will move right-to-left",'wt_admin'),
					"id" => "anything_playRtl",
					"default" => false,
					"type" => "wt_toggle"
				),
				
				// Times
				array(
					"name" => __("delay",'wt_admin'),
					"desc" => __("How long between slideshow transitions in AutoPlay mode (in milliseconds).",'wt_admin'),
					"id" => "anything_delay",
					"min" => "1000",
					"max" => "30000",
					"step" => "500",
					'unit' => 'miliseconds',
					"default" => "3000",
					"type" => "wt_range"
				),
				array(
					"name" => __("resumeDelay",'wt_admin'),
					"desc" => __("Resume slideshow after user interaction, only if autoplayLocked is true (in milliseconds).",'wt_admin'),
					"id" => "anything_resumeDelay",
					"min" => "1000",
					"max" => "80000",
					"step" => "1000",
					'unit' => 'miliseconds',
					"default" => "15000",
					"type" => "wt_range"
				),
				array(
					"name" => __("animationTime",'wt_admin'),
					"desc" => __("How long the slideshow transition takes (in milliseconds).",'wt_admin'),
					"id" => "anything_animationTime",
					"min" => "200",
					"max" => "10000",
					"step" => "100",
					"unit" => 'miliseconds',
					"default" => "600",
					"type" => "wt_range"
				),
				
				// Video
				array(
					"name" => __("resumeOnVideoEnd",'wt_admin'),
					"desc" => __("If true & the slideshow is active & a youtube video is playing, the autoplay will pause until the video completes",'wt_admin'),
					"id" => "anything_resumeOnVideoEnd",
					"default" => true,
					"type" => "wt_toggle"
				),
			array(
				"type" => "wt_just_close"
			),	
		array(
			"type" => "wt_group_end",
		),					
	array(
		"type" => "wt_close_group"
	),	
	array(
		"open_class" => "wt_options_tabs_wrap revSwitch",
		"type" => "wt_open_group",
	),	
		array(
			"type" => "wt_group_start",
			"group_id" => "slideshow_rev",
			),				
			array(
				"name" => __("Revolution Slider",'wt_admin'),
				"type" => "wt_open",
				),
				array(	
					"name" => __("Rev SlideShow Type",'wt_admin'),
					"desc" => __("Select one of the Revolution Sliders. The \"Revolution Slider\" plugin should be installed and the sliders should be created /imported first.",'wt_admin'),
					"id" => "rev_slideshow",
					"prompt" => __("Choose Revolution Slider...",'wt_admin'),
					"type" => "wt_selectRev",
				),	
			array(
				"type" => "wt_just_close"
			),
		array(
			"type" => "wt_group_end",
		),				
	array(
		"type" => "wt_close_group"
	),	
	array(
		"open_class" => "wt_options_tabs_wrap layerSSwitch",
		"type" => "wt_open_group",
	),	
		array(
			"type" => "wt_group_start",
			"group_id" => "slideshow_layerS",
			),				
			array(
				"name" => __("Layer Slider",'wt_admin'),
				"type" => "wt_open",
				),
				array(	
					"name" => __('Layer Slider', 'wt_admin'),
					"desc" => __("Select one of the Layer Sliders. The \"Layer Slider\" plugin should be installed and the sliders should be created / imported first.",'wt_admin'),
					"id" => "layerS_slideshow",
					"prompt" => __("Choose Layer Slider...",'wt_admin'),
					"type" => "wt_selectLayerS"
				),	
			array(
				"type" => "wt_just_close"
			),
		array(
			"type" => "wt_group_end",
		),
	array(
		"type" => "wt_close_group"
	),	
	array(
		"type" => "wt_save_close"
	),		
	
	
);
return array(
	'auto' => true,
	'name' => 'slideshow',
	'options' => $wt_options
);