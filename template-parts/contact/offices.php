<?php
$offices = array( array( 'Main Headquarters', '123 Estatein Plaza, City Center, Metropolis', 'Our main headquarters serve as the heart of Estatein. Located in the bustling city center, this is where our core team of experts operates.' ), array( 'Regional Offices', '456 Urban Avenue, Downtown District, Metropolis', "Estatein's presence extends to multiple regions, each with its own dynamic real estate landscape. Discover our regional offices, staffed by local experts." ) );
?>
<section class="section office-locations" id="office-locations"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'Discover Our Office Locations', 'estatein' ),
		'description' => __( 'Estatein is here to serve you across multiple locations. Whether you are looking to meet our team, discuss real estate opportunities, or simply drop by for a chat, we have offices conveniently located to serve your needs.', 'estatein' ),
	)
);
?>
<div class="office-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Office categories', 'estatein' ); ?>"><button class="is-active" type="button" role="tab" aria-selected="true" data-office-filter="all"><?php esc_html_e( 'All', 'estatein' ); ?></button><button type="button" role="tab" aria-selected="false" data-office-filter="regional"><?php esc_html_e( 'Regional', 'estatein' ); ?></button><button type="button" role="tab" aria-selected="false" data-office-filter="international"><?php esc_html_e( 'International', 'estatein' ); ?></button></div><div class="office-grid">
<?php
foreach ( $offices as $index => $office ) :
	?>
	<article class="office-card" data-office-card="<?php echo 0 === $index ? 'all' : 'regional'; ?>"><span><?php echo esc_html( $office[0] ); ?></span><h3><?php echo esc_html( $office[1] ); ?></h3><p><?php echo esc_html( $office[2] ); ?></p><div class="office-contacts"><a href="mailto:info@estatein.com">✉ info@estatein.com</a><a href="tel:+11234567890">☎ +1 (123) 456-7890</a><span>● Metropolis</span></div><a class="button button--primary" href="https://maps.google.com/?q=<?php echo esc_attr( rawurlencode( $office[1] ) ); ?>"><?php esc_html_e( 'Get Direction', 'estatein' ); ?></a></article><?php endforeach; ?></div></div></section>
