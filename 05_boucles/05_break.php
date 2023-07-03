<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: Break</title>
</head>
<body>
     
     <?php
     // L'instruction de controle break permet de sortir d'une boucle
     for ($i = 0; $i < 10; $i++) {
          if ($i === 5) {
               break; // Sort de la boucle lorsque $i atteint la valeur 5
          }
          echo $i . " ";
     }
     ?>

</body>
</html>