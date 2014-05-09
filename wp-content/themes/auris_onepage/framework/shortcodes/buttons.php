<?php
function wt_shortcode_button($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'link' => '#',
		'linktarget' => '',
		'title' => '',
		'colorstyle' => '',     
		'alt' => 'false',       
		'size' => 'small',
		'type' => '',            
		'uppercase' => 'false', 
		'full' => 'false',
		'width' => false,
		'align' => false,
		'id' => false,
		'classname' => false,
		'lightbox' => 'false',
		'group' => '',
		'customcolor' => '',
		'textcolor' => '',
		'bordercolor' => '', 
		'rightmargin' => 'true',
	), $atts)); 
	
	$title = $title?' title="'.$title.'"':'';	
	if($align != 'center' && $align !== false){
		$alignclass = ' align'.$align;
	}else{
		$alignclass = '';
	}	
	$colorstyle = $colorstyle?' wt_'.$colorstyle:'';
	$alt = ($alt==="false")?'':' alt';
	$size = $size?' '.$size:'';
	$type = $type?' wt_'.$type:'';
	$uppercase = ($uppercase==="false")?'':' text-transform: uppercase;';
	$full = ($full==="false")?'':' full';
	$width = $width?'width:'.$width.'px;':'';
	$id = $id?' id="'.$id.'"':'';
	$classname = $classname?' '.$classname:'';
	$no_link = '';
	if($lightbox == 'false' && $link == '#'){
		$no_link = ' no_link';
	}
	$linktarget = $linktarget ? ' target="'.$linktarget.'"':'';
	$customcolor = $customcolor ? 'background-color:'.$customcolor.';':'';
	$bordercolor = $bordercolor ? 'border-color:'.$bordercolor.';':'';	
	$buttonStyle = $customcolor !== '' || $bordercolor !== '' ? ' style="'.$customcolor.$bordercolor.'"':'';
	$textcolor = $textcolor ? 'color:'.$textcolor.';':'';
		
	$rightmargin = ($rightmargin==="true")?'':' margin_r_0';
		
	$content = '<a'.$id.$title.($lightbox =='true'?' data-rel="lightbox'.($group?'['.$group.']':'').'"':'').$linktarget.' class="wt_button'.$alt.$colorstyle.$size.$type.$full.$classname.$no_link.$alignclass.$rightmargin.'" href="'.$link.'" '.$buttonStyle.'><span'.(($textcolor!==''||$uppercase!==''||$width!='')?' style="'.$textcolor.$uppercase.$width.'"':'').'>' . trim($content) . '</span></a>';
	if($align === 'center'){
		return '<p align="center">'.$content.'</p>';
	}else{
		return $content;
	}
}
add_shortcode('wt_button','wt_shortcode_button');