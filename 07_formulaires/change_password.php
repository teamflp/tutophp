<!-- change_password.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Changement de mot de passe</title>
     <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
     <?php require_once 'nav.php'; ?>
     <div class="main-content">

          <!-- Message de validation -->
          <?php if (isset($_GET['message'])): ?>
          <p class="message error">
               <?php echo $_GET['message']; ?>
          </p>
          <?php endif; ?>

          <h3>Changement de mot de passe</h3>
          <form action="change_password_process.php" method="POST">
               <div>
                    <label for="password">Mot de passe actuel :</label>
                    <input type="password" name="password" id="password">
               </div>
               <div>
                    <label for="new_password">Nouveau mot de passe :</label>
                    <input type="password" name="new_password" id="new_password">
               </div>
               <div>
                    <label for="confirm_password">Confirmer le nouveau mot de passe :</label>
                    <input type="password" name="confirm_password" id="confirm_password">
               </div>
               <div>
                    <input type="submit" value="Changer le mot de passe">
               </div>
          </form>
     </div>
</body>
</html>
