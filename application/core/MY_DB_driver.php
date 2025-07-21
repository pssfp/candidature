<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Database Driver Class Extension for PHP 8.1 Compatibility
 *
 * This file adds compatibility for PHP 8.1 by pre-declaring dynamic properties
 */

// Extension for DB_driver class
class MY_DB_driver extends CI_DB_driver {
    // Pre-declare properties to avoid PHP 8.1 deprecation warnings
    public $failover = [];

    // Constructor just calls parent constructor
    public function __construct($params) {
        parent::__construct($params);
    }
}
