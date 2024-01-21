import {Komentar} from "./modules/Komentar.js";

let komentar = new Komentar();
document.onclick = () => {
    komentar.skontrolujText();
}
