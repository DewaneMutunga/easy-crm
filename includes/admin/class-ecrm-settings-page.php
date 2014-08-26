<?php
/**
 * EasyCRM_Settings class
 *
 * This class is responsible for creating the EasyCRM settings page.
 *
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // no accessing this file directly
 
class EasyCRM_Settings {
	 
	 /**
	 * constructor for EasyCRM_Settings class
	 */
	 public function __construct() {
	 
	 	// load settings page
		add_action('admin_menu', array( $this, 'register_ecrm_settings_page' ) );
		
	 }
	 
	 /**
	 * add new settings page
	 */
	public function register_ecrm_settings_page() {
		
		// register settings page
		add_submenu_page('edit.php?post_type=contact', 'Settings', 'Settings', 'manage_options', 'ecrm-options', array(&$this, 'ecrm_settings_page') );
		
	}
	
	/**
	 * display EasyCRM setting page
	 *
	 * @callback_for 'ecrm_settings_page'
	 */
	public function ecrm_settings_page() {
		
		echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
			echo '<h2>EasyCRM Settings</h2>';
		echo '</div>';
	}
} 	
new EasyCRM_Settings();