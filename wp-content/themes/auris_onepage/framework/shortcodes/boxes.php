<?php

function wt_shortcode_message($atts, $content = null, $code) {

	return '<div class="' . $code . '_box"><div class="' . $code . '_box_icon">' . do_shortcode($content) . '</div></div>';
}

add_shortcode('wt_download','wt_shortcode_message');
add_shortcode('wt_upload','wt_shortcode_message');
add_shortcode('wt_info','wt_shortcode_message');
add_shortcode('wt_notice','wt_shortcode_message');
add_shortcode('wt_warning','wt_shortcode_message');
add_shortcode('wt_faq','wt_shortcode_message');
add_shortcode('wt_success','wt_shortcode_message');

function wt_shortcode_note($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'align' => false,
		'width' => false,
	), $atts));
	if(!empty($title)){
		$title = '<h4 class="wt_noteTitle">'.$title.'</h4>';
	}
	$align = $align?' align'.$align:'';
	$width = $width?' style="width:'.$width.'px"':'';
	return '<div class="wt_note' . $align . '"'.$width.'>'.$title.'<div class="wt_noteContent">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('wt_note','wt_shortcode_note');

function wt_shortcode_team_box($atts, $content = null, $code) {
	extract(shortcode_atts(array(
	    'href' => '',
	    'title' => '',
	    'company' => '',
		'title_color' => '',
		'bordercolor' => '',
		'title_customcolor' => '',
		'title_textcolor' => '',
		'width' => '',
		'height' => '',
		'bgcolor' => '',
		'bgcolor_start' => '',
		'bgcolor_end' => '',
		'textcolor' => '',
		'icons' => '',
		'facebook_link' => '',
		'linkedin_link' => '',
		'pinterest_link' => '',
		'rss_link' => '',
		'github_link' => '',
		'twitter_link' => '',
		'rounded' => 'false',
	), $atts));		
			
	$bordercolor = $bordercolor?'border-color:'.$bordercolor.';':'';		
	$title_customcolor = $title_customcolor?'background-color:'.$title_customcolor.';':'';
	$title_textcolor = $title_textcolor?'color:'.$title_textcolor.';':'';
	if( !empty($title_customcolor) || !empty($title_textcolor) ){
		$title_style = ' style="'.$title_customcolor.$title_textcolor.'border-bottom:none;"';
	}else{
		$title_style = ' style="border-bottom:none;"';
	}		
	$imgTitle = $title;
	$title = $title?'<h3 class="'.$title_color. 'wt_team_title"'.$title_style.'>'.$title.'<span>'.$company.'</span></h3>':'';

	$width = $width?'width:'.$width.'px; ':'';
	$height = $height?'height:'.$height.'px;':'';
	if( !empty($href) ){
		$imageContent = '<div class="wt_view wt_view-first"><img alt="'.$imgTitle.'" src="'.wt_get_image_src($href).'" /></div>';
	}
								
	$rounded = ($rounded == 'true')?' rounded':'';
	if ($title!='') {
		$rounded_content = '';
	}
	else {
		$rounded_content = ' rounded';
	}

	if(!empty($width) || !empty($bordercolor)){
		$style = ' style="'.$width.$bordercolor.'"';
	}else{
		$style = '';
	}
	$bgcolor = $bgcolor?' background-color:'.$bgcolor.';':'';
	$bgcolor_gradient = '';
	
	$bgcolor_gradient = (($bgcolor_start!=='' || $bgcolor_end!=='') && $bgcolor=='')?' background-color: '.$bgcolor_start.'; background-repeat: no-repeat; background-image: -webkit-gradient(linear, 0 0, 0 100%, from('.$bgcolor_start.'), color-stop(25%, '.$bgcolor_start.'), to('.$bgcolor_end.')); background-image: -webkit-linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: -moz-linear-gradient(top, '.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: -ms-linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: -o-linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='.$bgcolor_start.', endColorstr='.$bgcolor_end.', GradientType=0); ':'';
	
	$textcolor = $textcolor?'color:'.$textcolor.'!important; ':'';
	if( !empty($height) || !empty($textcolor) || !empty($bgcolor)  || !empty($bgcolor_gradient)){
		$content_style = ' style="'.$height.$textcolor.$bgcolor.$bgcolor_gradient.'"';
	}else{
		$content_style = '';
	}
	$teamSocials ='<ul class="wt_team_social">';
	$social = (explode(',', $icons));
	$arrlength=count($social);
	for($i=0;$i<$arrlength;$i++) {
		switch($social[$i]) {
			case "facebook":
			$link = $facebook_link;
			break;
			case "linkedin":
			$link = $linkedin_link;
			break;
			case "pinterest":
			$link = $pinterest_link;
			break;
			case "rss":
			$link = $rss_link;
			break;
			case "github":
			$link = $github_link;
			break;
			case "twitter":
			$link = $twitter_link;
			break;
		} 
		$teamSocials .=  '<li><a href="'.$link.'"><i class="wt_icon-'.$social[$i].'"></i></a></li>';
	}
	$teamSocials .='</ul>';
	return '<div class="wt_team_item' .$rounded. '"'.$style.'>'.$imageContent.'<div class="wt_team_description"><p class="wt_team_text clearfix'.$rounded_content.'"'.$content_style.'>' . do_shortcode($content) . '<div class="clearboth"></div></p>'.$teamSocials.'</div></div>' . $title . '';
}
add_shortcode('wt_team_box','wt_shortcode_team_box');


