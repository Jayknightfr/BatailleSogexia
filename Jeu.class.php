<?php
const NB_CARTES_TOTAL = 52;
const NB_MAX_JOUEURS = 2;

require_once('./JeuUtils.class.php');

class Jeu
{

    private $deck, $joueurs;

    public function __construct() {
        // Creation du deck de 52 cartes
        $this->deck = range(1, 52);
        // Mélange du deck avant de le distribuer
        shuffle($this->deck);

        // Init du tableau de joueurs
        $this->joueurs = [];
    }

    public function getNombreJoueurs(): int {
        return count($this->joueurs);
    }

    public function getJoueurs(): array {
        return $this->joueurs;
    }

    public function creerJoueur(string $nomJoueur): void {
        $joueur = new Joueur($nomJoueur);

        JeuUtils::verifierJoueur($this, $joueur);

        $this->joueurs[] = $joueur;

    }


    public function lancerJeu(): void {
        if (count($this->joueurs) <> NB_MAX_JOUEURS) {
            throw new Exception("Le jeu ne peut se lancer qu'avec " . NB_MAX_JOUEURS . " joueurs");
        }

        $nbCartesParJoueur = $this->distribuerCartes();

        // Parcours de toutes les cartes pour les comparer
        for ($i = 0; $i < $nbCartesParJoueur; $i++) {
            $card1 = $this->joueurs[0]->cartes[$i];
            $card2 = $this->joueurs[1]->cartes[$i];

            // Si la première carte est supérieure à la deuxième, joueur1 gagne un point
            if ($card1 > $card2) {
                $this->joueurs[0]->gagneManche();
            } else {
                $this->joueurs[1]->gagneManche();
            }
        }
    }

    public function getResultat(): string {


        // Est-ce un match nul?
        $score1 = $this->joueurs[0]->getScore();
        $score2 = $this->joueurs[1]->getScore();
        if ($score1 == $score2) {
            return "match nul";
        }

        // Tri des joueurs par score décroissant
        usort($this->joueurs, array("Joueur", "compare"));

        foreach($this->joueurs as $j) {
            echo $j->getNomJoueur() . " - " . $j->getScore() . "<br/>";
        }

        return "victoire de " . $this->joueurs[0]->getNomJoueur();
    }

    private function distribuerCartes(): int {
        $nbCartesParJoueur = intdiv(NB_CARTES_TOTAL, count($this->joueurs));

        for ($i = 0; $i < count($this->joueurs); $i++) {
            $this->joueurs[$i]->cartes =
                array_slice($this->deck, $nbCartesParJoueur * $i, $nbCartesParJoueur);
        }

//        echo "Il reste " . (count($this->deck) - $nbCartesParJoueur * count($this->joueurs)) . " cartes dans le deck <br/>";

        return $nbCartesParJoueur;

    }
}

?>