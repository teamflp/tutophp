<?php 

/**
 * Une classe abstraite est une classe qui ne peut pas être instanciée.
 * Elle sert de modèle pour d'autres classes qui en héritent.
 * Une classe abstraite peut contenir des méthodes abstraites.
 * Une méthode abstraite est une méthode qui n'a pas de corps.
 * Une classe qui hérite d'une classe abstraite doit implémenter toutes les méthodes abstraites de la classe parente.
 */
abstract class Animal {
    protected $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function getNom() {
        return $this->nom;
    }

    // Méthode abstraite
    abstract public function faireDuBruit();
}

class Chien extends Animal {
    public function faireDuBruit() {
        return "Woof! Woof!";
    }
}

class Chat extends Animal {
    public function faireDuBruit() {
        return "Miaou! Miaou!";
    }
}

$monChien = new Chien("Spike");
echo $monChien->getNom() . " dit " . $monChien->faireDuBruit(); // Affiche "Spike dit Woof! Woof!"

$monChat = new Chat("Molly");
echo $monChat->getNom() . " dit " . $monChat->faireDuBruit(); // Affiche "Molly dit Miaou! Miaou!"
