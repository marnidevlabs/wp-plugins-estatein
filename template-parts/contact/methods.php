<?php
$methods = array( array( '✉', 'info@estatein.com', 'mailto:info@estatein.com' ), array( '☎', '+1 (123) 456-7890', 'tel:+11234567890' ), array( '●', 'Main Headquarters', '#office-locations' ) );
?>
<nav class="contact-methods" aria-label="<?php esc_attr_e( 'Contact methods', 'estatein' ); ?>"><div class="contact-method-grid">
<?php
foreach ( $methods as $method ) :
	?>
	<a class="contact-method-card" href="<?php echo esc_url( $method[2] ); ?>"><span class="contact-method-card__arrow" aria-hidden="true">↗</span><span class="icon-orb" aria-hidden="true"><?php echo esc_html( $method[0] ); ?></span><strong><?php echo esc_html( $method[1] ); ?></strong></a><?php endforeach; ?><div class="contact-method-card"><span class="contact-method-card__arrow" aria-hidden="true">↗</span><span class="icon-orb" aria-hidden="true">◕</span><div class="contact-social-links"><a href="#">Instagram</a><a href="#">LinkedIn</a><a href="#">Facebook</a></div></div></div></nav>

