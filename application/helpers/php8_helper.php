<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PHP 8 Compatibility Helper
 *
 * This helper contains functions to improve compatibility between
 * CodeIgniter 3.1.13 and PHP 8.1
 */

// Fix for PHP 8's stricter handling of get_called_class() in static methods
if (!function_exists('is_countable')) {
    function is_countable($var) {
        return (is_array($var) || $var instanceof Countable);
    }
}

// PHP 8 no longer allows passing null to strpos() and similar functions
if (!function_exists('ci_strpos')) {
    function ci_strpos($haystack, $needle, $offset = 0) {
        if ($haystack === null || $needle === null) {
            return false;
        }
        return strpos($haystack, $needle, $offset);
    }
}

if (!function_exists('ci_stripos')) {
    function ci_stripos($haystack, $needle, $offset = 0) {
        if ($haystack === null || $needle === null) {
            return false;
        }
        return stripos($haystack, $needle, $offset);
    }
}

// Add money_format() replacement since it's removed in PHP 8
if (!function_exists('money_format')) {
    function money_format($format, $number) {
        $regex = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?'.
                 '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/';
        if (setlocale(LC_MONETARY, 0) == 'C') {
            setlocale(LC_MONETARY, '');
        }
        $locale = localeconv();
        $number = floatval($number);
        if (!preg_match($regex, $format, $matches)) {
            return $number;
        }

        $flags = [
            'fillchar'  => preg_match('/\=(.)/', $matches[1], $match) ?
                           $match[1] : ' ',
            'nogroup'   => preg_match('/\^/', $matches[1]) > 0,
            'usesignal' => preg_match('/\+|\(/', $matches[1], $match) ?
                           $match[0] : '+',
            'nosimbol'  => preg_match('/\!/', $matches[1]) > 0,
            'isleft'    => preg_match('/\-/', $matches[1]) > 0
        ];

        $width      = trim($matches[2]) ? (int)$matches[2] : 0;
        $left       = trim($matches[3]) ? (int)$matches[3] : 0;
        $right      = trim($matches[4]) ? (int)$matches[4] : $locale['int_frac_digits'];
        $conversion = $matches[5];

        $positive = true;
        if ($number < 0) {
            $positive = false;
            $number  *= -1;
        }

        $letter = $positive ? 'p' : 'n';

        $prefix = $suffix = $cprefix = $csuffix = $signal = '';

        if (!$positive) {
            $signal = $locale['negative_sign'];
            switch (true) {
                case $flags['usesignal'] == '(':
                case $flags['usesignal'] == '+':
                    $prefix = '(';
                    $suffix = ')';
                    break;
                case $locale['n_sign_posn'] == 0 || $flags['usesignal'] == '+':
                    $prefix = $signal;
                    break;
                case $locale['n_sign_posn'] == 1:
                    $prefix = $signal . ' ';
                    break;
                case $locale['n_sign_posn'] == 2:
                    $suffix = ' ' . $signal;
                    break;
                case $locale['n_sign_posn'] == 3:
                    $cprefix = $signal;
                    break;
                case $locale['n_sign_posn'] == 4:
                    $csuffix = $signal;
                    break;
            }
        }

        if (!$flags['nosimbol']) {
            $currency = $cprefix;
            $currency .= ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']);
            $currency .= $csuffix;
            $currency = iconv('ISO-8859-1', 'UTF-8', $currency);
        } else {
            $currency = '';
        }

        $space = $locale["{$letter}_sep_by_space"] ? ' ' : '';

        $value = number_format(
            $number,
            $right,
            $locale['mon_decimal_point'],
            $flags['nogroup'] ? '' : $locale['mon_thousands_sep']
        );

        $value = explode($locale['mon_decimal_point'], $value);

        $n = strlen($prefix) + strlen($currency) + strlen($value[0]);
        if ($left > 0 && $left > $n) {
            $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0];
        }

        $value = implode($locale['mon_decimal_point'], $value);

        if ($locale["{$letter}_cs_precedes"]) {
            $value = $prefix . $currency . $space . $value . $suffix;
        } else {
            $value = $prefix . $value . $space . $currency . $suffix;
        }

        if ($width > 0) {
            $value = str_pad(
                $value,
                $width,
                $flags['fillchar'],
                $flags['isleft'] ? STR_PAD_RIGHT : STR_PAD_LEFT
            );
        }

        return $value;
    }
}

// Add a function to check empty values more safely in PHP 8
if (!function_exists('is_empty')) {
    function is_empty($var) {
        return ($var === null || $var === false || $var === '' || $var === 0 || $var === '0' || $var === 0.0 || (is_countable($var) && count($var) === 0));
    }
}

// Add a function to handle errors for removed create_function() in PHP 8
if (!function_exists('ci_create_function')) {
    function ci_create_function($args, $code) {
        if (function_exists('create_function')) {
            return create_function($args, $code);
        } else {
            $lambda = eval("return function($args) { $code };");
            return $lambda;
        }
    }
}

/**
 * Fix for PHP 8.1 dynamic property creation deprecation warnings in CodeIgniter
 *
 * This function is automatically called when a new instance of CI_Controller is created.
 * It will define all the CI core properties on the controller to avoid deprecation warnings.
 */
if (!function_exists('fix_ci_dynamic_properties')) {
    function fix_ci_dynamic_properties($controller) {
        // Common properties that CodeIgniter dynamically creates
        $ci_properties = [
            'benchmark', 'hooks', 'config', 'log', 'utf8', 'uri',
            'exceptions', 'router', 'output', 'security', 'input',
            'lang', 'db', 'load', 'email', 'session', 'encrypt',
            'form_validation', 'table', 'ftp', 'upload', 'cart',
            'calendar', 'image_lib', 'template', 'pagination',
            'parser', 'zip', 'user_agent', 'xmlrpc', 'xmlrpcs',
            'trackback', 'unit', 'javascript', 'jquery', 'model'
        ];

        // Declare all possible properties to avoid deprecation notices
        foreach ($ci_properties as $property) {
            if (!property_exists($controller, $property)) {
                $controller->$property = null;
            }
        }

        return $controller;
    }
}

/**
 * Fix for PHP 8.1 dynamic property creation deprecation warnings in other CI classes
 */
if (!function_exists('fix_ci_uri_router_dynamic_properties')) {
    function fix_ci_uri_router_dynamic_properties() {
        // Get CI instance
        $ci = &get_instance();

        // Add config property to URI class if it doesn't exist
        if (isset($ci->uri) && !property_exists($ci->uri, 'config')) {
            $ci->uri->config = $ci->config;
        }

        // Add uri property to Router class if it doesn't exist
        if (isset($ci->router) && !property_exists($ci->router, 'uri')) {
            $ci->router->uri = $ci->uri;
        }

        // Add failover property to DB driver class if it doesn't exist
        if (isset($ci->db) && isset($ci->db->conn_id) && !property_exists($ci->db, 'failover')) {
            $ci->db->failover = array();
        }
    }
}

// Define EXT constant if it's not defined (for backward compatibility)
if (!defined('EXT')) {
    define('EXT', '.php');
}
