<?php
function wt_shortcode_contactform($atts,$content = null) {
	extract(shortcode_atts(array(
		'email' => get_bloginfo('admin_email'),
	), $atts));
    wp_enqueue_script( 'jquery-validate' );
	!empty($email) ? $email = wt_check_input($email) : '';
    $content = trim($content);
	if(!empty($content)){
		$success = do_shortcode($content);
	}

	if(empty($success)){
		$success = __('We received your message and we will get back to you as soon as possible. <br /> <strong>Thank You!</strong>','wt_front');
	}
	$first_name_str = __('First Name*','wt_front');
	$last_name_str = __('Last Name*','wt_front');
	$email_str = __('Email*','wt_front');
	$phone_no_str = __('Phone No*','wt_front');
	$subject_str = __('Subject*','wt_front');
	$message_str = __('Message...','wt_front');
	$submit_str = __('Send E-mail','wt_front');
	$email = str_replace('@','(at)',$email);
	$include_path = THEME_INCLUDES;
	$include_js = THEME_JS;
	$id = rand(100,3000);
	return <<<HTML
<div class="wt_contact_form_wrap">
	<div class="success" style="display:none;">{$success}</div>
	<form id="contact_form_{$id}" class="wt_contact_form" action="{$include_path}/sendmail.php" method="post" role="form">
		<div class="fieldset">
			<input type="text" id="contact_first_name_{$id}" name="contact_first_name_{$id}" placeholder="{$first_name_str}" class="left-input text_input required" value="" data-minlength="3" tabindex="5" />
			<input type="text" id="contact_last_name_{$id}" name="contact_last_name_{$id}" placeholder="{$last_name_str}" class="right-input text_input required" value="" data-minlength="3" tabindex="5" />
		</div>
		
		<div class="fieldset">
			<input type="text" id="contact_email_{$id}" name="contact_email_{$id}" placeholder="{$email_str}" class="left-input text_input required email" value="" tabindex="6"  />
			<input type="text" id="contact_phone_no_{$id}" name="contact_phone_no_{$id}" placeholder="{$phone_no_str}" class="right-input text_input required" value="" data-minlength="3" tabindex="5" />
		</div>
		<div class="fieldset">
			<input type="text" id="contact_subject_{$id}" name="contact_subject_{$id}" placeholder="{$subject_str}" class="text_input required" value="" data-minlength="3" tabindex="5" />
		</div>
		<div class="fieldset message">
			<textarea name="contact_content_{$id}" class="text_area required" placeholder="{$message_str}" data-minlength="10" tabindex="7"></textarea>
		</div>
		<div class="fieldset">
			<a href="#" onclick="jQuery('#contact_form_{$id}').submit();return false;" class="contact_button"><span>{$submit_str}</span></a>
		</div>
		<div><input type="hidden" value="{$id}" name="contact_widget_id"/>
		<input type="hidden" value="{$email}" name="contact_to_{$id}"/></div>
	</form>
	

</div>
HTML;
}
add_shortcode('wt_contact_form', 'wt_shortcode_contactform');

