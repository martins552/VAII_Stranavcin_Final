class Registracia {
    constructor() {
    }
    skontrolujVsetkoSpravne()
    {
        let vyplnene = true;
        const form = document.getElementById("reg");
        const inputy = form.getElementsByTagName("input");

        for (let i = 1; i < inputy.length; i++) {
            if (inputy[i].value.trim() === '')
            {
                vyplnene = false;
                break;
            }
        }
        let heslaKontrola = this.skontrolujHesla();
        let kontrolaEmailu = this.skontrolujEmail();

        if (vyplnene && heslaKontrola && kontrolaEmailu) {
            document.getElementById("but").disabled = false;
        }
        else {
            document.getElementById("but").disabled = true;
        }
    }

    skontrolujHesla()
    {
        if (document.getElementById("passwordRepeat") === null)
        {
            return true;
        }
        else
        {
            let heslo1 = document.getElementById("password").value;
            let heslo2 = document.getElementById("passwordRepeat").value;

            return heslo1 === heslo2;
        }
    }

    skontrolujEmail()
    {
        let email = document.getElementById("email").value;
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        return emailRegex.test(email);
    }
}

export {Registracia}