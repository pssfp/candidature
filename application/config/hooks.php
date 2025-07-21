<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

// Hook to add PHP 8.1 compatibility for dynamic property warnings
$hook['pre_controller'] = array(
    'class'    => 'PHP81_compatibility',
    'function' => 'apply_fixes',
    'filename' => 'PHP81_compatibility.php',
    'filepath' => 'hooks',
    'params'   => array()
);

// Hook to fix URI and Router class dynamic property warnings
$hook['post_controller_constructor'] = array(
    'class'    => 'PHP81_compatibility',
    'function' => 'fix_core_classes',
    'filename' => 'PHP81_compatibility.php',
    'filepath' => 'hooks',
    'params'   => array()
);

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */