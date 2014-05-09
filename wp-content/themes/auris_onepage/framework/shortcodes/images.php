<?php
function wt_shortcode_image($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => '',
		'width' => false,
		'height' => false,
		'align' => false,
		'lightbox' => 'false',
		'group' => '',
		'icon' => false,
		'link' => '#',
		'link_target' => false,	
	), $atts));		
	
	//if(!$width){ $width = '210'; }
	if(!$height){ $height = '250'; }
	$style = ($width ? ' style="width:'.$width.'px"' : '');
	
	global $layout;
	
	if ($width < 400) {
		$img_width = 400;
	} else {
		$img_width = $width;
	}
	
	$location = trim($content);
	$no_link = '';
		
	if($lightbox == 'true'){
		if($link == '#'){
			$link = $location;
		}
	}else{
		if($link == '#'){
			$no_link = ' no_link';
		}
	}
	$link_target = $link_target?' target="'.$link_target.'"':'';
	$image = aq_resize( wt_get_image_src($location), $img_width, $height, true ); //resize & crop img
	$content = '<img alt="'.$title.'" src="'. $image .'" />';
		return '<span class="wt_image_frame wt_styled_image'.($align?' align'.$align:'').'"'.$style.'><span class="wt_image_holder"><a'.($lightbox =='true'?' data-rel="lightbox'.($group?'['.$group.']':'').'"':'').$link_target.' class="'.($icon?' overlay_'.$icon:'').$no_link.'" title="'.$title.'" href="'.$link.'">' . $content . '</a></span></span>';

}
add_shortcode('wt_image', 'wt_shortcode_image');