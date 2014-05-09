<!DOCTYPE html>
<?php 
if(wt_get_option('general','enable_responsive')){ 
	$responsive = 'responsive ';
} else {
	$responsive = '';
}
?>
<!--[if lt IE 7]> <html class="<?php echo $responsive; ?>no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="<?php echo $responsive; ?>no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="<?php echo $responsive; ?>no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<html class="<?php echo $responsive; ?>no-js" <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php wt_theme_generator('wt_title'); ?></title>
<?php if(wt_get_option('general','enable_responsive')){ ?>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
<?php } ?>
<?php 
if($favicon = wt_get_option('general','favicon')) { ?>
<link rel="shortcut icon" href="<?php echo wt_get_image_src($favicon); ?>" />
<?php } 
if($favicon_57 = wt_get_option('general','favicon_57')) { ?>
<link rel="apple-touch-icon" href="<?php echo wt_get_image_src($favicon_57); ?>" />
<?php } 
if($favicon_72 = wt_get_option('general','favicon_72')) { ?>
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo wt_get_image_src($favicon_72); ?>" />
<?php } 
if($favicon_114 = wt_get_option('general','favicon_114')) { ?>
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo wt_get_image_src($favicon_114); ?>" />
<?php } 
if($favicon_144 = wt_get_option('general','favicon_144')) { ?>
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo wt_get_image_src($favicon_144); ?>" />
<?php } ?>
<script type="text/javascript">
/* <![CDATA[ */
var theme_uri="<?php echo THEME_URI;?>";
/* ]]> */
</script>
 <script type="text/javascript">
    function modalWin() {
    if (window.showModalDialog) {
    window.showModalDialog("http://javascript.about.com/library/xpopupex.htm","name","dialogWidth:255px;dialogHeight:250px");
    } else {
    window.open('http://javascript.about.com/library/xpopupex.htm','name','height=255,width=250,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,modal=yes');
    }
    }
    </script>
<?php wp_head(); ?>
</head>
<?php
if (is_blog()){
global $blog_page_id;
global $post;
$blog_page_id = wt_get_option('blog','blog_page');
$post->ID = get_object_id($blog_page_id,'page');
}
/* Site Alignement  */
if (get_post_meta($post->ID, '_site_alignment', true)) {
	$alignment = get_post_meta($post->ID, '_site_alignment', true);	
}	
else {
	$alignment = wt_get_option('general', 'site_alignment');
}

/* Sidebar Alignement  */
require_once (THEME_FILES . '/layout.php');

$type = get_post_meta($post->ID, '_intro_type', true);
$stickyHeader = wt_get_option('general', 'sticky_header');
$hideLogo = wt_get_option('general', 'disable_logo');
$niceScroll = wt_get_option('general', 'nice_scroll');
$responsiveNav = wt_get_option('general', 'responsive_nav');
$stype = wt_get_option('general','slideshow_type');
$bg = wt_check_input(get_post_meta($post->ID, '_page_bg', true));
$bg_position = get_post_meta($post->ID, '_page_position_x', true);
$bg_repeat = get_post_meta($post->ID, '_page_repeat', true);

$color = get_post_meta($post->ID, '_page_bg_color', true);
if(!empty($color) && $color != "transparent"){
	$color = 'background-color:'.$color.';';
}else{
	$color = '';
}
if(!empty($bg)){
	$bg = 'background-image:url('.$bg.');background-position:top '.$bg_position.';background-repeat:'.$bg_repeat.'';
}else{
	$bg = '';
}
if ($niceScroll) {
	wp_enqueue_script('nice-scroll');
}
?>
<body <?php if($alignment=='right'):?>id="right_alignment"<?php endif;?><?php if($alignment=='left'):?>id="left_alignment" <?php endif;?><?php body_class(); ?>  <?php if(!empty($color) || !empty($bg)){echo' style="'.$color.''.$bg.'"';} ?> <?php if($niceScroll):?> data-nice-scrolling="1"<?php endif; ?>>
<?php 
if(wt_get_option('fonts','enable_cufon')){
	wt_add_cufon_code();
} ?>
<?php if ( is_front_page() ):?>
<!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div id="wt_wrapper" class="<?php if($layout=='right'):?>withSidebar rightSidebar <?php endif;?><?php if($layout=='left'):?>withSidebar leftSidebar <?php endif;?><?php if($layout=='full'):?>fullWidth <?php endif; ?><?php if (!(is_page() || is_archive() || is_single() || is_blog() || $stype == 'disable')):?> wt_affix <?php endif; ?><?php if((is_page() || is_archive() || is_single() || is_blog() || $stype == 'disable') && $stickyHeader):?>stickyHeader <?php endif;?>clearfix">
<?php else:?>
<div id="wt_wrapper" class="<?php if($layout=='right'):?>withSidebar rightSidebar <?php endif;?><?php if($layout=='left'):?>withSidebar leftSidebar <?php endif;?><?php if($layout=='full'):?>fullWidth <?php endif; ?><?php if (!(is_page() || is_single() || is_archive() || is_blog() || $stype == 'disable')):?> wt_affix <?php endif; ?><?php if((is_page() || is_single() || is_archive() || is_blog() || $stype == 'disable') && $stickyHeader):?>stickyHeader <?php endif;?>clearfix">
<?php endif; ?>	
<div id="wt_page" class="<?php if(wt_get_option('general','layout_style')== 'wt_boxed'){echo 'wt_boxed';} else {echo 'wt_wide';} ?>">

<?php if(wt_get_option('top_widget','top_widget')):?>
<div id="wt_topWidgetWrapper">
	<header id="wt_topWidget" class="clearfix">
    	<div class="inner clearfix">
