<?php

session_start();

require_once('fonctions/authentification.php');
require_once('fonctions/menu.php');

if (isset($_GET['deconnecter'])) {
    deconnecter();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoire 04</title>
    <link rel="stylesheet" href="water.css">
</head>
<body>
    <?php

    if (estAuthentifie()) {
        $utilisateur = obtenirInfoUtilisateur();
        echo '<p>Vous êtes connecté(e) en tant que <strong>' . $utilisateur['prenom'] . ' ' . $utilisateur['nom'] . '</strong>.</p>';
        echo '<a href="?deconnecter">Se déconnecter</a>';
        echo isset($_GET['page']) ? ' | <a href="?">Menu</a>' : '';
        echo '<hr />';
    }

    ?>

    <?php

    if (!estAuthentifie()) {
        afficherFormulaireAuthentification();
    } else if (isset($_GET['page'])) {
        /****** AJOUTEZ LE SWITCH CI-DESSOUS *******/
        switch ($_GET['page']) {
            case 'fibonacci':
                require('pages/fibonacci.php');
                break;
            case 'fizbuzz':
                require('pages/fizzbuzz.php');
                break;
            case 'etoiles':
                require('pages/etoiles.php');
                break;
            case 'citations':
                require('pages/citations.php');
                break;
            case 'calculs':
                require('pages/calculs.php');
                break;
            case 'conversion':
                require('pages/conversion.php');
                break;
            case 'nombre-aleatoires':
                require('pages/nombre-aleatoires.php');
                break;
            case 'filtre':
                require('pages/filtre.php');
                break;
            case 'tri':
                require('pages/tri.php');
                break;
            case 'calendrier':
                require('pages/calendrier.php');
                break;
            default:
                echo '<p>ERREUR: Page inexistante.</p>';
        }
    } else {
        echo '<h1>Laboratoire 04</h1>';
        afficherMenu();
    }

    ?>
</body>
</html>
