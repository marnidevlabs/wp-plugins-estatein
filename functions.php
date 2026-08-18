<?php
/**
 * Estatein theme bootstrap.
 *
 * @package Estatein
 */

defined( 'ABSPATH' ) || exit;

$estatein_autoloader = __DIR__ . '/vendor/autoload.php';

if ( file_exists( $estatein_autoloader ) ) {
	require_once $estatein_autoloader;
} else {
	spl_autoload_register(
		static function ( string $class_name ): void {
			$prefix = 'Estatein\\Theme\\';
			if ( ! str_starts_with( $class_name, $prefix ) ) {
				return;
			}
			$file = __DIR__ . '/app/' . str_replace( '\\', '/', substr( $class_name, strlen( $prefix ) ) ) . '.php';
			if ( is_readable( $file ) ) {
				require_once $file;
			}
		}
	);
}

Estatein\Theme\Theme::boot();
