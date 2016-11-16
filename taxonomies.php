<?php

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

	echo '<label class="screen-reader-text" for="' . $main_taxonomy . '">' . "Filter by $main_taxonomy" . '</label>';
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
