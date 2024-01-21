import {Registracia} from "./modules/Registracia.js";

let registracia = new Registracia();
document.onclick = () => {
    registracia.skontrolujVsetkoSpravne();
}