<?php
function wt_shortcode_sitemap($atts, $content = null, $code) {
	if(isset($atts['type'])){
		switch($atts['type']){
			case 'pages':
				return sitemap_pages($atts);
			case 'posts':
				return sitemap_posts($atts);
			case 'categories':
				return sitemap_categories($atts);
			case 'portfolios':
				return sitemap_portfolios($atts);
			case 'all':
			default:
				return sitemap_all($atts);			
		}
	}
	return '';
}

add_shortcode('wt_sitemap', 'wt_shortcode_sitemap');

function sitemap_pages($atts){
	extract(shortcode_atts(array(
		'number' => '0',
		'depth' => '0',
	), $atts));	
	return '<ul class="wt_list_4 wt_no_icon">'.wp_list_pages('depth=0&sort_column=menu_order&echo=0&title_li=&depth='.$depth.'&number='.$number ).'</ul>';
}

function sitemap_posts($atts){
	extract(shortcode_atts(array(
		'show_comment' => true,
		'number' => '0',
		'cat' => '',
		'posts' => '',
	), $atts));
	
	if($number == 0){
		$number = 1000;
	}
	if($show_comment === 'false'){
		$show_comment = false;
	}
	$query = array(
		'showposts' => (int)$number,
		'post_type'=>'post',
	);
	if($cat){
		$query['cat'] = $cat;
	}
	if($posts){
		$query['post__in'] = explode(',',$posts);
	}
	
	$archive_query = new WP_Query( $query );
	
	$output = '';
	while ($archive_query->have_posts()) : $archive_query->the_post();
		$output .= '<li><a href="'.get_permalink().'" rel="bookmark" title="'.sprintf( __("Permanent Link to %s", 'wt_front'), get_the_title() ).'">'. get_the_title().'</a>';
		//$sh_comment = $show_comment?' ('.get_comments_number().')':'';
		
		
		 $sh_comment = get_comments_number();
		 if ( $show_comment==true ){
			  if($sh_comment == 0){
				  $comments =  ' ('.__('No Comments').')';
			  }
			  elseif($sh_comment > 1){
				  $comments = '  ('.$sh_comment. __(' Comments', 'wt_front').')';
			  }
			  else{
				   $comments ="  (1 Comment)";
			  }
		$output .= ''.$comments.'</li>';
		 }		
		
	endwhile;
	return '<ul class="wt_list_4 wt_no_icon">'.$output.'</ul>';
}

function sitemap_categories($atts){
	extract(shortcode_atts(array(
		'number' => '0',
		'depth' => '0',
		'show_count' => true,
		'show_feed' => true,
	), $atts));
	
	if($show_count === 'false'){
		$show_count = false;
	}
	if($show_feed === true || $show_feed == 'true'){
		$feed = __( 'RSS', 'wt_front' );
	}else{
		$feed = '';
	}
	$exclude_cats = array(wt_get_option('blog','exclude_categorys'));
	return '<ul class="list_4 wt_no_icon">'.wp_list_categories( array( 'exclude'=> implode(",",$exclude_cats), 'feed' => $feed, 'show_count' => $show_count, 'use_desc_for_title' => false, 'title_li' => false, 'echo' => 0 ) ).'</ul>';
}

function sitemap_portfolios($atts){
	extract(shortcode_atts(array(
		'show_comment' => false,
		'number' => '0',
		'cat' => '',
	), $atts));
	
	if($number == 0){
		$number = 1000;
	}
	
	if($show_comment === 'true' && wt_get_option('portfolio','enable_comment')){
		$show_comment = true;
	}
	
	$query = array(
		'showposts' => (int)$number,
		'post_type'=>'portfolio',
		
	);
	if($cat){
		$query['taxonomy'] = 'portfolio_category';
		$query['term'] = $cat;
	}
		
	query_posts( $query );
	
	$output = '';
	while (have_posts()) : the_post();
		$output .= '<li><a href="'.get_permalink().'" rel="bookmark" title="'.sprintf( __("Permanent Link to %s", 'wt_front'), get_the_title() ).'">'. get_the_title().'</a>'.($show_comment?' ('.get_comments_number().')':'').'</li>';
	endwhile;
	wp_reset_query();
	return '<ul class="wt_list_4 wt_no_icon">'.$output.'</ul>';
	
}

function sitemap_all($atts){
	extract(shortcode_atts(array(
		'number' => '0',
		'shows' => 'pages,categories,posts,portfolios',
	), $atts));
	
	$shows = explode(',', $shows);
	if(empty($shows)){
		return '';
	}
	
	$output = '';
	
	if(in_array('pages',$shows)){
		$output .= '<h2>'.__('Pages','wt_front').'</h2>';
		$output .= sitemap_pages($atts);
		$output .= '<p class="wt_top"><a href="#top">'.__('top &uarr;','wt_front').'</a></p> ';
	}
	if(in_array('categories',$shows)){
		$output .= '<h2>'.__('Category Archives','wt_front').'</h2>';
		$output .= sitemap_categories($atts);
		$output .= '<p class="wt_top"><a href="#top">'.__('top &uarr;','wt_front').'</a></p> ';
	}
	if(in_array('posts',$shows)){
		$output .= '<h2>'.__('Blog Posts','wt_front').'</h2>';
		$output .= sitemap_posts($atts);
		$output .= '<p class="wt_top"><a href="#top">'.__('top &uarr;','wt_front').'</a></p> ';
	}
	if(in_array('portfolios',$shows)){
		$output .= '<h2>'.__('Portfolios','wt_front').'</h2>';
		$output .= sitemap_portfolios($atts);
		$output .= '<p class="wt_top"><a href="#top">'.__('top &uarr;','wt_front').'</a></p> ';
	}
	
	return $output;

}