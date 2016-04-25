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
		'label'         => 'File',
		'post_type'     => array( 'document' ),
		'position'      => 'normal',
		'priority'      => 'high',
		'filetype'      => 'pdf',
		'button_text'   => __( 'Attach Files', 'attachments' ),
		'modal_text'    => __( 'Attach', 'attachments' ),
		'router'        => 'upload',
		'post_parent'   => true,
		'fields'        => array(),
	);

	$attachments->register( 'attachments', $args );
}

/**
 * Get attachment url for the current document @todo
 */
function otm_document_get_attachment_url() {
	$attachments = new Attachments( 'attachments' );
	if( ! $attachments->exist() ) {
		return '';
	}

	$attachments->get();
	return $attachments->url();
}
