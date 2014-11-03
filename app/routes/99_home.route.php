<?php
/**
 * Home route
 */
$app->map('/', function () use ($app) {
    $config = $app->config;
    echo 'Hello' . $config['siteTitle'];
})->via('GET', 'GET HEAD');