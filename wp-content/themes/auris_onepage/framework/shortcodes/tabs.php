<?php

function wt_shortcode_tabs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'initialtab' => 1
	), $atts));
	
	if (!preg_match_all("/(.?)\[(wt_tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/wt_tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		$initialIndex = $initialtab -1;
		
		$output = '<ul class="wt_tabs">';		
		for($i = 0; $i < count($matches[0]); $i++) {
			if ( $i == $initialIndex ) {
				$output .= '<li class="current_page_item"><a class="current" href="#">' . $matches[3][$i]['title'] . '</a></li>';
			}
			else {
				$output .= '<li><a href="#">' . $matches[3][$i]['title'] . '</a></li>';
			}
		}				
		$output .= '</ul>';
		
		$output .= '<div class="panes">';
		for($i = 0; $i < count($matches[0]); $i++) {
			if ( $i == $initialIndex ) {
				$output .= '<div class="pane" style="display:block">' . do_shortcode(trim($matches[5][$i])) . '</div>';
			}
			else {
				$output .= '<div class="pane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
			}
		}
		$output .= '</div>';
		
		return '<div class="'.$code.'_wrap">' . $output . '</div>';
	}
}
add_shortcode('wt_tabs', 'wt_shortcode_tabs');
add_shortcode('wt_minimal_tabs', 'wt_shortcode_tabs');

function wt_shortcode_accordions($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'initialpane' => 1
	), $atts));
	
	if (!preg_match_all("/(.?)\[(wt_accordion)\b(.*?)(?:(\/))?\](?:(.+?)\[\/wt_accordion\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		$initialIndex = $initialpane -1;
				
		$output = '';
		for($i = 0; $i < count($matches[0]); $i++) {
			if ( $i == $initialIndex ) {
				$output .= '<h3 class="current">' . $matches[3][$i]['title'] . '</h3>';
				$output .= '<div class="wt_accPane" style="display:block">' . do_shortcode(trim($matches[5][$i])) . '</div>';
			}
			else {
				$output .= '<h3>' . $matches[3][$i]['title'] . '</h3>';
				$output .= '<div class="wt_accPane">' . do_shortcode(trim($matches[5][$i])) . '</div>';
			}
		}		
		return '<div class="wt_accordion '.$code.'">' . $output . '</div>';
	}
}
add_shortcode('wt_framed_accordion', 'wt_shortcode_accordions');
add_shortcode('wt_minimal_accordion', 'wt_shortcode_accordions');

function wt_shortcode_toggle($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => false,
		'class_attr' => ''
	), $atts));
	
	if ($class_attr != '') {
		$class_attr = ' '.$class_attr;
	}		
	else $class_attr = '';
	
	if ($code == 'minimal_toggle') {
		return '<div class="wt_minimal_toggle'.$class_attr.'"><span>+</span><h5 class="wt_toggle_title">' . $title . '</h5><div class="wt_toggle_content">' . do_shortcode(trim($content)) . '</div></div>';
	}
	else {
		return '<div class="wt_toggle'.$class_attr.'"><span>+</span><h5 class="wt_toggle_title">' . $title . '</h5><div class="wt_toggle_content">' . do_shortcode(trim($content)) . '</div></div>';
	}
}
add_shortcode('wt_minimal_toggle', 'wt_shortcode_toggle');
add_shortcode('wt_framed_toggle', 'wt_shortcode_toggle');
