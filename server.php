<?php

$all_albums_string = file_get_contents("all_albums.json"); // STRING

$all_albums_array = json_decode($all_albums_string, true); //CONVERTITO IN ARRAY

$all_favourite_array = [];

// BONUS 1
if (isset($_POST["action"]) && $_POST["action"] === "liked") {
    $album_index = $_POST["album_index"];
    $all_albums_array[$album_index]["favourite"] = !$all_albums_array[$album_index]["favourite"];

    file_put_contents("all_albums.json", json_encode($all_albums_array));
};

// BONUS 2
foreach ($all_albums_array as $curAlbum) {
    if ($curAlbum["favourite"] === true) {
        $all_favourite_array[] = $curAlbum;
    };
};

// var_dump($all_favourite_array);

// CREO RISPOSTA DI "API"
if (isset($_POST["selector"]) && $_POST["selector"] === "liked") {
    $response = [
        "results" => $all_favourite_array 
    ];
} else {
    $response = [
        "results" => $all_albums_array 
    ];
}

// var_dump($_GET["selector"]);

$response_json = json_encode($response);

header("Content-Type: application/json");

echo $response_json;

