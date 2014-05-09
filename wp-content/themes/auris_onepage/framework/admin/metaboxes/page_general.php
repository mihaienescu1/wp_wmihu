<?php
$config = array(
	'title' => sprintf(__('Page General Options','wt_admin'),THEME_NAME),
	'id' => 'page_general',
	'pages' => array('page'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);
function get_sidebar_options(){
	$sidebars = wt_get_option('sidebar','sidebars');
	if(!empty($sidebars)){
		$sidebars_array = explode(',',$sidebars);
		
		$options = array();
		foreach ($sidebars_array as $sidebar){
			$options[$sidebar] = $sidebar;
		}
		return $options;
	}else{
		return array();
	}
}
$options = array(
	array(
		"name" => __("Page Intro Area Type",'wt_admin'),
		"desc" => __("Choose which type of header area you want to display on this page. Static images / videos are setted in the \"Featured Image\" / \"Whoathemes Featured Video\" areas.",'wt_admin'),
		"id" => "_intro_type",
		"options" => array(
			"default" => "Default",
			"title" => "Title only",
			"custom" => "Custom text only",
			"title_custom" => "Title with custom text",
			/*"slideshow" => "Slideshow",
			"static_image" => "Static Image",
			"static_video" => "Static Video",*/
			"disable" => "Disable",
		),
		"default" => "default",
		"chosen" => "true", 
		"type" => "wt_select",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "intro_title",
		"group_class" => "intro_type",
	),
	array(
		"name" => __("Page Intro Custom Title",'wt_admin'),
		"desc" => __('If you enter a text here, this will override the default header title.','wt_admin'),
		"id" => "_custom_title",
		"default" => "",
		"class" => 'full',
		"type" => "wt_text"		
	),
	array(
		"type" => "group_end",
	),
	array(
		"type" => "group_start",
		"group_id" => "intro_text",
		"group_class" => "intro_type",
	),
	array(
		"name" => __("Page Intro Custom Text",'wt_admin'),
		"desc" => __('If you enter a text here, this will override your default header custom text only if custom text option above is selected.','wt_admin'),
		"id" => "_custom_introduce_text",
		"rows" => "2",
		"default" => "",
		"type" => "wt_textarea"
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "intro_slideshow",
		"group_class" => "intro_type",
	),
	array(
		"name" => __("SlideShow Type",'wt_admin'),
		"desc" => __("Select which type of slideshow you want on this page/post.",'wt_admin'),
		"id" => "_slideshow_type",
		"prompt" => __("Choose Slideshow Type",'wt_admin'),
		"default" => '',
		"options" => array(
			"flex" => __('Flex Slider','wt_admin'),
			"nivo" => __('Nivo Slider','wt_admin'),
			"anything" => __('Anything Slider','wt_admin'),
			"cycle" => __('Cycle Slider','wt_admin'),
		),
		"type" => "select",
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "slideshow_rev",
		"group_class" => "slideshow_type",
	),
	array(
		"name" => __("Rev SlideShow Type",'wt_admin'),
		"prompt" => __("Choose Slideshow Type",'wt_admin'),
		"desc" => __("Select which type of slideshow you want on this page/post.",'wt_admin'),
		"id" => "_rev_slideshow",
		"type" => "selectRev",
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"type" => "wt_group_start",
		"group_id" => "slideshow_layerS",
		"group_class" => "slideshow_type",
	),
	array(
		"name" => __("Layer SlideShow Type",'wt_admin'),
		"prompt" => __("Choose Slideshow Type",'wt_admin'),
		"desc" => __("Select which type of slideshow you want on this page/post.",'wt_admin'),
		"id" => "_layer_slideshow",
		"type" => "wt_selectLayerS",
	),
	array(
		"type" => "wt_group_end",
	),
	array(
		"name" => __("Display Full Width Contact Section",'wt_admin'),
		"desc" => __('This option enable Full Width Contact Section. Use only on your contact page.','wt_admin'),
		"id" => "_enable_fullcontact",
		//"label" => "Check to disable breadcrumbs on this post",
		"default" => false,
		"type" => "wt_toggle"
	),	
	array(
		"type" => "wt_group_start",
		"group_id" => "fullcontact_gmap",
		"group_class" => "fullcontact_gmap",
	),
	array(
		"name" => __("Gmap code for contact page",'wt_admin'),
		"desc" => __('Only for your contact page...','wt_admin'),
		"id" => "_fullcontact_gmap",
		"default" => "",
		"class" => 'full',
		"type" => "wt_textarea"		
	),
	array(
		"type" => "wt_group_end",
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
		"name" => __("Slogan Text",'wt_admin'),
		"desc" => __('Enter your slogan text here.','wt_admin'),
		"id" => "_slogan_text",
		"rows" => "2",
		"default" => "",
		"type" => "wt_textarea"
	),
	array(
		"name" => __("Slogan Author",'wt_admin'),
		"desc" => __('Enter your slogan author here.','wt_admin'),
		"id" => "_slogan_author",
		"rows" => "2",
		"default" => "",
		"type" => "wt_textarea"
	),
	array(
		"name" => __("Slogan Background Image",'wt_admin'),
		"desc" =>__( "You can paste the full URL (including <code>http://</code>) of the image to be used as a background image or you can simply upload it using the button.",'wt_admin'),
		"id" => "_slogan_bg",
		"default" => "",
		"type" => "wt_upload"
	),
	array(
		"name" => __("Custom Sidebar",'wt_admin'),
		"desc" => __("If there are any custum sidebars created in your theme option panel then you can choose one of them to be displayed on this.",'wt_admin'),
		"id" => "_sidebar",
		"prompt" => __("Choose one...",'wt_admin'),
		"default" => '',
		"options" => get_sidebar_options(),
		"type" => "wt_select",
	),
	
);

new wt_metaboxes($config,$options);