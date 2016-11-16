<?php

/**
 * Disable the Attachments Settings screen
 */
add_filter( 'attachments_settings_screen', '__return_false' );

/**
 * Disable the default Attachments instance
 */
add_filter( 'attachments_default_instance', '__return_false' );

/**
 * Add custom Attachments instance
 */
add_action( 'attachments_register', 'otm_documents_attachments' );
function otm_documents_attachments( $attachments ) {
	$args = array(
		'label'       => 'File',
		'post_type'   => array( 'document' ),
		'position'    => 'normal',
		'priority'    => 'high',
		'filetype'    => 'pdf',
		'button_text' => __( 'Attach Files', 'attachments' ),
		'modal_text'  => __( 'Attach', 'attachments' ),
		'router'      => 'upload',
		'post_parent' => true,
		'fields'      => array(),
	);

	$attachments->register( 'attachments', $args );
}

/**
 * Get attachment url for the current post
 */
function otm_document_get_attachment_url() {
	if ( $attachment_url = otm_documents_get_attachments_attachment_url() ) {
		return $attachment_url;
	} else {
		return otm_documents_get_wp_attachment_url();
	}
}

/**
 * Get attachment url for the current post from the Attachments plugin
 */
function otm_documents_get_attachments_attachment_url() {
	$attachments = new Attachments( 'attachments' );

	if ( $attachments->exist() ) {
		$attachments->get();
		return $attachments->url();
	} else {
		return '';
	}
}

/**
 * Get attachment url for the current post from WP core
 */
function otm_documents_get_wp_attachment_url() {
	$attachments = get_children( array(
		'post_parent' => get_the_ID(),
		'post_type'   => 'attachment',
		'numberposts' => 1,
		'post_status' => 'any'
	) );

	if ( $attachments ) {
		$attachment = array_pop( $attachments );
		return wp_get_attachment_url( $attachment->ID );
	} else {
		return '';
	}
}
