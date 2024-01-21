class Prispevok {
    constructor() {
    }

    skontrolujVsetkoVyplnene() {
        let vyplnene = true;
        const form = document.getElementById("postForm");
        const inputy = form.getElementsByTagName("input");

        for (let i = 1; i < inputy.length; i++) {
            if (inputy[i].value.trim() === '')
            {
                vyplnene = false;
                break;
            }
        }

        let prazdnyText = this.prazdnyText();

        if (vyplnene && !prazdnyText) {
            document.getElementById("but").disabled = false;
        }
        else {
            document.getElementById("but").disabled = true;
        }
    }

    prazdnyText() {
        let text = document.getElementById("textArea").value;

        return text === "";
    }
}

export {Prispevok}