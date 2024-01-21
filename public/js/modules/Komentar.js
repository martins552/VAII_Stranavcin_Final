class Komentar {
    constructor() {
    }

    skontrolujText() {
        let text = document.getElementById("komentar").value;

        document.getElementById("but").disabled = (text === "");
    }

}

export {Komentar}