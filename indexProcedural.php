<?php
// Creation du deck de 52 cartes
$deck = range(1, 52);

// Mélange du deck avant de le distribuer
shuffle($deck);

/** Distribution des cartes aux deux joueurs */
// On prend les 26 premières cartes du deck qu'on donne à joueur 1
$player1Deck = array_slice($deck, 0, 26);
// Joueur 2 récupère le reste
$player2Deck = array_slice($deck, 26);

// La partie commence
$score1 = 0;
$score2 = 0;

// On parcours le tas de cartes
for ($i = 0; $i < count($player1Deck); $i++) {
    $card1 = $player1Deck[$i];
    $card2 = $player2Deck[$i];

    // Si la première carte est supérieure à la deuxième, joueur1 gagne un point
    if ($card1 > $card2) {
        $score1++;
    } else {
        $score2++;
    }
}

var_dump($score1, $score2);

if ($score1 == $score2) {
    echo "Match nul";
} else if ($score1 > $score2) {
    echo "Victoire joueur 1";
} else {
    echo "Victoire joueur 2";
}

?>