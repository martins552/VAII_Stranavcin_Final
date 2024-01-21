import {CheckPasswordAPI} from "./modules/CheckPasswordAPI.js";

let checker = new CheckPasswordAPI();
document.getElementById("upravitBut").onclick = () => {
    checker.okno();
}