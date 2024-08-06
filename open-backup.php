<?php
/*
Plugin Name: Open Backup
Plugin URI: http://example.com/open-backup
Description: A WordPress backup plugin
Version: 0.1
Author: Chris Ant
Author URI: http://example.com
License: GPL2
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

// Define plugin constants
define( 'OPEN_BACKUP_VERSION', '0.1' );
define( 'OPEN_BACKUP_MINIMUM_WP_VERSION', '6.0' );
define( 'OPEN_BACKUP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Load Composer autoloader
require_once __DIR__ . '/vendor/autoload.php';



function opb_dd($something){
    echo '<pre>';
    var_dump($something);
    echo '<pre>';
    die();
}

function opb_vd($something){
    echo '<pre>';
    var_dump($something);
    echo '<pre>';
}
