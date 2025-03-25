<?php

require_once('fonctions/validation.php');

function fizzBuzz($min, $max) {
    echo '<ul>';
    for ($i = $min; $i <= $max; $i++) {
        echo '<li>';
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo 'FizzBuzz';
        } else if ($i % 3 == 0) {
            echo 'Fizz';
        } else if ($i % 5 == 0) {
            echo 'Buzz';
        } else {
            echo $i;
        }
        echo '</li>';
    }
    echo '</ul>';
}

function afficherFormulaire() {
?>
    <form method="post">
    <label for="min">De:</label>
    <input type="number" name="min" id="min" required>
    <label for="max">à:</label>
    <input type="number" name="max" id="max" required>
    <button type="submit">Afficher</button>
<?php
}

?>

<h1>FizzBuzz</h1>

<?php

if (
    isset($_POST['min'], $_POST['max'])
    && validerNombreEntier($_POST['min'], 1, 1000)
    && validerNombreEntier($_POST['max'], 1, 1000)
    && $_POST['min'] < $_POST['max']
) {
    fizzBuzz($_POST['min'], $_POST['max']);
}

afficherFormulaire();

?>
