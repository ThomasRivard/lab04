<?php

require_once('fonctions/validation.php');

function convertirKgEnLb($kg) {
    return $kg * 2.20462;
}

function convertirLbEnKg($lb) {
    return $lb / 2.20462;
}

function convertirCmEnPouces($cm) {
    return $cm / 2.54;
}

function convertirPoucesEnCm($pouces) {
    return $pouces * 2.54;
}

function afficherFormulaire() {
?>
    <form method="post" action="">
        <label for="valeur">Valeur à convertir:</label>
        <input type="number" step="0.01" id="valeur" name="valeur" required>
        <input type="radio" id="kgToLb" name="conversion" value="kgToLb" required>
        <label for="kgToLb">De kilogrammes vers livres</label>
        <br>
        <input type="radio" id="lbToKg" name="conversion" value="lbToKg">
        <label for="lbToKg">De livres vers kilogrammes</label>
        <br>
        <input type="radio" id="cmToInches" name="conversion" value="cmToInches">
        <label for="cmToInches">De centimètres vers pouces</label>
        <br>
        <input type="radio" id="inchesToCm" name="conversion" value="inchesToCm">
        <label for="inchesToCm">De pouces vers centimètres</label>
        <br><br>
        <button type="submit">Convertir</button>
    </form>
<?php
}

?>

<h1>Convertisseur de mesures</h1>

<?php

if (
    isset($_POST['valeur']) && isset($_POST['conversion'])
    && validerNombre($_POST['valeur'], 0, 1000000)
    && validerValeurChoix($_POST['conversion'], ['kgToLb', 'lbToKg', 'cmToInches', 'inchesToCm'])
) {
    $valeur = $_POST['valeur'];
    $conversion = $_POST['conversion'];

    switch ($conversion) {
        case 'kgToLb':
            echo '<p>' . $valeur . ' kg équivaut à ' . convertirKgEnLb($valeur) . ' lb.</p>';
            break;
        case 'lbToKg':
            echo '<p>' . $valeur . ' lb équivaut à ' . convertirLbEnKg($valeur) . ' kg.</p>';
            break;
        case 'cmToInches':
            echo '<p>' . $valeur . ' cm équivaut à ' . convertirCmEnPouces($valeur) . ' pouces.</p>';
            break;
        case 'inchesToCm':
            echo '<p>' . $valeur . ' pouces équivaut à ' . convertirPoucesEnCm($valeur) . ' cm.</p>';
            break;
    }

    echo '<a href="?page=conversion">Nouvelle conversion</a>';
} else {
    afficherFormulaire();
}

?>
