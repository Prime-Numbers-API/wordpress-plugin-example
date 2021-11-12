<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           prime_numbers_api_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Prime Numbers API Plugin
 * Plugin URI:        http://example.com/prime-numbers-api-plugin-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       prime-numbers-api-plugin
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-prime-numbers-api-plugin-activator.php
 */
function activate_prime_numbers_api_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-prime-numbers-api-plugin-activator.php';
	prime_numbers_api_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-prime-numbers-api-plugin-deactivator.php
 */
function deactivate_prime_numbers_api_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-prime-numbers-api-plugin-deactivator.php';
	prime_numbers_api_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_prime_numbers_api_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_prime_numbers_api_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-prime-numbers-api-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_prime_numbers_api_plugin() {

	$plugin = new prime_numbers_api_Plugin();
	$plugin->run();

}
run_prime_numbers_api_plugin();
