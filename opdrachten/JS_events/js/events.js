
window.addEventListener('load',start);

// load event, je code werkt niet zonder load event, pagina is mogelijk niet geladen
function start(event) {
    console.log(event);
    console.log(window);

    // Luister naar het event.
    window.addEventListener('keydown', keypressed);
}

// keypressed event!
function keypressed(event){
    console.log(event)
    // css selectors !!!
    let list = document.querySelector('ul#app');
    console.log(list);
    // maak list item
    let listitem = document.createElement('li');
    listitem.style.setProperty('position','relative');
    listitem.style.setProperty('left','100px');

    // switch voor elke key
    switch (event.key) {
        case "ArrowDown":
            // log voor debug
            console.log('down!');
            // attribute zetten
            listitem.innerHTML = 'down!';
            break;
        case "ArrowUp":
            // attribute zetten
            listitem.innerHTML = 'up!';
            break;
        default:
            return; // Quit als de key niet is gedefineerd.
    }
    // voeg toe aan de ul
    list.append(listitem)

}
