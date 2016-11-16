<?php

/**
 * Register custom taxonomies: Event, Presenter, Company and Category
 */
add_action( 'init', 'otm_documents_register_taxonomy', 0 );
function otm_documents_register_taxonomy() {
	$event_labels = array(
		'name'                       => _x( 'Events', 'Taxonomy General Name', 'otm_document' ),
		'singular_name'              => _x( 'Event', 'Taxonomy Singular Name', 'otm_document' ),
		'menu_name'                  => __( 'Events', 'otm_document' ),
		'all_items'                  => __( 'All Events', 'otm_document' ),
		'parent_item'                => __( 'Parent Item', 'otm_document' ),
		'parent_item_colon'          => __( 'Parent Item:', 'otm_document' ),
		'new_item_name'              => __( 'New Event Name', 'otm_document' ),
		'add_new_item'               => __( 'Add New Event', 'otm_document' ),
		'edit_item'                  => __( 'Edit Event', 'otm_document' ),
		'update_item'                => __( 'Update Event', 'otm_document' ),
		'view_item'                  => __( 'View Event', 'otm_document' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'otm_document' ),
		'add_or_remove_items'        => __( 'Add or remove events', 'otm_document' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'otm_document' ),
		'popular_items'              => __( 'Popular events', 'otm_document' ),
		'search_items'               => __( 'Search Events', 'otm_document' ),
		'not_found'                  => __( 'Not Found', 'otm_document' ),
		'no_terms'                   => __( 'No events', 'otm_document' ),
		'items_list'                 => __( 'Events list', 'otm_document' ),
		'items_list_navigation'      => __( 'Events list navigation', 'otm_document' ),
	);

	$presenter_labels = array(
		'name'                       => _x( 'Presenters', 'Taxonomy General Name', 'otm_document' ),
		'singular_name'              => _x( 'Presenter', 'Taxonomy Singular Name', 'otm_document' ),
		'menu_name'                  => __( 'Presenters', 'otm_document' ),
		'all_items'                  => __( 'All Presenters', 'otm_document' ),
		'parent_item'                => __( 'Parent Item', 'otm_document' ),
		'parent_item_colon'          => __( 'Parent Item:', 'otm_document' ),
		'new_item_name'              => __( 'New Presenter Name', 'otm_document' ),
		'add_new_item'               => __( 'Add New Presenter', 'otm_document' ),
		'edit_item'                  => __( 'Edit Presenter', 'otm_document' ),
		'update_item'                => __( 'Update Presenter', 'otm_document' ),
		'view_item'                  => __( 'View Presenter', 'otm_document' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'otm_document' ),
		'add_or_remove_items'        => __( 'Add or remove Presenters', 'otm_document' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'otm_document' ),
		'popular_items'              => __( 'Popular Presenters', 'otm_document' ),
		'search_items'               => __( 'Search Presenters', 'otm_document' ),
		'not_found'                  => __( 'Not Found', 'otm_document' ),
		'no_terms'                   => __( 'No Presenters', 'otm_document' ),
		'items_list'                 => __( 'Presenters list', 'otm_document' ),
		'items_list_navigation'      => __( 'Presenters list navigation', 'otm_document' ),
	);

	$company_labels = array(
		'name'                       => _x( 'Companies', 'Taxonomy General Name', 'otm_document' ),
		'singular_name'              => _x( 'Company', 'Taxonomy Singular Name', 'otm_document' ),
		'menu_name'                  => __( 'Companies', 'otm_document' ),
		'all_items'                  => __( 'All Companies', 'otm_document' ),
		'parent_item'                => __( 'Parent Item', 'otm_document' ),
		'parent_item_colon'          => __( 'Parent Item:', 'otm_document' ),
		'new_item_name'              => __( 'New Company Name', 'otm_document' ),
		'add_new_item'               => __( 'Add New Company', 'otm_document' ),
		'edit_item'                  => __( 'Edit Company', 'otm_document' ),
		'update_item'                => __( 'Update Company', 'otm_document' ),
		'view_item'                  => __( 'View Company', 'otm_document' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'otm_document' ),
		'add_or_remove_items'        => __( 'Add or remove Companies', 'otm_document' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'otm_document' ),
		'popular_items'              => __( 'Popular Companies', 'otm_document' ),
		'search_items'               => __( 'Search Companies', 'otm_document' ),
		'not_found'                  => __( 'Not Found', 'otm_document' ),
		'no_terms'                   => __( 'No Companies', 'otm_document' ),
		'items_list'                 => __( 'Companies list', 'otm_document' ),
		'items_list_navigation'      => __( 'Companies list navigation', 'otm_document' ),
	);

	$category_labels = array(
		'name'                       => _x( 'Category', 'Taxonomy General Name', 'otm_document' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'otm_document' ),
		'menu_name'                  => __( 'Categories', 'otm_document' ),
		'all_items'                  => __( 'All Categories', 'otm_document' ),
		'parent_item'                => __( 'Parent Item', 'otm_document' ),
		'parent_item_colon'          => __( 'Parent Item:', 'otm_document' ),
		'new_item_name'              => __( 'New Category Name', 'otm_document' ),
		'add_new_item'               => __( 'Add New Category', 'otm_document' ),
		'edit_item'                  => __( 'Edit Category', 'otm_document' ),
		'update_item'                => __( 'Update Category', 'otm_document' ),
		'view_item'                  => __( 'View Category', 'otm_document' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'otm_document' ),
		'add_or_remove_items'        => __( 'Add or remove Categories', 'otm_document' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'otm_document' ),
		'popular_items'              => __( 'Popular Categories', 'otm_document' ),
		'search_items'               => __( 'Search Categories', 'otm_document' ),
		'not_found'                  => __( 'Not Found', 'otm_document' ),
		'no_terms'                   => __( 'No Categories', 'otm_document' ),
		'items_list'                 => __( 'Categories list', 'otm_document' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'otm_document' ),
	);

	$args           = array(
		'hierarchical'      => true,
		'show_admin_column' => true,
		'show_tagcloud'     => false,
		'show_in_nav_menus' => false,
		//'meta_box_cb'     => callback // @todo
	);
	$event_args     = array_merge( $args, array( 'show_admin_column' => false ), array( 'labels' => $event_labels ) );
	$presenter_args = array_merge( $args, array( 'labels' => $presenter_labels ) );
	$company_args   = array_merge( $args, array( 'labels' => $company_labels ) );
	$category_args  = array_merge( $args, array( 'show_admin_column' => false ),
		array( 'labels' => $category_labels ) );

	register_taxonomy( 'event', 'document', $event_args );
	register_taxonomy( 'presenter', 'document', $presenter_args );
	register_taxonomy( 'company', 'document', $company_args );
	register_taxonomy( 'otm_documents_category', 'document', $category_args );
}

