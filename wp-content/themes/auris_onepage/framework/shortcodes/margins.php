<?php
function wt_shortcode_margin($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => false,
	), $atts));
	
	$type = $type?' style="margin-bottom:'.$type.'px"':'';
	return '<div class="wt_marginControl"'.$type.'></div>';
}
add_shortcode('wt_margin','wt_shortcode_margin');