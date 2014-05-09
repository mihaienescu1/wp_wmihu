<?php
function wt_shortcode_divider_top() {
	return '<div class="wt_divider wt_top"><a href="#top" title="Back To Top" rel="nofollow">top &uarr;</a></div>';
}
add_shortcode('wt_divider_top', 'wt_shortcode_divider_top');

function wt_shortcode_divider_line() {
	return '<div class="wt_divider_line"></div>';
}
add_shortcode('wt_divider_line', 'wt_shortcode_divider_line');

function wt_shortcode_divider_padding() {
	return '<div class="wt_divider_padding"></div>';
}
add_shortcode('wt_divider_padding', 'wt_shortcode_divider_padding');

function wt_shortcode_divider_line_padding() {
	return '<div class="wt_divider_line_padding"></div>';
}
add_shortcode('wt_divider_line_padding', 'wt_shortcode_divider_line_padding');

function wt_shortcode_clearboth() {
   return '<div class="clearBoth"></div>';
}
add_shortcode('wt_clear_both', 'wt_shortcode_clearboth');
function wt_shortcode_break_line() {
   return '<br>';
}
add_shortcode('wt_break_line', 'wt_shortcode_break_line');