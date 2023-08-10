<?php
// Inclure le fichier de connexion
require_once '../09_mysql/connexion.php';

// Démarrer la session
session_start();

// Accès interdit à l'utilisateur non connecté
if (!isset($_SESSION['user'])) {
    // Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
    header("Location: login.php");
}

// Récupération des informations de l'utilisateur
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);

// Liaison des paramètres
$stmt->bindParam(':id', $_SESSION['user']['id']);

// Exécution de la requête
$stmt->execute();

// Récupération des résultats
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Mon compte</title>
     <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
     <?php require_once 'nav.php'; ?>
     <div class="main-content">
          <h2>Mon compte</h2>
          <p>
               Salut, <?php echo $user['nom']; ?>, dans cette section vous pouvez mettre à jour votre mot de passe.
          </p>
          <!-- <a href="update_account.php">Mettre à jour mes informations</a> -->
          <a href="change_password.php">Changer mon mot de passe</a>
     </div>
</body>
</html>
