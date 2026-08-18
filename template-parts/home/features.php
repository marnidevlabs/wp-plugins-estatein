<?php
$features = array( array( '▣', 'Find Your Dream Home', '/properties/' ), array( '▤', 'Unlock Property Value', '/services/' ), array( '▥', 'Effortless Property Management', '/services/' ), array( '✦', 'Smart Investments, Informed Decisions', '/services/' ) );
?>
<nav class="feature-strip" aria-label="<?php esc_attr_e( 'Real estate services', 'estatein' ); ?>"><div class="feature-grid">
<?php
foreach ( $features as $feature ) :
	?>
	<a class="feature-card" href="<?php echo esc_url( home_url( $feature[2] ) ); ?>"><span class="feature-card__arrow" aria-hidden="true">↗</span><span class="icon-orb" aria-hidden="true"><?php echo esc_html( $feature[0] ); ?></span><strong><?php echo esc_html( $feature[1] ); ?></strong></a><?php endforeach; ?></div></nav>

