<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: stuctures de controle - switch</title>
</head>
<body>
     
     <?php
     // switch permet de tester plusieurs conditions
     echo "<h1>L'instruction switch</h1>";
     $jour = "lundi";

     switch ($jour) {
     case "lundi":
          echo "C'est le début de la semaine.";
          break;
     case "vendredi":
          echo "C'est le dernier jour de la semaine de travail.";
          break;
     default:
          echo "C'est un jour de la semaine.";
          break;
     }
     ?>

</body>
</html>