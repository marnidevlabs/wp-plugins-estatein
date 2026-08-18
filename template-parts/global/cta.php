<?php if ( ! is_404() ) : ?>
<section class="cta">
	<div class="container cta__inner">
		<div><h2><?php esc_html_e( 'Start Your Real Estate Journey Today', 'estatein' ); ?></h2><p><?php esc_html_e( "Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way.", 'estatein' ); ?></p></div>
		<a class="button button--primary" href="<?php echo esc_url( home_url( '/properties/' ) ); ?>"><?php esc_html_e( 'Explore Properties', 'estatein' ); ?></a>
	</div>
</section>
<?php endif; ?>
