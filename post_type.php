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
