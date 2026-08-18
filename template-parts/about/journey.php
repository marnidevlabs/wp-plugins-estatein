<?php
$stats = array( array( '200+', 'Happy Customers' ), array( '10k+', 'Properties For Clients' ), array( '16+', 'Years of Experience' ) );
?>
<section class="section journey"><div class="container journey__grid">
	<div class="journey__visual"><img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/journey-house.svg' ) ); ?>" width="760" height="640" alt="<?php esc_attr_e( 'Modern home model presented on an open hand', 'estatein' ); ?>" fetchpriority="high"></div>
	<div class="journey__content">
	<?php
	get_template_part(
		'template-parts/components/section-heading',
		null,
		array(
			'title'       => __( 'Our Journey', 'estatein' ),
			'description' => __( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary. Over the years, we expanded our reach, forged valuable partnerships, and gained the trust of countless clients.', 'estatein' ),
		)
	);
	?>
	<div class="stats">
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
</div></section>

