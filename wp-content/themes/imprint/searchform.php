<?php
/*
 * Template for displaying Search Form.
 * 
 * @package Imprint
 * @since Imprint 1.0
 */
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search:</label>
        <input type="text" value="" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="Go" />
    </div>
</form>