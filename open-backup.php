<?php
/*
Plugin Name: Open Backup
Plugin URI: http://example.com/open-backup
Description: A WordPress backup plugin
Version: 0.1
Author: Your Name
Author URI: http://example.com
License: GPL2
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

// Define plugin constants
define( 'OPEN_BACKUP_VERSION', '1.0' );
define( 'OPEN_BACKUP_MINIMUM_WP_VERSION', '5.0' );
define( 'OPEN_BACKUP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Include files
require_once( OPEN_BACKUP_PLUGIN_DIR . 'includes/class-open-backup.php' );

// Hooks
register_activation_hook( __FILE__, array( 'Open_Backup', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Open_Backup', 'plugin_deactivation' ) );

// Initialize the plugin
function run_open_backup() {
	$plugin = new Open_Backup();
	$plugin->run();
}
run_open_backup();
