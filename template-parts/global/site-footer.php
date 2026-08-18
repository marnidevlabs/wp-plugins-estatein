<?php
$footer_groups = array(
	'footer_home'       => array( 'Home', array( 'Hero Section', 'Features', 'Properties', 'Testimonials', 'FAQs' ) ),
	'footer_about'      => array( 'About Us', array( 'Our Story', 'Our Works', 'How It Works', 'Our Team', 'Our Clients' ) ),
	'footer_properties' => array( 'Properties', array( 'Portfolio', 'Categories' ) ),
	'footer_services'   => array( 'Services', array( 'Valuation Mastery', 'Strategic Marketing', 'Negotiation Wizardry', 'Closing Success', 'Property Management' ) ),
	'footer_contact'    => array( 'Contact Us', array( 'Contact Form', 'Our Offices' ) ),
);
?>
<footer class="site-footer">
	<div class="container footer-grid">
		<div class="footer-brand"><a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="brand__mark" aria-hidden="true"></span><span>Estatein</span></a><form class="newsletter" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get"><label class="screen-reader-text" for="estatein-email"><?php esc_html_e( 'Email address', 'estatein' ); ?></label><span aria-hidden="true">✉</span><input id="estatein-email" type="email" name="estatein_email" placeholder="<?php esc_attr_e( 'Enter Your Email', 'estatein' ); ?>" required><button type="submit" aria-label="<?php esc_attr_e( 'Continue to newsletter provider', 'estatein' ); ?>">➤</button></form></div>
		<?php foreach ( $footer_groups as $location => $group ) : ?>
			<div class="footer-menu"><h2><?php echo esc_html( $group[0] ); ?></h2>
			<?php
			if ( has_nav_menu( $location ) ) {
				wp_nav_menu(
					array(
						'theme_location' => $location,
						'container'      => false,
						'depth'          => 1,
					)
				);
			} else {
				echo '<ul>';
				foreach ( $group[1] as $label ) {
					printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( home_url( '/' ) ), esc_html( $label ) );
				} echo '</ul>'; }
			?>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="footer-bottom"><div class="container footer-bottom__inner"><div><span>©<?php echo esc_html( wp_date( 'Y' ) ); ?> Estatein. <?php esc_html_e( 'All Rights Reserved.', 'estatein' ); ?></span> <a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms & Conditions', 'estatein' ); ?></a></div><div class="socials"><a href="#" aria-label="Facebook">f</a><a href="#" aria-label="LinkedIn">in</a><a href="#" aria-label="X">x</a><a href="#" aria-label="YouTube">▶</a></div></div></div>
</footer>
