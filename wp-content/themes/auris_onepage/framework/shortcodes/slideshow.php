<?php
function wt_shortcode_slideshow($atts, $content = null){
	if(isset($atts['type'])){
		switch($atts['type']){
			case 'flex':
				return wt_slideshow_flex($atts, $content);
				break;
			case 'nivo':
				return wt_slideshow_nivo($atts, $content);
				break;
		}
	}
	return '';
}

add_shortcode('wt_slideshow', 'wt_shortcode_slideshow');

function wt_slideshow_flex($atts, $content = null){
	extract(shortcode_atts(array(
		'animation' => 'slide',
		'easing' => 'linear',
		'direction' => 'horizontal',
		'animationspeed' => '600',
		'slideshowspeed' => '5000',
		'directionnav' => 'false',
		'controlnav' => 'false',
		'controlnavthumbs' => 'false',
		'controlnavthumbsslider' => 'false',
		'pauseonaction' => 'false',
		'pauseonhover' => 'false',
		'slideshow' => 'false',
		'animationloop' => 'false',
		'width' => false,
		'height' => '300',
		'align' => false,		
		'number' => 1,
	), $atts));
	
	global $layout;
	$style='';
	$html_output='';
		
	/*if($layout == 'full'){
		$img_width = 940;
	}else{
		$img_width = 640;
	}*/
	$img_width = 940;
	wp_print_scripts('flex');
	
	if($directionnav==='true'){
		$directionnav = 'true';
	}else{
		$directionnav = 'false';
	}
	if($controlnav==='true'){
		$controlnav = 'true';
	}else{
		$controlnav = 'false';
	}
	
	if($controlnavthumbs === 'true') {
		$controlnavthumbs = 'true';
		if($controlnavthumbsslider === 'true') {
			$controlnavthumbsslider = 'true';
		}else{
			$controlnavthumbsslider = 'false';
		}
	}else{
		$controlnavthumbs = 'false';
	}
	
	if($pauseonaction==='true'){
		$pauseonaction = 'true';
	}else{
		$pauseonaction = 'false';
	}
	if($pauseonhover==='true'){
		$pauseonhover = 'true';
	}else{
		$pauseonhover = 'false';
	}
	if($slideshow==='true'){
		$slideshow = 'true';
	}else{
		$slideshow = 'false';
	}	
	if($animationloop==='true'){
		$animationloop = 'true';
	}else{
		$animationloop = 'false';
	}	
		
	if (!preg_match_all("/(.?)\[(image)\b(.*?)(?:(\/))?\](?:(.+?)\[\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {	
		$content = '';
		$flex_id = rand(1,1000);
		$controlnavthumbsslider ? $flex_sync = ' data-flex_sync="flex_carousel_' . $flex_id . '"' : $flex_sync = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$image = $matches[3][$i];
			$src = '';
			$link = '';
			$caption = '';
			$caption_output = '';
			$has_thumb = '';
			if (preg_match_all('/"([^"]+)"/', $image, $m)) {
				$src = $m[1][0];    
				if ( isset($m[1][1]) ) { 
					$caption = $m[1][1];    
				}       
				if ( isset($m[1][2]) ) { 
					$link = wt_check_input($m[1][2]);    
				}  
			}

			$has_thumb = ($controlnavthumbs=='true' && $controlnavthumbsslider=='false' ? ' data-thumb="'.aq_resize( wt_check_input($src), 70, 45, true ).'"' : '');
			if ($caption != '') {
				$caption_output .= '<div class="flex-caption">';
				$caption_output .= $caption;
				$caption_output .= '</div>';
			}
			if ($link != '') {
				$content .= '<li'.$has_thumb.'><a href="'.wt_check_input($link).'" title=""><img src="' . aq_resize( wt_check_input($src), $img_width, $height, true ).'"/></a>'.$caption_output.'</li>';
			} else {
				$content .= '<li'.$has_thumb.'><img src="' . aq_resize( wt_check_input($src), $img_width, $height, true ). '"/>'.$caption_output.'</li>';
			}			
		}			
	}
	$theme_images = THEME_IMAGES;
	$style = ($width ? ' style="width:'.$width.'px"' : '');
	$html_output .= '<div class="slide_wrap flex_container'.($align?' align'.$align:'').'"'.$style.'>';	
	$html_output .= '<div id="flexslider_' . $flex_id . '" class="flexslider_wrap flexslider" data-flex_animation="'.$animation.'" data-flex_easing="'.$easing.'"  data-flex_direction="'.$direction.'" data-flex_animationSpeed="'.$animationspeed.'" data-flex_slideshowSpeed="'.$slideshowspeed.'" data-flex_directionNav="'.$directionnav.'" data-flex_controlNav="'.$controlnav.'" data-flex_controlNavThumbs="'.$controlnavthumbs.'"  data-flex_controlNavThumbsSlider="'.$controlnavthumbsslider.'" data-flex_pauseOnAction="'.$pauseonaction.'" data-flex_pauseOnHover="'.$pauseonhover.'" data-flex_slideshow="'.$slideshow.'" data-flex_animationLoop="'.$animationloop.'"'.$flex_sync.'>';
	$html_output .= '<ul class="slides">'."\n\t\t\t";
	$html_output .= $content;
	$html_output .= '</ul>';
	$html_output .= '</div>';
	$html_output .= '</div>';
	
	if($controlnavthumbs=='true' && $controlnavthumbsslider=='true') {
	$html_output .= '<div id="flex_carousel_' . $flex_id . '" class="flexslider thumbsCarousel">';
	$html_output .= '<ul class="slides">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$image = $matches[3][$i];
			$src = '';
			if (preg_match_all('/"([^"]+)"/', $image, $m)) {
				$src = $m[1][0];   
			}
			$slide_src = aq_resize( wt_check_input($src), $img_width, $height, true );
			$html_output .= '<li>';			
			$html_output .= '<img src="' . $slide_src . '" alt="" />';
			$html_output .= '</li>';
		} 
	$html_output .= '</ul></div>';
	}
	
    return $html_output;
}
function wt_slideshow_nivo($atts, $content = null){
	extract(shortcode_atts(array(
		'effect' => 'random',
		'slices' => '10',
		'boxcols' => '8',
		'boxrows' => '4',
		'animspeed' => '600',
		'pausetime' => '5000',
		'randomstart' => 'false',
		'directionnav' => 'false',
		'controlnav' => 'false',
		'controlnavthumbs' => 'false',
		'pauseonhover' => 'false',
		'manualadvance' => 'false',
		'stopatend' => 'false',
		'width' => false,
		'height' => '300',
		'align' => false,		
		'number' => 1,
	), $atts));
	
	global $layout;
	$style='';
	$html_output='';
		
	/*if($layout == 'full'){
		$img_width = 940;
	}else{
		$img_width = 640;
	}*/
	$img_width = 940;
	
	wp_print_scripts('nivo');
	
	if($randomstart==='true'){
		$randomstart = 'true';
	}else{
		$randomstart = 'false';
	}
	if($directionnav==='true'){
		$directionnav = 'true';
	}else{
		$directionnav = 'false';
	}
	if($controlnav==='true'){
		$controlnav = 'true';
	}else{
		$controlnav = 'false';
	}
	if($controlnavthumbs==='true'){
		$controlnavthumbs = 'true';
	}else{
		$controlnavthumbs = 'false';
	}
	if($pauseonhover==='true'){
		$pauseonhover = 'true';
	}else{
		$pauseonhover = 'false';
	}
	if($manualadvance==='true'){
		$manualadvance = 'true';
	}else{
		$manualadvance = 'false';
	}
	if($stopatend==='true'){
		$stopatend = 'true';
	}else{
		$stopatend = 'false';
	}		
		
	if (!preg_match_all("/(.?)\[(image)\b(.*?)(?:(\/))?\](?:(.+?)\[\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {	
		$content = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			$image = $matches[3][$i];
			$src = '';
			$link = '';
			$title = '';
			$has_thumb = '';
			if (preg_match_all('/"([^"]+)"/', $image, $m)) {
				$src = $m[1][0];    
				if ( isset($m[1][1]) ) { 
					$title = $m[1][1];    
				}       
				if ( isset($m[1][2]) ) { 
					$link = wt_check_input($m[1][2]);    
				}  
			}
			$has_thumb = ($controlnavthumbs ? 'data-thumb="'.aq_resize( wt_check_input($src), 70, 45, true ).'"' : '');
			$title = ($title != '' ? 'title="'.$title.'"' : '');
			if ($link != '') {				
				$content .= '<a href="'.wt_check_input($link).'" '.$title.'><img src="' .aq_resize( wt_check_input($src), $img_width, $height, true ).'" '.$has_thumb.' '.$title.' /></a>';
			} else {
				$content .= '<img src="' . aq_resize( wt_check_input($src), $img_width, $height, true ) . '" '.$has_thumb.' '.$title.' />';
			}			
		}			
	}
	$theme_images = THEME_IMAGES;
	$style = ($width ? ' style="width:'.$width.'px"' : '');
	$html_output .= '<div class="slide_wrap nivo_container'.($align?' align'.$align:'').'"'.$style.'>';			
	$html_output .= '<div class="nivoslider_wrap" data-nivo_effect="'.$effect.'" data-nivo_slices="'.$slices.'" data-nivo_boxCols="'.$boxcols.'"  data-nivo_boxRows="'.$boxrows.'" data-nivo_animSpeed="'.$animspeed.'" data-nivo_pauseTime="'.$pausetime.'" data-nivo_randomStart="'.$randomstart.'" data-nivo_directionNav="'.$directionnav.'" data-nivo_controlNav="'.$controlnav.'" data-nivo_controlNavThumbs="'.$controlnavthumbs.'" data-nivo_pauseOnHover="'.$pauseonhover.'" data-nivo_manualAdvance="'.$manualadvance.'" data-nivo_stopAtEnd="'.$stopatend.'">';
	$html_output .= $content;
	$html_output .= '</div>';
	$html_output .= '</div>';
	
    return $html_output;
}
?>