function wt_shortcode_recent_posts($atts) {
	extract(shortcode_atts(array(
		'count' => '4',
		'thumbnail' => 'true',
		'extra' => 'desc',
		'cat' => '',
		'desc_length' => '80',
	), $atts));
	
	$query = array('showposts' => $count, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
	if($cat){
		$query['cat'] = $cat;
	}
	$r = new WP_Query($query);
	
	if ($r->have_posts()){
		$output = '<div class="wt_widgetPosts">';
		$output .= '<ul class="wt_postList">';
		while ($r->have_posts()){
			$r->the_post();
			$output .= '<li>';
			if($thumbnail!='false'){
				$output .= '<a class="thumb" href="'.get_permalink().'" title="'.get_the_title().'">';
				if (has_post_thumbnail() ){
					$output .= get_the_post_thumbnail(get_the_ID(),'thumb', array(70,45),array('title'=>get_the_title(),'alt'=>get_the_title()));
				}else{
					$output .= '<img src="'.THEME_IMAGES.'/widget_posts_thumbnail.png" width="70" height="45" title="'.get_the_title().'" alt="'. get_the_title().'"/>';
				}
				$output .= '</a>';
			}
			$output .= '<div class="postInfo">';
			$output .= '<a href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">'.get_the_title().'</a>';
			if($extra=='date'){
				$output .= '<span class="date">'.get_the_time('Y-m-d').'</span>';
			} elseif($extra=='comments') {
				$output .= '<span class="comments">';
				ob_start();
				comments_popup_link(__('No response ','wt_front'), __('1 Comment','wt_front'), __('% Comments','wt_front'),'').'</span>';	
				$output .=  ob_get_clean();			
			} elseif($extra=='desc'){
				global $post;
				$excerpt = $post->post_excerpt;
				if($excerpt==''){
					$excerpt = get_the_content('');
				}
				$output .= '<p>'.wp_html_excerpt($excerpt,$desc_length).'...</p>';
			}
			$output .= '</div>';
			$output .= '<div class="clearBoth"></div>';
			$output .= '</li>';
		}
		$output .= '</ul>';
		$output .= '</div>';
	} 
	wp_reset_query();
	return $output;
}
add_shortcode('wt_recent_posts', 'wt_shortcode_recent_posts');

function wt_shortcode_popular_posts($atts) {
	extract(shortcode_atts(array(
		'count' => '4',
		'thumbnail' => 'true',
		'extra' => 'desc',
		'cat' => '',
		'desc_length' => '80',
	), $atts));
	
	$query = array('showposts' => $count, 'nopaging' => 0, 'orderby'=> 'comment_count', 'post_status' => 'publish', 'ignore_sticky_posts' => 1);
	if($cat){
		$query['cat'] = $cat;
	}
	$r = new WP_Query($query);

	if ($r->have_posts()){
		$output = '<div class="wt_widgetPosts">';
		$output .= '<ul class="wt_postList">';
		while ($r->have_posts()){
			$r->the_post();
			$output .= '<li>';
			if($thumbnail!='false'){
				$output .= '<a class="thumb" href="'.get_permalink().'" title="'.get_the_title().'">';
				if (has_post_thumbnail() ){
					$output .= get_the_post_thumbnail(get_the_ID(),'thumb', array(70,45),array('title'=>get_the_title(),'alt'=>get_the_title()));
				}else{
					$output .= '<img src="'.THEME_IMAGES.'/widget_posts_thumbnail.png" width="70" height="45" title="'.get_the_title().'" alt="'. get_the_title().'"/>';
				}
				$output .= '</a>';
			}
			$output .= '<div class="wt_postInfo">';
			$output .= '<a href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">'.get_the_title().'</a>';
			if($extra=='date'){
				$output .= '<span class="date">'.get_the_time('Y-m-d').'</span>';
			} elseif($extra=='comments') {
				$output .= '<span class="comments">';
				ob_start();
				comments_popup_link(__('No response ','wt_front'), __('1 Comment','wt_front'), __('% Comments','wt_front'),'').'</span>';	
				$output .=  ob_get_clean();				
			} elseif($extra=='desc'){
				global $post;
				$excerpt = $post->post_excerpt;
				if($excerpt==''){
					$excerpt = get_the_content('');
				}
				$output .= '<p>'.wp_html_excerpt($excerpt,$desc_length).'...</p>';
			}
			$output .= '</div>';
			$output .= '<div class="clearBoth"></div>';
			$output .= '</li>';
		}
		$output .= '</ul>';
		$output .= '</div>';
	} 
	wp_reset_query();
	return $output;
}
add_shortcode('wt_popular_posts', 'wt_shortcode_popular_posts');

function wt_shortcode_twitter($atts) {
	extract(shortcode_atts(array(
		'username' => '',
		'count' => 3,
		'query' => 'null',
		'avatarsize' => 'null',
		'cycle_tweets' => 'false',
		'buttons' => 'false',
	), $atts));
	
	$cycling = $cycle_tweets;
	$cycle_tweets = ($cycle_tweets != 'false') ? ' cycle_tweets' : '';
	$with_buttons = ($buttons == 'true') ? ' with_buttons' : '';
	
	$buttons = ($buttons == 'true') ? '<div class="cycle_nav"><a class="cycle_prev"><span>prev</span></a><a class="cycle_next"><span>next</span></a></div>' : '';
		
	$user_array = explode(',',$username);
	foreach($user_array as $key => $user){
		$user_array[$key] = '"'.$user.'"';
	}
	
	if ($cycling != 'false') {
		wp_print_scripts('cycle');
		// Load script for IOS6 swipe bug
		global $detect;
		if ( $detect->isIOS() || $detect->isiOS() ) {
			wp_enqueue_script('ios6-bug');
		}
	}
	
	wp_enqueue_script('jquery-tweet');
	
	$id = rand(1,1000);
	
	if ( !empty( $user_array )|| $query!="null" ) {
		$username = implode(',',$user_array);
		if($query != "null"){
			$query = '"'.html_entity_decode($query).'"';
		}
		$with_avatar = ($avatarsize != 'null')?' with_avatar':'';
		return <<<HTML
<div class="recentTweets">
<div class="twitter_wrap{$with_avatar}{$cycle_tweets}{$with_buttons}">
<script type="text/javascript">
jQuery(document).ready(function($) {
	jQuery("#twitter_wrap_{$id}").tweet({
		username: [{$username}],
		count: {$count},
		query: {$query},
		avatar_size: {$avatarsize}
	});
});
</script>
	{$buttons}
	<div id="twitter_wrap_{$id}"></div>
	<div class="clearboth"></div>
</div>
</div>
HTML;
	}
}
?>
<?php
add_shortcode('wt_twitter', 'wt_shortcode_twitter');


function wt_shortcode_flickr($atts) {
	extract(shortcode_atts(array(
		'id' => '',
		'type' => 'flickr',
		'count' => 6,
		'display' => 'latest'//lastest or random
	), $atts));
		
	$flick_id = rand(100,1000);	
	
	if ($type == "flickr") {	
	
		return <<<HTML
<div id="wt_flickrWrap_{$flick_id}" class="wt_flickrWrap">
    <script type="text/javascript">
	/* <![CDATA[ */	
	(function($){					
		jQuery(window).load(function() {
			$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?id={$id}&format=json&jsoncallback=?", 
			function(data){
				$.each(data.items, function(i,item){
					if( i < {$count} ){	
						var smallpic = item.media.m.replace('_m.jpg', '_s.jpg');
						$("#wt_flickrWrap_{$flick_id}").append("<div class=\"flickr_badge_image\"><a title='" + item.title + "' href='" + item.link + "' target='_blank'><img src='" + smallpic + "' /></a></div>");		
					}
				});
			});	
		});						
	})(jQuery);	
	/* ]]> */			
	</script>
</div>
<div class="clearboth"></div>
HTML;

?>
<?php
	} else if ($type == "lightbox") {
		
		wp_enqueue_script('jquery-flickr');
		return <<<HTML
<div id="wt_flickrWrap_{$flick_id}" class="wt_flickrWrap">
	<script type="text/javascript">	
	/* <![CDATA[ */	
	(function($){					
		jQuery(window).load(function() {
			var thisFlickr = $("#wt_flickrWrap_{$flick_id}");						
			thisFlickr.jflickrfeed({
				limit: {$count},
				qstrings: {
					id: '{$id}'
				},
				itemTemplate: '<div class="flickr_badge_image"><a href="{{image_b}}" rel="lightbox[flickr_gal]"><img src="{{image_s}}" alt="{{title}}" /></a></div>'
				}, function(data) {
				thisFlickr.find('a').prettyPhoto({theme:'pp_default',social_tools:false, deeplinking:false});
			});					
		});					
	})(jQuery);
	/* ]]> */		
	</script>
</div>
<div class="clearboth"></div>
HTML;
	
	}
?>
<?php
}
add_shortcode('wt_flickr', 'wt_shortcode_flickr');

