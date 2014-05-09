<?php
/**
 * Theme Variables (loaded before any class or functions)
 * 
 * @package Imprint
 * @subpackage Core
 * @category Setup
 * @since Imprint 1.0
 */


/**
 * Theme Database Options
 * 
 * @global array $imprint_options
 * @since Imprint 1.0
 */
$imprint_options = get_option($imprint_theme_name);

/**
 * If $imprint_options is undefined then put in the default values.
 * 
 * @since Imprint 1.0
 */
if (empty($imprint_options)):
    $imprint_options = unserialize('a:100:{s:10:"skin_color";s:13:"classic-white";s:11:"layout-type";s:9:"boxed-res";s:7:"favicon";s:0:"";s:11:"footer_name";s:0:"";s:8:"global_f";s:5:"Arial";s:12:"wrapper_bg_c";s:7:"#FFFFFF";s:16:"wrapper_border_c";s:7:"#FFFFFF";s:15:"viewport_layout";s:21:"left_viewport_content";s:18:"footer_box_columns";s:4:"four";s:18:"disable_thumbnails";b:0;s:16:"disable_excerpts";b:0;s:17:"disable_footerbox";b:0;s:11:"menu_toggle";s:5:"above";s:18:"disable_top_margin";b:0;s:21:"disable_bottom_margin";b:0;s:23:"disable_carousel_margin";s:1:"1";s:27:"disable_archive_posts_space";b:0;s:17:"disable_tag_links";b:0;s:12:"site_title_c";s:7:"#555555";s:11:"site_desc_c";s:7:"#555555";s:8:"logo_img";s:0:"";s:16:"disable_logo_img";b:0;s:17:"disable_site_desc";b:0;s:13:"bottom_menu_c";s:7:"#999999";s:19:"bottom_menu_hover_c";s:7:"#999999";s:20:"disable_social_icons";s:1:"1";s:6:"si_rss";s:0:"";s:11:"si_facebook";s:0:"";s:10:"si_twitter";s:0:"";s:11:"si_linkedin";s:0:"";s:10:"si_youtube";s:0:"";s:8:"si_gplus";s:0:"";s:12:"si_pinterest";s:0:"";s:9:"si_tumblr";s:0:"";s:8:"si_skype";s:0:"";s:9:"si_flickr";s:0:"";s:18:"pri_sidebar_link_c";s:7:"#333333";s:17:"fb_sidebar_link_c";s:7:"#DDDDDD";s:6:"link_c";s:7:"#444444";s:12:"link_hover_c";s:7:"#888888";s:14:"link_visited_c";s:7:"#444444";s:11:"sticky_bg_c";s:7:"#EEEEEE";s:9:"rm_text_c";s:7:"#FFFFFF";s:7:"rm_bg_c";s:7:"#1497EA";s:11:"rm_border_c";s:7:"#000000";s:17:"home_post_title_c";s:7:"#444444";s:16:"home_post_meta_c";s:7:"#353535";s:19:"home_post_excerpt_c";s:7:"#000000";s:19:"home_thumb_border_c";s:7:"#AAAAAA";s:14:"home_divider_c";s:7:"#D7D7D7";s:12:"post_title_c";s:7:"#444444";s:11:"post_meta_c";s:7:"#444444";s:14:"post_content_c";s:7:"#222222";s:14:"post_heading_c";s:7:"#222222";s:13:"post_pre_bg_c";s:7:"#F7F7F7";s:10:"post_pre_c";s:7:"#222222";s:9:"post_hr_c";s:7:"#E7E7E7";s:10:"post_tag_c";s:7:"#444444";s:21:"post_nav_below_post_c";s:7:"#555555";s:21:"post_img_caption_bg_c";s:7:"#CCCCCC";s:18:"post_img_caption_c";s:7:"#888888";s:15:"widget_title_bg";a:5:{s:5:"color";s:7:"#444444";s:5:"image";s:0:"";s:6:"repeat";s:6:"repeat";s:8:"position";s:8:"top left";s:10:"attachment";s:6:"scroll";}s:9:"widget_bg";a:5:{s:5:"color";s:7:"#FFFFFF";s:5:"image";s:0:"";s:6:"repeat";s:6:"repeat";s:8:"position";s:8:"top left";s:10:"attachment";s:6:"scroll";}s:18:"fb_widget_title_bg";a:5:{s:5:"color";s:7:"#333333";s:5:"image";s:0:"";s:6:"repeat";s:6:"repeat";s:8:"position";s:8:"top left";s:10:"attachment";s:6:"scroll";}s:12:"fb_widget_bg";a:5:{s:5:"color";s:7:"#000000";s:5:"image";s:0:"";s:6:"repeat";s:6:"repeat";s:8:"position";s:8:"top left";s:10:"attachment";s:6:"scroll";}s:12:"site_title_f";s:5:"Times";s:11:"site_desc_f";s:5:"Arial";s:15:"archive_title_f";s:5:"Times";s:14:"archive_meta_f";s:5:"Arial";s:17:"archive_excerpt_f";s:5:"Arial";s:4:"rm_f";s:5:"Arial";s:19:"pri_sidebar_title_f";s:5:"Arial";s:18:"pri_sidebar_link_f";s:5:"Arial";s:18:"pri_sidebar_text_f";s:5:"Arial";s:12:"fb_w_title_f";s:5:"Arial";s:11:"fb_w_text_f";s:5:"Arial";s:11:"fb_w_link_f";s:5:"Arial";s:8:"footer_f";s:7:"Verdana";s:12:"post_title_f";s:5:"Times";s:11:"post_meta_f";s:6:"Tahoma";s:14:"post_content_f";s:5:"Arial";s:10:"post_pre_f";s:11:"Courier-New";s:11:"post_list_f";s:5:"Arial";s:15:"post_headings_f";s:5:"Arial";s:10:"custom_css";s:0:"";s:8:"carousel";s:8:"featured";s:11:"slide_speed";s:4:"5000";s:15:"slide_ani_speed";s:3:"700";s:17:"disable_slide_nav";b:0;s:21:"disable_smooth_height";s:1:"1";s:20:"slide_animation_type";s:4:"fade";s:9:"slide_dir";s:10:"horizontal";s:7:"slide_1";s:0:"";s:7:"slide_2";s:0:"";s:14:"disable_header";b:0;s:16:"disable_pri_menu";b:0;s:10:"disable_rm";b:0;s:7:"rm_text";s:19:"Continue Reading...";s:17:"disable_bott_menu";b:0;s:10:"disable_ab";b:0;}');
