<?php

require_once('fonctions/validation.php');

?>

<style>
    table, tr, td {
        border: none;
        padding: 0;
        margin: 0;
        width: auto;
        height: auto;
        background-color: transparent !important;
        font-family: monospace;
    }
</style>

<?php

function escalierCroissantGauche($nombreLignes) {
    $resultat = "";
    for ($i = 1; $i <= $nombreLignes; $i++) {
        for ($j = $nombreLignes; $j >= 1; $j--) {
            $resultat .= ($j <= $i) ? '*&nbsp;' : '&nbsp;&nbsp;';
        }
        $resultat .= '<br />';
    }
    return $resultat;
}

function escalierCroissantDroit($nombreLignes) {
    $resultat = "";
    for ($i = 1; $i <= $nombreLignes; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            $resultat .= '* ';
        }
        $resultat .= '<br />';
    }
    return $resultat;
}

function escalierDecroissantGauche($nombreLignes) {
    $resultat = "";
    for ($i = $nombreLignes; $i >= 1; $i--) {
        for ($j = $nombreLignes; $j >= 1; $j--) {
            $resultat .= ($j <= $i) ? '*&nbsp;' : '&nbsp;&nbsp;';
        }
        $resultat .= '<br />';
    }
    return $resultat;
}

function escalierDecroissantDroit($nombreLignes) {
    $resultat = "";
    for ($i = $nombreLignes; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            $resultat .= '* ';
        }
        $resultat .= '<br />';
    }
    return $resultat;
}

function afficherEscaliers($nombreLignes) {
?>
    <table>
        <tr>
            <td>
                <?= escalierCroissantGauche($nombreLignes) ?>
            </td>
            <td>
                <?= escalierCroissantDroit($nombreLignes) ?>
            </td>        
        </tr>
        <tr>
            <td>
                <?= escalierDecroissantGauche($nombreLignes) ?>
            </td>
            <td>
                <?= escalierDecroissantDroit($nombreLignes) ?>
            </td>
        </tr>
    </table>
<?php
}

function afficherFormulaire() {
?>
    <form method="post">
    <label for="nombreLignes">Nombre de lignes par escalier:</label>
    <input type="number" name="nombreLignes" id="nombreLignes" required>
    <button type="submit">Afficher</button>
<?php
}

?>

<h1>Étoiles</h1>

<?php

if (isset($_POST['nombreLignes']) && validerNombreEntier($_POST['nombreLignes'], 1, 20)) {
    afficherEscaliers($_POST['nombreLignes']);
} else {
    afficherEscaliers(5);
}

afficherFormulaire();

?>
