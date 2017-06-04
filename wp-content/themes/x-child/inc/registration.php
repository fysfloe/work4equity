<?php
function print_registration_form() {
  ob_start();

  ?>
  <h3>Register for this site!</h3>
	<p>Sign up now for the good stuff.</p>
	<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
		<div class="username">
			<label for="user_login"><?php _e('Username'); ?>: </label>
			<input type="text" name="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="101" />
		</div>
		<div class="password">
			<label for="user_email"><?php _e('Your Email'); ?>: </label>
			<input type="text" name="user_email" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" tabindex="102" />
		</div>
		<div class="login_fields">
			<?php do_action( 'register_form' ); ?>
			<input type="submit" name="user-submit" value="<?php _e('Sign up'); ?>" class="user-submit" />
			<?php
        $register = $_GET['register'];
        if($register == true) {
          echo '<p>Check your email for the password!</p>';
        }
      ?>
			<input type="hidden" name="redirect_to" value="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>?register=true" />
			<input type="hidden" name="user-cookie" value="1" />
		</div>
	</form>
  <?php

  return ob_get_clean();
}
add_shortcode( 'registration_form', 'print_registration_form' );

function w4e_add_registration_fields() {
  //Get and set any values already sent
  $user_extra = ( isset( $_POST['user_extra'] ) ) ? $_POST['user_extra'] : '';
  ?>

  <p>
    <label for="user_extra"><?php _e( 'Extra Field', 'myplugin_textdomain' ) ?><br />
    <input type="text" name="user_extra" id="user_extra" class="input" value="<?php echo esc_attr( stripslashes( $user_extra ) ); ?>" size="25" /></label>
  </p>

  <?php
}
add_action( 'register_form', 'w4e_add_registration_fields' );