endif;

// Add required options.
imprint_add_up_options();


/**
 * Fonts Array (Default)
 * 
 * @global array $imprint_fonts
 * @since Imprint 1.0
 */

$imprint_fonts = unserialize('a:10:{i:0;a:6:{s:4:"name";s:34:"Arial, Helvetica, "Helvetica Neue"";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:5:"Arial";s:11:"displayname";s:5:"Arial";}i:1;a:6:{s:4:"name";s:21:""Arial Black", Gadget";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:11:"Arial-Black";s:11:"displayname";s:11:"Arial Black";}i:2;a:6:{s:4:"name";s:22:""Courier New", Courier";s:6:"family";s:9:"monospace";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:11:"Courier-New";s:11:"displayname";s:11:"Courier New";}i:3;a:6:{s:4:"name";s:38:"Georgia, "Palatino Linotype", Palatino";s:6:"family";s:5:"serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:7:"Georgia";s:11:"displayname";s:7:"Georgia";}i:4;a:6:{s:4:"name";s:38:""Lucida Sans Unicode", "Lucida Grande"";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:6:"Lucida";s:11:"displayname";s:13:"Lucida Grande";}i:5;a:6:{s:4:"name";s:29:""Palatino Linotype", Palatino";s:6:"family";s:5:"serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:8:"Palatino";s:11:"displayname";s:8:"Palatino";}i:6;a:6:{s:4:"name";s:14:"Tahoma, Geneva";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:6:"Tahoma";s:11:"displayname";s:6:"Tahoma";}i:7;a:6:{s:4:"name";s:24:""Times New Roman", Times";s:6:"family";s:5:"serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:5:"Times";s:11:"displayname";s:15:"Times New Roman";}i:8;a:6:{s:4:"name";s:25:""Trebuchet MS", Helvetica";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:12:"Trebuchet-MS";s:11:"displayname";s:12:"Trebuchet MS";}i:9;a:6:{s:4:"name";s:15:"Verdana, Geneva";s:6:"family";s:10:"sans-serif";s:7:"variant";b:0;s:4:"type";s:4:"open";s:9:"shortname";s:7:"Verdana";s:11:"displayname";s:7:"Verdana";}}');
