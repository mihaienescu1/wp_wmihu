<?php
class wt_themeFeatures {
	function wt_title(){
		global $page, $paged;
		wp_title( '|', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && is_front_page() )
			echo " | $site_description";
		
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'wt_front' ), max( $paged, $page ) );
	}
	function wt_menu(){
		 wp_nav_menu( array( 
			 'theme_location' => 'primary-menu',
			 'container'      => false,
			 'menu_class'     => 'menu oneNav',
			 'walker'         => new description_walker ,
		 ));
	}
	function home_menu(){
		global $home_menu;
		wt_home($home_menu);
	}
	function wt_sidebar($post_id = NULL){
		wt_sidebar_generator('wt_get_sidebar',$post_id);
	}
	function wt_footer_sidebar(){
		wt_sidebar_generator('wt_get_footer_sidebar');
	}
	function wt_top_widget(){
		wt_sidebar_generator('wt_get_top_widget');
	}	
	function wp_link_pages(){
		 wp_link_pages( array());
	}
	function comment_form(){
	}
	function search(){
		global $search;
		wt_search($search);
	}
	function wt_headerWrapper($post_id = NULL) {
		if (is_blog()){
			$blog_page_id = wt_get_option('blog','blog_page');
			$post_id = get_object_id($blog_page_id,'page');
		}
		$color = wt_check_input(get_post_meta($post_id, '_header_bg_color', true));
		$bg = wt_check_input(get_post_meta($post_id, '_header_bg', true));
		$bg_position = get_post_meta($post_id, '_header_position_x', true);
		$bg_repeat = get_post_meta($post_id, '_header_repeat', true);
		if(!empty($color) && $color != "transparent"){
			$color = 'background-color:'.$color.';';
		}else{
			$color = '';
		}
		if(!empty($bg)){
			$bg = 'background-image:url('.$bg.');background-position:top '.$bg_position.';background-repeat:'.$bg_repeat.'';
		}else{
			$bg = '';
		}
		echo '<div id="wt_headerWrapper" role="banner"';
		if(!empty($color) || !empty($bg)){
			echo' style="'.$color.''.$bg.'"';
		}
		echo ' class="clearfix">';
	}
	function wt_nav($post_id = NULL) {
		if (is_blog()){
			$blog_page_id = wt_get_option('blog','blog_page');
			$post_id = get_object_id($blog_page_id,'page');
		}
		$color = wt_check_input(get_post_meta($post_id, '_nav_bg_color', true));
		$bg = wt_check_input(get_post_meta($post_id, '_nav_bg', true));
		$bg_position = get_post_meta($post_id, '_nav_position_x', true);
		$bg_repeat = get_post_meta($post_id, '_nav_repeat', true);
		if(!empty($color) && $color != "transparent"){
			$color = 'background-color:'.$color.';';
		}else{
			$color = '';
		}
		if(!empty($bg)){
			$bg = 'background-image:url('.$bg.');background-position:top '.$bg_position.';background-repeat:'.$bg_repeat.'';
		}else{
			$bg = '';
		}
		echo '<nav id="nav" role="navigation" data-select-name="-- Main Menu --"';
		if(!empty($color) || !empty($bg)){
			echo' style="'.$color.''.$bg.'"';
		}
		echo '>';
	}
	function wt_intro($post_id = NULL) {
		if (is_blog()){
			$blog_page_id = wt_get_option('blog','blog_page');
			$post_id = get_object_id($blog_page_id,'page');
		}
		$color = wt_check_input(get_post_meta($post_id, '_intro_bg_color', true));
		$bg = wt_check_input(get_post_meta($post_id, '_intro_image', true));
		$bg_position = get_post_meta($post_id, '_intro_position_x', true);
		$bg_repeat = get_post_meta($post_id, '_intro_repeat', true);
		if(!empty($color) && $color != "transparent"){
			$color = 'background-color:'.$color.';';
		}else{
			$color = '';
		}
		if(!empty($bg)){
			$bg = 'background-image:url('.$bg.');background-position:top '.$bg_position.';background-repeat:'.$bg_repeat.'';
		}else{
			$bg = '';
		}
		echo '<header id="intro"';
		if(!empty($color) || !empty($bg)){
			echo' style="'.$color.''.$bg.'"';
		}
		echo ' class="clearfix">';
	}
	function wt_containerWrapper($post_id = NULL) {
		if (is_blog()){
			$blog_page_id = wt_get_option('blog','blog_page');
			$post_id = get_object_id($blog_page_id,'page');
		}
		$color = wt_check_input(get_post_meta($post_id, '_container_bg_color', true));
		$bg = wt_check_input(get_post_meta($post_id, '_container_bg', true));
		$bg_position = get_post_meta($post_id, '_container_position_x', true);
		$bg_repeat = get_post_meta($post_id, '_container_repeat', true);
		if(!empty($color) && $color != "transparent"){
			$color = 'background-color:'.$color.';';
		}else{
			$color = '';
		}
		if(!empty($bg)){
			$bg = 'background-image:url('.$bg.');background-position:top '.$bg_position.';background-repeat:'.$bg_repeat.'';
		}else{
			$bg = '';
		}
		echo '<div id="wt_containerWrapper"';
		if(!empty($color) || !empty($bg)){
			echo' style="'.$color.''.$bg.'"';
		}
		if(is_single()){
			echo ' class="wt_section clearfix">';
		}
		else {
			echo ' class="clearfix">';
		}
	}
	function wt_content($post_id = NULL) {
		if (is_blog()){
			$blog_page_id = wt_get_option('blog','blog_page');
			$post_id = get_object_id($blog_page_id,'page');
		}
		$color = wt_check_input(get_post_meta($post_id, '_content_bg_color', true));
		$bg = wt_check_input(get_post_meta($post_id, '_content_bg', true));
		$bg_position = get_post_meta($post_id, '_content_position_x', true);
		$bg_repeat = get_post_meta($post_id, '_content_repeat', true);
		if(!empty($color) && $color != "transparent"){
			$color = 'background-color:'.$color.';';
		}else{
			$color = '';
		}
		if(!empty($bg)){
			$bg = 'background-image:url('.$bg.');background-position:top '.$bg_position.';background-repeat:'.$bg_repeat.'';
		}else{
			$bg = '';
		}
		
		echo '<div id="wt_content"';
		if(!empty($color) || !empty($bg)){
			echo' style="'.$color.''.$bg.'"';
		}
		echo ' class="clearfix"';
		if ( is_page_template('template_fullwidth.php') || is_page_template('gallery-4-columns.php') || is_page_template('gallery-3-columns.php') || is_page_template('gallery-2-columns.php') || is_page_template('galleria.php') ) { 
			echo ' role="main"';
		}
		echo '>';
	}
	function wt_footerWrapper($post_id = NULL) {
		if (is_blog()){
			$blog_page_id = wt_get_option('blog','blog_page');
			$post_id = get_object_id($blog_page_id,'page');
		}
		$color = wt_check_input(get_post_meta($post_id, '_footer_bg_color', true));
		$bg = wt_check_input(get_post_meta($post_id, '_footer_image', true));
		$bg_position = get_post_meta($post_id, '_footer_position_x', true);
		$bg_repeat = get_post_meta($post_id, '_footer_repeat', true);
		if(!empty($color) && $color != "transparent"){
			$color = 'background-color:'.$color.';';
		}else{
			$color = '';
		}
		if(!empty($bg)){
			$bg = 'background-image:url('.$bg.');background-position:top '.$bg_position.';background-repeat:'.$bg_repeat.'';
		}else{
			$bg = '';
		}
		echo ' <div id="wt_footerWrapper"';
		if(!empty($color) || !empty($bg)){
			echo' style="'.$color.''.$bg.'"';
		}
		echo ' class="clearfix">';
	}
	function wt_footerTop($post_id = NULL) {
		if (is_blog()){
			$blog_page_id = wt_get_option('blog','blog_page');
			$post_id = get_object_id($blog_page_id,'page');
		}
		$color = wt_check_input(get_post_meta($post_id, '_footer_tl_color', true));
		if(!empty($color) && $color != "transparent"){
			$color = 'background-color:'.$color.';';
		}else{
			$color = '';
		}		
		echo '<footer id="wt_footerTop" class="clearfix">';
		echo '<div class="inner clearfix"';
		if(!empty($color)){
			echo' style="'.$color.'"';
		}
		echo '>';
	}
	function wt_footerBottom($post_id = NULL) {
		if (is_blog()){
			$blog_page_id = wt_get_option('blog','blog_page');
			$post_id = get_object_id($blog_page_id,'page');
		}
		$color = wt_check_input(get_post_meta($post_id, '_footer_br_color', true));
		if(!empty($color) && $color != "transparent"){
			$color = 'background-color:'.$color.';';
		}else{
			$color = '';
		}
		echo '<footer id="wt_footerBottom" class="clearfix">';
		echo '<div class="inner clearfix"';
		if(!empty($color)){
			echo' style="'.$color.'"';
		}
		echo '>';
	}
	function wt_breadcrumbs($post_id = NULL) {
		if(!wt_is_enabled(get_post_meta($post_id, '_disable_breadcrumb', true), wt_get_option('general','disable_breadcrumb'))){
		breadcrumbs_plus(array(
				'prefix' => '<div id="breadcrumbs">',
				'suffix' => '</div>',
				'title' => false,
				'home' => __( 'Home', 'wt_front' ),
				'sep' => '/',
				'front_page' => false,
				'bold' => false,
				'blog' => __( 'Blog', 'wt_front' ),
				'echo' => true
			));
		}
	}	
	function wt_custom_header($post_id = NULL) {
		$type = get_post_meta($post_id, '_intro_type', true);
		if (is_blog()){
			$blog_page_id = wt_get_option('blog','blog_page');
			$post_id = get_object_id($blog_page_id,'page');
		}
		if (is_single() || is_page() || (is_front_page() && $post_id != NULL) || (is_home() && $post_id != NULL)){
			$type = get_post_meta($post_id, '_intro_type', true);

			if (empty($type))
				$type = 'default';			
			if (wt_get_option('introheader','slideshow_everywhere') && $type == 'default') {
				$type = 'slideshow';
			}		
			if (wt_get_option('introheader','static_image_everywhere') && $type == 'default') {
				$type = 'static_image';
			}		
			if ((wt_get_option('general', 'woocommerce')) && (is_woocommerce() || is_cart() || is_checkout() || is_account_page())) {
				$type = 'default';
			}
			if (is_front_page() && $type == 'default') {
				$type = 'slideshow';
			}
			if ($type == 'disable') {
				return;
			}
			if ($type == 'slideshow'){
				$stype = get_post_meta($post_id, '_slideshow_type', true);
				if(empty($stype) || $stype == 'default'){
					$stype= wt_get_option('introheader','slideshow_type');
				}
				return wt_theme_generator('wt_slideShow',$stype);
			}
			if ($type == 'static_image'){
				return wt_theme_generator('wt_staticImage',$type);
			}
			if ($type == 'static_video'){
				return wt_theme_generator('wt_staticVideo',$type);
			}
			if (in_array($type, array('default', 'title', 'title_custom'))) {
				$custom_title = get_post_meta($post_id, '_custom_title', true);
				if(!empty($custom_title)){
					$title = $custom_title;
				}else{
					$title = get_the_title($post_id);
				}
			}
			$blog_page_id = wt_get_option('blog','blog_page');
			if ($type == 'default' && is_singular('post') && $post_id!=$blog_page_id) {
				$show_in_header = wt_get_option('blog','show_in_header');
				if($show_in_header){
					$title = get_the_title($post_id);
					
					/*$text = '<span class="single_metadata">';
					if (wt_get_option('blog','single_meta_date')){
						$text .= '<span class="single_date">'.__('Date: ', 'wt_front').'</span>';
						$text .= '<a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'">'.get_the_time('d F Y').'</a><span class="meta_separator">/</span>';
					}
					if (wt_get_option('blog','single_meta_category')){
						$text .= '<span class="single_category">'.__('Categories: ', 'wt_front').'</span>';
						$text .=  get_the_category_list(', ');
						$text .=  '<span class="meta_separator">/</span>';
					}
					$all_the_tags = get_the_tags();
					if (wt_get_option('blog','single_meta_tags') && $all_the_tags){
						$text .= '<span class="single_tags">'.__('Tags: ', 'wt_front').'</span>';
						$text .= get_the_tag_list('',', '); 
						$text .=  '<span class="meta_separator">/</span>';
					}
					
					$text .= get_edit_post_link( __( 'Edit', 'wt_front' ), '<span class="edit-link">', '</span>' );
					if(wt_get_option('blog','single_meta_comment') && (comments_open())){
						ob_start();
						comments_popup_link(__('No comments ','wt_front'), __('1 Comment','wt_front'), __('% Comments','wt_front'),'');
						$text .=  ob_get_clean();
					}
					$text .= '</span>';*/
				}else{
					return $this->custom_header($blog_page_id);
				}
			}
			if (in_array($type, array('custom', 'title_custom'))) {
				$text = '<h3 class="custom_title">'.trim(get_post_meta($post_id, '_custom_introduce_text', true)).'</h3>';
			}
		}
		if (is_archive()){
			if ((wt_get_option('general', 'woocommerce')) && (is_shop() || is_product_category() || is_product())) {
				$custom_title = get_post_meta($post_id, '_custom_title', true);
				if(!empty($custom_title)){
					$title = $custom_title;
				}else{
					$title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
				}
			}
			else {
				$title = __('Archives','wt_front');
			}
			if(is_category()){
				$text = sprintf(__('Category Archive for: "%s"','wt_front'),single_cat_title('',false));
			}elseif(is_tag()){
				$text = sprintf(__('Tag Archives for: "%s"','wt_front'),single_tag_title('',false));
			}elseif(is_day()){
				$text = sprintf(__('Daily Archive for: "%s"','wt_front'),get_the_time('F jS, Y'));
			}elseif(is_month()){
				$text = sprintf(__('Monthly Archive for: "%s"','wt_front'),get_the_time('F, Y'));
			}elseif(is_year()){
				$text = sprintf(__('Yearly Archive for: "%s"','wt_front'),get_the_time('Y'));
			}elseif(is_author()){
				if(get_query_var('author_name')){
					$curauth = get_user_by('slug', get_query_var('author_name'));
				} else {
					$curauth = get_userdata(get_query_var('author'));
				}
				$text = sprintf(__('Author Archive for: "%s"','wt_front'),$curauth->nickname);
			}elseif(isset($_GET['paged']) && !empty($_GET['paged'])) {
				$text = __('Blog Archives','wt_front');
			}elseif(is_tax()){
				if ((wt_get_option('general', 'woocommerce')) && (is_product_category())) {
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					$text = sprintf(__('Category: %s','wt_front'),$term->name);
				}
				else {
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					$text = sprintf(__('Archives for: "%s"','wt_front'),$term->name);
				}
			}					
		
		}	
		if (is_404()) {
			$title = __("Sorry! We couldn't find it.","wt_front");
			$text = __("You have requested a page or file which does not exists anymore. Below are a few options to find what you are looking for.",'wt_front');
		}
		
		if (is_search()) {
			$title = __('Search','wt_front');
			$text = sprintf(__('Search Results for: "%s"','wt_front'),stripslashes( strip_tags( get_search_query() ) ));
		}
		if( function_exists('is_woocommerce') && is_woocommerce()){
			if(function_exists('is_shop') && is_shop()){
				$shop_id = woocommerce_get_page_id( 'shop' );
				if($shop_id != $post_id){
					$type = get_post_meta($shop_id, '_intro_type', true);
					
					if (empty($type)){
						$type = 'default';
					}
					if($type !== 'default'){
						return wt_theme_generator('custom_header', $shop_id, false, true);
					}
					
				}
			}
		}
		if( function_exists('is_woocommerce') && (is_product() || is_product_category())) {
			$shop_id = woocommerce_get_page_id( 'shop' );
			if($shop_id != $post_id){
				$type = get_post_meta($shop_id, '_intro_type', true);

				if($type !== 'default'){
					return wt_theme_generator('custom_header', $shop_id, false, true);
				}
				else {
					$title = get_the_title( get_option( 'woocommerce_shop_page_id' ) );
				}
			}
			
		}
		
		echo wt_theme_generator('wt_intro',$post_id);		
			
		echo "\n\t\t".'<div class="inner">'."\n";
		
		if(is_front_page() && (wt_get_option('general','intro_header_text'))){
            //echo "\n<div id='introHeaderWidget'>\n";
            //echo '<h1>'.wt_get_option('general','intro_header_text').'</h1>';
			//echo "\n</div>\n";
        } 
		
		echo "\t\t\t".'<div id="introType"><div class="intro_text">';
		if (isset($title)) {
			echo '<h1>' . $title . '</h1>';
		}
		if (isset($text)) {
			echo $text;
		}
		echo "</div></div>\n\t\t";
		if ($type != 'slideshow' || $type != 'disable' || $type != 'static_image' || $type != 'static_video'){
			//wt_theme_generator('breadcrumbs',$post_id);
		}
		echo "</div>\n\t";
		echo "</header>\n";
	}
	
	function wt_custom_title($post_id = NULL) {
		$type = get_post_meta($post_id, '_intro_type', true);
		if (is_blog()){
			$blog_page_id = wt_get_option('blog','blog_page');
			$post_id = get_object_id($blog_page_id,'page');
		}
		if (is_single() || is_page() || (is_front_page() && $post_id != NULL) || (is_home() && $post_id != NULL)){
			$type = get_post_meta($post_id, '_intro_type', true);
			
			if (in_array($type, array('default', 'title', 'title_custom'))) {
				$custom_title = get_post_meta($post_id, '_custom_title', true);
				if(!empty($custom_title)){
					$title = $custom_title;
				}else{
					$title = get_the_title($post_id);
				}
			}
			
			if (in_array($type, array('custom', 'title_custom'))) {
				$text = '<h3 class="custom_title">'.trim(get_post_meta($post_id, '_custom_introduce_text', true)).'</h3>';
			}
		}	
		//echo wt_theme_generator('wt_intro',$post_id);		
			
		echo "\t\t\t".'<div class="wt_intro"><div class="intro_text">';
		if (isset($title)) {
			echo '<h2 class="title">' . $title . '</h2>';
		}
		if (isset($text)) {
			echo $text;
		}
		echo "</div></div>\n\t";
	}
	
	function wt_slogan($post_id = NULL) {
		$slogan_text = get_post_meta($post_id, '_slogan_text', true);
		$slogan_author = get_post_meta($post_id, '_slogan_author', true);
		//echo wt_theme_generator('wt_intro',$post_id);	
		if (isset($slogan_text)&& $slogan_text != '') {	
			echo "\t\t\t".'<div class="quotes_box">.';
		}
		if (isset($slogan_text)&& $slogan_text != '') {
			echo "\t\t\t".'<span class="quotes_text">';
				echo $slogan_text;
			echo "</span>\n\t";
		}
		if (isset($slogan_author)&& $slogan_author != '') {
			echo "\t\t\t".'<span class="quotes_author">';
				echo $slogan_author;
			echo "</span>\n\t";
		}
		if (isset($slogan_text)&& $slogan_text != '') {
			echo "</div>\n\t";
		}
	}
	
	function wt_separator($post_id = NULL) {
		$separator = get_post_meta($post_id, '_slogan_bg', true);
		if (isset($separator)&& $separator != '') {
			echo 'style="background-image: url(\'' . $separator . '\')"';
		}
	}
		
	function wt_portfolio_featured_image($layout=''){
		if($layout == 'full'){
			$width = 940;
		}else{
			$width = 640;
		}
		$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true);
		$adaptive_height = wt_get_option('portfolio', 'adaptive_height');
		
		if($adaptive_height){
			$height = floor($width*($image_src_array[2]/$image_src_array[1]));
		}else{
			$height = wt_get_option('portfolio', 'fixed_height');
		}
		$image_src = aq_resize( wt_get_image_src($image_src_array[0]), $width, $height, true ); //resize & crop img
		
		if (has_post_thumbnail()): 
