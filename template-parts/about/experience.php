<?php
$steps = array(
	array( 'Discover a World of Possibilities', 'Your journey begins with exploring our carefully curated property listings. Use our intuitive search tools to filter properties based on your preferences, including location.' ),
	array( 'Narrowing Down Your Choices', 'Once you have found properties that catch your eye, save them to your account or make a shortlist. This allows you to compare and revisit your favorites.' ),
	array( 'Personalized Guidance', 'Have questions about a property or need more information? Our dedicated team of real estate experts is just a call or message away.' ),
	array( 'See It for Yourself', 'Arrange viewings of the properties you are interested in. We will coordinate with the property owners and accompany you.' ),
	array( 'Making Informed Decisions', 'Before making an offer, our team will assist you with due diligence, including property inspections, legal checks, and market analysis.' ),
	array( 'Getting the Best Deal', 'We will help you negotiate the best terms and prepare your offer. Our goal is to secure the property at the right price.' ),
);
?>
<section class="section"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'Navigating the Estatein Experience', 'estatein' ),
		'description' => __( "At Estatein, we've designed a straightforward process to help you find and purchase your dream property with ease. Here's a step-by-step guide to how it all works.", 'estatein' ),
	)
);
?>
<div class="process-grid">
<?php
foreach ( $steps as $index => $step ) {
	get_template_part(
		'template-parts/components/process-card',
		null,
		array(
			'number'      => str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ),
			'title'       => $step[0],
			'description' => $step[1],
		)
	); }
?>
</div></div></section>
