<?php
/** Page template. @package Estatein */
get_header(); ?>
<main id="primary" class="site-main section"><div class="container prose">
<?php
while ( have_posts() ) :
	the_post();
	?>
	<article <?php post_class(); ?>><h1><?php the_title(); ?></h1><?php the_content(); ?></article><?php endwhile; ?></div></main>
<?php get_footer(); ?>
