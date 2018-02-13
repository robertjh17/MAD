<?php
require_once('Car.php');

$start = 0;
$finish = 25;

// uit één class kun je meerdere *objecten* maken
$car1 = new Car();
$car1->setName('Ford Mustang GT');
$car1->driveTo($finish);

$car2 = new Car();
$car2->setName('Aston Martin DB11');
$car2->driveTo($finish);
