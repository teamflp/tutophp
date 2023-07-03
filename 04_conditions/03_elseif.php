<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: stuctures de controle - elseif</title>
</head>
<body>
     
     <?php
     // elseif permet de tester plusieurs conditions
     echo "<h1>L'instruction elseif</h1>";
     $age = 25;

     if ($age < 18) {
          echo "Vous êtes mineur.";
     } elseif ($age >= 18 && $age < 65) {
          echo "Vous êtes majeur.";
     } else {
          echo "Vous êtes senior.";
     }
     ?>

</body>
</html>