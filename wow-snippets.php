<?php

/**
 *
 * @link              https://wowwp.com
 * @since             1.0.0
 * @package           Wow_Snippets
 *
 * @wordpress-plugin
 * Plugin Name:       WOW Snippets - Code Snippet Manager
 * Plugin URI:        https://wowwp.com/wow-snippets
 * Description:       Lightweight code snippet manager with 200+ code snippets to customize WordPress & WooCommerce.
 * Version:           1.0.0
 * Author:            WOW WP
 * Author URI:        https://wowwp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wow-snippets
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WOW_SNIPPETS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wow-snippets-activator.php
 */
function activate_wow_snippets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wow-snippets-activator.php';
	Wow_Snippets_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wow-snippets-deactivator.php
 */
function deactivate_wow_snippets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wow-snippets-deactivator.php';
	Wow_Snippets_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wow_snippets' );
register_deactivation_hook( __FILE__, 'deactivate_wow_snippets' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wow-snippets.php';
require plugin_dir_path( __FILE__ ) . 'settings/settings.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wow_snippets() {

	$plugin = new Wow_Snippets();
	$plugin->run();

}
run_wow_snippets();
