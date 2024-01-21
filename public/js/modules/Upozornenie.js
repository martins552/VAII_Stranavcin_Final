class Upozornenie
{
    constructor() {
    }

    upozornenieZmazat(event)
    {
        let vysledok = confirm("Naozaj chcete vykonať zmazanie?");
        if (!vysledok)
        {
            event.preventDefault();
        }
    }

}

export {Upozornenie}