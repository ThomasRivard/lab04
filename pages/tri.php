<?php

require_once('fonctions/validation.php');
require_once('fonctions/afficherListe.php');

function traiterFormulaire($textarea) {
    $valeurs = [];
    $lignes = explode("\n", $textarea);
    foreach ($lignes as $ligne) {
        $valeurs[] = (int)$ligne;
    }
    return asort($valeurs);
}

if (isset($_POST['valeurs'])) {
    $valeurs = traiterFormulaire($_POST['valeurs']);
    afficherListe('ul', $valeurs);
}

?>

<h1>Tri</h1>

<p>Entrez une valeur par ligne:</p>
