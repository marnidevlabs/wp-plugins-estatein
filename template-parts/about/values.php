<?php
$values = array(
	array( '★', 'Trust', 'Trust is the cornerstone of every successful real estate transaction.' ),
	array( '≋', 'Excellence', 'We set the bar high for ourselves. From the properties we list to the services we provide.' ),
	array( '♣', 'Client-Centric', 'Your dreams and needs are at the center of our universe. We listen, understand.' ),
	array( '✦', 'Our Commitment', 'We are dedicated to providing you with the highest level of service and professionalism.' ),
);
?>
<section class="section values"><div class="container values__grid"><div>
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'Our Values', 'estatein' ),
		'description' => __( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.', 'estatein' ),
	)
);
?>
</div><div class="values-card">
<?php
foreach ( $values as $value ) {
	get_template_part(
		'template-parts/components/value-card',
		null,
		array(
			'icon'        => $value[0],
			'title'       => $value[1],
			'description' => $value[2],
		)
	); }
?>
</div></div></section>

