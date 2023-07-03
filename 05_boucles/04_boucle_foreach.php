<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Apprendre à coder en php: Les boucles - foreach</title>
</head>
<body>
     
     <?php
     // La boucle foreach est une boucle qui s'exécute au moins une fois
     $prenoms = array('Paterne', 'Jean', 'Marc', 'Luc', 'Pierre');
     foreach ($prenoms as $prenom) {
          echo "Bonjour " . $prenom . "<br>";
     }
     ?>

</body>
</html>