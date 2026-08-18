<?php
/** Estatein Contact page. @package Estatein */
get_header();
?>
<main id="primary" class="site-main contact-page">
	<section class="contact-hero"><div class="container"><h1><?php esc_html_e( 'Get in Touch with Estatein', 'estatein' ); ?></h1><p><?php esc_html_e( "Welcome to Estatein's Contact Us page. We're here to assist you with any inquiries, requests, or feedback you may have. Whether you're looking to buy or sell a property, explore investment opportunities, or simply want to connect, we're just a message away.", 'estatein' ); ?></p></div></section>
	<?php
	get_template_part( 'template-parts/contact/methods' );
	get_template_part( 'template-parts/contact/form' );
	get_template_part( 'template-parts/contact/offices' );
	get_template_part( 'template-parts/contact/gallery' );
	?>
</main>
<?php get_footer(); ?>
