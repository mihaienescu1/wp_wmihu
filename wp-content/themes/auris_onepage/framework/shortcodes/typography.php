<?php

function wt_shortcode_list($atts, $content = null) {
	extract(shortcode_atts(array(
		'fontface' => false,
		'style' => false,
		'color' => '',
	), $atts));

	$fontface = ($fontface == 'true') ? 'font-':'';
	if($color){
		$color = ' list_color_'.$color;
	}
	if (!preg_match_all("/(.?)\[(li)\b(.*?)(?:(\/))?\](?:(.+?)\[\/li\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {
		if ($fontface != '') { 		
			$output = '<ul class="wt_styled_list'.$color.'">';			
			for($i = 0; $i < count($matches[0]); $i++) {
				$output .= '<li class="wt-'.$fontface.'icon-'.$style.'"><i></i>' . $matches[5][$i] . '</li>';
			}
			$output .= '</ul>';
		} else {
			$output = '<ul class="wt_styled_list'.$color.'">';			
			for($i = 0; $i < count($matches[0]); $i++) {
				$output .= '<li><i class="wt-icon-'.$style.'"></i>' . $matches[5][$i] . '</li>';
			}
			$output .= '</ul>';
		}
				
		return $output;
	}
}
add_shortcode('wt_list', 'wt_shortcode_list');

function wt_shortcode_icons($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => '',
		'style' => false,
	), $atts));
	
	return '<'.$type.'><i class="wt_Hicon_'.$style.'"></i>'.do_shortcode($content).'</'.$type.'>';
}
add_shortcode('wt_icon', 'wt_shortcode_icons');

function wt_shortcode_icon_text($atts, $content = null) {
	extract(shortcode_atts(array(
		'fontface' => false,
		'style' => false,
		'color' => '',
	), $atts));
	
	$fontface = ($fontface == 'true') ? 'font-':'';
	if($color){
		$color = ' '.$color;
	}
	if ($fontface != '') {
		return '<span class="wt-'.$fontface.'icon-'.$style.'"><i></i>'.do_shortcode($content).'</span>';
	} else {
		return '<i class="wt-icon-'.$style.'"></i>'.do_shortcode($content).'';
	}
}
add_shortcode('wt_icon_text', 'wt_shortcode_icon_text');

function wt_shortcode_icon_link($atts, $content = null) {
	extract(shortcode_atts(array(
		'fontface' => false,
		'style' => false,
		'color' => '',
		'href' => '#',
		'title' => '',
		'target' => false,
	), $atts));
	
	$fontface = ($fontface == 'true') ? 'font-':'';
	if($color){
		$color = ' '.$color;
	}
	$target = $target?' target="'.$target.'"':'';
	if ($fontface != '') {
		return '<a href="'.$href.'" class="wt-'.$fontface.'icon-'.$style.'" title="'.$title.'"'.$target.'><i></i>'.do_shortcode($content).'</a>';
	} else {
		return '<a href="'.$href.'" title="'.$title.'"'.$target.'><i class="wt-icon-'.$style.'"></i>'.do_shortcode($content).'</a>';
	}
}
add_shortcode('wt_icon_link', 'wt_shortcode_icon_link');

function wt_shortcode_font_awesome($atts, $content = null) {
	extract(shortcode_atts(array(
		'icon_type' => '',
		'icon_style' => '',
		'icon_size' => '',
		'icon_color' => '',
		'icon_style_color' => '',
		'hoverefect' => false,
		'style' => false,
	), $atts));
	
	$css_style = '';
	if($icon_color){
		$css_style .= ' style="color:'.$icon_color.';';
	}
	if($icon_style_color){
		if ($icon_color) {
			$css_style .= ' background:'.$icon_style_color.';';
		} else {
			$css_style .= ' style="background:'.$icon_style_color.';';
		}
	}	
	if ($icon_color || $icon_style_color) $css_style .= '"';	
	$hoverefect = ($hoverefect == 'true') ? 'hoverEfect-'.$icon_size.' ':'';
	if ($icon_type != 'none') {
		return '<'.$icon_type.' class="'.$hoverefect.'fontawesome"><i class="fontawesome-icon wt_icon-'.$style.' '.$icon_size.' '.$icon_style.'"' . $css_style . '></i>'.do_shortcode($content).'</'.$icon_type.'>';
	}
	else {
		return '<div class="'.$hoverefect.'wt_icon_box"><i class="fontawesome-icon wt_icon-'.$style.' '.$icon_size.' '.$icon_style.'"' . $css_style . '></i>'.do_shortcode($content).'<span class="wt_icons_arrow"></span></div>';
	}
}
add_shortcode('wt_font_awesome', 'wt_shortcode_font_awesome');

