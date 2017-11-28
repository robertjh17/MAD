<?php
/**
 * Get Content
 *
 * Pas de onderstaande functie aan zodat er geen XSS meer kan worden uitgevoerd
 *
 */

function get_content()
{
    $page = 'home';

    if (array_key_exists('page', $_GET)) {
        $page = $_GET['page'];
    }

    $filepath = 'pages/' . $page . '.php';

    if (file_exists($filepath)) {
        require_once($filepath);
    } else {
        echo "<h1>ERROR: page not found</h1>";
    }
}
