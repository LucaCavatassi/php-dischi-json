<?php
// ALL
$all_albums_string = file_get_contents("all_albums.json"); // STRING

$all_albums_array = json_decode($all_albums_string, true); //CONVERTITO IN ARRAY


// FAVOURITE
$favourite_string = file_get_contents("favourite.json");
// var_dump($favourite_string);

$favourite_array = json_decode($favourite_string, true); //CONVERTITO IN ARRAY
// var_dump($_POST["liked-btn"]);   


// CREO RISPOSTA DI "API"
$response = [
    "results" => $all_albums_array   
];

$response_json = json_encode($response);

header("Content-Type: application/json");

echo $response_json;