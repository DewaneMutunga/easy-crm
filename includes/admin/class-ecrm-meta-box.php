<?php
/**
 * ECRM_META_BOX class
 *
 * This class is responsible for creating the custom post type.
 *
 * @since 1.0.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit; // no accessing this file directly
 
 class ECRM_META_BOX {
	 
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
    
	    // Output label and field
	    echo ('<label for="contact_email">' . __( 'Email Address', 'ecrm' ) . '</label>' );
	    echo ('<input type="text" name="contact_email" id="contact_email" value="'. esc_attr( $email ) . '" />' );  
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
	}
 }
$ECRM_META_BOX = new ECRM_META_BOX();