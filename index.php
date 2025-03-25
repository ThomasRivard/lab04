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
        echo '<hr />';
    }

    ?>

    <h1>Laboratoire 04</h1>

    <?php

    if (!estAuthentifie()) {
        afficherFormulaireAuthentification();
    } else if (isset($_GET['page'])) {
        /****** AJOUTEZ LE SWITCH CI-DESSOUS *******/
    } else {
        //afficherMenu();
    }

    ?>
</body>
</html>
