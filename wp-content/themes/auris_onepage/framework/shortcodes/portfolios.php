<?php
function wt_shortcode_portfolio($atts, $content = null, $code) {
	global $wp_filter;
	$the_content_filter_backup = $wp_filter['the_content'];
	extract(shortcode_atts(array(
		'title' => '',
		'column' => 4,
		'cat' => '',
		'max' => -1,
		'display_title' => '',
		'titlelinkable' => '',
		'desc' => '',
		'category' => '',
		'more' => '',
		'moretext' => '',
		'nopaging' => 'false',
		'sortable' => 'false',
		'port_slide' => 'false',
		'auto_slide' => '0',
		'group' => 'true',
		'advancedesc' => '',
		'ids' => '',		
		'order'=> 'ASC',
		'orderby'=> 'menu_order', //none, id, author, title, date, modified, parent, rand, comment_count, menu_order

	), $atts));
	
	$output = '';
	$rel_group = 'portfolio_'.rand(1,1000); //for lightbox group
	
	if ($sortable != 'false') {
		
		wp_enqueue_script('jquery-isotope');
		$output = '<div class="sortableLinks">';
		// $output .= '<span>'.__('Show:','wt_front').'</span>';
		$output .= '<a class="selected" data-filter="*" href="#">'.__('All','wt_front').'</a>';
		$terms = array();
		if ($cat != '') {
			foreach(explode(',', $cat) as $term_slug) {
				$terms[] = get_term_by('slug', $term_slug, 'wt_portfolio_category');
			}
		} else {
			$terms = get_terms('wt_portfolio_category', 'hide_empty=1');
		}
		foreach($terms as $term) {
			$output .= '<a data-filter=".' . $term->slug . '" href="#">' . $term->name . '</a>';
		}
		$nopaging = 'true';
		$output .= '</div>';
		
	} else {
	}
	
	$output .= '<div class="wt_portfolio_wrapper';
	if ($port_slide == 'true') {
		$output .= '_carousel';
		$isotope = '';
	} elseif ($nopaging == 'false') {
		$isotope = '';
	} else {
		$isotope = ' wt_isotope';
	}
	$output .=' wt_portfolio-grid' . $isotope . ' wt_portfolio_' . $column . '"';
	if ($port_slide == 'true') {
		$output .= ' style="margin-right: 0"';
	}
	$output .= '>';
	if ($port_slide == 'true' && $nopaging == 'false' && $sortable == 'false') {
		$id = rand(1,1000);
		wp_print_scripts('jcarousel');	
		
		if($title !== ''){ $output .= '<h2 class="dottedBg"><span>'.$title.'</span></h2>'; }	
		$output .= '<div id="jcarousel_'.$id.'" class="jcarousel-wrapper">';					
		$output .= '<ul class="jcarousel da-thumbs" data-auto="'.$auto_slide.'">';
	}	
	if ($nopaging == 'false') {
		global $wp_version;
		if(is_front_page() && version_compare($wp_version, "3.1", '>=')){//fix wordpress 3.1 paged query
			$paged = (get_query_var('paged')) ?get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
		}else{
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		
		$query = array(
			'post_type' => 'wt_portfolio', 
			'posts_per_page' => $max, 
			'paged' => $paged,
			'orderby'=> $orderby, 
			'order'=> $order
		);
	} else {
		$query = array(
			'post_type' => 'wt_portfolio', 
			'showposts' => $max,
			'orderby'=> $orderby, 
			'order'=> $order
		);
	}
	if($cat != ''){
			global $wp_version;
			if(version_compare($wp_version, "3.1", '>=')){
				$query['tax_query'] = array(
					array(
						'taxonomy' => 'wt_portfolio_category',
						'field' => 'slug',
						'terms' => explode(',', $cat)
					)
				);
			}else{
				$query['taxonomy'] = 'wt_portfolio_category';
				$query['term'] = $cat;
			}
		}
	if($ids){
		$query['post__in'] = explode(',',$ids);
	}
	$r = new WP_Query($query);
	$i = 1;
	//deprecated
	if($display_title == ''){
		if(wt_get_option('portfolio','display_title') == true){
			$display_title = 'true';
		}
	}
	
	if($desc == ''){
		if(wt_get_option('portfolio','display_excerpt') == true){
			$desc = 'true';
		}
	}
	switch($more){
		case '':
			if( wt_get_option('portfolio','display_more_button') == true){
				$more = true;
			}
			break;
		case 'false':
			$more = false;
			break;
		case 'true':
		default:
			$more = true;
			break;
	}
	$order = 0;
	while($r->have_posts()) {
		$order++;
		$r->the_post();
		$terms = get_the_terms(get_the_id(), 'wt_portfolio_category');
		$terms_slug = array();
		if (is_array($terms)) {
			foreach($terms as $term) {
				$terms_slug[] = $term->slug;
			}
		}

		if (has_post_thumbnail()) {
			$image_id = get_post_thumbnail_id(get_the_id());
			$image = wp_get_attachment_image_src($image_id, 'full', true);
			
			$type = get_post_meta(get_the_id(), '_portfolio_type', true);
			$iframe = '';
			if($type == 'image'){
				$href =  get_post_meta(get_the_id(), '_image', true);
				if(empty($href)){
					$href = $image[0];
				}
				$icon = 'overlay_zoom';
				$lightbox = ' lightbox';
				if($group == 'true'){
					$rel = ' data-rel="lightbox[portfolio]"';
				}else{
					$rel = '';
				}
			}elseif($type == 'video'){
				$href =  get_post_meta(get_the_id(), '_video', true);
				if(empty($href)){
					$href = $image[0];
				}
				$video_width = get_post_meta(get_the_id(), '_video_width', true);
				$video_height = get_post_meta(get_the_id(), '_video_height', true);
				if($video_width==''){
					$video_width = wt_get_option('portfolio','video_width');
				}
				if($video_height==''){
					$video_height = wt_get_option('portfolio','video_height');
				}
				if ($video_width) {
					$video_width = '?width='.$video_width.'';
				}
				
				if($video_height){
					if ($video_width) {
						$video_height = '&amp;height='.$video_height.'';
					}
					else {
						$video_height = '?height='.$video_height.'';
					}
				}
								
				$icon = 'overlay_play';
				$lightbox = ' lightbox';
				if($group == 'true'){
					$rel =  ' data-rel="lightbox[portfolio]"';
				}else{
					$rel = '';
				}
			}elseif($type == 'link'){
				$link = get_post_meta(get_the_ID(), '_link', true);
				$href = wt_get_superlink($link);
				$link_target = get_post_meta(get_the_ID(), '_link_target', true);
				$link_target = $link_target?$link_target:'_self';
				$icon = 'overlay_link';
				$lightbox = '';
				$rel = '';
			}
			else{
				$href = get_permalink();
				$link_target = get_post_meta(get_the_ID(), '_doc_target', true);
				$link_target = $link_target?$link_target:'_self';
				$icon = 'overlay_doc';
				$lightbox = '';
				$rel = '';
			}		
			
			$override_icon = get_post_meta(get_the_ID(), '_icon', true);
			if($override_icon && $override_icon != 'default'){
				$icon = $override_icon;
			}
		} /* End if (has_post_thumbnail() */
		
		if ($port_slide == 'true' && $nopaging == 'false' && $sortable == 'false') {
			$output .= '<li class="item">';
		}
		if ($column == 1) {			
		$output .= '<article data-order="'.$order.'" id="post-' . get_the_ID() . '" class="portEntry">';
		$output .= '<header class="wt_portofolio_item two_third ' . $term->slug . '">';
		$width = '620px';
		$height = '312px';
		}
		elseif ($column == 2) {
			$column_count = '';
			if ($column_count == 2) $column_count = 0;
			$column_count++;
			$output .= '<article data-order="'.$order.'" id="post-' . get_the_ID() . '" class="portEntry wt_portofolio_item wt_one_half';
			$output .= ' ' . $term->slug . '"><div class="portofolio_animated">';		
			$width = '460px';
			$height = '290px';
		}
		elseif ($column==3) {
			$column_count = '';
			if ($column_count == 3) $column_count = 0;
			$column_count++;
			$output .= '<article data-order="'.$order.'" id="post-' . get_the_ID() . '" class="portEntry wt_portofolio_item wt_one_third';
			$output .= ' ' . $term->slug . '"><div class="wt_portofolio_animated">';
			$width = '400px';
			$height = '242px';
		}
		elseif ($column==4) {
			$column_count = '';
			if ($column_count == 4) $column_count = 0;
			$column_count++;
			$output .= '<article data-order="'.$order.'" id="post-' . get_the_ID() . '" class="portEntry wt_portofolio_item wt_one_fourth';
		$output .= ' ' . implode(' ', $terms_slug) . '"><div class="wt_portofolio_animated">';
		$width = '400px';
		$height = '224px';
		}
		$video_width = wt_get_option('portfolio','video_width');
		$video_height = wt_get_option('portfolio','video_height');
			
		if (has_post_thumbnail()) {
			$output .= '<header class="wt_image_frame">';
			$output .= '<span class="wt_image_holder"><a class="'.$icon.'" '.(isset($link_target)?'target="'.$link_target.'" ':'').' '.$rel.'  href="' . $href . $video_width . $video_height . '" title="' . get_the_title() . '">';	
			$output .= '<img src="'. aq_resize( wt_get_image_src($image[0]), $width, $height, true ).'" alt="' . get_the_title() . '" />';
			$output .= '</a></span>';			
			$output .= '<span class="wt_icons_arrow"></span></header>';
		} /* End if (has_post_thumbnail() */	
		
		if ($column==1) {
			$output .= '</header>';
			$output .= '<div class="wt_portofolio_item wt_one_third last';
			$output .= ' ' . $term->slug . '">';
		}
		elseif ($column==2 || $column==3 || $column==4 ) {
			if (($desc == 'true') || $display_title == 'true' || $category == 'true'){		
				$output .= '<div class="wt_portofolio_details">';
			}
		}
		if($display_title == 'true'){
			if($titlelinkable == 'true'){
				$output .= '<h4 class="wt_portfolio_title"><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>';
			} else{
				/* $output .= '<h4 class="portfolio_title">' . get_the_title() . '</h4>'; */
				$output .= '<h4 class="wt_portfolio_title"><a href="'.get_permalink().'">' . get_the_title() . '</a></h4>';
			}
		}
		
		if ($desc == 'true' || $category == 'true' || $more == 'true'){			
			$output .= '<div class="wt_portofolio_det">';	
		}
				
		if ($desc == 'true'){
			if($advancedesc == 'true'){
				remove_filter('get_the_excerpt', 'wp_trim_excerpt');
				$output .= '<p>' . do_shortcode(wpautop(get_the_excerpt())) . '</p>';
			}else{
				$output .= '<p>' . get_the_excerpt() . '</p>';
			}
			
		}		
		
		if ($category == 'true'){		
			$output .= '<p class="wt_portfolioCategory">'.$term->name.'</p>';
		}
		
		if( wt_get_option('portfolio','display_more_button')){
			if(wt_is_enabled(get_post_meta(get_the_id(), '_more', true), $more)){
				$more_link = wt_get_superlink(get_post_meta(get_the_id(), '_more_link', true), get_permalink());
				$more_link_target = get_post_meta(get_the_ID(), '_more_link_target', true);
				$more_link_target = $more_link_target?$more_link_target:'_self';
				if($moretext !== ''){
					$output .= '<p class="readMore"><a href="'.$more_link.'" target="'.$more_link_target.'"><span>'.$moretext.'</span></a></p>';
				} 
				else {
					$output .= '<p class="readMore"><a href="'.$more_link.'" target="'.$more_link_target.'"><span>'.wt_get_option('portfolio','more_button_text').'</span></a></p>';
				}
			}
		}
		
		if($desc == 'true' || $category == 'true' || $more == 'true'){
			$output .= '</div>';
		}
		
		if (($desc == 'true') || $display_title == 'true' || $category == 'true'){	
			$output .= '</div>';
		}
		if ($column==1 || $column==2 || $column==3 || $column==4) {
			$output .= '</div></article>';
		}
		
		if ($port_slide == 'true' && $nopaging == 'false' && $sortable == 'false') {
			$output .= '</li>';
		}
	}		
	if ($port_slide == 'true' && $nopaging == 'false' && $sortable == 'false') {
		$output .= '</ul></div>';		
	}
	$output .= '</div>';	
	
	if ($nopaging == 'false' && $port_slide == 'false') {
		ob_start();
		wt_portfolio_pagenavi('', '', $r, $paged);
		$output .= ob_get_clean();
	}
	
	wp_reset_postdata();
	$wp_filter['the_content'] = $the_content_filter_backup;
	return $output;
}
add_shortcode('wt_portfolio', 'wt_shortcode_portfolio');

function wt_portfolio_pagenavi($before = '', $after = '',$portfolio_query, $paged) {
	global $wpdb, $wp_query;
	
	if (is_single())
		return;
	
	$pagenavi_options = array(
		//'pages_text' => __('Page %CURRENT_PAGE% of %TOTAL_PAGES%','wt_front'),
		'pages_text' => '',
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
	
	$request = $portfolio_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	global $wp_version;
	if(is_front_page() && version_compare($wp_version, "3.1", '>=')){//fix wordpress 3.1 paged query
		$paged = (get_query_var('paged')) ?intval(get_query_var('paged')) : intval(get_query_var('page'));
	}else{
		$paged = intval(get_query_var('paged'));
	}
	$numposts = $portfolio_query->found_posts;
	$max_page = intval($portfolio_query->max_num_pages);
	
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
				echo '<form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="get">' . "\n";
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