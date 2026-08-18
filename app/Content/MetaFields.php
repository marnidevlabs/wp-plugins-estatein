<?php
/** Secure registered metadata and editing fields. @package Estatein */

namespace Estatein\Theme\Content;

final class MetaFields {
	private const FIELDS = array(
		'team_member'          => array(
			'role'        => 'text',
			'social_url'  => 'url',
			'contact_url' => 'url',
		),
		'estatein_client'      => array(
			'year'     => 'text',
			'website'  => 'url',
			'domain'   => 'text',
			'category' => 'text',
		),
		'estatein_property'    => array(
			'price'           => 'text',
			'location'        => 'text',
			'bedrooms'        => 'text',
			'bathrooms'       => 'text',
			'area'            => 'text',
			'property_type'   => 'text',
			'tagline'         => 'text',
			'build_year'      => 'text',
			'features'        => 'textarea',
			'transfer_tax'    => 'text',
			'legal_fees'      => 'text',
			'inspection_fee'  => 'text',
			'insurance'       => 'text',
			'property_taxes'  => 'text',
			'hoa_fee'         => 'text',
			'down_payment'    => 'text',
			'mortgage_amount' => 'text',
		),
		'estatein_testimonial' => array(
			'person'   => 'text',
			'location' => 'text',
			'rating'   => 'text',
		),
	);

	public function register(): void {
		add_action( 'init', array( $this, 'register_meta' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_boxes' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function register_meta(): void {
		foreach ( self::FIELDS as $post_type => $fields ) {
			foreach ( $fields as $key => $type ) {
				register_post_meta(
					$post_type,
					'_estatein_' . $key,
					array(
						'type'              => 'string',
						'single'            => true,
						'show_in_rest'      => true,
						'sanitize_callback' => 'url' === $type ? 'esc_url_raw' : ( 'textarea' === $type ? 'sanitize_textarea_field' : 'sanitize_text_field' ),
						'auth_callback'     => static fn(): bool => current_user_can( 'edit_posts' ),
					)
				);
			}
		}
	}

	public function add_boxes(): void {
		foreach ( array_keys( self::FIELDS ) as $post_type ) {
			add_meta_box( 'estatein_details', __( 'Estatein Details', 'estatein' ), array( $this, 'render_box' ), $post_type, 'normal', 'high' );
		}
	}

	public function render_box( \WP_Post $post ): void {
		wp_nonce_field( 'estatein_save_details', 'estatein_details_nonce' );
		foreach ( self::FIELDS[ $post->post_type ] as $key => $type ) {
			$value = get_post_meta( $post->ID, '_estatein_' . $key, true );
			if ( 'textarea' === $type ) {
				printf( '<p><label for="estatein_%1$s"><strong>%2$s</strong></label><br><textarea class="widefat" rows="6" id="estatein_%1$s" name="estatein_%1$s">%3$s</textarea></p>', esc_attr( $key ), esc_html( ucwords( str_replace( '_', ' ', $key ) ) ), esc_textarea( $value ) );
			} else {
				printf( '<p><label for="estatein_%1$s"><strong>%2$s</strong></label><br><input class="widefat" type="%3$s" id="estatein_%1$s" name="estatein_%1$s" value="%4$s"></p>', esc_attr( $key ), esc_html( ucwords( str_replace( '_', ' ', $key ) ) ), 'url' === $type ? 'url' : 'text', esc_attr( $value ) );
			}
		}
	}

	public function save( int $post_id ): void {
		$post_type = get_post_type( $post_id );
		if ( ! isset( self::FIELDS[ $post_type ] ) || ! isset( $_POST['estatein_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['estatein_details_nonce'] ) ), 'estatein_save_details' ) || ! current_user_can( 'edit_post', $post_id ) || wp_is_post_autosave( $post_id ) ) {
			return;
		}
		foreach ( self::FIELDS[ $post_type ] as $key => $type ) {
			$field = 'estatein_' . $key;
			if ( isset( $_POST[ $field ] ) ) {
				$value = 'url' === $type ? esc_url_raw( wp_unslash( $_POST[ $field ] ) ) : ( 'textarea' === $type ? sanitize_textarea_field( wp_unslash( $_POST[ $field ] ) ) : sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
				update_post_meta( $post_id, '_estatein_' . $key, $value );
			}
		}
	}
}
