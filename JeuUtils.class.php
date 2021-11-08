<?php

class JeuUtils
{
    public static function verifierJoueur(Jeu $jeu, Joueur $joueur): void {
        if ($jeu->getNombreJoueurs() == NB_MAX_JOUEURS) {
            throw new Exception("Il ne peut pas y avoir plus que " . NB_MAX_JOUEURS . " joueurs");
        }
        // Vérification qu'aucun autre joueur ne possède ce nom
        foreach ($jeu->getJoueurs() as $j) {
            if (strcasecmp($joueur->getNomJoueur(), $j->getNomJoueur()) == 0) {
                throw new Exception("Le joueur $joueur existe déjà");
            }
        }
    }

    public static function verifierEtatJeu(Jeu $jeu): void {
        if ($jeu->getNombreJoueurs() <> NB_MAX_JOUEURS) {
            throw new Exception("Le jeu ne peut se lancer qu'avec " . NB_MAX_JOUEURS . " joueurs");
        }
    }
}