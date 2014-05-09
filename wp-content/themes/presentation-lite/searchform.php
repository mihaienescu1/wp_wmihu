<?php
/**
 * default search form
 */
?>
<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
    	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'presentation_lite' ); ?></label>
        <input type="search" placeholder="<?php echo esc_attr( 'Search&hellip;', 'presentation_lite' ); ?>" name="s" id="search-input" />
        <input class="screen-reader-text" type="submit" id="search-submit" value="Search" />
    </div>
</form>