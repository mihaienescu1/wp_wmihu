<?php 			
	/* google fonts settings */
	$googlefonts = wt_get_option('fonts');	
	$googlefonts_css = '';		
	$used_gfonts = wt_get_option('fonts','used_googlefonts');			
	$gfont_str = '';
	if(is_array($used_gfonts)){
		foreach($used_gfonts as $font){
			$gfont_str = $font;
		}
		
		$gfont_info = explode(":", $gfont_str);
		
		if($googlefonts['enable_googlefonts']){
			$custom_code = stripslashes(wt_get_option('fonts','gfonts_code'));
			
			if(trim($custom_code) == ''){
				$googlefonts_css .=  <<<CSS
h1, h2, h3, h4, h5, #wt_intro p, #logo, .dropcap1, .dropcap2, .dropcap3, .custom_links span, .pp_description, #nav a.level-1-a {
	font-family: '{$gfont_info[0]}';
}
CSS;
			}
			$googlefonts_css .= $custom_code;
		}
	}
	
	/* font face settings */
	$fontface = wt_get_option('fonts');
	$fontface_css = '';
	if($fontface['enable_fontface']){
		if(is_array($fontface['fonts'])){
			foreach ($fontface['fonts'] as $font_str){
				$font_info = explode("|", $font_str);
				$stylesheet = THEME_FONTFACE_DIR.'/'.$font_info[0].'/stylesheet.css';
				if(file_exists($stylesheet)){
					$file_content = file_get_contents($stylesheet);
					if( preg_match("/@font-face\s*{[^}]*?font-family\s*:\s*('|\")$font_info[1]\\1.*?}/is", $file_content, $match) ){
						$fontface_css .= preg_replace("/url\s*\(\s*['|\"]\s*/is","\\0../font-faces/$font_info[0]/",$match[0])."\n";
					}
				}
			}
		}
		
		$code = stripslashes(wt_get_option('fonts','fontface_code'));
		if(trim($code) == '' && isset($font_info[1])){
			$code =  <<<CSS
h1, h2, h3, h4, h5, #wt_intro p, #logo, .dropcap1, .dropcap2, .dropcap3, .custom_links span, .pp_description, #nav a.level-1-a {
	font-family: {$font_info[1]};
}
CSS;
		}
		$fontface_css .= $code;
	}
	
	/* Custom Skin */	
			
	$general = wt_get_option('general');		
	if(!empty($general['custom_skin'])){
		$image_overlay = hex2rgb($general['custom_skin'],0.7);
		$custom_skin = <<<CSS
/* Custom Skin */
a:not(.wt_button),
.skin_color,		
#nav ul li.current_page_item a.level-1-a, 
#nav ul li.current_page_item.level-2-li a.level-2-a,
#nav ul li.current_page_item.level-3-li a.level-3-a, 
#nav ul li.current_page_item.level-4-li a.level-4-a,
#nav ul li.current-page-ancestor a.level-1-a,
#nav ul li.current-page-ancestor.level-2-li a.level-2-a,
#nav ul li.current-page-ancestor.level-3-li a.level-3-a,
#nav ul li.current-page-ancestor.level-4-li a.level-4-a,
#wt_footerWrapper .widget_tag_cloud a:hover,
.commentList .gravatar a,
#comments h3 span,
#wt_container .aboutTheAuthor_content h4,
.accordion h3.current,
#wt_container h4.portfolio_title a:hover,
#wt_footer a:hover,
ul.tabs li a.current,
.wp-pagenavi .currentPosts,
.wp-pagenavi .active_page {
	color: {$general['custom_skin']}; } 
.jcarousel-wrapper .blogEntry_content .read_more_link:hover,
.widget_subnav .current_page_item a,
.widget_subnav a:hover,
#breadcrumbs a:hover,
#topWidgetWrapper .widget_nav_menu li a:hover {
	color: {$general['custom_skin']} !important; } 
.progress_bar_content,
#wt_footerTop .inner,
#wt_footerBottom .inner,
.footerTopLeft,
.footerBottomRight,
#wt_sidebar .widget a.thumb:hover,
#wt_footer .widget a.thumb:hover,
#wt_content .widgetPosts a.thumb:hover {
	background: {$general['custom_skin']}; }
.topLeft,
.wpcf7-submit,
h6.framed_box_title,
.blogEntry_content .read_more_link,
a#cancel-comment-reply-link,
a#submit,
.error_page a.wt_button,
.image_overlay  {
	background-color: {$general['custom_skin']}; }
.ls-wp-container.ls-whoathemes .ls-nav-prev, 
.ls-wp-container.ls-whoathemes .ls-nav-next {
	background-color: {$general['custom_skin']} !important; }
.csstransforms .image_overlay {
	background-color: rgba({$image_overlay}); }
input[type="text"]:focus,
input[type="password"]:focus,
input[type="email"]:focus,
textarea:focus,
button:focus {
	border-color: {$general['custom_skin']}; }
