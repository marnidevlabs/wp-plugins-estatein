<?php
/** Default content used until editors publish managed records. @package Estatein */

namespace Estatein\Theme\Support;

final class Defaults {
	public static function team(): array {
		return array(
			array(
				'name'  => 'Max Mitchell',
				'role'  => 'Founder',
				'image' => 'team-max.svg',
			),
			array(
				'name'  => 'Sarah Johnson',
				'role'  => 'Chief Real Estate Officer',
				'image' => 'team-sarah.svg',
			),
			array(
				'name'  => 'David Brown',
				'role'  => 'Head of Property Management',
				'image' => 'team-david.svg',
			),
			array(
				'name'  => 'Michael Turner',
				'role'  => 'Legal Counsel',
				'image' => 'team-michael.svg',
			),
		);
	}

	public static function clients(): array {
		return array(
			array(
				'name'     => 'ABC Corporation',
				'year'     => '2019',
				'domain'   => 'Commercial Real Estate',
				'category' => 'Luxury Home Development',
				'quote'    => "Estatein's expertise in finding the perfect office space for our expanding operations was invaluable. They truly understand our business needs.",
			),
			array(
				'name'     => 'GreenTech Enterprises',
				'year'     => '2018',
				'domain'   => 'Commercial Real Estate',
				'category' => 'Retail Space',
				'quote'    => "Estatein's ability to identify prime retail locations helped us expand our brand presence. They are a trusted partner in our growth.",
			),
		);
	}

	public static function properties(): array {
		return array(
			array(
				'name'        => 'Seaside Serenity Villa',
				'description' => 'A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood.',
				'price'       => '$550,000',
				'bedrooms'    => '4',
				'bathrooms'   => '3',
				'type'        => 'Villa',
				'image'       => 'property-villa.svg',
			),
			array(
				'name'        => 'Metropolitan Haven',
				'description' => 'A chic and fully-furnished 2-bedroom apartment with panoramic city views.',
				'price'       => '$550,000',
				'bedrooms'    => '2',
				'bathrooms'   => '2',
				'type'        => 'Villa',
				'image'       => 'property-haven.svg',
			),
			array(
				'name'        => 'Rustic Retreat Cottage',
				'description' => 'An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community.',
				'price'       => '$550,000',
				'bedrooms'    => '3',
				'bathrooms'   => '3',
				'type'        => 'Villa',
				'image'       => 'property-tower.svg',
			),
		);
	}

	public static function testimonials(): array {
		return array(
			array(
				'title'    => 'Exceptional Service!',
				'quote'    => 'Our experience with Estatein was outstanding. Their team’s dedication and professionalism made finding our dream home a breeze. Highly recommended!',
				'person'   => 'Wade Warren',
				'location' => 'USA, California',
			),
			array(
				'title'    => 'Efficient and Reliable',
				'quote'    => 'Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price. We could not be happier with the results.',
				'person'   => 'Emelie Thomson',
				'location' => 'USA, Florida',
			),
			array(
				'title'    => 'Trusted Advisors',
				'quote'    => 'The Estatein team guided us through the entire buying process. Their knowledge and commitment to our needs were impressive.',
				'person'   => 'John Mans',
				'location' => 'USA, Nevada',
			),
		);
	}

	public static function faqs(): array {
		return array(
			array(
				'question' => 'How do I search for properties on Estatein?',
				'answer'   => 'Use our user-friendly search tools to find properties that match your criteria.',
			),
			array(
				'question' => 'What documents do I need to sell my property through Estatein?',
				'answer'   => 'Find out about the necessary documentation for listing your property with us.',
			),
			array(
				'question' => 'How can I contact an Estatein agent?',
				'answer'   => 'Discover the different ways you can get in touch with our experienced agents.',
			),
		);
	}
}
