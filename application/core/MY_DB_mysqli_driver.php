<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_DB_mysqli_driver Class
 *
 * Extends the CI_DB_mysqli_driver class to pre-declare properties to avoid PHP 8.1 deprecation warnings
 */
class MY_DB_mysqli_driver extends CI_DB_mysqli_driver {

    // Pre-declare properties that would normally be created dynamically
    public $failover = [];

    /**
     * Constructor
     *
     * @param array $params
     * @return void
     */
    public function __construct($params) {
        parent::__construct($params);
    }
}
