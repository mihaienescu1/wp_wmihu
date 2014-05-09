<?php
function wt_shortcode_tag($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'id_attr' => '',
		'class_attr' => '',
		'style' => '',
	), $atts));
	
	if ($id_attr != '') {
		$id_attr = ' id="'.$id_attr.'"';
	}	
	else $id_attr = '';
	
	if ($class_attr != '') {
		$class_attr = ' class="'.$class_attr.'"';
	}	
	else $class_attr = '';
	
	if ($style != '') {
		$style = ' style="'.$style.'"';
	}	
	else $style = '';
	$content = do_shortcode(stripslashes($content));	
	return <<<HTML
	<{$code}{$id_attr}{$class_attr}{$style}> {$content} </{$code}>
HTML;

}
add_shortcode('div', 'wt_shortcode_tag');
add_shortcode('span', 'wt_shortcode_tag');
add_shortcode('i', 'wt_shortcode_tag');