<?php

function afficherListe($typeListe, $valeurs) {
    echo "<$typeListe>";
    foreach ($valeurs as $valeur) {
        echo "<li>$valeur</li>";
    }
    echo "</$typeListe>";
}

?>
