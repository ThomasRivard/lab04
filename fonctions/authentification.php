<?php

function estAuthentifie() {
    if (isset($_SESSION['utilisateur'])) {
        return true;
    } else if (isset($_POST['utilisateur']) && isset($_POST['mot_de_passe'])) {
        if ($_POST['utilisateur'] == 'bob' && $_POST['mot_de_passe'] == 'abc123') {
            $_SESSION['utilisateur'] = ['prenom' => 'Bob', 'nom' => "L'Éponge"];
            return true;
        }
    }
    return false;
}

function obtenirInfoUtilisateur() {
    if (estAuthentifie()) {
        return $_SESSION['utilisateur'];
    }
    return null;
}

function afficherFormulaireAuthentification() {
    if (isset($_POST['utilisateur']) && !estAuthentifie()) {
        echo '<p>Utilisateur ou mot de passe invalide.</p>';
    }
    ?>

    <form method="post">
        <label for="utilisateur">Utilisateur</label>
        <input type="text" name="utilisateur" id="utilisateur" required>
        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        <button type="submit">S'authentifier</button>
    </form>

    <?php
}

function deconnecter() {
    unset($_SESSION['utilisateur']);
}

?>
