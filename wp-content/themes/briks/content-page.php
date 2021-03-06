<?php
/*
*
* The template used for displaying page content in page.php
*
* @package bricks
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="post">
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php 
	   	    $url='';
	        if(has_post_thumbnail()):?>
	            <?php $url = wp_get_attachment_url( get_post_thumbnail_id()); ?>
	            <a href="<?php the_permalink(); ?>"><img src="<?php echo $url;?>" class="img-responsive img-thumbnail"></a>
	        <?php endif;?>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'bricks' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
