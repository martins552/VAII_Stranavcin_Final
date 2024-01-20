<?php
    $layout = 'zaklad';
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>
<h1 class="hlavnyNadpis">Prihlásenie</h1>
<div class="container">
<main class="form-signin w-50 m-auto">
        <div class="d-grid gap-2">
            <div class="row text-center text-danger">
                <i><?= @$data['message'] ?></i>
            </div>
            <form class="form-signin" method="post" action="<?= $link->url("prihlasenie.login") ?>">
                <div class="form-floating">
                    <input type="text" class="form-control" id="login" placeholder="Meno" name="login" required>
                    <label for="floatingInput">Prihlasovacie meno</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Heslo" name="password" required>
                    <label for="floatingPassword">Heslo</label>
                </div>
                <div>
                    <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Prihlásiť sa</button>
                </div>
            </form>

            <form method="post" action="<?=$link->url('registracia.index')?>"">
                <button class="btn btn-primary w-100 py-2" type="submit" name="sumbit">Zaregistrovať sa</button>
            </form>

            <div class="row">
                <div class="col">
                    <a href="#">Zabudli ste heslo?</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="#">Zabudli ste meno?</a>
                </div>
            </div>
        </div>
</main>
</div>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>-->
