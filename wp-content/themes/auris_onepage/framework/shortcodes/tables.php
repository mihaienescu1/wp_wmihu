<?php
function wt_shortcode_table($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'id' => false,
		'align' => false,
		'width' => false,
	), $atts));		
	
	$id = $id?' id="'.$id.'"':'';
	$centered = $align=="center" ? $centered=true : $centered=false;
	$align = $align?' align'.$align:'';
	$width = $width?' style="width:'.$width.'px"':'';
	
	if (!$centered) {	
		return '<div'.$id.$width.' class="wt_styled_table' . $align . '">' . do_shortcode(trim($content)) . '</div>';
	} else {
		return '<div'.$id.' class="wt_styled_table"><div class="wt_styled_table_inner aligncenter"'.$width.'>' . do_shortcode(trim($content)) . '</div></div>';
	}
}
add_shortcode('wt_styled_table','wt_shortcode_table');