<?php
/** Menu locations. @package Estatein */

namespace Estatein\Theme\Setup;

final class Menus {
	public function register(): void {
		add_action( 'after_setup_theme', array( $this, 'register_menus' ) );
	}

	public function register_menus(): void {
		register_nav_menus(
			array(
				'primary'           => __( 'Primary navigation', 'estatein' ),
				'footer_home'       => __( 'Footer: Home', 'estatein' ),
				'footer_about'      => __( 'Footer: About Us', 'estatein' ),
				'footer_properties' => __( 'Footer: Properties', 'estatein' ),
				'footer_services'   => __( 'Footer: Services', 'estatein' ),
				'footer_contact'    => __( 'Footer: Contact Us', 'estatein' ),
			)
		);
	}
}
