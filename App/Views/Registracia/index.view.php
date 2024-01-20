<?php
$layout="zaklad";
?>

<h1 class="hlavnyNadpis">Registrácia</h1>
<div class="container">
    <main class="form-signin w-50 m-auto">
        <form>
            <div class="d-grid gap-2">
                <form class="form-signin" method="post" action="">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="email" placeholder="E-Mail" name="email" required>
                        <label for="floatingInput">E-Mail</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" placeholder="Používateľské meno" name="username" required>
                        <label for="floatingInput">Používateľské meno</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Heslo" name="password" required>
                        <label for="floatingPassword">Heslo</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="passwordRepeat" placeholder="Zopakovať heslo" name="passwordRepeat" required>
                        <label for="floatingPassword">Zopakovať heslo</label>
                    </div>
                    <div class="form-floating">
                        <input type="date" class="form-control" id="birthdate" placeholder="Dátum narodenia" name="birthdate" required>
                        <label for="floatingPassword">Dátum narodenia</label>
                    </div>
                    <div>
                        <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Zaregistrovať sa</button>
                    </div>
                </form>
            </div>
        </form>
    </main>
</div>
