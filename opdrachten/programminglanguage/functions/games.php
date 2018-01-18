<?php

/**
 * weergave van alle rijen van de database
 */
function index($message='')
{
    $statement = selectFromDB('SELECT * FROM games');

    $content = $message;
    ob_start();
    include (__DIR__ . '/../template/game/header.php');
    $content .= ob_get_clean();
    while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
        ob_start();
        include (__DIR__ . '/../template/game/index.php');
        $content .= ob_get_clean();

    }
    return page_show($content);
}

function edit()
{
    if ($_GET['id'] == 0) {
        $game['id'] = 0;
        $game['name'] = '';
        $game['description'] = '';
        $game['publisher'] = '';
        $game['genre'] = '';
        $game['price'] = '';
        $game['date'] = '';
    } else{
        $statement = selectFromDB('SELECT * FROM games WHERE id = ?', [$_GET['id']]);
        $game = $statement->fetch(PDO::FETCH_ASSOC);
    }
    $action = "?page=game&function=update&id=".$game['id'];
    if($game['id'] == 0){
        $action = "?page=game&function=create&id=".$game['id'];
    }
    ob_start();
    include (__DIR__ . '/../template/game/edit.php');
    $content=ob_get_clean();
    return page_show($content);
}

/**
 * updaten van een rij van de database
 */
function update()
{
    $data = $_POST;
    $data['id'] = $_GET['id'];
    // We willen de button niet in de db hebben
    unset($data['Opslaan']);
    $succes = changeDB('UPDATE games set `name`=:name,`description` = :description,`date`=:date,`price`= :price WHERE id = :id',$data);
    if ($succes) {
        return index("update gelukt");
    }
    return index("update gefaald");

}

/**
 * aanmaken van een rij van de database
 */
function create()
{
    $data = $_POST;
    $succes = changeDB('INSERT INTO games(`name`) VALUES (?) ', $data);
    if ($succes) {
        return index("game aanmaken gelukt");
    }

    return index("game aanmaken gefaald");


}

/**
 * delete een rij van de database
 */
function delete()
{
    $data = [$_GET['id']];
    $succes = changeDB('DELETE FROM games WHERE id = ?', $data);
    if ($succes) {
        return page_show("game verwijderen gelukt");
    }

    return page_show("game verwijderen gefaald");


}

/**
 * lees een rij van de database
 */
function read()
{
    $statement = selectFromDB('SELECT * FROM games WHERE id = ?', [$_GET['id']]);
    $content = '<table>';
    while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
        ob_start();
        include (__DIR__ . '/../template/game/read.php');
        $content=ob_get_clean();
    }
    return page_show($content);
}