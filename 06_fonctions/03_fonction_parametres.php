<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: Passage de paramètres à une fonction :</title>
</head>
<body>
     
     <?php
     
     // Passage de paramètres à une fonction
     function direBonjour($nom)
     {
          echo 'Bonjour ' . $nom . ' !';
     }

     // Appel de la fonction avec un argument
     direBonjour("Paterne");
     ?>

</body>
</html>