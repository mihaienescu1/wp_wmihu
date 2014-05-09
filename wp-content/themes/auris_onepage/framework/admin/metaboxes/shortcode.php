<?php
require_once (THEME_FILES . '/shortcodes.php');

$config = array(
	'title' => __('Shortcode Generator','wt_admin'),
	'id' => 'shortcode',
	'pages' => array('page','post','portfolio'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);
$wt_shortcodes = include(THEME_ADMIN_METABOXES . '/shortcode_options.php');
new wt_shortcodes($config,$wt_shortcodes);