<?php
function wt_shortcode_isotope_element($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'location' => '',
		'type' => '',
		'title' => '',
		'lightbox' => 'false',
		'group' => '',
		'icon' => false,
		'link' => '#',
		'link_target' => false,	
	), $atts));	
	
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
	
	wp_enqueue_script('jquery-isotope');
	wp_enqueue_script('jquery-init-isotope');
	
	$link_target = $link_target?' target="'.$link_target.'"':'';
	$image = '<img alt="'.$title.'" src="'.wt_get_image_src($location).'" />';
	$lightboxOutput = ($lightbox =='true'?' data-rel="lightbox'.($group?'['.$group.']':'').'"':'');
	$overlayIcon = ($icon ? 'overlay_'.$icon : '');
	$elContent = "";
	if(!empty($content)) $elContent = '<div class="elContent">' .do_shortcode($content) . '</div>';  

	return <<<HTML
<div class="wt_element {$type}">
	<span class="wt_image_frame">
		<span class="wt_image_holder">
			<a{$lightboxOutput}{$link_target} class="{$overlayIcon}{$no_link}" title="{$title}" href="{$link}"> {$image} </a>
		</span>
	</span>
	{$elContent}
</div>
HTML;
			
}
add_shortcode('wt_isotope_element', 'wt_shortcode_isotope_element');