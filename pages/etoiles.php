<?php

require_once('fonctions/validation.php');

?>

<style>
    hr ~ * {
        font-family: monospace;
    }
    table, tr, td {
        border: none;
        padding: 0;
        margin: 0;
        width: auto;
        height: auto;
        background-color: transparent !important;
    }
</style>

<?php

function triangleHautGauche($nombreLignes) {
    $resultat = "";
    for ($i = 1; $i <= $nombreLignes; $i++) {
        for ($j = $nombreLignes; $j >= 1; $j--) {
            $resultat .= ($j <= $i) ? '*&nbsp;' : '&nbsp;&nbsp;';
        }
        $resultat .= '<br />';
    }
    return $resultat;
}

function triangleHautDroite($nombreLignes) {
    $resultat = "";
    for ($i = 1; $i <= $nombreLignes; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            $resultat .= '* ';
        }
        $resultat .= '<br />';
    }
    return $resultat;
}

function triangleBasGauche($nombreLignes) {
    $resultat = "";
    for ($i = $nombreLignes; $i >= 1; $i--) {
        for ($j = $nombreLignes; $j >= 1; $j--) {
            $resultat .= ($j <= $i) ? '*&nbsp;' : '&nbsp;&nbsp;';
        }
        $resultat .= '<br />';
    }
    return $resultat;
}

function triangleBasDroite($nombreLignes) {
    $resultat = "";
    for ($i = $nombreLignes; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            $resultat .= '* ';
        }
        $resultat .= '<br />';
    }
    return $resultat;
}

function afficherMotif($nombreLignes) {
?>
    <table>
        <tr>
            <td>
                <?= triangleHautGauche($nombreLignes) ?>
            </td>
            <td>
                <?= triangleHautDroite($nombreLignes) ?>
            </td>        
        </tr>
        <tr>
            <td>
                <?= triangleBasGauche($nombreLignes) ?>
            </td>
            <td>
                <?= triangleBasDroite($nombreLignes) ?>
            </td>
        </tr>
    </table>
<?php
}

function afficherFormulaire($valeurParDefaut) {
?>
    <form method="post">
    <label for="nombreLignes">Hauteur de chaque triangle:</label>
    <input type="number" name="nombreLignes" id="nombreLignes" value="<?= $valeurParDefaut ?>" required>
    <button type="submit">Afficher</button>
<?php
}

?>

<h1>Étoiles</h1>

<?php

$nombreLignes = isset($_POST['nombreLignes']) && validerNombreEntier($_POST['nombreLignes'], 1, 20) ? $_POST['nombreLignes'] : 5;

afficherMotif($nombreLignes);
afficherFormulaire($nombreLignes);

?>