?>
	<header class="wt_image_frame entry_image">
		<span class="wt_image_holder">
<?php if(is_single()):
		if(wt_get_option('portfolio', 'featured_image_lightbox')):?>
			<a class="overlay_zoom" href="<?php echo $image_src_array[0] ?>" title="<?php the_title();?>" data-rel="lightbox">
				<img src="<?php echo $image_src;?>" alt="<?php the_title();?>" />
			</a>
        </span>  
  		<?php else:?>
                <img src="<?php echo $image_src;?>" alt="<?php the_title();?>" />
            </span>        
		<?php endif;?>		
<?php else:?>
			<a class="overlay_zoom" href="<?php echo $image_src_array[0] ?>" title="">
				<img src="<?php echo $image_src;?>" alt="<?php the_title();?>" />
			</a>
            </span>
<?php endif;?>
	</header>
<?php
		endif;
	}
		
	function wt_blog_featured_image($type='full',$layout='',$height=''){
		$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true);
			
		if($layout == 'full'){
			$width = 940;
			$img_width = 460;
		}elseif(is_numeric($layout)){
			$width = $layout;
			$img_width = $width;
		}else{
			$width = 640;
			$img_width = 400;
		}
		
		if($type=='left'){
			if($layout == 'full'){
				$width = wt_get_option('blog', 'left_width');
				$height = wt_get_option('blog', 'left_image_height');
			} else {
				$width = wt_get_option('blog', 'sidebar_left_width');
				if (is_sticky()) {
					$height = wt_get_option('blog', 'sidebar_left_image_height')+500;
				}
				else {
					$height = wt_get_option('blog', 'sidebar_left_image_height');
				}
			}
		}else{
			$adaptive_height = wt_get_option('blog', 'adaptive_height');
			$single_adaptive_height = wt_get_option('blog', 'single_adaptive_height');
			if($adaptive_height && is_blog()){
				$height = floor($width*($image_src_array[2]/$image_src_array[1]));
			}elseif($single_adaptive_height && is_single()){
				$height = floor($width*($image_src_array[2]/$image_src_array[1]));
			}else{
				if($layout == 'full'){
					if (is_sticky()) {
						$height = wt_get_option('blog', 'image_height')+500;
					}
					else {
						$height = wt_get_option('blog', 'image_height');
					}
				} else {
					if (is_sticky()) {
						$height = wt_get_option('blog', 'sidebar_image_height')+500;
					}
					else {
						$height = wt_get_option('blog', 'sidebar_image_height');
					}
				}
			}
		}
		
		if($type=='left'){
			$image_src = aq_resize( wt_get_image_src($image_src_array[0]), $img_width, $height, true ); //resize & crop img
		}else{
			$image_src = aq_resize( wt_get_image_src($image_src_array[0]), $width, $height, true ); //resize & crop img
		}
		
		$output = '';
		if (has_post_thumbnail()){
			$output .= '<div class="wt_image_frame entry_image">';
			$output .= '<span class="wt_image_holder"';
			if($type=='left'){
				$output .= ' style="width:'.$width.'px"';
			}
			$output .= '>';
			if(is_single()){
				if(wt_get_option('blog', 'featured_image_lightbox')){
					$output .= '<a class="overlay_zoom" href="'.$image_src_array[0].'" title="'.get_the_title().'" data-rel="lightbox">';
					$output .= '<img src="'.$image_src.'" alt="'.get_the_title().'" />';
					$output .= '</a>';
				} else {
					$output .= '<img src="'.$image_src.'" alt="'.get_the_title().'" />';
				}
			} else {
				$output .= '<a class="overlay_zoom" href="'.get_permalink().'" title="">';
				$output .= '<img src="'.$image_src.'" alt="'.get_the_title().'" />';
				$output .= '</a>';
			}
			$output .= '</span>';
			$output .= '</div>';
		}
		return $output;
	}

	function wt_blog_meta() {
 		global $post;
		$output = '';
		if (wt_get_option('blog','meta_date')){
			//$output .= '<div class="entry_date"><span>'.__('Date: ', 'wt_front').'</span>';
			$output .= '<div class="entry_date">';
			$output .= '<i class="wt_icon-calendar"></i><a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'">'.get_the_time('d F Y').'</a></div>';
		}
		if (wt_get_option('blog','meta_author')){
			//$output .= '<div class="entry_author"><span>'.__('By: ', 'wt_front').'</span>';
			$output .= '<div class="entry_author">';
			$output .= '<i class="wt_icon-user"></i><a class="no_link" href="">'.get_the_author_link().'</a></div>';
		}
		if (wt_get_option('blog','meta_category')){
			//$output .= '<div class="entry_category"><span>'.__('In: ', 'wt_front').'</span>';
			$output .= '<div class="entry_category"><i class="wt_icon-folder-open"></i>';
			$output .= get_the_category_list(', ') .'</div>' ;
		}
		if (wt_get_option('blog','meta_tags')){
						
			//$output .= get_the_tag_list(' <div class="entry_tags"><span>'.__('Tags: ', 'wt_front').'</span>',', ','</div>'); 
			$output .= get_the_tag_list(' <i class="wt_icon-tags"></i><div class="entry_tags">',', ','</div>'); 
		}
		
			$output .= get_edit_post_link( __( 'Edit', 'wt_front' ), '<span class="edit-link">', '</span>' );
			if(wt_get_option('blog','meta_comment') && ($post->comment_count > 0 || comments_open())){
			ob_start();
			comments_popup_link(__(' 0 ','wt_front'), __(' 1 ','wt_front'), __(' % ','wt_front'),'');
						
			//$output .= '<div class="entry_comments"><span>'.__('Comments: ', 'wt_front').'</span>';
			$output .= '<div class="entry_comments"><i class="wt_icon-comments"></i>';
			$output .= ob_get_clean().'</div>' ;			
		}
		return $output;
		
	}
	
	function wt_blog_carousel_meta() {
 		global $post;
		$output = '';
		if (wt_get_option('blog','meta_date')){
			$output .= '<span class="entry_date_carousel">';
			$output .= '<a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'">'.get_the_time('d F Y').'</a></span>';
		}
		if (wt_get_option('blog','meta_author')){
			$output .= ' / <span class="entry_author">';
			$output .= '<a class="no_link" href="">'.get_the_author_link().'</a></span>';
		}
		if (wt_get_option('blog','meta_category')){
			$output .= ' / <span class="entry_category">';
			$output .= get_the_category_list(', ') .'</span>' ;
		}
		if (wt_get_option('blog','meta_tags')){
						
			$output .= get_the_tag_list(' / <span class="tags">',', ','</span>'); 
		}
		
			$output .= get_edit_post_link( __( 'Edit', 'wt_front' ), '<span class="edit-link">', '</span>' );
			if(wt_get_option('blog','meta_comment') && ($post->comment_count > 0 || comments_open())){
			ob_start();
			comments_popup_link(__(' 0 Comments','wt_front'), __(' 1 Comment','wt_front'), __(' % Comments','wt_front'),'');
						
			$output .= ' / <span class="entry_comments">';
			$output .= ob_get_clean().'</span>' ;			
		}
		return $output;
		
	}
	
	function wt_blog_single_meta() {
 		global $post;
		$output = '';
		
		if (wt_get_option('blog','single_meta_date')){
			//$output .= '<div class="entry_date"><span>'.__('Date: ', 'wt_front').'</span>';
			$output .= '<div class="entry_date_single">';
			$output .= '<i class="wt_icon-calendar"></i><a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'">'.get_the_time('d F Y').'</a></div>';
		}
		if (wt_get_option('blog','single_meta_author')){
			//$output .= '<div class="entry_author"><span>'.__('By: ', 'wt_front').'</span>';
			$output .= '<div class="entry_author">';
			$output .= '<i class="wt_icon-user"></i><a class="no_link" href="">'.get_the_author_link().'</a></div>';
		}
		if (wt_get_option('blog','single_meta_category')){
			//$output .= '<div class="entry_category"><span>'.__('In: ', 'wt_front').'</span>';
			$output .= '<i class="wt_icon-folder-open"></i><div class="entry_category">';
			$output .= get_the_category_list(', ') .'</div>' ;
		}
		if (wt_get_option('blog','single_meta_tags')){
						
			//$output .= get_the_tag_list(' <div class="entry_tags"><span>'.__('Tags: ', 'wt_front').'</span>',', ','</div>'); 
			$output .= get_the_tag_list(' <i class="wt_icon-tags"></i><div class="entry_tags">',', ','</div>'); 
		}
		
			$output .= get_edit_post_link( __( 'Edit', 'wt_front' ), '<span class="edit-link">', '</span>' );
			if(wt_get_option('blog','single_meta_comment') && ($post->comment_count > 0 || comments_open())){
			ob_start();
			comments_popup_link(__(' 0 ','wt_front'), __(' 1 ','wt_front'), __(' % ','wt_front'),'');
						
			//$output .= '<div class="entry_comments"><span>'.__('Comments: ', 'wt_front').'</span>';
			$output .= '<div class="entry_comments"><i class="wt_icon-comments"></i>';
			$output .= ob_get_clean().'</div>' ;			
		}
		return $output;
		
	}
	
	function wt_blog_author_info() {
?>
<section id="aboutTheAuthor">
	<h3><?php _e('About the author','wt_front');?></h3>
	<div class="aboutTheAuthor_wrapp">
		<div class="gravatar"><?php echo get_avatar( get_the_author_meta('user_email'), '80' ); ?></div>
		<div class="aboutTheAuthor_content">
			<h4><?php the_author_posts_link(); ?></h4>
			<p class="author_desc"><?php the_author_meta('description'); ?></p>
		</div>
		<div class="clearboth"></div>
	</div>
</section>
<?php 
	}

	function wt_blog_popular_posts(){
		$r = new WP_Query(array(
			'showposts' => 4, 
			'nopaging' => 0, 
			'orderby'=> 'comment_count', 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => 1
		));
		$output = '';
		if ($r->have_posts()){
			$output .= '<ul class="posts wt_postList">';
			while ($r->have_posts()){
				$r->the_post();
				$output .= '<li>';
				$output .= '<a class="thumb" href="'.get_permalink().'" title="'.get_the_title().'">';
				if (has_post_thumbnail() ){
					$output .= get_the_post_thumbnail(get_the_ID(),'thumb', array(70,45),array('title'=>get_the_title(),'alt'=>get_the_title()));
				}else{
					$output .= '<img src="'.THEME_IMAGES.'/widget_posts_thumbnail.png" width="70" height="45" title="'.get_the_title().'" alt="'. get_the_title().'"/>';
				}
				$output .= '</a>';
				$output .= '<div class="wt_postInfo">';
				$output .= '<a class="post_title" href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">'.get_the_title().'</a>';
				$output .= '<span class="date">'.get_the_date().'</span>';
				$output .= '</div>';
				$output .= '<div class="clearboth"></div>';
				$output .= '</li>';
			}
			$output .= '</ul>';
		}

		wp_reset_postdata();
		echo $output;
	}

	function wt_blog_related_posts(){
		global $post;
		$backup = $post;  
		$tags = wp_get_post_tags($post->ID);
        $tagIDs = array();
        $related_post_found = false;
        $output = '';
		if ($tags) {
			$tagcount = count($tags);
			for ($i = 0; $i < $tagcount; $i++) {
				$tagIDs[$i] = $tags[$i]->term_id;
			}
			$r = new WP_Query(array(
				'tag__in' => $tagIDs,
				'post__not_in' => array($post->ID),
				'showposts'=>4,
				'ignore_sticky_posts'=>1
			));
			if ($r->have_posts()){
				$related_post_found = true;
				$output .= '<ul class="posts wt_postList">';
				while ($r->have_posts()){
					$r->the_post();
					$output .= '<li>';
					$output .= '<a class="thumb" href="'.get_permalink().'" title="'.get_the_title().'">';
					if (has_post_thumbnail() ){
						$output .= get_the_post_thumbnail(get_the_ID(),'thumb', array(70,45),array('title'=>get_the_title(),'alt'=>get_the_title()));
					}else{
						$output .= '<img src="'.THEME_IMAGES.'/widget_posts_thumbnail.png" width="70" height="45" title="'.get_the_title().'" alt="'. get_the_title().'"/>';
					}
					$output .= '</a>';
					$output .= '<div class="wt_postInfo">';
					$output .= '<a class="post_title" href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">'.get_the_title().'</a>';
					$output .= '<span class="date">'.get_the_date().'</span>';
					$output .= '</div>';
					$output .= '<div class="clearboth"></div>';
					$output .= '</li>';
				}
				$output .= '</ul>';
			}
			$post = $backup;
		}
		if(!$related_post_found){
			$r = new WP_Query(array(
				'showposts' => 4, 
				'nopaging' => 0, 
				'post_status' => 'publish', 
				'ignore_sticky_posts' => 1
			));
			if ($r->have_posts()){
				$output .= '<ul class="posts wt_postList">';
				while ($r->have_posts()){
					$r->the_post();
					$output .= '<li>';
					$output .= '<a class="thumb" href="'.get_permalink().'" title="'.get_the_title().'">';
					if (has_post_thumbnail() ){
						$output .= get_the_post_thumbnail(get_the_ID(),'thumb', array(70,45),array('title'=>get_the_title(),'alt'=>get_the_title()));
					}else{
						$output .= '<img src="'.THEME_IMAGES.'/widget_posts_thumbnail.png" width="70" height="45" title="'.get_the_title().'" alt="'. get_the_title().'"/>';
					}
					$output .= '</a>';
					$output .= '<div class="wt_postInfo">';
					$output .= '<a class="post_title" href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">'.get_the_title().'</a>';
					$output .= '<span class="date">'.get_the_date().'</span>';
					$output .= '</div>';
					$output .= '<div class="clearboth"></div>';
					$output .= '</li>';
				}
				$output .= '</ul>';
			}
		}
		wp_reset_postdata();

		echo $output;
	}
	
	function wt_portfolio_related_posts(){
		global $post;
		$backup = $post;  
		$tags = wp_get_post_tags($post->ID);
        $tagIDs = array();
        $related_post_found = false;
        $output = '';
		if ($tags) {
			$tagcount = count($tags);
			for ($i = 0; $i < $tagcount; $i++) {
				$tagIDs[$i] = $tags[$i]->term_id;
			}
			$r = new WP_Query(array(
				'post_type' => 'wt_portfolio', 
				'tag__in' => $tagIDs,
				'post__not_in' => array($post->ID),
				'showposts'=>3,
				'ignore_sticky_posts'=>1
			));
			if ($r->have_posts()){
				$related_post_found = true;
				$output .= '<ul class="posts portfList">';
				while ($r->have_posts()){
					$r->the_post();
					$output .= '<li>';
					$output .= '<header class="wt_image_frame">';
					$output .= '<span class="wt_image_holder">';
					$output .= '<a href="'.get_permalink().'" title="'.get_the_title().'">';
					if (has_post_thumbnail() ){
						$output .= get_the_post_thumbnail(get_the_ID(),'portfThumb', array(310,200),array('title'=>get_the_title(),'alt'=>get_the_title()));
					}else{
						$output .= '<img src="'.THEME_IMAGES.'/widget_posts_thumbnail.png" width="310" height="200" title="'.get_the_title().'" alt="'. get_the_title().'"/>';
					}
					$output .= '</a>';
					$output .= '</span>';
					$output .= '</header>';
					$output .= '<div class="wt_portofolio_details">';
					$output .= '<a class="post_title" href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">'.get_the_title().'</a>';
					$output .= '<span class="date">'.get_the_date().'</span>';
					$output .= '</div>';
					$output .= '<div class="clearboth"></div>';
					$output .= '</li>';
				}
				$output .= '</ul>';
			}
			$post = $backup;
		}
		if(!$related_post_found){
			$r = new WP_Query(array(
				'post_type' => 'wt_portfolio', 
				'showposts' => 3, 
				'nopaging' => 0, 
				'post_status' => 'publish', 
				'ignore_sticky_posts' => 1
			));
			if ($r->have_posts()){
				$output .= '<ul class="posts portfList">';
				while ($r->have_posts()){
					$r->the_post();
					$output .= '<li>';
					$output .= '<header class="wt_image_frame">';
					$output .= '<span class="wt_image_holder">';
					$output .= '<a href="'.get_permalink().'" title="'.get_the_title().'">';
					if (has_post_thumbnail() ){
						$output .= get_the_post_thumbnail(get_the_ID(),'portfThumb', array(310,200),array('title'=>get_the_title(),'alt'=>get_the_title()));		
					}else{
						$output .= '<img src="'.THEME_IMAGES.'/widget_posts_thumbnail.png" width="310" height="200s" title="'.get_the_title().'" alt="'. get_the_title().'"/>';
					}
					$output .= '</a>';
					$output .= '</span>';
					$output .= '</header>';
					$output .= '<div class="wt_portofolio_details">';
					$output .= '<a class="post_title" href="'.get_permalink().'" title="'.get_the_title().'" rel="bookmark">'.get_the_title().'</a>';
					$output .= '<span class="date">'.get_the_date().'</span>';
					$output .= '</div>';
					$output .= '<div class="clearboth"></div>';
					$output .= '</li>';
				}
				$output .= '</ul>';
			}
		}
		wp_reset_postdata();

		echo $output;
	}
	
	function wt_staticImage($type) {
		if (has_post_thumbnail() ) {
			$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true);
			$featured_image = wt_get_image_src($image_src_array[0]);		
		}
		if(!empty($featured_image) && $type == 'static_image'){
			$staticImg = $featured_image;
		} else {
			$staticImg= wt_get_option('introheader','static_image');
		}
		$width = 980;
		
		$static_adaptive_height = wt_get_option('introheader', 'static_adaptive_height');
		if($static_adaptive_height){
			$height = floor($width*($image_src_array[2]/$image_src_array[1]));
		}else{
			$height = wt_get_option('introheader', 'static_image_height');
		}
		
		$lightbox = '<a href="'.$staticImg.'" data-rel="lightbox" title="'. get_the_title() .'">';
		$image_src = aq_resize( $staticImg, $width, $height, true ); //resize & crop img
					
