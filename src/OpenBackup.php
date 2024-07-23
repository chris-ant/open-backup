<?php

namespace OpenBackup;

class OpenBackup {
    private $admin;

    public function __construct() {
        if (is_admin()) {
            $this->admin = new Admin\OpenBackupAdmin();
        }
    }

    public static function pluginActivation() {
        // Activation code here
    }

    public static function pluginDeactivation() {
        // Deactivation code here
    }

    public function run() {
        // Run the plugin
    }
}
