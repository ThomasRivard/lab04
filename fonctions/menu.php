<?php


function afficherMenu() {
    $pageList = ["Fibonacci", "FizzBuzz", "Étoiles", "Citations", "Calculs", "Convertisseur de mesures", "Nombres aléatoires", "Filtre", "Tri", "Calendrier"];
    echo"<ul>";
    foreach( $pageList as $page){
        echo'
        <li>
        <a href="index.php?page='.$page.'">'.$page.'</a>
        </li>
        ';

    }
    echo"</ul>";
}

?>
