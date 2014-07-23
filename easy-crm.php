<?php
/**
 * Plugin Name: Easy CRM
 * Plugin URI: http://decodingwp.com/easy-crm
 * Version: 1.0
 * Author: Dewane Mutunga
 * Author URI: http://dewanemutunga.com
 * Description: A simple, easy-to-use CRM system for WordPress
 * License: GPL2
 * Text Domain: ecrm
 */

/**
 * primary class for EasyCRM
 *
 * @since 1.0.0
 */
class EasyCRM {
     
    /**
     * Constructor for EasyCRM class. Called when plugin is initialised
     */
     public function __construct() {
		
		// define plugin name
		define( 'ECRM_NAME', 'EasyCRM' );
		
		// define plugin version
		define( 'ECRM_VERSION', '1.0' );
		
		// define plugin directory
		define( 'ECRM_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		
		// define plugin root file
		define( 'ECRM_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		// load text domain
		//add_action( 'init', array( $this, 'load_textdomain' ) );
		
		// require additional plugin files
		$this->includes();
	}
	
    /**
	 * require additional plugin files
	 *
	 * @since 1.0.0
	 */
	private function includes() {
		require_once( ECRM_DIR . 'includes/admin/class-ecrm-cpt.php' );				// custom post type class
		require_once( ECRM_DIR . 'includes/admin/class-ecrm-meta-box.php' );		// meta box class
	}
     
}
new EasyCRM;