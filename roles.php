<?php

/**
 * Add Manager and Member roles
 */
register_activation_hook( __FILE__, 'otm_documents_add_roles' );
//add_action( 'init', 'otm_documents_add_roles' );
function otm_documents_add_roles() {
	//remove_role( 'member' );
	$member_capabilities = array(
		'read_private_posts' => true
	);
	add_role( 'member', __( 'Member' ), $member_capabilities);

	//remove_role( 'manager' );
	$manager_capabilities = array(
		'read_private_posts' => true,
		'list_users' => true,
		'create_users' => true,
		'add_users' => true,
		'edit_users' => true,
		'delete_users' => true,
		'remove_users' => true,
		'promote_users' => true,
		'manage_network_users' => true,
	);
	$manager_capabilities = array_merge($manager_capabilities, get_role('editor')->capabilities);
	add_role( 'manager', __( 'Manager' ), $manager_capabilities);
}
