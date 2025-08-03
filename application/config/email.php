<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| EMAIL CONFING
| -------------------------------------------------------------------
| Configuration of outgoing mail server.
|
*/
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'mail.creawebhosting.org';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'noreply@pssfp.net';
$config['smtp_pass'] = 'LRcau4X42)';
$config['smtp_crypto'] = 'ssl';
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";
$config['wordwrap'] = TRUE;
$config['smtp_timeout'] = 30;
$config['validate'] = FALSE;
$config['priority'] = 3;
