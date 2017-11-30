<?php
/**
 * standaard waardes
 */
define('PAGE', 'home');
define('FUNC', 'show');

include_once "functions/shared.php";

/**
 * Start punt voor onze applicatie , Standaar gaan we naar de functie show()
 *
 * @param string $page
 * @param string $function
 * @return mixed
 */
function Router($page = null, $function = null){
    // Maak het bestande voor de includes
    $filename = __DIR__.'/functions/'.$page.'.php';
    // controlleer of het bestand bestaat
    $bestaatbestand = file_exists($filename);
    // test de boolean op FALSE en voor het includen en de functie uit
    if(!$bestaatbestand){
        $filename = __DIR__.'/functions/'.PAGE.'.php';
        $function = FUNC;
    }
    // include de file met functies
    require_once $filename;
    // voer de functie uit.
    return $function();

}

// clean up van de input
if(isset($_GET['page']) && ctype_alpha($_GET['page'])) {
    $page = filter_var($_GET['page'], FILTER_SANITIZE_STRING);
}
if(isset($_GET['function'])) {
    $function = filter_var($_GET['function'], FILTER_SANITIZE_STRING);
}

echo Router($page,$function);