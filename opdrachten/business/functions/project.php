<?php

/**
 * weergave van alle rijen van de database
 */
function index($message='')
{
    $statement = selectFromDB('SELECT * FROM projecten');

    $content = $message.'<table border="1">
                    <tr>
                        <td>Naam</td>
                        <td>Datum</td>
                        </tr>
    ';
    while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
        ob_start();
        include (__DIR__ . '/../template/project/index.php');
        $content .= ob_get_clean();

    }
    $content .= "</table>";
    return page_show($content);
}

function edit()
{
    if ($_GET['id'] == 0) {
        $project['id'] = 0;
        $project['name'] = '';
        $project['description'] = '';
        $project['price'] = '';
        $project['date'] = '';
    } else{
       $statement = selectFromDB('SELECT * FROM projecten WHERE id = ?', [$_GET['id']]);
       $project = $statement->fetch(PDO::FETCH_ASSOC);
    }
    ob_start();
    include (__DIR__ . '/../template/project/edit.php');
    return page_show(ob_get_clean());
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
    $succes = changeDB('UPDATE projecten set `name`=:name,`description` = :description,`date`=:date,`price`= :price WHERE id = :id',$data);
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
    $succes = changeDB('INSERT INTO projecten(`name`) VALUES (?) ', $data);
    if ($succes) {
        return index("project aanmaken gelukt");
    }

    return index("project aanmaken gefaald");


}

/**
 * delete een rij van de database
 */
function delete()
{
    $data = [$_GET['id']];
    $succes = changeDB('DELETE FROM projecten WHERE id = ?', $data);
    if ($succes) {
        return page_show("project verwijderen gelukt");
    }

    return page_show("project verwijderen gefaald");


}

/**
 * lees een rij van de database
 */
function read()
{
    $statement = selectFromDB('SELECT * FROM projecten WHERE id = ?', [$_GET['id']]);
    $content = '<table>';
    while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
        $content .=
            '<tr>' .
            '<td>' . $data['name'] . '</td>' .
            '<td>' . $data['date'] . '</td>' .
            '<td><a href="?page=project&function=edit&id=' . $data['id'] . '">' . $data['date'] . '</td>' .
            '<td>' . $data['date'] . '</td>' .
            '<tr>';
    }
    return page_show($content);
}