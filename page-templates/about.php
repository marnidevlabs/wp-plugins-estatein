<?php
/**
 * Template Name: About Estatein
 * Template Post Type: page
 *
 * @package Estatein
 */
get_header();
?>
<main id="primary" class="site-main about-page">
	<h1 class="screen-reader-text"><?php the_title(); ?></h1>
	<?php
	get_template_part( 'template-parts/about/journey' );
	get_template_part( 'template-parts/about/values' );
	get_template_part( 'template-parts/about/achievements' );
	get_template_part( 'template-parts/about/experience' );
	get_template_part( 'template-parts/about/team' );
	get_template_part( 'template-parts/about/clients' );
	?>
</main>
<?php get_footer(); ?>
