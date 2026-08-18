<?php
// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only post-submit status.
$contact_status = isset( $_GET['contact_status'] ) ? sanitize_key( wp_unslash( $_GET['contact_status'] ) ) : '';
?>
<section class="section contact-form-section" id="contact-form"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( "Let's Connect", 'estatein' ),
		'description' => __( "We're excited to connect with you and learn more about your real estate goals. Use the form below to get in touch with Estatein. Whether you're a prospective client, partner, or simply curious about our services, we're here to answer your questions and provide the assistance you need.", 'estatein' ),
	)
);
?>
<form class="contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" autocomplete="on"><input type="hidden" name="action" value="estatein_contact"><?php wp_nonce_field( 'estatein_contact', 'estatein_contact_nonce' ); ?>
<?php
if ( 'sent' === $contact_status ) :
	?>
	<p class="form-notice form-notice--success" role="status"><?php esc_html_e( 'Thank you. Your message has been sent.', 'estatein' ); ?></p>
	<?php
elseif ( $contact_status ) :
	?>
	<p class="form-notice form-notice--error" role="alert"><?php esc_html_e( 'Your message could not be sent. Please review the form.', 'estatein' ); ?></p><?php endif; ?><label><?php esc_html_e( 'First Name', 'estatein' ); ?><input name="first_name" required placeholder="<?php esc_attr_e( 'Enter First Name', 'estatein' ); ?>"></label><label><?php esc_html_e( 'Last Name', 'estatein' ); ?><input name="last_name" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatein' ); ?>"></label><label><?php esc_html_e( 'Email', 'estatein' ); ?><input name="email" type="email" required placeholder="<?php esc_attr_e( 'Enter your Email', 'estatein' ); ?>"></label><label><?php esc_html_e( 'Phone', 'estatein' ); ?><input name="phone" type="tel" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatein' ); ?>"></label><label><?php esc_html_e( 'Inquiry Type', 'estatein' ); ?><select name="inquiry_type"><option value=""><?php esc_html_e( 'Select Inquiry Type', 'estatein' ); ?></option><option><?php esc_html_e( 'Buying a Property', 'estatein' ); ?></option><option><?php esc_html_e( 'Selling a Property', 'estatein' ); ?></option><option><?php esc_html_e( 'Property Management', 'estatein' ); ?></option><option><?php esc_html_e( 'Investment Advice', 'estatein' ); ?></option></select></label><label><?php esc_html_e( 'How Did You Hear About Us?', 'estatein' ); ?><select name="source"><option value=""><?php esc_html_e( 'Select', 'estatein' ); ?></option><option><?php esc_html_e( 'Search Engine', 'estatein' ); ?></option><option><?php esc_html_e( 'Social Media', 'estatein' ); ?></option><option><?php esc_html_e( 'Referral', 'estatein' ); ?></option></select></label><label class="contact-message"><?php esc_html_e( 'Message', 'estatein' ); ?><textarea name="message" rows="5" required placeholder="<?php esc_attr_e( 'Enter your Message here...', 'estatein' ); ?>"></textarea></label><label class="contact-consent"><input type="checkbox" name="consent" value="1" required> <?php esc_html_e( 'I agree with Terms of Use and Privacy Policy.', 'estatein' ); ?></label><button class="button button--primary" type="submit"><?php esc_html_e( 'Send Your Message', 'estatein' ); ?></button></form></div></section>
