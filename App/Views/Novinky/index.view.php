<?php

use App\Models\User;

$layout = 'zaklad';
?>

<script type="module" src="public/js/upozornenieScript.js" defer></script>
<h1 class="hlavnyNadpis">Novinky</h1>
<hr>
<?php foreach ($data['novinky'] as $post): ?>
<div class="card mx-auto karta">
    <div class="card-body">
        <img src="<?=\App\Helpers\FileStorage::UPLOAD_DIR . '/' . $post->getObrazok()?>" class="card-img-top">
        <h5 class="card-title"><?= $post->getNazov()?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $post->getMiesto()?></h6>
        <p class="card-text"><?= $post->getText()?></p>
        <?php foreach ($data['komentare'] as $komentar): ?>
            <?php if ($komentar->getPost() == $post->getId()): ?>
                <hr>
                <h6 class="card-text"><?= User::getOne($komentar->getUser())->getUsername() ?></h6>
                <p class="card-text"><?= $komentar->getText() ?></p>
                <?php if ($this->app->getAuth()->isLogged()) : ?>
                    <?php if ($komentar->getUser() == $this->app->getAuth()->getLoggedUserId() || $auth->hasHighPermissions()) : ?>
                        <a href="<?=$link->url('komentar.upravit', ['idKoment' => $komentar->getId(), 'idPost' => $post->getId()]) ?>">Upraviť</a>
                        <a id="zmazatBut" href="<?=$link->url('komentar.zmazat', ['id' => $komentar->getId()]) ?>">Zmazať</a>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
    <div class="card-footer text-body-secondary"><?= $post->getDatum()?></div>


    <?php if ($auth->isLogged()): ?>
        <a class="btn btn-primary mb-2" href="<?=$link->url('komentar.index', ['id' => $post->getId()])?>">Pridať komentár</a>
    <?php endif; ?>
    <?php if($auth->isLogged() && ($auth->getLoggedUserId() == $post->getUser() || $auth->hasHighPermissions())): ?>
        <a class="btn btn-primary mb-2" href="<?=$link->url('novinky.upravit', ['id' => $post->getId()])?>">Upraviť</a>
        <a class="btn btn-danger mb-2" id="zmazatBut" href="<?=$link->url('novinky.zmazat', ['id' => $post->getId()])?>">Zmazať</a>
    <?php endif; ?>
</div>
<?php endforeach; ?>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>-->

