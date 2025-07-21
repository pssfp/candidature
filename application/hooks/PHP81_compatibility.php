<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PHP 8.1 Compatibility Hook
 *
 * This hook class applies fixes to make CodeIgniter 2.2 compatible with PHP 8.1
 */
class PHP81_compatibility {

    /**
     * Apply PHP 8.1 compatibility fixes to the controller
     *
     * Note: get_instance() is not available during pre_controller hook,
     * so we manually include the helper file here
     */
    public function apply_fixes() {
        // Load the PHP8 helper file directly since we can't use get_instance() yet
        require_once APPPATH . 'helpers/php8_helper.php';

        // Define EXT constant if not defined (for backward compatibility)
        if (!defined('EXT')) {
            define('EXT', '.php');
        }
    }

    /**
     * Fix URI, Router and other CI core classes for PHP 8.1 compatibility
     */
    public function fix_core_classes() {
        // Now we can use get_instance() as we're in the post_controller_constructor hook
        $CI =& get_instance();

        if ($CI) {
            // Ensure the helper is loaded
            if (method_exists($CI, 'load') && method_exists($CI->load, 'helper')) {
                $CI->load->helper('php8');
            }

            // Pre-define CI properties on the controller to avoid dynamic property warnings
            if (function_exists('fix_ci_dynamic_properties')) {
                fix_ci_dynamic_properties($CI);
            }
        }

        // Fix dynamic properties on URI and Router classes
        if (function_exists('fix_ci_uri_router_dynamic_properties')) {
            fix_ci_uri_router_dynamic_properties();
        }
    }
}
