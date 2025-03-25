<?php

include('fonctions/validation.php');
include('fonctions/afficherNombres.php');

function filtrerModulo($nombres, $modulo, $resultatModulo) {
    $nouveauxNombres = [];
    foreach ($nombres as $nombre) {
        if ($nombre % $modulo == $resultatModulo) {
            $nouveauxNombres[] = $nombre;
        }
    }
    return $nouveauxNombres;
}

function filtrerPair($nombres) {
    return filtrerModulo($nombres, 2, 0);
}

function filtrerImpair($nombres) {
    return filtrerModulo($nombres, 2, 1);
}

function traiterTextArea($textarea) {
    $nombres = [];
    $lignes = explode("\n", $textarea);
    foreach ($lignes as $ligne) {
        $nombres[] = (int)$ligne;
    }
    return $nombres;
}

function traiterFormulaire($textarea, $pairOuImpair) {
    $nombres = traiterTextArea($textarea);
    if ($pairOuImpair == 'pair') {
        return filtrerPair($nombres);
    } else if ($pairOuImpair == 'impair') {
        return filtrerImpair($nombres);
    }
    return [];
}

?>

<h1>Filtre</h1>

<?php

if (
    isset($_POST['nombres'])
    && isset($_POST['pairOuImpair'])
    && validerValeurChoix($_POST['pairOuImpair'], ['pair', 'impair'])
) {
    $nombres = traiterFormulaire($_POST['nombres'], $_POST['pairOuImpair']);
    afficherNombres($nombres);
}

?>

<form method="post">
    <label for="nombres">Nombres:</label>
    <textarea name="nombres" id="nombres" rows="10" cols="30"><?php echo isset($_POST['nombres']) ? $_POST['nombres'] : ''; ?></textarea>
    <label for="pairOuImpair">Pair ou impair:</label>
    <select name="pairOuImpair" id="pairOuImpair">
        <option value="pair" <?php echo isset($_POST['pairOuImpair']) && $_POST['pairOuImpair'] == 'pair' ? 'selected' : ''; ?>>Pair</option>
        <option value="impair" <?php echo isset($_POST['pairOuImpair']) && $_POST['pairOuImpair'] == 'impair' ? 'selected' : ''; ?>>Impair</option>
    </select>
    <button type="submit">Soumettre</button>
</form>
