<?php
/** Contact form request handler. @package Estatein */

namespace Estatein\Theme\Content;

final class ContactForm {
	public function register(): void {
		add_action( 'admin_post_estatein_contact', array( $this, 'handle' ) );
		add_action( 'admin_post_nopriv_estatein_contact', array( $this, 'handle' ) );
	}

	public function handle(): void {
		if ( ! isset( $_POST['estatein_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['estatein_contact_nonce'] ) ), 'estatein_contact' ) ) {
			wp_die( esc_html__( 'Your request could not be verified.', 'estatein' ), '', array( 'response' => 403 ) );
		}

		$first_name = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
		$last_name  = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
		$email      = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
		$phone      = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
		$inquiry    = isset( $_POST['inquiry_type'] ) ? sanitize_text_field( wp_unslash( $_POST['inquiry_type'] ) ) : '';
		$source     = isset( $_POST['source'] ) ? sanitize_text_field( wp_unslash( $_POST['source'] ) ) : '';
		$message    = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
		$consent    = isset( $_POST['consent'] ) && '1' === sanitize_text_field( wp_unslash( $_POST['consent'] ) );
		$redirect   = home_url( '/contact-us/' );

		if ( '' === $first_name || ! is_email( $email ) || '' === $message || ! $consent ) {
			wp_safe_redirect( add_query_arg( 'contact_status', 'invalid', $redirect ) . '#contact-form' );
			exit;
		}

		$body = sprintf( "Name: %s %s\nEmail: %s\nPhone: %s\nInquiry type: %s\nSource: %s\n\n%s", $first_name, $last_name, $email, $phone, $inquiry, $source, $message );
		$sent = wp_mail( get_option( 'admin_email' ), __( 'New Estatein contact message', 'estatein' ), $body, array( 'Reply-To: ' . $email ) );
		wp_safe_redirect( add_query_arg( 'contact_status', $sent ? 'sent' : 'failed', $redirect ) . '#contact-form' );
		exit;
	}
}
