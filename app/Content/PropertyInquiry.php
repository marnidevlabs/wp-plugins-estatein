<?php
/** Property inquiry request handler. @package Estatein */

namespace Estatein\Theme\Content;

final class PropertyInquiry {
	public function register(): void {
		add_action( 'admin_post_estatein_property_inquiry', array( $this, 'handle' ) );
		add_action( 'admin_post_nopriv_estatein_property_inquiry', array( $this, 'handle' ) );
		add_action( 'admin_post_estatein_buyer_inquiry', array( $this, 'handle_buyer_inquiry' ) );
		add_action( 'admin_post_nopriv_estatein_buyer_inquiry', array( $this, 'handle_buyer_inquiry' ) );
	}

	public function handle_buyer_inquiry(): void {
		if ( ! isset( $_POST['estatein_buyer_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['estatein_buyer_nonce'] ) ), 'estatein_buyer_inquiry' ) ) {
			wp_die( esc_html__( 'Your request could not be verified.', 'estatein' ), '', array( 'response' => 403 ) );
		}

		$first_name = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
		$last_name  = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
		$email      = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
		$phone      = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
		$message    = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
		$consent    = isset( $_POST['consent'] ) && '1' === sanitize_text_field( wp_unslash( $_POST['consent'] ) );
		$redirect   = get_post_type_archive_link( 'estatein_property' );

		if ( '' === $first_name || ! is_email( $email ) || '' === $message || ! $consent ) {
			wp_safe_redirect( add_query_arg( 'buyer_inquiry', 'invalid', $redirect ) . '#buyer-inquiry' );
			exit;
		}

		$preferences = array();
		foreach ( array( 'preferred_location', 'property_type', 'bathrooms', 'bedrooms', 'budget', 'contact_method' ) as $field ) {
			$preferences[ $field ] = isset( $_POST[ $field ] ) ? sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) : '';
		}
		$body = sprintf( "Name: %s %s\nEmail: %s\nPhone: %s\nLocation: %s\nProperty type: %s\nBathrooms: %s\nBedrooms: %s\nBudget: %s\nPreferred contact: %s\n\n%s", $first_name, $last_name, $email, $phone, $preferences['preferred_location'], $preferences['property_type'], $preferences['bathrooms'], $preferences['bedrooms'], $preferences['budget'], $preferences['contact_method'], $message );
		$sent = wp_mail( get_option( 'admin_email' ), __( 'New property search inquiry', 'estatein' ), $body, array( 'Reply-To: ' . $email ) );
		wp_safe_redirect( add_query_arg( 'buyer_inquiry', $sent ? 'sent' : 'failed', $redirect ) . '#buyer-inquiry' );
		exit;
	}

	public function handle(): void {
		if ( ! isset( $_POST['estatein_inquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['estatein_inquiry_nonce'] ) ), 'estatein_property_inquiry' ) ) {
			wp_die( esc_html__( 'Your request could not be verified.', 'estatein' ), '', array( 'response' => 403 ) );
		}

		$property_id = isset( $_POST['property_id'] ) ? absint( $_POST['property_id'] ) : 0;
		$email       = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
		$first_name  = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
		$last_name   = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
		$phone       = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
		$message     = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';
		$consent     = isset( $_POST['consent'] ) && '1' === sanitize_text_field( wp_unslash( $_POST['consent'] ) );
		$redirect    = get_permalink( $property_id );

		if ( ! $property_id || 'estatein_property' !== get_post_type( $property_id ) || ! is_email( $email ) || '' === $first_name || '' === $message || ! $consent ) {
			wp_safe_redirect( add_query_arg( 'inquiry', 'invalid', $redirect ? $redirect : home_url( '/' ) ) . '#property-inquiry' );
			exit;
		}

		$subject = sprintf( __( 'Property inquiry: %s', 'estatein' ), get_the_title( $property_id ) );
		$body    = sprintf( "Name: %s %s\nEmail: %s\nPhone: %s\nProperty: %s\n\n%s", $first_name, $last_name, $email, $phone, get_the_title( $property_id ), $message );
		$sent    = wp_mail( get_option( 'admin_email' ), $subject, $body, array( 'Reply-To: ' . $email ) );
		wp_safe_redirect( add_query_arg( 'inquiry', $sent ? 'sent' : 'failed', $redirect ) . '#property-inquiry' );
		exit;
	}
}
