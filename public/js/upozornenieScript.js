import {Upozornenie} from "./modules/Upozornenie.js";

let upozornenie = new Upozornenie();
document.getElementById("zmazatBut").onclick = (event) => {
    upozornenie.upozornenieZmazat(event);
}