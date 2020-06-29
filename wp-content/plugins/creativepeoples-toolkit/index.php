<?php
/**
 * Plugin Name: CreativePeoples Elementor Extension
 * Description: Elementor Companion extension for Theme.
 * Plugin URI:  https://developers.elementor.com/
 * Version:     1.0.0
 * Author:      CreativePeoples
 * Author URI:  https://elementor.com/
 * Text Domain: cp-toolkit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main CreativePeoples Elementor Extension Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Cp_Toolkit_Extenstion {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Cp_Toolkit_Extenstion The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Cp_Toolkit_Extenstion An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'cp-toolkit' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'cp-toolkit' ),
			'<strong>' . esc_html__( 'CreativePeoples Elementor Extension', 'cp-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'cp-toolkit' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cp-toolkit' ),
			'<strong>' . esc_html__( 'CreativePeoples Elementor Extension', 'cp-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'cp-toolkit' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'cp-toolkit' ),
			'<strong>' . esc_html__( 'CreativePeoples Elementor Extension', 'cp-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'cp-toolkit' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/hero-area.php'); 
		require_once( __DIR__ . '/widgets/works.php'); 
		require_once( __DIR__ . '/widgets/lenders.php'); 
		require_once( __DIR__ . '/widgets/home-easey.php'); 
		require_once( __DIR__ . '/widgets/why-we-area.php'); 
		require_once( __DIR__ . '/widgets/we-cover.php'); 
		require_once( __DIR__ . '/widgets/would-like.php'); 
		require_once( __DIR__ . '/widgets/process.php'); 

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Hero_Area_Widget() ); 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \works_section_Widget() ); 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \lenders_section_Widget() ); 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \home_easy_section_Widget() ); 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \wehy_we_are_section_Widget() ); 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \we_cover_section_Widget() ); 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \would_like_section_Widget() ); 
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \process_section_Widget() ); 

	}

}

Cp_Toolkit_Extenstion::instance();

function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'creative-peoples',
		[
			'title' => __( 'CreativePeoples', 'plugin-name' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );


/**
 * Code start framework
*/
require(__DIR__ . '/lib/cs/cs-framework.php');