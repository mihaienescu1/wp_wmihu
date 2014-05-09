<?php 
/**
 * JavaScripts In Header
 */
function wt_enqueue_scripts() {
	if(is_admin()){
		return;
	}
	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizr', THEME_JS . '/vendor/modernizr-2.6.1.min.js', array(), null, false);
	wp_enqueue_script( 'conditional', THEME_JS . '/vendor/conditional.js', array(), null, false);	
	
	wp_enqueue_script( 'plugins', THEME_JS . '/plugins.js', array(), null, true);
	wp_enqueue_script( 'main', THEME_JS . '/main.js', array(), null, true);
	wp_enqueue_script( 'fitvids', THEME_JS . '/vendor/jquery.fitvids.js', array(), null, true);		
	wp_enqueue_script( 'bootstrap', THEME_JS .'/vendor/bootstrap.js', array(), null, true);	
	wp_enqueue_script( 'waypoint', THEME_JS .'/vendor/jquery.waypoint.js', array(), null, true);	
	if(wt_get_option('general','enable_animation')){
		wp_enqueue_script( 'inview', THEME_JS . '/vendor/jquery.inview.js', array(), null, true);
	}

	if ( is_singular() && comments_open() ){
		wp_enqueue_script( 'comment-reply', true, true, true, true );
	}
		
	wp_register_script( 'nivo', THEME_JS . '/vendor/jquery.nivo.slider.pack.js', array(), null);
	wp_register_script( 'flex', THEME_JS . '/vendor/jquery.flexslider-min.js', array(), null);
	wp_register_script( 'anything', THEME_JS . '/vendor/jquery.anythingslider.min.js', array(), null);
	wp_register_script( 'anything-video', THEME_JS . '/vendor/jquery.anythingslider.video.min.js', array('jquery','swfobject'),null);	
	wp_register_script( 'cycle', THEME_JS . '/vendor/jquery.cycle.min.js', array(), null, true);
	wp_register_script( 'cycle-vert', THEME_JS . '/vendor/jquery.cycle.scoll_vert.min.js', array(), null, true);
	wp_register_script( 'cycle-shuffle', THEME_JS . '/vendor/jquery.cycle.shuffle.min.js', array(), null, true);
	wp_register_script( 'cycle-tile', THEME_JS . '/vendor/jquery.cycle.tile.min.js', array(), null, true);
	wp_register_script( 'cycle-youtube', THEME_JS . '/vendor/jquery.cycle.youtube.min.js', array(), null, true);
	wp_register_script( 'jcarousel', THEME_JS .'/vendor/jquery.jcarousel.min.js', array(), null, true);
	wp_register_script( 'knob', THEME_JS .'/vendor/jquery.knob.js', array(), null, true);
		
	wp_register_script( 'mobileMenu', THEME_JS . '/vendor/init.mobileMenu.js', array(), null, true);		
	wp_register_script( 'nice-scroll', THEME_JS . '/vendor/jquery.nicescroll.min.js', array(), null);
	wp_register_script( 'cufon-yui', THEME_JS .'/vendor/cufon-yui.js', array(), null);
	wp_register_script( 'jquery-tweet', THEME_JS .'/vendor/jquery.tweet.js', array(), null, true);
	wp_register_script( 'jquery-flickr', THEME_JS .'/vendor/jquery.flickr.js', array(), null, true);
	wp_register_script( 'jquery-isotope', THEME_JS .'/vendor/jquery.isotope.min.js', array(), null);
	wp_register_script( 'jquery-init-isotope', THEME_JS .'/vendor/init.isotope.js', array('jquery','jquery-isotope'), null);
	wp_register_script( 'jquery-gmap-sensor', 'http://maps.google.com/maps/api/js?sensor=false', array(), null);
	wp_register_script( 'jquery-gmap', THEME_JS .'/vendor/jquery.mapmarker.js', array(), null);
	wp_register_script( 'jquery-validate', THEME_JS .'/vendor/jquery.validate.js', array(), null);
	
	wp_register_script( 'theme-tmpl', THEME_JS .'/vendor/jquery.tmpl.min.js', array(), null);
	wp_register_script( 'theme-elastislide', THEME_JS .'/vendor/jquery.elastislide.js', array(), null);
	
	wp_register_script( 'mediaelementjs-scripts', THEME_URI .'/mediaelement/mediaelement-and-player.min.js', array(), null);
	wp_register_script( 'ios6-bug', THEME_JS .'/vendor/ios6_bug.js', array(), null);
}
add_action('wp_print_scripts', 'wt_enqueue_scripts');