function wt_shortcode_contact_info($atts) {
	extract(shortcode_atts(array(
		'name' => '',
		'email' => '',
		'link' => '',
		'twitter' => '',
		'phone' => '',
		'cellphone' => '',
		'address' => '',
		'city' => '',
		'zip' => '',
		'state' => '',
	), $atts));
	
	
	!empty($email) ? $email = wt_check_input($email) : '';
	!empty($link) ? $link = wt_check_input($link) : '';
		
	$output = '<div class="wt_contactInfo"><div class="contactInfoWrap">';
    if(!empty($name)){
		$output .= '<p class="wt_contactName"><i class="wt_icon-user"></i>'.$name.'</p>';
	}	
	if(!empty($address)){
		$output .= '<p class="wt_contactAddress"><i class="wt_icon-map-marker"></i>'.$address.', <br />';
	}
	if(!empty($city)||!empty($zip)){
		if(empty($address)){
			$output .= '<p class="wt_contactAddress"><i class="wt_icon-map-marker"></i> ';
		}
		if(!empty($city)){
			$output .= ''.$city.', ';
		}
		if(!empty($zip)){
			$output .= ''.$zip.', <br />';
		}
        if(!empty($state)){
			$output .= ''.$state.'';
		}
        $output .= '</p>';
	}
	if(!empty($phone)){
		$output .= '<p class="wt_contactPhone"><i class="wt_icon-phone"></i>'.$phone.'</p>';
	}
	if(!empty($cellphone)){
		$output .= '<p class="wt_contactCellPhone"><i class="wt_icon-phone-sign"></i>'.$cellphone.'</p>';
	}
    if(!empty($email)){
		$email = str_replace('@','(at)',$email);
		$output .= '<p class="wt_contactMail"><i class="wt_icon-envelope-alt"></i><a href="mailto:'.$email.'" class="nospam">'.$email.'</a></p>';
	}
    if(!empty($link)){
		$output .= '<p class="wt_contactLink"><i class="wt_icon-link"></i><a href="'.$link.'" target="_blank">'.$link.'</a></p>';			   
	}
    if(!empty($twitter)){
		$output .= '<p class="wt_contactTwitter"><i class="wt_icon-twitter"></i><a href="'.$twitter.'" target="_blank">'.$twitter.'</a></p>';			   
	}
    
	$output .= '</div></div>';
	return $output;
}
add_shortcode('wt_contact_info', 'wt_shortcode_contact_info');

