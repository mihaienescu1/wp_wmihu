<?php
function wt_shortcode_tooltip($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => '',
		'tooltip_placement' => '',
	), $atts));
	$output = '<span class="wt_tooltips"><a href="#" data-toggle="tooltip" data-placement="'.$tooltip_placement.'" title="'.$title.'">' . do_shortcode($content) . '</a></span>';
	return $output;
}
add_shortcode('wt_tooltip', 'wt_shortcode_tooltip');