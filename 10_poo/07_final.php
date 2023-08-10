<?php 
/**
 * Le mot-clé final permet d'empêcher une classe d'être héritée.
 * Le mot-clé final permet d'empêcher une méthode d'être surchargée.
 * 
 */
class MaClasseParente {
    final public function maMethodeFinale() {
        // ...
    }
}

class MaClasseEnfant extends MaClasseParente {
    // Ceci provoquera une erreur
    public function maMethodeFinale() {
        // ...
    }
}
