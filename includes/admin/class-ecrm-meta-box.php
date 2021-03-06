<?php
/**
 * EasyCRM_Meta_Box class
 *
 * This class is responsible for creating the custom post type.
 *
 * @since 1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; // no accessing this file directly
 
class EasyCRM_Meta_Box {
 
	/**
	 * constructor for ECRM_META_BOX class
	 */
	 public function __construct() {
	 	
	 	// load meta box
		add_action( 'add_meta_boxes', array( $this, 'register_meta_boxes' ) );
		
		// save meta box data
		add_action( 'save_post', array( $this, 'save_meta_boxes' ) );
	 }
	 
	/**
	* Registers a Meta Box on our Contact Custom Post Type, called 'Contact Details'
	*/
	public function register_meta_boxes() {
	    add_meta_box( 'contact-details', 'Contact Details', array( $this, 'output_meta_box' ), 'contact', 'normal', 'high' );   
	}
	
	/**
	* Output a Contact Details meta box
	*
	* @param WP_Post $post WordPress Post object
	*/
	public function output_meta_box( $post ) {
		
		$email = get_post_meta( $post->ID, '_contact_email', true );
		$phone_number = get_post_meta( $post->ID, 'contact_phone_number', true );
		$location = get_post_meta( $post->ID, 'contact_location', true );
	
	    // Output email label and field
	    echo ('<label for="contact_email">' . __( 'Email Address', 'ecrm' ) . '</label>' );
	    echo ('<input type="text" name="contact_email" id="contact_email" value="'. esc_attr( $email ) . '" />' );
	    
	    // Output phone number label and field
	    echo ('<label for="contact_phone_number">' . __( 'Phone Number', 'ecrm' ) . '</label>' );
	    echo ('<input type="text" name="contact_phone_number" id="contact_phone_number" value="'. esc_attr( $phone_number ) . '" />' );
	    
	    // Output location label and field
	    echo ('<label for="contact_location">' . __( 'Location', 'ecrm' ) . '</label>' );
	    echo ('<input type="text" name="contact_location" id="contact_location" value="'. esc_attr( $location ) . '" />' );  
	}
	
	/**
	* Saves the meta box field data
	*
	* @param int $post_id Post ID
	*/
	public function save_meta_boxes( $post_id ) {
	    
	    // Check this is the Contact Custom Post Type
	    if ( 'contact' != $_POST['post_type'] ) {
	        return $post_id;
	    }
	 
	    // Check the logged in user has permission to edit this post
	    if ( ! current_user_can( 'edit_post', $post_id ) ) {
	        return $post_id;
	    }
	 
	    // OK to save meta data
	    $email = sanitize_text_field( $_POST['contact_email'] );
	    update_post_meta( $post_id, '_contact_email', $email );  
	    
	    // OK to save meta data
	    $phone_number = sanitize_text_field( $_POST['contact_phone_number'] );
	    update_post_meta( $post_id, 'contact_phone_number', $phone_number );
	    
	    // OK to save meta data
	    $location = sanitize_text_field( $_POST['contact_location'] );
	    update_post_meta( $post_id, 'contact_location', $location );
	}
}
new EasyCRM_Meta_Box();