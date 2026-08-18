<?php
// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only post-submit status.
$buyer_status = isset( $_GET['buyer_inquiry'] ) ? sanitize_key( wp_unslash( $_GET['buyer_inquiry'] ) ) : '';
?>
<section class="section buyer-inquiry" id="buyer-inquiry"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( "Let's Make it Happen", 'estatein' ),
		'description' => __( "Ready to take the first step toward your dream property? Fill out the form below, and our real estate wizards will work their magic to find your perfect match. Don't wait; let's embark on this exciting journey together.", 'estatein' ),
	)
);
?>
<form class="buyer-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" autocomplete="on"><input type="hidden" name="action" value="estatein_buyer_inquiry"><?php wp_nonce_field( 'estatein_buyer_inquiry', 'estatein_buyer_nonce' ); ?>
<?php
if ( 'sent' === $buyer_status ) :
	?>
	<p class="form-notice form-notice--success" role="status"><?php esc_html_e( 'Thank you. Your property request has been sent.', 'estatein' ); ?></p>
	<?php
elseif ( $buyer_status ) :
	?>
	<p class="form-notice form-notice--error" role="alert"><?php esc_html_e( 'Your request could not be sent. Please review the form.', 'estatein' ); ?></p><?php endif; ?><label><?php esc_html_e( 'First Name', 'estatein' ); ?><input name="first_name" required placeholder="<?php esc_attr_e( 'Enter First Name', 'estatein' ); ?>"></label><label><?php esc_html_e( 'Last Name', 'estatein' ); ?><input name="last_name" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatein' ); ?>"></label><label><?php esc_html_e( 'Email', 'estatein' ); ?><input name="email" type="email" required placeholder="<?php esc_attr_e( 'Enter your Email', 'estatein' ); ?>"></label><label><?php esc_html_e( 'Phone', 'estatein' ); ?><input name="phone" type="tel" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatein' ); ?>"></label><label><?php esc_html_e( 'Preferred Location', 'estatein' ); ?><select name="preferred_location"><option><?php esc_html_e( 'Select Location', 'estatein' ); ?></option><option>Malibu</option><option>California</option><option>Florida</option></select></label><label><?php esc_html_e( 'Property Type', 'estatein' ); ?><select name="property_type"><option><?php esc_html_e( 'Select Property Type', 'estatein' ); ?></option><option>Villa</option><option>Apartment</option><option>Townhouse</option></select></label><label><?php esc_html_e( 'No. of Bathrooms', 'estatein' ); ?><select name="bathrooms"><option><?php esc_html_e( 'Select no. of Bathrooms', 'estatein' ); ?></option><option>1</option><option>2</option><option>3</option><option>4+</option></select></label><label><?php esc_html_e( 'No. of Bedrooms', 'estatein' ); ?><select name="bedrooms"><option><?php esc_html_e( 'Select no. of Bedrooms', 'estatein' ); ?></option><option>1</option><option>2</option><option>3</option><option>4+</option></select></label><label class="buyer-budget"><?php esc_html_e( 'Budget', 'estatein' ); ?><select name="budget"><option><?php esc_html_e( 'Select Budget', 'estatein' ); ?></option><option>$250k - $500k</option><option>$500k - $1m</option><option>$1m+</option></select></label><fieldset class="contact-method"><legend><?php esc_html_e( 'Preferred Contact Method', 'estatein' ); ?></legend><label>☎ <input type="radio" name="contact_method" value="phone" checked> <?php esc_html_e( 'Phone', 'estatein' ); ?></label><label>✉ <input type="radio" name="contact_method" value="email"> <?php esc_html_e( 'Email', 'estatein' ); ?></label></fieldset><label class="buyer-message"><?php esc_html_e( 'Message', 'estatein' ); ?><textarea name="message" rows="5" required placeholder="<?php esc_attr_e( 'Enter your Message here...', 'estatein' ); ?>"></textarea></label><label class="buyer-consent"><input type="checkbox" name="consent" value="1" required> <?php esc_html_e( 'I agree with Terms of Use and Privacy Policy.', 'estatein' ); ?></label><button class="button button--primary" type="submit"><?php esc_html_e( 'Send Your Message', 'estatein' ); ?></button></form></div></section>
