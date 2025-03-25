<?php

function validerNombre($valeur, $min, $max) {
    return is_numeric($valeur)
        && $valeur >= $min
        && $valeur <= $max;
}

function validerNombreEntier($valeur, $min, $max) {
    return validerNombre($valeur, $min, $max)
        && $valeur == (int)$valeur;
}

function validerValeurChoix($valeur, $choixPossibles) {
    return in_array($valeur, $choixPossibles);
}

?>
