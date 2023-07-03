<?php
// Inclure le fichier de connexion
require_once '../08_mysql/connexion.php';

// Récupération de l'ID de l'utilisateur
$id = $_GET['id'];

// Suppression de l'utilisateur
$sql = "DELETE FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Redirection vers la page de la liste des utilisateurs
header("Location: index.php");

