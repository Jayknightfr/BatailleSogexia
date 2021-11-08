<?php

class Joueur {
    private string $nom;
    private int $score = 0;
    public $cartes;

    public function __construct(string $nom) {
        $this->nom = $nom;
        $this->cartes = [];
    }

    public function __toString()
    {
        return "Joueur: $this->nom";
    }


    public function getScore(): int {
        return $this->score;
    }

    public function getCartes(): array {
        return $this->cartes;
    }

    public function gagneManche(): void {
        $this->score++;
    }

    public function getNomJoueur(): string {
        return $this->nom;
    }

    public static function compare(Joueur $j1, Joueur $j2): int {
        if ($j1 == $j2) {
            return 0;
        }
        return ($j1->score > $j2->getScore()) ? -1 : 1;
    }
}
