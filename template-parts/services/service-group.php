<?php
$section_id = str_contains( strtolower( $args['title'] ), 'management' ) ? 'property-management' : 'property-value';
?>
<section class="section service-group" id="<?php echo esc_attr( $section_id ); ?>"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => $args['title'],
		'description' => $args['description'],
	)
);
?>
<div class="service-card-grid">
<?php
foreach ( $args['items'] as $item ) :
	?>
	<article class="service-card"><div><span class="icon-orb" aria-hidden="true"><?php echo esc_html( $item[0] ); ?></span><h3><?php echo esc_html( $item[1] ); ?></h3></div><p><?php echo esc_html( $item[2] ); ?></p></article><?php endforeach; ?><aside class="service-banner"><header><h3><?php echo esc_html( $args['cta_title'] ); ?></h3><a class="button button--secondary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Learn More', 'estatein' ); ?></a></header><p><?php echo esc_html( $args['cta_text'] ); ?></p></aside></div></div></section>

