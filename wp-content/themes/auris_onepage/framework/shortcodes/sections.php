<?php
function wt_shortcode_section($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'id_attr' => '',
		'class_attr' => '',
		'border' => 'false',
		'shadow' => 'false',
		'wrap' => 'false',	
	), $atts));
	
	if ($id_attr != '') {
		$id_attr = ' id="'.$id_attr.'"';
	}	
	else $id_attr = '';
		
	if ($class_attr != '') {
		$class_attr = ' '.$class_attr;
	}	
	else $id_attr = '';	
	
	if($border==='true'){
		$border = ' wt_border';
	}else{
		$border = '';
	}
	
	if($shadow==='true'){
		$shadow = ' wt_shadow';
	}else{
		$shadow = '';
	}
	
	if($wrap==='true'){
		$wrap = 'true';
	}else{
		$wrap = 'false';
	}
	
	$content = do_shortcode(stripslashes($content));
	if($wrap == 'false'){	
		return <<<HTML
		<section{$id_attr} class="{$code}{$border}{$shadow} wt_section{$class_attr}"> {$content} </section>
HTML;
	} else {
		return <<<HTML
		<section{$id_attr} class="{$code}{$border}{$shadow} wt_section{$class_attr}"> 
			<div class="inner">
				{$content} 
			</div>
		</section>
HTML;
	}

}

add_shortcode('wt_section_1', 'wt_shortcode_section');
add_shortcode('wt_section_2', 'wt_shortcode_section');
add_shortcode('wt_section_3', 'wt_shortcode_section');
add_shortcode('wt_section_4', 'wt_shortcode_section');
add_shortcode('wt_section_5', 'wt_shortcode_section');
add_shortcode('wt_section_6', 'wt_shortcode_section');
add_shortcode('wt_section_7', 'wt_shortcode_section');
add_shortcode('wt_section_8', 'wt_shortcode_section');
add_shortcode('wt_section_9', 'wt_shortcode_section');
add_shortcode('wt_section_10', 'wt_shortcode_section');
