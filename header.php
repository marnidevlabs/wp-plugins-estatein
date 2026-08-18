<?php
/** Site header. @package Estatein */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'estatein' ); ?></a>
<?php get_template_part( 'template-parts/global/announcement-bar' ); ?>
<?php get_template_part( 'template-parts/global/site-header' ); ?>
