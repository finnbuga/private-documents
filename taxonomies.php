<?php

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