?>
	<header id="wt_intro">
		<div class="inner">
        	<div class="intro_staticImage">
                <?php echo wt_get_option('introheader', 'static_image_lightbox') ? $lightbox : ''; ?>
				<img src="<?php echo $image_src; ?>" alt="<?php the_title(); ?>" />
                <?php echo wt_get_option('introheader', 'static_image_lightbox') ? '</a>' : ''; ?>
			</div>
		</div>
	</header>
<?php		
	}
	
	function wt_staticVideo($type) {
		global $post;
		if($type == 'static_video'){
			if (get_post_meta($post->ID, '_featured_video', true)) {
				$featured_video = wt_check_input(get_post_meta($post->ID, '_featured_video', true));	
			}	
		}
?>
	<header id="wt_intro">
		<div class="inner">
        	<div class="intro_staticVideo">
				<?php 
				echo wt_video_featured($wt_video_featured, '', '', 720, 1280);
				?>
			</div>
		</div>
	</header>
<?php		
	}
	
    function wt_slideShow($type, $height = '') {
		global $post;
		if($type === false){
			if (get_post_meta($post->ID, '_slideshow_type', true)) {
				$type = get_post_meta($post->ID, '_slideshow_type', true);	
			}	
			else {
				$type = wt_get_option('introheader', 'slideshow_type');
			}
		}
		switch($type){
			case 'flex':
				$this->wt_slideShowScripts_flex();
				$this->wt_slideShow_flex($height);
				break;
			case 'nivo':
				$this->wt_slideShowScripts_nivo();
				$this->wt_slideShow_nivo($height);
				break;
			case 'anything':
				$this->wt_slideShowScripts_anything();
				$this->wt_slideShow_anything($height);
				break;
			case 'cycle':
				$this->wt_slideShowScripts_cycle();
				$this->wt_slideShow_cycle($height);
				break;
			case 'rev':
				$this->wt_slideShow_rev($height);
				break;
			case 'layerS':
				$this->wt_slideShow_layerS($height);
				break;
		}
	}	
	function wt_slideShowScripts_flex() {
		wp_enqueue_script('flex');
		wp_enqueue_script('flexSlider', THEME_JS . '/vendor/flexSlider.js',array('jquery'),false);
	}
	function wt_slideShowScripts_cycle() {
		wp_enqueue_script('cycle');
		wp_enqueue_script('cycleSlider', THEME_JS . '/vendor/cycleSlider.js',array('jquery'),false);
	}
	function wt_slideShowScripts_nivo() {
		wp_enqueue_script('nivo');
		wp_enqueue_script('nivoSlider', THEME_JS . '/vendor/nivoSlider.js',array('jquery'),false);
	}
	function wt_slideShowScripts_anything() {
		wp_enqueue_script('anything');
		wp_enqueue_script('anything-video');
		wp_enqueue_script('anythingSlider', THEME_JS . '/vendor/anythingSlider.js',array('jquery'),false);
	}
	function wt_slideShow_rev() {
		if ( class_exists( 'GlobalsRevSlider' ) ) {
			global $post;
			if (get_post_meta($post->ID, '_rev_slideshow', true)) {
				$title = get_post_meta($post->ID, '_rev_slideshow', true);
			}	
			else {
				$title = wt_get_option('slideshow', 'rev_slideshow');
				//$title = get_post_meta($post->ID, '_rev_slideshow', true);
			}
			//$title = get_post_meta($post->ID, '_rev_slideshow', true);
				putRevSlider($title);
		}
	}
	function wt_slideShow_layerS() {
		global $post;
		$layerslider = get_post_meta($post->ID, '_layer_slideshow', true);
			//layerslider($title);
			echo do_shortcode('[layerslider id="'.$layerslider.'"]');
	}
	function wt_slideShow_flex() {
	echo <<<HTML
<header id="intro">
HTML;

	echo "\n".<<<HTML
		<div id="slide">
			<div id="flex_slider_wrap">
				<div id="flexSlider" class="flexslider flex-preload wt_slider">
					<ul class="slides">
HTML;
			$get_options = get_option(THEME_SLUG . '_slideshow');
			if (!$get_options['flex_custom_slider_count']) {
				$get_options['flex_custom_slider_count'] = 1;
			} 
			$get_options = get_option(THEME_SLUG . '_slideshow');
			$height = wt_get_option('slideshow', 'flex_height');
			if($get_options['flex_controlNavThumbs'] == true) {
				$controlNavThumbs = true;
				if($get_options['flex_controlNavThumbsSlider'] == true) {
					$thumbsSlider = true;
				}else{
					$thumbsSlider = false;
				}
			}else{
				$controlNavThumbs = false;
			}
			?>
			<?php 
			$flex_count = $get_options['flex_custom_slider_count'];
			$width = 1920;
			?>
			<?php			
			for($z = 0; $z < $flex_count; $z++) {
				$has_thumb = '';
				if ($flex_count = $get_options['flex_custom_slider_count'] ) {
					$has_thumb = ($controlNavThumbs && !$thumbsSlider ? ' data-thumb="'. aq_resize( wt_check_input($get_options['flex_custom_slider_url_'. $z]), 100, 50, true ) .'"' : '');	
					$slide_src = aq_resize( wt_check_input($get_options['flex_custom_slider_url_'. $z]), $width, $height, true ); //resize & crop img
				
					echo "\n\t\t\t\t\t".'<li'.$has_thumb.'>'."\n";									
										
					if ($get_options['flex_custom_slider_link_'. $z]) {
						echo "\t\t\t\t\t".'<a href="'. wt_check_input($get_options['flex_custom_slider_link_'. $z]) .'">'."\n";
					}
					
					echo "\t\t\t\t\t".'<img class="slideImage" src="' . $slide_src . '" '.$has_thumb.' alt="" />';
					
					if ($get_options['flex_custom_slider_link_'. $z]) {
						echo "\n\t\t\t\t\t".'</a>';
					}
								
					$caption_position = $get_options['flex_custom_slider_caption_position_'.$z];
					switch($caption_position){
						case 'left': 	
							$caption_position = "left_aligned";
							break;
						case 'right':
							$caption_position = "right_aligned";
							break;
						case 'center': 
						default:
							$caption_position = "centered";																						
					}
					
					if ($get_options['flex_custom_slider_caption_'. $z] != '') {
						echo "\t\t\t\t\t".'<div class="flex-caption '.$caption_position.'">';
						echo "\t\t\t\t\t".'<div class="flex-caption-content">';
						//echo do_shortcode(stripslashes($get_options['flex_custom_slider_caption_'. $z]));
						echo str_replace(array('[raw]','[/raw]'),'',do_shortcode(wpml_t(THEME_NAME, 'Flex Caption_'. $z, stripslashes($get_options['flex_custom_slider_caption_'. $z]))));
						echo '</div>'."\n";
						echo '</div>'."\n";
					}
					
					echo "\n\t\t\t\t\t"."</li>\n";
				}
				
 			} 
	echo "\n".<<<HTML
					</ul>
				</div>		
HTML;

	echo "\n".<<<HTML
			</div>
			<div class="wt_angle_wrapper">
				<div class="wt_angle_left wt_angle_top"></div>
				<div style="background-color:#ffffff;" class="wt_angle_left wt_angle_bottom"></div>
				<div class="wt_angle_right wt_angle_top"></div>
				<div style="background-color: rgb(255, 255, 255);" class="wt_angle_right wt_angle_bottom"></div>
			</div>
		</div> <!-- End slide -->		
HTML;
	// If Control thumbnail slider option is cheched then we build the second slider which serves as navigation for the first one 
	global $thumbsSlider;
	if($thumbsSlider) {
		
		echo "\n".<<<HTML
		<div id="thumbsCarousel" class="flexslider thumbsCarousel">
			<ul class="slides">
HTML;
								
			for($z = 0; $z < $flex_count; $z++) {
				
				if ($flex_count = $get_options['flex_custom_slider_count'] ) {

					$slide_src = aq_resize( wt_check_input($get_options['flex_custom_slider_url_'. $z]), $width, $height, true ); //resize & crop img
					echo "\n\t\t\t\t\t"."<li>\n";					
													
					echo "\t\t\t\t\t".'<img src="' . $slide_src . '" alt="" />';
															
					echo "\n\t\t\t\t\t"."</li>\n";
				}
				
 			} 
		
		echo "\n".<<<HTML
			</ul>
		</div> <!-- End thumbsCarousel -->		
HTML;
		
	}

		$options = array(
			'animation' => wt_get_option('slideshow', 'flex_animation'), 
			'easing' => wt_get_option('slideshow', 'flex_easing'), 
			'direction' => wt_get_option('slideshow', 'flex_direction'), 
			'animationSpeed' => wt_get_option('slideshow', 'flex_animationSpeed'), 
			'slideshowSpeed' => wt_get_option('slideshow', 'flex_slideshowSpeed'), 
			'directionNav' => wt_get_option('slideshow', 'flex_directionNav'), 
			'controlNav' => wt_get_option('slideshow', 'flex_controlNav'), 
			'controlNavThumbs' => wt_get_option('slideshow', 'flex_controlNavThumbs'), 
			'controlNavThumbsSlider' => wt_get_option('slideshow', 'flex_controlNavThumbsSlider'), 
			'pauseOnAction' => wt_get_option('slideshow', 'flex_pauseOnAction'), 
			'pauseOnHover' => wt_get_option('slideshow', 'flex_pauseOnHover'), 
			'slideshow' => wt_get_option('slideshow', 'flex_slideshow'),
			'animationLoop' => wt_get_option('slideshow', 'flex_animationLoop'), 
		);
				
		echo "\n\t\t<script type=\"text/javascript\">\n";
		echo "\t\t\t"."var slideShow = []; \n";
		foreach($options as $key => $value) {
			if (is_bool($value)) {
				$value = $value ? "true" : "false";
			} elseif(is_numeric($value)) {
				$value = $value;
			} elseif($value!="true"&&$value!="false") {
				$value = "'" . $value . "'";
			}
			echo "\t\t\t"."slideShow['" . $key . "'] = " . $value . "; \n";
		}
		echo "\t\t</script>\n";
	
	echo <<<HTML
	</header> <!-- End header -->		
HTML;
	echo "\n";
	} // End function	
	
	function wt_slideShow_cycle() {
	echo <<<HTML
<header id="wt_intro">
HTML;

/* ------------------------- */
	$height = wt_get_option('slideshow', 'cycle_height');
	$width = 1920;
	$effect = wt_get_option('slideshow', 'cycle_effect');
	$tileHorz = false;
	
	switch($effect){
		case 'scrollVert':
			wp_enqueue_script('cycle-vert');
			break;
		case 'shuffle':
			wp_enqueue_script('cycle-shuffle');
			break;
		case 'tileSlide': 
		case 'tileBlind': 
		case 'tileSlideHorz': 
		case 'tileBlindHorz': 
			wp_enqueue_script('cycle-tile');
			break;		
		case 'tileSlideHorz': 
		case 'tileBlindHorz': 
			$tileHorz = true;
			break;																				
	}
	
	$easing = wt_get_option('slideshow', 'cycle_easing');
	$easeOut = wt_get_option('slideshow', 'cycle_easeOut');
	
	$random = wt_get_option('slideshow', 'cycle_random');	
	$random == "true" ? $random = true : $random = false;	
	
	$reverse = wt_get_option('slideshow', 'cycle_reverse');	
	$reverse == "true" ? $reverse = true : $reverse = false;
	
	$buildNavigation = wt_get_option('slideshow', 'cycle_buildNavigation');
	$buildNavigation == "true" ? $buildNavigation = true : $buildNavigation = false;
	
	$buildArrows = wt_get_option('slideshow', 'cycle_buildArrows');
	$buildArrows == "true" ? $buildArrows = true : $buildArrows = false;
	
	$captions = wt_get_option('slideshow', 'cycle_captions');
	$captions == "true" ? $captions = true : $captions = false;
	
	$speed = wt_get_option('slideshow', 'cycle_speed');
	$timeout = wt_get_option('slideshow', 'cycle_timeout');
	$delay = wt_get_option('slideshow', 'cycle_delay');		
	$pauseOnhover = wt_get_option('slideshow', 'cycle_pauseOnHover');
	$loop = wt_get_option('slideshow', 'cycle_loop');
	
	$continous = wt_get_option('slideshow', 'cycle_continous');	
	$continous == "true" ? $continous = true : $continous = false;
	$continous ? $cycle_autoinit = ' cycle-autoinit' : $cycle_autoinit = '';
		
	$youtubeAutoStart = wt_get_option('slideshow', 'cycle_youtubeAutoStart');
	$youtubeAutoStart == "true" ? $youtubeAutoStart = true : $youtubeAutoStart = false;
	
	$swipe = wt_get_option('slideshow', 'cycle_swipe');
	// Load script for IOS6 swipe bug
	global $detect;
	if ( $swipe && ($detect->isIOS() || $detect->isiOS()) ) {
		wp_enqueue_script('ios6-bug');
	}		
	
			
	echo "\n".<<<HTML
		<div id="slide">
			<div id="cycle_slider_wrap" class="cycle_slider_wrap">
				<div id="cycle_slider" class="cycle-slideshow cycle-preload composite-example{$cycle_autoinit}"
HTML;
				
				$get_options = get_option('whoathemes_slideshow');
				if (!$get_options['cycle_custom_slider_count']) {
					$get_options['cycle_custom_slider_count'] = 1;
				} 
				$cycle_count = $get_options['cycle_custom_slider_count'];
											
				$youtube = false; 				
				for($z = 0; $z < $cycle_count && !$youtube; $z++) {	
					$type = $get_options['custom_slider_cycle_type_'.$z];
					if ($type == "youtube") $youtube = true; 
				}
				
				if ($effect=="tileSlideHorz") $effect = 'tileSlide';
				if ($effect=="tileBlindHorz") $effect = 'tileBlind';
				if ($youtube) {
					wp_enqueue_script('cycle-youtube'); 
					$effect = 'scrollHorz';
				}
				echo ' data-cycle-fx="'.$effect.'"';
				echo $tileHorz ? ' data-cycle-tile-vertical="false"' : '';
				
				echo $buildArrows ? ' data-cycle-prev=".cycle-prev" data-cycle-next=".cycle-next"' : '';
				echo $buildNavigation ? ' data-cycle-pager=".cycle-pager"' : '';
				echo $easing != "null" ? ' data-cycle-easing="'.$easing.'"' : '';
				echo $easeOut != "null" ? ' data-cycle-ease-out="'.$easeOut.'"' : '';
				echo $random ? ' data-cycle-random="true"' : '';
				echo $reverse ? ' data-cycle-reverse="true"' : '';
				echo $speed != 500 ? ' data-cycle-speed="'.$speed.'"' : '';
				if ($timeout != 4000) {
					echo $continous ? ' data-cycle-timeout="1"' : ' data-cycle-timeout="'.$timeout.'"';
				} else {
					echo $continous ? ' data-cycle-timeout="1"' : '';
				}
				echo $delay != 0 ? ' data-cycle-delay="'.$delay.'"' : '';
				echo $pauseOnhover ? ' data-cycle-pause-on-hover="true"' : '';
				echo $loop != 0 ? ' data-cycle-loop="'.$loop.'"' : '';
				echo $swipe ? ' data-cycle-swipe="true"' : '';									
				
				echo $youtube && $youtubeAutoStart ? ' data-cycle-youtube-autostart="true"' : '';		
				echo $youtube ? ' data-cycle-auto-height="640:360" data-cycle-slides=">a" data-cycle-youtube="true">' : ' data-cycle-slides=">div.cycle_panel">';	
							
				echo $captions ? '<div class="cycle-overlay"></div>' : '';
								
				for($z = 0; $z < $cycle_count; $z++) {	
					$click_stop = '';				
					$stop = '';
					$inline_html = '';									 
										
					if ($cycle_count = $get_options['cycle_custom_slider_count'] ) {

						$slide_src = aq_resize( wt_check_input($get_options['cycle_custom_slider_url_'. $z]), $width, $height, true );					
						
						
						$inline_html .= ' style="';
						$bg = $get_options['custom_slider_cycle_color_'.$z];
						if($bg != ''){
							$inline_html .= ' background-color:'.$bg.';';
						}
						$inline_html .= '"';	
									
						switch($type){
							case 'youtube': 								
								if ($get_options['cycle_custom_slider_link_'. $z]) {
									echo "\n\t\t\t\t\t".'<a href="'. wt_check_input($get_options['cycle_custom_slider_link_'. $z]) .'" class="cycle_link"></a>';
								}	
								break;
							case 'html':
								echo "\n\t\t\t\t\t"."<div class='cycle_panel'>";
									echo "\n\t\t\t\t\t"."<div class='cycle_html_content'".$inline_html.">\n";
										echo "\t\t\t\t\t\t".do_shortcode(stripslashes($get_options['custom_slider_cycle_html_text_'.$z]));
									echo "\n\t\t\t\t\t".'</div>';
								echo "\n\t\t\t\t\t"."</div>";
								break;
							case 'image': 
							default:
								$cycle_caption = '';
								if ($captions && $get_options['custom_slider_cycle_image_caption_'. $z] != '') {
									$cycle_caption = do_shortcode(stripslashes($get_options['custom_slider_cycle_image_caption_'. $z]));
								}
								//echo "\n\t\t\t\t\t"."<div class='cycle_panel' data-cycle-desc='".$cycle_caption."'>";
								echo "\n\t\t\t\t\t" . '<div class="cycle_panel" data-cycle-desc="'.$cycle_caption.'">';		
								
									if ($get_options['cycle_custom_slider_link_'. $z]) {
										echo "\n\t\t\t\t\t".'<a href="'. wt_check_input($get_options['cycle_custom_slider_link_'. $z]) .'" class="cycle_link">';
									}									
									
									echo "\n\t\t\t\t\t".'<img class="cycle_image" src="' . $slide_src . '" alt=""/>';
									
									if ($get_options['cycle_custom_slider_link_'. $z]) {
										echo "\n\t\t\t\t\t".'</a>';
									}	
								echo "\n\t\t\t\t\t"."</div>";																					
						}							
					}					
	 			} 
				
	echo "\n".<<<HTML
				</div> <!-- End cycle_slider -->
HTML;

	if ($buildArrows) {	
		echo "\n\t".<<<HTML
		<div class="cycleArrows">
				<a class="cycle-prev" href="#" title="Previous slide">prev</a>
				<a class="cycle-next" href="#" title="Next slide">next</a>
			</div>	
HTML;
	}

	if ($buildNavigation) {	
		echo "\n\t".<<<HTML
		<div class="cycle-pager"></div>	
HTML;
	}

	echo "\n".<<<HTML
			</div>
			<div class="wt_angle_wrapper">
				<div class="wt_angle_left wt_angle_top"></div>
				<div style="background-color:#ffffff;" class="wt_angle_left wt_angle_bottom"></div>
				<div class="wt_angle_right wt_angle_top"></div>
				<div style="background-color: rgb(255, 255, 255);" class="wt_angle_right wt_angle_bottom"></div>
			</div>
		</div> <!-- End slide -->
HTML;
					
	echo <<<HTML
	</header> <!-- End header -->		
HTML;

	echo "\n";		
	} // End function	
	
	function wt_slideShow_nivo() {
	echo <<<HTML
<header id="wt_intro">
HTML;
		
	echo "\n".<<<HTML
		<div id="slide">
			<div id="nivo_slider_wrap">
				<div id="nivoSlider" class="nivo-preload">
HTML;
			$get_options = get_option('whoathemes_slideshow');
			
			if (!$get_options['nivo_custom_slider_count']) {
				$get_options['nivo_custom_slider_count'] = 1;
			} 
			$height = wt_get_option('slideshow', 'nivo_height');
			if($get_options['nivo_controlNavThumbs'] == true) {
				$controlNavThumbs = true;
			}else{
				$controlNavThumbs = false;
			}
			?>
			<?php 
			$nivo_count = $get_options['nivo_custom_slider_count'];
			$width = 980;			
			
			for($z = 0; $z < $nivo_count; $z++) {
			?>
				<?php
				if ($nivo_count = $get_options['nivo_custom_slider_count'] ) {
					$has_thumb = ($controlNavThumbs ? ' data-thumb="'.aq_resize( wt_check_input($get_options['nivo_custom_slider_url_'. $z]), 100, 50, true ).'"' : '');	
					$slide_src = aq_resize( wt_check_input($get_options['nivo_custom_slider_url_'. $z]), $width, $height, true );					
					
					if ($get_options['nivo_custom_slider_link_'. $z]) {
						echo "\n\t\t\t\t\t".'<a href="'. wt_check_input($get_options['nivo_custom_slider_link_'. $z]) .'">';
					}
					
					$caption = '';
					if ($get_options['custom_slider_caption_'. $z] != '') {
						$caption = '#htmlcaption_'.$z.'';
					}
					echo "\n\t\t\t\t\t".'<img class="slideImage" src="' . $slide_src . '"'.$has_thumb.' title="'.$caption.'" alt="" />';
					
					if ($get_options['nivo_custom_slider_link_'. $z]) {
						echo "\n\t\t\t\t\t".'</a>';
					}
				}
				
 			} 
	echo "\n".<<<HTML
				</div>		
HTML;

			for($z = 0; $z < $nivo_count; $z++) {
				$caption = '';
				if ($get_options['custom_slider_caption_'. $z] != '') {
					
					echo "\n<div id='htmlcaption_".$z."' class='nivo-html-caption'>\n";
						echo do_shortcode(stripslashes($get_options['custom_slider_caption_'. $z]));
					echo "\n</div>\n";
				}				
			}
	echo "\n".<<<HTML
			<div class="wt_angle_wrapper">
				<div class="wt_angle_left wt_angle_top"></div>
				<div style="background-color:#ffffff;" class="wt_angle_left wt_angle_bottom"></div>
				<div class="wt_angle_right wt_angle_top"></div>
				<div style="background-color: rgb(255, 255, 255);" class="wt_angle_right wt_angle_bottom"></div>
			</div>
			</div>
		</div> <!-- End slide -->		
HTML;
		$options = array(
			'effect' => wt_get_option('slideshow', 'nivo_effect'), 
			'slices' => wt_get_option('slideshow', 'nivo_slices'), 
			'boxCols' => wt_get_option('slideshow', 'nivo_boxCols'), 
			'boxRows' => wt_get_option('slideshow', 'nivo_boxRows'), 
			'animSpeed' => wt_get_option('slideshow', 'nivo_animSpeed'), 
			'pauseTime' => wt_get_option('slideshow', 'nivo_pauseTime'), 
			'randomStart' => wt_get_option('slideshow', 'nivo_randomStart'), 
			'directionNav' => wt_get_option('slideshow', 'nivo_directionNav'), 
			'controlNav' => wt_get_option('slideshow', 'nivo_controlNav'), 
			'controlNavThumbs' => wt_get_option('slideshow', 'nivo_controlNavThumbs'), 
			'pauseOnHover' => wt_get_option('slideshow', 'nivo_pauseOnHover'), 
			'manualAdvance' => wt_get_option('slideshow', 'nivo_manualAdvance'),
			'stopAtEnd' => wt_get_option('slideshow', 'nivo_stopAtEnd'),
		);
				
		echo "\n\t\t<script type=\"text/javascript\">\n";
		echo "\t\t\t"."var slideShow = []; \n";
		foreach($options as $key => $value) {
			if (is_bool($value)) {
				$value = $value ? "true" : "false";
			} elseif(is_numeric($value)) {
				$value = $value;
			} elseif($value!="true"&&$value!="false") {
				$value = "'" . $value . "'";
			}
			echo "\t\t\t"."slideShow['" . $key . "'] = " . $value . "; \n";
		}
		echo "\t\t</script>\n";
	
	echo <<<HTML
	</header> <!-- End header -->		
HTML;
	echo "\n";
	} // End function		
	
	function wt_slideShow_anything($color='') {
	echo <<<HTML
<header id="wt_intro">
HTML;

	echo "\n".<<<HTML
		<div id="slide">
			<div id="anything_slider_wrap">
				<ul id="anything_slider">
HTML;
				$get_options = get_option('whoathemes_slideshow');
				if (!$get_options['anything_custom_slider_count']) {
					$get_options['anything_custom_slider_count'] = 1;
				} 
				$height = wt_get_option('slideshow', 'anything_height');
				$anything_count = $get_options['anything_custom_slider_count'];
				
				for($z = 0; $z < $anything_count; $z++) {	
					$click_stop = '';				
					$stop = '';
					$bg = '';
					$width = 980;	
								 
					$type = $get_options['custom_slider_anything_type_'.$z];
					
					if ($type == "sidebar") { $width = 700; } 
					
					if ($anything_count = $get_options['anything_custom_slider_count'] ) {

						$slide_src = aq_resize( wt_check_input($get_options['anything_custom_slider_url_'. $z]), $width, $height, true );						
						
						$bg = $get_options['custom_slider_anything_color_'.$z];
						if($bg != ''){
							$bg = ' style="background-color:'.$bg.'"';
						}
						if($get_options['custom_slider_anything_click_stop_'.$z] == "yes"){
							$click_stop = ' click_stoped';
						}
						if($get_options['custom_slider_anything_stop_'.$z] == "yes"){
							$stop = ' stoped';
						}						
						
						echo "\n\t\t\t\t\t"."<li class='panel".$stop.$click_stop."'".$bg.">\n";
						switch($type){
							case 'sidebar':
								$sidebar_position = $get_options['custom_slider_anything_sidebar_position_'.$z];	
								echo "\t\t\t\t\t\t".'<div class="anything_sidebar_'.$sidebar_position.'">';
								echo "\n\t\t\t\t\t\t\t".'<div class="anything_sidebar_content">';							
									echo do_shortcode(stripslashes($get_options['custom_slider_anything_sidebar_text_'.$z]));
								echo '</div>';
								echo "\n\t\t\t\t\t\t\t".'<div class="anything_sidebar_image">';							
									if ($get_options['anything_custom_slider_link_'. $z]) {
										echo "\n\t\t\t\t\t\t\t\t".'<a href="'. wt_check_input($get_options['anything_custom_slider_link_'. $z]) .'" class="anything_link">';
									}
									
									echo "\n\t\t\t\t\t\t\t\t".'<img class="slideImage" src="' . $slide_src . '" alt=""/>';
									
									if ($get_options['anything_custom_slider_link_'. $z]) {
										echo "\n\t\t\t\t\t\t\t\t".'</a>';
									}
								echo "\n\t\t\t\t\t\t\t".'</div>';								
								echo "\n\t\t\t\t\t\t".'</div>';
								break;
							case 'html':
								echo "\t\t\t\t\t\t".'<div class="anything_html_content">';	
									echo do_shortcode(stripslashes($get_options['custom_slider_anything_html_text_'.$z]));
								echo '</div>';
								break;	
							case 'image': 
							default:
								$caption_position = $get_options['custom_slider_caption_position_'.$z];								
								if($caption_position != '' && $caption_position !='disable'){
									echo "\t\t\t\t\t\t".'<div class="anything_caption caption_'.$caption_position.'">';
										echo do_shortcode(stripslashes($get_options['custom_slider_anything_caption_text_'. $z]));
									echo '</div>'."\n";
								}
								
								if ($get_options['anything_custom_slider_link_'. $z]) {
									echo "\t\t\t\t\t\t".'<a href="'. wt_check_input($get_options['anything_custom_slider_link_'. $z]) .'" class="anything_link">'."\n";
								}
								
								echo "\t\t\t\t\t\t".'<img class="slideImage" src="' . $slide_src . '" alt=""/>';
									
								if ($get_options['anything_custom_slider_link_'. $z]) {
									echo "\n\t\t\t\t\t\t".'</a>';
								}																						
						}
						echo "\n\t\t\t\t\t"."</li>";
					}					
	 			} 
	echo "\n".<<<HTML
				</ul>		
			</div>
		</div> <!-- End slide -->		
HTML;
		$options = array(
			// Appearance
			'easing' => wt_get_option('slideshow', 'anything_easing'),
			
			'buildArrows' => wt_option('slideshow', 'anything_buildArrows'), 
			'buildNavigation' => wt_get_option('slideshow', 'anything_buildNavigation'), 
			
			'toggleArrows' => wt_get_option('slideshow', 'anything_toggleArrows'), 
			'toggleControls' => wt_get_option('slideshow', 'anything_toggleControls'),
			 
			'captionOpacity' => wt_get_option('slideshow', 'anything_captionOpacity'),
			
			// Function
			"enableArrows" => wt_get_option('slideshow', 'anything_enableArrows'), 
			"enableNavigation" => wt_get_option('slideshow', 'anything_enableNavigation'), 
			"enableKeyboard" => wt_get_option('slideshow', 'anything_enableKeyboard'), 
			
			// Slideshow options
			'autoPlay' => wt_get_option('slideshow', 'anything_autoPlay'), 
			'autoPlayLocked' => wt_get_option('slideshow', 'anything_autoPlayLocked'), 
			'autoPlayDelayed' => wt_get_option('slideshow', 'anything_autoPlayDelayed'), 
			'pauseOnHover' => wt_get_option('slideshow', 'anything_pauseOnHover'), 
			'stopAtEnd' => wt_get_option('slideshow', 'anything_stopAtEnd'),
			'playRtl' => wt_get_option('slideshow', 'anything_playRtl'),
			
			// Times
			'delay' => wt_get_option('slideshow', 'anything_delay'),
			'resumeDelay' => wt_get_option('slideshow', 'anything_resumeDelay'),
			'animationTime' => wt_get_option('slideshow', 'anything_animationTime'),
			
			// Video
			'resumeOnVideoEnd' => wt_get_option('slideshow', 'anything_resumeOnVideoEnd'),
		);
		
		echo "\n\t\t<script type=\"text/javascript\">\n";
		echo "\t\t\t"."var slideShow = []; \n";
		
		foreach($options as $key => $value) {
			if (is_bool($value)) {
				$value = $value ? "true" : "false";
			} elseif(is_numeric($value)){
				$value = $value;
			} elseif($value!="true"&&$value!="false") {
				$value = "'" . $value . "'";
			}
			echo "\t\t\t"."slideShow['" . $key . "'] = " . $value . "; \n";
		}
		
		echo "\t\t</script>\n";

	echo <<<HTML
	</header> <!-- End header -->		
HTML;
	echo "\n";		
	} // End function	
		
}// End class themeFeatures

function wt_theme_generator($function){
	global $_wt_themeFeatures;
	$_wt_themeFeatures = new wt_themeFeatures;
	$args = array_slice( func_get_args(), 1 );
	return call_user_func_array(array( &$_wt_themeFeatures, $function ), $args );
}