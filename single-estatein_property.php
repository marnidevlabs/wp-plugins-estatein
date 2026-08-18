<?php

/** Single property details template. @package Estatein */
get_header();
while ( have_posts() ) :
	the_post();
	$property_id = get_the_ID();
	$meta        = static function ( string $key, string $fallback = '' ) use ( $property_id ): string {
		$value = get_post_meta( $property_id, '_estatein_' . $key, true );
		return (string) ( $value ? $value : $fallback );
	};
	$gallery     = array();
	if ( has_post_thumbnail() ) {
		$gallery[] = get_post_thumbnail_id();
	}
	foreach ( get_attached_media( 'image', $property_id ) as $attachment ) {
		if ( ! in_array( $attachment->ID, $gallery, true ) ) {
			$gallery[] = $attachment->ID;
		}
	}
	$fallback_gallery = array( 'property-villa.svg', 'property-haven.svg', 'property-tower.svg', 'journey-house.svg' );
	$features         = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $meta( 'features', "Expansive oceanfront terrace for outdoor entertaining\nGourmet kitchen with top-of-the-line appliances\nPrivate beach access for morning strolls and sunset views\nMaster suite with a spa-inspired bathroom and ocean-facing balcony\nPrivate garage and ample storage space" ) ) ) );
	?>
	<main id="primary" class="site-main property-page">
		<section class="property-overview container">
			<header class="property-title">
				<div>
					<h1><?php the_title(); ?></h1><span>● <?php echo esc_html( $meta( 'location', 'Malibu, California' ) ); ?></span>
				</div>
				<div><small><?php esc_html_e( 'Price', 'estatein' ); ?></small><strong><?php echo esc_html( $meta( 'price', '$1,250,000' ) ); ?></strong></div>
			</header>
			<div class="property-gallery" data-property-gallery>
				<div class="property-thumbs" aria-label="<?php esc_attr_e( 'Choose a property image', 'estatein' ); ?>">
					<?php
					if ( $gallery ) {
						foreach ( $gallery as $index => $image_id ) {
							echo wp_get_attachment_image(
								$image_id,
								'thumbnail',
								false,
								array(
									'class'               => 0 === $index ? 'is-active' : '',
									'data-gallery-thumb'  => (string) $index,
									'data-gallery-source' => wp_get_attachment_image_url( $image_id, 'large' ),
									'role'                => 'button',
									'aria-label'          => sprintf( __( 'Show property image %d', 'estatein' ), $index + 1 ),
									'aria-pressed'        => 0 === $index ? 'true' : 'false',
									'tabindex'            => '0',
								)
							);
						}
					} else {
						foreach ( $fallback_gallery as $index => $image ) {
							?>
							<img class="<?php echo 0 === $index ? 'is-active' : ''; ?>" data-gallery-thumb="<?php echo esc_attr( (string) $index ); ?>" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/' . $image ) ); ?>" width="150" height="100" alt="" role="button" tabindex="0" aria-label="<?php echo esc_attr( sprintf( __( 'Show property image %d', 'estatein' ), $index + 1 ) ); ?>" aria-pressed="<?php echo 0 === $index ? 'true' : 'false'; ?>">
							<?php
						}
					}
					?>
				</div>
				<div class="property-gallery__stage">
					<?php
					if ( $gallery ) {
						foreach ( array_slice( $gallery, 0, 2 ) as $image_id ) {
							echo wp_get_attachment_image(
								$image_id,
								'large',
								false,
								array(
									'data-gallery-image' => '',
									'loading'            => 'eager',
								)
							);
						}
					} else {
						?>
						<img data-gallery-image src="<?php echo esc_url( get_theme_file_uri( '/assets/images/property-villa.svg' ) ); ?>" width="760" height="600" alt="<?php echo esc_attr( get_the_title() ); ?>"><img data-gallery-image src="<?php echo esc_url( get_theme_file_uri( '/assets/images/property-haven.svg' ) ); ?>" width="760" height="600" alt="<?php esc_attr_e( 'Interior view', 'estatein' ); ?>"><?php } ?>
				</div>
				<div class="property-gallery__controls"><button type="button" data-gallery-prev aria-label="<?php esc_attr_e( 'Previous property image', 'estatein' ); ?>">←</button><span></span><button type="button" data-gallery-next aria-label="<?php esc_attr_e( 'Next property image', 'estatein' ); ?>">→</button></div>
			</div>
			<div class="property-summary">
				<article class="property-description">
					<h2><?php esc_html_e( 'Description', 'estatein' ); ?></h2>
					<div><?php the_content(); ?></div>
					<dl>
						<div>
							<dt>▰ <?php esc_html_e( 'Bedrooms', 'estatein' ); ?></dt>
							<dd><?php echo esc_html( $meta( 'bedrooms', '04' ) ); ?></dd>
						</div>
						<div>
							<dt>♨ <?php esc_html_e( 'Bathrooms', 'estatein' ); ?></dt>
							<dd><?php echo esc_html( $meta( 'bathrooms', '03' ) ); ?></dd>
						</div>
						<div>
							<dt>▣ <?php esc_html_e( 'Area', 'estatein' ); ?></dt>
							<dd><?php echo esc_html( $meta( 'area', '2,500 Square Feet' ) ); ?></dd>
						</div>
					</dl>
				</article>
				<article class="property-features">
					<h2><?php esc_html_e( 'Key Features and Amenities', 'estatein' ); ?></h2>
					<ul>
						<?php
						foreach ( $features as $feature ) :
							?>
							<li>ϟ <?php echo esc_html( $feature ); ?></li><?php endforeach; ?>
					</ul>
				</article>
			</div>
		</section>
		<?php
		get_template_part(
			'template-parts/property/inquiry',
			null,
			array(
				'property_id' => $property_id,
				'location'    => $meta( 'location', 'Malibu, California' ),
			)
		);
		?>
		<?php get_template_part( 'template-parts/property/pricing', null, array( 'meta' => $meta ) ); ?>
		<?php get_template_part( 'template-parts/home/faqs' ); ?>
	</main>
<?php endwhile;
get_footer(); ?>
