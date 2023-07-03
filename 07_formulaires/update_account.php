<!-- update_account.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Mise à jour des informations du compte</title>
     <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
     <?php require_once 'nav.php'; ?>
     <div class="main-content">
          <h2>Mise à jour des informations du compte</h2>
          <form action="update_account_process.php" method="POST">
               <div>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $_SESSION['user']['nom']; ?>">
               </div>
               <div>
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['user']['email']; ?>">
               </div>
               <div>
                    <input type="submit" value="Mettre à jour">
               </div>
          </form>

     </div>
</body>
</html>
