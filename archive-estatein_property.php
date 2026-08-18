<?php

/** Property archive template. @package Estatein */
get_header();
?>
<main id="primary" class="site-main properties-page">
	<section class="properties-hero">
		<div class="container">
			<h1><?php esc_html_e( 'Find Your Dream Property', 'estatein' ); ?></h1>
			<p><?php esc_html_e( 'Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story and a chance to redefine your life.', 'estatein' ); ?></p>
		</div>
	</section>
	<form class="property-search container" action="<?php echo esc_url( get_post_type_archive_link( 'estatein_property' ) ); ?>" method="get" role="search">
		<div class="property-search__keyword"><label class="screen-reader-text" for="property-search"><?php esc_html_e( 'Search for a property', 'estatein' ); ?></label><input id="property-search" name="property_search" type="search" placeholder="<?php esc_attr_e( 'Search For A Property', 'estatein' ); ?>"><button class="button button--primary" type="submit">⌕ <span><?php esc_html_e( 'Find Property', 'estatein' ); ?></span></button></div>
		<div class="property-filters"><label><span class="screen-reader-text"><?php esc_html_e( 'Filter by location', 'estatein' ); ?></span><span aria-hidden="true">●</span><select name="location">
					<option value=""><?php esc_html_e( 'Location', 'estatein' ); ?></option>
					<option>Malibu</option>
					<option>California</option>
					<option>Florida</option>
				</select></label><label><span class="screen-reader-text"><?php esc_html_e( 'Filter by property type', 'estatein' ); ?></span><span aria-hidden="true">▥</span><select name="property_type">
					<option value=""><?php esc_html_e( 'Property Type', 'estatein' ); ?></option>
					<option>Villa</option>
					<option>Apartment</option>
					<option>Townhouse</option>
				</select></label><label><span class="screen-reader-text"><?php esc_html_e( 'Filter by number of bedrooms', 'estatein' ); ?></span><span aria-hidden="true">▣</span><select name="bedrooms">
					<option value=""><?php esc_html_e( 'Property Size', 'estatein' ); ?></option>
					<option value="1">1+ Bedroom</option>
					<option value="2">2+ Bedrooms</option>
					<option value="3">3+ Bedrooms</option>
					<option value="4">4+ Bedrooms</option>
				</select></label><label><span class="screen-reader-text"><?php esc_html_e( 'Filter by build year', 'estatein' ); ?></span><span aria-hidden="true">□</span><select name="build_year">
					<option value=""><?php esc_html_e( 'Build Year', 'estatein' ); ?></option>
					<option>2026</option>
					<option>2025</option>
					<option>2024</option>
					<option>2023</option>
				</select></label></div>
	</form>
	<section class="section properties-results">
		<div class="container">
			<?php
			get_template_part(
				'template-parts/components/section-heading',
				null,
				array(
					'title'       => __( 'Discover a World of Possibilities', 'estatein' ),
					'description' => __( 'Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property that resonates with your vision of home.', 'estatein' ),
				)
			);
			?>
			<div class="archive-property-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						$property_id = get_the_ID();
						$tagline     = get_post_meta( $property_id, '_estatein_tagline', true );
						$summary     = get_the_excerpt();
						$price       = get_post_meta( $property_id, '_estatein_price', true );
						?>
						<article class="archive-property-card">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) );
							} else {
								?>
								<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/property-villa.svg' ) ); ?>" width="620" height="440" alt="<?php the_title_attribute(); ?>" loading="lazy"><?php } ?><span class="property-tagline"><?php echo esc_html( $tagline ? $tagline : __( 'Coastal Escapes - Where Waves Beckon', 'estatein' ) ); ?></span>
							<h2><?php the_title(); ?></h2>
							<p><?php echo esc_html( $summary ? $summary : wp_trim_words( wp_strip_all_tags( get_the_content() ), 18 ) ); ?> <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'estatein' ); ?></a></p>
							<div class="archive-property-card__bottom">
								<div><small><?php esc_html_e( 'Price', 'estatein' ); ?></small><strong><?php echo esc_html( $price ? $price : '$1,250,000' ); ?></strong></div><a class="button button--primary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View Property Details', 'estatein' ); ?></a>
							</div>
						</article>
						<?php
					endwhile;
				else :
					?>
					<p class="no-properties"><?php esc_html_e( 'No properties matched your search. Try adjusting the filters.', 'estatein' ); ?></p><?php endif; ?>
			</div>
			<div class="property-pagination">
				<?php
				the_posts_pagination(
					array(
						'prev_text' => '←',
						'next_text' => '→',
					)
				);
				?>
			</div>
		</div>
	</section>
	<?php get_template_part( 'template-parts/property/buyer-inquiry' ); ?>
</main>
<?php get_footer(); ?>
