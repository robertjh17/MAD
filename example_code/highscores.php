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
/*
 * create
 * read -> index en show
 * update
 * delete
 *
 * CRUD
 */


function create($game = null, $player = null, $score = null) {
    $dbh = getDb();
    $sql  = 'INSERT INTO highscores SET game = :game, player = :player, score = :score';
    $sqlparams = [];

    if ($game !== null) {
        $sqlparams['game'] = $game;
    }

    if ($player !== null) {
        $sqlparams['player'] = $player;
    }

    if ($score !== null) {
        $sqlparams['score'] = $score;
    }


    print_r($sqlparams);
    $sth = $dbh->prepare($sql);
    $sth->execute($sqlparams);

    print_r($sth->errorInfo());
}

function show() {

}

function update() {

}

function delete() {

}

function index($game = null, $player = null)
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

$scores = index($game);

echo json_encode($scores);
