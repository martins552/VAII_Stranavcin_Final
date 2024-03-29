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

<!--                <span id="emailFormat" class="alert alert-danger m-auto" hidden>Nesprávny formát emailu!</span>-->
<!--                <span id="heslaRovne" class="alert alert-danger m-auto" hidden>Heslá sa nerovnajú</span>-->
<!--                <span id="vyplnene" class="alert alert-danger m-auto" hidden>Všetky údaje musia byť vyplnené!</span>-->

                <form id="reg" class="form-signin" method="post" action="<?= $link->url('registracia.vytvorUcet')?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= @$data['pouzivatel']?->getId() ?>">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="email" placeholder="E-Mail" name="email" >
                        <label for="floatingInput">E-Mail</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" placeholder="Používateľské meno" name="username" value="">
                        <label for="floatingInput">Používateľské meno</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Heslo" name="password" value="">
                        <label for="floatingPassword">Heslo</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="passwordRepeat" placeholder="Zopakovať heslo" name="passwordRepeat">
                        <label for="floatingPassword">Zopakovať heslo</label>
                    </div>
                    <div class="form-floating">
                        <input type="date" class="form-control" id="birthdate" placeholder="Dátum narodenia" name="birthdate" value="">
                        <label for="floatingPassword">Dátum narodenia</label>
                    </div>
                    <div class="form-floating">
                        <input type="file" class="form-control" id="picture" placeholder="Dátum narodenia" name="picture" value="">
                        <label for="floatingPassword">Profilová fotka</label>
                    </div>
                    <div>
                        <button id="but" disabled class="btn btn-primary w-100 py-2" type="submit" name="submit">Zaregistrovať sa</button>
                    </div>
                </form>
            </div>
    </main>
</div>
