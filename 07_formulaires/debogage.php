<?php

// Afficher les erreurs PHP dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Définition d'une variable
$name = "John Doe";

// Afficher le contenu de la variable
var_dump($name);

// Afficher le contenu une variable inexistante
print_r($prenom);

