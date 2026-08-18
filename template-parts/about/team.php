<?php
use Estatein\Theme\Support\Defaults;

$query   = new WP_Query(
	array(
		'post_type'      => 'team_member',
		'posts_per_page' => 12,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'date'       => 'ASC',
		),
		'no_found_rows'  => true,
	)
);
$members = array();
if ( $query->have_posts() ) {
	foreach ( $query->posts as $member ) {
		$members[] = array(
			'name'       => get_the_title( $member ),
			'role'       => get_post_meta( $member->ID, '_estatein_role', true ),
			'image_html' => get_the_post_thumbnail( $member, 'estatein-team', array( 'loading' => 'lazy' ) ),
			'social'     => get_post_meta( $member->ID, '_estatein_social_url', true ),
			'contact'    => get_post_meta( $member->ID, '_estatein_contact_url', true ),
		);
	}
} else {
	$members = Defaults::team();
}
wp_reset_postdata();
?>
<section class="section"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'Meet the Estatein Team', 'estatein' ),
		'description' => __( 'At Estatein, our success is driven by the dedication and expertise of our team. Get to know the people behind our mission to make your real estate dreams a reality.', 'estatein' ),
	)
);
?>
<div class="team-grid">
	<?php
	foreach ( $members as $member ) :
		?>
		<article class="team-card"><div class="team-card__image">
		<?php
		if ( ! empty( $member['image_html'] ) ) {
				echo wp_kses_post( $member['image_html'] ); } else {
			?>
		<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/' . $member['image'] ) ); ?>" width="500" height="430" alt="<?php echo esc_attr( $member['name'] ); ?>" loading="lazy"><?php } ?><a class="team-card__social" href="<?php echo esc_url( $member['social'] ?? '#' ); ?>" aria-label="<?php echo esc_attr( sprintf( __( '%s on X', 'estatein' ), $member['name'] ) ); ?>">♥</a></div><h3><?php echo esc_html( $member['name'] ); ?></h3><p><?php echo esc_html( $member['role'] ); ?></p><a class="hello" href="<?php echo esc_url( $member['contact'] ?? 'mailto:hello@example.com' ); ?>"><span><?php esc_html_e( 'Say Hello', 'estatein' ); ?> 👋</span><span class="send" aria-hidden="true">➤</span></a></article><?php endforeach; ?>
</div></div></section>

