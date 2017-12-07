<?php

function getDb()
{
    $host='vm';
    $dbname='games';
    $user='jochem';
    $pass='bHksjkSJq';

    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);

    return $dbh;
}


function getHighScores($game = null, $player = null)
{
    $dbh = getDb();
    $sql = 'SELECT * FROM highscores WHERE 1 = 1';
    $sqlparams = [];

    if ($game !== null) {
        $sql .= ' AND game = :game';
        $sqlparams['game'] = $game;
    }

    if ($player !== null) {
        $sql .= ' AND player = :player';
        $sqlparams['player'] = $player;
    }

    $sth = $dbh->prepare($sql);


    $sth->execute($sqlparams);

    $rows = $sth->fetchAll();

    return $rows;
}

$game = null;


if (isset($_GET['game'])) {
    $game = $_GET['game'];
}

$scores = getHighScores($game);

echo json_encode($scores);
