<?php
// Inclure le fichier de connexion
require_once '../09_mysql/connexion.php';

// Démarrer la session
session_start();

// On vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    // Si l'utilisateur n'est pas connecté, On le redirige vers la page de connexion
    header("Location: login.php");
    exit;
}

// On récupère les données du formulaire
$password = $_POST['password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Si les données du formulaire sont vides, on redirige l'utilisateur avec un message d'erreur
if (empty($_POST['password']) || empty($_POST['new_password']) || empty($_POST['confirm_password'])) {
    header("Location: change_password.php?message=Veuillez remplir tous les champs");
    exit;
}
// On vérifie si le nouveau mot de passe et la confirmation correspondent
if ($new_password !== $confirm_password) {
    // Si les mots de passe ne correspondent pas, redirigez l'utilisateur avec un message d'erreur
    header("Location: change_password.php?message=Les mots de passe ne correspondent pas");
    exit;
}

// On prépare la requête SQL pour vérifier le mot de passe actuel
$sql = "SELECT password FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);

// Liaison des paramètres
$stmt->bindParam(':id', $_SESSION['user']['id']);

// Exécutez la requête
$stmt->execute();

// On récupère le résultat
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// On vérifie si le mot de passe actuel est correct
if (password_verify($password, $user['password'])) {
    // Si le mot de passe est correct, on prépare la requête SQL pour mettre à jour le mot de passe
    $sql = "UPDATE users SET password = :password WHERE id = :id";
    $stmt = $conn->prepare($sql);

    // Hacher le nouveau mot de passe
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Liaison des paramètres
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':id', $_SESSION['user']['id']);

    // On exécute la requête
    $stmt->execute();

    // On redirige l'utilisateur vers la page du compte avec un message de succès
    header("Location: login.php?message=Votre mot de passe a bien été modifié");
    exit;
} else {
    // Si le mot de passe n'est pas correct, on redirige l'utilisateur avec un message d'erreur
    echo "Mot de passe n'est pas correct";
    header("Location: change_password.php?message=Mot de passe actuel incorrect");
    exit;
}

