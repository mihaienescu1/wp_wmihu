<?php
function wt_shortcode_column($atts, $content = null, $code) {
	return '<div class="'.$code.'">' . do_shortcode(trim($content)) . '</div>';
}
function wt_shortcode_column_last($atts, $content = null, $code) {
	return '<div class="'.str_replace('_last','',$code).' last">' . do_shortcode(trim($content)) . '</div><div class="clearBoth"></div>';
}

add_shortcode('wt_one_half', 'wt_shortcode_column');
add_shortcode('wt_one_third', 'wt_shortcode_column');
add_shortcode('wt_one_fourth', 'wt_shortcode_column');
add_shortcode('wt_one_fifth', 'wt_shortcode_column');
add_shortcode('wt_one_sixth', 'wt_shortcode_column');

add_shortcode('wt_two_third', 'wt_shortcode_column');
add_shortcode('wt_three_fourth', 'wt_shortcode_column');
add_shortcode('wt_two_fifth', 'wt_shortcode_column');
add_shortcode('wt_three_fifth', 'wt_shortcode_column');
add_shortcode('wt_four_fifth', 'wt_shortcode_column');
add_shortcode('wt_five_sixth', 'wt_shortcode_column');

add_shortcode('wt_one_half_last', 'wt_shortcode_column_last');
add_shortcode('wt_one_third_last', 'wt_shortcode_column_last');
add_shortcode('wt_one_fourth_last', 'wt_shortcode_column_last');
add_shortcode('wt_one_fifth_last', 'wt_shortcode_column_last');
add_shortcode('wt_one_sixth_last', 'wt_shortcode_column_last');

add_shortcode('wt_two_third_last', 'wt_shortcode_column_last');
add_shortcode('wt_three_fourth_last', 'wt_shortcode_column_last');
add_shortcode('wt_two_fifth_last', 'wt_shortcode_column_last');
add_shortcode('wt_three_fifth_last', 'wt_shortcode_column_last');
add_shortcode('wt_four_fifth_last', 'wt_shortcode_column_last');
add_shortcode('wt_five_sixth_last', 'wt_shortcode_column_last');