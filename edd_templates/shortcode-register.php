<?php
/**
 * This template is used to display the registration form with [edd_register]
 */
global $edd_register_redirect;

do_action( 'edd_print_errors' ); ?>

<?php if ( ! is_user_logged_in() ) : ?>

<form id="edd_register_form" class="edd_form" action="" method="post">
	<?php do_action( 'edd_register_form_fields_top' ); ?>

	<fieldset>
		<legend><?php _e( 'Register New Account', 'easy-digital-downloads' ); ?></legend>

		<?php do_action( 'edd_register_form_fields_before' ); ?>

		<p>
			<input id="edd-user-email" class="required edd-input" type="email" name="edd_user_email" />
		</p>

		<p>
			<input id="edd-user-pass" class="password required edd-input" type="password" name="edd_user_pass" />
		</p>

		<?php do_action( 'edd_register_form_fields_before_submit' ); ?>

		<p>
			<input type="hidden" name="edd_honeypot" value="" />
			<input type="hidden" name="edd_action" value="user_register" />
			<input type="hidden" name="edd_redirect" value="<?php echo esc_url( $edd_register_redirect ); ?>"/>
			<input class="edd-submit" name="edd_register_submit" type="submit" value="<?php esc_attr_e( 'Register', 'easy-digital-downloads' ); ?>" />
		</p>

		<?php do_action( 'edd_register_form_fields_after' ); ?>
	</fieldset>

	<?php do_action( 'edd_register_form_fields_bottom' ); ?>
</form>

<?php else : ?>

	<?php do_action( 'edd_register_form_logged_in' ); ?>

<?php endif; ?>
