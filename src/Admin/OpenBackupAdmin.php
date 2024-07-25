<?php

namespace OpenBackup\Admin;

class OpenBackupAdmin {

    public function __construct() {
        add_action('admin_menu', array( $this, 'addAdminMenu'));
        add_action('admin_init', array( $this, 'settingsAdminInit'));
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

    public function settingsAdminInit(){

        $args = array(
            'type'              => 'array',
            'sanitize_callback' => array( $this, 'sanitizeOptions' ),
            'default'           => null
        );
        
        register_setting('obk_plugin_options_group', 'obk_plugin_options', $args);

        add_settings_section(
            'obk_plugin_main',
            'Open Backup Plugin Settings',
            array($this, 'sectionText'),
            'obk_plugin_main'
        );

        add_settings_field(
            'obk_plugin_name',
            'Your Name',
            array($this, 'settingName'),
            'obk_plugin_main',
            'obk_plugin_main'
        );

    }

    public function sectionText(){
        echo '<p>Settings galore!</p>';
    }

    public function sanitizeOptions($input){
        $new_input = array();

        if( isset( $input['name'] ) )
            $new_input['name'] = sanitize_text_field( $input['name'] );

        if( !ctype_alnum($input['name']) ){
            // throw error. 
            add_settings_error('obk_plugin_main', 'obk_plugin_name_error', 'Incorrect value Entered! Use Letters and Spaces.', 'error');
             
            // We need to return exiting value from DB, otherwise it will save over an empty value. 
            $options = get_option('obk_plugin_options');
            return $options;
        }

        return $new_input;
    }

    /*
     *  This relates to a field from an setting:
     *  obk_plugin_name
     */
    public function settingName() {


        $options = get_option('obk_plugin_options');
        $name = isset($options['name']) ? $options['name'] : '';
        echo "<input id='name' name='obk_plugin_options[name]' type='text' value='" . esc_attr($name) . "'/>"; 
    }

    private function pluckErrorByCode($code) {
        global $wp_settings_errors;
        
        foreach ($wp_settings_errors as $error) {
            if (isset($error['code']) && $error['code'] === $code) {
                return $error;
            }
        }
        return null; // Return null if the subarray with the specified code is not found
    }
}
