<?php
/**
 * Social Icons Module
 * 
 * @package Imprint
 * @subpackage Extend
 * @category Social
 * @since Imprint 1.0
 */

/**
 * Class used to include Social Icons into theme
 * 
 * @since Imprint 1.0
 */
class Imprint_Social_Icons {
    
    
    /**
     * Constructor Initialization
     * 
     * @global mixed $imprint_options
     */
    function __construct() {
        global $imprint_options;
        
        if(!$imprint_options['disable_social_icons']):
            add_action('imprint_wrapper_hook', array($this, 'social_container'));
            add_action( 'wp_enqueue_scripts', array($this, 'social_icon_enqueue' ), 20);
        endif;
    }
    
    
    /**
     * Outputs the Social Icon HTML.
     * 
     * @global mixed $imprint_options
     * @param mixed $name Contains the string for DB option
     * @param string $img The image URL for icon (currently depriciated)
     * @param string $class The CSS class
     * @param string $unicode_value the unicode value for icon (currently depriciated)
     */
    private function _show_URL($name = FALSE, $img, $class, $unicode_value){
        global $imprint_options;
        
        if($imprint_options[$name]) {
            ?><div class="social_icon_solo <?php echo 'div-' . $class ?>">
                <a href="<?php echo esc_url( $imprint_options[$name] ) ?>" class="<?php echo 'link-' . $class ?>" target="_blank"><i class="fa fa-<?php echo $unicode_value ?>"></i></a><?php
              ?></div><?php
        }
    }
    
    /**
     * Calls the entire social icon module.
     * 
     * @since Imprint 1.0
     */
    function social_container(){
        $empty = $this->social_icons();
        if($empty === FALSE):
            ?><div class="social-icons"><?php imprint_social_icons_hook() ?></div><?php
        endif;
    }
    
    
    /**
     * Hooks different fuctions for different icons
     * 
     * @param mixed $func The name of function
     * @param mixed $priority The priority for hook
     */
    function add_social_icons($func = FALSE, $priority = FALSE ) {
        add_action('imprint_social_icons_hook', array($this, $func), $priority);
    }

    
    /**
     * Loads Social Icons by adding the appropriate hooks.
     * 
     * @global mixed $imprint_options
     * @return boolean
     */
    function social_icons(){
        global $imprint_options;
        
        $empty = TRUE;
        
        if( !empty( $imprint_options['si_facebook'] ) ){
            $this->add_social_icons('attach_facebook', 10);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_twitter'] ) ){
            $this->add_social_icons('attach_twitter', 11);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_linkedin'] ) ){
            $this->add_social_icons('attach_linkedin', 12);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_pinterest'] ) ){
            $this->add_social_icons('attach_pinterest', 13);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_youtube'] ) ){
            $this->add_social_icons('attach_youtube', 14);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_tumblr'] ) ){
            $this->add_social_icons('attach_tumblr', 15);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_gplus'] ) ){
            $this->add_social_icons('attach_gplus', 16);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_skype'] ) ){
            $this->add_social_icons('attach_skype', 17);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_flickr'] ) ){
            $this->add_social_icons('attach_flickr', 18);
            $empty = FALSE;
        }        
        if( !empty( $imprint_options['si_rss'] ) ){
            $this->add_social_icons('attach_rss', 90);
            $empty = FALSE;
        }
        remove_si_hooks();
        
        return $empty;
    }    
    
    function attach_facebook() {
        $this->_show_URL('si_facebook', 'facebook.png', 'facebook', 'facebook');
    }
    function attach_twitter() {
        $this->_show_URL('si_twitter', 'twitter.png', 'twitter', 'twitter');
    }
    function attach_linkedin() {
        $this->_show_URL('si_linkedin', 'linkedin.png', 'linkedin', 'linkedin');
    }
    function attach_pinterest() {
        $this->_show_URL('si_pinterest', 'pinterest.png', 'pinterest', 'pinterest');
    }
    function attach_youtube() {
        $this->_show_URL('si_youtube', 'youtube.png', 'youtube', 'youtube');
    }
    function attach_tumblr() {
        $this->_show_URL('si_tumblr', 'tumblr.png', 'tumblr', 'tumblr');
    }
    function attach_gplus() {
        $this->_show_URL('si_gplus', 'gplus.png', 'gplus', 'google-plus');
    }
    function attach_skype() {
        $this->_show_URL('si_skype', 'skype.png', 'skype', 'skype');
    }
    function attach_flickr() {
        $this->_show_URL('si_flickr', 'flickr.png', 'flickr', 'flickr');
    }
    function attach_rss() {
        $this->_show_URL('si_rss', 'rss.png', 'rss', 'rss');
    }
    
    /**
     * Enqueue font-awesome
     */
    function social_icon_enqueue(){
        wp_enqueue_style( 'imprint-font-awesome', IMPRINT_ADMIN_CSS . 'font-awesome.css', array(), '4.0.3' );
    }
    
}

$Imprint_Social_Icons_Obj = new Imprint_Social_Icons;

/*
 * Example: to remove hooks
 * 
function ksw(){
    global $Imprint_Social_Icons_Obj;
    remove_action('imprint_social_icons_hook', array($Imprint_Social_Icons_Obj, 'attach_facebook'), 10 );
    remove_action('imprint_social_icons_hook', array($Imprint_Social_Icons_Obj, 'attach_youtube'), 14 );
    add_action('imprint_social_icons_hook', array($Imprint_Social_Icons_Obj, 'attach_facebook'), 13);
}

add_action('remove_si_hooks', 'ksw');
 */