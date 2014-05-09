<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Modern WP Themes
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function modernwpthemes_page_menu_args( $args ) {
	$args['show_home'] = true;
	$args['menu_class'] = 'clearfix sf-menu';
	return $args;
}
add_filter( 'wp_page_menu_args', 'modernwpthemes_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function modernwpthemes_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'modernwpthemes_body_classes' );

/**
 * Add an "active" class to the first carousel item.
 */
function featured_post_class( $class = '', $post_id = null ) {
	global $featured;
 
	if ( $class ) {
		$class .= ' ';
	}
	if ( $featured->current_post === 0 ) {
		$class .= 'active';
		return post_class( $class, $post_id );
	}
	else {
		return post_class( $class, $post_id );
	}
}

/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function modernwpthemes_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'modernwpthemes_excerpt_length' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and _continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function modernwpthemes_auto_excerpt_more( $more ) {
	return '&hellip;' . modernwpthemes_continue_reading_link();
}
add_filter( 'excerpt_more', 'modernwpthemes_auto_excerpt_more' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function modernwpthemes_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '" class="more-link">' . __( 'Continue Reading <span class="meta-nav">&rarr;</span>', '' ) . '</a>';
}

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function modernwpthemes_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= modernwpthemes_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'modernwpthemes_custom_excerpt_more' );

function modernwpthemes_limit_string($string, $limit) {
	if (strlen($string) < $limit)
		return $string;
	$reg ="/^(.{1," . $limit . "}[^\s]*).*$/s";
	return preg_replace($reg, '\\1', $string);
}

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function modernwpthemes_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}
add_filter( 'attachment_link', 'modernwpthemes_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function modernwpthemes_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'modernwpthemes' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'modernwpthemes_wp_title', 10, 2 );