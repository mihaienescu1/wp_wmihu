<?php
function wt_shortcode_video($atts){
	if(isset($atts['type'])){
		switch($atts['type']){
			case 'html5':
				return wt_html5_video($atts);
				break;
			case 'youtube':
				return wt_youtube_video($atts);
				break;
			case 'vimeo':
				return wt_vimeo_video($atts);
				break;
			case 'dailymotion':
				return wt_dailymotion_video($atts);
				break;
			case 'metacafe':
				return wt_metacafe_video($atts);
				break;
			case 'bliptv':
				return wt_bliptv_video($atts);
				break;
			case 'flash':
				return wt_flash_video($atts);
				break;
		}
	}
	return '';
}
add_shortcode('wt_video', 'wt_shortcode_video');

function wt_shortcode_audio($atts){
	if(isset($atts['type'])){
		switch($atts['type']){
			case 'html5':
				return wt_audio_html5($atts);
				break;
		}
	}
	return '';
}
add_shortcode('wt_audio', 'wt_shortcode_audio');

function wt_video_html5_scripts(){
	wp_print_styles('mediaelementjs-styles');
	wp_print_styles('mediaelementjs-skin-styles');
	wp_print_scripts('mediaelementjs-scripts');
}

function wt_html5_video($atts) {
	extract(shortcode_atts(array(
		'webm' 	=> '',
		'mp4' 	=> '',
		'ogg' 	=> '',
		'poster' 	=> '',
		'autoplay'	=> false,
	), $atts));	
	
	add_action('wp_footer', 'wt_video_html5_scripts');
	
	$width = 940;
	$height = round($width * 9 / 16);
		
	// WebM Source Supplied
	$webm_source = '';
	$flash_src = '';
	if ($webm) {
		$webm_source = '<source type="video/webm" src="'.wt_check_input($webm).'" />';
		$flash_src = wt_check_input($webm);
		$webm_link = '<a href="'.$webm.'">WebM</a>';
	}	
	
	// MP4 Source Supplied
	$mp4_source = '';
	if ($mp4) {
		$mp4_source = '<source type="video/mp4" src="'.wt_check_input($mp4).'" />';
		if(empty($flash_src)){
			$flash_src = wt_check_input($mp4);
		}
		$mp4_link = '<a href="'.$mp4.'">MP4</a>';
	}

	// Ogg source supplied
	$ogg_source = '';
	if ($ogg) {
		$ogg_source = '<source type="video/ogg" src="'.wt_check_input($ogg).'" />';
		if(empty($flash_src)){
			$flash_src = wt_check_input($ogg);
		}
		$ogg_link = '<a href="'.$ogg.'">Ogg</a>';
	}
		
	if (!$autoplay){
		$autoplay = wt_get_option('media','html5_autoplay');
	}else{
		if($autoplay==='true'){
			$autoplay = 'true';
		}else{
			$autoplay = 'false';
		}
	}
	
	$preload = wt_get_option('media','html5_preload');
	$loop = wt_get_option('media','html5_loop');		
	$download = wt_get_option('media','html5_download');		
		
	$poster_image = '';
	$poster_var = '';
	if ($poster) {
		$poster_image = 'poster="'.wt_check_input($poster).'"';
		$poster_var = 'poster='.wt_check_input($poster).'&amp;';
		$image_fallback = <<<_end_
			<img src="$poster" alt="Poster Image" title="No video playback capabilities." />
_end_;
	}	
	
	if ($autoplay) {
		$autoplay_var = 'autoplay=true&amp;';
		$autoplay_attr = " autoplay";
	} else {
		$autoplay_var = '';
		$autoplay_attr = "";
	}
	
	if ($preload) {
		$preload_attr = 'preload="auto"';
	} else {
		$preload_attr = 'preload="none"';
	}
		
	if ($loop) {
		$loop_var = 'loop=true&amp;';
		$loop_attr = " loop";
	} else {
		$loop_var = '';
		$loop_attr = "";
	}
	$download_msg = __( "Your browser leaves much to be desired. It doesn't support HTML5 videos or even Flash fallbacks. Download the Videos instead:",'wt_admin');
	if($download){
		$download_links = <<<_end_
<p class="no-video"><strong>{$download_msg}</strong>
		{$mp4_link}
		{$webm_link}
		{$ogg_link}
</p>
_end_;
	} else {
		$download_links = '';
	}	
	
	$uri = THEME_URI;
	
	return <<<HTML
<div class="wt_video_wrap">
<video width="{$width}" height="{$height}" class="wt_html5_video mejs-wmp" {$poster_image} controls="controls" {$preload_attr}{$autoplay_attr}{$loop_attr} style="width: 100%; height: 100%;">{$mp4_source}{$webm_source}{$ogg_source}<object width="{$width}" height="{$height}" type="application/x-shockwave-flash" data="{$uri}/mediaelement/flashmediaelement.swf">
	<param name="movie" value="{$uri}/mediaelement/flashmediaelement.swf" />
	<param name="flashvars" value="controls=true&amp;{$poster_var}{$autoplay_var}{$loop_var}file={$flash_src}" />
	{$image_fallback}</object>{$download_links}</video>
</div>
HTML;
	
}
function wt_youtube_video($atts, $content=null) {
	extract(shortcode_atts(array(
		'video_id' 	=> '',
		'autoplay'  => false,
	), $atts));
		
	$width = 940;
	$height = round($width * 9 / 16);
		
	if (!$autoplay){
		$autoplay = (wt_get_option('media','youtube_autoplay') == true)?1:0;
	}else{
		if($autoplay==='true'){
			$autoplay = '1';
		}else{
			$autoplay = '0';
		}
	}
	
	$autohide = wt_get_option('media','youtube_autohide');
	$controls = (wt_get_option('media','youtube_controls') == true)?1:0;
	$kbcontrols = (wt_get_option('media','youtube_kbcontrols') == true)?1:0;
	$fs = (wt_get_option('media','youtube_fs') == true)?1:0;
	$hd = (wt_get_option('media','youtube_hd') == true)?1:0;
	$loop = (wt_get_option('media','youtube_loop') == true)?1:0;
	$rel = (wt_get_option('media','youtube_rel') == true)?1:0;
	$showinfo = (wt_get_option('media','youtube_showinfo') == true)?1:0;
	$showsearch = (wt_get_option('media','$youtube_showsearch') == true)?1:0;
	$enablejsapi = (wt_get_option('media','youtube_enablejsapi') == true)?1:0;

	!empty($video_id) ? $video_id = wt_check_input($video_id) : '';

	if (!empty($video_id)){
		return "<div class='wt_video_wrap'><iframe class='wt_youtube'  src='http://www.youtube.com/embed/{$video_id}?autohide={$autohide}&amp;autoplay={$autoplay}&amp;controls={$controls}&amp;disablekb={$kbcontrols}&amp;fs={$fs}&amp;hd={$hd}&amp;loop={$loop}&amp;rel={$rel}&amp;showinfo={$showinfo}&amp;showsearch={$showsearch}&amp;wmode=transparent&amp;enablejsapi={$enablejsapi}' width='{$width}' height='{$height}' frameborder='0'></iframe></div>";
	}
}
function wt_vimeo_video($atts) {
	extract(shortcode_atts(array(
		'video_id' 	=> '',
		'autoplay'  => false,
	), $atts));

	$width = 940;
	$height = round($width * 9 / 16);
	
	if (!$autoplay){
		$autoplay = (wt_get_option('media','vimeo_autoplay') == true)?1:0;
	}else{
		if($autoplay==='true'){
			$autoplay = '1';
		}else{
			$autoplay = '0';
		}
	}
		
	$title = (wt_get_option('media','vimeo_title') == true)?1:0;
	$byline = (wt_get_option('media','vimeo_byline') == true)?1:0;
	$portrait = (wt_get_option('media','vimeo_portrait') == true)?1:0;
	$loop = (wt_get_option('media','vimeo_loop') == true)?1:0;

	!empty($video_id) ? $video_id = wt_check_input($video_id) : '';
	
	if (!empty($video_id) && is_numeric($video_id)){
		return "<div class='wt_video_wrap'><iframe class='wt_vimeo_video'  src='http://player.vimeo.com/video/{$video_id}?autoplay={$autoplay}&amp;title={$title}&amp;byline={$byline}&amp;portrait={$portrait}&amp;loop={$loop}' width='{$width}' height='{$height}' frameborder='0'></iframe></div>";
	}
}
function wt_dailymotion_video($atts, $content=null) {
	extract(shortcode_atts(array(
		'video_id' 	=> '',
		'autoplay'  => false,
	), $atts));
	
	$width = 940;
	$height = round($width * 9 / 16);
		
	if (!$autoplay){
		$autoplay = (wt_get_option('media','dailymotion_autoplay') == true)?1:0;
	}else{
		if($autoplay==='true'){
			$autoplay = '1';
		}else{
			$autoplay = '0';
		}
	}		
	
	$related = (wt_get_option('media','dailymotion_related') == true)?1:0;	
	$chromeless = (wt_get_option('media','dailymotion_chromeless') == true)?1:0;
	
	!empty($video_id) ? $video_id = wt_check_input($video_id) : '';
	
	if (!empty($video_id)){		
		return "<div class='wt_video_wrap'><iframe class='wt_dailymotion_video' src='http://www.dailymotion.com/embed/video/{$video_id}?autoPlay={$autoplay}&amp;related={$related}&amp;chromeless={$chromeless}&amp;expandVideo=1&amp;theme=none&amp;foreground=%23F7FFFD&amp;highlight=%23FFC300&amp;background=%23171D1B&amp;iframe=1&amp;wmode=transparent' width='{$width}' height='{$height}' frameborder='0'></iframe></div>";
	}
}
function wt_bliptv_video($atts) {
	extract(shortcode_atts(array(
		'video_id' 	=> '',
	), $atts));
	
	$width = 940;
	$height = round($width * 9 / 16);
	
	$autoplay = (wt_get_option('media','bliptv_autoplay') == true)?'autoStart=true':'autoStart=false';	
	
	!empty($video_id) ? $video_id = wt_check_input($video_id) : '';
		
	if (!empty($video_id)){
		return "<div class='wt_video_wrap'><iframe class='wt_bliptv_video' src='http://blip.tv/play/{$video_id}.html?p=1&amp;backcolor=0x000000&amp;lightcolor=0xffffff&amp;{$autoplay}' width='{$width}' height='{$height}' frameborder='0' allowfullscreen></iframe></div>";
	}	
}
function wt_metacafe_video($atts) {
	extract(shortcode_atts(array(
		'video_id' 	=> '',
		'autoplay'	=> false,
	), $atts));	
		
	if (!$autoplay){
		$autoplay = (wt_get_option('media','metacafe_autoplay') == true)?'playerVars=autoPlay=yes':'playerVars=autoPlay=no';
	}else{
		if($autoplay==='true'){
			$autoplay = 'playerVars=autoPlay=yes';
		}else{
			$autoplay = 'playerVars=autoPlay=no';
		}
	}	
	
	$getFlashvars = wt_get_option('media','metacafe_flashvars');
	!empty($getFlashvars) ? $flashvars = wt_check_input($getFlashvars) : $flashvars='';	
	!empty($video_id) ? $video_id = wt_check_input($video_id) : '';
	
	if (!empty($video_id)){		
		return <<<HTML
<div class="wt_video_wrap">
	<embed flashVars="{$autoplay}{$flashvars}" src="http://www.metacafe.com/fplayer/{$video_id}.swf" width="440" height="248" wmode="transparent" allowFullScreen="true" allowScriptAccess="always" name="Metacafe_{$video_id}" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
</div>
HTML;
	}
}
function wt_flash_video($atts) {
	extract(shortcode_atts(array(
		'location' 	=> '',
		'autoplay'	=> false,
	), $atts));
		
	if (!$autoplay){
		$autoplay = (wt_get_option('media','flash_autoplay') == true)?'true':'false';
	}else{
		if($autoplay==='true'){
			$autoplay = 'true';
		}else{
			$autoplay = 'false';
		}
	}
	
	$getFlashvars = wt_get_option('media','flash_flashvars');
	!empty($getFlashvars) ? $flashvars='flashVars="'.wt_check_input($getFlashvars).'"' : $flashvars='';	
	!empty($location) ? $location = wt_check_input($location) : '';
	
	$uri = THEME_URI;
	if (!empty($location)){
		return <<<HTML
<div class="wt_video_wrap">
<object type="application/x-shockwave-flash" data="{$location}" width="440" height="248">
	<param name="movie" value="{$location}" />
	<param name="quality" value="high" />
	<param name="allowFullScreen" value="true" />
	<param name="allowscriptaccess" value="always" />
	<param name="expressInstaller" value="{$uri}/swf/expressInstall.swf"/>
	<param name="PLAY" value="{$autoplay}"/>
	<param name="wmode" value="opaque" />
	<embed {$flashvars} src="{$location}" type="application/x-shockwave-flash" wmode="opaque" allowscriptaccess="always" allowfullscreen="true"  width="440" height="248"/>
</object>
</div>
HTML;
	}
}

