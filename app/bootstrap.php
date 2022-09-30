<?php 

require_once('config/default.php');
require_once('../vendor/autoload.php');

// Load libraries
foreach(glob(APP_ROOT . '/src/libraries/*.php') as $f) {
    error_log('required ' . $f);
    require_once($f);
} 
error_log('done requiring');