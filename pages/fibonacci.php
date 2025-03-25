<?php

function afficherFibonacci($nombre) {
    $a = 0;
    $b = 1;
    $c = 0;

    echo '<ol>';
    for ($i = 0; $i < $nombre; $i++) {
        echo "<li>$a</li>";
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
    echo '</ol>';
}

function afficherFormulaire($nombreMax, $nombreDefaut) {
?>
    <form method="post" action="?page=fibonacci">
    <label for="nombre">Nombres à afficher:</label>
    <select name="nombre">
    <?php
        for ($i = 1; $i <= $nombreMax; $i++) {
            $selected = ($i == $nombreDefaut) ? ' selected' : '';
            echo '<option value="' . $i . '"' . $selected . '>' . $i . '</option>';
        }
    ?>
    </select>
    <button type="submit">Afficher</button>
<?php
}

?>

<h1>Fibonacci</h1>

<?php

if (isset($_POST['nombre']) && (int)$_POST['nombre'] == $_POST['nombre']) {
    afficherFibonacci($_POST['nombre']);
} else {
    afficherFibonacci(10);
}

afficherFormulaire(50, 10);

?>
