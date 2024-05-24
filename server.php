<?php

$all_albums_string = file_get_contents("all_albums.json"); // STRING

$all_albums_array = json_decode($all_albums_string, true); //CONVERTITO IN ARRAY


if (isset($_POST["action"]) && $_POST["action"] === "liked") {
    $album_index = $_POST["album_index"];
    $all_albums_array[$album_index]["favourite"] = !$all_albums_array[$album_index]["favourite"];

    file_put_contents("all_albums.json", json_encode($all_albums_array));
};

// var_dump($all_albums_array[0]["favourite"]);

// CREO RISPOSTA DI "API"
$response = [
    "results" => $all_albums_array   
];

$response_json = json_encode($response);

header("Content-Type: application/json");

echo $response_json;

