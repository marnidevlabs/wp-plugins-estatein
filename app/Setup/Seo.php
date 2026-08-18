<?php
/**
 * Lightweight SEO metadata for sites without a dedicated SEO plugin.
 *
 * @package Estatein
 */

namespace Estatein\Theme\Setup;

final class Seo {
	/** Register front-end metadata hooks. */
	public function register(): void {
		add_action( 'wp_head', array( $this, 'render_metadata' ), 5 );
	}

	/** Output descriptions, canonical URLs, social metadata, and organization data. */
	public function render_metadata(): void {
		if ( is_admin() || defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) ) {
			return;
		}

		$title       = wp_get_document_title();
		$description = $this->description();
		$canonical   = $this->canonical_url();
		$type        = is_singular() ? 'article' : 'website';

		printf( "\n<meta name=\"description\" content=\"%s\">", esc_attr( $description ) );
		printf( "\n<link rel=\"canonical\" href=\"%s\">", esc_url( $canonical ) );
		printf( "\n<meta property=\"og:type\" content=\"%s\">", esc_attr( $type ) );
		printf( "\n<meta property=\"og:title\" content=\"%s\">", esc_attr( $title ) );
		printf( "\n<meta property=\"og:description\" content=\"%s\">", esc_attr( $description ) );
		printf( "\n<meta property=\"og:url\" content=\"%s\">", esc_url( $canonical ) );
		printf( "\n<meta property=\"og:site_name\" content=\"%s\">", esc_attr( get_bloginfo( 'name' ) ) );
		printf( "\n<meta name=\"twitter:card\" content=\"summary_large_image\">" );

		if ( is_singular() && has_post_thumbnail() ) {
			printf( "\n<meta property=\"og:image\" content=\"%s\">", esc_url( get_the_post_thumbnail_url( null, 'full' ) ) );
		}

		$schema = array(
			'@context' => 'https://schema.org',
			'@type'    => 'RealEstateAgent',
			'name'     => get_bloginfo( 'name' ),
			'url'      => home_url( '/' ),
			'email'    => get_option( 'admin_email' ),
		);

		printf( "\n<script type=\"application/ld+json\">%s</script>\n", wp_json_encode( $schema, JSON_UNESCAPED_SLASHES ) );
	}

	/** Build a concise page-specific description. */
	private function description(): string {
		if ( get_query_var( 'estatein_contact' ) ) {
			return __( 'Contact Estatein for help buying, selling, managing, or investing in property.', 'estatein' );
		}
		if ( get_query_var( 'estatein_services' ) ) {
			return __( 'Explore Estatein real estate services for buyers, sellers, owners, and investors.', 'estatein' );
		}
		if ( is_post_type_archive( 'estatein_property' ) ) {
			return __( 'Browse Estatein properties and filter listings by location, type, size, and year.', 'estatein' );
		}
		if ( is_singular() ) {
			$excerpt = has_excerpt() ? get_the_excerpt() : wp_strip_all_tags( get_the_content() );
			return wp_trim_words( $excerpt, 28, '' );
		}

		$description = get_bloginfo( 'description' );
		return $description ? $description : __( 'Discover properties and trusted real estate services with Estatein.', 'estatein' );
	}

	/** Determine the canonical URL for the current public view. */
	private function canonical_url(): string {
		if ( get_query_var( 'estatein_contact' ) ) {
			return home_url( '/contact-us/' );
		}
		if ( get_query_var( 'estatein_services' ) ) {
			return home_url( '/services/' );
		}
		if ( is_singular() ) {
			return (string) wp_get_canonical_url();
		}
		if ( is_post_type_archive( 'estatein_property' ) ) {
			return (string) get_post_type_archive_link( 'estatein_property' );
		}

		return home_url( add_query_arg( array(), $GLOBALS['wp']->request ?? '' ) );
	}
}
