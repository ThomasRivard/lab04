<?php

require_once('fonctions/validation.php');
require_once('fonctions/afficherListe.php');

function genererNombresAleatoires($min, $max, $quantite) {
    $nombres = [];
    for ($i = 0; $i < $quantite; $i++) {
        $nombres[] = rand($min, $max);
    }
    return $nombres;
}

if (
    isset($_POST['min']) && isset($_POST['max']) && isset($_POST['quantite'])
    && validerNombreEntier($_POST['min'], 0, 1000000)
    && validerNombreEntier($_POST['max'], 0, 1000000)
    && $_POST['min'] < $_POST['max']
    && validerNombreEntier($_POST['quantite'], 1, 100)
) {
    $nombres = genererNombresAleatoires($_POST['min'], $_POST['max'], $_POST['quantite']);
    afficherListe('ul', $nombres);
}

?>

<h1>Nombres aléatoires</h1>

<form method="post">
    <label for="min">Minimum:</label>
    <input type="number" id="min" name="min" required>
    <label for="max">Maximum:</label>
    <input type="number" id="max" name="max" required>
    <label for="quantite">Quantité:</label>
    <input type="number" id="quantite" name="quantite" required>
    <button type="submit">Générer</button>
</form>
