<?php get_header(); ?><main id="primary" class="site-main section">
	<div class="container prose">
		<h1><?php esc_html_e( 'Page not found', 'estatein' ); ?></h1>
		<p><?php esc_html_e( 'The page you requested could not be found.', 'estatein' ); ?></p><a class="button button--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'estatein' ); ?></a>
	</div>
</main><?php get_footer(); ?>