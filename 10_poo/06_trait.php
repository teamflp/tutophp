<?php 

/**
 * Un trait est un ensemble de méthodes qui peut être utilisé par plusieurs classes.
 * Un trait ne peut pas être instancié.
 * Un trait peut contenir des méthodes abstraites.
 * Une classe qui utilise un trait doit implémenter toutes les méthodes abstraites du trait.
 * Une classe peut utiliser plusieurs traits.
 * Une classe peut hériter d'une classe et utiliser un ou plusieurs traits.
 * Une classe peut utiliser un ou plusieurs traits et hériter d'une classe.
 * 
 */
trait MonTrait {
    public function saluer() {
        return "Bonjour!";
    }
}

class MaClasse {
    use MonTrait;
}

class UneAutreClasse {
    use MonTrait;
}

$monObjet = new MaClasse();
echo $monObjet->saluer(); // Affiche "Bonjour!"

$monAutreObjet = new UneAutreClasse();
echo $monAutreObjet->saluer(); // Affiche "Bonjour!"
