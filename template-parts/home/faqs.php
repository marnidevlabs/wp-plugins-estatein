<?php
use Estatein\Theme\Support\Defaults;

$faq_query = new WP_Query(
	array(
		'post_type'      => 'estatein_faq',
		'posts_per_page' => 9,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
		'no_found_rows'  => true,
	)
);
$faqs      = array();
foreach ( $faq_query->posts as $faq ) {
	$faqs[] = array(
		'question' => get_the_title( $faq ),
		'answer'   => $faq->post_excerpt ? $faq->post_excerpt : wp_strip_all_tags( $faq->post_content ),
	); }
if ( ! $faqs ) {
	$faqs = Defaults::faqs(); }
wp_reset_postdata();
?>
<section class="section home-section home-faqs"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'Frequently Asked Questions', 'estatein' ),
		'description' => __( "Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and assist you every step of the way.", 'estatein' ),
	)
);
?>
<a class="button button--secondary section-link" href="#faqs"><?php esc_html_e( 'View All FAQs', 'estatein' ); ?></a><div class="home-slider" data-home-slider id="faqs"><div class="faq-grid" data-home-track>
<?php
foreach ( $faqs as $faq ) :
	?>
	<article class="faq-card"><h3><?php echo esc_html( $faq['question'] ); ?></h3><p><?php echo esc_html( $faq['answer'] ); ?></p><a class="button button--secondary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Read More', 'estatein' ); ?></a></article><?php endforeach; ?></div></div>
	<?php
	get_template_part(
		'template-parts/home/slider-controls',
		null,
		array(
			'total' => count( $faqs ),
			'label' => __( 'frequently asked questions', 'estatein' ),
		)
	);
	?>
</div></section>
