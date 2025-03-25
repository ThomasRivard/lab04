<?php

include('fonctions/validation.php');
include('fonctions/afficherListe.php');

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
    afficherListe('ul', $nombres);
}

?>

<form method="post">
    <label for="nombres">Nombres:</label>
    <textarea name="nombres" rows="10" cols="30"><?php echo isset($_POST['nombres']) ? $_POST['nombres'] : ''; ?></textarea>
    <input
        type="radio"
        name="pairOuImpair"
        value="pair"
        <?php echo isset($_POST['pairOuImpair']) && $_POST['pairOuImpair'] == 'pair' ? 'checked' : ''; 
    ?>>
    <label for="pair">Pair</label>
    <input
        type="radio"
        id="impair"
        name="pairOuImpair"
        value="impair"
        <?php echo isset($_POST['pairOuImpair']) && $_POST['pairOuImpair'] == 'impair' ? 'checked' : ''; ?>
    >
    <label for="impair">Impair</label>
    <br>
    <button type="submit">Soumettre</button>
</form>
