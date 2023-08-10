<!DOCTYPE html>
<html lang="fr">

<head>
     <title>Validation du formulaire</title>
     <link rel="stylesheet" href="css/styles.css">
</head>

<body>
     <?php require_once 'nav.php'; ?>
     <div class="main-content">
          <?php
          // Inclure le fichier de connexion
          require_once '../09_mysql/connexion.php';

          // Récupération des données du formulaire
          $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
          $email = isset($_POST['email']) ? $_POST['email'] : '';
          $password = isset($_POST['password']) ? $_POST['password'] : '';

          // Validation des données
          $erreurs = [];
          // Validation du nom
          if (empty($nom)) {
               $erreurs[] = "Le nom est requis.";
          } elseif (strlen($nom) < 2) {
               $erreurs[] = "Le nom doit contenir au moins 2 caractères.";
          }
          // Validation de l'email
          if (empty($email)) {
               $erreurs[] = "L'email est requis.";
          } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $erreurs[] = "L'email n'est pas valide.";
          }
          // Validation du mot de passe
          if (empty($password)) {
               $erreurs[] = "Le mot de passe est requis.";
          } elseif (strlen($password) < 8) {
               $erreurs[] = "Le mot de passe doit contenir au moins 8 caractères.";
          }

          // Si aucune erreur, insérer les données dans la base de données
          if (empty($erreurs)) {
               try {
                    // Cryptage du mot de passe avant de l'insérer dans la base de données
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO users (nom, email, password, createdAt, updatedAt) VALUES (:nom, :email, :password, NOW(), NOW())";
                    $stmt = $conn->prepare($sql);

                    // Liaison des paramètres
                    $stmt->bindParam(':nom', $nom);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password', $hashed_password);

                    // Exécution de la requête
                    $stmt->execute();

                    echo '<div class="message success">Les données ont été insérées avec succès</div>';
                    echo '<div><a href="add.php" class="btn-back">Ajouter un membre</a></div>';
               } catch (PDOException $e) {
                    echo '<div class="message error">Erreur de base de données : ' . $e->getMessage() . '</div>';
                    echo '<div><a href="add.php" class="btn-back">Ajouter un membre</a></div>';
               }
          } else { ?>
               <div class="message error">
                    <?php
                    foreach ($erreurs as $erreur) {
                         echo '' . $erreur . '<br>';
                    }
                    ?>
               </div>
               <div><a href="add.php" class="btn-back">Ajouter un membre</a></div>
          <?php }
          ?>
     </div>
</body>

</html>