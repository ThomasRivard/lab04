<?php

function construireCalendrier($mois, $annee) {
    $nbJours = cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
    $premierJour = date("N", mktime(0, 0, 0, $mois, 1, $annee)); // "N" retourne 1 (lundi) à 7 (dimanche)
    $dernierJour = date("N", mktime(0, 0, 0, $mois, $nbJours, $annee));

    $calendrier = "<table border='1'>\n";
    $calendrier .= "<tr><th>Lundi</th><th>Mardi</th><th>Mercredi</th><th>Jeudi</th><th>Vendredi</th><th>Samedi</th><th>Dimanche</th></tr>\n";
    $calendrier .= "<tr>";

    // Ajouter des cellules vides avant le premier jour
    for ($i = 1; $i < $premierJour; $i++) {
        $calendrier .= "<td></td>";
    }

    for ($jour = 1; $jour <= $nbJours; $jour++) {
        $calendrier .= "<td>$jour</td>";

        // Insérer une nouvelle ligne après dimanche
        if (date("N", mktime(0, 0, 0, $mois, $jour, $annee)) == 7) {
            $calendrier .= "</tr>\n<tr>";
        }
    }

    // Ajouter des cellules vides après le dernier jour
    for ($i = $dernierJour; $i < 7; $i++) {
        $calendrier .= "<td></td>";
    }

    $calendrier .= "</tr>\n";
    $calendrier .= "</table>\n";

    return $calendrier;
}

?>

<h1>Calendrier</h1>

<?php

echo construireCalendrier(3, 2025);

?>
