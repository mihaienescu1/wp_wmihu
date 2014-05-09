<?php get_header(); ?>
<?php
if (is_tax()) {
	$layout = wt_get_option('portfolio','layout');
}
else {
	$layout= wt_get_option('blog','layout');
}
?>
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
            <?php //wt_theme_generator('wt_breadcrumbs',$post->ID);?>
            <?php 
				if ( $post->post_type == 'portfolio' ) {
					get_template_part('loop-portfolio','archive');
				}
				else {
					get_template_part('loop','archive');	
				}
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