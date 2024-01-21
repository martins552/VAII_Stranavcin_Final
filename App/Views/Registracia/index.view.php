<?php
$layout = "zaklad";
?>
<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<script type="module" src="public/js/registraciaScript.js" defer></script>
<h1 class="hlavnyNadpis">Registrácia</h1>
<div class="container">
    <main class="form-signin w-50 m-auto">
            <div class="d-grid gap-2">
                <form id="reg" class="form-signin" method="post" action="<?= $link->url('registracia.vytvorUcet')?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= @$data['pouzivatel']?->getId() ?>">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="email" placeholder="E-Mail" name="email" >
                        <label for="floatingInput">E-Mail</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" placeholder="Používateľské meno" name="username" value="<?= @$data['pouzivatel']?->getUsername() ?>">
                        <label for="floatingInput">Používateľské meno</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Heslo" name="password" value="<?= @$data['pouzivatel']?->getPassword() ?>">
                        <label for="floatingPassword">Heslo</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="passwordRepeat" placeholder="Zopakovať heslo" name="passwordRepeat">
                        <label for="floatingPassword">Zopakovať heslo</label>
                    </div>
                    <div class="form-floating">
                        <input type="date" class="form-control" id="birthdate" placeholder="Dátum narodenia" name="birthdate" value="<?= @$data['pouzivatel']?->getBirthdate() ?>">
                        <label for="floatingPassword">Dátum narodenia</label>
                    </div>
                    <div class="form-floating">
                        <input type="file" class="form-control" id="picture" placeholder="Dátum narodenia" name="picture" value="<?= @$data['pouzivatel']?->getObrazok() ?>">
                        <label for="floatingPassword">Profilová fotka</label>
                    </div>
                    <div>
                        <button id="but" disabled class="btn btn-primary w-100 py-2" type="submit" name="submit">Zaregistrovať sa</button>
                    </div>
                </form>
            </div>
    </main>
</div>
