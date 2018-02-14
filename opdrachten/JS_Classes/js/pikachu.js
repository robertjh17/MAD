export class Pikachu{
    // wordt aangeroepen zodra het object wordt gemaakt.
    constructor(id,speed){
        // begin op 0,0
        this.x = 0;
        this.y = 0;
        // hoeveel pixel verplaatsen.
        this.speed = speed;
        // element in HTML
        this.element = document.querySelector(id);
        // zet het alvast op relative
        this.element.style.setProperty('position','relative');
        // eventlisten voor keydown, roept handleEvent via this aan!
        window.addEventListener('keydown',this);
        // eventlisten voor change, roept handleEvent via this aan!
        document.getElementById('speed').addEventListener('change',this);
    }
    // afhandelen van events!
     handleEvent(event){
        // loggen
        console.log(event);
        console.log(this);
        // type event
        if(event.type == "keydown") {
            switch (event.key) {
                case "ArrowDown":
                    // move!
                    this.moveDown();
                    break;
                case "ArrowUp":
                    this.moveUp();
                    break;
                default:
                    return; // Quit als de key niet is gedefineerd.
            }
        }
    }

    moveLeft(){
        // bereken de nieuw waarde voor X
        this.x = this.x - this.speed;
        this.element.style.setProperty('left',this.x+'px');
    }
    moveRight(){
        this.x = this.x + this.speed;
        this.element.style.setProperty('left',this.x+'px');
    }
    moveUp(){
        this.y = this.y - this.speed;
        this.element.style.setProperty('top',this.y+'px');
    }
    moveDown(){
        // bereken de nieuw waarde voor Y
        this.y = this.y + this.speed;
        this.element.style.setProperty('top',this.y+'px');
    }
}
