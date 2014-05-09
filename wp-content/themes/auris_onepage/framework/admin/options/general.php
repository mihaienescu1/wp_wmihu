<?php
if (! function_exists("wt_home_page_process")) {
	function wt_home_page_process($option,$value) {
		update_option( 'page_on_front', $value );
		if(!empty($value)){
			update_option( 'show_on_front', 'page' );
		}else{
			if(!get_option('page_for_posts')){
				update_option( 'show_on_front', 'posts' );
			}
		}
		return $value;
	}
}

$wt_options = array(
	array(
		"class" => "nav-tab-wrapper",
		"default" => '',
		"options" => array(
			"general_settings" => __('General','wt_admin'),
			"homepage_settings" => __('Homepage','wt_admin'),
			"custom_favicons" => __('Custom Favicons','wt_admin'),
			//"twitter_api" => __('Twitter','wt_admin'),
			"google_analytics" => __('Google Analytics','wt_admin'),
			"custom_stylesheet" => __('Custom Css','wt_admin'),
		),
		"type" => "wt_navigation",
	),	
	array(
		"type" => "wt_group_start",
		"group_id" => "general_settings",
	),
		array(
			"name" => __("General Settings",'wt_admin'),
			"type" => "wt_open"
		),		
		array(
			"name" => __("Enable Responsive",'wt_admin'),
			"desc" => sprintf(__('Set ON to enable responsive mode.','wt_admin')),
			"id" => "enable_responsive",
			"default" => true,
			"type" => "wt_toggle"
		),	
		array(
			"name" => __("Custom Logo",'wt_admin'),
			"desc" =>__( "Enter the full URL of your logo image: e.g http://www.site.com/logo.png",'wt_admin'),
			"id" => "logo",
			"default" =>  "http://whoathemes.net/pics/logos/auris.png",
			"type" => "wt_upload",
			"crop" => "false"
		),
		array(
			"name" => __("Display Text Logo",'wt_admin'),
			"desc" => sprintf(__('Set ON if you want to use plain logo','wt_admin')),
			"id" => "display_logo",
			"default" => false,
			"type" => "wt_toggle"
		),
		array(
			"name" => __("Enter Plain Text Logo",'wt_admin'),
			"desc" => sprintf(__('Please insert a text here to use a plain text logo rather than an image.','wt_admin')),
			"id" => "plain_logo",
			"default" => 'Auris',
			"type" => "wt_text"
		),
		array(
			"name" => __("Display Site Description",'wt_admin'),
			"desc" => sprintf(__('This enables site description, only if you disable custom logo.','wt_admin'),get_option('siteurl')),
			"id" => "display_site_desc",
			"default" => true,
			"type" => "wt_toggle"
		),

		array(
			"name" => __("Color Schemes",'wt_admin'),
			"desc" => __("Select which color schemes type to use.",'wt_admin'),
			"id" => "skin",
			"default" => 'default',
			"options" => array(
				"default" => __('Yellow','wt_admin'),
				"orange" => __('Orange','wt_admin'),
				"pink" => __('Pink','wt_admin'),
				"green" => __('Green','wt_admin'),
				"blue" => __('Blue','wt_admin'),
				"red" => __('Red','wt_admin'),
				"cyan" => __('Cyan','wt_admin'),
				"brown" => __('Brown','wt_admin'),
				"black" => __('Black','wt_admin'),
			),
			"chosen" => "true",
			"type" => "wt_select",
		),
		array(
			"name" => __("Sidebar Position", 'wt_admin'),
			"id" => "sidebar_alignment",
			"desc" => __("Which side would you like your sidebar? (This is the sidebar content area and not the auto hiding one)", 'wt_admin'),
			"options" => array( "left" => "Left", "right" => "Right"),
			"default" => "right",
			"type" => "wt_radio"
		),

		array(
			"name" => __("Menu Icons",'wt_admin'),
			"desc"=>__('Set ON if you want to use Menu Icons. Please check in Screen Options that CSS Classes are checked.','wt_admin'),
			"id" => "menu_icons",
			"default" => true,
			"type" => "wt_toggle"
		),	
		array(
			"name" => __("Responsive Navigation",'wt_admin'),
			"desc" => __("Specify the navigation type you would like to display on small devices like tablets or smartphones.", 'wt_admin'),
			"id" => "responsive_nav",
			"default" => 'slide_out',
			"options" => array(
				"drop_down" => __('Drop Down Navigation','wt_admin'),
				"slide_out" => __('Slide Out Navigation','wt_admin'),
			),
			"type" => "wt_select",
		),		
		array(
			"name" => __("Disable Breadcrumbs",'wt_admin'),
			"desc" => __("This option disables your website's breadcrumb navigation.",'wt_admin'),
			"id" => "disable_breadcrumb",
			"default" => 0,
			"type" => "wt_toggle"
		),		
		array(
			"name" => __("Sticky Header",'wt_admin'),
			"desc" => __("This option enables the sticky header when scrolling down.",'wt_admin'),
			"id" => "sticky_header",
			"default" => true,
			"type" => "wt_toggle"
		),
		array(
			"name" => __("Scroll to Top",'wt_admin'),
			"desc" => __("This option enables a scroll to top button at the right bottom corner of site pages.",'wt_admin'),
			"id" => "scroll_to_top",
			"default" => false,
			"type" => "wt_toggle"
		),
		array(
			"name" => __("Enable Animations",'wt_admin'),
			"desc" => __("This option enables site animations.",'wt_admin'),
			"id" => "enable_animation",
			"default" => true,
			"type" => "wt_toggle"
		),
		array(
			"name" => __("Hide logo on small resolutions",'wt_admin'),
			"desc" => __("This option hides logo on small resolutions.",'wt_admin'),
			"id" => "disable_logo",
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
		"group_id" => "homepage_settings",
	),	
		array(
			"name" => __("Homepage Settings",'wt_admin'),
			"type" => "wt_open"
		),
		array(
			"name" => __("Display Home Page Link",'wt_admin'),
			"desc" => __("Show a home link in the top menu?",'wt_admin'),
			"id" => "home_show",
			"default" => true,
			"type" => "wt_toggle"
		),
		array(
			"name" => __("Home Page Menu Text",'wt_admin'),
			"desc" => __("Here you can enter the text for home menu.",'wt_admin'),
			"id" => "home_text",
			"default" => "Home",
			"rows" => 3,
			"type" => "wt_text"
		),
		array(
			"name" => __("SlideShow Type",'wt_admin'),
			"desc" => __("Select which type of slidershow you want to use. <code>Unfortunately, Anything Slider is not RESPONSIVE..., yet</code>.",'wt_admin'),
			"id" => "slideshow_type",
			"default" => 'flex',
			"options" => array(
				"disable" => __('No Slider','wt_admin'),
				"flex" => __('Flex Slider','wt_admin'),
				"nivo" => __('Nivo Slider','wt_admin'),
				"cycle" => __('Cycle Slider','wt_admin'),
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
		"type" => "wt_group_end",
	),	
	array(
		"type" => "wt_group_start",
		"group_id" => "custom_favicons",
	),	
		array(
			"name" => __("Favicons",'wt_admin'),
			"type" => "wt_open"
		),					
			array(	
				"name" => __("Favicon", 'wt_admin'),
				"desc" => __("Enter the full URL of your favicon e.g. http://www.site.com/favicon.ico", 'wt_admin'),
				"id" => "favicon",
				"default" => 'http://whoathemes.net/pics/favicons/favicon.gif',
				"type" => "wt_upload",
				"crop" => "false"
			),			
			array(	
				"name" => __("Apple Touch Icon 57x57", 'wt_admin'),
				"desc" => __("Enter the full URL of your favicon e.g. http://www.site.com/favicon_57.png", 'wt_admin'),
				"id" => "favicon_57",
				"default" => 'http://whoathemes.net/pics/favicons/favicon_57.png',
				"type" => "wt_upload",
				"crop" => "false"
			),		
			array(	
				"name" => __("Apple Touch Icon 72x72", 'wt_admin'),
				"desc" => __("Enter the full URL of your favicon e.g. http://www.site.com/favicon_72.png", 'wt_admin'),
				"id" => "favicon_72",
				"default" => 'http://whoathemes.net/pics/favicons/favicon_72.png',
				"type" => "wt_upload",
				"crop" => "false"
			),		
			array(	
				"name" => __("Apple Touch Icon 114x114", 'wt_admin'),
				"desc" => __("Enter the full URL of your favicon e.g. http://www.site.com/favicon_114.png", 'wt_admin'),
				"id" => "favicon_114",
				"default" => 'http://whoathemes.net/pics/favicons/favicon_114.png',
				"type" => "wt_upload",
				"crop" => "false"
			),	
			array(	
				"name" => __("Apple Touch Icon 144x144", 'wt_admin'),
				"desc" => __("Enter the full URL of your favicon e.g. http://www.site.com/favicon_144.png", 'wt_admin'),
				"id" => "favicon_144",
				"default" => 'http://whoathemes.net/pics/favicons/favicon_144.png',
				"type" => "wt_upload",
				"crop" => "false"
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
		"group_id" => "twitter_api",
	),	
		array(
			"name" => __("Twitter",'wt_admin'),
			"type" => "wt_open"
		),	
			array(
				"desc" => __("With the advent of Twitter's 1.1 API and the deprecation of 1.0, client side timeline fetching and parsing is no longer feasable due to the authentication restrictions imposed by OAuth. That's why you need to have a twitter App for your usage in order to obtain OAuth credentials, see <a href=\"https://dev.twitter.com/apps\">https://dev.twitter.com/apps</a> for help. After creating your app, fill below fields with your OAuth credentials.", 'wt_admin'),
				"one_col" => true,
				"type" => "wt_desc"
			),		
			array(	
				"name" => __("Consumer key", 'wt_admin'),
				"desc" => __("YOUR_CONSUMER_KEY.", 'wt_admin'),
				"id" => "consumer_key",
				"default" => "",
				"type" => "wt_text"
			),	
			array(	
				"name" => __("Consumer secret", 'wt_admin'),
				"desc" => __("YOUR_CONSUMER_SECRET.", 'wt_admin'),
				"id" => "consumer_secret",
				"default" => "",
				"type" => "wt_text"
			),	
			array(	
				"name" => __("Access token", 'wt_admin'),
				"desc" => __("YOUR_ACCESS_TOKEN.", 'wt_admin'),
				"id" => "access_token",
				"default" => "",
				"type" => "wt_text"
			),
			array(	
				"name" => __("Access token secret", 'wt_admin'),
				"desc" => __("YOUR_ACCESS_TOKEN_SECRET.", 'wt_admin'),
				"id" => "access_token_secret",
				"default" => "",
				"type" => "wt_text"
			),
		array(
			"type" => "wt_close"
		),
		array(
			"type" => "wt_reset"
		),
	array(
		"type" => "wt_group_end",
	),	*/
	array(
		"type" => "wt_group_start",
		"group_id" => "google_analytics",
	),	
		array(
			"name" => __("Google Analytics",'wt_admin'),
			"type" => "wt_open"
		),			
			array(
				"name" => __("Google Analytics Code",'wt_admin'),
				"desc" => __("Paste your <a href='http://www.google.com/analytics/' target='_blank'>analytics code</a> here and it will be applied to each page.",'wt_admin'),
				"id" => "analytics",
				"default" => "",
				"elastic" => "true",
				"type" => "wt_textarea"
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
		"group_id" => "custom_stylesheet",
	),	
		array(
			"name" => __("Custom Css",'wt_admin'),
			"type" => "wt_open"
		),			
			array(	
				"name" => __("Custom Css", 'wt_admin'),
				//"desc" => __("Custom Css", 'wt_admin'),
				"id" => "custom_css",
				"default" => "",
				"elastic" => "true",
				"type" => "wt_textarea"
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
	'name' => 'general',
	'options' => $wt_options
);