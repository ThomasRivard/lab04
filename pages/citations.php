<?php

function citationAuHasard() {
    $citations = [
        'La vie, c\'est comme une boîte de chocolats, on ne sait jamais sur quoi on va tomber. - Forrest Gump',
        'Il n\'y a qu\'une façon d\'échouer, c\'est d\'abandonner avant d\'avoir réussi. - Olivier Lockert',
        'La seule limite à notre épanouissement de demain sera nos doutes d\'aujourd\'hui. - Franklin D. Roosevelt',
        'L\'imagination est plus importante que le savoir. - Albert Einstein',
        'La meilleure façon de prédire l\'avenir est de le créer. - Peter Drucker',
        'Le succès n\'est pas final, l\'échec n\'est pas fatal : c\'est le courage de continuer qui compte. - Winston Churchill',
        'La créativité, c\'est l\'intelligence qui s\'amuse. - Albert Einstein',
        'Ne jugez pas chaque jour à la récolte que vous faites, mais aux graines que vous plantez. - Robert Louis Stevenson'
    ];

    return $citations[array_rand($citations)];
}

?>

<h1>Citations</h1>

<p><?php echo citationAuHasard(); ?></p>

<a href="?page=citations">Générer une autre citation</a>