ul.tabs li a.current {
	border-top-color: {$general['custom_skin']}; }
#nav ul li ul,
.blogEntry,
#comments h3,
.sortableLinks a.selected {
	border-bottom-color: {$general['custom_skin']}; }
.fullWidth #wt_content h1.dottedBg, #wt_main h1.dottedBg,
.fullWidth #wt_content h2.dottedBg, #wt_main h2.dottedBg,
.fullWidth #wt_content h3.dottedBg, #wt_main h3.dottedBg,
.fullWidth #wt_content h4.dottedBg, #wt_main h4.dottedBg,
.rightSidebar  #wt_sidebar h3,
.widget_subnav li.current_page_item a,
.toggle {
	border-left-color: {$general['custom_skin']}; } 
.leftSidebar  #wt_sidebar h3,
.leftSidebar .widget_subnav li.current_page_item a {
	border-right-color: {$general['custom_skin']}; }
/* End Custom Skin */	
CSS;
	}else{
		$custom_skin = '';
	}
	
	/* background settings */
	$background = wt_get_option('background');
	if(!empty($background['page_bg'])){
		$page_image = <<<CSS
	background-image: url('{$background['page_bg']}');
	background-repeat: {$background['page_repeat']};
	background-position: top {$background['page_position_x']};
	background-attachment: scroll
CSS;
	}else{
		$page_image = '';
	}
	
	if(!empty($background['header_bg'])){
		$header_image = <<<CSS
	background-image: url('{$background['header_bg']}');
	background-repeat: {$background['header_repeat']};
	background-position: top {$background['header_position_x']};
	background-attachment: scroll
CSS;
	}else{
		$header_image = '';
	}
	
	if(!empty($background['nav_bg'])){
		$nav_image = <<<CSS
	background-image: url('{$background['nav_bg']}');
	background-repeat: {$background['nav_repeat']};
	background-position: top {$background['nav_position_x']};
	background-attachment: scroll
CSS;
	}else{
		$nav_image = '';
	}
	if(!empty($background['header_left_bg'])){
		$topLeft_image = <<<CSS
	background-image: url('{$background['header_left_bg']}');
	background-repeat: {$background['header_left_repeat']};
	background-position: top {$background['header_left_position_x']};
	background-attachment: scroll
CSS;
	}else{
		$topLeft_image = '';
	}
	
	if(!empty($background['container_bg'])){
		$container_image = <<<CSS
	background-image: url('{$background['container_bg']}');
	background-repeat: {$background['container_repeat']};
	background-position: top {$background['container_position_x']};
	background-attachment: scroll
CSS;
	}else{
		$container_image = '';
	}
	
	if(!empty($background['content_bg'])){
		$content_image = <<<CSS
	background-image: url('{$background['content_bg']}');
	background-repeat: {$background['content_repeat']};
	background-position: top {$background['content_position_x']};
	background-attachment: scroll
CSS;
	}else{
		$content_image = '';
	}
	
	if(!empty($background['content_bg'])){
		$content_image = <<<CSS
	background-image: url('{$background['content_bg']}');
	background-repeat: {$background['content_repeat']};
	background-position: top {$background['content_position_x']};
	background-attachment: scroll
CSS;
	}else{
		$content_image = '';
	}
	
	if(!empty($background['footer_top_bg'])){
		$footer_top_image = <<<CSS
	background-image: url('{$background['footer_top_bg']}');
	background-repeat: {$background['footer_top_repeat']};
	background-position: top {$background['footer_top_position_x']};
	background-attachment: scroll
CSS;
	}else{
		$footer_top_image = '';
	}
	
	if(!empty($background['footer_bg'])){
		$footer_image = <<<CSS
	background-image: url('{$background['footer_bg']}');
	background-repeat: {$background['footer_repeat']};
	background-position: top {$background['footer_position_x']};
	background-attachment: scroll
CSS;
	}else{
		$footer_image = '';
	}
	
	if(!empty($background['footer_bottom_bg'])){
		$footer_bottom_image = <<<CSS
	background-image: url('{$background['footer_bottom_bg']}');
	background-repeat: {$background['footer_bottom_repeat']};
	background-position: top {$background['footer_bottom_position_x']};
	background-attachment: scroll
CSS;
	}else{
		$footer_bottom_image = '';
	}
		
