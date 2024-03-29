<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    prime_numbers_api_Plugin
 * @subpackage prime_numbers_api_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    prime_numbers_api_Plugin
 * @subpackage prime_numbers_api_Plugin/admin
 * @author     Your Name <email@example.com>
 */
class prime_numbers_api_Plugin_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $prime_numbers_api_plugin    The ID of this plugin.
	 */
	private $prime_numbers_api_plugin;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $prime_numbers_api_plugin       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $prime_numbers_api_plugin, $version ) {

		$this->prime_numbers_api_plugin = $prime_numbers_api_plugin;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in prime_numbers_api_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The prime_numbers_api_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		//$this->prime_numbers_api_plugin
		wp_enqueue_style( 'bootstrap-css', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'custom-css', plugin_dir_url( __FILE__ ) . 'css/prime-numbers-api-plugin-admin.css', array(), null, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in prime_numbers_api_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The prime_numbers_api_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->prime_numbers_api_plugin, plugin_dir_url( __FILE__ ) . 'js/prime-numbers-api-plugin-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add custom menu
	 *
	 * @since    1.0.0
	 */
	public function prime_plugin_admin_menu(){
		add_menu_page( 'Prime Numbers Dashboard', 'Prime Numbers Dashboard', 'manage_options', 'prime-numbers-api-plugin/mainsettings.php', array( $this , 'prime_plugin_admin_page') , 'dashicons-admin-generic', 250 );

		// add_submenu_page( 'prime-numbers-api-plugin/mainsettings.php', 'My Sub Level Menu Example', 'Sub Level Menu', 'manage_options', 'prime-numbers-api-plugin/importer.php', array($this, 'prime_plugin_admin_sub_page') );
	}

	public function prime_plugin_admin_page() {
		//return view
		require_once 'partials/prime-numbers-api-plugin-admin-display.php';
	}

	public function prime_plugin_admin_sub_page() {
		//return subpage view
		require_once 'partials/submenu_page.php';
	}

	/**
	 * Register custom fields for plugin settings
	 *
	 * @since    1.0.0
	 */

	 public function register_get_prime_settings() {
		 //registers all settings for general settings page
		 register_setting( 'get_prime_settings', 'api_key' );
		 register_setting( 'get_prime_settings', 'include_explanations' );
		 register_setting( 'get_prime_settings', 'include_prime_types_list' );
		 register_setting( 'get_prime_settings', 'language' );
		 register_setting( 'get_prime_settings', 'is_this_number_prime' );
		 register_setting( 'get_prime_settings', 'get_random_prime' );
		 register_setting( 'get_prime_settings', 'get_all_primes_between_two_numbers' );
		 register_setting( 'get_prime_settings', 'prospect_primes_between_two_numbers' );
		 register_setting( 'get_prime_settings', 'get_isolated_random_prime' );
	 }
}
