<?php wt_theme_generator('wt_footerWrapper',$post->ID);?>

<?php if(wt_get_option('footer','footer_top')):?>
<?php wt_theme_generator('wt_footerTop',$post->ID);?>
        <?php dynamic_sidebar(__('Footer Top Area','wt_admin')); ?>        
	</div> <!-- End inner -->
</footer> <!-- End footerTop -->
<?php endif;?>

<?php if(wt_get_option('footer','footer')):?>
<footer id="wt_footer" class="clearfix">
	<div class="inner clearfix">
<?php
$footer_column = wt_get_option('footer','column');
if(is_numeric($footer_column)):
	switch ( $footer_column ):
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
	for( $i=1; $i<=$footer_column; $i++ ):
		if($i == $footer_column):
?>
			<div class="<?php echo $class; ?> last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php else:?>
			<div class="<?php echo $class; ?>"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php endif;		
	endfor;
else:
	switch($footer_column):
		case 'wt_four_fifth_one_fifth':
?>
		<div class="wt_four_fifth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_one_fifth last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_one_fifth_four_fifth':
?>
		<div class="wt_one_fifth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_four_fifth last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_one_fifth_two_fifth_two_fifth':
?>
		<div class="wt_one_fifth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
        <div class="wt_two_fifth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
        <div class="wt_two_fifth last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_one_fourth_one_fourth_one_half':
?>
		<div class="wt_one_fourth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_one_fourth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_one_half last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_one_fourth_one_half_one_fourth':
?>
		<div class="wt_one_fourth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_one_half"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_one_fourth last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;

		case 'wt_one_fourth_three_fourth':
?>
		<div class="wt_one_fourth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_three_fourth last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_one_half_one_fourth_one_fourth':
?>
		<div class="wt_one_half"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_one_fourth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_one_fourth last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_one_third_two_third':
?>
		<div class="wt_one_third"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
        <div class="wt_two_third last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_three_fifth_two_fifth':
?>
        <div class="wt_one_half"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
        <div class="wt_three_fifth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_two_fifth last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_three_fourth_one_fourth':
?>
        <div class="wt_three_fourth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
        <div class="wt_one_fourth last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_two_fifth_three_fifth':
?>
        <div class="wt_one_half"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
        <div class="wt_two_fifth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_three_fifth last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_two_fifth_two_fifth_one_fifth':
?>
        <div class="wt_two_fifth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
        <div class="wt_two_fifth"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_one_fifth last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
		case 'wt_two_third_one_third':
?>
        <div class="wt_two_third"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
		<div class="wt_one_third last"><?php wt_theme_generator('wt_footer_sidebar'); ?></div>
<?php
			break;
	endswitch;
endif;
?>      
	</div> <!-- End inner -->
</footer> <!-- End footer -->
<?php endif;?>
<?php if(wt_get_option('footer','sub_footer')):?>
<?php wt_theme_generator('wt_footerBottom',$post->ID);?>
    <?php if(!wt_get_option('footer','footer')):?>
    <?php endif;?>  
    	<?php if(wt_get_option('footer','copyright')):?>
            <footer id="copyright" role="foottext">
                <p><?php 
				echo wpml_t(THEME_NAME, 'Copyright Footer Text',stripslashes(wt_get_option('footer','copyright'))); ?></p>
            </footer>
        <?php endif;?>
        <?php dynamic_sidebar(__('Sub Footer Area','wt_admin')); ?>      
	</div> <!-- End inner -->
</footer> <!-- End footerBottom -->
<?php endif;?>
</div> <!-- End footerWrapper -->
</div> <!-- End wt_page -->
</div> <!-- End wrapper -->
<?php
echo "<!-- scripts concatenated and minified via build script -->";
wt_scripts();
echo "<!-- end scripts --> \n";

wt_add_cufon_code_footer();
if(wt_get_option('general','analytics')){
	echo stripslashes(wt_get_option('general','analytics'));
}
?>
<script type="text/javascript"> 
/* <![CDATA[ */
var $buoop = {vs:{i:7,f:3.6,o:10.6,s:4,n:9}} 
$buoop.ol = window.onload; 
window.onload=function(){ 
 try {if ($buoop.ol) $buoop.ol();}catch (e) {} 
 var e = document.createElement("script"); 
 e.setAttribute("type", "text/javascript"); 
 e.setAttribute("src", "http://browser-update.org/update.js"); 
 document.body.appendChild(e); 
} 
/* ]]> */
</script> 
<?php
wp_footer();
?>
</body>
</html>