function wt_shortcode_social($atts ) {
	extract(shortcode_atts(array(
		'icons' => '',
		'type' => '',
		'icons_type' => '',
		'tooltip' => '',
		'tooltip_placement' => '',
		'aim_link' => '',
		'apple_link' => '',
		'blogger_link' => '',
		'behance_link' => '',
		'delicious_link' => '',
		'deviantart_link' => '',
		'digg_link' => '',
		'dribbble_link' => '',
		'email_link' => '',
		'ember_link' => '',
		'facebook_link' => '',
		'flickr_link' => '',
		'forrst_link' => '',
		'google_link' => '',
		'googleplus_link' => '',
		'html5_link' => '',
		'lastfm_link' => '',
		'linkedin_link' => '',
		'metacafe_link' => '',
		'netvibes_link' => '',
		'paypal_link' => '',
		'picasa_link' => '',
		'pinterest_link' => '',
		'reddit_link' => '',
		'rss_link' => '',
		'skype_link' => '',
		'stumbleupon_link' => '',
		'technorati_link' => '',
		'tumblr_link' => '',
		'twitter_link' => '',
		'vimeo_link' => '',
		'wordpress_link' => '',
		'yahoo_link' => '',
		'yelp_link' => '',
		'youtube_link' => '',
	), $atts));
	$social = (explode(',', $icons));
	$arrlength=count($social);
	$output = '<div class="socialWrapper clearfix"><div class="wt_social_wrap';
	if ($type == 'icons32') {
		$output .= ' icons_32';
	}
	$output .='">';
	for($i=0;$i<$arrlength;$i++) {
		switch($social[$i]) {
			case "aim":
			$link = $aim_link;
			break;
			case "apple":
			$link = $apple_link;
			break;
			case "blogger":
			$link = $blogger_link;
			break;
			case "behance":
			$link = $behance_link;
			break;
			case "delicious":
			$link = $delicious_link;
			break;
			case "deviantart":
			$link = $deviantart_link;
			break;
			case "digg":
			$link = $digg_link;
			break;
			case "dribbble":
			$link = $dribbble_link;
			break;
			case "email":
			$link = $email_link;
			break;
			case "ember":


			$link = $ember_link;
			break;
			case "facebook":
			$link = $facebook_link;
			break;
			case "flickr":
			$link = $flickr_link;
			break;
			case "forrst":
			$link = $forrst_link;
			break;
			case "google":
			$link = $google_link;
			break;
			case "googleplus":
			$link = $googleplus_link;
			break;
			case "html5":
			$link = $html5_link;
			break;
			case "lastfm":
			$link = $lastfm_link;
			break;
			case "linkedin":
			$link = $linkedin_link;
			break;
			case "metacafe":
			$link = $metacafe_link;
			break;
			case "netvibes":
			$link = $netvibes_link;
			break;
			case "paypal":
			$link = $paypal_link;
			break;
			case "picasa":
			$link = $picasa_link;
			break;
			case "pinterest":
			$link = $pinterest_link;
			break;
			case "reddit":
			$link = $reddit_link;
			break;
			case "rss":
			$link = $rss_link;
			break;
			case "skype":
			$link = $skype_link;
			break;
			case "stumbleupon":
			$link = $stumbleupon_link;
			break;
			case "technorati":
			$link = $technorati_link;
			break;
			case "tumblr":
			$link = $tumblr_link;
			break;
			case "twitter":
			$link = $twitter_link;
			break;
			case "vimeo":
			$link = $vimeo_link;
			break;
			case "wordpress":
			$link = $wordpress_link;
			break;
			case "yahoo":
			$link = $yahoo_link;
			break;
			case "yelp":
			$link = $yelp_link;
			break;
			case "youtube":
			$link = $youtube_link;
			break;
		} 
		if ($type == 'icons32') {
			$output .= '<a href="'.$link.'" class="'.$icons_type.' '.$social[$i].'_32"';
			if ($tooltip == true) {
				 $output .= ' data-toggle="tooltip" data-placement="'.$tooltip_placement.'"';
			}
			  $output .= ' rel="nofollow" target="_blank" title="'.$social[$i].'">'.$social[$i].'</a>';
		}
		else {
			$output .= '<a href="'.$link.'" class="'.$icons_type.' '.$social[$i].'"';
			if ($tooltip == true) {
				 $output .= ' data-toggle="tooltip" data-placement="'.$tooltip_placement.'"';
			}
			  $output .= ' rel="nofollow" target="_blank" title="'.$social[$i].'">'.$social[$i].'</a>';
			//$output .= '<a href="'.$link.'" rel="nofollow" target="_blank" title="'.$social[$i].'"><img src="'.THEME_IMAGES.'/social/'.$social[$i].'.png" alt="'.$social[$i].'" /></a>';
		}
	}
	$output .= '</div></div>';
	return $output;	
}
add_shortcode('wt_social', 'wt_shortcode_social');

