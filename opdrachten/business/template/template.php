<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 1</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animation.css">
</head>
<body>
<nav>
    <a href="?page=home&function=show">Home</a>
    <a href="?page=blog&function=index">Blog</a>
    <a href="?page=contact&function=show">Contact</a>
    <a href="?page=project&function=index">Projecten</a>
    <a href="?page=games&function=index">Games</a>
    <!-- maar een regel! -->
    <a href="?page=films&function=index">Films</a>

</nav>
<main>
    <?php
    echo $content;
    ?>
</main>
<footer>
    Arjan Timmerman
</footer>
</body>
</html>