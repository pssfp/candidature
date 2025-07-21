<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Router Class
 *
 * Extends the CI_Router class to pre-declare properties to avoid PHP 8.1 deprecation warnings
 */
class MY_Router extends CI_Router {

    // Pre-declare property that would be dynamically created
    public $uri;

    /**
     * Constructor
     *
     * Just calls parent constructor
     */
    public function __construct() {
        parent::__construct();
    }
}
