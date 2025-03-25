<?php

require_once('fonctions/validation.php');

function calculerSomme($nombres) {
    $somme = 0;
    foreach ($nombres as $nombre) {
        $somme += $nombre;
    }
    return $somme;
}

function calculerMoyenne($nombres) {
    $somme = calculerSomme($nombres);
    return $somme / count($nombres);
}

function traiterFormulaire($textarea) {
    $nombres = [];
    $lignes = explode("\n", $textarea);
    foreach ($lignes as $ligne) {
        $nombres[] = (float)$ligne;
    }
    return $nombres;
}

if (isset($_POST['nombres'])) {
    $nombres = traiterFormulaire($_POST['nombres']);
    $somme = calculerSomme($nombres);
    $moyenne = calculerMoyenne($nombres);
    echo "Somme: $somme<br>";
    echo "Moyenne: $moyenne<br>";
}

?>

<h1>Calculs</h1>

<p>Entrez un nombre par ligne:</p>

<form method="post">
    <textarea name="nombres" rows="10" cols="30"><?php echo isset($_POST['nombres']) ? $_POST['nombres'] : ''; ?></textarea>
    <input type="submit" value="Soumettre">
</form>
