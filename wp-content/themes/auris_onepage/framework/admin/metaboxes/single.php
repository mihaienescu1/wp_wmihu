<?php 
$config = array(
	'title' => __('Blog Single Options','wt_admin'),
	'id' => 'single',
	'pages' => array('post'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);
$options = array(
	array(
		"name" => __("Featured Post Entry",'wt_admin'),
		"desc" => __("Here you can choose to dispaly or not Featured Image/Video/Mp3/Slideshow in Single Blog post only.",'wt_admin'),
		"id" => "_featured_image",
		"default" => '',
		"type" => "wt_tritoggle",
	),
	array(
		"name" => __("Thumbnail Types",'wt_admin'),
		"desc" => sprintf(__("Thumbnail Types",'wt_admin'),THEME_NAME),
		"id" => "_thumbnail_type",
		"default" => 'timage',
		"options" => array(
			"timage" => __('Image','wt_admin'),
			"tvideo" => __('Video','wt_admin'),
			"tplayer" => __('Mp3','wt_admin'),
			"tslide" => __('Slide','wt_admin'),
		),
		"type" => "wt_select",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "thumbnail_player",
		"group_class" => "featured_type",
	),
	array(
		"name" => __("Mp3 Link",'wt_admin'),
		"desc" => __("",'wt_admin'),
		"size" => 30,
		"id" => "_thumbnail_player",
		"default" => '',
		"class" => 'full',
		"type" => "wt_text",
	),
	array(
		"type" => "wt_group_end",
	),
	
	array(
		"type" => "wt_group_start",
		"group_id" => "thumbnail_slide",
		"group_class" => "featured_type",
	),

	array(
		"name" => __("Slide Type",'wt_admin'),
		"id" => "_slide_type",
		"desc" => __("Here you can choose the type of slideshow you want to use on this post.",'wt_admin'),
		"default" => 'flex',
		"options" => array(
			"flex" => 'Flex Slider',
			"nivo" => 'Nivo Slider',
		),
		"type" => "wt_select",
	),
	array(
		"name" => __("Flex Slide Effect",'wt_admin'),
		"id" => "_flex_slide_effect",
		"desc" => __("Here you can choose the FLEX slide effect.",'wt_admin'),
		"default" => 'fade',
		"options" => array(
			"fade" => 'Fade',
			"slide" => 'Slide',
		),
		"type" => "wt_select",
	),
	array(
		"name" => __("Nivo Slide Effect",'wt_admin'),
		"id" => "_slide_effect",
		"desc" => __("Here you can choose the NIVO slide effect.",'wt_admin'),
		"default" => 'slideInLeft',
		"options" => array(
			"sliceDown" => 'sliceDown',
			"sliceDownLeft" => 'sliceDownLeft',
			"sliceUp" => 'sliceUp',
			"sliceUpLeft" => 'sliceUpLeft',
			"sliceUpDown" => 'sliceUpDown',
			"sliceUpDownLeft" => 'sliceUpDownLeft',
			"fade" => 'fade',
			"fold" => 'fold',
			"random" => 'random',
			"slideInRight" => 'slideInRight',
			"slideInLeft" => 'slideInLeft',
			"boxRandom" => 'boxRandom',
			"boxRain" => 'boxRain',
			"boxRainReverse" => 'boxRainReverse',
			"boxRainGrow" => 'boxRainGrow',
			"boxRainGrowReverse" => 'boxRainGrowReverse',
		),
		"type" => "wt_select",
	),
	array(
		"name" => __("Image 1 URL",'wt_admin'),
		"id" => "_slide_image_1_url",
		"desc" => __("Here you can upload the slider images.",'wt_admin'),
		"default" => '',
		"type" => "wt_upload",
	),
	array(
		"name" => __("Image 1 Caption",'wt_admin'),
		"id" => "_slide_image_1_caption",
		"desc" => __("If you want a caption for this image then you can introduce one here.",'wt_admin'),
		"default" => '',
		"type" => "wt_text",
	),
	array(
		"name" => __("Image 2 URL",'wt_admin'),
		"id" => "_slide_image_2_url",
		"desc" => __("Here you can upload the slider images.",'wt_admin'),
		"default" => '',
		"type" => "wt_upload",
	),
	array(
		"name" => __("Image 2 Caption",'wt_admin'),
		"id" => "_slide_image_2_caption",
		"desc" => __("If you want a caption for this image then you can introduce one here.",'wt_admin'),
		"default" => '',
		"type" => "wt_text",
	),
	array(
		"name" => __("Image 3 URL",'wt_admin'),
		"id" => "_slide_image_3_url",
		"desc" => __("Here you can upload the slider images.",'wt_admin'),
		"default" => '',
		"type" => "wt_upload",
	),
	array(
		"name" => __("Image 3 Caption",'wt_admin'),
		"id" => "_slide_image_3_caption",
		"desc" => __("If you want a caption for this image then you can introduce one here.",'wt_admin'),
		"default" => '',
		"type" => "wt_text",
	),
	array(
		"name" => __("Image 4 URL",'wt_admin'),
		"id" => "_slide_image_4_url",
		"desc" => __("Here you can upload the slider images.",'wt_admin'),
		"default" => '',
		"type" => "wt_upload",
	),
	array(
		"name" => __("Image 4 Caption",'wt_admin'),
		"id" => "_slide_image_4_caption",
		"desc" => __("If you want a caption for this image then you can introduce one here.",'wt_admin'),
		"default" => '',
		"type" => "wt_text",
	),
	array(
		"name" => __("Image 5 URL",'wt_admin'),
		"id" => "_slide_image_5_url",
		"desc" => __("Here you can upload the slider images.",'wt_admin'),
		"default" => '',
		"type" => "wt_upload",
	),
	array(
		"name" => __("Image 5 Caption",'wt_admin'),
		"id" => "_slide_image_5_caption",
		"desc" => __("If you want a caption for this image then you can introduce one here.",'wt_admin'),
		"default" => '',
		"type" => "wt_text",
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"name" => __("Layout",'wt_admin'),
		"desc" => __("Choose the layout for this single page/post.",'wt_admin'),
		"id" => "_sidebar_alignment",
		"default" => 'default',
		"options" => array(
			"default" => __('Default','wt_admin'),
			"full" => __('Full Width','wt_admin'),
			"right" => __('Right Sidebar','wt_admin'),
			"left" => __('Left Sidebar','wt_admin'),
		),
		"type" => "wt_select",
	),
	array(
		"name" => __("Disable Breadcrumbs",'wt_admin'),
		"desc" => __('This option disables breadcrumbs on a page/post.','wt_admin'),
		"id" => "_disable_breadcrumb",
		"label" => "Check to disable breadcrumbs on this post",
		"default" => "",
		"type" => "wt_tritoggle"
	),
	array(
		"name" => __("Custom Sidebar",'wt_admin'),
		"desc" => __("If there are any custum sidebars created in your theme option panel then you can choose one of them to be displayed on this.",'wt_admin'),
		"id" => "_sidebar",
		"prompt" => __("Choose one..",'wt_admin'),
		"default" => '',
		"options" => get_sidebar_options(),
		"type" => "wt_select",
	),
);
new wt_metaboxes($config,$options);