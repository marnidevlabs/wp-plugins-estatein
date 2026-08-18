<?php
$items = array( array( '▥', 'Market Insight', 'Stay ahead of market trends with our expert Market Analysis. We provide in-depth insights into real estate market conditions.' ), array( '◉', 'ROI Assessment', 'Make investment decisions with confidence. Our ROI Assessment services evaluate the potential returns on your investments.' ), array( '⚑', 'Customized Strategies', 'Every investor is unique, and so are their goals. We develop Customized Investment Strategies tailored to your specific needs.' ), array( '✦', 'Diversification Mastery', 'Diversify your real estate portfolio effectively. Our experts guide you in spreading your investments across various property types and locations.' ) );
?>
<section class="section investments" id="investments"><div class="container investments__grid"><div>
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'Smart Investments, Informed Decisions', 'estatein' ),
		'description' => __( "Building a real estate portfolio requires a strategic approach. Estatein's Investment Advisory Service empowers you to make smart investments and informed decisions.", 'estatein' ),
	)
);
?>
<aside class="investment-banner"><h3><?php esc_html_e( 'Unlock Your Investment Potential', 'estatein' ); ?></h3><p><?php esc_html_e( 'Explore our Property Management Service categories and let us handle the complexities while you enjoy the benefits of property ownership.', 'estatein' ); ?></p><a class="button button--secondary" href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>"><?php esc_html_e( 'Learn More', 'estatein' ); ?></a></aside></div><div class="investment-cards">
<?php
foreach ( $items as $item ) :
	?>
	<article class="service-card"><div><span class="icon-orb" aria-hidden="true"><?php echo esc_html( $item[0] ); ?></span><h3><?php echo esc_html( $item[1] ); ?></h3></div><p><?php echo esc_html( $item[2] ); ?></p></article><?php endforeach; ?></div></div></section>