<?php
$top_widget_column = wt_get_option('top_widget','widget_column');
if(is_numeric($top_widget_column)):
	switch ( $top_widget_column ):
		case 1:
			$class = '';
			break;
		case 2:
			$class = 'wt_one_half';
			break;
		case 3:
			$class = 'wt_one_third';
			break;
		case 4:
			$class = 'wt_one_fourth';
			break;
		case 5:
			$class = 'wt_one_fifth';
			break;
	endswitch;
	for( $i=1; $i<=$top_widget_column; $i++ ):
		if($i == $top_widget_column):
?>
			<div class="<?php echo $class; ?> last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php else:?>
			<div class="<?php echo $class; ?>"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php endif;		
	endfor;
else:
	switch($top_widget_column):
		case 'wt_four_fifth_one_fifth':
?>
		<div class="wt_four_fifth"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_one_fifth last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_one_fifth_four_fifth':
?>
		<div class="wt_one_fifth"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_four_fifth last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_one_fifth_two_fifth_two_fifth':
?>
		<div class="wt_one_fifth"><?php wt_theme_generator('wt_top_widget'); ?></div>
        <div class="wt_two_fifth"><?php wt_theme_generator('wt_top_widget'); ?></div>
        <div class="wt_two_fifth last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_one_fourth_one_fourth_one_half':
?>
		<div class="wt_one_fourth"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_one_fourth"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_one_half last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_one_fourth_one_half_one_fourth':
?>
		<div class="wt_one_fourth"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_one_half"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_one_fourth last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;

		case 'wt_one_fourth_three_fourth':
?>
		<div class="wt_one_fourth"><?php wt_theme_generator('twt_op_widget'); ?></div>
		<div class="wt_three_fourth last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_one_half_one_fourth_one_fourth':
?>
		<div class="wt_one_half"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_one_fourth"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_one_fourth last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_one_third_two_third':
?>
		<div class="wt_one_third"><?php wt_theme_generator('wt_top_widget'); ?></div>
        <div class="wt_two_third last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_three_fifth_two_fifth':
?>
        <div class="wt_one_half"><?php wt_theme_generator('wt_top_widget'); ?></div>
        <div class="wt_three_fifth"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_two_fifth last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_three_fourth_one_fourth':
?>
        <div class="wt_three_fourth"><?php wt_theme_generator('wt_top_widget'); ?></div>
        <div class="wt_one_fourth last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_two_fifth_three_fifth':
?>
        <div class="wt_one_half"><?php wt_theme_generator('wt_top_widget'); ?></div>
        <div class="wt_two_fifth"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_three_fifth last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_two_fifth_two_fifth_one_fifth':
?>
        <div class="wt_two_fifth"><?php wt_theme_generator('wt_top_widget'); ?></div>
        <div class="wt_two_fifth"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_one_fifth last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
		case 'wt_two_third_one_third':
?>
        <div class="wt_two_third"><?php wt_theme_generator('wt_top_widget'); ?></div>
		<div class="wt_one_third last"><?php wt_theme_generator('wt_top_widget'); ?></div>
<?php
			break;
	endswitch;
endif;
?>
        </div>
    </header>
</div>
<?php endif;?>

<?php wt_theme_generator('wt_headerWrapper',$post->ID);?>
<?php if (!(is_page() || is_single() || is_archive() || is_blog() || $stype == 'disable')):?>
    <header id="wt_header" role="banner" class="<?php if($responsiveNav != 'drop_down'){echo 'responsive_nav';} else {echo 'drop_down_nav';} ?> <?php if($stickyHeader):?> affix-top<?php endif;?> clearfix">
<?php else: ?>
<header id="wt_header" role="banner" class="<?php if($responsiveNav != 'drop_down'){echo 'responsive_nav';} else {echo 'drop_down_nav';} ?> not-affix clearfix">
<?php endif;?>
    	<div class="inner clearfix">
            <?php if(!wt_get_option('general','display_logo') && $custom_logo = wt_get_option('general','logo')): 
?>
            <div id="logo"<?php if($hideLogo==true):?> class="hide_logo"<?php endif;?>>
			<a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo $custom_logo; ?>" /></a>
            </div>
            <?php else:?>
                <div id="logo_text"<?php if($hideLogo==true):?> class="hide_logo"<?php endif;?>>
                	<a href="<?php echo home_url( '/' ); ?>"><?php echo wt_get_option('general','plain_logo'); ?></a>
            <?php if(wt_get_option('general','display_site_desc')){
                    $site_desc = get_bloginfo( 'description' );
                    if(!empty($site_desc)):?>
                    <div id="siteDescription"><?php bloginfo( 'description' ); ?></div>
            <?php endif;}?>
                </div>
            <?php endif; ?>   
            <div id="headerWidget"> <?php dynamic_sidebar(__('Header Area','wt_admin')); ?> </div> 
            <?php  		
			if ( $responsiveNav == 'drop_down' ) { 
		    	wp_enqueue_script('mobileMenu');
		    }			
			?> 
			<!-- Navigation -->
            <?php wt_theme_generator('wt_nav',$post->ID);?>      
			<?php  if ( has_nav_menu( 'primary-menu' ) ) {
                wt_theme_generator('wt_menu');
            } else {
            echo '<ul class="menu">';
                $short_walker = new My_Page_Walker; wp_list_pages(array( 'walker' => $short_walker,'link_before' => '<span>','link_after' => '</span>','title_li' => '' ));
            echo '</ul>';
            }
			?>
			</nav> 
		</div> 	   <?php do_action('icl_language_selector'); ?> 
	</header> <!-- End header --> <?php echo "\n"; ?> 