<?php
require_once('./Jeu.class.php');
require_once('./Joueur.class.php');


//declare(strict_types=1);

// Déclaration du jeu
$jeu = new Jeu;
// Ajout des joueurs
$jeu->creerJoueur(new Joueur("Roger Rabbit"));
$jeu->creerJoueur(new Joueur("Eddie Valliant"));


// lancement de la partie
$jeu->lancerJeu();

// Affichage du nom du gagnant
echo "Résultat : " . $jeu->getResultat();

?>