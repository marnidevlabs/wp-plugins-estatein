<?php
/** Estatein homepage. @package Estatein */
get_header();
?>
<main id="primary" class="site-main home-page">
	<?php
	get_template_part( 'template-parts/home/hero' );
	get_template_part( 'template-parts/home/features' );
	get_template_part( 'template-parts/home/properties' );
	get_template_part( 'template-parts/home/testimonials' );
	get_template_part( 'template-parts/home/faqs' );
	?>
</main>
<?php get_footer(); ?>
