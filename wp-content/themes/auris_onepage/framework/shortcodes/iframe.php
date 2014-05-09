<?php
function wt_shortcode_iframe($atts, $content = null) {
	extract(shortcode_atts(array(
		'location' => '',
		'width' => false,
		'height' => false,
	), $atts));
	
	$width = $width?' width="'.$width.'"':'';
	$height = $height?' height="'.$height.'"':'';
	
	return '<iframe src="'.$location.'"'.$width.$height.'></iframe>';
}

add_shortcode('wt_iFrame','wt_shortcode_iframe');