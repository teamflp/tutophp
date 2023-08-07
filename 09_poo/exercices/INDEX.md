## Page index.php pour afficher les véhicules

```php 

<?php

// Définition de l'espace de nom
namespace App;

// Importation de la classe Vehicule
use Vehicule;

// Création des véhicules
$vehicules = [];
for ($i = 0; $i < 10; $i++) {
    $vehicules[] = new Vehicule("Marque $i", "Couleur $i", 2023, 10000 + $i * 1000, 4);
}

// Modification des véhicules 4 et 6
$vehicules[3]->setCouleur('Nouvelle couleur 4');
$vehicules[3]->setPrix(12345.67);
$vehicules[5]->setCouleur('Nouvelle couleur 6');
$vehicules[5]->setPrix(23456.78);

// Marquer les véhicules 2 et 7 comme indisponibles
$vehicules[1]->setDisponible(false);
$vehicules[6]->setDisponible(false);

// Affichage des véhicules
echo "<table>";
echo "<tr><th>Marque</th><th>Couleur</th><th>Année</th><th>Prix</th><th>Roues</th><th>Disponible</th></tr>";
$totalPrix = 0;
foreach ($vehicules as $vehicule) {
    echo "<tr>";
    echo "<td>" . $vehicule->getMarque() . "</td>";
    echo "<td>" . $vehicule->getCouleur() . "</td>";
    echo "<td>" . $vehicule->getAnnee() . "</td>";
    echo "<td>" . $vehicule->getPrix() . "</td>";
    echo "<td>" . $vehicule->getRoues() . "</td>";
    echo "<td>" . ($vehicule->estDisponible() ? 'Oui' : 'Non') . "</td>";
    echo "</tr>";
    if ($vehicule->estDisponible()) {
        $totalPrix += $vehicule->getPrix();
    }
}
echo "</table>";

// Affichage des statistiques
echo "Nombre total de véhicules : " . count($vehicules) . "<br/>";
echo "Nombre de véhicules disponibles : " . count(array_filter($vehicules, function ($v) { return $v->estDisponible(); })) . "<br/>";
echo "Prix total des véhicules disponibles : " . $totalPrix . "<br/>";

``` 