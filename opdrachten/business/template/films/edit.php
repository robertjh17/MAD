
<section>
    <form action="<?=$action;?>" method="post">
        Naam: <input type="text" value="<?=$data['name']?>">
        Genre: <input type="text" value="<?=$data['genre']?>">
        Price: <input type="text" value="<?=$data['price']?>">
        Datum: <input type="date" value="<?=$data['date']?>">
        <input type="submit" value="Verstuur">
    </form>
</section>