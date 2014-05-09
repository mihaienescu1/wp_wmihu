<?php 
$type = get_post_meta($post->ID, '_intro_type', true);
get_header(); ?>
</div> <!-- End headerWrapper -->
<div class="containerWrapper clearfix">
<?php wt_theme_generator('wt_containerWrapper',$post->ID);?>
<?php wt_theme_generator('wt_custom_header',$post->ID); ?>
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
				$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$s = get_query_var('s');
				query_posts("s=$s&paged=$page&cat=");
				
				get_template_part( 'loop','search');
			?>
            <?php if (function_exists("wt_pagination")) {
				wt_pagination();
			} ?>
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