<?php 
$wt_options = array(
	array(
		"name" => __("Default Options for Videos &amp; Audios",'wt_admin'),
		"desc" => __("Bellow you can set the default options for all types of videos &amp; Audios. These options are used by Shortcodes and Intro Header - Static Videos",'wt_admin'),
		"type" => "wt_title"
	),		
	array(
		"name" => __("Select Media Type",'wt_admin'),
		"type" => "wt_open",
	),	
	array(
		"name" => __("",'wt_admin'),
		"one_col" => "true",
		"id" => "media_type",
		"default" => 'videos',
		"options" => array(
			"videos" => __('Videos','wt_admin'),
			"audios" => __('Audios','wt_admin'),
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
		"open_class" => "videosSwitch",
		"type" => "wt_open_group",
	),
		array(
			"class" => "nav-tab-wrapper",
			"default" => '',
			"options" => array(
				"video_html5" => __('Html5 Video','wt_admin'),
				"video_youTube" => __('YouTube','wt_admin'),
				"video_vimeo" => __('Vimeo','wt_admin'),
				"video_dailymotion" => __('Dailymotion','wt_admin'),
				"video_metacafe" => __('Metacafe','wt_admin'),
				"video_bliptv" => __('Blip Tv','wt_admin'),
				"video_flash" => __('Flash','wt_admin'),
			),
			"type" => "wt_navigation",
		),	
		array(
			"type" => "wt_group_start",
			"group_id" => "video_html5",
		),
			array(
				"name" => __("Html5 Video",'wt_admin'),
				"type" => "wt_open"
			),
				array(
					"name" => __("Autoplay",'wt_admin'),
					"id" => "html5_autoplay",
					"desc" => __("Set the button to ON if you want the video to play immediately on loading in the browser.",'wt_admin'),
					"default" => false,
					"type" => "toggle"
				),
				array(
					"name" => __("Preload",'wt_admin'),
					"id" => "html5_preload",
					"desc" => __("If the button is OFF, the video won't start downloading as soon the page is loaded.",'wt_admin'),
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Loop",'wt_admin'),
					"desc" => __('Plays the initial video again and again.','wt_admin'),
					"id" => "html5_loop",
					"default" => false,
					"type" => "wt_toggle"
				),	
				array(
					"name" => __("Download",'wt_admin'),
					"desc" => __('If true, provides download links to the files themselves in case the user didn\'t have any suitable playback technology. (Html5 or Flash)','wt_admin'),
					"id" => "html5_download",
					"default" => false,
					"type" => "wt_toggle"
				),	
			array(
				"type" => "wt_close"
			),
			array(
				"type" => "wt_reset"
			),
		array(
			"type" => "wt_group_end",
		),	
		array(
			"type" => "wt_group_start",
			"group_id" => "video_youTube",
		),
			array(
				"name" => __("YouTube",'wt_admin'),
				"type" => "wt_open"
			),
				array(
					"name" => __("Autoplay",'wt_admin'),
					"desc" => __('Set the button to ON if you want the video to play immediately on loading in the browser.','wt_admin'),
					"id" => "youtube_autoplay",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Autohide",'wt_admin'),
					"desc" => __('Here you can automatically hide the video control bar after the video starts playing.','wt_admin'),
					"id" => "youtube_autohide",
					"default" => '1',
					"options" => array(
						"0" => __('Visible','wt_admin'),
						"1" => __('Hide all','wt_admin'),
						"2" => __('Hide video progress bar','wt_admin'),
					),
					"type" => "wt_select",
				),
				array(
					"name" => __("Controls",'wt_admin'),
					"desc" => __('Disables video player controls.','wt_admin'),
					"id" => "youtube_controls",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Disablekb",'wt_admin'),
					"desc" => __('Disables the player keyboard controls.','wt_admin'),
					"id" => "youtube_disablekb",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Fs",'wt_admin'),
					"desc" => __('Enables the fullscreen button.','wt_admin'),
					"id" => "youtube_fs",
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Hd",'wt_admin'),
					"desc" => __('Enables HD video playback by default.','wt_admin'),
					"id" => "youtube_hd",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Loop",'wt_admin'),
					"desc" => __('Plays the initial video again and again.','wt_admin'),
					"id" => "youtube_loop",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Rel",'wt_admin'),
					"desc" => __('Disables related videos once playback of the initial video starts.','wt_admin'),
					"id" => "youtube_rel",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Showsearch",'wt_admin'),
					"desc" => __('Disables the search box from displaying when the video is minimized.','wt_admin'),
					"id" => "youtube_showsearch",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Showinfo",'wt_admin'),
					"desc" => __('Disables display information.','wt_admin'),
					"id" => "youtube_showinfo",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Enablejsapi",'wt_admin'),
					"desc" => __('Enables the JavaScript API handlers for player.','wt_admin'),
					"id" => "youtube_enablejsapi",
					"default" => false,
					"type" => "wt_toggle"
				),
			array(
				"type" => "wt_close"
			),
			array(
				"type" => "wt_reset"
			),
		array(
			"type" => "wt_group_end",
		),	
		array(
			"type" => "wt_group_start",
			"group_id" => "video_vimeo",
		),
			array(
				"name" => __("Vimeo",'wt_admin'),
				"type" => "wt_open"
			),
				array(
					"name" => __("Autoplay",'wt_admin'),
					"desc" => __("Set the button to ON if you want the video to play immediately on loading in the browser.",'wt_admin'),
					"id" => "vimeo_autoplay",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Title",'wt_admin'),
					"desc" => __('Sets whether or not display the title on the video.','wt_admin'),
					"id" => "vimeo_title",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Byline",'wt_admin'),
					"desc" => __('Sets whether or not display the byline on the video.','wt_admin'),
					"id" => "vimeo_byline",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Portrait",'wt_admin'),
					"desc" => __("Sets whether or not display the user's portrait on the video.",'wt_admin'),
					"id" => "vimeo_portrait",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Loop",'wt_admin'),
					"desc" => __('Plays the initial video again and again.','wt_admin'),
					"id" => "vimeo_loop",
					"default" => false,
					"type" => "wt_toggle"
				),
			array(
				"type" => "wt_close"
			),
			array(
				"type" => "wt_reset"
			),
		array(
			"type" => "wt_group_end",
		),	
		array(
			"type" => "wt_group_start",
			"group_id" => "video_dailymotion",
		),
			array(
				"name" => __("Dailymotion",'wt_admin'),
				"type" => "wt_open"
			),
				array(
					"name" => __("Autoplay",'wt_admin'),
					"desc" => __("Determines if the video will begin playing automatically when the player loads.",'wt_admin'),
					"id" => "dailymotion_autoplay",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Related",'wt_admin'),
					"desc" => __("Determines if the player loads related videos when the current video begins playback.",'wt_admin'),
					"id" => "dailymotion_related",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Chromeless",'wt_admin'),
					"desc" => __("Determines if the player should display controls or not during video playback.",'wt_admin'),
					"id" => "dailymotion_chromeless",
					"default" => false,
					"type" => "wt_toggle"
				),
				
			array(
				"type" => "wt_close"
			),
			array(
				"type" => "wt_reset"
			),
		array(
			"type" => "wt_group_end",
		),	
		array(
			"type" => "wt_group_start",
			"group_id" => "video_metacafe",
		),
			array(
				"name" => __("Metacafe",'wt_admin'),
				"type" => "wt_open"
			),
				array(
					"name" => __("Autoplay",'wt_admin'),
					"desc" => __("Set the button to ON if you want the video to play immediately on loading in the browser.",'wt_admin'),
					"id" => "metacafe_autoplay",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Flashvars (optional)",'wt_admin'),
					"desc" => __("Optional variables to pass for Flash Player...",'wt_admin'),
					"id" => "metacafe_flashvars",
					"default" => "",
					"type" => "wt_text",
				),
			array(
				"type" => "wt_close"
			),
			array(
				"type" => "wt_reset"
			),
		array(
			"type" => "wt_group_end",
		),		
		array(
			"type" => "wt_group_start",
			"group_id" => "video_bliptv",
		),
			array(
				"name" => __("Blip Tv",'wt_admin'),
				"type" => "wt_open"
			),
				array(
					"name" => __("Autoplay",'wt_admin'),
					"desc" => __("Set the button to ON if you want the video to play immediately on loading in the browser.",'wt_admin'),
					"id" => "bliptv_autoplay",
					"default" => false,
					"type" => "wt_toggle"
				),
			array(
				"type" => "cwt_lose"
			),
			array(
				"type" => "wt_reset"
			),
		array(
			"type" => "wt_group_end",
		),
		array(
			"type" => "wt_group_start",
			"group_id" => "video_flash",
		),
			array(
				"name" => __("Flash",'wt_admin'),
				"type" => "wt_open"
			),
				array(
					"name" => __("Autoplay",'wt_admin'),
					"desc" => __("Set the button to ON if you want the video to play immediately on loading in the browser.",'wt_admin'),
					"id" => "flash_autoplay",
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Flashvars (optional)",'wt_admin'),
					"desc" => __("Optional variables to pass for Flash Player...",'wt_admin'),
					"id" => "flash_flashvars",
					"default" => "",
					"type" => "wt_text",
				),
			array(
				"type" => "wt_close"
			),
			array(
				"type" => "wt_reset"
			),
		array(
			"type" => "wt_group_end",
		),
	array(
		"type" => "wt_close_group"
	),
	
	array(
		"open_class" => "audiosSwitch",
		"type" => "wt_open_group",
	),		
		array(
			"class" => "nav-tab-wrapper",
			"default" => '',
			"options" => array(
				"audio_html5" => __('Html5 Audio','wt_admin'),
			),
			"type" => "wt_wt_navigation",
		),	
		array(
			"type" => "wt_group_start",
			"group_id" => "audio_html5",
		),
			array(
				"name" => __("Html5 Audio",'wt_admin'),
				"type" => "wt_open"
			),				
				array(
					"name" => __("Autoplay",'wt_admin'),
					"id" => "audio_html5_autoplay",
					"desc" => __("Set the button to ON if you want the audio to play immediately on loading in the browser.",'wt_admin'),
					"default" => false,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Preload",'wt_admin'),
					"id" => "audio_html5_preload",
					"desc" => __("If the button is OFF, the audio won't start downloading as soon the page is loaded.",'wt_admin'),
					"default" => true,
					"type" => "wt_toggle"
				),
				array(
					"name" => __("Loop",'wt_admin'),
					"desc" => __('Plays the initial audio again and again.','wt_admin'),
					"id" => "audio_html5_loop",
					"default" => false,
					"type" => "wt_toggle"
				),
			array(
				"type" => "wt_close"
			),
			array(
				"type" => "wt_reset"
			),
		array(
			"type" => "wt_group_end",
		),
	array(
		"type" => "wt_close_group"
	),			
);
return array(
	'auto' => true,
	'name' => 'media',
	'options' => $wt_options
);