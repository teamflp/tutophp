<?php /** @noinspection ALL */
// Inclure le fichier de connexion
global $conn;
require_once '../08_mysql/connexion.php';

// Récupération de l'ID de l'utilisateur
$id = $_GET['id'];

// Récupération des informations de l'utilisateur
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Mise à jour des informations de l'utilisateur
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET nom = :nom, email = :email WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirection vers la page de la liste des utilisateurs
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Mise à jour de l'utilisateur</title>
     <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
     <?php require_once 'nav.php'; ?>
     <div class="main-content">
          <h3>
              <a href="http://localhost/tutophp/07_formulaires/index.php"><i class="fas fa-arrow-left"></i> Retour </a>
              Mise à jour des données
          </h3>
          <form method="POST">
               <label for="nom">Nom :</label>
               <input type="text" id="nom" name="nom" value="<?php echo $user['nom']; ?>"><br>

               <label for="email">Email :</label>
               <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>"><br>

               <input type="submit" value="Mettre à jour »">
          </form>
     </div>
</body>
</html>
