<?php
/** Default index template. @package Estatein */
get_header(); ?>
<main id="primary" class="site-main section"><div class="container"><h1><?php bloginfo( 'name' ); ?></h1>
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class(); ?>><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></article>
		<?php
endwhile;
	the_posts_pagination(); else :
		?>
	<p><?php esc_html_e( 'No content found.', 'estatein' ); ?></p><?php endif; ?></div></main>
<?php get_footer(); ?>
