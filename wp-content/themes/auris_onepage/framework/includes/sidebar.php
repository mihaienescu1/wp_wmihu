<?php
class wt_sidebar {
	var $wt_sidebar_names = array();
	var $wt_footer_sidebar_count = 0;
	var $wt_footer_sidebar_names = array();
	var $wt_footer_top_sidebar_names = array();
	var $wt_sub_footer_sidebar_names = array();
	var $wt_top_widget_count = 0;
	var $wt_top_widget_names = array();
	
	function wt_sidebar(){
		$this->wt_sidebar_names = array(
			'home'=>__('Homepage Area','wt_admin'),
			'page'=>__('Page Area','wt_admin'),
			'blog'=>__('Blog Area','wt_admin'),
			'portfolio' =>__('Portfolio Area','wt_admin'),
		);
		$this->wt_footer_sidebar_names = array(
			__('Footer 1 Area','wt_admin'),
			__('Footer 2 Area','wt_admin'),
			__('Footer 3 Area','wt_admin'),
			__('Footer 4 Area','wt_admin'),
			__('Footer 5 Area','wt_admin'),
		);
		$this->wt_top_widget_names = array(
			__('Top Widget Area 1','wt_admin'),
			__('Top Widget Area 2','wt_admin'),
			__('Top Widget Area 3','wt_admin'),
			__('Top Widget Area 4','wt_admin'),
			__('Top Widget Area 5','wt_admin'),
		);
	}

	function wt_register_sidebar(){
		foreach ($this->wt_sidebar_names as $name){
			register_sidebar(array(
				'name' => $name,
				'before_widget' => '<section id="%1$s" class="widget %2$s" role="complementary">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
			));
		}
		
		register_sidebar(array(
			'name' =>  __('Footer Top Area','wt_admin'),
			'before_widget' => '<section id="%1$s" class="widget %2$s" role="complementary">',
			'after_widget' => '</section>',
			'before_title' => '',
			'after_title' => '',
		));
		//register footer sidebars
		foreach ($this->wt_footer_sidebar_names as $name){
			register_sidebar(array(
				'name' =>  $name,
				'before_widget' => '<section id="%1$s" class="widget %2$s" role="complementary">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
			));
		}
		register_sidebar(array(
			'name' =>  __('Sub Footer Area','wt_admin'),
			'before_widget' => '<section id="%1$s" class="widget %2$s" role="complementary">',
			'after_widget' => '</section>',
			'before_title' => '',
			'after_title' => '',
		));
		foreach ($this->wt_top_widget_names as $name){
			register_sidebar(array(
				'name' =>  $name,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
			));
		}
		register_sidebar(array(
				'name' =>  __('Header Area','wt_admin'),
				'before_widget' => '<section id="%1$s" class="widget %2$s" role="complementary">',
				'after_widget' => '</section>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
		));
		if(wt_get_option('general', 'woocommerce')){
			register_sidebar(array(
				'name' =>  __('Products Area','wt_admin'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
			));
		}
		//register custom sidebars
		$wt_custom_sidebars = wt_get_option('sidebar','sidebars');
		if(!empty($wt_custom_sidebars)){
			$wt_custom_sidebar_names = explode(',',$wt_custom_sidebars);
			foreach ($wt_custom_sidebar_names as $wt_name){
				register_sidebar(array(
					'name' =>  $wt_name,
					'before_widget' => '<section id="%1$s" class="widget %2$s" role="complementary">',
					'after_widget' => '</section>',
					'before_title' => '<h3 class="widgettitle">',
					'after_title' => '</h3>',
				));
			}
		}
	}
	
	function wt_get_sidebar($post_id){
		
		if(is_page()){
			$wt_sidebar = $this->wt_sidebar_names['page'];
		}
		if(is_home() || is_front_page() || $post_id == wt_get_option('homepage','home_page') ){
			$home_page_id = wt_get_option('homepage','home_page');
			$post_id = get_object_id($home_page_id,'page');
			$wt_sidebar = $this->wt_sidebar_names['home'];
		}
		if(is_blog()){
			$swt_idebar = $this->wt_sidebar_names['blog'];
		}
		if(is_singular('post')){
			$wt_sidebar = $this->wt_sidebar_names['blog'];
		}elseif(is_singular('wt_portfolio')){
			$wt_sidebar = $this->wt_sidebar_names['portfolio'];
		}
		if(is_search() || is_archive()){
			$wt_sidebar = $this->wt_sidebar_names['blog'];
		}
		if (wt_get_option('general', 'woocommerce')) {
			if(is_woocommerce() || is_cart() || is_checkout() || is_account_page()){
				$wt_sidebar = dynamic_sidebar(__('Products Area','wt_admin'));
			}
		}
		if(!empty($post_id) && !is_archive()){
			$wt_custom = get_post_meta($post_id, '_sidebar', true);
			if(!empty($wt_custom)){
				$wt_sidebar = $wt_custom;
			}
		}
		if(isset($wt_sidebar)){
			dynamic_sidebar($wt_sidebar);
		}
	}
	function wt_get_footer_sidebar(){
		dynamic_sidebar($this->wt_footer_sidebar_names[$this->wt_footer_sidebar_count]);
		$this->wt_footer_sidebar_count++;
	}
	function wt_get_top_widget(){
		dynamic_sidebar($this->wt_top_widget_names[$this->wt_top_widget_count]);
		$this->wt_top_widget_count++;
	}
}
global $_wt_sidebar;
$_wt_sidebar = new wt_sidebar;

add_action('widgets_init', array($_wt_sidebar,'wt_register_sidebar'));

function wt_sidebar_generator($function){
	global $_wt_sidebar;
	$args = array_slice( func_get_args(), 1 );
	return call_user_func_array(array( &$_wt_sidebar, $function ), $args );
}