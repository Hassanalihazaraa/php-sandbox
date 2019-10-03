<?php
declare(strict_types=1);

use function foo\func;

ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

define('URL_POKEMON', 'https://pokeapi.co/api/v2/pokemon/');
define('MAX_MOVES', 4);

function getPowers(array $data) {
    $powers = (array)array_rand($data['moves'], min(MAX_MOVES, count($data['moves'])));

    foreach($powers AS $power) {
        $powerName = $data['moves'][$power]['move']['name'];
        echo '<li>' . ucfirst(str_replace('-', ' ', $powerName)) . '</li>';
    }
}

function getEvolutions(array $data) :? object {
    $evolutions = json_decode(file_get_contents($data['species']['url']));


    $evolvesFromSpecies = $evolutions->evolves_from_species;
    if($evolvesFromSpecies === null) {
        return null;
    }

    return json_decode(file_get_contents(URL_POKEMON . $evolvesFromSpecies->name));
}

if(empty($_GET['pokename'])) {
    $_GET['pokename'] = 1;
}

$jsonResponse = @file_get_contents(URL_POKEMON . $_GET['pokename']);

if(!$jsonResponse) {
    die('This pokemon does not exist');
}

$data = json_decode($jsonResponse, true);

if(empty($data['name'])) {
    die('This pokemon does not exist');
}

require 'template.php';