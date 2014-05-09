<?php
wt_setPostViews(get_the_ID());
$blog_page = wt_get_option('blog','blog_page');
if($blog_page == $post->ID){
	return require(THEME_DIR . "/template_blog.php");
}
$featured_image_type = wt_get_option('blog', 'single_featured_image_type');
$type = get_post_meta($post->ID, '_intro_type', true);
?>
<?php get_header(); ?>
</div> <!-- End headerWrapper -->
<?php wt_theme_generator('wt_containerWrapper',$post->ID);?>
<?php //wt_theme_generator('wt_custom_header',$post->ID); ?>
<div id="wt_containerWrapp">
	<div id="wt_container" class="clearfix">
    	<?php wt_theme_generator('wt_content',$post->ID);?>
            <?php if($layout != 'full') {
            	echo '<div id="wt_main" role="main">'; 
            	echo '<div id="wt_mainInner">';
			}?>
            	<article id="post-<?php the_ID(); ?>" class="blogEntry">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <h2><?php the_title(); ?></h2>
                 <footer class="blogEntry_metadata">
                <?php if (wt_get_option('blog','single_meta_date')){
                } ?>
					<?php echo wt_theme_generator('wt_blog_single_meta'); ?>
                </footer>
                <?php 
                if(wt_is_enabled(get_post_meta($post->ID, '_featured_image', true), wt_get_option('blog','featured_image'))){ ?>
                <header class="entry_<?php echo $featured_image_type;?>">
                <?php
        		$thumbnail_type = get_post_meta($post->ID, '_thumbnail_type', true);
					switch($thumbnail_type){					
						case "timage" : 
							echo wt_theme_generator('wt_blog_featured_image',$featured_image_type,$layout);
							break;
						case "tvideo" : 
							$video_link = get_post_meta($post->ID, '_featured_video', true);
							echo '<div class="blog-thumbnail-video">';
							echo wt_video_featured($video_link,$featured_image_type,$layout);
							echo '</div>';							
							break;
						case "tplayer" : 
							$player_link = get_post_meta($post->ID,'_thumbnail_player', true);
							echo '<div class="blog-thumbnail-player">';
							echo wt_media_player($featured_image_type,$layout,$player_link);
							echo '</div>';							
							break;
						case "tslide" : 
							echo '<div class="blog-thumbnail-slide">';
							echo wt_get_slide($featured_image_type,$layout);
							echo '</div>';							
							break;
					}
				?> </header> <?php	
				}				
			    ?>
                
				<?php wt_theme_generator('wt_breadcrumbs',$post->ID); ?>
				<?php the_content(); ?>
					<?php edit_post_link(__('Edit', 'wt_front'),'<p class="entry_edit">','</p>'); ?>
                    <?php if(wt_get_option('blog','author') || wt_get_option('blog','related_popular')):?><footer><?php endif; ?>
						<?php if(wt_get_option('blog','author')):wt_generator('wt_blog_author_info');endif;?>
                        <?php if(wt_get_option('blog','related_popular')):?>
                        <section class="wt_tabs_wrap relatedPopularPosts">
                        <ul class="wt_tabs"> 
                            <li><a href="#tab1" class="current"><?php _e('Related Posts','wt_front') ?></a></li>
                            <li><a href="#tab2"><?php _e('Popular Posts','wt_front') ?></a></li>             
                        </ul>
                        <div class="panes blogPosts">
                            <div class="pane" style="display:block">
                                <?php wt_theme_generator('wt_blog_related_posts');?>
                                <div class="clearBoth"></div>
                            </div>
                            <div class="pane">
                                <?php wt_theme_generator('wt_blog_popular_posts');?>
                                <div class="clearBoth"></div>
                            </div>
                        </div>
                        </section>
                        <?php endif;?>                    
                    <?php if(wt_get_option('blog','author') || wt_get_option('blog','related_popular')):?></footer><?php endif; ?>
					<?php if(wt_get_option('blog','entry_navigation')):?>
					<div class="entry_navigation">
						<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'wt_front' ) . '</span> %title', true ); ?></div>
						<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'wt_front' ) . '</span>', true ); ?></div>
					</div>
					<?php endif;?>
				<?php comments_template( '', true ); ?>
                <?php //comment_form(); ?>
                <?php endwhile; // end of the loop.?>
                </article> <!-- End blogEntry -->
            
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
<?php get_footer(); ?>
