<?php

function validerNombreEntier($valeur, $min, $max) {
    return is_numeric($valeur)
        && $valeur == (int)$valeur
        && $valeur >= $min
        && $valeur <= $max;
}

?>
