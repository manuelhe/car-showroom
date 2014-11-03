<?php
/**
 * Public api route group
 */
$app->group('/public-api', function () use ($app) {
    $di = $app->config('di');
    $db = $di['db'];

    //Retrieve all available cars
    $app->get('/cars', function () use ($app, $db){

        $sth = $db->query("SELECT id, model, year, picture, deal FROM car WHERE status = 1");

        if(!$sth->rowCount()){
            //No results found server status response
            $app->response()->status(404);
            $app->response()->header('X-Status-Reason', 'Not results found.');
            return;
        }

        // send response header for JSON content type
        $app->response()->header('Content-Type', 'application/json');

        // return JSON-encoded response body with query results
        echo json_encode($sth->fetchAll(\PDO::FETCH_ASSOC));
    });

    // Get single car data
    $app->get('/cars/:id', function ($id) use ($app, $db){
        $sth = $db->prepare("SELECT id, model, year, price, color, picture, deal FROM car 
            WHERE `id` = :id AND status = 1");
        $sth->execute(array(
            ':id' => $id
        ));

        if(!$sth->rowCount()){
            //No results found server status response
            $app->response()->status(404);
            $app->response()->header('X-Status-Reason', 'Not results found.');
            return;
        }

        // send response header for JSON content type
        $app->response()->header('Content-Type', 'application/json');

        // return JSON-encoded response body with query results
        echo json_encode($sth->fetch(\PDO::FETCH_ASSOC));
    })->conditions(array('id' => '\d+'));
    
});