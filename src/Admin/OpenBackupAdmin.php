<?php

namespace OpenBackup\Admin;

class OpenBackupAdmin {

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
    }

    public function addAdminMenu() {
        add_menu_page(
            'Open Backup',
            'Open Backup',
            'manage_options',
            'open-backup',
            array( $this, 'displayAdminPage' ),
            'dashicons-backup',
            100
        );
    }

    public function displayAdminPage() {
        require_once OPEN_BACKUP_PLUGIN_DIR . 'admin/templates/admin-page.php';
    }
}
