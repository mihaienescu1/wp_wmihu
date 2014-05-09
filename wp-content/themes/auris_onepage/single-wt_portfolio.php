<?php
wt_setPostViews(get_the_ID());
$blog_page = wt_get_option('blog','blog_page');
if($blog_page == $post->ID){
	return require(THEME_DIR . "/template_blog.php");
}
$layout= wt_get_option('portfolio','layout');
$client = get_post_meta($post->ID, '_client', true);	
$terms = get_the_terms(get_the_ID(), 'wt_portfolio_category');
?>
<?php get_header(); ?>
</div> <!-- End headerWrapper -->
<?php wt_theme_generator('wt_containerWrapper',$post->ID);?>
<div id="wt_containerWrapp" class="clearfix">
	<div id="wt_container" class="clearfix">
    	<?php wt_theme_generator('wt_content',$post->ID);?>
        <?php if($layout != 'full') {
            echo '<div id="wt_main" role="main">'; 
            echo '<div id="wt_mainInner">'; 
		}?>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="portEntry">
        <?php if($layout == 'full') {
            echo '<div class="wt_styled_image alignleft">';
		} ?>
            <?php if(wt_get_option('portfolio','featured_image')):?>
                <?php wt_theme_generator('wt_portfolio_featured_image'); ?>
            <?php endif; ?>
          <?php if($layout == 'full') {
            echo '</div>';
		} ?>           
            <h2><?php the_title(); ?></h2>
            <div class="portfolio_info">
            <?php if(!empty($client)): ?>
                <div class="wt_client"><span class="wt_styled_color">Client:</span> <?php echo $client; ?></div>	
			<?php endif; ?>
                <div class="wt_date"><span class="wt_styled_color">Date:</span> <?php echo get_the_time('d M Y'); ?></div>	
                <div class="wt_cat"><span class="wt_styled_color">Category:</span> 
                <?php foreach($terms as $term) {
                    echo($term->name);
                } ?>
                </div>	
            </div>
			<?php //wt_theme_generator('wt_breadcrumbs',$post->ID); ?>
            <?php the_content(); ?>
            <a class="button_yellow_small" href="#">Visit website</a>
            
            <?php if(wt_get_option('portfolio','single_navigation')):?>
                <div class="entry_navigation">
                    <div class="nav-previous">
						<?php wt_previous_post_link_plus(); ?>
                    </div>
                    <div class="nav-next">
						<?php wt_next_post_link_plus(); ?>
                    </div>
                </div>
    <?php endif; ?>  
        </article>     
                
		
		<?php if($layout != 'full') {
           	echo '</div> <!-- End wt_mainInner -->'; 
           	echo '</div> <!-- End wt_main -->'; 
		}?>
        
		<?php if($layout != 'full') {
            echo '<aside id="wt_sidebar">';
            get_sidebar(); 
            echo '</aside> <!-- End wt_sidebar -->'; 
        }?>
        <div class="portfolio_related_posts clearfix">
			<?php wt_theme_generator('wt_portfolio_related_posts');?>
        </div>
        <?php if(wt_get_option('portfolio','enable_comment')) comments_template( '', true ); ?>
        <?php endwhile; // end of the loop.?>

		</div> <!-- End wt_content -->
	</div> <!-- End wt_container -->
</div> <!-- End containerWrapper -->
</div> <!-- End containerWrapp -->
<?php get_footer(); ?>