function wt_scripts() {
	echo "\n";
	wp_print_scripts('plugins');
	wp_print_scripts('main');
	wp_print_scripts('fitvids');
}

function wt_enqueue_styles(){
	if(is_admin()){
		return;
	}
	wp_enqueue_style('theme-style', THEME_CSS.'/main.css', array(), null, 'all');
	if(wt_get_option('general','enable_responsive')){
		wp_enqueue_style('theme-media-styles', THEME_CSS.'/main-media.css', array('theme-style'), null, 'all');
	}
	if(wt_get_option('general','enable_animation')){
		wp_enqueue_style('theme-animation', THEME_CSS.'/animate.css', array('theme-style'), null, 'all');
	}
	$skin = wt_get_option('general', 'skin');
	switch($skin){	
		case 'orange':
			wp_enqueue_style('theme-orange', THEME_CSS.'/skins/orange.css', array(), null, 'all');
			break;
		case 'pink':
			wp_enqueue_style('theme-pink', THEME_CSS.'/skins/pink.css', array(), null, 'all');
			break;
		case 'green':
			wp_enqueue_style('theme-green', THEME_CSS.'/skins/green.css', array(), null, 'all');
			break;	
		case 'blue':
			wp_enqueue_style('theme-blue', THEME_CSS.'/skins/blue.css', array(), null, 'all');
			break;		
		case 'red':
			wp_enqueue_style('theme-red', THEME_CSS.'/skins/red.css', array(), null, 'all');
			break;
		case 'cyan':
			wp_enqueue_style('theme-cyan', THEME_CSS.'/skins/cyan.css', array(), null, 'all');
			break;		
		case 'brown':
			wp_enqueue_style('theme-brown', THEME_CSS.'/skins/brown.css', array(), null, 'all');
			break;	
		case 'black':
			wp_enqueue_style('theme-black', THEME_CSS.'/skins/black.css', array(), null, 'all');
			break;
		case 'magenta':
			wp_enqueue_style('theme-magenta', THEME_CSS.'/skins/magenta.css', array(), null, 'all');
			break;	
		case 'grey':
			wp_enqueue_style('theme-grey', THEME_CSS.'/skins/grey.css', array(), null, 'all');
			break;	
	}
	
	wp_enqueue_style('theme-skin', THEME_CACHE_URI.'/skin.css', array('theme-style'), false, 'all');
	
    wp_enqueue_style('theme-lightbox', THEME_CSS.'/prettyPhoto.css', array(), null, 'all');
    //wp_register_style('theme-gallery', THEME_CSS.'/gallery.css', false, false, 'screen');
	
	wp_register_style('mediaelementjs-styles', THEME_URI.'/mediaelement/mediaelementplayer.css', array(), null, 'all');
	wp_register_style('mediaelementjs-skin-styles', THEME_URI.'/mediaelement/mejs-skins.css', array(), null, 'all');
	
}
add_action('wp_enqueue_scripts', 'wt_enqueue_styles');

if(wt_get_option('fonts','enable_googlefonts')){
	function theme_add_googlefonts_lib(){
		$http = (!empty($_SERVER['HTTPS'])) ? "https" : "http";
		$fonts = wt_get_option('fonts','used_googlefonts');
		if(is_array($fonts)){
			foreach ($fonts as $font){
				wp_enqueue_style('font|'.$font,$http.'://fonts.googleapis.com/css?family='.$font);
			}
		}
	}
	add_action("wp_enqueue_scripts", 'theme_add_googlefonts_lib');
}
if(wt_get_option('fonts','enable_cufon')){
	function theme_add_cufon_script(){
		$fonts = wt_get_option('fonts','cufonfonts');
		if(is_array($fonts)){
			foreach ($fonts as $font){
				wp_register_script($font, THEME_FONT_URI .'/'.$font, array('cufon-yui'));
				wp_enqueue_script($font);
			}
		}
		wp_enqueue_script('cufon-yui');
	}
	add_filter('wp_enqueue_scripts','theme_add_cufon_script');	
}