<?php
/**
 * Validate Characters
 *
 * Zorg dat in onderstaande functie alleen de karakters a-z en A-Z worden
 * toegelaten.
 *
 */

function getWelcomeText($name)
{
    // Onder deze regel komt jouw code

    // Boven deze regel komt jouw code
    if ($name) {
        return "Welkom, $name!";
    } else {
        return "Error";
    }
}

// Onder deze regel mag je niks aanpassen.

// geeft foutmelding
$ret1 = getWelcomeText('<h1>Jochem</h1>');
$ret2 = getWelcomeText('Jochem');

if ((md5($ret1) === "902b0d55fddef6f8d651fe1035b7d4bd") &&
    (md5($ret2) === "814080cee694cc93748db1549b87387b")) {
    echo "JA! Goed gedaan, dit lijkt erop!";
} else {
    echo "Nee, dit is nog niet de juiste oplossing.";
}