function wt_shortcode_fancy_header($atts, $content = null) {
	extract(shortcode_atts(array(
		'color' => '',
	), $atts));
	
	if($color){
		$color = ' '.$color;
	}
	return '<h6 class="wt_fancy_header'.$color.'"><span>'.do_shortcode($content).'</span></h6>';
}
add_shortcode('wt_fancy_header', 'wt_shortcode_fancy_header');

function wt_shortcode_fancy_link($atts, $content = null) {
	extract(shortcode_atts(array(
		'color' => '',
		'href' => '#',
		'title' => '',
		'target' => false,
	), $atts));
	
	if($color){
		$color = ' '.$color;
	}
	if($title){
		$title = ' '.$title;
	}
	$target = $target?' target="'.$target.'"':'';
	
	return '<a class="wt_fancy_link'.$color.'" href="'.$href.'" title="'.$title.'"'.$target.'>'.do_shortcode($content).'</a>';
}
add_shortcode('wt_fancy_link', 'wt_shortcode_fancy_link');

function wt_shortcode_testimonial($atts, $content = null) {
	extract(shortcode_atts(array(
		'color' => '',
		'align' => false,
		'author' => false,
	), $atts));
	
	if($color){
		$color = $color;
	}
	if ($align) {
		return '<div class="wt_testimonials"><div' . ($align ? ' class="align' . $align . ' ' .$color. '"' : '') . '>' . do_shortcode($content).($author ? '<span class="wt_testimonials_arrow"></span></div><cite><i class="wt_icon-user"></i> '.$author . '</cite>' : '') . '</div>';
	}
	else {
		return '<div class="wt_testimonials"><div' . ($color ? ' class="' .$color. '"' : '') . '>' . do_shortcode($content).($author ? '<span class="wt_testimonials_arrow"></span></div><cite><i class="wt_icon-user"></i> '.$author . '</cite>' : '') . '</div>';
	}
}
add_shortcode('wt_testimonial', 'wt_shortcode_testimonial');

function wt_shortcode_blockquote($atts, $content = null) {
	extract(shortcode_atts(array(
		'color' => '',
		'align' => false,
		'author' => false,
	), $atts));
	
	if($color){
		$color = $color;
	}
	if ($align) {
		return '<blockquote' . ($align ? ' class="align' . $align . ' ' .$color. '"' : '') . '><i class="wt_icon-quote-left icon-3x pull-left wt_styled_color"></i>' . do_shortcode($content).($author ? '<cite>- '.$author . '</cite>' : '') . '</blockquote>';
	}
	else {
		return '<blockquote' . ($color ? ' class="' .$color. '"' : '') . '><i class="wt_icon-quote-left icon-3x pull-left wt_styled_color"></i>' . do_shortcode($content).($author ? '<cite> - '.$author . '</cite>' : '') . '</blockquote>';
	}
}
add_shortcode('wt_blockquote', 'wt_shortcode_blockquote');

function wt_shortcode_pullquote($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'color' => '',
		'align' => false,
	), $atts));
	
	if($color){
		$color = ' '.$color;
	}
	
	return '<span' . ($align ? ' class="' . $code. ' align' . $align .$color. '"' : '') . '>' . do_shortcode($content) . '</span>';
}
add_shortcode('wt_pullquote', 'wt_shortcode_pullquote');