function wt_shortcode_framed_box($atts, $content = null, $code) {
	extract(shortcode_atts(array(
	    'title' => '',
		'title_color' => '',
		'bordercolor' => '',
		'title_customcolor' => '',
		'title_textcolor' => '',
		'width' => '',
		'height' => '',
		'bgcolor' => '',
		'bgcolor_start' => '',
		'bgcolor_end' => '',
		'textcolor' => '',
		'rounded' => 'false',
	), $atts));		
				
	$bordercolor = $bordercolor?'border-color:'.$bordercolor.';':'';		
	$title_customcolor = $title_customcolor?'background-color:'.$title_customcolor.';':'';
	$title_textcolor = $title_textcolor?'color:'.$title_textcolor.';':'';
	if( !empty($title_customcolor) || !empty($title_textcolor) ){
		$title_style = ' style="'.$title_customcolor.$title_textcolor.'border-bottom:none;"';
	}else{
		$title_style = ' style="border-bottom:none;"';
	}		
	$title = $title?'<h6 class="wt_framed_box_title'.$title_color.'"'.$title_style.'>'.$title.'</h6>':'';
	$width = $width?'width:'.$width.'px; ':'';
	$height = $height?'height:'.$height.'px;':'';
	
	$rounded = ($rounded == 'true')?' wt_rounded':'';
	if ($title!='') {
		$rounded_content = '';
	}
	else {
		$rounded_content = ' wt_rounded';
	}

	if(!empty($width) || !empty($bordercolor)){
		$style = ' style="'.$width.$bordercolor.'"';
	}else{
		$style = '';
	}
	$bgcolor = $bgcolor?' background-color:'.$bgcolor.';':'';
	$bgcolor_gradient = '';
	
	$bgcolor_gradient = (($bgcolor_start!=='' || $bgcolor_end!=='') && $bgcolor=='')?' background-color: '.$bgcolor_start.'; background-repeat: no-repeat; background-image: -webkit-gradient(linear, 0 0, 0 100%, from('.$bgcolor_start.'), color-stop(25%, '.$bgcolor_start.'), to('.$bgcolor_end.')); background-image: -webkit-linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: -moz-linear-gradient(top, '.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: -ms-linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: -o-linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='.$bgcolor_start.', endColorstr='.$bgcolor_end.', GradientType=0); ':'';
	
	$textcolor = $textcolor?'color:'.$textcolor.'!important; ':'';
	if( !empty($height) || !empty($textcolor) || !empty($bgcolor)  || !empty($bgcolor_gradient)){
		$content_style = ' style="'.$height.$textcolor.$bgcolor.$bgcolor_gradient.'"';
	}else{
		$content_style = '';
	}
	
	return '<div class="' . $code .$rounded. '"'.$style.'>' . $title . '<div class="wt_framed_box_content clearfix'.$rounded_content.'"'.$content_style.'>' . do_shortcode($content) . '<div class="clearboth"></div></div></div>';
}
add_shortcode('wt_framed_box','wt_shortcode_framed_box');