/* Sections
========================================================== */
	if(!empty($background['section_1_bg_image'])){
		$section_1_bg_image = <<<CSS
	background-image: url('{$background['section_1_bg_image']}');
CSS;
	}else{
		$section_1_bg_image = '';
	}
	if(!empty($background['section_1_color'])){
		$section_1_color = <<<CSS
	background-color: {$background['section_1_color']};
CSS;
	}else{
		$section_1_color = '';
	}
	if(!empty($background['section_1_border_color'])){
		$section_1_border_color = <<<CSS
	border-color: {$background['section_1_border_color']};
CSS;
	}else{
		$section_1_border_color = '';
	}
	
	if(!empty($background['section_2_bg_image'])){
		$section_2_bg_image = <<<CSS
	background-image: url('{$background['section_2_bg_image']}');
CSS;
	}else{
		$section_2_bg_image = '';
	}
	if(!empty($background['section_2_color'])){
		$section_2_color = <<<CSS
	background-color: {$background['section_2_color']};
CSS;
	}else{
		$section_2_color = '';
	}
	if(!empty($background['section_2_border_color'])){
		$section_2_border_color = <<<CSS
	border-color: {$background['section_2_border_color']};
CSS;
	}else{
		$section_2_border_color = '';
	}
	
	if(!empty($background['section_3_bg_image'])){
		$section_3_bg_image = <<<CSS
	background-image: url('{$background['section_3_bg_image']}');
CSS;
	}else{
		$section_3_bg_image = '';
	}
	if(!empty($background['section_3_color'])){
		$section_3_color = <<<CSS
	background-color: {$background['section_3_color']};
CSS;
	}else{
		$section_3_color = '';
	}
	if(!empty($background['section_3_border_color'])){
		$section_3_border_color = <<<CSS
	border-color: {$background['section_3_border_color']};
CSS;
	}else{
		$section_3_border_color = '';
	}
	
	if(!empty($background['section_4_bg_image'])){
		$section_4_bg_image = <<<CSS
	background-image: url('{$background['section_4_bg_image']}');
CSS;
	}else{
		$section_4_bg_image = '';
	}
	if(!empty($background['section_4_color'])){
		$section_4_color = <<<CSS
	background-color: {$background['section_4_color']};
CSS;
	}else{
		$section_4_color = '';
	}
	if(!empty($background['section_4_border_color'])){
		$section_4_border_color = <<<CSS
	border-color: {$background['section_4_border_color']};
CSS;
	}else{
		$section_4_border_color = '';
	}	
	
	if(!empty($background['section_5_bg_image'])){
		$section_5_bg_image = <<<CSS
	background-image: url('{$background['section_5_bg_image']}');
CSS;
	}else{
		$section_5_bg_image = '';
	}
	if(!empty($background['section_5_color'])){
		$section_5_color = <<<CSS
	background-color: {$background['section_5_color']};
CSS;
	}else{
		$section_5_color = '';
	}
	if(!empty($background['section_5_border_color'])){
		$section_5_border_color = <<<CSS
	border-color: {$background['section_5_border_color']};
CSS;
	}else{
		$section_5_border_color = '';
	}
	
	if(!empty($background['section_6_bg_image'])){
		$section_6_bg_image = <<<CSS
	background-image: url('{$background['section_6_bg_image']}');
CSS;
	}else{
		$section_6_bg_image = '';
	}
	if(!empty($background['section_6_color'])){
		$section_6_color = <<<CSS
	background-color: {$background['section_6_color']};
CSS;
	}else{
		$section_6_color = '';
	}
	if(!empty($background['section_6_border_color'])){
		$section_6_border_color = <<<CSS
	border-color: {$background['section_6_border_color']};
CSS;
	}else{
		$section_6_border_color = '';
	}
	
	if(!empty($background['section_7_bg_image'])){
		$section_7_bg_image = <<<CSS
	background-image: url('{$background['section_7_bg_image']}');
CSS;
	}else{
		$section_7_bg_image = '';
	}
	if(!empty($background['section_7_color'])){
		$section_7_color = <<<CSS
	background-color: {$background['section_7_color']};
CSS;
	}else{
		$section_7_color = '';
	}
	if(!empty($background['section_7_border_color'])){
		$section_7_border_color = <<<CSS
	border-color: {$background['section_7_border_color']};
CSS;
	}else{
		$section_7_border_color = '';
	}
	
	if(!empty($background['section_8_bg_image'])){
		$section_8_bg_image = <<<CSS
	background-image: url('{$background['section_8_bg_image']}');
CSS;
	}else{
		$section_8_bg_image = '';
	}
	if(!empty($background['section_8_color'])){
		$section_8_color = <<<CSS
	background-color: {$background['section_8_color']};
CSS;
	}else{
		$section_8_color = '';
	}
	if(!empty($background['section_8_border_color'])){
		$section_8_border_color = <<<CSS
	border-color: {$background['section_8_border_color']};
CSS;
	}else{
		$section_8_border_color = '';
	}
	
	if(!empty($background['section_9_bg_image'])){
		$section_9_bg_image = <<<CSS
	background-image: url('{$background['section_9_bg_image']}');
CSS;
	}else{
		$section_9_bg_image = '';
	}
	if(!empty($background['section_9_color'])){
		$section_9_color = <<<CSS
	background-color: {$background['section_9_color']};
CSS;
	}else{
		$section_9_color = '';
	}
	if(!empty($background['section_9_border_color'])){
		$section_9_border_color = <<<CSS
	border-color: {$background['section_9_border_color']};
CSS;
	}else{
		$section_9_border_color = '';
	}
	
	if(!empty($background['section_10_bg_image'])){
		$section_10_bg_image = <<<CSS
	background-image: url('{$background['section_10_bg_image']}');
CSS;
	}else{
		$section_10_bg_image = '';
	}
	if(!empty($background['section_10_color'])){
		$section_10_color = <<<CSS
	background-color: {$background['section_10_color']};
CSS;
	}else{
		$section_10_color = '';
	}
	if(!empty($background['section_10_border_color'])){
		$section_10_border_color = <<<CSS
	border-color: {$background['section_10_border_color']};
CSS;
	}else{
		$section_10_border_color = '';
	}
	
		
	/* color settings */
	$color = wt_get_option('color');	
	
	if($color['content_h1']==''){
		$color['content_h1']=$color['content_header'];
	}
	if($color['content_h2']==''){
		$color['content_h2']=$color['content_header'];
	}
	if($color['content_h3']==''){
		$color['content_h3']=$color['content_header'];
	}
	if($color['content_h4']==''){
		$color['content_h4']=$color['content_header'];
	}
	if($color['content_h5']==''){
		$color['content_h5']=$color['content_header'];
	}
	if($color['content_h6']==''){
		$color['content_h6']=$color['content_header'];
	}			
	
	if( !empty($background['section_1_bg_image']) || !empty($background['section_1_color']) || !empty($background['section_1_border_color']) ){
		$section_1_css = <<<CSS
.wt_section_1 {	
{$section_1_bg_image}
{$section_1_color}
{$section_1_border_color}
}
CSS;
	} else {
		$section_1_css = '';
	}
		
	if( !empty($background['section_2_bg_image']) || !empty($background['section_2_color']) || !empty($background['section_2_border_color']) ){
		$section_2_css = <<<CSS
.wt_section_2 {	
{$section_2_bg_image}
{$section_2_color}
{$section_2_border_color}
}
CSS;
	} else {
		$section_2_css = '';
	}
		
	if( !empty($background['section_3_bg_image']) || !empty($background['section_3_color']) || !empty($background['section_3_border_color']) ){
		$section_3_css = <<<CSS
.wt_section_3 {	
{$section_3_bg_image}
{$section_3_color}
{$section_3_border_color}
}
CSS;
	} else {
		$section_3_css = '';
	}
		
	if( !empty($background['section_4_bg_image']) || !empty($background['section_4_color']) || !empty($background['section_4_border_color']) ){
		$section_4_css = <<<CSS
.wt_section_4 {	
{$section_4_bg_image}
{$section_4_color}
{$section_4_border_color}
}
CSS;
	} else {
		$section_4_css = '';
	}
		
	if( !empty($background['section_5_bg_image']) || !empty($background['section_5_color']) || !empty($background['section_5_border_color']) ){
		$section_5_css = <<<CSS
.wt_section_5 {	
{$section_5_bg_image}
{$section_5_color}
{$section_5_border_color}
}
CSS;
	} else {
		$section_5_css = '';
	}
		
	if( !empty($background['section_6_bg_image']) || !empty($background['section_6_color']) || !empty($background['section_6_border_color']) ){
		$section_6_css = <<<CSS
.wt_section_6 {	
{$section_6_bg_image}
{$section_6_color}
{$section_6_border_color}
}
CSS;
	} else {
		$section_6_css = '';
	}
		
	if( !empty($background['section_7_bg_image']) || !empty($background['section_7_color']) || !empty($background['section_7_border_color']) ){
		$section_7_css = <<<CSS
.wt_section_7 {	
{$section_7_bg_image}
{$section_7_color}
{$section_7_border_color}
}
CSS;
	} else {
		$section_7_css = '';
	}
		
	if( !empty($background['section_8_bg_image']) || !empty($background['section_8_color']) || !empty($background['section_8_border_color']) ){
		$section_8_css = <<<CSS
.wt_section_8 {	
{$section_8_bg_image}
{$section_8_color}
{$section_8_border_color}
}
CSS;
	} else {
		$section_8_css = '';
	}
		
	if( !empty($background['section_9_bg_image']) || !empty($background['section_9_color']) || !empty($background['section_9_border_color']) ){
		$section_9_css = <<<CSS
.wt_section_9 {	
{$section_9_bg_image}
{$section_9_color}
{$section_9_border_color}
}
CSS;
	} else {
		$section_9_css = '';
	}
		
	if( !empty($background['section_10_bg_image']) || !empty($background['section_10_color']) || !empty($background['section_10_border_color']) ){
		$section_10_css = <<<CSS
.wt_section_10 {	
{$section_10_bg_image}
{$section_10_color}
{$section_10_border_color}
}
CSS;
	} else {
		$section_10_css = '';
	}
	
	/* section settings */	
	$sections_css = '';
	$sections_css .=  <<<CSS
{$section_1_css}
{$section_2_css}
{$section_3_css}
{$section_4_css}
{$section_5_css}
{$section_6_css}
{$section_7_css}
{$section_8_css}
{$section_9_css}
{$section_10_css}
CSS;

	/* blog settings */
	$posts_gap = wt_get_option('blog', 'posts_gap');
	
	/* slideshows settings */
	$height_anything = wt_get_option('slideshow', 'anything_height');
	$anything_caption_height = $height_anything-40;
	$top_controlNav_anything= $height_anything+15;	
		
	/* font size settings */
	$font = wt_get_option('fonts');

	/* layout settings */	
	$layout_css = '';
	if(wt_get_option('general','layout_style')== 'wt_boxed'){
		$layout_css .=  <<<CSS
#wt_page {
	max-width: 1000px; 
	margin: 0 auto;
}
CSS;
	}
	
	/* menu settings */	
	$menu_css = '';
	if(wt_get_option('general','menu_alignment')== 'right'){
		$menu_css .=  <<<CSS
#nav {
	float: right;
}
CSS;
	}		
	
	/* responsive settings */	
	$responsive_css = '';
	if(wt_get_option('general','enable_responsive')){
		$responsive_css .=  <<<CSS
#wt_page {
	overflow: hidden;
}
CSS;
	}
	
	/* non responsive settings */	
	$non_responsive_css = '';
	if(!wt_get_option('general','enable_responsive')){
		$non_responsive_css .=  <<<CSS
#wt_wrapper {
	min-width: 1000px;
}
CSS;
	}	

	/* custom css */
	$custom_css = wt_get_option('general','custom_css');

	/* Css output */
	return <<<CSS
