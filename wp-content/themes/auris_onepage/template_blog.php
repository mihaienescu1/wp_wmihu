<?php get_header(); ?>
<?php
global $blog_page_id;
$blog_page_id = wt_get_option('blog','blog_page');
$post->ID = get_object_id($blog_page_id,'page');
?>
</div> <!-- End headerWrapper -->
<div class="containerWrapper clearfix">
<?php wt_theme_generator('wt_containerWrapper',$post->ID);?>
<?php wt_theme_generator('wt_custom_header',$post->ID); ?>
<div id="wt_containerWrapp">
	<div id="wt_container" class="clearfix">
    	<?php wt_theme_generator('wt_content',$post->ID);?>
            <?php if($layout != 'full') {
           		echo '<div id="wt_main" role="main">'; 
           		echo '<div id="wt_mainInner">';
			}?>
				<?php 
					$exclude_cats = wt_get_option('blog','exclude_categorys');
					if(is_array($exclude_cats)){
						foreach ($exclude_cats as $key => $value) {
							$exclude_cats[$key] = -$value;
						}
						$query_string = "cat=".implode(",",$exclude_cats)."&paged=$paged";
					}
					query_posts($query_string);
					get_template_part( 'loop','blog');
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