function wt_shortcode_framed_alt_box($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'bordertopcolor' => '',
		'borderbottomcolor' => '',
		'borderleftcolor' => '',
		'borderrightcolor' => '',
		'bordertopwidth' => '',
		'borderbottomwidth' => '',
		'borderleftwidth' => '',
		'borderrightwidth' => '',
		'title' => '',
		'width' => '',
		'height' => '',
		'bgcolor' => '',
		'bgcolor_start' => '',
		'bgcolor_end' => '',
		'textcolor' => '',
		'rounded' => 'false',
	), $atts));		
				
	//$bordercolor = $bordercolor?'border-color:'.$bordercolor.';':'';	
	$bordertopcolor = $bordertopcolor?'border-top-color:'.$bordertopcolor.';':'';	
	$borderbottomcolor = $borderbottomcolor?'border-bottom-color:'.$borderbottomcolor.';':'';	
	$borderleftcolor = $borderleftcolor?'border-left-color:'.$borderleftcolor.';':'';	
	$borderrightcolor = $borderrightcolor?'border-right-color:'.$borderrightcolor.';':'';		
	$width = $width?'width:'.$width.'px; ':'';
	$height = $height?'height:'.$height.'px;':'';
	
	$rounded = ($rounded == 'true')?' wt_rounded':'';

	if(!empty($width)){
		$style = ' style="'.$width.'"';
	}else{
		$style = '';
	}
	if(($bordertopcolor!=='') || ($borderbottomcolor!=='') || ($borderleftcolor!=='') || ($borderrightcolor!=='')){ 
		$borderstyle = 'border-style:solid;';
	} else {$borderstyle = '';}
	if(($bordertopcolor!=='')){ 
		$bordertopwidth = 'border-top-width:'.$bordertopwidth.'px;';
	} else {$bordertopwidth = '';}
	if(($borderbottomcolor!=='')){ 
		$borderbottomwidth = 'border-bottom-width:'.$borderbottomwidth.'px;';
	} else {$borderbottomwidth = '';}
	if(($borderleftcolor!=='')){ 
		$borderleftwidth = 'border-left-width:'.$borderleftwidth.'px;';
	} else {$borderleftwidth = '';}
	if(($borderrightcolor!=='')){ 
		$borderrightwidth = 'border-right-width:'.$borderrightwidth.'px;';
	} else {$borderrightwidth = '';}
	$bgcolor = $bgcolor?' background-color:'.$bgcolor.';':'';
	$bgcolor_gradient = '';
	
	$bgcolor_gradient = (($bgcolor_start!=='' || $bgcolor_end!=='') && $bgcolor=='')?' background-color: '.$bgcolor_start.'; background-repeat: no-repeat; background-image: -webkit-gradient(linear, 0 0, 0 100%, from('.$bgcolor_start.'), color-stop(25%, '.$bgcolor_start.'), to('.$bgcolor_end.')); background-image: -webkit-linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: -moz-linear-gradient(top, '.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: -ms-linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: -o-linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); background-image: linear-gradient('.$bgcolor_start.', '.$bgcolor_start.' 25%, '.$bgcolor_end.'); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='.$bgcolor_start.', endColorstr='.$bgcolor_end.', GradientType=0); ':'';
	
	$textcolor = $textcolor?'color:'.$textcolor.'!important; ':'';
	if( !empty($height) || !empty($textcolor) || !empty($bgcolor)  || !empty($bgcolor_gradient) || ($bordertopcolor!=='') || ($borderbottomcolor!=='') || ($borderleftcolor!=='') || ($borderrightcolor!=='')){
		$content_style = ' style="'.$borderstyle.$bordertopcolor.$bordertopwidth.$borderbottomcolor.$borderbottomwidth.$borderleftcolor.$borderleftwidth.$borderrightcolor.$borderrightwidth.$height.$textcolor.$bgcolor.$bgcolor_gradient.'"';
	}else{
		$content_style = '';
	}
	
	return '<div class="' . $code .$rounded. '"'.$style.'>' . $title . '<div class="wt_framed_box_content clearfix"'.$content_style.'>' . do_shortcode($content) . '<div class="clearboth"></div></div></div>';
}
add_shortcode('wt_framed_alt_box','wt_shortcode_framed_alt_box');