<?php
use Estatein\Theme\Support\Defaults;

$testimonial_query = new WP_Query(
	array(
		'post_type'      => 'estatein_testimonial',
		'posts_per_page' => 9,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
		'no_found_rows'  => true,
	)
);
$testimonials      = array();
foreach ( $testimonial_query->posts as $testimonial ) {
	$rating         = (int) get_post_meta( $testimonial->ID, '_estatein_rating', true );
	$testimonials[] = array(
		'title'      => get_the_title( $testimonial ),
		'quote'      => $testimonial->post_excerpt ? $testimonial->post_excerpt : wp_strip_all_tags( $testimonial->post_content ),
		'person'     => get_post_meta( $testimonial->ID, '_estatein_person', true ),
		'location'   => get_post_meta( $testimonial->ID, '_estatein_location', true ),
		'rating'     => $rating ? max( 1, min( 5, $rating ) ) : 5,
		'image_html' => get_the_post_thumbnail( $testimonial, 'thumbnail', array( 'loading' => 'lazy' ) ),
	);
}
if ( ! $testimonials ) {
	$testimonials = array_map(
		static function ( array $testimonial ): array {
			$testimonial['title']  = sprintf( __( 'Demo: %s', 'estatein' ), $testimonial['title'] );
			$testimonial['rating'] = 5;
			return $testimonial;
		},
		Defaults::testimonials()
	);
}
wp_reset_postdata();
?>
<section class="section home-section"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'What Our Clients Say', 'estatein' ),
		'description' => __( 'Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.', 'estatein' ),
	)
);
?>
<div class="home-slider" data-home-slider id="testimonials"><div class="testimonial-grid" data-home-track>
<?php
foreach ( $testimonials as $testimonial ) :
	?>
	<article class="testimonial-card"><div class="stars" aria-label="<?php echo esc_attr( sprintf( __( '%1$d out of %2$d stars', 'estatein' ), $testimonial['rating'], 5 ) ); ?>"><?php echo esc_html( str_repeat( '★ ', $testimonial['rating'] ) . str_repeat( '☆ ', 5 - $testimonial['rating'] ) ); ?></div><h3><?php echo esc_html( $testimonial['title'] ); ?></h3><p><?php echo esc_html( $testimonial['quote'] ); ?></p><div class="reviewer">
	<?php
	if ( ! empty( $testimonial['image_html'] ) ) {
		echo wp_kses_post( $testimonial['image_html'] ); } else {
		?>
	<span class="reviewer__avatar" aria-hidden="true"><?php echo esc_html( strtoupper( substr( $testimonial['person'], 0, 1 ) ) ); ?></span><?php } ?><div><strong><?php echo esc_html( $testimonial['person'] ); ?></strong><span><?php echo esc_html( $testimonial['location'] ); ?></span></div></div></article><?php endforeach; ?></div></div>
	<?php
	get_template_part(
		'template-parts/home/slider-controls',
		null,
		array(
			'total' => count( $testimonials ),
			'label' => __( 'testimonials', 'estatein' ),
		)
	);
	?>
</div></section>
