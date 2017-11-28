<?php
/**
 * Calculate Circle
 *
 * Plak onderstaande PHP code in een nieuw script.
 *
 * Maak in de code de missende functie calculateCircle die je als argument /
 * parameter de straal ('radius') van een cirkel mee kunt geven. De functie
 * berekent de oppervlakte ('area') en omtrek ('circum') van de cirkel.
 *
 * Als je de opdracht goed hebt gemaakt wordt de tekst 'Eindbazen! Het is
 * jullie gelukt!' op het scherm getoond.
 *
 */

// Onder deze regel komt jouw nieuwe functie

// Onder deze regel mag je niks aanpassen
$ret = calculateCircle(7);

if ($ret['area'] === 153.94 && $ret['circum'] === 43.98) {
    echo "<h1>Eindbazen! Het is jullie gelukt!</h1>";
} else {
    echo "<h1>Nee, dat is nog niet de juiste oplossing</h1>";
}
