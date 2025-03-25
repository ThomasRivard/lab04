<?php

function validerNombreEntier($valeur, $min, $max) {
    return is_numeric($valeur)
        && $valeur == (int)$valeur
        && $valeur >= $min
        && $valeur <= $max;
}

function validerNombreDecimal($valeur, $min, $max) {
    return is_numeric($valeur)
        && $valeur >= $min
        && $valeur <= $max;
}

function validerValeurChoix($valeur, $choixPossibles) {
    return in_array($valeur, $choixPossibles);
}

?>
