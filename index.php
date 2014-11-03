<?php
/**
 * Car showroom
 *
 * GAP test
 *
 * Dependency Injection Libary thanks to Pimple http://pimple.sensiolabs.org/
 *
 * @autor manuel.he@gmail.com
 * @version 1.0
 */
$script_start_time = microtime(true);

error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Bogota');
$show_stats = TRUE;

//Start session
session_cache_limiter(false);
session_start();

// Require vendor autoload libraries
require 'app/vendor/autoload.php';

//Dependency Injection container
$di = require 'app/config/di.php';
$slim_config = array(
    'templates.path' => $di['config']['templatesDir'],
);
if(isset($di['config']['slim']) && is_array($di['config']['slim'])){
    $slim_config += $di['config']['slim'];
}

//Slim Framework instance
$app = new \Slim\Slim($slim_config);
$app->config('di', $di);

// Slim routes autoinclude
$route_files = glob(__DIR__ . DIRECTORY_SEPARATOR . 'app/routes/*.route.php');
foreach ($route_files as $route) {
    if(!trim($route)){
        continue;
    }
    require trim($route);
}

//Run application
$app->run();

// Print usage basic stats
if($show_stats){
    $total_time = microtime(true) - $script_start_time;
    printf('
    <!-- Generated in %01.3f secs -->'
        ,$total_time
    );
}

