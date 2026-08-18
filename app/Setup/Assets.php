<?php
/** Frontend assets. @package Estatein */

namespace Estatein\Theme\Setup;

final class Assets {
	public function register(): void {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	public function enqueue(): void {
		$css_path = get_theme_file_path( '/assets/src/css/main.css' );
		$js_path  = get_theme_file_path( '/assets/src/js/main.js' );
		wp_enqueue_style( 'estatein', get_theme_file_uri( '/assets/src/css/main.css' ), array(), (string) filemtime( $css_path ) );
		wp_enqueue_script( 'estatein', get_theme_file_uri( '/assets/src/js/main.js' ), array(), (string) filemtime( $js_path ), true );
		wp_script_add_data( 'estatein', 'strategy', 'defer' );

		if ( is_front_page() ) {
			$home_css_path = get_theme_file_path( '/assets/src/css/home.css' );
			wp_enqueue_style( 'estatein-home', get_theme_file_uri( '/assets/src/css/home.css' ), array( 'estatein' ), (string) filemtime( $home_css_path ) );
		}

		if ( is_singular( 'estatein_property' ) ) {
			$property_css_path = get_theme_file_path( '/assets/src/css/property.css' );
			wp_enqueue_style( 'estatein-property', get_theme_file_uri( '/assets/src/css/property.css' ), array( 'estatein' ), (string) filemtime( $property_css_path ) );
		}

		if ( is_post_type_archive( 'estatein_property' ) ) {
			$properties_css_path = get_theme_file_path( '/assets/src/css/properties.css' );
			wp_enqueue_style( 'estatein-properties', get_theme_file_uri( '/assets/src/css/properties.css' ), array( 'estatein' ), (string) filemtime( $properties_css_path ) );
		}

		if ( get_query_var( 'estatein_services' ) ) {
			$services_css_path = get_theme_file_path( '/assets/src/css/services.css' );
			wp_enqueue_style( 'estatein-services', get_theme_file_uri( '/assets/src/css/services.css' ), array( 'estatein' ), (string) filemtime( $services_css_path ) );
		}

		if ( get_query_var( 'estatein_contact' ) ) {
			$contact_css_path = get_theme_file_path( '/assets/src/css/contact.css' );
			wp_enqueue_style( 'estatein-contact', get_theme_file_uri( '/assets/src/css/contact.css' ), array( 'estatein' ), (string) filemtime( $contact_css_path ) );
		}
	}
}
