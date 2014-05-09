<?php
function wt_shortcode_rotator($atts, $content = null){
	extract(shortcode_atts(array(	
		"timeout" => 5000,
		"speed" => 1000,
		'pausehover' => 'false',
		'buttons' => 'false',
	), $atts));

	if($pausehover==='true'){
		$pausehover = 'true';
	}else{
		$pausehover = 'false';
	}
	if($buttons==='true'){
		$buttons = 'true';
	}else{
		$buttons = 'false';
	}
	
	$id = rand(1,1000);
	wp_print_scripts('cycle');
	// Load script for IOS6 swipe bug
	global $detect;
	if ( $detect->isIOS() || $detect->isiOS() ) {
		wp_enqueue_script('ios6-bug');
	}
				
	if (!preg_match_all("/(.?)\[(li)\b(.*?)(?:(\/))?\](?:(.+?)\[\/li\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		$output = '<div class="wt_rotator_wrapper">';
		if ($buttons == 'true') {
			$output .= '<div class="wt_rotator_nav"><a class="wt_rotator_prev"><span>prev</span></a><a class="wt_rotator_next"><span>next</span></a></div>';
		}	
		$output .= '<ul id="wt_rotator_'.$id.'" class="wt_items_rotator" data-rotator_buttons="'.$buttons.'" data-cycle-timeout="'.$timeout.'" data-cycle-speed="'.$speed.'" data-cycle-pause-on-hover="'.$pausehover.'" data-cycle-slides="> li" data-cycle-swipe="true" data-cycle-auto-height="container">';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			if ($i == 0) {
				$output .= '<li class="wt_firstRotateItem">' . do_shortcode($matches[5][$i]) . '</li>';				
			} else {			
				$output .= '<li>' . do_shortcode($matches[5][$i]) . '</li>';
			}
		}
		$output .= '</ul>';	
		$output .= '</div>';	
	}

	return $output;
}

add_shortcode('wt_rotator', 'wt_shortcode_rotator');