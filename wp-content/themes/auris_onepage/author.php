<?php get_header(); ?>
<?php wt_theme_generator('wt_custom_header',$post->ID); ?>
</div> <!-- End headerWrapper -->
<div class="containerWrapper clearfix">
<?php wt_theme_generator('wt_containerWrapper',$post->ID);?>
<div id="wt_containerWrapp" class="clearfix">
	<div id="wt_container" class="clearfix">
    	<?php wt_theme_generator('wt_content',$post->ID);?>
            <?php if($layout != 'full') {
            	echo '<div id="wt_main" role="main">'; 
            	echo '<div id="wt_mainInner">';
			}?>     
            <?php  if ($type == 'slideshow' || $type == 'disable' || $type == 'static_image' || $type == 'static_video'){
				wt_theme_generator('wt_breadcrumbs',$post->ID);
			} ?>     
			<?php
                if ( have_posts() )
                        the_post();
            ?>
            <?php wt_theme_generator('blog_author_info'); ?>
            <?php
			rewind_posts();
			get_template_part('loop','author');
?>
			<?php if($layout != 'full') {
           		echo '</div> <!-- End wt_mainInner -->'; 
           		echo '</div> <!-- End wt_main -->'; 
			}?>
            
            <?php if($layout != 'full') {
            	echo '<aside id="wt_sidebar">';
				get_sidebar(); 
           		echo '</aside> <!-- End wt_sidebar -->'; 
			}?>
		</div> <!-- End wt_content -->
	</div> <!-- End wt_container -->
</div> <!-- End containerWrapper -->
</div> <!-- End containerWrapp -->
</div> <!-- End containerWrapperBg -->
<?php get_footer(); ?>