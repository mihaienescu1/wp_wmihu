<!DOCTYPE html> 
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title(''); ?></title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-49987511-1', 'auto');
ga('send', 'pageview');

</script>
<!-- Facebook Conversion Code for mihu -->
<script type="text/javascript">
var fb_param = {};
fb_param.pixel_id = '6013138921322';
fb_param.value = '0.00';
fb_param.currency = 'RON';
(function(){
  var fpw = document.createElement('script');
  fpw.async = true;
  fpw.src = '//connect.facebook.net/en_US/fp.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(fpw, ref);
})();
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6013138921322&amp;value=0&amp;currency=RON" /></noscript>
<!-- End Google Analytics -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="header">
	
		<?php if (has_nav_menu('topbar')): ?>
			<nav class="nav-container group" id="nav-topbar">
				<div class="nav-toggle"><i class="fa fa-bars"></i></div>
				<div class="nav-text"><!-- put your mobile menu text here --></div>
				<div class="nav-wrap container"><?php wp_nav_menu(array('theme_location'=>'topbar','menu_class'=>'nav container-inner group','container'=>'','menu_id' => '','fallback_cb'=> false)); ?></div>
				
				<div class="container">
					<div class="container-inner">		
						<div class="toggle-search"><i class="fa fa-search"></i></div>
						<div class="search-expand">
							<div class="search-expand-inner">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div><!--/.container-inner-->
				</div><!--/.container-->
				
			</nav><!--/#nav-topbar-->
		<?php endif; ?>
		
		<div class="container group">
			<div class="container-inner">
				
				<div class="group pad">
					<?php echo alx_site_title(); ?>
					<?php if ( ot_get_option('site-description') != 'off' ): ?><p class="site-description"><?php bloginfo( 'description' ); ?></p><?php endif; ?>
				</div>
				
				<?php if (has_nav_menu('header')): ?>
					<nav class="nav-container group" id="nav-header">
						<div class="nav-toggle"><i class="fa fa-bars"></i></div>
						<div class="nav-text"><!-- put your mobile menu text here --></div>
						<div class="nav-wrap container"><?php wp_nav_menu(array('theme_location'=>'header','menu_class'=>'nav container-inner group','container'=>'','menu_id' => '','fallback_cb'=> false)); ?></div>
					</nav><!--/#nav-header-->
				<?php endif; ?>
				
			</div><!--/.container-inner-->
		</div><!--/.container-->
		
	</header><!--/#header-->
	
	<div class="container" id="page">
		<div class="container-inner">
			<div class="main">
				<div class="main-inner group">