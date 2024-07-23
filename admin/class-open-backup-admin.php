<?php

class Open_Backup_Admin {

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
    }

    public function add_admin_menu() {
        add_menu_page(
            'Open Backup',
            'Open Backup',
            'manage_options',
            'open-backup',
            array( $this, 'display_admin_page' ),
            'dashicons-backup',
            100
        );
    }

    public function display_admin_page() {
        require_once OPEN_BACKUP_PLUGIN_DIR . 'admin/templates/admin-page.php';
    }
}
