<?php

$all_albums_string = file_get_contents("all_albums.json"); // STRING

$all_albums_array = json_decode($all_albums_string, true); //CONVERTITO IN ARRAY
var_dump($all_albums_array);