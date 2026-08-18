<?php
$meta   = $args['meta'];
$groups = array(
	array( 'Additional Fees', array( array( 'Property Transfer Tax', $meta( 'transfer_tax', '$25,000' ), 'Based on the sale price and local regulations' ), array( 'Legal Fees', $meta( 'legal_fees', '$3,000' ), 'Approximate cost for legal services' ), array( 'Home Inspection', $meta( 'inspection_fee', '$500' ), 'Recommended for due diligence' ), array( 'Property Insurance', $meta( 'insurance', '$1,200' ), 'Annual cost for comprehensive insurance' ), array( 'Mortgage Fees', 'Varies', 'If applicable, consult with your lender' ) ) ),
	array( 'Monthly Costs', array( array( 'Property Taxes', $meta( 'property_taxes', '$1,250' ), 'Approximate monthly property tax' ), array( 'Homeowner Association Fee', $meta( 'hoa_fee', '$300' ), 'Monthly fee for maintenance and security' ) ) ),
	array( 'Total Initial Costs', array( array( 'Listing Price', $meta( 'price', '$1,250,000' ), '' ), array( 'Additional Fees', '$29,700', 'Property transfer tax, legal fees, inspection, insurance' ), array( 'Down Payment', $meta( 'down_payment', '$250,000' ), '20%' ), array( 'Mortgage Amount', $meta( 'mortgage_amount', '$1,000,000' ), 'If applicable' ) ) ),
	array( 'Monthly Expenses', array( array( 'Property Taxes', $meta( 'property_taxes', '$1,250' ), '' ), array( 'Homeowner Association Fee', $meta( 'hoa_fee', '$300' ), '' ), array( 'Mortgage Payment', 'Varies based on terms and interest rate', 'If applicable' ), array( 'Property Insurance', '$100', 'Approximate monthly cost' ) ) ),
);
?>
<section class="section property-pricing"><div class="container">
<?php
get_template_part(
	'template-parts/components/section-heading',
	null,
	array(
		'title'       => __( 'Comprehensive Pricing Details', 'estatein' ),
		'description' => __( 'At Estatein, transparency is key. We want you to have a clear understanding of all costs associated with your property investment. Below, we break down the pricing for this property to help you make an informed decision.', 'estatein' ),
	)
);
?>
<div class="pricing-note"><strong><?php esc_html_e( 'Note', 'estatein' ); ?></strong><span><?php esc_html_e( 'The figures provided above are estimates and may vary depending on the property, location, and individual circumstances.', 'estatein' ); ?></span></div><div class="pricing-layout"><aside><span><?php esc_html_e( 'Listing Price', 'estatein' ); ?></span><strong><?php echo esc_html( $meta( 'price', '$1,250,000' ) ); ?></strong></aside><div class="pricing-groups">
<?php
foreach ( $groups as $group ) :
	?>
	<article class="pricing-card"><header><h3><?php echo esc_html( $group[0] ); ?></h3><a class="button button--secondary" href="#property-inquiry"><?php esc_html_e( 'Learn More', 'estatein' ); ?></a></header><dl>
	<?php
	foreach ( $group[1] as $item ) :
		?>
	<div><dt><?php echo esc_html( $item[0] ); ?></dt><dd><strong><?php echo esc_html( $item[1] ); ?></strong>
		<?php
		if ( $item[2] ) :
			?>
	<span><?php echo esc_html( $item[2] ); ?></span><?php endif; ?></dd></div><?php endforeach; ?></dl></article><?php endforeach; ?></div></div></div></section>
