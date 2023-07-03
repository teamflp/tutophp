<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: Continue</title>
</head>
<body>
     
     <?php
     // L'instruction de controle continue permet de 
     // passer à l'itération suivante de la boucle
     for ($i = 0; $i < 10; $i++) {
          if ($i % 2 === 0) {
               continue; // Passe à l'itération suivante si $i est pair
          }
          echo $i . " ";
     }
     ?>

</body>
</html>