<?php
/**
 * HostCodeLab Base — Theme Setup
 *
 * Registers theme support flags on after_setup_theme.
 * No output, no markup — feature declarations only.
 *
 * @package HostCodeLab_Base
 */

if(! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Register theme supports and load the translation textdomain.
 */


function hcl_theme_setup() {
    // Translation-ready (matches languages/hostcodelab-base.pot from the spec).
	load_theme_textdomain( 'hostcodelab-base', HCL_THEME_DIR . '/languages' );

	// <title> tag handled by WP core instead of a hardcoded <title> in templates.
	add_theme_support( 'title-tag' );

	// Featured Image support — required even in block themes; not implied by theme.json.
	add_theme_support( 'post-thumbnails' );

	// RSS/Atom feed <link> auto-discovery in <head>.
	add_theme_support( 'automatic-feed-links' );

	// Responsive iframes for embedded YouTube/Vimeo/etc. (wraps embeds so they scale).
	add_theme_support( 'responsive-embeds' );

	// Flags that editor styles CAN be loaded. The actual file is enqueued
	// in inc/enqueue.php once assets/css/editor-style.css exists.
	add_theme_support( 'editor-styles' );

	// Loads WordPress core's baseline CSS for blocks (e.g. separator, gallery)
	// so unstyled core blocks aren't broken out of the box. Revisit in the
	// Performance Pass phase if any of it proves redundant with theme.json.
	add_theme_support( 'wp-block-styles' );

	// Modern semantic markup for search/comment forms, galleries, captions.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

}

add_action( 'after_setup_theme', 'hcl_theme_setup' );

/**
 * Legacy $content_width global — kept in sync with theme.json's
 * settings.layout.contentSize so oEmbeds/large images don't render
 * wider than the actual content column.
 */
function hcl_content_width() {
	$GLOBALS['content_width'] = 720;
}
add_action( 'after_setup_theme', 'hcl_content_width', 0 );