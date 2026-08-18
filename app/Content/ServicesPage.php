<?php
/** Virtual Services page route. @package Estatein */

namespace Estatein\Theme\Content;

final class ServicesPage {
	public function register(): void {
		add_action( 'init', array( $this, 'register_route' ) );
		add_filter( 'query_vars', array( $this, 'register_query_var' ) );
		add_filter( 'template_include', array( $this, 'template' ) );
		add_filter( 'pre_get_document_title', array( $this, 'document_title' ) );
		add_filter( 'body_class', array( $this, 'body_class' ) );
		add_action( 'template_redirect', array( $this, 'normalize_response' ) );
	}

	public function register_route(): void {
		add_rewrite_rule( '^services/?$', 'index.php?estatein_services=1', 'top' );
	}

	public function register_query_var( array $query_vars ): array {
		$query_vars[] = 'estatein_services';
		return $query_vars;
	}

	public function template( string $template ): string {
		return get_query_var( 'estatein_services' ) ? get_theme_file_path( '/page-services.php' ) : $template;
	}

	public function document_title( string $title ): string {
		return get_query_var( 'estatein_services' ) ? __( 'Services', 'estatein' ) . ' – ' . get_bloginfo( 'name' ) : $title;
	}

	public function body_class( array $classes ): array {
		if ( get_query_var( 'estatein_services' ) ) {
			$classes[] = 'estatein-services-page';
		}
		return $classes;
	}

	public function normalize_response(): void {
		if ( ! get_query_var( 'estatein_services' ) ) {
			return;
		}

		global $wp_query;
		$wp_query->is_404 = false;
		status_header( 200 );
	}
}