function wt_shortcode_social_alt($atts ) {
	extract(shortcode_atts(array(
		'icons' => '',
		'type' => '',
		'icons_type' => '',
		'aim_link' => '',
		'apple_link' => '',
		'blogger_link' => '',
		'behance_link' => '',
		'delicious_link' => '',
		'deviantart_link' => '',
		'digg_link' => '',
		'dribbble_link' => '',
		'email_link' => '',
		'ember_link' => '',
		'facebook_link' => '',
		'flickr_link' => '',
		'forrst_link' => '',
		'google_link' => '',
		'googleplus_link' => '',
		'html5_link' => '',
		'lastfm_link' => '',
		'linkedin_link' => '',
		'metacafe_link' => '',
		'netvibes_link' => '',
		'paypal_link' => '',
		'picasa_link' => '',
		'pinterest_link' => '',
		'reddit_link' => '',
		'rss_link' => '',
		'skype_link' => '',
		'stumbleupon_link' => '',
		'technorati_link' => '',
		'tumblr_link' => '',
		'twitter_link' => '',
		'vimeo_link' => '',
		'wordpress_link' => '',
		'yahoo_link' => '',
		'yelp_link' => '',
		'youtube_link' => '',
	), $atts));
	$social = (explode(',', $icons));
	$arrlength=count($social);
	$output = '<div class="socialWrapperAlt clearfix"><div class="wt_social_wrap_alt';
	if ($type == 'icons32') {
		$output .= ' icons_32';
	}
	$output .='">';
	for($i=0;$i<$arrlength;$i++) {
		switch($social[$i]) {
			case "aim":
			$link = $aim_link;
			break;
			case "apple":
			$link = $apple_link;
			break;
			case "blogger":
			$link = $blogger_link;
			break;
			case "behance":
			$link = $behance_link;
			break;
			case "delicious":
			$link = $delicious_link;
			break;
			case "deviantart":
			$link = $deviantart_link;
			break;
			case "digg":
			$link = $digg_link;
			break;

			case "dribbble":
			$link = $dribbble_link;
			break;
			case "email":
			$link = $email_link;
			break;
			case "ember":
			$link = $ember_link;
			break;
			case "facebook":
			$link = $facebook_link;
			break;
			case "flickr":
			$link = $flickr_link;
			break;
			case "forrst":
			$link = $forrst_link;
			break;
			case "google":
			$link = $google_link;
			break;
			case "googleplus":
			$link = $googleplus_link;
			break;
			case "html5":
			$link = $html5_link;
			break;
			case "lastfm":
			$link = $lastfm_link;
			break;
			case "linkedin":
			$link = $linkedin_link;
			break;
			case "metacafe":
			$link = $metacafe_link;
			break;
			case "netvibes":
			$link = $netvibes_link;
			break;
			case "paypal":
			$link = $paypal_link;
			break;
			case "picasa":
			$link = $picasa_link;
			break;
			case "pinterest":
			$link = $pinterest_link;
			break;
			case "reddit":
			$link = $reddit_link;
			break;
			case "rss":
			$link = $rss_link;
			break;
			case "skype":
			$link = $skype_link;
			break;
			case "stumbleupon":
			$link = $stumbleupon_link;
			break;
			case "technorati":
			$link = $technorati_link;
			break;
			case "tumblr":
			$link = $tumblr_link;
			break;
			case "twitter":
			$link = $twitter_link;
			break;
			case "vimeo":
			$link = $vimeo_link;
			break;
			case "wordpress":
			$link = $wordpress_link;
			break;
			case "yahoo":
			$link = $yahoo_link;
			break;
			case "yelp":
			$link = $yelp_link;
			break;
			case "youtube":
			$link = $youtube_link;
			break;		} 
		if ($type == 'icons32') {
			$output .= '<div data-alt="'.$social[$i].'"><a href="'.$link.'" class="icon '.$icons_type.' '.$social[$i].'_32" rel="nofollow" target="_blank" title="'.$social[$i].'"><span>'.$social[$i].'</span></a></div>';
		}
		else {	
			$output .= '<div data-alt="'.$social[$i].'"><a href="'.$link.'"  class="icon '.$icons_type.' '.$social[$i].'" rel="nofollow" target="_blank" title="'.$social[$i].'"><span>'.$social[$i].'</span></a></div>';
		}
	}
	$output .= '</div></div>';
	return $output;	
}
add_shortcode('wt_social_alt', 'wt_shortcode_social_alt');

