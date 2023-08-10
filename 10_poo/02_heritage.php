<?php 
/**
 * L'héritage permet de créer une classe qui hérite des propriétés et des méthodes d'une autre classe.
 * La classe qui hérite est appelée "classe fille" ou "classe enfant".
 * La classe dont on hérite est appelée "classe mère" ou "classe parent".
 * 
 */
class VoitureSportive extends Voiture {
    public $vitesse_max;

    function __construct($couleur, $vitesse_max) {
        $this->couleur = $couleur;
        $this->vitesse_max = $vitesse_max;
    }

    function get_vitesse_max() {
        return $this->vitesse_max;
    }
}

$maVoitureSportive = new VoitureSportive("rouge", 220);
echo $maVoitureSportive->get_vitesse_max(); // Affiche "220"
