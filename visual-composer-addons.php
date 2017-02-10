<?php
/**
 * Plugin Name: Visual Composer addons
 * Plugin URI:  https://github.com/medfreeman/wp-visual-composer-addons
 * Description: A collection of addons for visual composer https://vc.wpbakery.com/
 * Version:     2.0.1
 * Author:      Mehdi Lahlou
 * Author URI:  https://github.com/medfreeman
 * Text Domain: vcaddons
 * Domain Path: /languages
 * License:     GPL-2.0+
 */

/**
 * Copyright (c) 2016 Mehdi Lahlou (email : mehdi.lahlou@free.fr)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Built using yo wp-make:plugin
 * Copyright (c) 2016 10up, LLC
 * https://github.com/10up/generator-wp-make
 */

namespace MedFreeman\WP\VisualComposerAddons;

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	return;
}

// Useful global constants
define( 'VCADDONS_VERSION', '2.0.0' );
define( 'VCADDONS_URL',     plugin_dir_url( __FILE__ ) );
define( 'VCADDONS_PATH',    dirname( __FILE__ ) . '/' );
define( 'VCADDONS_INC',     VCADDONS_PATH . 'includes/' );

// Include files
$autoload_path = __DIR__ . '/vendor/autoload.php';

if ( file_exists( $autoload_path ) ) {
    require_once( $autoload_path );
}

/**
 * Initializes the plugin.
 *
 * @return void
 */
function initialize() {
	$plugin = new Plugin();
	/**
	 * Allow other plugins to hook in and extend the plugin class
	 *
	 * @param Plugin $plugin
	 */
	do_action( 'vcaddons_loaded', $plugin );
}
add_action( 'after_setup_theme', 'MedFreeman\WP\VisualComposerAddons\initialize', 20 );

/**
 * Activate the plugin
 *
 * @uses init()
 * @uses flush_rewrite_rules()
 *
 * @return void
 */
function activate() {
	// First load the init scripts in case any rewrite functionality is being loaded.
	initialize();
	flush_rewrite_rules();
}

/**
 * Deactivate the plugin
 *
 * Uninstall routines should be in uninstall.php
 *
 * @return void
 */
function deactivate() {

}

// Activation/Deactivation
register_activation_hook( __FILE__, '\\MedFreeman\WP\VisualComposerAddons\activate' );
register_deactivation_hook( __FILE__, '\\MedFreeman\WP\VisualComposerAddons\deactivate' );
