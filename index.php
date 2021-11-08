<?php
declare(strict_types = 1);

require_once('./Jeu.class.php');
require_once('./Joueur.class.php');



// Déclaration du jeu
$jeu = new Jeu;
// Ajout des joueurs
$jeu->creerJoueur("Roger Rabbit");
$jeu->creerJoueur("Roger RABBIT");
$jeu->creerJoueur("Eddie Valliant");


// lancement de la partie
$jeu->lancerJeu();

// Affichage du nom du gagnant
echo "Résultat : " . $jeu->getResultat();

?>