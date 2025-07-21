<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_URI Class
 *
 * Extends the CI_URI class to pre-declare properties to avoid PHP 8.1 deprecation warnings
 */
class MY_URI extends CI_URI {

    // Pre-declare property that would be dynamically created
    public $config;

    /**
     * Constructor
     *
     * Just calls parent constructor
     */
    public function __construct() {
        parent::__construct();
    }
}
