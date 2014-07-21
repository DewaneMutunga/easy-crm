<?php
/**
 * ECRM_CPT class
 *
 * This class is responsible for creating the custom post type.
 *
 * @since 1.0.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit; // no accessing this file directly
 
 class ECRM_CPT {
	 
	/**
	 * constructor for ECRM_CPT class
	 */
	 public function __construct() {
	 	
	 	// load new custom post type
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
	 }
	 
	/**
	 * Registers a Custom Post Type called contact
	 */
	public function register_custom_post_type() {
	    register_post_type('contact', array(
	        'labels' => array(
	            'name'               => _x( 'Contacts', 'post type general name', 'ecrm' ),
	            'singular_name'      => _x( 'Contact', 'post type singular name', 'ecrm' ),
	            'menu_name'          => _x( 'Contacts', 'admin menu', 'ecrm' ),
	            'name_admin_bar'     => _x( 'Contact', 'add new on admin bar', 'ecrm' ),
	            'add_new'            => _x( 'Add New', 'contact', 'ecrm' ),
	            'add_new_item'       => __( 'Add New Contact', 'ecrm' ),
	            'new_item'           => __( 'New Contact', 'ecrm' ),
	            'edit_item'          => __( 'Edit Contact', 'ecrm' ),
	            'view_item'          => __( 'View Contact', 'ecrm' ),
	            'all_items'          => __( 'All Contacts', 'ecrm' ),
	            'search_items'       => __( 'Search Contacts', 'ecrm' ),
	            'parent_item_colon'  => __( 'Parent Contacts:', 'ecrm' ),
	            'not_found'          => __( 'No contacts found.', 'ecrm' ),
	            'not_found_in_trash' => __( 'No contacts found in Trash.', 'ecrm' ),
	        ),
	         
	        // Frontend
	        'has_archive'        => false,
	        'public'             => false,
	        'publicly_queryable' => false,
	         
	        // Admin
	        'capability_type' => 'post',
	        'menu_icon'     => 'dashicons-businessman',
	        'menu_position' => 10,
	        'query_var'     => true,
	        'show_in_menu'  => true,
	        'show_ui'       => true,
	        'supports'      => array(
	            'title',
	            'author',
	            'comments', 
	        ),
	    )); 
	}
}
$ECRM_CPT = new ECRM_CPT();