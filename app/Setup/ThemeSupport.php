<?php
/** Theme support registration. @package Estatein */

namespace Estatein\Theme\Setup;

final class ThemeSupport {
	public function register(): void {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'after_setup_theme', array( $this, 'content_width' ), 0 );
	}

	public function setup(): void {
		load_theme_textdomain( 'estatein', get_template_directory() . '/languages' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
		add_editor_style( 'assets/src/css/editor.css' );
		add_image_size( 'estatein-team', 600, 520, true );
	}

	public function content_width(): void {
		$GLOBALS['content_width'] = apply_filters( 'estatein_content_width', 1596 );
	}
}
