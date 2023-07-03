<?php 
/**
 * L'encapsulation permet de définir des propriétés et des méthodes comme étant privées.
 * Les propriétés et les méthodes privées ne peuvent être accédées que depuis la classe qui les définit.
 * 
 */
class Voiture {
    private $couleur;

    function __construct($couleur) {
        $this->couleur = $couleur;
    }

    function get_couleur() {
        return $this->couleur;
    }
}

$maVoiture = new Voiture("rouge");
echo $maVoiture->get_couleur(); // Affiche "rouge"
echo $maVoiture->couleur; // Erreur, car "couleur" est privé
