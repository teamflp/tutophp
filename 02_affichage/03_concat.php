<!DOCTYPE html>
<html lang="fr">

<head>
     <title>Apprendre à coder en php: Syntaxe de base</title>
</head>

<body>

     <?php
     // La concaténation est l'opération qui consiste à mettre bout à bout deux chaînes de caractères
     echo "<h1>La fonction concat()</h1>";
     $phrase1 = "Bonjour"; 
     $phrase2 = " tout le monde!";
     $salutation = $phrase1 . $phrase2; // Concaténation des deux variables

     echo $salutation;

     ?>

</body>

</html>