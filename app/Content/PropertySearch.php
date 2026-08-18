<?php
/** Property archive filtering. @package Estatein */

namespace Estatein\Theme\Content;

final class PropertySearch {
	public function register(): void {
		add_action( 'pre_get_posts', array( $this, 'filter_archive' ) );
	}

	public function filter_archive( \WP_Query $query ): void {
		if ( is_admin() || ! $query->is_main_query() || ! $query->is_post_type_archive( 'estatein_property' ) ) {
			return;
		}

		$query->set( 'posts_per_page', 9 );
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Public, read-only archive filters.
		$keyword = isset( $_GET['property_search'] ) ? sanitize_text_field( wp_unslash( $_GET['property_search'] ) ) : '';
		if ( $keyword ) {
			$query->set( 's', $keyword );
		}

		$meta_query = array();
		foreach ( array( 'location', 'property_type', 'bedrooms', 'build_year' ) as $filter ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Public, read-only archive filters.
			$value = isset( $_GET[ $filter ] ) ? sanitize_text_field( wp_unslash( $_GET[ $filter ] ) ) : '';
			if ( $value ) {
				$meta_query[] = array(
					'key'     => '_estatein_' . $filter,
					'value'   => $value,
					'compare' => 'LIKE',
				);
			}
		}
		if ( $meta_query ) {
			$query->set( 'meta_query', $meta_query );
		}
	}
}
