<?php
// Inclure le fichier de connexion
require_once '../09_mysql/connexion.php';

// Accès interdit à l'utilisateur non connecté
session_start();

if (!isset($_SESSION['user'])) {
     header('Location: login.php');
     exit();
}

// Requête SELECT
$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);

// Exécution de la requête
$stmt->execute();

// Récupération des résultats
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
     <title>Apprendre à coder en php: Les formulaires</title>
     <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>

     <?php require_once 'nav.php'; ?>
     <div class="main-content">
          <div class="table-container">
               <a href="add.php" class="add-button button"> 
                    <i class="fa-solid fa-user-plus"></i> Ajouter un membre
               </a>
               <table style="margin-top: 10px">
                    <thead>
                         <tr>
                              <th>ID</th>
                              <th>Nom</th>
                              <th><i class="fa-regular fa-paper-plane"></i> Email</th>
                              <th><i class="fa-regular fa-calendar-check"></i> Date d'inscription</th>
                              <th><i class="fa-regular fa-clock"></i> Mis à jour le</th>
                              <th></th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($results as $user) { ?>
                              <tr>
                                   <td><?php echo $user['id']; ?></td>
                                   <td><?php echo $user['nom']; ?></td>
                                   <td>
                                        <a href="mailto:<?php echo $user['email']; ?>"><?php echo $user['email']; ?></a>
                                   </td>
                                   <td><?php echo date("d-m-Y", strtotime($user['createdAt'])); ?></td>
                                   <td><?php echo date("d-m-Y à H:m:i", strtotime($user['updatedAt'])); ?></td>
                                   <td class="action">
                                        <a class="update-button" href="update.php?id=<?php echo $user['id']; ?>"><i class="fa-solid fa-user-pen"></i> Edit</a>
                                        <a class="delete-button" href="delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')">
                                             <i class="fas fa-trash"></i> Delete
                                        </a>
                                   </td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>
          </div>
     </div>
</body>

</html>