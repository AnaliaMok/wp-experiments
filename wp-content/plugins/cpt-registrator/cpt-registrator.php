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
 * @package           CPT_Registrator
 *
 * @wordpress-plugin
 * Plugin Name:       CPT Registrator
 * Description:       Plugin framework for auto-registering and defining custom post types.
 * Version:           1.0.0
 * Author:            Analia Mok
 * Author URI:        https://analiamok.netlify.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cpt-registrator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'CPT_REGISTRATOR_VERSION', '1.0.0' );

/**
 * Execute plugin activation actions.
 *
 * @return void
 */
function activate_cpt_registrator() {
	require_once plugin_dir_path( __FILE__ ) . 'class-cpt-registrator.php';
	cpt_registrator_Activator::activate();
}

/**
 * Execute plugin deactivation actions.
 *
 * @return void
 */
function deactivate_cpt_registrator() {
	require_once plugin_dir_path( __FILE__ ) . 'class-cpt-registrator.php';
	cpt_registrator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cpt_registrator' );
register_deactivation_hook( __FILE__, 'deactivate_cpt_registrator' );

/**
 * The core plugin class.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cpt-registrator.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_cpt_registrator() {
	$plugin = new cpt_registrator();
	$plugin->run();
}
run_cpt_registrator();