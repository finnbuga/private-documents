<?php

/**
 * Add Manager and Member roles
 */
register_activation_hook( 'otm-documents/otm-documents.php', 'otm_documents_add_roles' );
function otm_documents_add_roles() {
	$editor_capabilities  = get_role( 'editor' )->capabilities;
	$manager_capabilities = array_merge(
		$editor_capabilities,
		array(
			'read_private_posts'   => true,
			'list_users'           => true,
			'create_users'         => true,
			'add_users'            => true,
			'edit_users'           => true,
			'delete_users'         => true,
			'remove_users'         => true,
			'promote_users'        => true,
			'manage_network_users' => true,
		)
	);
	add_role( 'manager', __( 'Manager' ), $manager_capabilities );

	$subscriber_capabilities = get_role( 'subscriber' )->capabilities;
	$member_capabilities     = array_merge(
		$subscriber_capabilities,
		array(
			'read_private_posts' => true
		)
	);
	add_role( 'member', __( 'Member' ), $member_capabilities );
}
