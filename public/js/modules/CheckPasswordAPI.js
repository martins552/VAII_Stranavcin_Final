class CheckPasswordAPI {
    #url = "http://localhost"
    #controller;
    constructor(controller) {
        this.#controller = controller;
    }
    baseUrl(action) {
        return this.#url + "?c=" + this.#controller + "&a=" + action;
    }
    async sendRequest(action, method, responseCode, body, onErrorReturn = null) {
        try {
            let response = await fetch(
                this.baseUrl(action), // URL to the action
                {
                    method: method,
                    body: JSON.stringify(body),
                    headers: {
                        "Content-type": "application/json",
                        "Accept" : "application/json",
                    }
                });
            if (response.status !== responseCode ) return onErrorReturn;
            if (response.status === 204) return true;
            return await response.json();
        } catch(ex) {
            return onErrorReturn;
        }
    }

    async check(password) {
        return await this.sendRequest(
            "kontrolaLoginAJAX",
            "POST",
            204,
            {
                password: password
            },
            false);
    }

    async okno() {
        let input = prompt("Heslo: ");
        if (input !== "" && input !== null)
        {
            const vysledok = await this.check(input);
        }
    }
}

export {CheckPasswordAPI}