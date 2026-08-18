<?php
$stats = array( array( '200+', 'Happy Customers' ), array( '10k+', 'Properties For Clients' ), array( '16+', 'Years of Experience' ) );
?>
<section class="home-hero">
	<div class="home-hero__grid">
		<div class="home-hero__visual"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/hero-towers.svg' ) ); ?>" width="960" height="790" alt="<?php esc_attr_e( 'Blue illuminated modern high-rise buildings', 'estatein' ); ?>" fetchpriority="high"><span class="hero-badge" aria-hidden="true">↗<small>Discover Your Dream Property</small></span></div>
		<div class="home-hero__content"><h1><?php esc_html_e( 'Discover Your Dream Property with Estatein', 'estatein' ); ?></h1><p><?php esc_html_e( 'Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.', 'estatein' ); ?></p><div class="hero-actions"><a class="button button--secondary" href="#featured-properties"><?php esc_html_e( 'Learn More', 'estatein' ); ?></a><a class="button button--primary" href="<?php echo esc_url( home_url( '/properties/' ) ); ?>"><?php esc_html_e( 'Browse Properties', 'estatein' ); ?></a></div><div class="stats">
		<?php
		foreach ( $stats as $stat ) {
			get_template_part(
				'template-parts/components/stat-card',
				null,
				array(
					'value' => $stat[0],
					'label' => $stat[1],
				)
			); }
		?>
		</div></div>
	</div>
</section>
