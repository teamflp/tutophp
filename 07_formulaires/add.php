<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: Les formulaires</title>
     <link rel="stylesheet" href="css/styles.css">
</head>
<body>
     <?php require_once 'nav.php'; ?>
     <div class="main-content">
          <h1>Inscription</h1>

          <form action="traitement.php" method="POST">
               <div>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" placeholder="Votre nom">
               </div>
               <div>
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" placeholder="Votre email">
               </div>
               <div>
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe">
               </div>
               <div>
                    <input type="submit" value="Envoyer">
               </div>
               <div class="link-register">
                    <p style="text-align:center"><a href="login.php">Se connecter</a></p>
               </div>
          </form>
     </div>

</body>
</html>