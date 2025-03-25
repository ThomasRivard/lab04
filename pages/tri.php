<?php

require_once('fonctions/validation.php');
require_once('fonctions/afficherListe.php');

function traiterFormulaire($textarea) {
    $valeurs = [];
    $lignes = explode("\n", $textarea);
    foreach ($lignes as $ligne) {
        if (validerNombreEntier($ligne, 0, 1000000)) {
            $valeurs[] = (int)$ligne;
        }
    }
    asort($valeurs);
    return $valeurs;
}

if (isset($_POST['valeurs'])) {
    $valeurs = traiterFormulaire($_POST['valeurs']);
    afficherListe('ul', $valeurs);
}

?>

<h1>Tri</h1>

<p>Entrez un nombre entier par ligne:</p>
<form method="post">
    <textarea name="valeurs" rows="10" cols="30"><?php echo isset($_POST['valeurs']) ? $_POST['valeurs'] : ''; ?></textarea>
    <input type="submit" value="Soumettre">
</form>
