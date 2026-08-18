<?php
$fallback_menu = static function (): void {
	$items = array(
		'Home'       => '/',
		'About Us'   => '/about-us/',
		'Properties' => '/properties/',
		'Services'   => '/services/',
	);
	echo '<ul class="menu">';
	foreach ( $items as $label => $path ) {
		$is_current = is_page( trim( $path, '/' ) ) || ( '/services/' === $path && get_query_var( 'estatein_services' ) ) || ( '/properties/' === $path && is_post_type_archive( 'estatein_property' ) );
		printf( '<li><a href="%1$s"%2$s>%3$s</a></li>', esc_url( home_url( $path ) ), $is_current ? ' aria-current="page"' : '', esc_html( $label ) );
	}
	echo '</ul>';
};
?>
<header class="site-header">
	<div class="container site-header__inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php esc_attr_e( 'Estatein home', 'estatein' ); ?>"><span class="brand__mark" aria-hidden="true"></span><span>Estatein</span></a>
		<button class="nav-toggle" type="button" data-menu-toggle aria-expanded="false" aria-controls="primary-menu"><span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'estatein' ); ?></span><span></span><span></span><span></span></button>
		<nav class="primary-nav" id="primary-menu" data-menu aria-label="<?php esc_attr_e( 'Primary navigation', 'estatein' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'fallback_cb'    => $fallback_menu,
					'depth'          => 1,
				)
			);
			?>
			<a class="button <?php echo get_query_var( 'estatein_contact' ) ? 'button--primary' : 'button--secondary'; ?> nav-contact" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"<?php echo get_query_var( 'estatein_contact' ) ? ' aria-current="page"' : ''; ?>><?php esc_html_e( 'Contact Us', 'estatein' ); ?></a>
		</nav>
	</div>
</header>
