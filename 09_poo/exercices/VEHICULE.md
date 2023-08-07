## Classe Vehicule

```php
<?php

// Définition de la classe Vehicule
class Vehicule {
    // Déclaration des propriétés de la classe
    private string $marque;
    private string $couleur;
    private int $annee;
    private float $prix;
    private int $roues;
    private bool $disponible;

    // Constructeur pour initialiser les propriétés lors de la création d'une instance de la classe
    public function __construct(string $marque, string $couleur, int $annee, float $prix, int $roues) {
        $this->marque = $marque;
        $this->couleur = $couleur;
        $this->annee = $annee;
        $this->prix = $prix;
        $this->roues = $roues;
        $this->disponible = true;
    }

    // Getters : méthodes pour récupérer la valeur des propriétés

    // Récupère la marque du véhicule
    public function getMarque(): string {
        return $this->marque;
    }

    // Récupère la couleur du véhicule
    public function getCouleur(): string {
        return $this->couleur;
    }

    // Récupère l'année du véhicule
    public function getAnnee(): int {
        return $this->annee;
    }

    // Récupère le prix du véhicule
    public function getPrix(): float {
        return $this->prix;
    }

    // Récupère le nombre de roues du véhicule
    public function getRoues(): int {
        return $this->roues;
    }

    // Vérifie si le véhicule est disponible
    public function estDisponible(): bool {
        return $this->disponible;
    }

    // Setters : méthodes pour modifier la valeur des propriétés

    // Modifie la couleur du véhicule
    public function setCouleur(string $couleur): void {
        $this->couleur = $couleur;
    }

    // Modifie le prix du véhicule
    public function setPrix(float $prix): void {
        $this->prix = $prix;
    }

    // Modifie la disponibilité du véhicule
    public function setDisponible(bool $disponible): void {
        $this->disponible = $disponible;
    }
}

```