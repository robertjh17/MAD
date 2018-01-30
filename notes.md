# Applicatieontwikkeling: een greep uit wat je geleerd hebt

Author: Jochem Kossen <jkossen@landstede.nl>

**Belangrijk** Dit document bevat notities met betrekking tot datgene dat je geleerd hebt. Beschouw het niet als volledig; dat is het niet.

[[_TOC_]]

## GIT

### Bookmarks
* https://git-scm.com/doc

### Voorbeelden

maak een (nieuw) git repository in een map:
```bash
cd pad/naar/map
git init
```

git repository clonen van remote:

```bash
git clone git@git.newdeveloper.nl:jkossen/app17-2017-2018-p1.git
```

status van bestanden in repository opvragen:
```bash
git status
```

(nieuw) bestand klaarzetten om te committen

```bash
git add pad/naar/bestand
```

wijzigingen doorvoeren:

```bash
git commit -m "korte omschrijving van je wijzigingen"
```

wijzigingen van server ophalen en lokaal verwerken:

```bash
git pull
```

doorgevoerde wijzigingen naar server sturen:

```bash
git push
```

## HTML

### Bookmarks
* https://www.w3schools.com/html/ (HTML)
* https://www.w3schools.com/css/ (CSS)
* https://validator.w3.org/ (controleren of er fouten in je code staan)

### Voorbeelden

#### Geen standaard margins en paddings

(bijv. geen witruimte om je navigatiebalk)
```css
* {
  margin: 0;
  padding: 0;
}
```

#### Navigatiebalk vast ("gefixeerd") bovenin

```css
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
}
```

#### Twee blokken (div?) naast elkaar

```css
.column {
  display: inline-block;
}
```

of:

```css

.sidebar {
  float: left;
}
```

#### Tables

```html
<table>
  <thead>
    <tr><th>kop kolom 1</th><th>kop kolom 2</th></tr>
  </thead>
  <tfoot>
    <tr>
      <td>footer kolom 1</td>
      <td>footer kolom 2</td>
    </tr>
  </tfoot>
  <tbody>
    <tr>
      <td>inhoud rij 1, kolom 1</td>
      <td>inhoud rij 1, kolom 2</td>
    </tr>
    <tr>
      <td>inhoud rij 2, kolom 1</td>
      <td>inhoud rij 2, kolom 2</td>
    </tr>
  </tbody>
</table>
```

#### Formulieren

```html
<form action="process.php" method="get">
  <input type="text" name="naam" placeholder="Naam">
  <textarea>
Hier kan tekst in met meerdere regels

zoals dit
en dit
  </textarea>

  <input type="checkbox" name="game_list[]" id="gl_pacman" value="pacman">
  <label for="gl_pacman">Pacman</label>
  <input type="checkbox" name="game_list[]" id="gl_nethack" value="nethack"> Nethack
  <label for="gl_nethack">Nethack</label>
  <input type="checkbox" name="game_list[]" id="gl_angband" value="angband"> Angband
  <label for="gl_angband">Angband</label>

  <input type="submit" value="Verstuur">
</form>
```

##### method

* get: komt in adresbalk
* post: gebeurt "onder water"

##### action

als action leeg is wordt het formulier naar zichzelf verstuurd (formulier en processing in één bestand)

##### checkboxes

Checkboxes vormen in PHP een Array als je ze dezelfde, op [] eindigende *name* geeft

Als checkboxes niet aangevinkt worden, worden ze *niet* meegestuurd.

#### Semantische tags

Gebruik zoveel mogelijk elementen (tags) _met betekenis_ in plaats van "generieke" blokken zonder betekenis zoals "div".

```html
<nav> ipv <div class="navbar">
<header> ipv <div class="header">
<footer> ipv <div class="footer">
<main> ipv <div class="content">
<article>
<section>
```

## PHP
### Bookmarks
* https://php.net

### Voorbeelden

#### Tips
##### Probeer eens:

* https://php.net/array
* https://php.net/integer

Je kunt dus bijna elk PHP "element" of functie achter https://php.net/ invoeren om de documentatie ervan te bekijken

#### Variabele

Een variabele is een container om een waarde in op te slaan. De waarde in deze container kan worden gewijzigd (variabel).

Elke variabele heeft een bepaald datatype.

#### Datatypen

https://secure.php.net/manual/en/language.types.php

* tekst: _string_, bijv.: "jochem" (vergeet de quotes niet)
* getal: _integer_, bijv.: 4
* getal met decimalen: _float_, bijv.: 4.234
* true/false: _boolean_
* meervoudig: _array_, bijv. [1, 2, 3, 4]

#### Arrays

Een variabele waar meerdere waarden in kunnen, een soort "lijst" of "map" dmv
key => value paren.

Duidelijk herkenbaar aan de blokhaken *[ ]*

* https://php.net/array

```php
<?php
/* simpele array */
$simple_list = ['1', '2', '3'];

/* geef '2' weer */
echo $simple_list[1];

/* multi-dimensional array */
$multi_arr = [
    ['1', '2', '3'],
    ['a', 'b', 'c']
];

/* geef 'c' weer */
echo $multi_arr[1][2];

/* associative array */
$assoc_list = [
  'docent' => 'Jochem',
  'vak' => 'PHP',
  'plaats' => 'Zwolle'
];

/* geef 'Jochem' weer */
echo $assoc_list['docent'];
```


#### Van pseudocode naar PHP