function wt_html5_audio($atts) {
	extract(shortcode_atts(array(
		'mp3' 	=> '',
		'autoplay'	=> false,
	), $atts));	
		
	wp_print_styles('mediaelementjs-styles');
	wp_print_scripts('mediaelementjs-scripts');	
				
	// MP3 Source Supplied
	$mp3_source = '';
	if ($mp3) {
		$mp3_source = '<source type="audio/mp3" src="'.wt_check_input($mp3).'" />';
		$flash_src = wt_check_input($mp3);
	}
		
	if (!$autoplay){
		$autoplay = wt_get_option('media','audio_html5_autoplay');
	}else{
		if($autoplay==='true'){
			$autoplay = 'true';
		}else{
			$autoplay = 'false';
		}
	}
	
	$preload = wt_get_option('media','audio_html5_preload');
	$loop = wt_get_option('media','audio_html5_loop');		
		
	if ($autoplay) {
		$autoplay_var = 'autoplay=true&amp;';
		$autoplay_attr = " autoplay";
	} else {
		$autoplay_var = '';
		$autoplay_attr = "";
	}
	
	if ($preload) {
		$preload_attr = 'preload="auto"';
	} else {
		$preload_attr = 'preload="none"';
	}
		
	if ($loop) {
		$loop_var = 'loop=true&amp;';
		$loop_attr = " loop";
		$audio_loop = 'true';
	} else {
		$loop_var = '';
		$loop_attr = "";
		$audio_loop = 'false';
	}	
	
	$uri = THEME_URI;
	
	return <<<HTML
<div class="wt_audio_wrap">
<audio width="100%" height="30" class="wt_html5_audio" controls="controls" data-html5_audio_loop="{$audio_loop}" {$preload_attr}{$autoplay_attr}{$loop_attr} style="width: 100%;">{$mp3_source}<object width="100%" height="30" type="application/x-shockwave-flash" data="{$uri}/mediaelement/flashmediaelement.swf">
	<param name="movie" value="{$uri}/mediaelement/flashmediaelement.swf" />
	<param name="flashvars" value="controls=true&amp;{$autoplay_var}{$loop_var}file={$flash_src}" />
	</object></audio>	
</div>
HTML;
	
}