/**
 * Change the position of the Event meta box
 */
add_action( 'do_meta_boxes', 'otm_documents_change_event_meta_box_position' );
function otm_documents_change_event_meta_box_position( $post_type ) {
	$tax_name = 'event';

	if ( $post_type != 'document' ) {
		return;
	}

	remove_meta_box( $tax_name . 'div', $post_type, 'side' );

	$taxonomy = get_taxonomy( $tax_name );
	if ( ! $taxonomy->show_ui || false === $taxonomy->meta_box_cb ) {
		return;
	}

	add_meta_box( $tax_name . 'box', $taxonomy->labels->singular_name, $taxonomy->meta_box_cb, null, 'advanced', 'core',
		array( 'taxonomy' => $tax_name ) );
}

/**
 * Order Events by term_id
 * so that the last event added will be on the top of the list
 */
add_filter( 'get_terms_args', 'otm_documents_reorder_events_by_term_id', 10, 2 );
function otm_documents_reorder_events_by_term_id( $args, $taxonomies ) {
	if ( 'event' == $taxonomies[0] ) {
		$args['orderby'] = 'term_id';
		$args['order']   = 'DESC';
	}

	return $args;
}

/**
 * Add taxonomy filter on admin page - Select element
 */
add_action( 'restrict_manage_posts', 'otm_documents_add_taxonomy_filter' );
function otm_documents_add_taxonomy_filter( $post_type ) {
	global $wp_query;

	$taxonomies = get_object_taxonomies( 'document', 'names' );
	if ( empty( $taxonomies ) ) {
		return;
	}
	$main_taxonomy = $taxonomies[0];

	echo '<label class="screen-reader-text" for="' . $main_taxonomy . '">' . __( 'Filter by event' ) . '</label>';
	wp_dropdown_categories( array(
		'taxonomy'        => $main_taxonomy,
		'show_option_all' => get_taxonomy( $main_taxonomy )->labels->all_items,
		'name'            => $main_taxonomy,
		'hide_empty'      => 0,
		'hierarchical'    => 1,
		'show_count'      => 0,
		'orderby'         => 'name',
		'selected'        => isset( $wp_query->query[ $main_taxonomy ] ) ? $wp_query->query[ $main_taxonomy ] : '',
	) );
}

/**
 * Add taxonomy filter on admin page - Query parser
 */
add_filter( 'parse_query', 'otm_documents_add_taxonomy_query' );
function otm_documents_add_taxonomy_query( $wp_query ) {
	global $pagenow;
	$query_vars = &$wp_query->query_vars;

	$taxonomies = get_object_taxonomies( 'document', 'names' );
	if ( empty( $taxonomies ) ) {
		return;
	}
	$main_taxonomy = $taxonomies[0];

	if ( $pagenow == 'edit.php' && isset( $query_vars[ $main_taxonomy ] ) && is_numeric( $query_vars[ $main_taxonomy ] ) ) {
		$term                         = get_term_by( 'id', $query_vars[ $main_taxonomy ], $main_taxonomy );
		$query_vars[ $main_taxonomy ] = $term ? $term->slug : '';
	}
}
