<?php
use Estatein\Theme\Support\Defaults;

$property_query = new WP_Query(
	array(
		'post_type'      => 'estatein_property',
		'posts_per_page' => 9,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
		'no_found_rows'  => true,
	)
);
$properties     = array();
foreach ( $property_query->posts as $property ) {
	$properties[] = array(
		'name'        => get_the_title( $property ),
		'description' => $property->post_excerpt ? $property->post_excerpt : wp_trim_words( wp_strip_all_tags( $property->post_content ), 18 ),
		'price'       => get_post_meta( $property->ID, '_estatein_price', true ),
		'bedrooms'    => get_post_meta( $property->ID, '_estatein_bedrooms', true ),
		'bathrooms'   => get_post_meta( $property->ID, '_estatein_bathrooms', true ),
		'type'        => get_post_meta( $property->ID, '_estatein_property_type', true ),
		'image_html'  => get_the_post_thumbnail( $property, 'large', array( 'loading' => 'lazy' ) ),
		'url'         => get_permalink( $property ),
	);
}
if ( ! $properties ) {
	$properties = array_map(
		static function ( array $property ): array {
			$property['name'] = sprintf( __( 'Demo: %s', 'estatein' ), $property['name'] );
			$property['url']  = get_post_type_archive_link( 'estatein_property' );
			return $property;
		},
		Defaults::properties()
	);
}
wp_reset_postdata();
?>
<section class="section home-section" id="featured-properties"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'Featured Properties', 'estatein' ),
		'description' => __( 'Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein.', 'estatein' ),
	)
);
?>
<a class="button button--secondary section-link" href="<?php echo esc_url( home_url( '/properties/' ) ); ?>"><?php esc_html_e( 'View All Properties', 'estatein' ); ?></a>
<div class="home-slider" data-home-slider><div class="property-grid" data-home-track>
<?php
foreach ( $properties as $property ) :
	?>
	<article class="property-card"><div class="property-card__image">
	<?php
	if ( ! empty( $property['image_html'] ) ) {
		echo wp_kses_post( $property['image_html'] ); } else {
		?>
	<?php if ( ! empty( $property['image'] ) ) : ?><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/' . $property['image'] ) ); ?>" width="620" height="440" alt="<?php echo esc_attr( $property['name'] ); ?>" loading="lazy"><?php else : ?><div class="property-card__placeholder" aria-hidden="true"></div><?php endif; ?><?php } ?></div><h3><?php echo esc_html( $property['name'] ); ?></h3><p><?php echo esc_html( $property['description'] ); ?> <a href="<?php echo esc_url( $property['url'] ); ?>"><?php esc_html_e( 'Read More', 'estatein' ); ?></a></p><div class="property-tags"><span>▰ <?php echo esc_html( $property['bedrooms'] . '-Bedroom' ); ?></span><span>♨ <?php echo esc_html( $property['bathrooms'] . '-Bathroom' ); ?></span><span>▣ <?php echo esc_html( $property['type'] ); ?></span></div><div class="property-card__bottom"><div><small><?php esc_html_e( 'Price', 'estatein' ); ?></small><strong><?php echo esc_html( $property['price'] ); ?></strong></div><a class="button button--primary" href="<?php echo esc_url( $property['url'] ); ?>"><?php esc_html_e( 'View Property Details', 'estatein' ); ?></a></div></article><?php endforeach; ?></div></div>
	<?php
	get_template_part(
		'template-parts/home/slider-controls',
		null,
		array(
			'total' => count( $properties ),
			'label' => __( 'properties', 'estatein' ),
		)
	);
	?>
</div></section>
