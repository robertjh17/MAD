<?php
/**
*
 * Maak een lijst item van één game alle data staat in een array $data
 * Gebruik <section> hiervoor.
 * De lijst bevat de naam, genre en prijs.
 * Zorg voor twee links voor Bewerken en Verwijderen
 * ?page=game&function=edit&id=$data['id']
 * ?page=game&function=delete&id=$data['id']
 *
 */

?>
<section>
    <p>
    <?=$data['name'];?><br>
        <input type="text" value="micheal<?=$data['price'];?>">
    </p>

</section>