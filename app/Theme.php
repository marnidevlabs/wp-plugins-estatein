<?php
/**
 * Main theme service registry.
 *
 * @package Estatein
 */

namespace Estatein\Theme;

use Estatein\Theme\Content\ContentTypes;
use Estatein\Theme\Content\MetaFields;
use Estatein\Theme\Content\PropertyInquiry;
use Estatein\Theme\Content\PropertySearch;
use Estatein\Theme\Content\ServicesPage;
use Estatein\Theme\Content\ContactPage;
use Estatein\Theme\Content\ContactForm;
use Estatein\Theme\Setup\Assets;
use Estatein\Theme\Setup\Menus;
use Estatein\Theme\Setup\Seo;
use Estatein\Theme\Setup\ThemeSupport;

final class Theme {
	/** Register each focused theme service. */
	public static function boot(): void {
		$services = array(
			new ThemeSupport(),
			new Menus(),
			new Assets(),
			new Seo(),
			new ContentTypes(),
			new MetaFields(),
			new PropertyInquiry(),
			new PropertySearch(),
			new ServicesPage(),
			new ContactPage(),
			new ContactForm(),
		);

		foreach ( $services as $service ) {
			$service->register();
		}
	}
}
