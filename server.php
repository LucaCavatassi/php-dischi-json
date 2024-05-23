<?php

$all_albums_string = file_get_contents("all_albums.json"); // STRING

$all_albums_array = json_decode($all_albums_string, true); //CONVERTITO IN ARRAY
// var_dump($all_albums_array);

// CREO RISPOSTA DI "API"
$response = [
    "results" => $all_albums_array   
];
// var_dump($response);

$response_json = json_encode($response);

header("Content-Type: application/json");

echo $response_json;