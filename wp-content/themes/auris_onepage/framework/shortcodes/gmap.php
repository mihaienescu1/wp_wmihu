<?php
function wt_shortcode_googleMap($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		"width" => false,
		"height" => '380',
		"latitude" => 0,
		"longitude" => 0,
		"zoom" => 14,
		
		"controls" => 'false',		
		'pancontrol' => true,
		'zoomcontrol' => true,
		'maptypecontrol' => true,
		'scalecontrol' => true,
		'streetviewcontrol' => true,
		'overviewmapcontrol' => true,
		
		"maptype" => 'ROADMAP',
		"scrollwheel" => 'true',
		"draggable" => 'true',
		"doubleclickzoom" => 'true',
		'align' => false,
		
		"styling" => 'false',		
		'featuretype' => 'all',
		'elementtype' => 'all',
		'visibility' => 'on',
		'color' => '',
		'hue' => '',
		'saturation' => 0,
		'lightness' => 0,
		'gamma' => 1,
		
		"custommarkers" => 'false',	
		"customnavigation" => 'true',	
	), $atts));
	
	if($width){
		if(is_numeric($width)){
			if ( is_page_template('contact.php') ) {
				$width = $width.'%';
			}
			else {
				$width = $width.'px';
			}
		}
		$width = 'width:'.$width.';';
	}else{
		$width = '';
		$align = false;
	}
	if($height){
		if(is_numeric($height)){
			if ( is_page_template('contact.php') ) {
				$height = $height.'%';
			}
			else {
				$height = $height.'px';
			}
		}
		$height = 'height:'.$height.';';
	}else{
		$height = '';
	}
	
	wp_enqueue_script('jquery-gmap-sensor');
	wp_enqueue_script('jquery-gmap');
	
	$id = rand(100,1000);	
		
	$search  = array('G_NORMAL_MAP', 'G_SATELLITE_MAP', 'G_HYBRID_MAP', 'G_DEFAULT_MAP_TYPES', 'G_PHYSICAL_MAP');
	$replace = array('ROADMAP', 'SATELLITE', 'HYBRID', 'TERRAIN');
	$maptype = str_replace($search, $replace, $maptype);
		
	if($controls == 'true'){
		$controls = <<<HTML
{
	panControl: {$pancontrol},
	zoomControl: {$zoomcontrol},
	mapTypeControl: {$maptypecontrol},
	scaleControl: {$scalecontrol},
	streetViewControl: {$streetviewcontrol},
	overviewMapControl: {$overviewmapcontrol}
}
HTML;
	}	
		$customnavigation_out = '';
		if($customnavigation == 'true'){
		$customnavigation_out = <<<HTML
	<ul id="wt_gMap_controls">
		<li><a id="wt_zoomIn_{$id}" class="wt_zoomIn"><i></i></a></li>
		<li><a id="wt_zoomOut_{$id}" class="wt_zoomOut"><i></i></a></li>
		<li><a id="wt_resetMap_{$id}" class="wt_resetMap"><i></i></a></li>
	</ul>
HTML;
	}	
	
		$marker_output = '';
		
		if (!preg_match_all("/(.?)\[(marker)\b(.*?)(?:(\/))?\](?:(.+?)\[\])?(.?)/s", $content, $matches)) {
			// if there is no marker
			$markers_number = 0;			
		} else {	
			// if there is one or more markers
			$markers_number = count($matches[0]);
			
			for ($i = 0; $i < count($matches[0]); $i++) {
				$marker = $matches[3][$i];
				$marker_lat = 0;	
				$marker_long = 0;		
				$text = '';			
				$icon = THEME_IMAGES.'/marker.png';	// Default marker image		
				
				if (preg_match_all('/"([^"]+)"/', $marker, $m)) {    
					if ( isset($m[1][0]) ) { 
						$marker_lat = $m[1][0];    
					}     
					if ( isset($m[1][1]) ) { 
						$marker_long = $m[1][1];    
					}  
					if ( isset($m[1][2]) ) { 
						$text = $m[1][2];    
					}        
					if ( isset($m[1][3]) ) { 
						$icon = $m[1][3];    
					}    
				}
														
				$marker_lat = '"latitude": "'.$marker_lat.'", '; 
				$marker_long = '"longitude": "'.$marker_long.'", ';  
				$icon = '"icon": "'.$icon.'"' . ', ';
				$text = '"baloon_text": ' . "'" . $text . "'";  
				
				$marker_out =  $marker_lat != 0 || $marker_long != 0 || $text != '' || $icon != '' ? true : false;				
				
				if ($marker_out) {  
					if ($i < count($matches[0])-1) {
						${"marker_output_" . $i} = '{' . $marker_lat.$marker_long.$icon.$text . '},';
					} else {
						${"marker_output_" . $i} = '{' . $marker_lat.$marker_long.$icon.$text . '}';
					}
				}	
				$marker_output .= ${"marker_output_" . $i};														
			}				
		}
	
	$align = $align?' align'.$align:'';	
	
	if($styling == 'true'){
		$styling = <<<HTML
styling: 1,
			featureType: "{$featuretype}",
			elementType: "{$elementtype}",
			visibility: "{$visibility}",
			color: "{$color}",
			hue: "{$hue}",
			saturation: {$saturation},
			lightness: {$lightness},
			gamma: {$gamma}
HTML;
	} else {		
	$styling = <<<HTML
styling: 0
HTML;
	}	
	
	if($markers_number != 0){
		return <<<HTML
<div class="wt_gMap{$align}">
	<div id="wt_g_map_{$id}" class="wt_g_map" style="{$width}{$height}"></div>
    {$customnavigation_out}
</div>
<script type="text/javascript">
(function($){
	$(document).ready(function() {		
		var myMarkers = {"markers": [ {$marker_output}
			]
		};		
		$("#wt_g_map_{$id}").mapmarker({
			center: "{$latitude},{$longitude}",	
			zoom: {$zoom},		
			controls: {$controls},
			mapType: '{$maptype}',
			scrollwheel: {$scrollwheel},
			draggable: {$draggable},
			doubleclickzoom: {$doubleclickzoom},
			customMarkers: {$custommarkers},
			markers: myMarkers,
			{$styling}
		});
	});
})(jQuery);
</script>
HTML;
	} else {
return <<<HTML
<div class="wt_gMap{$align}">
	<div id="wt_g_map_{$id}" class="wt_g_map" style="{$width}{$height}"></div>
    {$customnavigation_out}
</div>
<script type="text/javascript">
(function($){
	$(document).ready(function() {
		$("#wt_g_map_{$id}").mapmarker({
			center: "{$latitude},{$longitude}",	
			zoom: {$zoom},		
			controls: {$controls},
			mapType: '{$maptype}',
			scrollwheel: {$scrollwheel},
			draggable: {$draggable},
			doubleclickzoom: {$doubleclickzoom},
			{$styling}
		});
	});
})(jQuery);
</script>
HTML;
?> <?php
	}
}

add_shortcode('wt_gMap','wt_shortcode_googleMap');