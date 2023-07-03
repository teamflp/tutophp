<?php 
/**
 * Le polymorphisme permet de définir des méthodes dans une classe fille 
 * qui ont le même nom que des méthodes de la classe parente.
 * 
 */
interface Vehicule {
    public function vitesse_max();
}

class Voiture implements Vehicule {
    public function vitesse_max() {
        return 180;
    }
}

class VoitureSportive implements Vehicule {
    public function vitesse_max() {
        return 220;
    }
}

function affiche_vitesse(Vehicule $vehicule) {
    echo $vehicule->vitesse_max();
}

$maVoiture = new Voiture();
$maVoitureSportive = new VoitureSportive();

affiche_vitesse($maVoiture); // Affiche "180"
affiche_vitesse($maVoitureSportive); // Affiche "220"
