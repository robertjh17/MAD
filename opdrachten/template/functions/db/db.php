<?php
/**
 * Created by PhpStorm.
 * User: arjan
 * Date: 07-12-17
 * Time: 08:39
 */

function getDBConnection(){
    $config = parse_ini_file(__DIR__ . '/../../config.ini');
    return new PDO('mysql:dbname='.$config['db'].';host='.$config['host'].';',$config['user'],$config['pass']);

}

function selectFromDB($query,array $parameters = null){
    /* @var $pdo PDO */
    $pdo = getDBConnection();
    /* @var $statement PDOStatement */
    $statement = $pdo->prepare($query);
    $statement->execute($parameters);
    return $statement;

}

function changeDB($query,array $parameters){
    /* @var $pdo PDO */
    $pdo = getDBConnection();
    /* @var $statement PDOStatement */
    $statement = $pdo->prepare($query);
    return $statement->execute($parameters);

}
