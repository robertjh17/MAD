<?php

?>

<form action="<?= $action ?>" method="post">

    <input type="text" name="name" value="<?= $project['name'] ?>">
    <input type="text" name="description" value="<?= $project['description'] ?>">
    <input type="date" name="date" value="<?= $project['date'] ?>">
    <input type="number" name="price" value="<?= $project['price'] ?>">
    <input type="submit" name="Opslaan">
</form>