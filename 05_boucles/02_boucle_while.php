<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: Les boucles - while</title>
</head>
<body>
     
     <?php
     // La boucle while permet de répéter une instruction tant qu'une condition est vraie.
     // Elle est composée de 2 parties:
     // 1. Condition d'arrêt
     // 2. Incrémentation de la variable

     $i = 0;
     while ($i < 5) {
          echo "Bonjour Paterne : " . $i . "<br>";
          $i++;
     }
     ?>

</body>
</html>