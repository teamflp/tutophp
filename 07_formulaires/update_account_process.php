<?php
// Inclure le fichier de connexion
require_once '../08_mysql/connexion.php';

// Démarrer la session
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: login.php");
    exit;
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$email = $_POST['email'];

// Préparer la requête SQL
$sql = "UPDATE users SET nom = :nom, email = :email WHERE id = :id";
$stmt = $conn->prepare($sql);

// Liaison des paramètres
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':id', $_SESSION['user']['id']);

// Exécutez la requête
$stmt->execute();

// Redirigez l'utilisateur vers la page du compte avec un message de succès
header("Location: account.php?message=Account mis à jour avec succès");
exit;

