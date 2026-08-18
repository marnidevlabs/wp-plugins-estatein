<?php
/** Estatein Services page. @package Estatein */
get_header();
?>
<main id="primary" class="site-main services-page">
	<section class="services-hero"><div class="container"><h1><?php esc_html_e( 'Elevate Your Real Estate Experience', 'estatein' ); ?></h1><p><?php esc_html_e( 'Welcome to Estatein, where your real estate aspirations meet expert guidance. Explore our comprehensive range of services, each designed to cater to your unique needs and dreams.', 'estatein' ); ?></p></div></section>
	<?php
	get_template_part( 'template-parts/services/feature-strip' );
	get_template_part(
		'template-parts/services/service-group',
		null,
		array(
			'title'       => __( 'Unlock Property Value', 'estatein' ),
			'description' => __( 'Selling your property should be a rewarding experience, and at Estatein, we make sure it is. Our Property Selling Service is designed to maximize the value of your property, ensuring you get the best deal possible.', 'estatein' ),
			'items'       => array(
				array( '▥', 'Valuation Mastery', 'Discover the true worth of your property with our expert valuation services.' ),
				array( '◔', 'Strategic Marketing', 'Selling a property requires more than just a listing; it demands a strategic marketing approach.' ),
				array( '▤', 'Negotiation Wizardry', 'Negotiating the best deal is an art, and our negotiation experts are masters of it.' ),
				array( '⚑', 'Closing Success', 'A successful sale is not complete until the closing. We guide you through the intricate closing process.' ),
			),
			'cta_title'   => __( 'Unlock the Value of Your Property Today', 'estatein' ),
			'cta_text'    => __( 'Ready to unlock the true value of your property? Explore our Property Selling Service categories and let us help you achieve the best deal possible for your valuable asset.', 'estatein' ),
		)
	);
	get_template_part(
		'template-parts/services/service-group',
		null,
		array(
			'title'       => __( 'Effortless Property Management', 'estatein' ),
			'description' => __( "Owning a property should be a pleasure, not a hassle. Estatein's Property Management Service takes the stress out of property ownership, offering comprehensive solutions tailored to your needs.", 'estatein' ),
			'items'       => array(
				array( '✣', 'Tenant Harmony', 'Our Tenant Management services ensure that your tenants have a smooth and reducing vacancies.' ),
				array( '◒', 'Maintenance Ease', 'Say goodbye to property maintenance headaches. We handle all aspects of property upkeep.' ),
				array( '✦', 'Financial Peace of Mind', 'Managing property finances can be complex. Our financial experts take care of rent collection.' ),
				array( '☼', 'Legal Guardian', 'Stay compliant with property laws and regulations effortlessly.' ),
			),
			'cta_title'   => __( 'Experience Effortless Property Management', 'estatein' ),
			'cta_text'    => __( 'Ready to experience hassle-free property management? Explore our Property Management Service categories and let us handle the complexities while you enjoy the benefits of property ownership.', 'estatein' ),
		)
	);
	get_template_part( 'template-parts/services/investments' );
	?>
</main>
<?php get_footer(); ?>
