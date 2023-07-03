<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: Les boucles - do-while</title>
</head>
<body>
     
     <?php
     // La boucle do-while est une boucle qui s'exécute au moins une fois
     // La condition est testée à la fin de la boucle
     $i = 0;
     do {
          echo "Bonjour Paterne : " . $i . "<br>";
          $i++;
     } while ($i < 5);
     ?>

</body>
</html>