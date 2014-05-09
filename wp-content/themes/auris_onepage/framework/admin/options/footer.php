<?php
if (! function_exists("wt_footer_column_option")) {
	function wt_footer_column_option($value, $default) {
		
		echo '<script type="text/javascript" src="' . THEME_ADMIN_ASSETS_URI . '/js/theme-footer-column.js"></script>';
		echo '<div class="theme-footer-columns">';
		//echo '<div>';
		echo '<a href="#" rel="1"><img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/1.png" /></a>';
		echo '<a href="#" rel="2"><img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/2.png" /></a>';
		echo '<a href="#" rel="3"><img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/3.png" /></a>';
		echo '<a href="#" rel="4"><img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/4.png" /></a>';
		echo '<a href="#" rel="5"><img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/5.png" /></a>';
		//echo '</div><div>';
		echo '<a href="#" rel="wt_four_fifth_one_fifth"><img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/four_fifth_one_fifth.png" /></a>';
		echo '<a href="#" rel="wt_one_fifth_four_fifth">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/one_fifth_four_fifth.png" /></a>';
		echo '<a href="#" rel="wt_one_fifth_two_fifth_two_fifth">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/one_fifth_two_fifth_two_fifth.png" /></a>';
		echo '<a href="#" rel="wt_one_fourth_one_fourth_one_half">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/one_fourth_one_fourth_one_half.png" /></a>';
		echo '<a href="#" rel="wt_one_fourth_three_fourth">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/one_fourth_three_fourth.png" /></a>';
		//echo '</div><div>';
		echo '<a href="#" rel="wt_one_half_one_fourth_one_fourth">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/one_half_one_fourth_one_fourth.png" /></a>';
		echo '<a href="#" rel="wt_one_fourth_one_half_one_fourth">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/one_fourth_one_half_one_fourth.png" /></a>';
		echo '<a href="#" rel="wt_one_third_two_third">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/one_third_two_third.png" /></a>';
		echo '<a href="#" rel="wt_three_fifth_two_fifth">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/three_fifth_two_fifth.png" /></a>';
		echo '<a href="#" rel="wt_three_fourth_one_fourth">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/three_fourth_one_fourth.png" /></a>';
		//echo '</div><div>';
		echo '<a href="#" rel="wt_two_fifth_three_fifth">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/two_fifth_three_fifth.png" /></a>';
		echo '<a href="#" rel="wt_two_fifth_two_fifth_one_fifth">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/two_fifth_two_fifth_one_fifth.png" /></a>';
		echo '<a href="#" rel="wt_two_third_one_third">
			<img src="' . THEME_ADMIN_ASSETS_URI . '/images/footer_column/two_third_one_third.png" /></a>';
		//echo '</div><div>';
		echo '<input type="hidden" value="' . $default . '" name="' . $value['id'] . '" id="' . $value['id'] . '"/>';
		echo '</div>';
	}
}
$wt_options = array(
	array(
		"name" => __("Footer",'wt_admin'),
		"type" => "wt_title"
	),
	array(
		"name" => __("Footer",'wt_admin'),
		"type" => "wt_open"
	),
		array(
			"name" => __("Footer Top",'wt_admin'),
			"desc" => __("If the button is set to OFF then the footer top area won't be displayed.",'wt_admin'),
			"id" => "footer_top",
			"default" => true,
			"type" => "wt_toggle"
		),
		array(
			"name" => __("Footer",'wt_admin'),
			"desc" => __("If the button is set to OFF then the footer area won't be displayed.",'wt_admin'),
			"id" => "footer",
			"default" => true,
			"type" => "wt_toggle"
		),
		array(
			"name" => __("Footer Bottom",'wt_admin'),
			"desc" => __("If the button is set to OFF then the sub footer area won't be displayed.",'wt_admin'),
			"id" => "sub_footer",
			"default" => true,
			"type" => "wt_toggle"
		),
		array(
			"name" => __("Footer Column Layout",'wt_admin'),
			"desc" => __("Choose the footer column layout.",'wt_admin'),
			"id" => "column",
			"function" => "wt_footer_column_option",
			"default" => "4",
			"type" => "wt_custom"
		),
		array(
			"name" => __("Copyright Text",'wt_admin'),
			"desc" => __("Here you can enter the copyright text which is displayed in the sub footer.",'wt_admin'),
			"id" => "copyright",
			"default" => "Copyright &copy; 2013 Company Name, Inc. All Rights Reserved.",
			"rows" => 3,
			"type" => "wt_textarea"
		),
	array(
		"type" => "wt_close"
	),
	array(
		"type" => "wt_reset"
	),
);
return array(
	'auto' => true,
	'name' => 'footer',
	'options' => $wt_options
);