<?php
$items = array(
	array( '3+ Years of Excellence', "With over 3 years in the industry, we've amassed a wealth of knowledge and experience." ),
	array( 'Happy Clients', 'Our greatest achievement is the satisfaction of our clients. Their success stories fuel our passion for what we do.' ),
	array( 'Industry Recognition', "We've earned the respect of our peers and industry leaders, with accolades and awards that reflect our commitment to excellence." ),
);
?>
<section class="section"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'Our Achievements', 'estatein' ),
		'description' => __( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.', 'estatein' ),
	)
);
?>
<div class="achievements-grid">
<?php
foreach ( $items as $item ) {
	get_template_part(
		'template-parts/components/achievement-card',
		null,
		array(
			'title'       => $item[0],
			'description' => $item[1],
		)
	); }
?>
</div></div></section>

