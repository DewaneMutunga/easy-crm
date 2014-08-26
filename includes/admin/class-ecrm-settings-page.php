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
		add_submenu_page('edit.php?post_type=contact', 'Settings', 'Settings', 'manage_options', 'ecrm-settings', array(&$this, 'ecrm_settings_page') );
		
	}
	
	/**
	 * display EasyCRM setting page
	 *
	 * @callback_for 'ecrm_settings_page'
	 */
	public function ecrm_settings_page() {
		
	?>
	    <!-- Create a header in the default WordPress 'wrap' container -->
	    <div class="wrap">
	     
	        <div id="icon-themes" class="icon32"></div>
	        <h2>EasyCRM Settings</h2>
	        <?php settings_errors(); ?>
	         
	        <?php
	            $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'ecrm_settings'; // end if
	        ?>
	         
	        <h2 class="nav-tab-wrapper">
	            <a href="?post_type=contact&page=ecrm-settings&tab=ecrm_settings" class="nav-tab <?php echo $active_tab == 'ecrm_settings' ? 'nav-tab-active' : ''; ?>">Settings</a>
	            <a href="?post_type=contact&page=ecrm-settings&tab=ecrm_information" class="nav-tab <?php echo $active_tab == 'ecrm_information' ? 'nav-tab-active' : ''; ?>">Information</a>
	        </h2>
	         
	        <form method="post" action="class-ecrm-settings-page.php">
	        
	            <?php
	         
			        if( $active_tab == 'ecrm_settings' ) {
			            settings_fields( 'ecrm_general_settings' );
			            do_settings_sections( 'ecrm_general_settings' );
			        } else {
			            settings_fields( 'ecrm_information_settings' );
			            do_settings_sections( 'ecrm_information_settings' );
			        } // end if/else
			         
			        submit_button();
	         
			    ?>
	             
	        </form>
	         
	    </div><!-- /.wrap -->
	<?php
	
	}
} 	
new EasyCRM_Settings();