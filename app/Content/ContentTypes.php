<?php
/** Editable theme content types. @package Estatein */

namespace Estatein\Theme\Content;

final class ContentTypes {
	private const REWRITE_VERSION = '1.4.0';

	public function register(): void {
		add_action( 'init', array( $this, 'register_types' ) );
		add_action( 'init', array( $this, 'maybe_flush_rewrite_rules' ), 99 );
	}

	public function register_types(): void {
		$this->register_type( 'team_member', __( 'Team Members', 'estatein' ), __( 'Team Member', 'estatein' ), 'dashicons-groups', array( 'title', 'thumbnail', 'page-attributes' ) );
		$this->register_type( 'estatein_client', __( 'Clients', 'estatein' ), __( 'Client', 'estatein' ), 'dashicons-building', array( 'title', 'editor', 'excerpt', 'page-attributes' ) );
		$this->register_type( 'estatein_property', __( 'Properties', 'estatein' ), __( 'Property', 'estatein' ), 'dashicons-admin-home', array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ) );
		$this->register_type( 'estatein_testimonial', __( 'Testimonials', 'estatein' ), __( 'Testimonial', 'estatein' ), 'dashicons-format-quote', array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ) );
		$this->register_type( 'estatein_faq', __( 'FAQs', 'estatein' ), __( 'FAQ', 'estatein' ), 'dashicons-editor-help', array( 'title', 'editor', 'excerpt', 'page-attributes' ) );
	}

	public function maybe_flush_rewrite_rules(): void {
		if ( self::REWRITE_VERSION === get_option( 'estatein_rewrite_version' ) ) {
			return;
		}

		flush_rewrite_rules( false );
		update_option( 'estatein_rewrite_version', self::REWRITE_VERSION );
	}

	private function register_type( string $slug, string $plural, string $singular, string $icon, array $supports ): void {
		register_post_type(
			$slug,
			array(
				'labels'       => array(
					'name'          => $plural,
					'singular_name' => $singular,
					'add_new_item'  => sprintf( __( 'Add New %s', 'estatein' ), $singular ),
					'edit_item'     => sprintf( __( 'Edit %s', 'estatein' ), $singular ),
				),
				'public'       => true,
				'show_in_rest' => true,
				'has_archive'  => 'estatein_property' === $slug ? 'properties' : false,
				'menu_icon'    => $icon,
				'supports'     => $supports,
				'rewrite'      => array(
					'slug'       => 'estatein_property' === $slug ? 'properties' : $slug,
					'with_front' => false,
				),
			)
		);
	}
}
