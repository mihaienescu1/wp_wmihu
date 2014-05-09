<?php get_header(); ?>
</div> <!-- End headerWrapper -->
<div class="containerWrapper clearfix">
<?php wt_theme_generator('wt_containerWrapper',$post->ID);?>
<?php wt_theme_generator('wt_custom_header',$post->ID); ?>
<div id="wt_containerWrapp" class="clearfix">
	<div id="wt_container" class="clearfix">
    	<?php wt_theme_generator('wt_content',$post->ID);?>
               <div class="wt_one_half">
               <h2><?php _e('Perhaps this will help','wt_front');?></h2>
            	<ol>
                	<li><?php _e('Double check the web address for typos.','wt_front');?></li>
                	<li><?php _e('Head back to our home page via the main navigation.','wt_front');?></li>
                    <li><?php _e('Try using the serch box or our sitemap below.','wt_front');?></li>
                </ol>
				   <?php get_search_form(); ?>
                  <div class="error_page">
                      <a href="" target="_self" class="wt_button small"><span>Back to Home</span></a>
                  </div>

                 </div>
               <div class="wt_one_half last centered">
              <?php $skin = wt_get_option('general', 'skin');
				switch($skin){	
					case 'orange':
						wp_enqueue_style('theme-orange', THEME_CSS.'/skins/orange.css', false, false, 'all');
						break;
					case 'pink':
						wp_enqueue_style('theme-pink', THEME_CSS.'/skins/pink.css', false, false, 'all');
						break;
					case 'green':
						wp_enqueue_style('theme-green', THEME_CSS.'/skins/green.css', false, false, 'all');
						break;	
					case 'blue':
						wp_enqueue_style('theme-blue', THEME_CSS.'/skins/blue.css', false, false, 'all');
						break;		
					case 'red':
						wp_enqueue_style('theme-red', THEME_CSS.'/skins/red.css', false, false, 'all');
						break;
					case 'cyan':
						wp_enqueue_style('theme-cyan', THEME_CSS.'/skins/cyan.css', false, false, 'all');
						break;		
					case 'brown':
						wp_enqueue_style('theme-brown', THEME_CSS.'/skins/brown.css', false, false, 'all');
						break;	
					case 'black':
						wp_enqueue_style('theme-black', THEME_CSS.'/skins/black.css', false, false, 'all');
						break;
					case 'magenta':
						wp_enqueue_style('theme-magenta', THEME_CSS.'/skins/magenta.css', false, false, 'all');
						break;	
					case 'grey':
						wp_enqueue_style('theme-grey', THEME_CSS.'/skins/grey.css', false, false, 'all');
						break;	
				} ?>
                   <img src="<?php echo get_template_directory_uri(); ?>/css/skins/<?php echo $skin; ?>/404.png" alt="" />
               </div>
		</div> <!-- End wt_content -->
	</div> <!-- End wt_container -->
</div> <!-- End containerWrapper -->
</div> <!-- End containerWrapp -->
</div> <!-- End containerWrapperBg -->
<?php get_footer(); ?>