<?php

function afficherNombres($nombres) {
    echo '<ul>';
    foreach ($nombres as $nombre) {
        echo "<li>$nombre</li>";
    }
    echo '</ul>';
}

?>
