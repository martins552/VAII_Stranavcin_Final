import {Prispevok} from "./modules/Prispevok.js";

let prispevok = new Prispevok();
document.onclick = () => {
    prispevok.skontrolujVsetkoVyplnene();
}
