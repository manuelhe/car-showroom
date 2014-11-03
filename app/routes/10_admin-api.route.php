<?php
/**
 * Admin api route group
 */
$app->group('/admin-api', function () use ($app) {
    $di = $app->config('di');
    $db = $di['db'];

    //Retrieve all available cars
    $app->get('/cars', function () use ($app, $db){

        $sth = $db->query("SELECT * FROM car ORDER BY `id`");

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

    //Get single car data
    $app->get('/cars/:id', function ($id) use ($app, $db){
        $sth = $db->prepare("SELECT * FROM car WHERE `id` = :id");
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

    //Delete car
    $app->delete('/cars/:id', function ($id) use ($app, $db){
        $sth = $db->prepare("SELECT * FROM car WHERE `id` = :id");
        $sth->execute(array(
            ':id' => $id
        ));

        if(!$sth->rowCount()){
            //No results found server status response
            $app->response()->status(404);
            $app->response()->header('X-Status-Reason', 'Not results found.');
            return;
        }

        $sth = $db->prepare("DELETE * FROM car WHERE `id` = :id");
        $sth->execute(array(
            ':id' => $id
        ));

        $app->response()->status(204);
    })->conditions(array('id' => '\d+'));

    //Edit car data
    $app->put('/cars/:id', function ($id) use ($app, $db){
        $request = $app->request();
        $body = $request->getBody();
        $input = json_decode($body); 

        $sth = $db->prepare("SELECT * FROM car WHERE `id` = :id");
        $sth->execute(array(
            ':id' => $id
        ));

        if(!$sth->rowCount()){
            //No results found server status response
            $app->response()->status(404);
            $app->response()->header('X-Status-Reason', 'Not results found.');
            return;
        }
        $previous_val = $sth->fetch(\PDO::FETCH_OBJ);

        $sth = $db->prepare("UPDATE car SET 
            `model` = :model,
            `year` = :year,
            `price` = :price,
            `color` = :color,
            `picture` = :picture,
            `deal` = :deal,
            `status` = :status
            WHERE `id` = :id");

        $input->model = isset($input->model) ? $input->model : $previous_val->model;
        $input->year = isset($input->year) ? $input->year : $previous_val->year;
        $input->price = isset($input->price) ? $input->price : $previous_val->price;
        $input->color = isset($input->color) ? $input->color : $previous_val->color;
        $input->picture = isset($input->picture) ? $input->picture : $previous_val->picture;
        $input->deal = isset($input->deal) ? $input->deal : $previous_val->deal;
        $input->status = isset($input->status) ? $input->status : $previous_val->status;

        $sth->execute(array(
            ':model' => $input->model,
            ':year' => $input->year,
            ':price' => $input->price,
            ':color' => $input->color,
            ':picture' => $input->picture,
            ':deal' => $input->deal,
            ':status' => $input->status,
            ':id' => $id
        ));
        $input->createat = $previous_val->createat;

        // send response header for JSON content type
        $app->response()->header('Content-Type', 'application/json');

        // return JSON-encoded response body with query results
        echo json_encode($input);
    })->conditions(array('id' => '\d+'));

    //Insert a car
    $app->post('/cars', function () use ($app, $db){
        $request = $app->request();
        $body = $request->getBody();
        $input = json_decode($body); 

        $sth = $db->prepare("INSERT INTO car SET 
            `model` = :model,
            `year` = :year,
            `price` = :price,
            `color` = :color,
            `picture` = :picture,
            `deal` = :deal,
            `status` = :status,
            `createat` = :createat");

        $input->model = isset($input->model) ? $input->model : 'ERROR';
        $input->year = isset($input->year) ? $input->year : 'ERROR';
        $input->price = isset($input->price) ? $input->price : 'ERROR';
        $input->color = isset($input->color) ? $input->color : 'ERROR';
        $input->picture = isset($input->picture) ? $input->picture : 'ERROR';
        $input->deal = isset($input->deal) ? $input->deal : 'ERROR';
        $input->status = isset($input->status) ? $input->status : 0;
        $input->createat = date('Y-m-d H:i:s');

        $sth->execute(array(
            ':model' => $input->model,
            ':year' => $input->year,
            ':price' => $input->price,
            ':color' => $input->color,
            ':picture' => $input->picture,
            ':deal' => $input->deal,
            ':status' => $input->status,
            ':id' => $id
        ));
        $input->id = $db->lastInsertId();

        // send response header for JSON content type
        $app->response()->header('Content-Type', 'application/json');

        // return JSON-encoded response body with query results
        echo json_encode($input);
    });

});