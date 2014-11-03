<?php
/**
 * Home route
 */
$app->get('/', function () use ($app) {
    $di = $app->config('di');
    $app->render(
        'index.tpl.php',
        array(
            'config' => $di['config']
        )
    );
});