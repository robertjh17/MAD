<?php
/**
 * Validate Email
 *
 * Vul de volgende functie aan met code om te controleren of er een geldig
 * e-mail adres is meegegeven
 */

function validateEmail($email)
{
    // Onder deze regel komt jouw code

    // Boven deze regel komt jouw code
    if ($email) {
        return $email;
    } else {
        return "Error";
    }
}

// Onder deze regel mag je niks aanpassen.

// geeft foutmelding
$ret1 = validateEmail('jkossen@ditisgeengeldigemailadres');
$ret2 = validateEmail('jkossen@landstede.nl');

if ((md5($ret1) === "902b0d55fddef6f8d651fe1035b7d4bd") &&
    (md5($ret2) === "f82546f06e5d4b5dd83f43d3f4296331")) {
    echo "JA! Goed gedaan, dit lijkt erop!";
} else {
    echo "Nee, je moet je hersenen nog iets meer pijnigen";
}