function wt_shortcode_dropcaps($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'color' => '',
		'bg_color' => '',
	), $atts));

	$style = '';
	if($color){
		$style .= ' style="color:'.$color.';';
	}
	if($bg_color){
		if ($color) {
			$style .= ' background:'.$bg_color.';';
		} else {
			$style .= ' style="background:'.$bg_color.';';
		}
	}
	if ($color || $bg_color) $style .= '"';
	
	$content = do_shortcode(trim($content));	
	return <<<HTML
	<span class="{$code}"{$style}> {$content} </span>
HTML;
}
add_shortcode('wt_dropcap1', 'wt_shortcode_dropcaps');
add_shortcode('wt_dropcap2', 'wt_shortcode_dropcaps');
add_shortcode('wt_dropcap3', 'wt_shortcode_dropcaps');

function wt_shortcode_highlight($atts, $content = null, $code) {	
	
	extract(shortcode_atts(array(
		'color' => '',
		'bg_color' => '',
	), $atts));

	$style = '';
	if($color){
		$style .= ' style="color:'.$color.';';
	}
	if($bg_color){
		if ($color) {
			$style .= ' background:'.$bg_color.';';
		} else {
			$style .= ' style="background:'.$bg_color.';';
		}
	}
	if ($color || $bg_color) $style .= '"';
	
	$content = do_shortcode(trim($content));	
	//return '<span class="highlight'.(($color)?' '.$color:'').'">'.do_shortcode($content).'</span>';
	return <<<HTML
	<span class="highlight"{$style}> {$content} </span>
HTML;
}
add_shortcode('wt_highlight', 'wt_shortcode_highlight');

/**
 * Display <pre> & <code> tags
 */

global $theme_code_token;
$theme_code_token = md5(uniqid(rand()));
$theme_code_matches = array();
function wt_code_before_filter($content) {
	return preg_replace_callback("/(.?)\[(pre|code)\b(.*?)(?:(\/))?\](?:(.+?)\[\/\\2\])?(.?)/s", "wt_code_before_filter_callback", $content);
}

function wt_code_before_filter_callback(&$match) {
	global $theme_code_token, $theme_code_matches;
	$i = count($theme_code_matches);
	
	$theme_code_matches[$i] = $match;
	
	return "\n\n<p>" . $theme_code_token . sprintf("%03d", $i) . "</p>\n\n";
}

function wt_code_after_filter($content) {
	global $theme_code_token;
	
	$content = preg_replace_callback("/<p>\s*" . $theme_code_token . "(\d{3})\s*<\/p>/si", "wt_code_after_filter_callback", $content);
	
	return $content;
}
function wt_code_after_filter_callback($match) {
	global $theme_code_matches;
	$i = intval($match[1]);
	$content = $theme_code_matches[$i];
	$content[5]=trim($content[5]);
	
	if (version_compare(PHP_VERSION, '5.2.3') >= 0) {
		$output = htmlspecialchars($content[5], ENT_NOQUOTES, get_bloginfo('charset'), false);
	} else {
		$specialChars = array('&' => '&amp;', '<' => '&lt;', '>' => '&gt;');
		
		$output = strtr(htmlspecialchars_decode($content[5]), $specialChars);
	}
	wp_enqueue_script( 'prettify' );
	return '<div class="code_wrap"><' . $content[2] . ' class="'. $content[2] .' prettyprint linenums">' . $output . '</' . $content[2] . '></div>';
}

add_filter('the_content', 'wt_code_before_filter', 0);
add_filter('the_content', 'wt_code_after_filter', 99);

/*
 * Thanks to Shortcode Empty Paragraph Fix (http://www.johannheyne.de/wordpress/shortcode-empty-paragraph-fix/)
 */
 
	add_filter('the_content', 'wt_shortcode_empty_paragraph_fix');
	function wt_shortcode_empty_paragraph_fix($content) {   
		$array = array (
			'<p>[' => '[', 
			']</p>' => ']', 
			']<br />' => ']'
		);
	
		$content = strtr($content, $array);
	
		return $content;
	}
