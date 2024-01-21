<?php

use App\Models\User;

$layout = 'zaklad';
?>
<?php if (!is_null(@$data['errors'])): ?>
    <?php foreach ($data['errors'] as $error): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<script type="module" src="public/js/komentarScript.js" defer></script>
<h1 class="hlavnyNadpis">Pridať komentár</h1>
<hr>
<div class="card mx-auto karta">
    <div class="card-body">
        <img src="<?=\App\Helpers\FileStorage::UPLOAD_DIR . '/' . $data['novinka']->getObrazok()?>" class="card-img-top">
        <h5 class="card-title"><?= $data['novinka']->getNazov()?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['novinka']->getMiesto()?></h6>
        <p class="card-text"><?= $data['novinka']->getText()?></p>

        <?php foreach ($data['komentare'] as $komentar): ?>
            <hr>
            <h6 class="card-text"><?= User::getOne($komentar->getUser())->getUsername() ?></h6>
            <p class="card-text"><?= $komentar->getText() ?></p>
        <?php endforeach; ?>

    </div>
    <div class="card-footer text-body-secondary"><?= $data['novinka']->getDatum()?></div>

<form method="post" enctype="multipart/form-data" action="<?=$link->url('komentar.ulozit') ?>">
    <input type="hidden" name="post" value="<?= $data['novinka']->getId() ?>">
    <div class="card-body">
        <textarea class="form-control" name="komentar" id="komentar" rows="5"></textarea>
    </div>
    <button class="btn btn-primary w-100 py-2" disabled id="but" type="submit">Odoslať</button>
</form>
</div>