function wt_shortcode_progressBars($atts, $content = null ) {
	extract(shortcode_atts(array(	
		'number' => 1,
		'columns' => 4,
	), $atts));
	wp_print_scripts('waypoint');
    wp_enqueue_script('knob');
	if (!preg_match_all("/(.?)\[(wt_progress)\b(.*?)(?:(\/))?\](?:(.+?)\[\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
	} else {	
		$content = '';
		$columns = (int)$columns;
		if($columns > 5){
			$columns = 5;
		}elseif($columns < 1){
			$columns = 1;
		}
		if($columns != 1){
			$class = array('half','third','fourth','fifth','sixth');
			$css = $class[$columns-2];
			
		}
		$output = '<div id="wt_progress_bars">';
		for($i = 0; $i < count($matches[0]); $i++) {
			$progress = $matches[3][$i];
			$title = '';
			$width = '';
			$color = '';
			if (preg_match_all('/"([^"]+)"/', $progress, $m)) {
				$title = $m[1][0];    
				if ( isset($m[1][1]) ) { 
					$width = $m[1][1];    
				}       
				if ( isset($m[1][2]) ) { 
					$color = wt_check_input($m[1][2]);    
				}  
			}
			$output .= '<div class="wt_progress_bar wt_one_'.$css.'">';
			$output .= '<input data-readonly="true" data-fgcolor="'.$color.'" data-bgColor="#f3f3f3" data-inputColor="'.$color.'" data-width="90%" data-height="90%" class="skill" data-percentage="'.$width.'" rel="'.$width.'" value="'.$width.'" data-step="1" data-min="0" data-max="100" data-thickness=.15 >';
			$output .= '<p class="wt_progress_bar_title">' .$title . '</p>';
			$output .= '</div>';
		}
		$output .= '</div>';
	}
	return $output;
}

add_shortcode('wt_progressBars', 'wt_shortcode_progressBars');
