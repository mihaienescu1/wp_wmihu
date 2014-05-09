<?php
function wt_shortcode_blog($atts, $content = null, $code) {
	global $wp_filter;
	$the_content_filter_backup = $wp_filter['the_content'];
	extract(shortcode_atts(array(
		'pagination' => 'false',
		'posts_slide' => 'false',
		'title' => 'Latest from the blog',
		'auto_slide' => 0,
		'count' => 3,
		'cat' => '',
		'author' => '',
		'posts' => '',
		'isotope' => 'false',
		'grid'	=> 'false',
		'featured_entry' => 'true',
		'featured_entry_type' => 'full',
		'meta' => 'true',
		'desc' => 'true',
		'full' => 'false',
		'paged' => '',
		'columns' => 1,
	), $atts));
	
	$query = array(
		'posts_per_page' => (int)$count,
		'post_type'=>'post',
	);
	if($paged){
		$query['paged'] = $paged;
	}
	if($cat){
		$query['cat'] = $cat;
	}
	if($author){
		$query['author'] = $author;
	}
	if($posts){
		$query['post__in'] = explode(',',$posts);
	}
	if ($pagination == 'true') {
		global $wp_version;
		if(is_front_page() && version_compare($wp_version, "3.1", '>=')){//fix wordpress 3.1 paged query
			$paged = (get_query_var('paged')) ?get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
		}else{
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		$query['paged'] = $paged;
	} else {
		$query['showposts'] = $count;
	}
	
	$r = new WP_Query($query);

	$columns = (int)$columns;
	if($columns > 5){
		$columns = 5;
	}elseif($columns < 1){
		$columns = 1;
	}
	$posts_per_column = ceil($query['posts_per_page']/$columns);
	
	$atts = array(
		'posts_slide'	=> $posts_slide,
		'title' => $title,
		'auto_slide' => (int)$auto_slide,
		'posts_per_column' => $posts_per_column,
		'posts_per_page' => (int)$count,
		'desc' => $desc,
		'full' => $full,
		'meta' => $meta,
		'featured_entry' => $featured_entry,
		'featured_entry_type' => $featured_entry_type,
		'columns' => $columns,
		'isotope' => $isotope,
		'grid'	=> $grid,
	);
	
	// grid or isotope should work only on multiple columns
	$columns = ($grid == 'true' || $isotope == 'true') ? 1 : $columns;
	
	$output = '';
	
	$output .= "<div class=\"wt_blog_shortcode\"";
	if ($posts_slide == 'true') {
		$output .= ' style="overflow: hidden"';
	}
	$output .= '>';
		
	if($columns != 1){
		$class = array('half','third','fourth','fifth','sixth');
		$css = $class[$columns-2];
		
		for($i=1; $i<=$columns; $i++){
			if ($i%$columns !== 0) {
				$output .= "<div class=\"wt_one_{$css}\">".wt_shortcode_blog_column_posts($r,$atts,$i)."</div>";
			} else {
				$output .= "<div class=\"wt_one_{$css} last\">".wt_shortcode_blog_column_posts($r,$atts,$i)."</div>";
			}
		}
	}else{
		$output .= wt_shortcode_blog_column_posts($r,$atts,1);
	}
	
	$output .= "</div>"; // close blog_shortcode div
	
	if ($pagination == 'true') {
		ob_start();
		wt_blog_pagenavi('', '', $r, $paged);
		$output .= ob_get_clean();
	}

	wp_reset_postdata();
	$wp_filter['the_content'] = $the_content_filter_backup;
	return $output;
}
add_shortcode('wt_blog_posts','wt_shortcode_blog');

function wt_shortcode_blog_column_posts(&$r, $atts, $current) {
	extract($atts);
		
	if ($grid == 'true') {
		$class = array('half','third','fourth','fifth','sixth');
		$css = $class[$columns-2];
	} else {
		$start = ($current-1) * $posts_per_column +1;
		$end = $current * $posts_per_column;
		if( $r->post_count < $start){
			return '';
		}
	}
	
	//global $layout;	
	$layout = 'full';	
	$output = '';
	$pagination = '';
	// If Carousel blog shortcode
	if ($posts_slide == 'true' && $pagination != 'true') {
		$id = rand(1,1000);
		wp_print_scripts('jcarousel');		
		
		if($title !== ''){ $output .= '<h2 class="dottedBg"><span>'.$title.'</span></h2>'; }	
		$output .= '<div id="jcarousel_'.$id.'" class="jcarousel-wrapper">';					
		$output .= '<ul class="jcarousel da-thumbs" data-auto="'.$auto_slide.'">';		
	}	
	
	// If sortable blog shortcode
	if ($isotope == 'true') {
		wp_enqueue_script('jquery-isotope');
		wp_enqueue_script('jquery-init-isotope');
		$output .= '<div class="wt_isotope">';
		$element = 'wt_element ';
	} else {
		$element = '';
	}
				
	$i = 0;
	global $post;
	if ($r->have_posts()):
		while ($r->have_posts()) : 
			$i++;
			
			if ($grid == 'false') {
				if($i < $start) continue;
				if($i > $end) break;
			}
						
			$r->the_post();
			if ($grid == 'true' && $columns != 1) {
				if ($i%$columns !== 0) {
					$output .= "<div class=\"{$element}wt_one_{$css}\">";
				} else {
					$output .= "<div class=\"{$element}wt_one_{$css} last\">";
				}
			}
			if ($posts_slide == 'true' && $pagination != 'true') {
				$output .= '<li class="item">';
			}
			$output .= '<article data-order="'.$i.'" id="post-'.get_the_ID().'" class="blogEntry clearfix">';
			
			if($featured_entry == 'true'){
				$output .= '<header class="blogEntry_frame entry_'.$featured_entry_type.'">';
				$thumbnail_type = get_post_meta($post->ID, '_thumbnail_type', true);

					switch($thumbnail_type){
					
						case "timage" : 
							$output .= wt_theme_generator('wt_blog_featured_image',$featured_entry_type,$layout);
							break;
						case "tvideo" : 
							$video_link = get_post_meta($post->ID,'_featured_video', true);
							$output .= '<div class="blog-thumbnail-video">';
							$output .= wt_video_featured($video_link,$featured_entry_type,$layout);
							
							$output .=  '</div>';							
							break;
						case "tplayer" :						
							wp_enqueue_script('mediaelementjs-scripts'); 
							$player_link = get_post_meta($post->ID,'_thumbnail_player', true);
							$output .= '<div class="blog-thumbnail-player">';
							$output .= wt_media_player($featured_entry_type,$layout,$player_link);
							$output .= '</div>';							
							break;
						case "tslide" : 
							$output .= '<div class="blog-thumbnail-slide">';
							$output .= wt_get_slide($featured_entry_type,$layout);
							$output .= '</div>';							
							break;
				}
				$output .= '</header>';
			}
			
			
			if($desc == 'false'){	
				if($meta == 'true'){
					$output .= '<footer class="blogEntry_metadata">';
					if ($posts_slide != 'true') {
						$output .= wt_theme_generator('wt_blog_meta');
					} else {
						$output .= wt_theme_generator('wt_blog_carousel_meta');
					}
					$output .= '</footer>';
	
				}
				$output .= '<div class="blogEntry_content">';
				$output .= '<h3 class="blogEntry_title"><a href="'.get_permalink().'" rel="bookmark" title="'.sprintf( __("Permanent Link to %s", 'wt_front'), get_the_title() ).'">'.get_the_title().'</a></h3>';
				$output .= '</div>';
				
				
			}
			if($desc == 'true'){	
				$output .= '<div class="blogEntry_content">';
				$output .= '<h3 class="blogEntry_title"><a href="'.get_permalink().'" rel="bookmark" title="'.sprintf( __("Permanent Link to %s", 'wt_front'), get_the_title() ).'">'.get_the_title().'</a></h3>';
				
				if($meta == 'true'){
					$output .= '<footer class="blogEntry_metadata">';
					if ($posts_slide != 'true') {
						$output .= wt_theme_generator('wt_blog_meta');
					} else {
						$output .= wt_theme_generator('wt_blog_carousel_meta');
					}
					$output .= '</footer>';
		
				}
				if (wt_get_option('blog','meta_date')){
					//$output .= '<div class="entry_date">';
					//$output .= '<a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'">'.get_the_time('d M').'</a></div>';
				}
				//$output .= '<a href=""><i class="blog_icon wt_icon-pencil"></i></a>';
				
				
				if($full == 'true'){
					global $more;
					$more = 0;
					$content = get_the_content(__("Read More", 'wt_front'),false);
					$content = apply_filters('the_content', $content);
					$content = str_replace(']]>', ']]&gt;', $content);
					$output .= $content;
				}else{
					$content = get_the_excerpt();
					$content = apply_filters('the_excerpt', $content);
					$output .= '<div>'.$content.'</div>';
					$output .= '<p class="readMore"><a class="read_more_link" href="'.get_permalink().'">'. __('Read more &raquo;','wt_front').'</a></p>';
				}
				$output .= '</div>';
				if ($featured_entry_type == 'left') {
					$output .= '<div class="clearBoth"></div>';
				}
			}
			
			$output .= '</article>';
			if ($posts_slide == 'true' && $pagination != 'true') {
				$output .= '</li>';
			}
			if ($grid == 'true' && $columns != 1) {
				$output .= '</div>';
				if ($i%$columns === 0) {
					$output .= "<div class=\"clearBoth\"></div>";
				}
			}
		endwhile;
		$output .= ($isotope == 'true') ? '</div>' : ''; // close isotope div if the sortable blog shortcode is used
		if ($posts_slide == 'true' && $pagination != 'true') {  // close Carousel ul/div if the Carousel blog shortcode is used
			$output .= '</ul></div>';
		}
	endif;
		
	return $output;

}

function wt_blog_pagenavi($before = '', $after = '', $blog_query, $paged) {
	global $wpdb, $wp_query;
	
	if (is_single())
		return;
	
	$pagenavi_options = array(
		'pages_text' => __('Page %CURRENT_PAGE% of %TOTAL_PAGES%','wt_front'),
		// 'pages_text' => '',
		'current_text' => '%PAGE_NUMBER%',
		'page_text' => '%PAGE_NUMBER%',
		'next_text' => __('&raquo;','wt_front'),
		'prev_text' => __('&laquo;','wt_front'),
		'dotright_text' => __('...','wt_front'),
		'dotleft_text' => __('...','wt_front'),
		'style' => 1,
		'num_pages' => 4,
		'always_show' => 0,
		'num_larger_page_numbers' => 3,
		'larger_page_numbers_multiple' => 10,
		'use_pagenavi_css' => 0,
	);
	
	$request = $blog_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	global $wp_version;
	if(is_front_page() && version_compare($wp_version, "3.1", '>=')){//fix wordpress 3.1 paged query
		$paged = (get_query_var('paged')) ?intval(get_query_var('paged')) : intval(get_query_var('page'));
	}else{
		$paged = intval(get_query_var('paged'));
	}
	
	$numposts = $blog_query->found_posts;
	$max_page = intval($blog_query->max_num_pages);
	
	if (empty($paged) || $paged == 0)
		$paged = 1;
	$pages_to_show = intval($pagenavi_options['num_pages']);
	$larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
	$larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start = floor($pages_to_show_minus_1 / 2);
	$half_page_end = ceil($pages_to_show_minus_1 / 2);
	$start_page = $paged - $half_page_start;
	
	if ($start_page <= 0)
		$start_page = 1;
	
	$end_page = $paged + $half_page_end;
	if (($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	
	if ($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	
	if ($start_page <= 0)
		$start_page = 1;
	
	$larger_pages_array = array();
	if ($larger_page_multiple)
		for($i = $larger_page_multiple; $i <= $max_page; $i += $larger_page_multiple)
			$larger_pages_array[] = $i;
	
	if ($max_page > 1 || intval($pagenavi_options['always_show'])) {
		$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
		$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
		echo $before . '<div class="wp-pagenavi">' . "\n";
		switch(intval($pagenavi_options['style'])){
			// Normal
			case 1:
				if (! empty($pages_text)) {
					echo '<span class="pagenavi">' . $pages_text . '</span>';
				}
				$larger_page_start = 0;
				foreach($larger_pages_array as $larger_page) {
					if ($larger_page < $start_page && $larger_page_start < $larger_page_to_show) {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
						echo '<a href="' . esc_url(get_pagenum_link($larger_page)) . '" class="inactive" title="' . $page_text . '">' . $page_text . '</a>';
						$larger_page_start++;
					}
				}
				previous_posts_link($pagenavi_options['prev_text']);
				for($i = $start_page; $i <= $end_page; $i++) {
					if ($i == $paged) {
						$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
						echo '<span class="currentPosts">' . $current_page_text . '</span>';
					} else {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
						echo '<a href="' . esc_url(get_pagenum_link($i)) . '" class="inactive" title="' . $page_text . '">' . $page_text . '</a>';
					}
				}
				next_posts_link($pagenavi_options['next_text'], $max_page);
				$larger_page_end = 0;
				foreach($larger_pages_array as $larger_page) {
					if ($larger_page > $end_page && $larger_page_end < $larger_page_to_show) {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($larger_page), $pagenavi_options['page_text']);
						echo '<a href="' . esc_url(get_pagenum_link($larger_page)) . '" class="inactive" title="' . $page_text . '">' . $page_text . '</a>';
						$larger_page_end++;
					}
				}
				break;
			// Dropdown
			case 2:
				echo '<form action="' .  htmlspecialchars($_SERVER['PHP_SELF']) . '" method="get">' . "\n";
				echo '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">' . "\n";
				for($i = 1; $i <= $max_page; $i++) {
					$page_num = $i;
					if ($page_num == 1) {
						$page_num = 0;
					}
					if ($i == $paged) {
						$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
						echo '<option value="' . esc_url(get_pagenum_link($page_num)) . '" selected="selected" class="current">' . $current_page_text . "</option>\n";
					} else {
						$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
						echo '<option value="' . esc_url(get_pagenum_link($page_num)) . '">' . $page_text . "</option>\n";
					}
				}
				echo "</select>\n";
				echo "</form>\n";
				break;
		}
		echo '</div>' . $after . "\n";
	}
}
