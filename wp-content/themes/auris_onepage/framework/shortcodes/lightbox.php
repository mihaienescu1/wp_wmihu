<?php
function wt_shortcode_lightbox($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'href' => '#',
		'title' => '',
		'group' => '',
		'width' => false,
		'height' => false,
		'iframe' => 'false',
		'inline' => 'false',
	), $atts));
				
	if($width && is_numeric($width)){
		if (!preg_match_all("/(jpg|gif|jpeg|png|tif)/i", $href, $matches)) {
			$width = '?width='.$width.'';
		}
		else {
			$width = '&amp;w='.$width.'';
		}
	}else{
		$width = '';
	}
	if($height && is_numeric($height)){
		if (!preg_match_all("/(jpg|gif|jpeg|png|tif)/i", $href, $matches)) {
			if ($width) {
				$height = '&amp;height='.$height.'';
			}
			else {
				$height = '?height='.$height.'';
			}
		}
		else {
			$height = '&amp;h='.$height.'';
		}
	}else{
		$height = '';
	}	
	
	if($iframe != 'false'){
		$iframe = '&amp;iframe=true';
	}else{
		$iframe = '';
	}
	
	if($inline != 'false'){
		$inline = $href;
		$href = '#';
	}else{
		$inline = '';
	}
	
	$content = do_shortcode($content);	
	
	if (!preg_match_all("/(jpg|gif|jpeg|png|tif)/i", $href, $matches)) {
		return '<a href="'.$href.$width.$height.$iframe.$inline.'" data-rel="'.$code.''.($group?'['.$group.']':'').'" title="'.$title.'">'.$content.'</a>';
	}
	else {
		if($height || $width) {
			$image_src = aq_resize( $href, $width, $height, true );
			return '<a href="'.$image_src.'" data-rel="'.$code.''.($group?'['.$group.']':'').'" title="'.$title.'">'.$content.'</a>';
		}
		else {
			return '<a href="'.$href.'" data-rel="'.$code.''.($group?'['.$group.']':'').'" title="'.$title.'">'.$content.'</a>';
		}
	}
}

add_shortcode('wt_lightbox', 'wt_shortcode_lightbox');