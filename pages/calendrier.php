<?php

function construireCalendrier($mois, $annee) {
    $nbJours = cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
    $premierJour = date("w", mktime(0, 0, 0, $mois, 1, $annee)); // "w" retourne 0 (dimanche) à 6 (samedi)
    $dernierJour = date("w", mktime(0, 0, 0, $mois, $nbJours, $annee));

    $calendrier = "<table border='1'>\n";
    $calendrier .= "<tr><th>Dimanche</th><th>Lundi</th><th>Mardi</th><th>Mercredi</th><th>Jeudi</th><th>Vendredi</th><th>Samedi</th></tr>\n";
    $calendrier .= "<tr>";

    // Ajouter des cellules vides avant le premier jour
    for ($i = 0; $i < $premierJour; $i++) {
        $calendrier .= "<td></td>";
    }

    for ($jour = 1; $jour <= $nbJours; $jour++) {
        $calendrier .= "<td>$jour</td>";

        // Insérer une nouvelle ligne après samedi
        if (date("w", mktime(0, 0, 0, $mois, $jour, $annee)) == 6) {
            $calendrier .= "</tr>\n<tr>";
        }
    }

    // Ajouter des cellules vides après le dernier jour
    for ($i = $dernierJour; $i < 6; $i++) {
        $calendrier .= "<td></td>";
    }

    $calendrier .= "</tr>\n";
    $calendrier .= "</table>\n";

    return $calendrier;
}

// Configurer la localisation pour les noms de mois en français
setlocale(LC_TIME, 'fr_FR.UTF-8');

$mois = isset($_GET['mois']) ? (int)$_GET['mois'] : date('n');
$annee = isset($_GET['annee']) ? (int)$_GET['annee'] : date('Y');

// Calculer le mois précédent et suivant
$moisPrecedent = $mois - 1;
$anneePrecedente = $annee;
if ($moisPrecedent < 1) {
    $moisPrecedent = 12;
    $anneePrecedente--;
}

$moisSuivant = $mois + 1;
$anneeSuivante = $annee;
if ($moisSuivant > 12) {
    $moisSuivant = 1;
    $anneeSuivante++;
}

$nomMois = strftime('%B', mktime(0, 0, 0, $mois, 1, $annee)); // Nom du mois en français
?>

<h1>Calendrier</h1>

<div style="display: flex; justify-content: space-between; align-items: center;">
    <a href="?page=calendrier&mois=<?php echo $moisPrecedent; ?>&annee=<?php echo $anneePrecedente; ?>">Précédent</a>
    <h2><?php echo ucfirst($nomMois) . ' ' . $annee; ?></h2>
    <a href="?page=calendrier&mois=<?php echo $moisSuivant; ?>&annee=<?php echo $anneeSuivante; ?>">Suivant</a>
</div>

<?php
    echo construireCalendrier($mois, $annee);
?>
