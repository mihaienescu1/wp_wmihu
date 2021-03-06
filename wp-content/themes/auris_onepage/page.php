<?php
if(is_blog()){
	return require(THEME_DIR . "/template_blog.php");
}
$type = get_post_meta($post->ID, '_intro_type', true);
?>
<?php get_header(); ?>
</div> <!-- End headerWrapper -->
<div class="containerWrapper clearfix">
<?php wt_theme_generator('wt_containerWrapper',$post->ID);?>
<?php wt_theme_generator('wt_custom_header',$post->ID); ?>
<div id="wt_containerWrapp" class="containerWrapper clearfix">
	<div id="wt_container" class="clearfix">
    	<?php wt_theme_generator('wt_content',$post->ID);?>
            <?php  if ($type == 'slideshow' || $type == 'disable' || $type == 'static_image' || $type == 'static_video'){
				wt_theme_generator('wt_breadcrumbs',$post->ID);
			} ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                 <?php the_content(); ?>
            <?php endwhile; else: ?>
            <?php endif; ?>
		</div> <!-- End wt_content -->
	</div> <!-- End wt_container -->
</div> <!-- End containerWrapper -->
</div> <!-- End containerWrapp -->
</div> <!-- End containerWrapperBg -->
<?php get_footer(); ?>