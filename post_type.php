<?php

/**
 * Register Custom Post Type: Document
 */
add_action( 'init', 'otm_document_register_post_type', 0 );
function otm_document_register_post_type() {
	$labels = array(
		'name'                  => _x( 'Documents', 'Post Type General Name', 'otm_document' ),
		'singular_name'         => _x( 'Document', 'Post Type Singular Name', 'otm_document' ),
		'add_new_item'          => __( 'Add New Document', 'otm_document' ),
		'edit_item'             => __( 'Edit Document', 'otm_document' ),
		'new_item'              => __( 'New Document', 'otm_document' ),
		'view_item'             => __( 'View Document', 'otm_document' ),
		'search_items'          => __( 'Search Documents', 'otm_document' ),
		'not_found'             => __( 'No documents found', 'otm_document' ),
		'not_found_in_trash'    => __( 'No documents found in Trash', 'otm_document' ),
		'all_items'             => __( 'All Documents', 'otm_document' ),
		'archives'              => __( 'Document Archives', 'otm_document' ),
		'insert_into_item'      => __( 'Insert into document', 'otm_document' ),
		'uploaded_to_this_item' => __( 'Uploaded to this document', 'otm_document' ),
		'filter_items_list'     => __( 'Filter documents list', 'otm_document' ),
		'items_list_navigation' => __( 'Documents list navigation', 'otm_document' ),
		'items_list'            => __( 'Documents list', 'otm_document' ),
	);

	$args   = array(
		'labels'              => $labels,
		'public'              => true, // @todo see here for privacy
		'exclude_from_search' => false, // @todo see here for privacy
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => false,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-media-document',
		'capability_type'     => 'post', // @todo see here for privacy
		//'capabilities'        => // @todo see here for privacy
		//'map_meta_cap'        => // @todo see here for privacy
		'hierarchical'        => false,
		'supports'            => array( 'title', ),
		//'register_meta_box_cb'=> // @todo for filters??
		'has_archive'         => 'documents',
		//'rewrite'             => // @todo investigate
		//'query_var'           => // @todo investigate
		'can_export'          => true,
	);

	register_post_type( 'document', $args );
}

/**
 * Set bulk document updated messages
 */
add_filter( 'bulk_post_updated_messages', 'otm_documents_set_bulk_document_updated_messages', 10, 2 );
function otm_documents_set_bulk_document_updated_messages ( $bulk_messages, $bulk_counts) {
	$bulk_messages['document'] = array(
		'updated'   => _n( '%s document updated.', '%s documents updated.', $bulk_counts['updated'] ),
		'locked'    => ( 1 == $bulk_counts['locked'] ) ? __( '1 document not updated, somebody is editing it.' ) :
			_n( '%s document not updated, somebody is editing it.', '%s documents not updated, somebody is editing them.', $bulk_counts['locked'] ),
		'deleted'   => _n( '%s document permanently deleted.', '%s documents permanently deleted.', $bulk_counts['deleted'] ),
		'trashed'   => _n( '%s document moved to the Trash.', '%s documents moved to the Trash.', $bulk_counts['trashed'] ),
		'untrashed' => _n( '%s document restored from the Trash.', '%s documents restored from the Trash.', $bulk_counts['untrashed'] ),
	);
	
	return $bulk_messages;
}

/**
 * Set document updated messages
 */
add_filter( 'post_updated_messages', 'otm_documents_set_document_updated_messages' );
function otm_documents_set_document_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post->ID );
	if ( ! $permalink ) {
		$permalink = '';
	}

	$view_document_link_html = sprintf( ' <a href="%1$s">%2$s</a>',
		esc_url( $permalink ),
		__( 'View document' )
	);

	$preview_document_link_html = sprintf( ' <a target="_blank" href="%1$s">%2$s</a>',
		esc_url( $preview_url ),
		__( 'Preview document' )
	);

	$scheduled_document_link_html = sprintf( ' <a target="_blank" href="%1$s">%2$s</a>',
		esc_url( $permalink ),
		__( 'Preview document' )
	);

	$scheduled_date = date_i18n( __( 'M j, Y @ H:i' ), strtotime( $post->post_date ) );

	$messages['document'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Document updated.' ),
		2 => __( 'Custom field updated.' ),
		3 => __( 'Custom field deleted.' ),
		4 => __( 'Document updated.' ),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __( 'Document restored to revision from %s.' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => __( 'Document published.' ) . $view_document_link_html,
		7 => __( 'Document saved.' ),
		8 => __( 'Document submitted.' ) . $preview_document_link_html,
		9 => sprintf( __( 'Document scheduled for: %s.' ), '<strong>' . $scheduled_date . '</strong>' ) . $scheduled_document_link_html,
		10 => __( 'Document draft updated.' ) . $preview_document_link_html,
	);
	
	return $messages;
}
