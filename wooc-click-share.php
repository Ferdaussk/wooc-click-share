<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://bestwpdeveloper.com
 * @since             1.0
 * @package           WooC Click Share
 *
 * @wordpress-plugin
 * Plugin Name:       WooC Click Share
 * Plugin URI:        https://bestwpdeveloper.com/wooc-click-share/
 * Description:       Elevate your social presence by sharing chic products seamlessly using this WooCommerce add-on.
 * Version:           1.0
 * Author:            Best WP Developer
 * Author URI:        https://bestwpdeveloper.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wooc-click-share
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once ( plugin_dir_path(__FILE__) ) . '/inc/requires-check.php';
final class FinalWCLSRShop{
	const VERSION = '1.0';
	const MINIMUM_PHP_VERSION = '7.0';
	public function __construct() {
		// Load translation
		add_action( 'wclsr_init', array( $this, 'wclsr_loaded_textdomain' ) );
		// wclsr_init Plugin
		add_action( 'plugins_loaded', array( $this, 'wclsr_init' ) );
		// For woocommerce install check
		if ( ! did_action( 'woocommerce/loaded' ) ) {
			add_action( 'admin_notices', 'wclsr_WooCommerce_register_required_plugins' );
			return;
		}
	}

	public function wclsr_loaded_textdomain() {
		load_plugin_textdomain( 'wooc-click-share', false, basename(dirname(__FILE__)).'/languages' );
	}

	public function wclsr_init() {
		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'wclsr_admin_notice_minimum_php_version' ) );
			return;
		}

		// Once we get here, We have passed all validation checks so we can safely include our plugin
		require_once( 'prod-ready.php' );
		require_once( 'inc/demo.php' );
	}

	public function wclsr_admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wooc-click-share' ),
			'<strong>' . esc_html__( 'WooC Click Share', 'wooc-click-share' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'wooc-click-share' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>' . esc_html__('%1$s', 'wooc-click-share') . '</p></div>', $message );
	}
}

new FinalWCLSRShop();
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );