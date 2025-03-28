<?php
function estAuthentifie(){
    if(isset($_SESSION["utilisateur"])){
        return true;
    }else if(isset($_POST["utilisateur"]) && isset($_POST["mot_de_passe"]) ){

        if($_POST["utilisateur"] == "bob" && $_POST["mot_de_passe"] == "abc123"){
            $_SESSION["utilisateur"] = ['prenom' => 'Bob', 'nom' => "L'Éponge"];
            return true;
        }else{
            return false;
        }
       }else{
           return false;
       }    
}

function obtenirInfoUtilisateur() {
    if(estAuthentifie()){
        return $_SESSION["utilisateur"];
    }else{
        return null;
    }

}

function afficherFormulaireAuthentification() {
if(isset($_POST["utilisateur"]) && estAuthentifie() == false){
    echo "<p>Utilisateur ou mot de passe invalide.</p>";
}
    echo '<form action="" method="post">
    <p>Utilisateur</p>
    <input type="text" name="utilisateur" id="utilisateur">
    <p>Mot de passe</p>
    <input type="password" name="mot_de_passe" id="mot_de_passe">
    <input type="submit" value="s\'authentifier">
    </form>';
    
}

function deconnecter() {
    session_unset();
    session_destroy();
}

?>
