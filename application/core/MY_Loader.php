<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Loader Class
 *
 * Extends the CI_Loader class to pre-declare properties to avoid PHP 8.1 deprecation warnings
 */
class MY_Loader extends CI_Loader {

    // Pre-declare all properties that would normally be created dynamically
    public $load;
    public $benchmark;
    public $hooks;
    public $config;
    public $log;
    public $utf8;
    public $uri;
    public $exceptions;
    public $router;
    public $output;
    public $security;
    public $input;
    public $lang;
    public $db;
    public $db_driver;
    public $email;
    public $session;
    public $encrypt;
    public $form_validation;
    public $form_data;
    public $table;
    public $ftp;
    public $upload;
    public $cart;
    public $calendar;
    public $image_lib;
    public $template;
    public $pagination;
    public $parser;
    public $zip;
    public $user_agent;
    public $xmlrpc;
    public $xmlrpcs;
    public $trackback;
    public $unit;
    public $javascript;
    public $jquery;
    public $model;
    public $Impression_model;
    public $impression_model; // Add lowercase version
    public $pdf; // Add pdf property

    /**
     * Constructor
     *
     * Just calls parent constructor
     */
    public function __construct() {
        parent::__construct();
    }
}