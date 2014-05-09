<?php
/**
 * Contact Form Widget Class
 */
class Wt_Widget_Contact_Form extends WP_Widget {

	function Wt_Widget_Contact_Form() {
		$widget_ops = array('description' => __( 'An email contact form.', 'wt_admin') );
		$this->WP_Widget('contact_form', THEME_SLUG.' - '.__('Contact Form', 'wt_admin'), $widget_ops);		
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Email Us', 'wt_front') : $instance['title'], $instance, $this->id_base);
		$email= $instance['email'];
		$email = str_replace('@','(at)',$email);
		$id = rand(1,1000);
		if(empty($success)){
			$success = __('We received your message and we will get back to you as soon as possible. <br /> <strong>Thank You!</strong>','wt_front');
		}

		echo '<div id="wt_contact_form-'.$id.'" class="widget widget_contact_form">';
		if ( $title)
			echo $before_title . $title . $after_title;
		
		?>
		<p class="success" style="display:none;"><?php _e('We received your message and we will get back to you as soon as possible. <br /> <strong>Thank You!</strong>','wt_front');?></p>
		<?php wp_enqueue_script( 'jquery-validate' ); ?>
		<form id="wt_contact_form_<?php echo $id ?>" class="wt_contact_form" action="<?php echo THEME_INCLUDES;?>/sendmailWidget.php" method="post" role="form">
			<div class="fieldset">
                <input type="text" id="contact_name_<?php echo $id ?>" name="contact_name_<?php echo $id ?>" title="Name *" class="text_input auto-hint required" data-minlength="3" tabindex="5" />
            </div>
			
			<div class="fieldset">
                <input type="text" id="contact_email_<?php echo $id ?>" name="contact_email_<?php echo $id ?>" title="Email *" class="text_input auto-hint required email" tabindex="6" />
            </div>
			
			<div class="fieldset">
            	<textarea name="contact_content_<?php echo $id ?>"  title="Message *" class="text_area auto-hint required" cols="30" rows="5" data-minlength="5" tabindex="7"></textarea>
            </div>
			
			<div class="fieldset"><a href="#" onclick="jQuery('#contact_form_<?php echo $id ?>').submit();return false;" class="contact_button"><span><?php _e('Submit', 'wt_front'); ?></span></a></div>
            <div><input type="hidden" value="<?php echo $id ?>" name="contact_widget_id" />
			<input type="hidden" value="<?php echo $email;?>" name="contact_to_<?php echo $id ?>" /></div>
		</form>
		<?php
		echo '</div>';
        		
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = strip_tags($new_instance['email']);

		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$email = isset($instance['email']) ? esc_attr($instance['email']) :get_bloginfo('admin_email');
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wt_admin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Your Email:', 'wt_admin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></p>
		
<?php
	}
}
