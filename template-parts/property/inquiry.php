<?php
$property_id = (int) ( $args['property_id'] ?? 0 );
// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only post-submit status.
$inquiry_status = isset( $_GET['inquiry'] ) ? sanitize_key( wp_unslash( $_GET['inquiry'] ) ) : '';
?>
<section class="section property-inquiry" id="property-inquiry"><div class="container property-inquiry__grid"><div>
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => sprintf( __( 'Inquire About %s', 'estatein' ), get_the_title( $property_id ) ),
		'description' => __( 'Interested in this property? Fill out the form below, and our real estate experts will get back to you with more details, including scheduling a viewing and answering any questions you may have.', 'estatein' ),
	)
);
?>
</div>
	<form class="inquiry-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
		<?php
		if ( 'sent' === $inquiry_status ) :
			?>
			<p class="form-notice form-notice--success" role="status"><?php esc_html_e( 'Thank you. Your inquiry has been sent.', 'estatein' ); ?></p>
			<?php
		elseif ( $inquiry_status ) :
			?>
			<p class="form-notice form-notice--error" role="alert"><?php esc_html_e( 'Your inquiry could not be sent. Please review the form and try again.', 'estatein' ); ?></p><?php endif; ?>
		<input type="hidden" name="action" value="estatein_property_inquiry"><input type="hidden" name="property_id" value="<?php echo esc_attr( (string) $property_id ); ?>"><?php wp_nonce_field( 'estatein_property_inquiry', 'estatein_inquiry_nonce' ); ?>
		<label><?php esc_html_e( 'First Name', 'estatein' ); ?><input name="first_name" type="text" autocomplete="given-name" placeholder="<?php esc_attr_e( 'Enter First Name', 'estatein' ); ?>" required></label><label><?php esc_html_e( 'Last Name', 'estatein' ); ?><input name="last_name" type="text" autocomplete="family-name" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatein' ); ?>"></label><label><?php esc_html_e( 'Email', 'estatein' ); ?><input name="email" type="email" autocomplete="email" placeholder="<?php esc_attr_e( 'Enter your Email', 'estatein' ); ?>" required></label><label><?php esc_html_e( 'Phone', 'estatein' ); ?><input name="phone" type="tel" autocomplete="tel" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatein' ); ?>"></label><label class="field-wide"><?php esc_html_e( 'Selected Property', 'estatein' ); ?><input type="text" value="<?php echo esc_attr( get_the_title( $property_id ) . ', ' . ( $args['location'] ?? '' ) ); ?>" readonly></label><label class="field-wide"><?php esc_html_e( 'Message', 'estatein' ); ?><textarea name="message" rows="5" placeholder="<?php esc_attr_e( 'Enter your Message here...', 'estatein' ); ?>" required></textarea></label><label class="field-consent"><input type="checkbox" name="consent" value="1" required> <?php esc_html_e( 'I agree with Terms of Use and Privacy Policy', 'estatein' ); ?></label><button class="button button--primary" type="submit"><?php esc_html_e( 'Send Your Message', 'estatein' ); ?></button>
	</form></div></section>
