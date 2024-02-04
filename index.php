<?php

function fake() {

    $requestMethod  = $_SERVER['REQUEST_METHOD'];
    $url            = $_SERVER['REDIRECT_URL'];
    $parameters     = $_SERVER['REDIRECT_QUERY_STRING'];

    $obj = [
        "response" => ["error"]
    ];

    if ($requestMethod == 'GET' && $url == '/users') {

        $obj["response"] = ["users" => [
            "user1",
            "user2",
            "user3"
        ]];

        return $obj;

    }

    if ($requestMethod == 'GET' && $url == '/users/99004') {

        $obj["response"] = ["users" => [
            "name" => "John",
            "lastName" => "Doe",
            "age" => 65,    
        ]];

        return $obj;

    }


    if ($requestMethod == 'GET' && $url == '/clients') {

        $obj["response"] = ["users" => [
            "client1",
            "client2",
            "client3"
        ]];

        return $obj;

    }

    //default 404
    return $obj;

} 


$response = fake();

header('Content-Type: application/json; charset=utf-8');
echo(json_encode($response));