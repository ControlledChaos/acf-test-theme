<?php
/**
 * Theme configuration
 *
 * The constants defined here do not override any default behavior
 * or default user interfaces. However, the corresponding behavior
 * can be overridden in the system config file (e.g. `wp-config`,
 * `app-config` ).
 *
 * The reason for using constants in the config file rather than
 * in a settings file is to prevent site administrators wrongly
 * or incorrectly configuring the site built by developers.
 *
 * @package    BS_Theme
 * @subpackage Includes
 * @category   Configuration
 * @since      1.0.0
 */

namespace BS_Theme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Constant: Theme version
 *
 * Keeping the version at 1.0.0 as this is a starter theme but
 * you may want to start counting as you develop for your use case.
 *
 * Remember to find and replace the `@version x.x.x` in docblocks.
 *
 * @since 1.0.0
 * @var   string The latest theme version.
 */
$theme_version = wp_get_theme()->get( 'Version' );
define( 'BST_VERSION', $theme_version );

/**
 * Constant: Theme file path
 *
 * @since 1.0.0
 * @var   string File path with trailing slash.
 */
$theme_path = get_template_directory();
define( 'BST_PATH', $theme_path . '/' );

/**
 * Constant: Theme file URL
 *
 * @since 1.0.0
 * @var   string
 */
$theme_path = get_template_directory_uri();
define( 'BST_URL', $theme_path );

/**
 * Constant: Companion plugin active
 *
 * Looks for a companion plugin as defined in the variables
 * and returns true or false depending on the presence and
 * activation of the plugin.
 *
 * Variables used refer to the companion starter plugin for
 * this starter theme. Change for your plugin.
 *
 * @link https://github.com/ControlledChaos/bs-plugin
 *
 * @example ```if ( BST_COMPANION ) {
 *     // Execute code.
 * }```
 */

// Plugin directory.
$companion_dir  = 'bs-plugin';

// Core plugin filename.
$companion_file = 'bs-plugin.php';

// Return false by default.
$companion = false;

/**
 * Return true if the plugin exists and is active.
 * Namespace escaped as it sometimes causes an error.
 */
if ( \is_plugin_active( "$companion_dir/$companion_file" ) ) {
	$companion = true;
}

// Define the companion plugin constant.
define( 'BST_COMPANION', $companion );

/**
 * Check for block editor
 *
 * @since  1.0.0
 * @access public
 * @global integer $wp_version
 * @return boolean Returns false if ClassicPress or
 *                 if WordPress is less than 5.0.
 *                 Default is true.
 */
function bst_has_blocks() {

	// Get WordPress version.
	global $wp_version;

	// Simple check for ClassicPress.
	if ( function_exists( 'classicpress_version' ) ) {
		return false;

	// Compare WordPress version to less than 5.0 (introduction of blocks).
	} elseif ( version_compare( $wp_version,'4.9.9' ) <= 0 ) {
		return false;
	}

	// Default is true.
	return true;
}
