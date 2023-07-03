<?php

// Définition des variables contenant les informations de connexion
$servername = "localhost"; // adresse du serveur
$dbname = "tuto_php"; // nom de la base de données
$username = "root"; // nom d'utilisateur pour se connecter à la base de données
$password = ""; // mot de passe de l'utilisateur

try {
    // Tentative d'établir la connexion
    $conn = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
    // Définit le mode d'erreur de PDO sur exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connecté avec succès"; 
}
catch(PDOException $e) {
    // En cas d'échec de la connexion, on attrape l'exception et on affiche le message d'erreur
    echo "Échec de connexion : " . $e->getMessage();
}

