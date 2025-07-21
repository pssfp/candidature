<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CI_Controller_PHP81
 *
 * A base controller class that pre-declares all common CodeIgniter properties
 * to avoid PHP 8.1 dynamic property creation deprecation warnings
 */
class CI_Controller_PHP81 extends CI_Controller {

    // Core CI properties
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

    // Database related
    public $db;
    public $db_driver;

    // Libraries
    public $load;
    public $email;
    public $session;
    public $encrypt;
    public $form_validation;
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

    // Models
    public $model;
    public $Impression_model;

    // Constructor does nothing special, just calls parent constructor
    public function __construct() {
        parent::__construct();
    }
}
