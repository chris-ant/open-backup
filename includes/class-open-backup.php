<?php

class Open_Backup {
    private $admin;

    public function __construct() {
        if (is_admin()) {
            $this->admin = new Open_Backup_Admin();
        }
    }

    public static function plugin_activation() {
        // Activation code here
    }

    public static function plugin_deactivation() {
        // Deactivation code here
    }

    public function run() {
        // Run the plugin
    }
}
