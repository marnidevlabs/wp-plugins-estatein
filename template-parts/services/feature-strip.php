<?php
$features = array( array( '▣', 'Find Your Dream Home', '/properties/' ), array( '▤', 'Unlock Property Value', '#property-value' ), array( '▥', 'Effortless Property Management', '#property-management' ), array( '✦', 'Smart Investments, Informed Decisions', '#investments' ) );
?>
<nav class="services-feature-strip" aria-label="<?php esc_attr_e( 'Estatein services', 'estatein' ); ?>"><div class="services-feature-grid">
<?php
foreach ( $features as $feature ) :
	?>
	<a class="services-feature-card" href="<?php echo esc_url( str_starts_with( $feature[2], '#' ) ? $feature[2] : home_url( $feature[2] ) ); ?>"><span class="services-feature-card__arrow" aria-hidden="true">↗</span><span class="icon-orb" aria-hidden="true"><?php echo esc_html( $feature[0] ); ?></span><strong><?php echo esc_html( $feature[1] ); ?></strong></a><?php endforeach; ?></div></nav>

