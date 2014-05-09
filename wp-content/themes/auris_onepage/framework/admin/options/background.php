<?php
$wt_options = array(
	array(
		"class" => "nav-tab-wrapper",
		"default" => '',
		"options" => array(
			"page" => __('Page','wt_admin'),
			"header" => __('Header','wt_admin'),
			"nav" => __('Navigation','wt_admin'),
			//"intro" => __('Intro','wt_admin'),
			"container" => __('Container','wt_admin'),
			"content" => __('Content','wt_admin'),
			"footer" => __('Footer','wt_admin'),
			"sections" => __('Sections','wt_admin'),
		),
		"type" => "wt_navigation",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "page",
	),
		array(
			"name" => __("Page Background",'wt_admin'),
			"type" => "wt_open"
		),
		array(
			"name" => __("Page Background Image",'wt_admin'),
			"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
			"id" => "page_bg",
			"default" => "",
			"type" => "wt_upload"
		),
		array(
			"name" => __("Page Background Position",'wt_admin'),
			"desc" => "Choose the background image position.",
			"id" => "page_position_x",
			"default" => 'center',
			"options" => array(
				"left" => __('Left','wt_admin'),
				"center" => __('Center','wt_admin'),
				"right" => __('Right','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Page Background Repeat",'wt_admin'),
			"desc" => "Choose the background image repeat style.",
			"id" => "page_repeat",
			"default" => 'no-repeat',
			"options" => array(
				"no-repeat" => __('No Repeat','wt_admin'),
				"repeat" => __('Repeat','wt_admin'),
				"repeat-x" => __('Repeat Horizontally','wt_admin'),
				"repeat-y" => __('Repeat Vertically','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Page Background Color",'wt_admin'),
			"desc" => __("Here you can choose a specific page background color. Set it to transparent in order to disable this.",'wt_admin'),
			"id" => "page_bg_color",
			"default" => "",
			"type" => "wt_color"		
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
		"group_id" => "header",
	),
		array(
			"name" => __("Header Background",'wt_admin'),
			"type" => "wt_open"
		),
		array(
			"name" => __("Header Background Image",'wt_admin'),
			"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
			"id" => "header_bg",
			"default" => "",
			"type" => "wt_upload"
		),
		array(
			"name" => __("Header Background Position",'wt_admin'),
			"desc" => "Choose the background image position.",
			"id" => "header_position_x",
			"default" => 'center',
			"options" => array(
				"left" => __('Left','wt_admin'),
				"center" => __('Center','wt_admin'),
				"right" => __('Right','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Header Background Repeat",'wt_admin'),
			"desc" => "Choose the background image repeat style.",
			"id" => "header_repeat",
			"default" => 'no-repeat',
			"options" => array(
				"no-repeat" => __('No Repeat','wt_admin'),
				"repeat" => __('Repeat','wt_admin'),
				"repeat-x" => __('Repeat Horizontally','wt_admin'),
				"repeat-y" => __('Repeat Vertically','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Header Background Color",'wt_admin'),
			"desc" => __("Here you can choose a specific page background color. Set it to transparent in order to disable this.",'wt_admin'),
			"id" => "header_bg_color",
			"default" => "",
			"type" => "wt_color"		
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
	
	/*array(
		"type" => "wt_group_start",
		"group_id" => "intro",
	),
		array(
			"name" => __("Intro Background",'wt_admin'),
			"type" => "wt_open"
		),
		array(
			"name" => __("Intro Background Image",'wt_admin'),
			"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
			"id" => "intro_bg",
			"default" => "",
			"type" => "wt_upload"
		),
		array(
			"name" => __("Intro Background Position",'wt_admin'),
			"desc" => "Choose the background image position.",
			"id" => "intro_position_x",
			"default" => 'center',
			"options" => array(
				"left" => __('Left','wt_admin'),
				"center" => __('Center','wt_admin'),
				"right" => __('Right','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Intro Background Repeat",'wt_admin'),
			"desc" => "Choose the background image repeat style.",
			"id" => "intro_repeat",
			"default" => 'no-repeat',
			"options" => array(
				"no-repeat" => __('No Repeat','wt_admin'),
				"repeat" => __('Repeat','wt_admin'),
				"repeat-x" => __('Repeat Horizontally','wt_admin'),
				"repeat-y" => __('Repeat Vertically','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Intro Background Color",'wt_admin'),
			"desc" => __("Here you can choose a specific intro background color. Set it to transparent in order to disable this.",'wt_admin'),
			"id" => "intro_bg_color",
			"default" => "",
			"type" => "wt_color"		
		),
		array(
			"type" => "wt_close"
		),
		array(
			"type" => "wt_reset"
		),
	array(
		"type" => "wt_group_end",
	),*/
	array(
		"type" => "wt_group_start",
		"group_id" => "container",
	),
		array(
			"name" => __("Container Background",'wt_admin'),
			"type" => "wt_open"
		),
		array(
			"name" => __("Container Background Image",'wt_admin'),
			"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
			"id" => "container_bg",
			"default" => "",
			"type" => "wt_upload"
		),
		array(
			"name" => __("Container Background Position",'wt_admin'),
			"desc" => "Choose the background image position.",
			"id" => "container_position_x",
			"default" => 'center',
			"options" => array(
				"left" => __('Left','wt_admin'),
				"center" => __('Center','wt_admin'),
				"right" => __('Right','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Container Background Repeat",'wt_admin'),
			"desc" => "Choose the background image repeat style.",
			"id" => "container_repeat",
			"default" => 'no-repeat',
			"options" => array(
				"no-repeat" => __('No Repeat','wt_admin'),
				"repeat" => __('Repeat','wt_admin'),
				"repeat-x" => __('Repeat Horizontally','wt_admin'),
				"repeat-y" => __('Repeat Vertically','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Container Background Color",'wt_admin'),
			"desc" => __("Here you can choose a specific intro background color. Set it to transparent in order to disable this.",'wt_admin'),
			"id" => "container_bg_color",
			"default" => "",
			"type" => "wt_color"		
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
		"group_id" => "content",
	),
		array(
			"name" => __("Content Background",'wt_admin'),
			"type" => "wt_open"
		),
		array(
			"name" => __("Content Background Image",'wt_admin'),
			"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
			"id" => "content_bg",
			"default" => "",
			"type" => "wt_upload"
		),
		array(
			"name" => __("Content Background Position",'wt_admin'),
			"desc" => "Choose the background image position.",
			"id" => "content_position_x",
			"default" => 'center',
			"options" => array(
				"left" => __('Left','wt_admin'),
				"center" => __('Center','wt_admin'),
				"right" => __('Right','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Content Background Repeat",'wt_admin'),
			"desc" => "Choose the background image repeat style.",
			"id" => "content_repeat",
			"default" => 'no-repeat',
			"options" => array(
				"no-repeat" => __('No Repeat','wt_admin'),
				"repeat" => __('Repeat','wt_admin'),
				"repeat-x" => __('Repeat Horizontally','wt_admin'),
				"repeat-y" => __('Repeat Vertically','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Content Background Color",'wt_admin'),
			"desc" => __("Here you can choose a specific intro background color. Set it to transparent in order to disable this.",'wt_admin'),
			"id" => "content_bg_color",
			"default" => "",
			"type" => "wt_color"		
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
		"group_id" => "nav",
	),
		array(
			"name" => __("Navigation Background",'wt_admin'),
			"type" => "wt_open"
		),
		array(
			"name" => __("Navigation Background Image",'wt_admin'),
			"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
			"id" => "nav_bg",
			"default" => "",
			"type" => "wt_upload"
		),
		array(
			"name" => __("Navigation Background Position",'wt_admin'),
			"desc" => "Choose the background image position.",
			"id" => "nav_position_x",
			"default" => 'center',
			"options" => array(
				"left" => __('Left','wt_admin'),
				"center" => __('Center','wt_admin'),
				"right" => __('Right','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Navigation Background Repeat",'wt_admin'),
			"desc" => "Choose the background image repeat style.",
			"id" => "nav_repeat",
			"default" => 'no-repeat',
			"options" => array(
				"no-repeat" => __('No Repeat','wt_admin'),
				"repeat" => __('Repeat','wt_admin'),
				"repeat-x" => __('Repeat Horizontally','wt_admin'),
				"repeat-y" => __('Repeat Vertically','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Navigation Background Color",'wt_admin'),
			"desc" => __("Here you can choose a specific page background color. Set it to transparent in order to disable this.",'wt_admin'),
			"id" => "nav_bg_color",
			"default" => "",
			"type" => "wt_color"		
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
		"group_id" => "footer",
	),
	
		array(
			"name" => __("Footer Top Background",'wt_admin'),
			"type" => "wt_open"
		),
		array(
			"name" => __("Custom Footer Top Image",'wt_admin'),
			"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
			"id" => "footer_top_bg",
			"default" => "",
			"type" => "wt_upload"
		),
		array(
			"name" => __("Footer Top Position",'wt_admin'),
			"desc" => "Choose the background image position.",
			"id" => "footer_top_position_x",
			"default" => 'center',
			"options" => array(
				"left" => __('Left','wt_admin'),
				"center" => __('Center','wt_admin'),
				"right" => __('Right','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Footer Top Repeat",'wt_admin'),
			"desc" => "Choose the background image repeat style.",
			"id" => "footer_top_repeat",
			"default" => 'no-repeat',
			"options" => array(
				"no-repeat" => __('No Repeat','wt_admin'),
				"repeat" => __('Repeat','wt_admin'),
				"repeat-x" => __('Repeat Horizontally','wt_admin'),
				"repeat-y" => __('Repeat Vertically','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Footer Top Background Color",'wt_admin'),
			"desc" => __("If you specify a color below, this option will override the global configuration. Set it to transparent in order to disable this.",'wt_admin'),
			"id" => "footer_top_color",
			"default" => "",
			"type" => "wt_color"		
		),

		array(
			"type" => "wt_close"
		),
		array(
			"name" => __("Footer Background",'wt_admin'),
			"type" => "wt_open"
		),
		array(
			"name" => __("Custom Footer Image",'wt_admin'),
			"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
			"id" => "footer_bg",
			"default" => "",
			"type" => "wt_upload"
		),
		array(
			"name" => __("Footer Position",'wt_admin'),
			"desc" => "Choose the background image position.",
			"id" => "footer_position_x",
			"default" => 'center',
			"options" => array(
				"left" => __('Left','wt_admin'),
				"center" => __('Center','wt_admin'),
				"right" => __('Right','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Footer Repeat",'wt_admin'),
			"desc" => "Choose the background image repeat style.",
			"id" => "footer_repeat",
			"default" => 'no-repeat',
			"options" => array(
				"no-repeat" => __('No Repeat','wt_admin'),
				"repeat" => __('Repeat','wt_admin'),
				"repeat-x" => __('Repeat Horizontally','wt_admin'),
				"repeat-y" => __('Repeat Vertically','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Footer Background Color",'wt_admin'),
			"desc" => __("If you specify a color below, this option will override the global configuration. Set it to transparent in order to disable this.",'wt_admin'),
			"id" => "footer_color",
			"default" => "",
			"type" => "wt_color"		
		),
		
		array(
			"type" => "wt_close"
		),
		array(
			"name" => __("Footer Bottom Background",'wt_admin'),
			"type" => "wt_open"
		),
		array(
			"name" => __("Custom Footer Bottom Image",'wt_admin'),
			"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
			"id" => "footer_bottom_bg",
			"default" => "",
			"type" => "wt_upload"
		),
		array(
			"name" => __("Footer Bottom Position",'wt_admin'),
			"desc" => "Choose the background image position.",
			"id" => "footer_bottom_position_x",
			"default" => 'center',
			"options" => array(
				"left" => __('Left','wt_admin'),
				"center" => __('Center','wt_admin'),
				"right" => __('Right','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Footer Bottom Repeat",'wt_admin'),
			"desc" => "Choose the background image repeat style.",
			"id" => "footer_bottom_repeat",
			"default" => 'no-repeat',
			"options" => array(
				"no-repeat" => __('No Repeat','wt_admin'),
				"repeat" => __('Repeat','wt_admin'),
				"repeat-x" => __('Repeat Horizontally','wt_admin'),
				"repeat-y" => __('Repeat Vertically','wt_admin'),
			),
			"type" => "wt_select",
		),
		array(
			"name" => __("Footer Bottom Background Color",'wt_admin'),
			"desc" => __("If you specify a color below, this option will override the global configuration. Set it to transparent in order to disable this.",'wt_admin'),
			"id" => "footer_bottom_color",
			"default" => "",
			"type" => "wt_color"		
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
		"group_id" => "sections",
	),
		array(
			"name" => __("Sections Background",'wt_admin'),
			"type" => "wt_open"
		),
			array(
				"name" => __("Section #1 Background Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
				"id" => "section_1_bg_image",
				"default" => "",
				"type" => "wt_upload"
			),
			array(
				"name" => __("Section #1 Background Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_1_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #1 Border Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_1_border_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #2 Background Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
				"id" => "section_2_bg_image",
				"default" => "",
				"type" => "wt_upload"
			),
			array(
				"name" => __("Section #2 Background Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_2_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #2 Border Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_2_border_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #3 Background Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
				"id" => "section_3_bg_image",
				"default" => "",
				"type" => "wt_upload"
			),
			array(
				"name" => __("Section #3 Background Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_3_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #3 Border Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_3_border_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #4 Background Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
				"id" => "section_4_bg_image",
				"default" => "",
				"type" => "wt_upload"
			),
			array(
				"name" => __("Section #4 Background Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_4_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #4 Border Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_4_border_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #5 Background Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
				"id" => "section_5_bg_image",
				"default" => "",
				"type" => "wt_upload"
			),
			array(
				"name" => __("Section #5 Background Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_5_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #5 Border Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_5_border_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #6 Background Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
				"id" => "section_6_bg_image",
				"default" => "",
				"type" => "wt_upload"
			),
			array(
				"name" => __("Section #6 Background Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_6_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #6 Border Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_6_border_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #7 Background Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
				"id" => "section_7_bg_image",
				"default" => "",
				"type" => "wt_upload"
			),
			array(
				"name" => __("Section #7 Background Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_7_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #7 Border Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_7_border_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #8 Background Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
				"id" => "section_8_bg_image",
				"default" => "",
				"type" => "wt_upload"
			),
			array(
				"name" => __("Section #8 Background Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_8_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #8 Border Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_8_border_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #9 Background Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
				"id" => "section_9_bg_image",
				"default" => "",
				"type" => "wt_upload"
			),
			array(
				"name" => __("Section #9 Background Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_9_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #9 Border Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_9_border_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #10 Background Image",'wt_admin'),
				"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
				"id" => "section_10_bg_image",
				"default" => "",
				"type" => "wt_upload"
			),
			array(
				"name" => __("Section #10 Background Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_10_color",
				"default" => "",
				"type" => "wt_color"		
			),
			array(
				"name" => __("Section #10 Border Color",'wt_admin'),
				"desc" => __("Here you can choose a specific background color for this section. Set it to transparent in order to disable this.",'wt_admin'),
				"id" => "section_10_border_color",
				"default" => "",
				"type" => "wt_color"		
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
);
return array(
	'auto' => true,
	'name' => 'background',
	'options' => $wt_options
);