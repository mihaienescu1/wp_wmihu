<?php 
if(is_blog()){
	return require(THEME_DIR . "/template_blog.php");
} ?>
<?php get_header(); ?>
<?php
$layout = wt_get_option('general','layout');
$slogan = wt_get_option('general','intro_slogan');
$slogan_button_text = wt_get_option('general','intro_button_text');
$slogan_button_link = wt_get_option('general','intro_button_link');
$stype = wt_get_option('general','slideshow_type');
$full_contact = get_post_meta($post->ID, '_enable_fullcontact', true);
?>
</div> <!-- End headerWrapper -->
<?php wt_theme_generator('wt_containerWrapper',$post->ID);?>
<div id="wt_containerWrapp" class="clearfix">
<?php
if ($stype != 'disable') { wt_theme_generator('wt_slideShow',$stype); } ?>
    
    <?php 
    if ( ( $locations = get_nav_menu_locations() ) && $locations['primary-menu'] ) {
        if ( ( $locations = get_nav_menu_locations() ) && $locations['primary-menu'] ) {
			$menu = wp_get_nav_menu_object( $locations['primary-menu'] );
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			$include = array();
			foreach($menu_items as $item) {
				if($item->object == 'page')
					$include[] = $item->object_id;
			}
			query_posts( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
			}
			$i = 1;
			
			
			while (have_posts()) : the_post();
			?>
			<?php if(!wt_is_enabled(get_post_meta($post->ID, '_enable_fullcontact', true))): ?>
            <div class="wt_section_<?php echo $i;?> wt_section_angle">
                <section id="<?php echo $post->post_name;?>" class="wt_section_area">
                    <?php wt_theme_generator('wt_custom_title',$post->ID); ?>
                        <div class="inner">
						<?php the_content(); ?>
                   		</div>
                </section>
                <?php else: ?>
                <div class="wt_section_<?php echo $i;?> wt_section_angle">
                <section id="<?php echo $post->post_name;?>">
                <?php wt_theme_generator('wt_custom_title',$post->ID); ?>
                <div class=" wt_section_contact">
                    <?php echo apply_filters('the_content', get_post_meta($post->ID, '_fullcontact_gmap', true)); ?>
                    <div class="wt_section_contact_inner">
						<?php the_content(); ?>
                    </div>
                </div>
                </section>
			<?php endif; ?>
			<?php
			
			$slogan_text = get_post_meta($post->ID, '_slogan_text', true);
			$slogan_author = get_post_meta($post->ID, '_slogan_author', true);
			$separator = get_post_meta($post->ID, '_slogan_bg', true);
			if($separator != '') : ?>
			<section id="wt_separator_<?php echo $i;?>" class="wt_separator" <?php wt_theme_generator('wt_separator',$post->ID);?>>
            <div class="wt_rotate_wrapper">
                <div class="wt_rotate_left wt_rotate_top"></div>
                <div style="background-color:#ffffff;" class="wt_rotate_left wt_rotate_bottom"></div>
                <div class="wt_rotate_right wt_rotate_top"></div>
                <div style="background-color: rgb(255, 255, 255);" class="wt_rotate_right wt_rotate_bottom"></div>
            </div>
				<?php wt_theme_generator('wt_slogan',$post->ID); ?>
			</section>
                <div class="wt_angle_wrapper">
                    <div class="wt_angle_left wt_angle_top"></div>
                    <div style="background-color:#ffffff;" class="wt_angle_left wt_angle_bottom"></div>
                    <div class="wt_angle_right wt_angle_top"></div>
                    <div style="background-color: rgb(255, 255, 255);" class="wt_angle_right wt_angle_bottom"></div>
                </div>
            </div>
		<?php endif; ?>
		<?php $i++; endwhile; wp_reset_query();
	}
	else { ?>
    <div class="wt_section_area">	
        <div class="inner">
				<?php
				
				get_template_part( 'loop','blog');
				 if (function_exists("wt_pagination")) {
					wt_pagination();
                } ?>
        </div>
    </div>
	<?php }
	?>
<?php if(!get_post_meta($post->ID, '_enable_fullcontact', true)): ?>
</div> <!-- End containerWrapper -->
</div> <!-- End containerWrapp -->
<?php endif; ?>
<?php get_footer(); ?>