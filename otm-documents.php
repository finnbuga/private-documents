<?php
/*
Plugin Name: OTM Documents
Description: Adds a Document post type. It contains a file attachment and 3 taxonomies: Event, Presenters and Companies. Attachments plugin should be installed and active to use this plugin.
Version:     1.0
Author:      Florin Buga
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

include_once 'post_type.php';
include_once 'attachments.php';
include_once 'taxonomies.php';

/**
 * Check the Attachments plugin is enabled before enabling the current plugin
 */
add_action( 'admin_init', 'otm_documents_check_dependencies' );
function otm_documents_check_dependencies() {
	if ( is_admin() && current_user_can( 'activate_plugins' ) &&  ! is_plugin_active( 'attachments/index.php' ) ) {
		add_action( 'admin_notices', 'otm_documents_dependency_missing_notice' );

		deactivate_plugins( plugin_basename( __FILE__ ) );

		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
	}
}

function otm_documents_dependency_missing_notice(){
	?>
	<div class="error">
		<p><?php _e( 'Sorry, but OTM Documents requires the Attachments plugin to be installed and active.', 'otm-documents' ); ?></p>
	</div>
	<?php
}
