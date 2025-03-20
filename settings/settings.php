<?php

// Prevent direct access to this file
if (!defined('ABSPATH')) exit;

/**
 * This class creates the settings page for the plugin.
 */
class WOWSNIPPETS_Settings {
    private $settings;

    public function __construct() {
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_styles']);
        $this->settings = get_option('wowsnippets_settings_data', [
            'site_title' => '',
            'enable_feature' => '',
            'custom_message' => ''
        ]);
    }

    // Add settings page to the WordPress menu
    public function add_settings_page() {
        add_menu_page(
            'WOW Snippets Settings',
            'WOW Snippets',
            'manage_options',
            'wowsnippets-settings',
            [$this, 'render_all_snippets_page'],
            'dashicons-admin-generic',
            99
        );

        add_submenu_page(
            'wowsnippets-settings',
            'All Snippets',
            'All Snippets',
            'manage_options',
            'wowsnippets-settings',
            [$this, 'render_all_snippets_page']
        );

        add_submenu_page(
            'wowsnippets-settings',
            'Settings',
            'Settings',
            'manage_options',
            'wowsnippets-settings-settings',
            [$this, 'render_settings_page']
        );
    }

    // Register settings
    public function register_settings() {
        register_setting('wowsnippets_settings_group', 'wowsnippets_settings_data');
    }

    // Enqueue Tailwind CSS on all plugin pages
    public function enqueue_admin_styles($hook) {
        $plugin_pages = [
            'toplevel_page_wowsnippets-settings',
            'wow-snippets_page_wowsnippets-settings-settings'
        ];

        if (in_array($hook, $plugin_pages)) {
            wp_enqueue_style(
                'tailwind-css',
                'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css',
                [],
                '2.2.19'
            );
        }
    }

    // Render the settings page
    public function render_settings_page() {
        include plugin_dir_path(__FILE__) . 'settings-template.php';
    }

    // Render the all snippets page
    public function render_all_snippets_page() {
        echo '<div class="wrap"><h1>All Snippets</h1></div>';
    }
}

// Initialize the settings page class
new WOWSNIPPETS_Settings();