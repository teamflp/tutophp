<?php 
/**
 * Une classe est un modèle qui permet de créer des objets.
 * Un objet est une instance d'une classe. On peut créer plusieurs objets à partir d'une même classe.
 *
 */
class Voiture {
    public $couleur;

    function __construct($couleur) {
        $this->couleur = $couleur;
    }

    function get_couleur() {
        return $this->couleur;
    }
}

$maVoiture = new Voiture("rouge");
echo $maVoiture->get_couleur(); // Affiche "rouge"

$maDeuxiemeVoiture = new Voiture("bleue");
echo $maDeuxiemeVoiture->get_couleur(); // Affiche "bleue"