```
Als leeftijd kleiner dan 16: geef melding "Geen toegang"
  anders, als leeftijd kleiner dan 18: geef melding "Vraag toestemming aan je ouders"
  anders: geef melding "Welkom"
```

```php
<?php
if ($leeftijd < 16) {
  echo "Geen toegang";
} elseif ($leeftijd < 18) {
  echo "Vraag toestemming aan je ouders";
} else {
  echo "Welkom";
}
```

#### echo in het kort

Een verkorte manier om waarden op het scherm te tonen

https://php.net/echo

```php
<?php echo $name; ?>
```

kun je verkorten tot:

```php
<?= $name ?>
```

#### Zien wat er in een variabele zit (inspecteren)

* https://php.net/print_r
* https://php.net/var_dump

```php
<?php

/* recursive print, handig voor arrays */
print_r($_GET);
```

```php
<?php
$age = 17;

/* complexe "dump" van variabele om type en inhoud te zien */
var_dump($age);
```

#### Lussen / Loops

##### foreach: door een array heen lopen:

```php
<pre>
<?php
$my_arr = [
  'naam' => 'Jochem',
  'leeftijd' => 37,
  'woonplaats' => 'Zwolle'
];

/**
 * print elke key en waarde van $my_arr op het scherm
 */
foreach ($my_arr as $key => $value) {
    echo "$key=$value\n"; // \n is newline
}
```

##### for: tien maal 'Ik ga thuis oefenen met PHP' op het scherm tonen

```php
<pre>
<?php

for ($i = 0; $i < 10; $i++) {
    echo "Ik ga thuis oefenen met PHP\n";
}
```

#### Functions

Veel code die je programmeert gebruik je veelvuldig. Om code herbruikbaar te maken en het maar één keer te schrijven kun je gebruik maken van een _functie_.

Een functie heeft een naam en door deze naam aan te roepen voer je alle code in de functie uit.

```php
<?php
/**
 * Bereken het gemiddelde van de gegeven getallen
 */
function calculateAverage($nr1, $nr2, $nr3)
{
    return ($nr1 + $nr2 + $nr3) / 3;
}

// aanroep:
$avg = calculateAverage(2, 8, 18);
echo $avg;
```

##### return vs echo

Een functie kan een waarde op het scherm tonen met echo. Maar dat is wat anders als een waarde "teruggeven" die je kunt gebruiken voor andere functionaliteit binnen je programma.

Daarvoor gebruik je _return_. Bijvoorbeeld:

```php
<?php
function toApiCall($values)
{
  return json_encode(
    ['result' => $values]
  );
}

function getFibonacci()
{
  return [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233];
}

function getFibonacciAsApiCall()
{
  return toApiCall(getFibonacci());
}

echo getFibonacciAsApiCall();
```

##### pagina laden op basis van `$_GET`

**LET OP:** de volgende code werkt, maar is nog niet volledig. Het zorgt ervoor dat er XSS (Cross Site Scripting) mogelijk is op je pagina.

```php
<?php
function get_content()
{
  $page = 'home';

  if (array_key_exists('page', $_GET)) {
    $page = $_GET['page'];
  }

  $filepath = 'pages/' . $page . '.php';

  if (file_exists($filepath)) {
    require_once($filepath);
  } else {
    echo "<h1>ERROR: page not found</h1>";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Flipjes website</title>
  </head>
  <body>
    <?php
      get_content();
    ?>
  </body>
</html>
```

#### Input valideren

* https://secure.php.net/filter_var
* https://secure.php.net/filter_input
* https://secure.php.net/manual/en/function.ctype-alnum.php

Om veiligheidsredenen en om vervuiling van je data(base) te voorkomen is het noodzakelijk om alle gebruikersinput (formulieren, `$_GET`, `$_POST` waarden, etc.) te filteren en te valideren.

Doe je dit niet, dan krijg je al heel snel een lek in je code waardoor een aanvaller misbruik kan maken van je code en er onverwachte acties mee kan uitvoeren.

Om een voorbeeld te geven, als je een formulier hebt waarin iemand zijn leeftijd op moet geven, dien je ook te controleren en te garanderen dat de gebruiker alleen maar een getal tussen bijvoorbeeld `5` en `110` kan opgeven.

PHP biedt middels de functies `filter_var` en `filter_input` de nodige functionaliteit om de meeste input te filteren en te valideren.

Bijvoorbeeld, om een e-mail adres te valideren:

```php
<?php
// voorbeeld van filter_var
$email = filter_var('e.toeps@personeel.landstede.nl', FILTER_VALIDATE_EMAIL);

if ($email) {
  echo "Ja, dit is een geldig e-mail adres";
} else {
  echo "Nee, dit is geen geldig e-mail adres";
}
```

```php
<?php
// valideer $_GET['email']
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);

if ($email) {
    echo "Ja, dit is een geldig e-mail adres";
} else {
    echo "Nee, dit is geen geldig e-mail adres";
}
```

Als je een functie à la `get_content()` gebruikt waarbij de op te vragen pagina in `$_GET` opgegeven kan worden, is het verstandig om bijvoorbeeld alleen de karakters `a t/m z` en eventueel `0 t/m 9` toe te staan. Dit kan middels de methode `ctype_alnum`.


#### Encryptie en Hashing

Zie ook:

* https://www.howtogeek.com/howto/33949/htg-explains-what-is-encryption-and-how-does-it-work/

PHP functies:

* `password_hash`
* `password_verify`
