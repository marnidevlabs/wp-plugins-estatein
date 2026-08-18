<?php
use Estatein\Theme\Support\Defaults;

$query   = new WP_Query(
	array(
		'post_type'      => 'estatein_client',
		'posts_per_page' => 20,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'ASC',
		),
		'no_found_rows'  => true,
	)
);
$clients = array();
if ( $query->have_posts() ) {
	foreach ( $query->posts as $client ) {
		$clients[] = array(
			'name'     => get_the_title( $client ),
			'year'     => get_post_meta( $client->ID, '_estatein_year', true ),
			'website'  => get_post_meta( $client->ID, '_estatein_website', true ),
			'domain'   => get_post_meta( $client->ID, '_estatein_domain', true ),
			'category' => get_post_meta( $client->ID, '_estatein_category', true ),
			'quote'    => $client->post_excerpt ? $client->post_excerpt : wp_strip_all_tags( $client->post_content ),
		);
	}
} else {
	$clients = Defaults::clients(); }
wp_reset_postdata();
?>
<section class="section clients"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'Our Valued Clients', 'estatein' ),
		'description' => __( "At Estatein, we have had the privilege of working with a diverse range of clients across various industries. Here are some of the clients we've had the pleasure of serving.", 'estatein' ),
	)
);
?>
	<div class="client-viewport" data-carousel tabindex="0" aria-label="<?php esc_attr_e( 'Client stories carousel', 'estatein' ); ?>"><div class="client-track" data-carousel-track>
	<?php
	foreach ( $clients as $client ) :
		?>
		<article class="client-card"><div class="client-card__top"><div><span><?php echo esc_html( sprintf( __( 'Since %s', 'estatein' ), $client['year'] ) ); ?></span><h3><?php echo esc_html( $client['name'] ); ?></h3></div><a class="button button--secondary" href="<?php echo esc_url( $client['website'] ?? '#' ); ?>"><?php esc_html_e( 'Visit Website', 'estatein' ); ?></a></div><div class="client-meta"><div><span>⌘ <?php esc_html_e( 'Domain', 'estatein' ); ?></span><strong><?php echo esc_html( $client['domain'] ); ?></strong></div><div><span>ϟ <?php esc_html_e( 'Category', 'estatein' ); ?></span><strong><?php echo esc_html( $client['category'] ); ?></strong></div></div><blockquote><span><?php esc_html_e( 'What They Said', 'estatein' ); ?> 🙌</span><p><?php echo esc_html( $client['quote'] ); ?></p></blockquote></article><?php endforeach; ?></div></div>
	<div class="carousel-controls"><span><strong data-carousel-current>01</strong> <?php echo esc_html_x( 'of', 'carousel count', 'estatein' ); ?> <span data-carousel-total><?php echo esc_html( str_pad( (string) count( $clients ), 2, '0', STR_PAD_LEFT ) ); ?></span></span><div><button type="button" data-carousel-prev aria-label="<?php esc_attr_e( 'Previous clients', 'estatein' ); ?>">←</button><button type="button" data-carousel-next aria-label="<?php esc_attr_e( 'Next clients', 'estatein' ); ?>">→</button></div></div>
</div></section>