body {
	font-size: {$font['content_page']}px;
	font-family: {$font['font_family']};
	line-height: {$font['line_height']};
	color: {$color['page_content']};	
	{$page_image}
}
{$layout_css}
{$non_responsive_css}
{$responsive_css}	
{$fontface_css}
{$googlefonts_css}
{$sections_css}	
{$custom_skin}
#anything_slider_wrap,
#anything_slider_loading, 
#anything_slider {
	height: {$height_anything}px;
}
.caption_left, .caption_right {
	height: {$anything_caption_height}px;
}
#anything_slider .anything_sidebar_content {
	height: {$anything_caption_height}px;
}
#header,
#stickyHeaderBg {
	background-color: {$background['header_bg_color']};
{$header_image}
}
#topWidgetWrapper {
	background-color: {$background['header_bg_color']};
}
#nav {
	border-bottom-color: {$background['nav_bg_color']};
	background-color: {$background['nav_bg_color']};
{$nav_image}
}
#nav ul li a span {
	border-top-color: {$background['nav_bg_color']}; }
#containerWrapper,
#containerWrapper.wt_section {	
	background-color: {$background['container_bg_color']};
{$container_image}
}
#wt_content {	
	background-color: {$background['content_bg_color']};
{$content_image}
}
#wt_footerTop {	
	background-color: {$background['footer_top_color']};
{$footer_top_image}
}
#wt_footerWrapper {	
	background-color: {$background['footer_color']};
{$footer_image}
}
#wt_footerBottom {	
	background-color: {$background['footer_bottom_color']};
{$footer_bottom_image}
}

