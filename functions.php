<?php
/*
 * HostCodeLab Base - Theme Bootstrap
 * This file's ONLY job is to require the logic files in /inc/.
 * No theme logic lives here directly — see the spec's folder
 * structure rationale for why.
 * @package HostCodeLab_Base
 */

if(! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

// Theme-wide constants, available to every file in /inc/.
define('HCL_THEME_VERSION', wp_get_theme()->get('Version'));
define('HCL_THEME_DIR',get_template_directory());
define('HCL_THEME_URI', get_template_directory_uri());

/**
 * Files to bootstrap, in load order.
 * Each one is created in its own upcoming step — file_exists()
 * means this array can list files that don't exist yet without
 * fatal-erroring; they just get picked up the moment they land.
 */
$hcl_includes = array(
	'/inc/theme-setup.php',    // add_theme_support(), block template support
	'/inc/enqueue.php',        // CSS/JS asset registration
	'/inc/block-patterns.php', // Pattern registration
	'/inc/performance.php',    // Disable unused core features
);

foreach ($hcl_includes as $hcl_file){
	$hcl_path = HCL_THEME_DIR . $hcl_file;

	if(file_exists($hcl_path)) {
		require_once $hcl_path;
	}
}

unset($hcl_includes, $hcl_file, $hcl_path);