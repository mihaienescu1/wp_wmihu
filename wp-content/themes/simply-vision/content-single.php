<?php
/**
 * @package Modern WP Themes
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
	<header class="entry-header">
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"> <?php comments_popup_link( __( '0', 'modernwpthemes' ), __( '1', 'modernwpthemes' ), __( '%', 'modernwpthemes' ) ); ?></span>
		<?php endif; ?>

		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php modernwpthemes_posted_on(); ?>
		<!-- .entry-meta --></div>
	<!-- .entry-header --></header>

	<div class="clearfix entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'modernwpthemes' ),
				'after'  => '</div>',
			) );
		?>
	<!-- .entry-content --></div>

	<footer class="entry-meta entry-footer">
		<?php if ( 'post' == get_post_type() ) : ?>
			<?php
				$categories_list = get_the_category_list( __( ', ', 'modernwpthemes' ) );
				if ( $categories_list ) :
			?>
			<span class="cat-links">
				<?php printf( __( '<i class="fa-folder-open"></i> %1$s', 'modernwpthemes' ), $categories_list ); ?>
			</span>
			<?php endif; ?>

			<?php
				$tags_list = get_the_tag_list( '', __( ', ', 'modernwpthemes' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( '<i class="fa-tags"></i> %1$s', 'modernwpthemes' ), $tags_list ); ?>
			</span>
            
            
			<?php endif; ?>
		<?php endif; ?>
	<!-- .entry-meta --></footer>
<!-- #post-<?php the_ID(); ?> --></article>