h1, h2, h3, h4, h5, h6,
#wt_container h1 a:link,
#wt_container h1 a:visited,
#wt_container h2 a:link,
#wt_container h2 a:visited,
#wt_container h3 a:link,
#wt_container h3 a:visited,
#wt_container h4 a:link,
#wt_container h4 a:visited,
#wt_container h5 a:link,
#wt_container h5 a:visited,
#wt_container h6 a:link,
#wt_container h6 a:visited {
	color: {$color['content_header']};
}

h1 {
	font-size: {$font['content_h1']}px;
	color: {$color['content_h1']};
}
#wt_container h1 a:link,
#wt_container h1 a:visited {
	color: {$color['content_h1']};
}
h2 {
	font-size: {$font['content_h2']}px;
	color: {$color['content_h2']};
}
#wt_container h2 a:link,
#wt_container h2 a:visited {
	color: {$color['content_h2']};
}
h3 {
	font-size: {$font['content_h3']}px;
	color: {$color['content_h3']};
}
#wt_container h3 a:link,
#wt_container h3 a:visited {
	color: {$color['content_h3']};
}
h4 {
	font-size: {$font['content_h4']}px;
	color: {$color['content_h4']};
}
#wt_container h4 a:link,
#wt_container h4 a:visited {
	color: {$color['content_h4']};
}
h5 {
	font-size: {$font['content_h5']}px;
	color: {$color['content_h5']};
}
#wt_container h5 a:link,
#wt_container h5 a:visited {
	color: {$color['content_h5']};
}
h6 {
	font-size: {$font['content_h6']}px;
	color: {$color['content_h6']};
}
#wt_container h6 a:link,
#wt_container h6 a:visited {
	color: {$color['content_h6']};
}
#wt_container a:link,
#wt_container a:visited {
	color: {$color['content_link']};
}
#logo_text a:link,
#logo_text a:visited {
	color: {$color['logo_color']};
	font-size: {$font['logo_size']}px;
}
#siteDescription {
	color: {$color['logo_color_desc']};
	font-size: {$font['logo_size_desc']}px;
}
{$menu_css}
#nav ul li a.level-1-a {
	color: {$color['menu_top']};
	font-size: {$font['menu_top']}px;
}
#nav ul li a.level-1-a:hover,
#nav ul li.level-1-li:hover a.level-1-a {
	color: {$color['menu_top_hover']};
}
#nav ul li.current_page_item a.level-1-a, 
#nav ul li.current_page_item.level-2-li a.level-2-a,
#nav ul li.current_page_item.level-3-li a.level-3-a, 
#nav ul li.current_page_item.level-4-li a.level-4-a,
#nav ul li.current-page-ancestor a.level-1-a,
#nav ul li.current-page-ancestor.level-2-li a.level-2-a,
#nav ul li.current-page-ancestor.level-3-li a.level-3-a,
#nav ul li.current-page-ancestor.level-4-li a.level-4-a,
#nav ul li.current_page_ancestor a.level-1-a,
#nav ul li.current_page_ancestor.level-2-li a.level-2-a,
#nav ul li.current_page_ancestor.level-3-li a.level-3-a,
#nav ul li.current_page_ancestor.level-4-li a.level-4-a,
#nav ul li.current-menu-ancestor a.level-1-a {
	color: {$color['menu_top_current']};
}
#nav ul ul a {
	color: {$color['menu_sub']};
	font-size: {$font['menu_sub']}px;
}
#nav ul li ul li a:hover {
	color: {$color['menu_sub_hover']} !important;
}
#wt_footerTop a:link, 
#wt_footerTop a:visited {
	color: {$color['footer_menu']};
	font-size: {$font['footer_menu']}px;
}
#wt_footerBottom .widget_nav_menu li a:link,
#wt_footerBottom .widget_nav_menu li a:visited {
	color: {$color['footer_bottom_menu']};
	font-size: {$font['footer_bottom_menu']}px;
}
#copyright p {
	color: {$color['copyright']};
	font-size: {$font['copyright']}px;
}
#wt_footer a:link,
#wt_footer a:visited {
	color: {$color['footer_link']};
}
#wt_footer a:hover {
	color: {$color['footer_link_active']};
}
#wt_footer .widget,
#wt_footer p {
	color: {$color['footer_text']};
	font-size: {$font['footer_text']}px;
}
#wt_footerWrapper  h3.widgettitle {
	font-size: {$font['footer_title']}px;
}
#introHeaderWidget h1 {
	font-size: {$font['description_title']}px;
}
#introHeaderWidget h2,
#introHeaderWidget p {
	font-size: {$font['description_text']}px;
}
#wt_sidebar .widgettitle {
	font-size: {$font['sidebar_widget_title']}px;
}
#breadcrumbs {
	color: {$color['breadcrumbs']};
}
#breadcrumbs a:link,
#breadcrumbs a:visited {
	color: {$color['breadcrumbs_link']};
}
#breadcrumbs a:hover {
	color: {$color['breadcrumbs_hover']};
}
.blogEntry {
	margin-bottom:{$posts_gap}px;
}
.social_wrap a.aim:hover, .social_wrap a.aim_32:hover, .social_wrap_alt a.aim, .social_wrap_alt a.aim:hover, .social_wrap_alt a.aim_32, .social_wrap_alt a.aim_32:hover { 
	background-color: {$color['aim_color']}; 
}
.social_wrap a.apple:hover, .social_wrap a.apple_32:hover, .social_wrap_alt a.apple, .social_wrap_alt a.apple:hover, .social_wrap_alt a.apple_32, .social_wrap_alt a.apple_32:hover { 
	background-color: {$color['apple_color']}; 
}
.social_wrap a.behance:hover, .social_wrap a.behance_32:hover, .social_wrap_alt a.behance, .social_wrap_alt a.behance:hover, .social_wrap_alt a.behance_32, .social_wrap_alt a.behance_32:hover { 
	background-color: {$color['behance_color']}; 
}
.social_wrap a.blogger:hover, .social_wrap a.blogger_32:hover, .social_wrap_alt a.blogger, .social_wrap_alt a.blogger:hover, .social_wrap_alt a.blogger_32, .social_wrap_alt a.blogger_32:hover { 
	background-color: {$color['blogger_color']}; 
}
.social_wrap a.delicious:hover, .social_wrap a.delicious_32:hover, .social_wrap_alt a.delicious, .social_wrap_alt a.delicious:hover, .social_wrap_alt a.delicious_32, .social_wrap_alt a.delicious_32:hover { 
	background-color: {$color['delicious_color']}; 
}
.social_wrap a.deviantart:hover, .social_wrap a.deviantart_32:hover, .social_wrap_alt a.deviantart, .social_wrap_alt a.deviantart:hover, .social_wrap_alt a.deviantart_32, .social_wrap_alt a.deviantart_32:hover { 		
	background-color: {$color['deviantart_color']}; 
}
.social_wrap a.digg:hover, .social_wrap a.digg_32:hover, .social_wrap_alt a.digg, .social_wrap_alt a.digg:hover, .social_wrap_alt a.digg_32, .social_wrap_alt a.digg_32:hover { 
	background-color: {$color['digg_color']}; 
}
.social_wrap a.dribbble:hover, .social_wrap a.dribbble_32:hover, .social_wrap_alt a.dribbble, .social_wrap_alt a.dribbble:hover, .social_wrap_alt a.dribbble_32, .social_wrap_alt a.dribbble_32:hover { 
	background-color: {$color['dribbble_color']}; 
}
.social_wrap a.email:hover, .social_wrap a.email_32:hover, .social_wrap_alt a.email, .social_wrap_alt a.email:hover, .social_wrap_alt a.email_32, .social_wrap_alt a.email_32:hover { 
	background-color: {$color['email_color']}; 
}
.social_wrap a.ember:hover, .social_wrap a.ember_32:hover, .social_wrap_alt a.ember, .social_wrap_alt a.ember:hover, .social_wrap_alt a.ember_32, .social_wrap_alt a.ember_32:hover { 
	background-color: {$color['ember_color']}; 
}
.social_wrap a.facebook:hover, .social_wrap a.facebook_32:hover, .social_wrap_alt a.facebook, .social_wrap_alt a.facebook:hover, .social_wrap_alt a.facebook_32, .social_wrap_alt a.facebook_32:hover { 
	background-color: {$color['facebook_color']}; 
}
.social_wrap a.flickr:hover, .social_wrap a.flickr_32:hover, .social_wrap_alt a.flickr, .social_wrap_alt a.flickr:hover, .social_wrap_alt a.flickr_32, .social_wrap_alt a.flickr_32:hover { 
	background-color: {$color['flickr_color']}; 
}
.social_wrap a.forrst:hover, .social_wrap a.forrst_32:hover, .social_wrap_alt a.forrst, .social_wrap_alt a.forrst:hover, .social_wrap_alt a.forrst_32, .social_wrap_alt a.forrst_32:hover { 
	background-color: {$color['forrst_color']}; 
}
.social_wrap a.google:hover, .social_wrap a.google_32:hover, .social_wrap_alt a.google, .social_wrap_alt a.google:hover, .social_wrap_alt a.google_32, .social_wrap_alt a.google_32:hover { 
	background-color: {$color['google_color']}; 
}
.social_wrap a.googleplus:hover, .social_wrap a.googleplus_32:hover, .social_wrap_alt a.googleplus, .social_wrap_alt a.googleplus:hover, .social_wrap_alt a.googleplus_32, .social_wrap_alt a.googleplus_32:hover { 
	background-color: {$color['googleplus_color']}; 
}
.social_wrap a.html5:hover, .social_wrap a.html5_32:hover, .social_wrap_alt a.html5, .social_wrap_alt a.html5:hover, .social_wrap_alt a.html5_32, .social_wrap_alt a.html5_32:hover { 
	background-color: {$color['html5_color']}; 
}
.social_wrap a.lastfm:hover, .social_wrap a.lastfm_32:hover, .social_wrap_alt a.lastfm, .social_wrap_alt a.lastfm:hover, .social_wrap_alt a.lastfm_32, .social_wrap_alt a.lastfm_32:hover { 
	background-color: {$color['lastfm_color']}; 
}
.social_wrap a.linkedin:hover, .social_wrap a.linkedin_32:hover, .social_wrap_alt a.linkedin, .social_wrap_alt a.linkedin:hover, .social_wrap_alt a.linkedin_32, .social_wrap_alt a.linkedin_32:hover { 
	background-color: {$color['linkedin_color']}; 
}
.social_wrap a.metacafe:hover, .social_wrap a.metacafe_32:hover, .social_wrap_alt a.metacafe, .social_wrap_alt a.metacafe:hover, .social_wrap_alt a.metacafe_32, .social_wrap_alt a.metacafe_32:hover { 
	background-color: {$color['metacafe_color']}; 
}
.social_wrap a.netvibes:hover, .social_wrap a.netvibes_32:hover, .social_wrap_alt a.netvibes, .social_wrap_alt a.netvibes:hover, .social_wrap_alt a.netvibes_32, .social_wrap_alt a.netvibes_32:hover  { 
	background-color: {$color['netvibes_color']}; 
}
.social_wrap a.paypal:hover, .social_wrap a.paypal_32:hover, .social_wrap_alt a.paypal, .social_wrap_alt a.paypal:hover, .social_wrap_alt a.paypal_32, .social_wrap_alt a.paypal_32:hover { 
	background-color: {$color['paypal_color']}; 
}
.social_wrap a.picasa:hover, .social_wrap a.picasa_32:hover, .social_wrap_alt a.picasa, .social_wrap_alt a.picasa:hover, .social_wrap_alt a.picasa_32, .social_wrap_alt a.picasa_32:hover { 
	background-color: {$color['picasa_color']}; 
}
.social_wrap a.pinterest:hover, .social_wrap a.pinterest_32:hover, .social_wrap_alt a.pinterest, .social_wrap_alt a.pinterest:hover, .social_wrap_alt a.pinterest_32, .social_wrap_alt a.pinterest_32:hover { 
	background-color: {$color['pinterest_color']}; 
}
.social_wrap a.reddit:hover, .social_wrap a.reddit_32:hover, .social_wrap_alt a.reddit, .social_wrap_alt a.reddit:hover, .social_wrap_alt a.reddit_32, .social_wrap_alt a.reddit_32:hover { 
	background-color: {$color['reddit_color']}; 
}
.social_wrap a.rss:hover, .social_wrap a.rss_32:hover, .social_wrap_alt a.rss, .social_wrap_alt a.rss:hover, .social_wrap_alt a.rss_32, .social_wrap_alt a.rss_32:hover { 
	background-color: {$color['rss_color']}; 
}
.social_wrap a.skype:hover, .social_wrap a.skype_32:hover, .social_wrap_alt a.skype, .social_wrap_alt a.skype:hover, .social_wrap_alt a.skype_32, .social_wrap_alt a.skype_32:hover { 
	background-color: {$color['skype_color']}; 
}
.social_wrap a.stumbleupon:hover, .social_wrap a.stumbleupon_32:hover, .social_wrap_alt a.stumbleupon, .social_wrap_alt a.stumbleupon:hover, .social_wrap_alt a.stumbleupon_32, .social_wrap_alt a.stumbleupon_32:hover { 
	background-color: {$color['stumbleupon_color']}; 
}
.social_wrap a.technorati:hover, .social_wrap a.technorati_32:hover, .social_wrap_alt a.technorati, .social_wrap_alt a.technorati:hover, .social_wrap_alt a.technorati_32, .social_wrap_alt a.technorati_32:hover { 
	background-color: {$color['technorati_color']}; 
}
.social_wrap a.tumblr:hover, .social_wrap a.tumblr_32:hover, .social_wrap_alt a.tumblr, .social_wrap_alt a.tumblr:hover, .social_wrap_alt a.tumblr_32, .social_wrap_alt a.tumblr_32:hover { 
	background-color: {$color['tumblr_color']}; 
}
.social_wrap a.twitter:hover, .social_wrap a.twitter_32:hover, .social_wrap_alt a.twitter, .social_wrap_alt a.twitter:hover, .social_wrap_alt a.twitter_32, .social_wrap_alt a.twitter_32:hover { 
	background-color: {$color['twitter_color']}; 
}
.social_wrap a.vimeo:hover, .social_wrap a.vimeo_32:hover, .social_wrap_alt a.vimeo, .social_wrap_alt a.vimeo:hover, .social_wrap_alt a.vimeo_32, .social_wrap_alt a.vimeo_32:hover { 
	background-color: {$color['vimeo_color']}; 
}
.social_wrap a.wordpress:hover, .social_wrap a.wordpress_32:hover, .social_wrap_alt a.wordpress, .social_wrap_alt a.wordpress:hover, .social_wrap_alt a.wordpress_32, .social_wrap_alt a.wordpress_32:hover { 
	background-color: {$color['wordpress_color']}; 
}
.social_wrap a.yahoo:hover, .social_wrap a.yahoo_32:hover, .social_wrap_alt a.yahoo, .social_wrap_alt a.yahoo:hover, .social_wrap_alt a.yahoo_32, .social_wrap_alt a.yahoo_32:hover { 
	background-color: {$color['yahoo_color']}; 
}
.social_wrap a.yelp:hover, .social_wrap a.yelp_32:hover, .social_wrap_alt a.yelp, .social_wrap_alt a.yelp:hover, .social_wrap_alt a.yelp_32, .social_wrap_alt a.yelp_32:hover { 
	background-color: {$color['yelp_color']}; 
}
.social_wrap a.youtube:hover, .social_wrap a.youtube_32:hover, .social_wrap_alt a.youtube, .social_wrap_alt a.youtube:hover, .social_wrap_alt a.youtube_32, .social_wrap_alt a.youtube_32:hover { 
	background-color: {$color['youtube_color']}; 
}

/* ----------------- Custom css ----------------- */
{$custom_css}
CSS;
?>